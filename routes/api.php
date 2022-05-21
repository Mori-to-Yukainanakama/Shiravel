<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionCommentController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AnswerCommentController;
use App\Http\Controllers\BestAnswerController;
use App\Http\Controllers\AnswerController;

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


// APIバージョン１
Route::group(['prefix' => 'v1'], function () {

    // /questions パスを共通化
    Route::group(['prefix' => 'questions'], function () {
        // 質問全件取得api
        Route::get('/', [QuestionController::class, 'getNewArrivalQuestions']);
        Route::get('/unanswered', [QuestionController::class, 'getUnansweredQuestions']);
        Route::get('/answered', [QuestionController::class, 'getAnsweredQuestions']);
        Route::get('/unsolved', [QuestionController::class, 'getUnsolvedQuestions']);
        Route::get('/solved', [QuestionController::class, 'getSolvedQuestions']);
        Route::post('/update', [QuestionController::class, 'update']);
        Route::get('/detail', [QuestionController::class, 'getQuestionDetail']);
        Route::post('/create', [QuestionController::class, 'create']);
        Route::get('/{id}', [QuestionController::class, 'getQuestion']);
        Route::delete('/{id}', [QuestionController::class, 'delete']);
    });

    // /users パスを共通化
    Route::group(['prefix' => 'users'], function () {

        // ユーザー情報取得 ログインしてないユーザーはエラーが返却される
        Route::middleware('auth:sanctum')->group(function () {
            Route::get('/getUser', function () {
                return response()->json(['user' => Auth::user()]);
            });
        });

        Route::get('/', [UserController::class, 'getUsers']);
        Route::get('/unsolved', [QuestionController::class, 'getUnsolvedQuestions']);
    });

    Route::group(['prefix' => 'answerComments'], function () {

        Route::get('/', [AnswerCommentController::class, 'getAnswerComments']);
        Route::get('/{id}', [AnswerCommentController::class, 'getAnswerComment']);
        Route::post('/create', [AnswerCommentController::class, 'create']);
        Route::post('/update/{id}', [AnswerCommentController::class, 'update']);
        Route::delete('/{id}', [AnswerCommentController::class, 'delete']);
    });
    // questionComments パスを共通化
    Route::group(['prefix' => 'questionComments'], function () {

        Route::get('/', [QuestionCommentController::class, 'getQuestionComments']);
        Route::get('/{id}', [QuestionCommentController::class, 'getQuestionComment']);
        Route::post('/create', [QuestionCommentController::class, 'create']);
        Route::post('/update/{id}', [QuestionCommentController::class, 'update']);
        Route::delete('/{id}', [QuestionCommentController::class, 'delete']);
    });
    // bestAnswers パスを共通化
    Route::group(['prefix' => 'bestAnswer'], function () {
        Route::post('/', [BestAnswerController::class, 'create'])->middleware('bestAnswerCheck');
    });

    // /answer パスを共通化
    Route::group(['prefix' => 'answer'], function () {
        Route::get('/{question_id}', [AnswerController::class, 'getAnswer']);
        Route::post('/create', [AnswerController::class, 'createAnswer']);
        Route::delete('/{answer_id}', [AnswerController::class, 'deleteAnswer']);
        Route::post('/update', [AnswerController::class, 'updateAnswer']);
    });
});
