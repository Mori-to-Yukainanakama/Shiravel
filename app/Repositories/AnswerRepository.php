<?php

namespace App\Repositories;

use App\Models\Answer;

// Repositoryのインターフェースを継承
class AnswerRepository implements RepositoryInterface
{

    // 質問に紐づく回答取得
    public function getAll($question_id)
    {
        $answers = Answer::where("question_id", "=" , $question_id)->get();
        return $answers;
    }

    // 回答登録
    public function save($data)
    {
        $answer = new Answer();
        $answer->fill($data)->save();
    }
    
    // 回答削除
    public function delete($id)
    {
        Answer::find($id)->delete();
    }

    // 回答更新
    public function update($data)
    {
        $answer = Answer::findOrFail($id["answer_id"]);        
        $answer->updata($data);
    }
}
