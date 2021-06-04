<?php
use App\Event\UserCreated;
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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('admin/dashboard', 'dashboardController@dashboard')
    ->middleware('role:admin')
    ->name('dashboard');
//login google
Route::get('/login-google', function () {
    return Socialite::with('Google')->redirect();
})->name('login-google');
Route::get(
    '/google-callback',
    'Auth\socialiteController@loginGoogleCallback'
)->name('google-callback');
//login fb
Route::get('/login-facebook', function () {
    return Socialite::with('facebook')->redirect();
})->name('login-facebook');
Route::get(
    '/facebook-callback',
    'Auth\socialiteController@facebookCallback'
)->name('facebook-callback');
Auth::routes();

// route category
Route::resource('admin/category', 'Admin\CategoryAdminController', [
    'names' => 'adminCategory',
])->middleware('role:admin');
// route slider
Route::resource('admin/slider', 'Admin\SliderController', [
    'names' => 'adminSlider',
])->middleware('role:admin');





Route::get('/admin', 'AdminController@Home')
    ->middleware('role:admin')
    ->name('AdminHome');
// route user
Route::get('/profile', 'UserController@profile')
    ->middleware('role:user')
    ->name('profile');
Route::get('/admin/ShowListUser', 'UserController@showlistUser')
    ->middleware('role:admin')
    ->name('ShowListUser');
Route::resource('admin/product', 'ProductController', [
    'names' => 'product',
])->middleware('auth');
Route::get('/admin/create', 'UserController@CreateUser')
    ->middleware('role:admin')
    ->name('createUser');
Route::get('/admin/edit/{id}', 'UserController@EditUser')
    ->middleware('role:admin')
    ->name('EditUser');
Route::post('/admin/storeUser', 'UserController@storeUser')
    ->middleware('role:admin')
    ->name('storeUser');
Route::put('/admin/update/{id}', 'UserController@UpdateUser')
    ->middleware('role:admin')
    ->name('UpdateUser');
Route::get('/admin/DeleteUser/{id}', 'UserController@DeleteUser')
    ->middleware('role:admin')
    ->name('DeleteUser');
    //delete category
Route::get(
    '/admin/delete/{id}',
    'Admin\CategoryAdminController@deleteForm'
)->name('deleteCategory');
//product detail
Route::get('/product-detail/{id}', 'ProductController@ProductDetail');

// change password user
Route::get('/admin/password', 'UserController@ChangePasswordUser')
    ->middleware('auth')
    ->name('ChangePasswordUser');
Route::post('/admin/storePassword', 'UserController@storePassword')
    ->middleware('auth')
    ->name('storePassword');
//checkout
Route::post('/checkout', 'CustomerController@checkout')->name('checkout');
Route::get(
    '/admin/DeleteCustomerOrder/{id}',
    'CustomerController@DeleteCustomerOrder'
)
    ->middleware('role:admin')
    ->name('DeleteCustomerOrder');

Route::get('/event', 'HomeController@event')->name('event');

Route::get('/get', 'CustomerController@index')->name('index');

Route::get('{url}', function ($name) {
    return view('welcome');
})->where('url', '[A-Za-z0-9-]+');
