<?php

namespace App\Repositories;

use App\Models\Models\QuestionComment;

// Repositoryのインターフェースを継承
class QuestionCommentRepository implements RepositoryInterface
{

    // 全件取得
    public function getAll()
    {

    }

    // プライマリーキー（id）で1件取得
    public function getDataById($id)
    {

    }

    // 質問登録
    public function save($data)
    {
        $question = new QuestionComment;
        $question->fill($data)->save();
    }

    /**
     * 質問削除
     * @param [int] $id
     * @return void
     */
    public function delete($id)
    {
        // Question::find($id)->delete();
        // TODO レスポンス確認用のため削除
        return '削除完了';
    }
}
