<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DenemeController;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\blog\blogController;
use App\Http\Controllers\admin\category\categoryController;
use App\Http\Controllers\front\frontController;

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

Route::get('/laravel',function (){
    return"Burası laravel sayfası";
});

Route::group(['namespace'=>'admin','prefix'=>'admin','as'=>'admin.', 'middleware'=>['auth']],function (){
    Route::get('/',[adminController::class,'index'])->name('index');

    Route::group(['namespace'=>'blog','prefix'=>'blog','as'=>'blog.'],function (){
        Route::get('/',[blogController::class,'index'])->name('index');
        Route::get('/ekle',[blogController::class,'create'])->name('create');
        Route::post('/ekle',[blogController::class,'store'])->name('create.post');
        Route::get('/duzenle/{id}',[blogController::class,'edit'])->name('edit');
        Route::post('/duzenle/{id}',[blogController::class,'update'])->name('edit.post');
        Route::get('/sil/{id}',[blogController::class,'delete'])->name('delete');
    });

    Route::group(['namespace'=>'category','prefix'=>'category','as'=>'category.'],function (){
        Route::get('/',[categoryController::class,'index'])->name('index');
        Route::get('/ekle',[categoryController::class,'create'])->name('create');
        Route::post('/ekle',[categoryController::class,'store'])->name('create.post');
        Route::get('/duzenle/{id}',[categoryController::class,'edit'])->name('edit');
        Route::post('/duzenle/{id}',[categoryController::class,'update'])->name('edit.post');
        Route::get('/sil/{id}',[categoryController::class,'delete'])->name('delete');
    });
});

Route::get('/',[frontController::class,'index'])->name('index');

Route::get('/wel',function (){
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
