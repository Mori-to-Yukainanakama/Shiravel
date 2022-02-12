<?php

namespace App\Services;

use App\Repositories\AnswerCommentRepository;
use App\Repositories\RepositoryInterface;

class AnswerCommentService
{
    private RepositoryInterface $answer_comment_repository;

    public function __construct(RepositoryInterface $answer_comment_repository)
    {
        $this->answer_comment_repository = $answer_comment_repository;
    }

    public function create($data)
    {
        return $this->answer_comment_repository->save($data);
    }
}
