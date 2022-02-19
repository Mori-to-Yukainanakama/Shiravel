<?php

namespace App\Services;

use App\Repositories\RepositoryInterface;
use App\Repositories\BestAnswerRepository;

// Serviceのインターフェースを継承してる
class BestAnswerService
{

    // UserRepositoryのインスタンス生成は「AppServiceProvider.php」のbuild関数でしてる
    private BestAnswerRepository $best_answer_repository;

    public function __construct(BestAnswerRepository $best_answer_repository)
    {
        $this->best_answer_repository = $best_answer_repository;
    }

    public function create($data)
    {
        return $this->best_answer_repository->save($data);
    }
}
