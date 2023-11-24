<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;



Route::get('/', [LoginController::class, 'adminLogin'])->name('admin.login');


Route::group(['middleware' => 'is_admin'],function(){ 
    Route::get('/admin/home',[AdminController::class,'admin'])->name('admin.home');
    Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::get('/admin/password/change',[AdminController::class,'passwordChnage'])->name('admin.password.change');
    Route::post('/admin/password/Update',[AdminController::class,'passwordUpdate'])->name('admin.password.update');

    //product route
    Route::group(['prefix'=>'product'],function(){

        Route::get('/',[ProductController::class,'index'])->name('product.index');
        Route::post('/store',[ProductController::class,'store'])->name('product.store');
        Route::get('/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
        Route::get('/edit/{id}',[ProductController::class,'edit']);
        Route::post('/update',[ProductController::class,'update'])->name('product.update');
    });
   
});