<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// /questions パスを共通化
Route::group(['prefix' => 'questions'], function () {

    // 質問全件取得api
    Route::get('/', [QuestionController::class, 'getQuestions']);
});

Route::get('/question', [QuestionController::class, 'getQuestion']);
