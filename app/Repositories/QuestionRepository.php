<?php

namespace App\Repositories;

use App\Models\Question;

// Repositoryのインターフェースを継承
class QuestionRepository implements ShiravelRepositoryInterface
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
}
