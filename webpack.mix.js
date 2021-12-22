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

mix.js('resources/js/app.js', 'public/js')
  .js('resources/js/dashboard/dashboard-app.js', 'public/js/dashboard/main').vue()
  .js('resources/js/dashboard/global-scripts.js', 'public/js/dashboard/main')
  .sass('resources/sass/dashboard/dashboard-app.scss', 'public/css/dashboard', [])
  .sass('resources/sass/app.scss', 'public/css')
  .version();
