<?php

use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\SiteController::class, 'index']);
;
Route::get('/orderDetails/{id}', [App\Http\Controllers\SiteController::class, 'orderDetails'])->name('orderDetails.view');
;
Route::get('/order', [App\Http\Controllers\SiteController::class, 'order'])->name('order');
;

Route::get('/profile', [App\Http\Controllers\SiteController::class, 'profile'])->name('profile');
;
Route::get('/watchlist', [App\Http\Controllers\SiteController::class, 'watchlist'])->name('watchlist');
;
Route::post('/add-to-cart/{product}', [App\Http\Controllers\SiteController::class, 'addToCart'])->name('add.to.cart');
Route::get('/shopProduct/{slug}',[App\Http\Controllers\SiteController::class,'shopProduct'])->name('shopProduct');
Route::get('/cart',[App\Http\Controllers\SiteController::class,'showCart'])->name('cart');
Route::post('/update-cart', [App\Http\Controllers\SiteController::class, 'updateCart'])->name('updateCart');
Route::delete('remove-from-cart', [App\Http\Controllers\SiteController::class, 'remove'])->name('remove.from.cart');

Route::get('/checkout', [App\Http\Controllers\SiteController::class, 'checkout'])->name('checkout.index');

Route::post('single-addto-cart', [App\Http\Controllers\SiteController::class, 'singleaddtocart'])->name('single.addto.cart');

Route::post('/orderplace', [App\Http\Controllers\SiteController::class, 'orderplace'])->name('orderplace.data');


Route::get('/ordersuccess/{id}', [App\Http\Controllers\SiteController::class, 'ordersuccess'])->name('ordersuccess'); 

 
Route::post('/profileudate', [App\Http\Controllers\SiteController::class, 'profileudate'])->name('profileudate'); 
Route::post('/change-password', [App\Http\Controllers\SiteController::class, 'updatePassword'])->name('update-password');


Route::get('/wishlist/{id}',[App\Http\Controllers\SiteController::class,'wishlistShow'])->name('wishlist.add');
Route::get('/wishlist',[App\Http\Controllers\SiteController::class,'wishlist'])->name('wishlist');
Route::post('/wishlists',[App\Http\Controllers\SiteController::class,'removeWishlist'])->name('wishlist.delete');
Route::post('/updateWishlist',[App\Http\Controllers\SiteController::class,'updateWishlist'])->name('updateWishlist');




Route::prefix('admin')->group(function () {
	Route::group(['middleware' => ['admin']], function () {
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
Route::get('/productlist', [App\Http\Controllers\AdminController::class, 'productList'])->name('productlist');
;
Route::get('/addproduct', [App\Http\Controllers\AdminController::class, 'addProduct'])->name('addproduct');
;
Route::post('/product-add', [App\Http\Controllers\AdminController::class, 'productInsert'])->name('product.add');

Route::get('/products/{product}/edit', [App\Http\Controllers\AdminController::class, 'productEdit'])->name('product.edit');

Route::get('/productsdelect/{product}', [App\Http\Controllers\AdminController::class, 'productDelete'])->name('product.productDelete');
Route::patch('/productsupdate/{product}', [App\Http\Controllers\AdminController::class, 'productUpdate'])->name('product.update');
Route::get('/order', [App\Http\Controllers\AdminController::class, 'allOrder'])->name('order.list');
Route::get('/orderDetails/{id}', [App\Http\Controllers\AdminController::class, 'orderDetails'])->name('orderDetails');



});
});
