<?php

namespace App\Http\Controllers;

use App\Services\AnswerCommentService;
use Illuminate\Http\Request;

class AnswerCommentController extends Controller
{
  private AnswerCommentService $answer_comment_service;

  public function __construct(AnswerCommentService $answer_comment_service)
  {
    $this->answer_comment_service = $answer_comment_service;
  }

  // ユーザー全取得
  public function getAnswerComments()
  {
    $answer_comments = $this->answer_comment_service->getAll();
    return $answer_comments;
  }

  // 質問1件取得
  public function getAnswerComment(Request $request)
  {
    $answer_comment = $this->answer_comment_service->getDataById($request->user_id);
    return $answer_comment;
  }
  
  // 回答コメント登録
  public function create(Request $request)
  {
    $data = [
      'user_id' => $request->user_id,
      'answer_id' => $request->answer_id,
      'content' => $request->content,
    ];

    // 挙動確認済み
    $this->answer_comment_service->create($data);
  }

  public function update(Request $request)
  {
    $data = [
      'user_id' => $request->user_id,
      'content' => $request->content,
    ];
    $this->answer_comment_service->update($data);
  }

  /**
   * 質問削除
   * @param [int] $id
   * @return void
   */
  public function delete($id)
  {
    return $this->answer_comment_service->delete($id);
  }
}
