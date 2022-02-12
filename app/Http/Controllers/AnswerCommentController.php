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
}