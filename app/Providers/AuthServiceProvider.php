<?php

namespace App\Providers;

use App\Models\AdminAudit;
use App\Models\Category;
use App\Models\Certification;
use App\Models\Consultation;
use App\Models\ConsultationTier;
use App\Models\Customer;
use App\Models\GemstoneLot;
use App\Models\GemstonePiece;
use App\Models\GemstoneReservation;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use App\Models\SiteSeoSetting;
use App\Policies\AdminAuditPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\CertificationPolicy;
use App\Policies\ConsultationPolicy;
use App\Policies\ConsultationTierPolicy;
use App\Policies\CustomerPolicy;
use App\Policies\GemstoneLotPolicy;
use App\Policies\GemstonePiecePolicy;
use App\Policies\GemstoneReservationPolicy;
use App\Policies\OrderPolicy;
use App\Policies\PagePolicy;
use App\Policies\ProductPolicy;
use App\Policies\TagPolicy;
use App\Policies\UserPolicy;
use App\Policies\MediaPolicy;
use App\Policies\SiteSeoSettingPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Product::class => ProductPolicy::class,
        Category::class => CategoryPolicy::class,
        Tag::class => TagPolicy::class,
        Certification::class => CertificationPolicy::class,
        Consultation::class => ConsultationPolicy::class,
        ConsultationTier::class => ConsultationTierPolicy::class,
        Order::class => OrderPolicy::class,
        Customer::class => CustomerPolicy::class,
        GemstoneLot::class => GemstoneLotPolicy::class,
        GemstonePiece::class => GemstonePiecePolicy::class,
        GemstoneReservation::class => GemstoneReservationPolicy::class,
        Page::class => PagePolicy::class,
        User::class => UserPolicy::class,
        Media::class => MediaPolicy::class,
        AdminAudit::class => AdminAuditPolicy::class,
        SiteSeoSetting::class => SiteSeoSettingPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
