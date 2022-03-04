<?php

namespace App\Http\Controllers;

use App\Services\AnswerService;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    private AnswerService $answer_service;

    public function __construct(AnswerService $answer_service)
    {
        $this->answer_service = $answer_service;
    }

    // 回答登録
    public function createAnswer($data)
    {
        $this->answer_service->save($data);
    }

    // 回答更新
    public function updateAnswer(Request $request)
    {
        $id = $request->id;
        $answer = $this->answer_service->update($id);

        return $answer;
    }

    /**
     * 回答削除
     * @param [int] $id
     * @return void
     */
    public function deleteAnswer($id)
    {
        return $this->answer_service->delete($id);
    }

}
