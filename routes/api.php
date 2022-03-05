<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionCommentController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AnswerCommentController;
use App\Http\Controllers\BestAnswerController;

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

// /questions パスを共通化
Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'questions'], function () {

        // 質問全件取得api
        Route::get('/', [QuestionController::class, 'getNewArrivalQuestions']);
        Route::get('/question', [QuestionController::class, 'getQuestion']);
        Route::delete('/{id}', [QuestionController::class, 'delete']);
        Route::post('/update', [QuestionController::class, 'update']);
        Route::get('/detail', [QuestionController::class, 'getQuestionDetail']);
        Route::get('/unanswered', [QuestionController::class, 'getUnansweredQuestions']);
        Route::get('/answered', [QuestionController::class, 'getAnsweredQuestions']);
        Route::get('/unsolved', [QuestionController::class, 'getUnsolvedQuestions']);
        Route::get('/solved', [QuestionController::class, 'getSolvedQuestions']);
    });
});

Route::post('/answerComment/create', [AnswerCommentController::class, 'create']);
Route::delete('answerComment/{id}', [AnswerCommentController::class, 'delete']);
Route::get('/answerComments', [AnswerCommentController::class, 'getAnswerComments']);
Route::get('/answerComment/{id}', [AnswerCommentController::class, 'getAnswerComment']);
Route::post('/answerComment/create', [AnswerCommentController::class, 'create']);
Route::post('/answerComment/update', [AnswerCommentController::class, 'update']);

Route::post('/bestAnswer', [BestAnswerController::class, 'create']);

// /users パスを共通化
Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'users'], function () {

        Route::get('/', [UserController::class, 'getUsers']);
    });
});


// /answerComments パスを共通化
Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'answerComments'], function () {

        Route::get('/', [AnswerCommentController::class, 'getAnswerComments']);
        Route::get('/{id}', [AnswerCommentController::class, 'getAnswerComment']);
        Route::post('/create', [AnswerCommentController::class, 'create']);
        Route::post('/update/{id}', [AnswerCommentController::class, 'update']);
        Route::delete('/{id}', [AnswerCommentController::class, 'delete']);
    });
});

// questionComments パスを共通化
Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'questionComments'], function () {

        Route::get('/', [QuestionCommentController::class, 'getQuestionComments']);
        Route::get('/{id}', [QuestionCommentController::class, 'getQuestionComment']);
        Route::post('/create', [QuestionCommentController::class, 'create']);
        Route::post('/update/{id}', [QuestionCommentController::class, 'update']);
        Route::delete('/{id}', [QuestionCommentController::class, 'delete']);
    });
});

// /answer パスを共通化

Route::group(['prefix' => 'answer'], function () {
    Route::get('/get/{id}', [AnswerController::class, 'getAnswer']);
    Route::post('/create', [AnswerController::class, 'createAnswer']);
    Route::delete('/delete/{id}', [AnswerController::class, 'deleteAnswer']);
    Route::post('/update', [AnswerController::class, 'updateAnswer']);
});
