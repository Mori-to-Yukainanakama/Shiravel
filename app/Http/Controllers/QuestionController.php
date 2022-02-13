<?php

namespace App\Http\Controllers;

use App\Services\QuestionService;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    // QuestionServiceのインスタンス生成は「AppServiceProvider.php」のbuild関数でしてる
    private QuestionService $question_service;

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
    public function getQuestion()
    {
        $id = 1;
        return $this->question_service->getDataById($id);
    }

    /**
     * 質問詳細取得
     * 引数に$idを付与
     * @param [int] $id
     * @return Question
     */
    public function getQuestionAnswerComment()
    {
        $id = 1;
        return $this->question_service->getCommentAnswer($id);
    }

    /**
     * 質問全件取得
     *
     * @param
     * @return Question
     */
    public function getQuestions()
    {
        return $this->question_service->getAll();
    }

    /**
     * 質問登録
     *
     * @param Request
     * @return void
     */
    public function create(Request $request)
    {
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
     * @param Request
     * @return void
     */
    public function update(Request $request)
    {

        $data = [
            'user_id' => $request->user_id,
            'title' => $request->title,
            'content' => $request->content,
        ];

        // TODO API疎通確認のため削除
        return $this->question_service->update($data);
    }

    /**
     * 質問削除
     * @param [int] $id
     * @return void
     */
    public function delete($id)
    {
        // $this->question_service->delete($id);
        // TODO API疎通確認用のため削除
        return $this->question_service->delete($id);
    }
}
