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

//Back-end
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', function(){
        return view('admin.dashboard');
    });
    Route::middleware(['can:review_category'])->group(function () {
        Route::get('/add-category','Backend\CategoryController@add_category_product');
        Route::get('/all-category','Backend\CategoryController@all_category_product');
        Route::post('/save-category-product','Backend\CategoryController@save_category_product');
        Route::get('/edit-category/{category_product_id}','Backend\CategoryController@edit_category_product');
        Route::get('/delete-category/{category_product_id}','Backend\CategoryController@delete_category_product');
        Route::post('/update-category-product/{id}','Backend\CategoryController@update_category_product');

    });

    //Category Product

    //Author Product
    Route::middleware(['can:view_author'])->group(function () {
        Route::get('/add-author','Backend\AuthorController@add_author_product');
        Route::get('/all-author','Backend\AuthorController@all_author_product');
        Route::post('/save-author-product','Backend\AuthorController@save_author_product');
        Route::get('/edit-author/{id}','Backend\AuthorController@edit_author_product');
        Route::get('/delete-author/{id}','Backend\AuthorController@delete_author_product');
        Route::post('/update-author-product/{id}','Backend\AuthorController@update_author_product');
    });
    //Publisher
    Route::middleware(['can:view_publisher'])->group(function () {
        Route::get('admin/publisher', 'Backend\PublisherController@index');
        Route::post('/save-publisher', 'Backend\PublisherController@create');
        Route::get('/edit-publisher/{id}', 'Backend\PublisherController@edit');
        Route::post('/update-publisher/{id}', 'Backend\PublisherController@update');
        Route::get('/delete-publisher/{id}', 'Backend\PublisherController@delete');
    });
    //oder
    Route::middleware(['can:view_bill'])->group(function () {
        Route::get('admin/bills', 'BillController@index');
        Route::get('admin/order', 'BillController@order');
        Route::get('/admin/order-done', 'BillController@order_done');
        Route::get('/admin/chot-don/{id}', 'BillController@bill_chot');
        Route::get('/admin/thanh-toan/{id}', 'BillController@bill_thanh_toan');
        Route::get('delete-bill/{$id}', 'BillController@delete');
        Route::get('detail-bill/{id}', 'BillController@detail');
    });
    //Product
    Route::middleware(['can:view_stock'])->group(function () {
        Route::get('/add-product','Backend\ProductController@add_product');
        Route::get('/all-product','Backend\ProductController@all_product');
        Route::post('/save-product','Backend\ProductController@save_product');
        Route::get('/edit-product/{product_id}','Backend\ProductController@edit_product');
        Route::get('/delete-product/{product_id}','Backend\ProductController@delete_product');
        Route::post('/update-product/{product_id}','Backend\ProductController@update_product');
        Route::get('/inactive-product/{product_id}','Backend\ProductController@inactive_product');
        Route::get('/active-product/{product_id}','Backend\ProductController@active_product');
        Route::get('/get/categories/{id}', 'BackEnd\ProductController@ajaxProduct');
    });
    Route::middleware(['can:view_user'])->group(function () {
        Route::get('/list_user','Backend\UserController@list_user');
        Route::post('/delete_user/{id}','Backend\UserController@delete_user');
        Route::get('/role_permission', 'Backend\UserController@role_permission');
        Route::post('/create_role', 'Backend\UserController@create_role');
        Route::get('/add_role_user', 'Backend\UserController@role_user');
        Route::post('/update-role', 'Backend\UserController@update_role');
    });
});
//EndBackend
//frontend
Route::get('login-checkout', 'Frontend\CheckoutController@login_checkout');
Route::get('check-out', 'Frontend\CheckoutController@checkout');
Route::get('order/history', 'Frontend\CheckoutController@order_history');
Route::post('save-check-out', 'Frontend\CheckoutController@save_checkout');
Route::get('/','Frontend\HomeController@index');
Route::get('/trang-chu','Frontend\HomeController@index');
Route::get('/gio-hang','Frontend\CartController@show');
// Route::get('/', function(){
//     return view('cart');
// });

Route::get('/the-loai/{selectCate:slug}', 'Frontend\HomeController@category');
Route::get('/{selectPro:slug}', 'Frontend\HomeController@detail_product');



//Hide product and non hide
Route::get('/inactive-category-product/{category_product_id}','Backend\CategoryController@inactive_category_product');
Route::get('/active-category-product/{category_product_id}','Backend\CategoryController@active_category_product');

//cart
Route::post('/save-cart','Frontend\CartController@save_cart');
Route::get('/delete-to-cart/{rowID}','Frontend\CartController@delete_cart');
Route::post('/update-cart-quantity','Frontend\CartController@update_cart');
//Check-out


Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');
