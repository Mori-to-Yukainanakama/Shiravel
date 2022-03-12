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
        return $questions->sortByDesc('created_at')->values();
    }

    /**
     * 質問一覧取得（未回答）
     *
     * @return Question
     */
    public function getUnanswered()
    {
        return Question::where('is_answered', false)->with('user')->get();
    }

    /**
     * 質問一覧取得（回答有）
     *
     * @return Question
     */
    public function getAnswered()
    {
        return Question::where('is_answered', true)->with('user')->get();
    }

    /**
     * 質問一覧取得（未解決）
     *
     * @return Question
     */
    public function getUnsolved()
    {
        return Question::where('is_solved', false)->with('user')->get();
    }

    /**
     * 質問一覧取得（解決済）
     *
     * @return Question
     */
    public function getSolved()
    {
        return Question::where('is_solved', true)->with('user')->get();
    }

    // プライマリーキー（id）で1件取得
    public function getDataById($id)
    {
        return Question::findOrFail($id);
    }

    // 質問登録
    public function save($data)
    {
        $question = new Question;
        $question->fill($data)->save();
    }


    // 質問更新
    public function update($data)
    {
        $question = Question::findOrFail($data['user_id']);
        $question->update($data);
    }

    // 質問詳細取得
    public function getQuestionDetail($id)
    {
        // 質問のベストアンサーを取得
        $bestAnswer = Question::with('bestAnswer')->findOrFail($id)->bestanswer;

        // ベストアンサーがない場合、ベストアンサーテーブルは取得しない
        if ($bestAnswer == null) {
            return $question = Question::with('user')->with('answers.user')->with('answers.answerComments.user')->with('questionComments.user')->find($id);
        }

        // 何がベストアンサーになったか判定
        // 回答がベストアンサーの場合
        if ($bestAnswer->answer_id != null) {
            return $question = Question::with('user')->with('answers.user')->with('answers.answerComments.user')->with('questionComments.user')->with('bestAnswer.answer.user')->find($id);

            // 回答コメントがベストアンサーの場合
        } else if ($bestAnswer->answer_comment_id != null) {
            return $question = Question::with('user')->with('answers.user')->with('answers.answerComments.user')->with('questionComments.user')->with('bestAnswer.answerComment.user')->find($id);

            // 質問コメントがベストアンサーの場合
        } else if ($bestAnswer->question_comment_id != null) {
            return $question = Question::with('user')->with('answers.user')->with('answers.answerComments.user')->with('questionComments.user')->with('bestAnswer.questionComment.user')->find($id);
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
