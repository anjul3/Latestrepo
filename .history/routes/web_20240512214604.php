<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserFormController;
use App\Http\Controllers\AdminController;

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
    return view('landing-page');
});


 Route::get('user-form', [UserFormController::class, 'index'])->name('user-form');
 Route::post('user-store', [UserFormController::class, 'user-store'])->name('user-store');
 Route::get('admin-form', [AdminController::class, 'index'])->name('admin-form');
 Route::post('store', [AdminController::class, 'store'])->name('store');
