<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeaturedBannerController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Livewire\Admin\Contacts;
use App\Http\Livewire\Admin\Project\Index as ProjectIndex;
use App\Http\Livewire\Admin\Users\Index as UserIndex;
use App\Http\Livewire\Admin\Blog\Index as BlogIndex;
use App\Http\Livewire\Admin\Service\Index as ServiceIndex;
use App\Http\Livewire\Admin\Category\Index as CategoryIndex;
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
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin']], function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    // Contact
    Route::get('/contact', Contacts::class)->name('contact');

    // Categories
    Route::get('/categories', CategoryIndex::class)->name('categories.index');

    // FeaturedBanners
    Route::get('/featuredBanners', [FeaturedBannerController::class, 'index'])->name('featuredBanners');

    // Sliders
    Route::get('/sliders', [SliderController::class, 'index'])->name('sliders');

    // Pages
    Route::get('/pages', [PageController::class, 'index'])->name('pages');

    // Blogs
    Route::get('blogs', BlogIndex::class)->name('blogs.index');

    // Bcategories
    Route::get('blog-categories', [BlogCategoryController::class,'index'])->name('blog-categories.index');

    // Languages
    Route::get('language', [LanguageController::class, 'index'])->name('language.index');

    // Project
    Route::get('projects', ProjectIndex::class)->name('projects.index');

    // Service
    Route::get('/services', ServiceIndex::class)->name('services.index');

    // Sections
    Route::get('sections', [SectionController::class, 'index'])->name('sections');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::get('users', UserIndex::class)->name('users.index');

    // Notification
    Route::get('/notification', [NotificationController::class, 'index'])->name('notification');

    // Setting
    Route::get('/popupsettings', [SettingController::class, 'popupsettings'])->name('setting.popupsettings');
    Route::get('/redirects', [SettingController::class, 'redirects'])->name('setting.redirects');
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('email-settings', [SettingController::class, 'emailSettings'])->name('email-settings');
});
