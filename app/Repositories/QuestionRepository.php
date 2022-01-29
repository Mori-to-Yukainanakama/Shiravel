<?php

namespace App\Repositories;

use App\Models\Question;

// Repositoryのインターフェースを継承
class QuestionRepository implements RepositoryInterface
{

    // 全件取得
    public function getAll()
    {
        return Question::all();
    }

    // プライマリーキー（id）で1件取得
    public function getDataById($id)
    {
        return Question::find($id);
    }

    // 質問登録
    public function save($data)
    {
        $question = new Question;
        $question->fill($data)->save();
    }
}
