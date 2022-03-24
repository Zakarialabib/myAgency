<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Language;

class SetLangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('lang')) {
           app()->setLocale(session()->get('lang'));
         } else {
           $defaultLang = Language::where('is_default', 1)->first();
           if (!empty($defaultLang)) {
             app()->setLocale($defaultLang->code);
           }
         }

        return $next($request);
    }
}