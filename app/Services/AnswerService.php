<?php

namespace App\Services;

use App\Repositories\RepositoryInterface;

// Serviceのインターフェースを継承してる
class AnswerService implements ServiceInterface
{
    private $answer_repository;

    // インスタンス生成
    public function __construct(
        RepositoryInterface $answer_repository
    ) {
        $this->answer_repository = $answer_repository;
    }

    // 全件取得
    public function getAll()
    {
        return $this->answer_repository->getAll();
    }

    // プライマリーキー（id）で1件取得
    public function getDataById($id)
    {
        return $this->answer_repository->getDataById($id);
    }

    public function create($data)
    {
        return $this->answer_repository->save($data);
    }
}
