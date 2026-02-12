<?php

namespace App\Providers;

use App\Repositories\GemstoneRepository;
use App\Repositories\SettingRepository;
use App\Observers\AdminAuditObserver;
use App\Models\Category;
use App\Models\Certification;
use App\Models\Consultation;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\Tag;
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

        View::composer('*', function ($view) {
            $settings = app(SettingRepository::class)->all();
            $navGemstones = app(GemstoneRepository::class)->featured();

            $view->with('settings', $settings)
                ->with('navGemstones', $navGemstones);
        });
    }
}
