<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyorderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocioliteController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WishLishtController;
use App\Http\Controllers\SslCommerzPaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.index');
// });
Route::get('/', [FrontendController::class, 'index'])->name('main');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/name', [ProfileController::class, 'profile_name'])->name('profile.name');
Route::post('/profile/change/password', [ProfileController::class, 'profile_changepassword'])->name('profile.changepassword');
Route::post('/profile./change/photo', [ProfileController::class, 'profile_changephoto'])->name('profile.changephoto');

// User List 
Route::get('/user/list', [ProfileController::class, 'user_list'])->name('user.list');
Route::get('/user/email/{id}', [EmailController::class, 'sendMailWithAttachment'])->name('email');
Route::post('/multipleEmail', [EmailController::class, 'multipleEmail'])->name('multipleEmail');

// Category
Route::resource('category',CategoryController::class);


Route::get('/category/wise/product/{category_id}', [FrontendController::class, 'category_product'])->name('categorywiseproduct');


// Vendor
Route::resource('vendor',VendorController::class);
// Vendor
Route::resource('product',ProductController::class);
Route::get('/shop',[ProductController::class,'shop'])->name('shop');
// Route::post('/find/product',[ProductController::class,'find_product'])->name('find.product');
// Product_details'
Route::get('/product/details/{slug}', [FrontendController::class, 'productdetails'])->name('productdetails');
Route::get('/thumLsit', [ProductController::class, 'thumLsit'])->name('thumLsit');
Route::get('/del/thumb/{id}', [ProductController::class, 'del_thumb'])->name('del.thumb');
// WishLish 
Route::get('/wishlist/insert/{product_id}}', [WishLishtController::class, 'insert'])->name('wishlish.insert');
Route::get('/wishlist/remove/{wishlist_id}}', [WishLishtController::class, 'wishlish_remove'])->name('wishlish.remove');
Route::get('/wishlist/wish', [WishLishtController::class, 'wishlish_view'])->name('wishlish.view');
// Cart
Route::get('/add/cart/{wish_id}', [CartController::class, 'addCart'])->name('addCart');
Route::post('/add/to/cart/{product_id}', [CartController::class, 'add_to_cart'])->name('add.to.cart');
Route::get('/cart', [CartController::class, 'view_cart'])->name('view.cart');
Route::get('/clear/shopping/card/{user_id}', [CartController::class, 'clear_shopping_card'])->name('clear.shopping.card');
Route::get('/single/cart/{id}', [CartController::class, 'single_cart'])->name('single.cart');
Route::post('/update/cart}', [CartController::class, 'updatecart'])->name('updatecart');
// Coupon 
Route::resource('coupon',CouponController::class);
// checkcout 
Route::get('/checkcout}', [CheckoutController::class, 'checkcout'])->name('checkcout');
Route::post('/checkout/cart}', [CheckoutController::class, 'checkout_cart'])->name('checkout_cart');
Route::post('/getCity', [CheckoutController::class, 'getCity'])->name('getCity');
// Location 
Route::get('/location}', [HomeController::class, 'location'])->name('location');
Route::post('/add/location}', [HomeController::class, 'add_location'])->name('add.location');
Route::get('/location/list}', [HomeController::class, 'location_list'])->name('location.list');
Route::get('/edit/country/{country_id}}', [HomeController::class, 'edit_country'])->name('edit.country');
Route::post('/update/country/{country_id}', [HomeController::class, 'update_country'])->name('update.country');

// My orders 
Route::get('/my/orders', [MyorderController::class, 'my_orders'])->name('my.orders');
Route::get('/invoice', [MyorderController::class, 'invoice'])->name('invoice');
Route::get('/order/details/{id}', [MyorderController::class, 'orderdetails'])->name('order.details');
Route::get('/all/orders', [MyorderController::class, 'all_orders'])->name('all.orders');
Route::get('/mark/as/received/{id}', [MyorderController::class, 'mark_as_received'])->name('mark.as.received');
Route::post('/rating/{id}', [MyorderController::class, 'rating'])->name('rating');



// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

// ============================================================
// pay link ta post chilo get kora hoyeche 
Route::get('/pay', [SslCommerzPaymentController::class, 'index']);
// ============================================================



Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

// Laravel sociolite for github
Route::get('/github/redirect', [SocioliteController::class, 'githubredirect'])->name('github.redirect');
Route::get('/github/callback', [SocioliteController::class, 'githubCallback'])->name('github.Callback');
// Laravel sociolite for google
Route::get('/google/redirect', [SocioliteController::class, 'googleredirect'])->name('google.redirect');
Route::get('/google/callback', [SocioliteController::class, 'googleCallback'])->name('google.Callback');
