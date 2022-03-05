<?php

namespace App\Http\Controllers;

use App\Services\AnswerService;
use Illuminate\Http\Request;
use App\Models\Answer;

class AnswerController extends Controller
{
    private $answer_service;

    public function __construct(AnswerService $answer_service)
    {
        $this->answer_service = $answer_service;
    }

    // 回答取得
    public function getAnswer($question_id)
    {
        $answer = $this->answer_service->get($question_id);
        return $answer;
    }

    // 回答登録
    public function createAnswer(Request $request)
    {
        $this->answer_service->save($request);
    }

    // 回答削除
    public function deleteAnswer($id)
    {
        $this->answer_service->delete($id);
    }

    // 回答更新
    public function updateAnswer(Request $request)
    {
        $this->answer_service->update($request);
    }
}
