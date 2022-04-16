<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('front.home');

Route::get('/about', [HomeController::class, 'about'])->name('front.about');

Route::get('/blog', [HomeController::class, 'blogs'])->name('front.blogs');
Route::get('/blog-details/{slug}', [HomeController::class, 'blogdetails'])->name('front.blogdetails');

Route::get('/work', [HomeController::class, 'portfolio'])->name('front.portfolio');
Route::get('/team', [HomeController::class, 'team'])->name('front.team');
Route::get('/work/{slug}', [HomeController::class, 'portfolioDetails'])->name('front.portfolioDetails');

Route::get('/contact', [HomeController::class, 'contact'])->name('front.contact');

Route::get('/lang/{lang}', [HomeController::class, 'changelanguage'])->name('changeLanguage');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
