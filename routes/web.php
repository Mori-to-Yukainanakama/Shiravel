<?php

use App\Http\Controllers;
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

// 認証系
Route::post('/login', [Controllers\LoginController::class, 'login']);
Route::get('/logout', [Controllers\LoginController::class, 'logout']);
Route::post('/register', [Controllers\RegisterController::class, 'register']);
