<?php

namespace App\Services;

use App\Repositories\AnswerRepository;

class AnswerService
{
    private AnswerRepository $answer_repository;

    // インスタンス生成
    public function __construct(AnswerRepository $answer_repository)
    {
        $this->answer_repository = $answer_repository;
    }

    // 取得
    public function get($question_id)
    {
        return $this->answer_repository->get($question_id);
    }

    // 登録
    public function save($data)
    {
        return $this->answer_repository->save($data);
    }

    // 削除
    public function delete($answer_id)
    {
        return $this->answer_repository->delete($answer_id);
    }

    // 更新
    public function update($data)
    {
        return $this->answer_repository->update($data);
    }
}
