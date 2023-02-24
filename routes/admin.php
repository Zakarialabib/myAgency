<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeaturedBannerController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Livewire\Admin\Contacts;
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:ADMIN']], function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    // Contact
    Route::get('/contact', Contacts::class)->name('contact');

    // Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

    // FeaturedBanners
    Route::get('/featuredBanners', [FeaturedBannerController::class, 'index'])->name('featuredBanners');

    // Sliders
    
    Route::get('/sliders', [SliderController::class, 'index'])->name('sliders');

    // Pages
    Route::get('/pages', [PageController::class, 'index'])->name('pages');

    // Blogs
    Route::resource('blogs', BlogController::class, ['except' => ['store', 'update', 'destroy']]);

    // Bcategories
    Route::get('blog-categories', [BlogCategoryController::class,'index'])->name('blog-categories.index');

    // Languages
    Route::get('language', [LanguageController::class, 'index'])->name('language.index');

    // Project
    Route::resource('projects', ProjectController::class, ['except' => ['store', 'update', 'destroy']]);

    // Service
    Route::resource('services', ServiceController::class, ['except' => ['store', 'update', 'destroy']]);

    // Sections
    Route::resource('sections', SectionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Notification
    Route::get('/notification', [NotificationController::class, 'index'])->name('notification');

    // Setting
    Route::get('/popupsettings', [SettingController::class, 'popupsettings'])->name('setting.popupsettings');
    Route::get('/redirects', [SettingController::class, 'redirects'])->name('setting.redirects');
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('email-settings', [SettingController::class, 'emailSettings'])->name('email-settings');
});
