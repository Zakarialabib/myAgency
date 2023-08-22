<?php

declare(strict_types=1);
use App\Http\Controllers\Admin\FeaturedBannerController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamController;
use App\Livewire\Admin\Contacts;
use App\Livewire\Admin\Language\EditTranslation;
use App\Livewire\Admin\Dashboard as DashboardIndex;
use App\Livewire\Admin\Page\Index as PageIndex;
use App\Livewire\Admin\Language\Index as LanguageIndex;
use App\Livewire\Admin\Slider\Index as SliderIndex;
use App\Livewire\Admin\Section\Index as SectionIndex;
use App\Livewire\Admin\Project\Index as ProjectIndex;
use App\Livewire\Admin\Users\Index as UserIndex;
use App\Livewire\Admin\Blog\Index as BlogIndex;
use App\Livewire\Admin\BlogCategory\Index as BlogCategoryIndex;
use App\Livewire\Admin\Service\Index as ServiceIndex;
use App\Livewire\Admin\Category\Index as CategoryIndex;
use App\Livewire\Admin\Email\Index as EmailIndex;
use App\Livewire\Admin\Menu\Index as MenuIndex;
use App\Livewire\Admin\Backup\Index as BackupIndex;
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
    Route::get('/dashboard', DashboardIndex::class)->name('dashboard');

    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    // Contact
    Route::get('/contact', Contacts::class)->name('contacts');

    // Categories
    Route::get('/categories', CategoryIndex::class)->name('categories.index');

    // FeaturedBanners
    Route::get('/featuredBanners', [FeaturedBannerController::class, 'index'])->name('featuredBanners');

    // Sliders
    Route::get('/sliders', SliderIndex::class)->name('sliders');

    // Pages
    Route::get('/pages', PageIndex::class)->name('pages');

    // Blogs
    Route::get('/blogs', BlogIndex::class)->name('blogs.index');

    // Bcategories
    Route::get('/blog-categories', BlogCategoryIndex::class)->name('blog-categories.index');

    // Languages
    Route::get('/language', LanguageIndex::class)->name('language');
    Route::get('/translation/{code}', EditTranslation::class)->name('translation');

    // Project
    Route::get('projects', ProjectIndex::class)->name('projects.index');

    // Service
    Route::get('/services', ServiceIndex::class)->name('services.index');

    // Sections
    Route::get('/sections', SectionIndex::class)->name('sections');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::get('/roles', [RolesController::class, 'index'])->name('roles');

    // Users
    Route::get('users', UserIndex::class)->name('users.index');

    // Setting
    Route::get('/popupsettings', [SettingController::class, 'popupsettings'])->name('setting.popupsettings');
    Route::get('/redirects', [SettingController::class, 'redirects'])->name('setting.redirects');
    Route::get('/backup', BackupIndex::class)->name('setting.backup');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('/email-template', EmailIndex::class)->name('email-templates');
    Route::get('/email-settings', [SettingController::class, 'emailSettings'])->name('email-settings');
    Route::get('/menu-settings', MenuIndex::class)->name('menu-settings.index');
});
