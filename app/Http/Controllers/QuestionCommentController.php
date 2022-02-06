<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QuestionCommentService;

class QuestionCommentController extends Controller
{
    private QuestionCommentService $question_comment_service;

    public function __construct(QuestionCommentService $question_comment_service)
    {
        $this->question_comment_service = $question_comment_service;
    }

    // 質問登録
    public function create(Request $request)
    {
        $data = [
            'user_id' => $request,
            'question_id' => $request,
            'content' => $request,
        ];
        dd($data);exit;
        $this->question_comment_service->create($data);
    }

    /**
     * 質問削除
     * @param [int] $id
     * @return void
     */
    public function delete($id)
    {
        return $this->question_comment_service->delete($id);
    }
}
