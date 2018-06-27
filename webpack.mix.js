let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js');
  mix.sass('resources/assets/sass/app.scss', 'public/css')
     .sass('resources/assets/SCSS/main2.scss', 'public/css');


  mix.js([
      'resources/assets/js/jquery.min.js',
      'resources/assets/js/bootstrap.js',
      'resources/assets/js/sticynavbar.js',
  ],'public/js/All.js');


  mix.styles([
      'resources/assets/css/fontawesome-all.min.css',
      'resources/assets/css/bootstrap3.css',
      'public/css/main2.css',
      'resources/assets/css/stickynavbar.css',


      // 'public/css/main2.css'
  ],'public/css/All.css');


mix.options({
    processCssUrls: false // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
});