<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', [LoginController::class, 'login'])->middleware('check');
Route::post('/signup', [LoginController::class, 'signUp'])->name('signup');
Route::post('/verify', [LoginController::class, 'Varify']);
Route::middleware('auth:api')->group(function () {
    Route::post('/test', [LoginController::class, 'loginUser'])->middleware('check');
    Route::post('/log', [StudentController::class, 'log']);  
});

// Route::resource('/re', ProductController::class);
Route::post('/re/add', [ProductController::class, 'store']);
Route::get('/re/show/{id}', [ProductController::class, 'show']);
Route::post('/re/update/{id}', [ProductController::class, 'update']);
Route::delete('/re/delete/{id}', [ProductController::class, 'destroy']);

Route::resource('student', StudentController::class);

Route::resource('customer', CustomerController::class);
Route::resource('product', ProductController::class);

Route::get('email', [MailController::class, 'sendEmail']);