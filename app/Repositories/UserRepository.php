<?php

namespace App\Repositories;

use App\Models\User;

// Repositoryのインターフェースを継承
class UserRepository implements RepositoryInterface
{

    // 全件取得
    public function getAll()
    {
        return User::all();
    }

    // プライマリーキー（id）で1件取得
    public function getDataById($id)
    {
        return User::find($id);
    }

    // 質問登録
    public function save($data)
    {
        $user = new User;
        $user->fill($data)->save();
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
