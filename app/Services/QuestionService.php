<?php

namespace App\Services;

use App\Repositories\QuestionRepository;
use App\Repositories\RepositoryInterface;

class QuestionService
{

    // QuestionRepositoryのインスタンス生成は「AppServiceProvider.php」のbuild関数でしてる
    private RepositoryInterface $question_repository;

    public function __construct(RepositoryInterface $question_repository)
    {
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

    /**
     * 質問削除
     * @param [int] $id
     * @return void
     */
    public function delete($id)
    {
        // $this->question_repository->delete($id);
        // TODO API疎通確認用のため削除
        return $this->question_repository->delete($id);
    }
}
