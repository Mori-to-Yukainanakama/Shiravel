<?php

namespace App\Repositories;

use App\Models\Models\AnswerComment;

// Repositoryのインターフェースを継承
class AnswerCommentRepository implements RepositoryInterface
{



  // 質問登録
  public function save($data)
  {
    $question = new AnswerComment;
    $question->fill($data)->save();
  }

  // 全件取得
  public function getAll()
  {
      return AnswerComment::all();
  }

  // テーブルのプライマリーキーで1件取得
  public function getDataById($id) {
    $answer_comment = new AnswerComment;
    return $answer_comment->where('user_id',$id)->firstOrFail();
  }
  
  // 削除
  public function delete($id)
  {
  }

  public function update($data)
  {
  }
}
