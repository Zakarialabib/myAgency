<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;
use App\Models\Language;
use App\Models\SectionTitle;
use Illuminate\Support\Facades\Artisan;
use Spatie\Ignition\Ignition;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    Ignition::make()->register();

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {

            $lang = Language::where('is_default', '1')->first();
            
            if (session()->has('lang')) {
                $currentLang = Language::where('code', session()->get('lang'))->first();

                $view->with('currentLang', $currentLang);

            } else {
                $currentLang = Language::where('is_default', 1)->first();

                $view->with('currentLang', $currentLang);
            }
            
            $langs = Language::all();
            $view->with('langs', $langs );
            $view->with('lang', $lang );
            // dd($lang);
            
        });
    }
    
}
