<?php

namespace App\Repositories;

use App\Models\Answer;

// Repositoryのインターフェースを継承
class AnswerRepository implements RepositoryInterface
{

    // 全件取得
    public function getAll()
    {
        return Answer::all();
    }

    // プライマリーキー（id）で1件取得
    public function getDataById($id)
    {
        return Answer::find($id);
    }

    public function save($data)
    {
        $answer = new Answer;
        $answer->fill($data)->save();
    }
}
