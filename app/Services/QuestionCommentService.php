<?php

namespace App\Services;

use App\Repositories\QuestionCommentRepository;
use App\Repositories\RepositoryInterface;


class QuestionCommentService
{

    private QuestionCommentRepository $question_comment_repository;

    // インスタンス生成
    public function __construct(
        QuestionCommentRepository $question_comment_repository
    ) {
        $this->question_comment_repository = $question_comment_repository;
    }

    /**
     * 質問コメント全取得
     *
     * @return string
     */
    public function getAll()
    {
        return $this->question_comment_repository->getAll();
    }

    // プライマリーキー（id）で1件取得
    /**
     * 質問コメント1件取得
     *
     * @param [array] $id
     * @return string
     */
    public function getDataById($id)
    {
        return $this->question_comment_repository->getDataById($id);
    }

    /**
     * 質問コメント登録
     *
     * @param [array] $data
     * @return void
     */
    public function create($data)
    {
        return $this->question_comment_repository->save($data);
    }

    /**
     * 質問コメント更新
     *
     * @param [array] $data
     * @return void
     */
    public function update($data)
    {
        return $this->question_comment_repository->update($data);
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
