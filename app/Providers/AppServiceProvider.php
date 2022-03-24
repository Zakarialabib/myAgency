<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;
use App\Models\Social;
use App\Models\Language;
use App\Models\SectionTitle;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $socials = Social::get();

            $lang = Language::where('is_default', '1')->first();
            $setting = Setting::where('language_id', $lang->id)->first();

            
                if (session()->has('lang')) {
                $currentLang = Language::where('code', session()->get('lang'))->first();

                $setting = Setting::where('language_id', $currentLang->id)->first();

                $view->with('setting', $setting);
                $view->with('currentLang', $currentLang);

              } else {
                $currentLang = Language::where('is_default', 1)->first();

                $setting = Setting::where('language_id', $currentLang->id)->first();

                $view->with('setting', $setting);
                $view->with('currentLang', $currentLang);
              }


            $langs = Language::all();
            $view->with('langs', $langs );
            $view->with('lang', $lang );
            $view->with('socials', $socials );
            
        });
    }
    
}
