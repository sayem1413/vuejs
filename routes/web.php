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
//    //return resource_path('views');(Example from BITM)
//    return view('welcome');
//});

Route::get('/', 'HomeViewController@index');
Route::get('/published/categories', 'CategoryController@manageCategory');

Route::get('/latest/products', 'HomeViewController@latestProducts');

// Just Practise JFile
//Route::get('/mens-category','MensCategoryController@mensCategoryView');
//Route::get('/womens-category','WomensCategoryController@womensCategoryView');
//Route::get('/electronics','ElectronicsController@electronicsView');
//Route::get('/products-codes','ProductsCodesController@productsCodesView');
//Route::get('/contact','ContactController@contactView');
//Route::post('/cart/add', function (Request $request) {
//    $result = $request;
//    echo '<pre>';
//    print_r($result);
//});


Route::get('/cart/add/{id}','CartController@addToCart');
Route::get('/cart/show','CartController@viewCart');
Route::get('/cart/delete/{id}','CartController@deleteCartProduct');

Route::get('/checkout','CheckOutController@index');
Route::post('/checkout/sign-up','CheckOutController@customerRegistration');
Route::get('/checkout/shipping','CheckOutController@showShippingForm');
Route::post('/checkout/save-shipping','CheckOutController@saveShippingInfo');
Route::get('/checkout/payment','CheckOutController@showPaymentForm');
Route::post('/checkout/save-order','CheckOutController@saveOrderInfo');
Route::get('/checkout/my-home','CheckOutController@customerHome');

//Route::get('/product-details','ProductDetailsViewController@viewProductDetails');
//Just Practise JFile

Route::get('/category-view/{id}', 'WelcomeController@category');
Route::get('/product-details/{id}', 'WelcomeController@productDetails');

Auth::routes();

Route::get("/test","WelcomeController@test");

Route::get('/dashboard', 'HomeController@index')->name('home');



//For Middleware Group
Route::group(['middleware' => 'AuthenticateMiddleware'], function() {

/* Category Info */
//For Specific Middleware
//Route::get('/category/add','CategoryController@index')->middleware('AuthenticateMiddleware');
//For Specific Middleware
    Route::get('/category/add', 'CategoryController@index');
    Route::post('/category/save', 'CategoryController@store');

    Route::get('/category/manage', 'CategoryController@manageCategory');
    Route::get('/category/edit/{id}', 'CategoryController@edit');
    Route::post('/category/update/{id}', 'CategoryController@update');
    Route::get('/category/delete/{id}', 'CategoryController@destroy');
    /* Category Info */

    /* Manufacturer Info */
    Route::get('/manufacturer/add', 'ManufacturerController@index');
    Route::post('/manufacturer/save', 'ManufacturerController@store');

    Route::get('/manufacturer/manage', 'ManufacturerController@manageManufacturer');
    Route::get('/manufacturer/edit/{id}', 'ManufacturerController@edit');
    Route::post('/manufacturer/update/{id}', 'ManufacturerController@update');
    Route::get('/manufacturer/delete/{id}', 'ManufacturerController@destroy');
    /* Manufacturer Info */

    /* Product Info */
    Route::get('/product/add', 'ProductController@index');
    Route::post('/product/save', 'ProductController@store');

    Route::get('/product/manage', 'ProductController@manageProduct');
    Route::get('/product/view/{id}', 'ProductController@show');
    Route::get('/product/edit/{id}', 'ProductController@edit');
    Route::post('/product/update/{id}', 'ProductController@update');
    Route::get('/product/delete/{id}', 'ProductController@destroy');
    /* Product Info */
    
    /* User Info */
    Route::get('/user/add', 'UserController@index');
    Route::post('/user/save', 'UserController@store');

    Route::get('/user/manage', 'UserController@manageUser');
    Route::get('/user/view/{id}', 'UserController@show');
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::post('/user/update', 'UserController@update');
    Route::get('/user/delete/{id}', 'UserController@destroy');
    /* User Info */
});
//For Middleware Group















