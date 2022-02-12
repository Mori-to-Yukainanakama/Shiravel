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

  // 質問登録
  public function create(Request $request)
  {
    $data = [
      'user_id' => $request,
      'answer_id' => $request,
      'content' => $request,
    ];
    // 挙動確認済み
    dd($data);exit;
    // $this->answer_comment_service->create($data);
  }
}