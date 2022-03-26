<?php

namespace App\Repositories;

use App\Models\QuestionComment;

// Repositoryのインターフェースを継承
class QuestionCommentRepository implements RepositoryInterface
{

    /**
     * 質問コメント全取得
     *
     * @return string
     */
    public function getAll()
    {
        return QuestionComment::all();
    }

    // プライマリーキー（id）で1件取得
    /**
     * 質問コメント1件取得
     *
     * @param [int] $id
     * @return void
     */
    public function getDataById($id)
    {
        // QuestionComment::findOrFail($id);
        return QuestionComment::where("user_id", "=", $id)->firstOrFail();
    }

    /**
     * 質問コメント登録
     *
     * @param [array] $data
     * @return void
     */
    public function save($data)
    {
        $question_comment = new QuestionComment;
        $question_comment->fill($data)->save();
    }

    /**
     * 質問コメント更新
     *
     * @param [array] $data
     * @return void
     */
    public function update($data)
    {
        return QuestionComment::where("user_id", "=", $data["user_id"])->update($data);
    }

    /**
     * 質問削除
     * @param [int] $id
     * @return void
     */
    public function delete($id)
    {
        // QuestionComment::find($id)->delete();
        // TODO レスポンス確認用のため削除
        return '削除完了';
    }
}
