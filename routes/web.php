<?php
/** checkout process*/
        //what i need now
use App\Models\Post;
use App\Models\products;

/** Stage 01**/
        //01-button or link  to get me to the checkout page ...[.. orders model ..]
        //02-The Design of the page ...[.. 6panels ..]

        /** Stage 02**/
        //03-create model for orders
        //04-create controller for the orders
        //05-set relations between the user and orders
        /** Stage 03**/

        //06- think about page as form [create order] action =>payment/post
        //07- billing Method
        /**
         **** as Guest
         **** login for future convenience  [order-History]
         ****
         */
        //08-billing info
        /**
         **** use the same registered address
         **** Enter another address
         ****
         */
        //09-Shipping info
        /**
         **** use the same registered address for Shipping
         **** Enter another address
         *********** Tell the user if the shipping for free or not
         *********** important... associate each product with shipping info
         ****
         */
        //10-payment Method
        /**
         **** cash on Delivery
         **** Paypal
         *
         */

        //11-view all cart items

        //12-confirm the order




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

Auth::routes();

Route::get('/', function () {
    // redirect to the website at the first time  ... from the website the user will login and register
    $products=products::paginate(5);
    $posts=Post::orderBy('id', 'DESC')->paginate(5);
    return view('Website.Products.index',compact('products','posts'));
})->name('home');




//login with social networks [twitter,Gmail,Github]
Route::get('auth/{provider}', 'AuthSocialController@redirectToProvider'); //send request to twitter to get user info
Route::get('auth/{provider}/callback', 'AuthSocialController@handleProviderCallback');

//product [website part]

Route::get('products/cart',function (){
    return view('Website.Products.DetailedCartpage');
});

// website  routes for cart
Route::group(['prefix' => '/carts'], function () {
    Route::post('cart/add', 'CartWebsiteController@addCart');
    Route::post('cart/delete', 'CartWebsiteController@deleteCart');
//    Route::post('cart/edit', 'CartWebsiteController@editCart');
    Route::post('cart/update', 'CartWebsiteController@updateCart');
    Route::post('cart/clear', 'CartWebsiteController@clearCart');

    Route::get('/cart/latest{page?}', 'CartWebsiteController@latest');


});

//  checkout process:
Route::group(['prefix' => '/orders'], function () {

    Route::get('/','OrdersController@index');
    Route::post('/order/payment/post','OrdersController@payment');
    Route::get('/payment/success','OrdersController@getpayment');

});

//search

Route::get('/search','SearchController@search');

//coupons
Route::post('/coupons','CouponsController@checkCoupon');

//blog


Route::get('/blog','BlogController@index')->name('websiteBlog');

Route::get('/blog/{id}/{slug?}','BlogController@article');

Route::get('/search/blog/{word}','BlogController@search');

Route::get('/profile/edit/{id}','profileController@edit')->name('profileEdit');

Route::put('/profile/{id}','profileController@update')->name('profileStore');


//Route::resource('profile', 'profileController');



//Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//    \UniSharp\LaravelFilemanager\Lfm::routes();
//});
