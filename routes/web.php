<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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


Route::get('/', 'HomeController@index');
Route::post('/comment/{action}/{id}', 'AdminController@postComment');




Route::group(['prefix' => 'admin', 'middleware' => 'CheckAdmin'], function () {
    Route::get('/', function () {
        return view('backend.home');
    })->name('admin');
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');

    Route::resource('user', 'UserController');
    Route::resource('bill', 'BillController');
});

// });

Route::get('products/changed/{action}/{id}', 'ProductController@action')->name('backend.products.index');
Route::get('categories/{action}/{id}', 'CategoryController@action')->name('backend.categories.index');
Route::get('user/{action}/{id}', 'UserController@action')->name('backend.user.index');
Route::get('user/{action}/{id}', 'UserController@action')->name('backend.user.index');




Route::group(['prefix' => 'login', 'middleware' => 'CheckLogedIn'], function () {
    Route::get('/', 'AdminController@getLogin')->name('get.login');
    Route::post('/', 'AdminController@postLogin');
});
Route::auth();
// Route::get('/register', 'Auth\RegisterController@create');
// Route::get('/register', 'Auth\RegisterController@create');
// Route::get('/register', 'AdminController@getRegister')->name('get.register');
// Route::post('/register', 'AdminController@postRegister');

Route::get('/logout', 'AdminController@getLogout');



Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('categories/{id}', 'CategoryController@show');
Route::get('product/{id}', 'ProductController@showhang');
Route::post('product/{id}', 'ProductController@postComment');
Route::get('cart/delete/{id}', 'CartController@getDeleteCart');


Route::get('/search', 'AdminController@getSearch');

Route::prefix('shopping')->group(function () {
    Route::get('add/{id}', 'CartController@addProduct')->name('add.cart');
    Route::get('/danh-sach', 'CartController@showProduct')->name('get.shopping.cart');
    Route::get('update', 'CartController@getUpdateCart');
    Route::get('delete/{id}', 'CartController@getDeleteCart');
    Route::get('update', 'CartController@getUpdateCart');
});

Route::group(['prefix' => 'thong-tin-khach-hang', 'middleware' => 'CheckLogedUser'], function () {
    Route::resource('profile', 'ProfileController');
    Route::get('/', 'ProfileController@profile')->name('get.profile');

    Route::get('/info', 'ProfileController@updateInfo')->name('get.info');
    Route::post('/info', 'ProfileController@SaveUpdateInfo');
    Route::get('/bill-user', 'ProfileController@getBillUser')->name('get.billuser');
    Route::get('/bill-details/{id}', 'ProfileController@getBillDetails')->name('get.billdetails');
});

Route::group(['prefix' => 'gio-hang', 'middleware' => 'CheckLogedUser'], function () {
    Route::get('/thanh-toan', 'CartController@getFormPay')->name('get.form.pay');
});



Route::post('/checkout', 'CartController@postCheckOut');
Route::get('/complete', 'CartController@getComplete')->name('complete');
