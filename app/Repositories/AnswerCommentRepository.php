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
  public function getAll() {

  }

  // テーブルのプライマリーキーで1件取得
  public function getDataById($id) {

  }

  // 削除
  public function delete($id) {

  }
}
