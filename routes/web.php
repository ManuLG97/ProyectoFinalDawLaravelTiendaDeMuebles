<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('home');
});

Route::get('info_product/{id}', 'HomeController@show')
    ->name('home.show');
Route::resource('info_product','HomeController@show');
/*
Route::get('info_product/{id}', 'UserController@show')
    ->name('user.show');
Route::resource('info_product','UserController@show');
*/


Route::get('/contact/contacto','HomeController@contactar');

Route::get('ofertas','HomeController@ofertas');
Route::get('novedades','HomeController@novedades');



Route::group(['middleware' => ['web']], function () {
    return view('products.all_products');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user','UserController')->middleware('auth','role:user');

Route::get('/admin/admin_home','HomeController@index');

Route::resource('admin','AdminController')->middleware('auth','role:admin');

Route::resource('products','ProductoController')->middleware('auth','role:admin');

Route::get('create', 'ProductoController@create')->middleware('auth','role:admin');
// agregar nombre
Route::get('create', 'ProductoController@create')
    ->name('producto.create')->middleware('auth','role:admin');//con este llamas en la vista
Route::resource('producto', 'ProductoController')->middleware('auth','role:admin');


Route::get('show', 'ProductoController@show')->middleware('auth','role:admin');
Route::get('products.all_products', 'ProductoController@show')
    ->name('producto.show')->middleware('auth','role:admin');//con este llamas en la vista
Route::resource('producto', 'ProductoController')->middleware('auth','role:admin');


Route::get('index', 'AdminController@index')->middleware('auth','role:admin');
Route::get('admin.admin_home', 'AdminController@index')
    ->name('admin.index')->middleware('auth','role:admin');//con este llamas en la vista
Route::resource('admin', 'AdminController')->middleware('auth','role:admin');



Route::get('products.all_products', function () {
    return view('products.all_products', compact('products'))->middleware('auth','role:admin');
});


Route::resource('contacto','ContactoController')->middleware('auth','role:user');
Route::resource('contacto','ContactoController')->middleware('auth','role:admin');



Route::get('users', 'AdminController@users')->middleware('auth','role:admin');

Route::get('users', 'AdminController@users')
    ->name('admin.users')->middleware('auth','role:admin');//con este llamas en la vista
Route::resource('admin', 'AdminController')->middleware('auth','role:admin');



Route::resource('/admin/users_info','AdminController');

Route::put('/admin/{id}/update', 'AdminController@update')->name('admin.update');
Route::resource('/admin/users_info','AdminController@users');

Route::put('/admin/{id}/store', 'AdminController@update')->name('admin.update');
Route::resource('/admin/users_info','AdminController@users');



Route::delete('/user/{id}/delete', 'AdminController@destroy')->name('admin.destroy');
Route::resource('/admin/users_info','AdminController@users');



Route::resource('/products/all_products','ProductoController');


Route::get('/products/info_product/{id}', 'ProductoController@info')
    ->name('producto.info')->middleware('auth','role:admin');
Route::resource('products.info_product','ProductoController@info');



Route::delete('/user/{id}/delete', 'AdminController@destroy')->name('admin.destroy');
Route::resource('/admin/users_info','AdminController@users');

Route::resource('/products/all_products','ProductoController@store');
Route::resource('products','ProductoController');



Route::get('adminofertas', 'UserController@adminofertas');
Route::get('adminnovedades', 'UserController@adminnovedades');


