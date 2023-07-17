<?php

use App\Http\Controllers\admin\BlogsController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\UsersController;
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

/**
 * ADMIN
 */
Route::group([
    'prefix' => env('ADMIN_URL', 'admin'),
    'namespace' => 'App\Http\Controllers\admin'
], function(){
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/products', 'DashboardController@products')->name('products');
    Route::get('/categories', 'DashboardController@categories')->name('categories');
    Route::get('/blogs', 'DashboardController@blogs')->name('blogs');
    // Route users
    Route::group([
        'prefix' => 'users'
    ], function(){
        Route::get('/', 'UsersController@index')->name('list.users');
        Route::get('/create', 'UsersController@create')->name('create.users');
        Route::post('/store', 'UsersController@store')->name('store.users');
        Route::get('/edit/{id}', 'UsersController@edit')->name('edit.users');
        Route::put('/update/{id}', 'UsersController@update')->name('update.users');
        Route::delete('/delete/{id}', 'UsersController@destroy')->name('delete.users');
    });
    // Route blogs
    Route::group([
        'prefix' => 'blogs'
    ], function(){
        Route::get('/', 'BlogsController@index')->name('list.blogs');
        Route::get('/create', 'BlogsController@create')->name('create.blogs');
        Route::post('/store', 'BlogsController@store')->name('store.blogs');
        Route::get('/edit/{id}', 'BlogsController@edit')->name('edit.blogs');
        Route::put('/update/{id}', 'BlogsController@update')->name('update.blogs');
        Route::delete('/delete/{id}', 'BlogsController@destroy')->name('delete.blogs');
    });
    // Route categories
    Route::group([
        'prefix' => 'categories'
    ], function(){
        Route::get('/', 'CategoriesController@index')->name('list.categories');
        Route::get('/create', 'CategoriesController@create')->name('create.categories');
        Route::post('/store', 'CategoriesController@store')->name('store.categories');
        Route::get('/edit/{id}', 'CategoriesController@edit')->name('edit.categories');
        Route::put('/update/{id}', 'CategoriesController@update')->name('update.categories');
        Route::delete('/delete/{id}', 'CategoriesController@destroy')->name('delete.categories');
    });
    // Route attribute types
    Route::group([
        'prefix' => 'attributes'
    ], function(){
        Route::get('/type', 'AttributesController@index')->name('list.attributeTypes');
        Route::post('/type/store', 'AttributesController@store')->name('store.attributeTypes');
        Route::get('/type/edit/{id}', 'AttributesController@edit')->name('edit.attributeTypes');
        Route::put('/type/update/{id}', 'AttributesController@update')->name('update.attributeTypes');
        Route::delete('/type/delete/{id}', 'AttributesController@destroy')->name('delete.attributeTypes');
    });

    // Route attribute values
    Route::group([
        'prefix' => 'attributes'
    ], function(){
        Route::get('/value', 'AttributeValuesController@index')->name('list.attributeValues');
        Route::post('/value/store', 'AttributeValuesController@store')->name('store.attributeValues');
        Route::get('/value/edit/{id}', 'AttributeValuesController@edit')->name('edit.attributeValues');
        Route::put('/value/update/{id}', 'AttributeValuesController@update')->name('update.attributeValues');
        Route::delete('/value/delete/{id}', 'AttributeValuesController@destroy')->name('delete.attributeValues');
    });

    // Route products
    Route::group([
        'prefix' => 'products'
    ], function(){
        Route::get('/', 'ProductsController@index')->name('list.products');
        Route::get('/create', 'ProductsController@create')->name('create.products');
        Route::post('/store', 'ProductsController@store')->name('store.products');
        Route::get('/get-tag', 'ProductsController@getTag')->name('get.tag');
        Route::get('/edit/{id}', 'ProductsController@edit')->name('edit.products');
        Route::put('/update', 'ProductsController@update')->name('update.products');
        Route::put('/update/variant', 'ProductsController@updateVariantPrice')->name('update.variant.price');
        Route::delete('/delete/product', 'ProductsController@destroy')->name('delete.products');
        Route::post('/update/status/{id}', 'ProductsController@updateStatus')->name('updateStatus.product');
    });

    // Route slider
    Route::group([
        'prefix' => 'slider'
    ], function(){
        Route::get('/', 'SlidersController@index')->name('list.slider');
        Route::get('/create', 'SlidersController@create')->name('create.slider');
        Route::post('/store', 'SlidersController@store')->name('store.slider');
        Route::get('/get-related-url', 'SlidersController@getRelatedID')->name('get.related.id');
        Route::get('/edit/{id}', 'SlidersController@edit')->name('edit.slider');
        Route::put('/update', 'SlidersController@update')->name('update.slider');
        Route::delete('/delete/{id}', 'SlidersController@destroy')->name('delete.slider');
    });

    //Route Tag
    Route::group([
        'prefix' => 'tag'
    ], function(){
        Route::get('/', 'TagsController@index')->name('list.tag');
        Route::get('/create', 'TagsController@create')->name('create.tag');
        Route::post('/store', 'TagsController@store')->name('store.tag');
        Route::get('/edit/{id}', 'TagsController@edit')->name('edit.tag');
        Route::put('/update', 'TagsController@update')->name('update.tag');
        Route::delete('/delete/{id}', 'TagsController@destroy')->name('delete.tag');
    });

    //Route discount
    Route::group([
        'prefix' => 'discount'
    ], function(){
        Route::get('/', 'DiscountsController@index')->name('list.discount');
        Route::get('/create', 'DiscountsController@create')->name('create.discount');
        Route::post('/store', 'DiscountsController@store')->name('store.discount');
        Route::get('/edit/{id}', 'DiscountsController@edit')->name('edit.discount');
        Route::put('/update', 'DiscountsController@update')->name('update.discount');
        Route::delete('/delete/{id}', 'DiscountsController@destroy')->name('delete.discount');
    });

    //Route discount
    Route::group([
        'prefix' => 'flash-sale'
    ], function(){
        Route::get('/', 'FlashSaleController@index')->name('list.flash.sale');
        Route::get('/create', 'FlashSaleController@create')->name('create.flash.sale');
        Route::post('/store', 'FlashSaleController@store')->name('store.flash.sale');
        Route::get('/edit/{id}', 'FlashSaleController@edit')->name('edit.flash.sale');
        Route::put('/update', 'FlashSaleController@update')->name('update.flash.sale');
        Route::delete('/delete/{id}', 'FlashSaleController@destroy')->name('delete.flash.sale');
    });
});

