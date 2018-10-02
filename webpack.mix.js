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
      'resources/assets/js/owl.carousel.min.js',
      'resources/assets/js/plugins.js',
      'resources/assets/js/cart.js',
      'resources/assets/js/toastr.js',
      'resources/assets/js/order.js',
      'resources/assets/js/jquery.raty.js',
  ],'public/js/All.js');


  mix.styles([
      'resources/assets/css/fontawesome-all.min.css',
      'resources/assets/css/bootstrap3.css',
      'public/css/main2.css',
      'resources/assets/css/stickynavbar.css',
      'resources/assets/css/owl.carousel.min.css',
      'resources/assets/css/owl.theme.default.min.css',
      'resources/assets/css/trending-section.css',
      'resources/assets/css/latest-news.css',
      'resources/assets/css/cart.css',
      'resources/assets/css/toastr.css',
      'resources/assets/css/checkout.css',
      'resources/assets/css/animatedSearch.css',
      'resources/assets/css/searchSidebar.css',
      'resources/assets/css/singleProduct.css',
      'resources/assets/css/jquery.raty.css',




      // 'public/css/main2.css'
  ],'public/css/All.css');


mix.options({
    processCssUrls: false // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
});