<?php

namespace App\Providers;

use App\Repositories\GemstoneRepository;
use App\Repositories\SettingRepository;
use App\Observers\AdminAuditObserver;
use App\Models\Category;
use App\Models\Certification;
use App\Models\Consultation;
use App\Models\Customer;
use App\Models\GemstoneType;
use App\Models\Origin;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\SiteSeoSetting;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(GemstoneRepository::class, function () {
            return new GemstoneRepository();
        });

        $this->app->singleton(SettingRepository::class, function () {
            return new SettingRepository();
        });
    }

    public function boot(): void
    {
        Product::observe(AdminAuditObserver::class);
        Category::observe(AdminAuditObserver::class);
        Tag::observe(AdminAuditObserver::class);
        Certification::observe(AdminAuditObserver::class);
        Customer::observe(AdminAuditObserver::class);
        Order::observe(AdminAuditObserver::class);
        Consultation::observe(AdminAuditObserver::class);
        Page::observe(AdminAuditObserver::class);
        GemstoneType::observe(AdminAuditObserver::class);
        Origin::observe(AdminAuditObserver::class);
        SiteSeoSetting::observe(AdminAuditObserver::class);

        $flushSitemapCache = function (): void {
            $cacheKey = 'sitemap.xml.' . md5(rtrim(config('seo.site_url', config('app.url')), '/'));
            Cache::forget($cacheKey);
        };

        foreach ([Product::class, Page::class, GemstoneType::class, Origin::class] as $modelClass) {
            $modelClass::saved($flushSitemapCache);
            $modelClass::deleted($flushSitemapCache);
        }

        View::composer('*', function ($view) {
            $settings = app(SettingRepository::class)->all();
            $siteSeo = Schema::hasTable('site_seo_settings') ? SiteSeoSetting::query()->first() : null;

            if ($siteSeo) {
                $contactAddress = collect([
                    $siteSeo->address_line,
                    $siteSeo->city,
                    $siteSeo->province,
                    $siteSeo->postal_code,
                    $siteSeo->country,
                ])->filter()->unique()->implode(', ');

                $settings = array_merge($settings, array_filter([
                    'site_name' => $siteSeo->organization_name,
                    'logo_path' => $siteSeo->logo_url,
                    'contact_phone' => $siteSeo->contact_phone,
                    'contact_email' => $siteSeo->contact_email,
                    'contact_address' => $contactAddress,
                    'seo_default_meta_title' => $siteSeo->default_meta_title,
                    'seo_default_meta_description' => $siteSeo->default_meta_description,
                ], static fn ($value) => filled($value)));
            }

            $navGemstones = app(GemstoneRepository::class)->featured();

            $view->with('settings', $settings)
                ->with('navGemstones', $navGemstones);
        });
    }
}
