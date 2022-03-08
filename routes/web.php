<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\BannerController;

use App\Http\Controllers\Client\IndexController;
use App\Http\Controllers\Client\QuoteController;
use App\Http\Controllers\Client\DetailController;
use App\Http\Controllers\Client\SearchController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\CategoryController AS ClientCategoryController;

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

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


// admin
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/home', [CategoryController::class, 'index'])->name('home');

    Route::post('/category/change-status-ajax/{id}/{currentStatus}', [CategoryController::class, 'changeStatusAjax'])->name('change-status-ajax');
    Route::post('/product/change-status-ajax/{id}/{currentStatus}', [CategoryController::class, 'changeStatusAjax'])->name('change-status-ajax');

    
    Route::resources([
        'category' => CategoryController::class,
        'product' => ProductController::class,
        'option' => OptionController::class,
        'banner' => BannerController::class,
    ]);
    
    Route::get('/show-products', [CategoryController::class, 'showProducts'])->name('show-products');
});

Route::group([], function () {
    
    Route::get('/',                 [IndexController::class, 'index'])->name('client-home');
    Route::get('/bang-gia',         [QuoteController::class, 'index'])->name('quote');
    Route::get('/san-pham/{slug}',  [DetailController::class, 'index'])->name('detail')->where(['slug' => '[a-zA-Z0-9-]+']);
    Route::get('/san-pham/{slug}.p',  [ClientCategoryController::class, 'showProductParent'])->name('cate_parent')->where(['slug' => '[a-zA-Z0-9-]+']);
    Route::get('/san-pham/{slug}.s',  [ClientCategoryController::class, 'showProductSubParent'])->name('cate_sub')->where(['slug' => '[a-zA-Z0-9-]+']);
    Route::get('/tim-kiem/tukhoa={search}',  [SearchController::class, 'index'])->name('search');
    Route::get('/lien-he',          [ContactController::class, 'index'])->name('contact');
    Route::post('/category/{slug}/get-cate-child', [CategoryController::class, 'getCateChildAjax'])->name('get-cate-child')->where(['slug' => '[a-zA-Z0-9-]+']);
    Route::post('/category/{slug}/get-product',    [ProductController::class, 'getProductAjax'])->name('get-product')->where(['slug' => '[a-zA-Z0-9-]+']);

});

Auth::routes();

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    return "call ok";
});







