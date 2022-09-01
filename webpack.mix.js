const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js');
mix.js('resources/js/components/Sample.js', 'public/js');
mix.js('resources/js/components/Task.js', 'public/js');
mix.js('resources/js/swiper.js', 'public/js');
mix.css('resources/css/swiper.css', 'public/css');
   // .sass('resources/sass/app.scss', 'public/css');
