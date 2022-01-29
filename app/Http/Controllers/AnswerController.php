<?php

namespace App\Http\Controllers;

use App\Services\ServiceInterface;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    private ServiceInterface $answer_service;

    public function __construct(ServiceInterface $answer_service)
    {
        $this->answer_service = $answer_service;
    }

    // 回答登録
    public function createAnswer($data)
    {
        $this->question_service->create($data);
    }

    // 回答更新
    public function updateAnswer(Request $request)
    {
        $id = $request->id;
        $answer = $this->answer_service->getDataById($id);

        return $answer;
    }

    // 回答削除
    public function deleteAnswer(Request $request)
    {
        $id = $request->id;
        $answer = $this->answer_service->getDataById($id);
        return $answer;
    }

}
