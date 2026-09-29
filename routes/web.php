<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/about-us', [SiteController::class, 'about'])->name('about');
Route::get('/about-us/introduction', [SiteController::class, 'aboutIntroduction'])->name('about.introduction');
Route::get('/about-us/group-companies', [SiteController::class, 'aboutGroupCompanies'])->name('about.group-companies');
Route::get('/about-us/company-profile', [SiteController::class, 'companyProfile'])->name('about.company-profile');
Route::get('/about-us/philosophy', [SiteController::class, 'philosophy'])->name('about.philosophy');
Route::get('/about-us/basic-policy', [SiteController::class, 'basicPolicy'])->name('about.basic-policy');
Route::get('/about-us/manufacturing', [SiteController::class, 'manufacturing'])->name('about.manufacturing');
Route::get('/about-us/company-history', [SiteController::class, 'companyHistory'])->name('about.company-history');
Route::get('/about-us/certificates', [SiteController::class, 'aboutCertificates'])->name('about.certificates');
Route::get('/about-us/plants-facilities', [SiteController::class, 'aboutPlants'])->name('about.plants');
Route::get('/about-us/our-products', [SiteController::class, 'aboutProducts'])->name('about.products');
Route::get('/about-us/our-customers', [SiteController::class, 'aboutCustomers'])->name('about.customers');
Route::get('/about-us/contact', [SiteController::class, 'aboutContact'])->name('about.contact');
Route::get('/about-us/quality-environment', [SiteController::class, 'qualityEnvironment'])->name('about.quality-environment');
Route::get('/products', [SiteController::class, 'products'])->name('products');
Route::get('/career', [SiteController::class, 'career'])->name('career');
Route::get('/contact-us', [SiteController::class, 'contact'])->name('contact');
