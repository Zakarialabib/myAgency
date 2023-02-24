<?php

declare(strict_types=1);

if (! function_exists('settings')) {
    function settings()
    {
        return cache()->rememberForever('settings', function () {
            return \App\Models\Settings::firstOrFail();
        });
    }
}


function flagImageUrl($language_code)
{
    return asset("images/flags/{$language_code}.png");
}

function getSlug($request, $key)
{
    $language_default = \App\Models\Language::query()
        ->where('is_default', \App\Models\Language::IS_DEFAULT)
        ->select('code')
        ->first();
    $language_code = $language_default->code;
    $value = $request[$language_code][$key];

    return \Illuminate\Support\Str::slug($value);
}
