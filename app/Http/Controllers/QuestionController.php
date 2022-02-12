<?php

namespace App\Http\Controllers;

use App\Services\QuestionService;

use Illuminate\Http\Request;

class QuestionController extends Controller
{

    // QuestionServiceのインスタンス生成は「AppServiceProvider.php」のbuild関数でしてる
    private QuestionService $question_service;

    public function __construct(QuestionService $question_service)
    {
        $this->question_service = $question_service;
    }

    // 質問1件取得
    // 引数に$idを付与
    public function getQuestion()
    {
        $id = 1;
        $question = $this->question_service->getDataById($id);
        return $question;
    }

    // 質問全件取得
    public function getQuestions()
    {
        $questions = $this->question_service->getAll();
        return $questions;
    }

    // 質問登録
    public function create()
    {
        $data = [
            'user_id' => 1,
            'title' => 'タイトルうううう',
            'content' => 'コンテンツつううううう',
        ];
        $this->question_service->create($data);
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
