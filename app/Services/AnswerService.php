<?php

namespace App\Services;

use App\Repositories\RepositoryInterface;

// Serviceのインターフェースを継承してる
class AnswerService implements ServiceInterface
{
    private AnswerRepository $answer_repository;

    // インスタンス生成
    public function __construct(
        AnswerRepository $answer_repository
    ) {
        $this->answer_repository = $answer_repository;
    }

    // 取得
    public function getAll()
    {
        return $this->answer_repository->getAll();
    }

    // 登録
    public function save($data)
    {
        return $this->answer_repository->save($data);
    }

    // 削除
    public function delete($id)
    {
        return $this->answer_repository->delete($id);
    }

    // 更新
    public function update($data)
    {
        return $this->answer_repository->update($data);
    }
}
