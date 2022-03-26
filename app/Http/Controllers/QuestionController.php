<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Services\QuestionService;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // QuestionServiceのインスタンス生成は「AppServiceProvider.php」のbuild関数でしてる
    private QuestionService $question_service;

    /**
     * コンストラクタ
     *
     * @param QuestionService
     * @return void
     */
    public function __construct(QuestionService $question_service)
    {
        $this->question_service = $question_service;
    }

    /**
     * 質問1件取得
     * 引数に$idを付与
     * @param [int] $id
     * @return Question
     */
    public function getQuestion($id)
    {
        return $this->question_service->getDataById($id);
    }

    /**
     * 質問詳細取得
     * 引数に$idを付与
     * @param [int] $id
     * @return Question
     */
    public function getQuestionDetail(Request $request)
    {
        return $this->question_service->getQuestionDetail($request->question_id);
    }

    /**
     * 質問全件取得
     *
     * @return Question
     */
    public function getQuestions()
    {
        return $this->question_service->getAll();
    }

    /**
     * 質問一覧取得（新着順）
     *
     * @return Question
     */
    public function getNewArrivalQuestions()
    {
        return $this->question_service->getNewArrival();
    }

    /**
     * 質問一覧取得（未回答）
     *
     * @return Question
     */
    public function getUnansweredQuestions()
    {
        return $this->question_service->getUnanswered();
    }

    /**
     * 質問一覧取得（回答有）
     *
     * @return Question
     */
    public function getAnsweredQuestions()
    {
        return $this->question_service->getAnswered();
    }

    /**
     * 質問一覧取得（未解決）
     *
     * @return Question
     */
    public function getUnsolvedQuestions()
    {
        return $this->question_service->getUnsolved();
    }

    /**
     * 質問一覧取得（解決済）
     *
     * @return Question
     */
    public function getSolvedQuestions()
    {
        return $this->question_service->getSolved();
    }

    /**
     * 質問登録
     *
     * @param QuestionRequest
     * @return void
     */
    public function create(QuestionRequest $request)
    {
        // user_idはAUTHから取得するようにする
        $data = [
            'user_id' => $request->user_id,
            'title' => $request->title,
            'content' => $request->content,
        ];
        $this->question_service->create($data);
    }

    /**
     * 質問更新
     *
     * @param QuestionRequest
     * @return void
     */
    public function update(QuestionRequest $request)
    {
        // user_idはAUTHから取得するようにする
        $data = [
            'user_id' => $request->user_id,
            'title' => $request->title,
            'content' => $request->content,
        ];
        $this->question_service->update($data);
    }

    /**
     * 質問削除
     * @param [int] $id
     * @return void
     */
    public function delete($id)
    {
        $this->question_service->delete($id);
    }
}
