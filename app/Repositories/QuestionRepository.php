<?php

namespace App\Repositories;

use App\Models\Question;

// Repositoryのインターフェースを継承
class QuestionRepository implements RepositoryInterface
{

    /**
     * 質問全件取得
     *
     * @return Question
     */
    public function getAll()
    {
        return $questions = Question::with('user')->get();
    }

    /**
     * 質問一覧取得（新着順）
     *
     * @return Question
     */
    public function getNewArrival()
    {
        $questions = Question::with('user')->get();
        return $questions->sortByDesc('question_id')->values();
    }

    /**
     * 質問一覧取得（未回答）
     *
     * @return Question
     */
    public function getUnanswered()
    {
        return $questions = Question::where('is_answered', false)->with('user')->get();
    }

    /**
     * 質問一覧取得（回答有）
     *
     * @return Question
     */
    public function getAnswered()
    {
        return $questions = Question::where('is_answered', true)->with('user')->get();
    }

    /**
     * 質問一覧取得（未解決）
     *
     * @return Question
     */
    public function getUnsolved()
    {
        return $questions = Question::where('is_solved', false)->with('user')->get();
    }

    /**
     * 質問一覧取得（解決済）
     *
     * @return Question
     */
    public function getSolved()
    {
        return $questions = Question::where('is_solved', true)->with('user')->get();
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
        $bestAnswer = Question::with('bestAnswer')->findOrFail($id)->bestanswer;

        // ベストアンサーがない場合、ベストアンサーテーブルは取得しない
        if ($bestAnswer == null) {
            return $question = Question::with('answers.answerComments')->with('questionComments')->find($id);
        }

        // 何がベストアンサーになったか判定
        // 回答がベストアンサーの場合
        if ($bestAnswer->answer_id != null) {
            return $question = Question::with('answers.answerComments')->with('questionComments')->with('bestAnswer.answer.user')->find($id);

            // 回答コメントがベストアンサーの場合
        } else if ($bestAnswer->answer_comment_id != null) {
            return $question = Question::with('answers.answerComments')->with('questionComments')->with('bestAnswer.answerComment.user')->find($id);

            // 質問コメントがベストアンサーの場合
        } else if ($bestAnswer->question_comment_id != null) {
            return $question = Question::with('answers.answerComments')->with('questionComments')->with('bestAnswer.questionComment.user')->find($id);
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
