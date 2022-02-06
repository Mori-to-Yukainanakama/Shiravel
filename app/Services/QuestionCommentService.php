<?php

namespace App\Services;

use App\Repositories\QuestionCommentRepository;
use App\Repositories\RepositoryInterface;


class QuestionCommentService
{

    private RepositoryInterface $question_comment_repository;

    // インスタンス生成
    public function __construct(
        RepositoryInterface $question_comment_repository
    ) {
        $this->question_comment_repository = $question_comment_repository;
    }

    public function create($data)
    {
        return $this->question_comment_repository->save($data);
    }

    /**
     * 質問コメント削除
     * @param [int] $id
     * @return void
     */
    public function delete($id)
    {
        // TODO API疎通確認用のため削除
        return $this->question_comment_repository->delete($id);
    }
}
