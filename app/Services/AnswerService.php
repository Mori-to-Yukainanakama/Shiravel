<?php

namespace App\Services;

use App\Repositories\AnswerRepository;
use App\Repositories\QuestionRepository;
use Illuminate\Support\Facades\DB;
use Throwable;

class AnswerService
{
    private AnswerRepository $answer_repository;
    private QuestionRepository $question_repository;

    // インスタンス生成
    public function __construct(AnswerRepository $answer_repository, QuestionRepository $question_repository)
    {
        $this->answer_repository = $answer_repository;
        $this->question_repository = $question_repository;
    }

    // 取得
    public function get($question_id)
    {
        return $this->answer_repository->get($question_id);
    }

    // 登録
    public function save($data)
    {
        try {
            // トランザクションスタート
            DB::beginTransaction();

            // 回答を登録
            $this->answer_repository->save($data);

            // 回答を登録した質問を取得
            $question = $this->question_repository->getDataById($data['question_id']);

            // 回答を登録した質問を回答有りに変更
            $this->question_repository->isAnsweredTrueUpdate($question);

            // 処理が正常終了した場合、DBに保存
            DB::commit();
        } catch (Throwable $e) {

            // 処理途中にエラーが発生したら、全ての更新を元に戻す
            // ログの出力をするようにしないといけない
            DB::rollBack();
        }
    }

    // 削除
    public function delete($request)
    {
        // 回答を削除
        $this->answer_repository->delete($request->answer_id);

        // 質問に付随している回答を取得
        $answers = $this->question_repository->getAnswers($request->question_id);

        // 質問に回答があるかの判定
        if ($answers == null) {

            // 回答がない場合、回答フラグを更新して「回答なし」に更新
            $question = $this->question_repository->getDataById($request->question_id);
            $this->question_repository->isAnsweredFalseUpdate($question);
        }
    }

    // 更新
    public function update($data)
    {
        return $this->answer_repository->update($data);
    }
}
