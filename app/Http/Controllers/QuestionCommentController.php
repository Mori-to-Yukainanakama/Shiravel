<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QuestionCommentService;
use Illuminate\Support\Facades\Auth;

class QuestionCommentController extends Controller
{
    private QuestionCommentService $question_comment_service;

    /**
     * コンストラクタ
     *
     * @param QuestionCommentService
     */
    public function __construct(QuestionCommentService $question_comment_service)
    {
        $this->question_comment_service = $question_comment_service;
    }

    /**
     * 質問コメント全取得
     *
     * @return string
     */
    public function getQuestionComments()
    {
        return $question_comments = $this->question_comment_service->getAll();
    }

    /**
     * 質問コメント1件取得
     *
     * @return string
     */
    public function getQuestionComment($id)
    {
        return $question_comment = $this->question_comment_service->getDataById($id);
    }

    /**
     * 質問コメント登録
     *
     * @param Request
     * @return void
     */
    public function create(Request $request)
    {
        $data = [
            'user_id' => Auth::id(),
            'question_id' => $request->question_id,
            'content' => $request->content,
        ];
        $this->question_comment_service->create($data);
    }

    /**
     * 質問コメント更新
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'content' => $request->content,
        ];
        $this->question_comment_service->update($data);
    }

    /**
     * 質問コメント削除
     * @param [int] $id
     * @return void
     */
    public function delete($id)
    {
        $this->question_comment_service->delete($id);
    }
}