/**
 * CLIENT
 */
Route::group([
    'namespace' => 'App\Http\Controllers\client'
], function(){
    Route::get('/', 'MainController@index')->name('index.client');
    Route::post('/', 'MainController@getProductByCategory')->name('get.product.by.category');

    //Client Product
    Route::group([
        'prefix' => 'product'
    ], function(){
        Route::get('/', 'ProductsController@index')->name('index.product');
        Route::get('/{slug}', 'ProductsController@detail')->name('index.product.detail');
        Route::post('/get-variant', 'ProductsController@getVariant')->name('get.variant');
        Route::post('/filter', 'ProductsController@filter')->name('index.filter');
    });

    //Client Blog
    Route::group([
        'prefix' => 'blog'
    ], function(){
        Route::get('/', 'BlogsController@index')->name('index.blog');
        Route::get('/{slug}', 'BlogsController@detail')->name('blog.detail');
    });

    //Client Cart
    Route::group([
        'prefix' => 'cart'
    ], function(){
        Route::get('/', 'CartsController@index')->name('index.cart');
        Route::post('/add', 'CartsController@addProduct')->name('add.to.cart');
        Route::post('/qty-change', 'CartsController@qtyChange')->name('quantity.change');
        Route::post('/delete-item', 'CartsController@deleteItem')->name('delete.item');
        Route::post('/check-discount', 'CartsController@checkDiscount')->name('check.discount');
    });
});
