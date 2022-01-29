<?php

namespace App\Services;

use App\Repositories\RepositoryInterface;

// Serviceのインターフェースを継承してる
class QuestionService implements ServiceInterface
{

    private $question_repository;

    // インスタンス生成
    public function __construct(
        RepositoryInterface $question_repository
    ) {
        $this->question_repository = $question_repository;
    }

    // 全件取得
    public function getAll()
    {
        return $this->question_repository->getAll();
    }


    // プライマリーキー（id）で1件取得
    public function getDataById($id)
    {
        return $this->question_repository->getDataById($id);
    }

    public function create($data)
    {
        return $this->question_repository->save($data);
    }
}
