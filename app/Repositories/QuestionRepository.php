<?php

namespace App\Repositories;

use App\Models\Question;

// Repositoryのインターフェースを継承
class QuestionRepository implements RepositoryInterface
{

    // 全件取得
    public function getAll()
    {
        return Question::with('user')->get();
    }

    // プライマリーキー（id）で1件取得
    public function getDataById($id)
    {
        return Question::findOrFail(2);
    }

    // 質問登録
    public function save($data)
    {
        $question = new Question;
        $question->fill($data)->save();
    }

    public function update($data)
    {
        $question = Question::findOrFail($data['user_id']);
        $question->update($data);
    }

    public function getQuestionDetail($id)
    {
        // 質問のベストアンサーを取得
        $bestAnswer = Question::with('bestAnswer.answerComment')->findOrFail($id)->bestanswer;
        if ($bestAnswer == null) {
            return $question = Question::with('answers.answerComments')->with('questionComments')->find($id);
        }

        if ($bestAnswer->answer_id != null) {
            return $question = Question::with('answers.answerComments')->with('questionComments')->with('bestAnswer.answer.user')->find($id);
        } else if ($bestAnswer->answer_comment_id != null) {
            return $question = Question::with('answers.answerComments')->with('questionComments')->with('bestAnswer.answerComment.user')->find($id);
        } else if ($bestAnswer->question_comment_id != null) {
            return $question = Question::with('answers.answerComments')->with('questionComments')->with('bestAnswer.questionComment')->find($id);
        }
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
