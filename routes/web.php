<?php

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

//Route::get('/', function () {
   // return view('welcome');
//});


//this route is for frontend pages.........
Route::get('/','homeController@index');
Route::get('/about','homeController@about');
Route::get('/delivery','homeController@deliveryFunction');
Route::get('/news','homeController@newsFunction');
Route::get('/contact','homeController@contactFunction');
Route::get('/preview','homeController@previewFunction');

//this route is for admin related.......
Route::get('/admin_panel','adminController@adminFunction');
Route::post('/login_check','adminController@admin_LoginCheck_Function');


//this route is for superadmin related who can control this site.......
Route::get('/dashboard','superadminController@index');
Route::get('/logout','superadminController@logoutFunction');
Route::get('/addcategory','superadminController@addCatFunction');
Route::post('/savecategory', 'superadminController@save_cat_function');
Route::get('/manage_cat','superadminController@manage_cat_function');
Route::get('/unpublished_cat/{id}','superadminController@unpublish_cat_function');
Route::get('/published_cat/{id}','superadminController@publish_cat_function');
Route::get('/delete_cat/{id}','superadminController@delete_cat_function');
Route::get('/edit_cat/{id}','superadminController@edit_cat_function');
Route::post('/updatecategory', 'superadminController@update_cat_function');


//this route is for manufacture specifically.............
Route::get('/add_manufacturer','manufacturerController@index');
Route::get('/manage_manufacturer','manufacturerController@manage_manufacturer_function');
Route::post('/savemanufacturer', 'manufacturerController@save_manufacturer_function');
Route::get('/unpublished_manufacturer/{id}','manufacturerController@unpublish_manufacturer_function');

Route::get('/published_manufacturer/{id}','manufacturerController@publish_manufacturer_function');

Route::get('/delete_manufacturer/{id}','manufacturerController@delete_manufacturer_function');

Route::get('/edit_manufacturer/{id}','manufacturerController@edit_manufacturer_function');
Route::post('/updatemanufacturer', 'manufacturerController@update_manufacturer_function');


//this route is for products related..............
Route::get('/add_product','productController@add_product_function');
Route::post('/save_product','productController@save_product_function');
Route::get('/manage_product','productController@manage_product_function');
Route::get('/unpublished_product/{id}','productController@unpublish_product_function');
Route::get('/published_product/{id}','productController@publish_product_function');
Route::get('/delete_product/{id}','productController@delete_product_function');
Route::get('/edit_product/{id}','productController@edit_product_function');
Route::post('/update_product','productController@update_product_function');

//this route is for shopping cart related..........
Route::post('add-to-cart','shoppingcartController@add_to_cart_function');
Route::get('cart-show','shoppingcartController@cart_show_function');
Route::post('update-cart','shoppingcartController@update_cart_function');
Route::get('remov-product/{rowId}','shoppingcartController@remove_cart_function');














//this is for extra tbale practices
Route::get('/join_query', 'getqueryController@join_query_function');
Route::get('/leftjoin_query', 'getqueryController@leftjoin_query_function');
Route::get('/crossjoin_query', 'getqueryController@crossjoin_query_function');
Route::get('/advancejoin_query', 'getqueryController@advancejoin_query_function');
Route::get('/unions_query', 'getqueryController@unions_query_function');

/*
 * end table practices
 */
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
