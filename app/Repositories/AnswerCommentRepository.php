<?php

namespace App\Repositories;

use App\Models\AnswerComment;

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
  public function getDataById($id) 
  {
    // firstOrfailの使い方が分からず上手くいかないので、一旦firstOrFail使用
    // 挙動確認済み
    return AnswerComment::where("user_id", "=", $id)->firstOrFail();
  }

  public function update($data)
  {
    // findOrFailの使い方が分からず上手くいかないので,この書き方に変更
    // できそうであれば修正
    $answer_comment = AnswerComment::where("user_id", "=", $data["user_id"])->update($data);
  }  

  // 削除
  public function delete($id)
  {
    return '削除完了';
  }
}
