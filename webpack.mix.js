const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

    mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
    ]);

    mix.styles([  
        'public/css/style.css', 
        'public/css/animate.min.css',
    ], 'public/assets/css/vendors.css');    

    mix.scripts([  
    'public/js/main.js',
    'public/assets/js/popper.min.js', 
    'public/js/anime.min.js',
    'public/js/scrollreveal.min.js', 
    ], 'public/assets/js/vendors.js');    