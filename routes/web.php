<?php

use Illuminate\Support\Facades\Route;

use App\Producto;

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

Route::get('/artisan/storage', function() {
    $command = 'storage:link';
    $result = Artisan::call($command);
    return Artisan::output();
});



Route::get('info_product/{id}', 'HomeController@show')
    ->name('home.show');
Route::resource('info_product','HomeController@show');


//comentarios
Route::get('comments/{id}', 'CommentsController@show')
    ->name('comments.show');
Route::resource('comments','CommentsController@show');

Route::post('comments/{id}',
    ['uses'=>'CommentsController@store', 'as'=>'comments.store']
);

Route::delete('/comments/{id}/delete', 'CommentsController@destroy')->name('comments.destroy');





Route::get("search", "HomeController@search");


Route::get('/contact/contacto','HomeController@contactar');

Route::get('ofertas','HomeController@ofertas');
Route::get('novedades','HomeController@novedades');


Route::get('armarios', 'HomeController@armarios');
Route::get('camas', 'HomeController@camas');
Route::get('comodas', 'HomeController@comodas');
Route::get('escritorios', 'HomeController@escritorios');
Route::get('estanterias', 'HomeController@estanterias');
Route::get('lamparas', 'HomeController@lamparas');
Route::get('librerias', 'HomeController@librerias');
Route::get('mesas', 'HomeController@mesas');
Route::get('sillas', 'HomeController@sillas');
Route::get('sillones', 'HomeController@sillones');
Route::get('sofas', 'HomeController@sofas');
Route::get('taburetes', 'HomeController@taburetes');




Route::get('cart', 'CartController@index')->name('cart.index');


Route::post('cart', 'CartController@add')->name('cart.add');


Route::group(['middleware' => ['web']], function () {
    return view('products_admin.all_products');
});



Auth::routes();

Route::get('/add-to-cart/{id}',[
    'uses'=>'CartController@getAddToCart',
    'as' =>'product.addToCart'
])->middleware('auth','role:user');


Route::get('/add-to-cart-product/{id}',[
    'uses'=>'CartController@getAddToCartProduct'
])->middleware('auth','role:user');



Route::get('/shopping-cart',[
    'uses'=>'CartController@getCart',
    'as' =>'product.shoppingCart'
]);


Route::get('/checkout',[
    'uses'=>'CartController@getCheckout',
    'as'=>'checkout'
])->middleware('auth','role:user');


Route::get('/remove',[
    'uses'=>'CartController@removeAllItems',
    'as'=>'product.remove'
])->middleware('auth','role:user');




Route::get('shopping-delete-product','CartController@destroy');

Route::resource('shopping-delete-product','CartController');



Route::get('/shopping-cart-delete','UserController@destroy');

Route::resource('/shopping-cart-delete','UserController');




Route::get('/invoice/', 'FacturaController@index')->name('factura.index');
Route::post('/invoice/', 'FacturaController@store')->name('factura.store');



/*
 *
    Route::get('/post/{post}', 'PostController@show')->name('posts.show');
    Route::post('/post/{post}/comment', 'CommentController@store')->name('comments.store');
Route::name('create_comment_path')->post('/info_product/{post}','PostController@store')->middleware('auth','role:user');


Route::name('create_comment_path')->post('/info_product/{post}/coments','PostComentsController@create')->middleware('auth','role:user');
*/

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user','UserController')->middleware('auth','role:user');

Route::get('/admin/admin_home','HomeController@index');

Route::resource('admin','AdminController')->middleware('auth','role:admin');

Route::resource('products_admin','ProductoController')->middleware('auth','role:admin');

Route::get('create', 'ProductoController@create')->middleware('auth','role:admin');
// agregar nombre
Route::get('create', 'ProductoController@create')
    ->name('producto.create')->middleware('auth','role:admin');//con este llamas en la vista
Route::resource('producto', 'ProductoController')->middleware('auth','role:admin');


Route::get('show', 'ProductoController@show')->middleware('auth','role:admin');
Route::get('products_admin.all_products', 'ProductoController@show')
    ->name('producto.show')->middleware('auth','role:admin');//con este llamas en la vista
Route::resource('producto', 'ProductoController')->middleware('auth','role:admin');


Route::get('index', 'AdminController@index')->middleware('auth','role:admin');
Route::get('admin.admin_home', 'AdminController@index')
    ->name('admin.index')->middleware('auth','role:admin');//con este llamas en la vista
Route::resource('admin', 'AdminController')->middleware('auth','role:admin');



Route::get('products_admin.all_products', function () {
    return view('products_admin.all_products', compact('products_admin'))->middleware('auth','role:admin');
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



Route::resource('/products_admin/all_products','ProductoController');


Route::get('/products_admin/info_product/{id}', 'ProductoController@info')
    ->name('producto.info')->middleware('auth','role:admin');
Route::resource('products_admin.info_product','ProductoController@info');



Route::delete('/user/{id}/delete', 'AdminController@destroy')->name('admin.destroy');
Route::resource('/admin/users_info','AdminController@users');

Route::resource('/products_admin/all_products','ProductoController@store');
Route::resource('products_admin','ProductoController');



Route::get('admin_ofertas', 'UserController@admin_ofertas');
Route::get('admin_novedades', 'UserController@admin_novedades');

Route::get('admin_armarios', 'UserController@admin_armarios');
Route::get('admin_camas', 'UserController@admin_camas');
Route::get('admin_comodas', 'UserController@admin_comodas');
Route::get('admin_escritorios', 'UserController@admin_escritorios');
Route::get('admin_estanterias', 'UserController@admin_estanterias');
Route::get('admin_lamparas', 'UserController@admin_lamparas');
Route::get('admin_librerias', 'UserController@admin_librerias');
Route::get('admin_mesas', 'UserController@admin_mesas');
Route::get('admin_sillas', 'UserController@admin_sillas');
Route::get('admin_sillones', 'UserController@admin_sillones');
Route::get('admin_sofas', 'UserController@admin_sofas');
Route::get('admin_taburetes', 'UserController@admin_taburetes');

Route::get("admin_search", "UserController@search");