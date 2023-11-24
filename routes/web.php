<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


// Route::get('/', function () {
//     return view('admin.login');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

