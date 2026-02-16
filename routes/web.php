<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AstrologyController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EngagementRingController;
use App\Http\Controllers\GemstoneController;
use App\Http\Controllers\GemstoneReservationController;
use App\Http\Controllers\GemstoneTypeController;
use App\Http\Controllers\GtaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalSeoController;
use App\Http\Controllers\OriginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\TechnicalSeoController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/about-us', [PageController::class, 'about']);

Route::get('/gemstones', [GemstoneController::class, 'index'])->name('gemstones');
Route::get('/gemstones/{type}/{origin}', [OriginController::class, 'show'])->name('gemstones.silo.origin');
Route::get('/gemstones/{slug}', [GemstoneTypeController::class, 'show'])->name('gemstones.show');
Route::post('/gemstones/{gemstone:slug}/reserve', [GemstoneReservationController::class, 'store'])->name('gemstones.reserve');
Route::get('/services', function () { return redirect()->route('gemstones'); });
Route::get('/services/{slug}', function ($slug) { return redirect('/gemstones/' . $slug); });

Route::get('/inventory', function () { return redirect()->route('gemstones'); })->name('inventory');
Route::get('/inventory/{item:slug}', function ($item) { return redirect('/gemstones/' . $item); });

Route::get('/education', [EducationController::class, 'index'])->name('education');
Route::get('/education/certification', [EducationController::class, 'certification'])->name('education.certification');
Route::get('/education/gia-vs-igi', [EducationController::class, 'giaVsIgi'])->name('education.gia-vs-igi');
Route::get('/education/natural-vs-treated', [EducationController::class, 'naturalVsTreated'])->name('education.natural-vs-treated');
Route::get('/education/birthstones-vs-astrology', [EducationController::class, 'birthstonesVsAstrology'])->name('education.birthstones-vs-astrology');
Route::get('/education/buying-gemstones-canada', [EducationController::class, 'buyingInCanada'])->name('education.buying-in-canada');
Route::get('/education/{slug}', [EducationController::class, 'show'])->name('education.show');

Route::get('/astrology', [AstrologyController::class, 'index'])->name('astrology.index');
Route::get('/astrology/{slug}', [AstrologyController::class, 'show'])->name('astrology.show');

Route::get('/certification', [CertificationController::class, 'index'])->name('certification.index');
Route::get('/certification/{slug}', [CertificationController::class, 'show'])->name('certification.show');

Route::get('/engagement-rings', [EngagementRingController::class, 'index'])->name('engagement.index');
Route::get('/engagement-rings/{slug}', [EngagementRingController::class, 'show'])->name('engagement.show');

Route::get('/toronto-gemstone-store', [LocalSeoController::class, 'toronto'])->name('local.toronto');
Route::get('/canada/{province}', [LocalSeoController::class, 'province'])->name('local.province');
Route::get('/gta/{location}', [GtaController::class, 'show'])->name('gta.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact-us', [ContactController::class, 'show']);

Route::get('/purchase-request', [OrderController::class, 'create'])->name('order.create');
Route::post('/purchase-request', [OrderController::class, 'store'])->name('order.store');
Route::get('/online-order', function () { return redirect()->route('order.create'); });
Route::get('/book-online', function () { return redirect()->route('order.create'); });
Route::post('/online-order', [OrderController::class, 'store']);
Route::post('/book-online', [OrderController::class, 'store']);

Route::get('/consultation', [ConsultationController::class, 'create'])->name('consultation');
Route::post('/consultation', [ConsultationController::class, 'store'])->name('consultation.store');

Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/disclaimer', [PageController::class, 'disclaimer'])->name('disclaimer');
Route::get('/refunds', [PageController::class, 'refunds'])->name('refunds');
Route::get('/terms-of-services', [PageController::class, 'terms']);
Route::get('/privacy-policy', [PageController::class, 'privacy']);
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [TechnicalSeoController::class, 'robots'])->name('robots');
Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now()->toIso8601String(),
    ]);
})->name('health');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
