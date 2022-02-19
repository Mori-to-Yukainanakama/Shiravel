<?php

namespace App\Repositories;

use App\Models\Models\AnswerComment;

// Repositoryのインターフェースを継承
class AnswerCommentRepository implements RepositoryInterface
{
  // 回答コメント登録
  public function save($data)
  {
    $answer_comment = new AnswerComment;
    $answer_comment->fill($data)->save();
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

  public function update($data)
  {
    $answer_comment = new AnswerComment;
    $answer_comment->where('user_id', 1)->update($data);
  }

  // 削除
  public function delete($id)
  {
  }
}
