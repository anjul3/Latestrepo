<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserFormController;

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
// Route::post('store-form', [FormController::class, 'store']);
