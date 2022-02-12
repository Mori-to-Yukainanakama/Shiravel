<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerCommentController;
use Illuminate\Support\Facades\Auth;

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


Route::post('/register', [UserAuthController::class, 'register']);





// /questions パスを共通化
Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'questions'], function () {

        // 質問全件取得api
        Route::get('/', [QuestionController::class, 'getQuestions']);
        Route::get('/question', [QuestionController::class, 'getQuestion']);
        Route::delete('/{id}', [QuestionController::class, 'delete']);
        Route::post('/update', [QuestionController::class, 'update']);
    });
});

// /users パスを共通化
Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'users'], function () {

        Route::get('/', [UserController::class, 'getUsers']);
    });
});

Route::post('/answerComment/create', [AnswerCommentController::class, 'create']);
