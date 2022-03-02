<?php

namespace App\Repositories;

/**
 * AnswerRepositoryのインターフェース
 * 共通で使用されるメソッドのみ用意する
 */
interface AnswerRepositoryInterface
{
    // 取得
    public function get($question_id);

    //登録
    public function save($data);

    // 削除
    public function delete($answer_id);

    // 更新
    public function update($data);
}
