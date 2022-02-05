<?php

namespace App\Http\Controllers;

use App\Services\ServiceInterface;

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
        $this->answer_service->create($data);
    }

    // 回答更新
    public function updateAnswer(Request $request)
    {
        $id = $request->id;
        $answer = $this->answer_service->getDataById($id);

        return $answer;
    }
    
    /**
     * 回答削除
     * @param [int] $id
     * @return void
     */
    public function deleteAnswer($id)
    {
        // $this->answer_service->delete($id);
        // TODO API疎通確認用のため削除
        return $this->answer_service->delede($id);
    }

}
