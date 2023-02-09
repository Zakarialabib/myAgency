<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Livewire\Admin\Contacts;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BcategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Livewire\Admin\About\Index as AboutIndex;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\SectionController;

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

    Route::get('/', [AdminHomeController::class, 'index'])->name('dashboard');
    
    Route::get('/contact', Contacts::class)->name('contact');
    
    // About
    Route::get('/about', AboutIndex::class)->name('about.index');
    Route::resource('about', AboutController::class, ['except' => ['index']]);

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Blogs
    Route::resource('blogs', BlogController::class, ['except' => ['store', 'update', 'destroy']]);

    // Bcategories
    Route::resource('bcategories', BcategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Languages
    Route::resource('languages', LanguageController::class, ['except' => ['store', 'update', 'destroy']]);

    // Menu
    Route::resource('menu', MenuController::class, ['except' => ['store', 'update', 'destroy']]);

    // Portfolio
    Route::resource('portfolios', PortfolioController::class, ['except' => ['store', 'update', 'destroy']]);

    // Service
    Route::resource('services', ServiceController::class, ['except' => ['store', 'update', 'destroy']]);

    // Team
    Route::resource('teams', TeamController::class, ['except' => ['store', 'update', 'destroy']]);
    
    // Sections
    Route::resource('sections', SectionController::class, ['except' => ['store', 'update', 'destroy']]);
    
    // Setting
    Route::resource('settings', SettingController::class, ['except' => ['store', 'update', 'destroy']]);

    Route::get('languages', [LanguageController::class, 'index'])->name('language.index');
    Route::get('language/edit/{id}', [LanguageController::class, 'langEdit'])->name('language-key');
    Route::post('store-lang-key/{id}',[LanguageController::class, 'storeLanguageJson'])->name('store-lang-key');
    Route::post('update-lang-key/{id}', [LanguageController::class, 'updateLanguageJson'])->name('update-lang-key');
    Route::post('delete-lang-key/{id}', [LanguageController::class, 'deleteLanguageJson'])->name('delete-lang-key');
    Route::post('settings/language/import',[LanguageController::class, 'langImport'])->name('language.import_lang');
    Route::post('translations/update', [LanguageController::class , 'transUpdate'])->name('translation.update.json');
    Route::post('translations/updateKey', [LanguageController::class, 'transUpdateKey'])->name('translation.update.json.key');
    Route::delete('translations/destroy/{key}', [LanguageController::class, 'destroy'])->name('translations.destroy'); 
    Route::post('translations/create', [LanguageController::class ,'store'])->name('translations.create');

});