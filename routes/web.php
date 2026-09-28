<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/about-us', [SiteController::class, 'about'])->name('about');
Route::get('/products', [SiteController::class, 'products'])->name('products');
Route::get('/career', [SiteController::class, 'career'])->name('career');
Route::get('/contact-us', [SiteController::class, 'contact'])->name('contact');
