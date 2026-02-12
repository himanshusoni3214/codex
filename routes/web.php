<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\GemstoneController;
use App\Http\Controllers\GemstoneReservationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/about-us', [PageController::class, 'about']);

Route::get('/gemstones', [GemstoneController::class, 'index'])->name('gemstones');
Route::get('/gemstones/{gemstone:slug}', [GemstoneController::class, 'show'])->name('gemstones.show');
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

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
