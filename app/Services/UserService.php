<?php

namespace App\Services;

use App\Repositories\RepositoryInterface;
use App\Repositories\UserRepository;

// Serviceのインターフェースを継承してる
class UserService
{

    // UserRepositoryのインスタンス生成は「AppServiceProvider.php」のbuild関数でしてる
    private UserRepository $user_repository;

    public function __construct(UserRepository $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    // 全件取得
    public function getAll()
    {
        return $this->user_repository->getAll();
    }

    // プライマリーキー（id）で1件取得
    public function getDataById($id)
    {
        return $this->user_repository->getDataById($id);
    }

    public function create($data)
    {
        return $this->user_repository->save($data);
    }

    /**
     * 質問削除
     * @param [int] $id
     * @return void
     */
    public function delete($id)
    {
        // $this->question_repository->delete($id);
        // TODO API疎通確認用のため削除
        return $this->user_repository->delete($id);
    }
}
