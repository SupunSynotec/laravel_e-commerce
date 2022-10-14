<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Livewire\Admin\Brand\Index;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware('auth','isAdmin')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'index']);
  
    Route::controller(CategoryController::class)->group(function() {
        Route::get('/category','index');
        Route::get('/category/create','create');  
        Route::post('/category/store','store');
        Route::get('/category/{category}/edit','edit'); 
        Route::put('/category/{category}','update');
    });

    Route::controller(ProductController::class)->group(function() {
        Route::get('/products','index');
        Route::get('/products/create','create');
        Route::post('/products','store');
        Route::get('/products/{products}/edit','edit'); 
        Route::put('/products/{products}','update');
        Route::get('/products/{products}/delete','destroy');
        Route::get('/product-image/{product_image_id}/delete','destroyImage');
    });

    Route::get('/brands',Index::class);

    Route::controller(ColorController::class)->group(function() {
        Route::get('/colors','index');
        Route::get('/colors/create','create');  
        Route::post('/colors','store');  

    });

});