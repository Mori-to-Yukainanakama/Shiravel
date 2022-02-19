<?php

namespace App\Http\Controllers;

use App\Services\AnswerInterface;
use App\Models\Answer;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    private AnswerService $answer_service;

    public function __construct(AnswerService $answer_service)
    {
        $this->answer_service = $answer_service;
    }

    /**
     * 回答取得
     * @param Request
     * @return Answer
     */
    public function getAnswer(Request $request)
    {
        $answer = $this->answer_service->getAll($request->question_id);
        return $answer;
    }

    /**
     * 回答登録
     * @param Request
     * @return void
     */
    public function createAnswer(Request $request)
    {
        $this->answer_service->save($request->all());
    }

    /**
     * 回答更新
     * @param Request
     * @return void
     */
    public function updateAnswer(Request $request)
    {
        $data = [
            'answer_id' => $request->answer_id,
            'content' => $request->content,
        ];
        $answer = $this->answer_service->update($data);

    }
    
    /**
     * 回答削除
     * @param Request
     * @return void
     */
    public function deleteAnswer(Request $request)
    {
        $this->answer_service->delete($data);
    }

}
