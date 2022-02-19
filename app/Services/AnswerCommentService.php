<?php

namespace App\Services;

use App\Repositories\AnswerCommentRepository;
use App\Repositories\RepositoryInterface;

class AnswerCommentService
{
    private AnswerCommentRepository $answer_comment_repository;

    public function __construct(AnswerCommentRepository $answer_comment_repository)
    {
        $this->answer_comment_repository = $answer_comment_repository;
    }

    // 全件取得
    public function getAll()
    {
        return $this->answer_comment_repository->getAll();
    }

    

    public function create($data)
    {
        return $this->answer_comment_repository->save($data);
    }

    public function update($data)
    {
        return $this->answer_comment_repository->update($data);
    }
}
