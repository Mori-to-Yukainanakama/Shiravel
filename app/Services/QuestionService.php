<?php

namespace App\Services;

use App\Repositories\QuestionRepository;

class QuestionService
{

    // QuestionRepositoryのインスタンス生成は「AppServiceProvider.php」のbuild関数でしてる
    private QuestionRepository $question_repository;

    public function __construct(QuestionRepository $question_repository)
    {
        $this->question_repository = $question_repository;
    }

    /**
     * 質問全件取得
     *
     * @return Question
     */
    public function getAll()
    {
        return $this->question_repository->getAll();
    }

    /**
     * 質問一覧取得（新着順）
     *
     * @return Question
     */
    public function getNewArrival()
    {
        return $this->question_repository->getNewArrival();
    }

    /**
     * 質問一覧取得（未回答）
     *
     * @return Question
     */
    public function getUnanswered()
    {
        return $this->question_repository->getUnanswered();
    }

    /**
     * 質問一覧取得（回答有）
     *
     * @return Question
     */
    public function getAnswered()
    {
        return $this->question_repository->getAnswered();
    }

    /**
     * 質問一覧取得（未解決）
     *
     * @return Question
     */
    public function getUnsolved()
    {
        return $this->question_repository->getUnsolved();
    }

    /**
     * 質問一覧取得（解決済）
     *
     * @return Question
     */
    public function getSolved()
    {
        return $this->question_repository->getSolved();
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

    public function update($data)
    {
        return $this->question_repository->update($data);
    }

    public function getQuestionDetail($id)
    {
        return $this->question_repository->getQuestionDetail($id);
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
