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

    public function update($data)
    {
        $question = Question::find($data['user_id']);
        $question->update($data);
    }

    public function getCommentAnswer($id)
    {
        $question = $this->getDataById($id);
        $answers = $question::with('answers.answerComments')->get();
        $question_comments = Question::with('questionComments')->get();
        return ['answers' => $answers, 'questionComment' => $question_comments];
    }

    /**
     * 質問削除
     * @param [int] $id
     * @return void
     */
    public function delete($id)
    {
        // Question::find($id)->delete();
        // TODO レスポンス確認用のため削除
        return '削除完了';
    }
}
