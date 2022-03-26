<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Answer;
use App\Models\AnswerComment;
use App\Models\BestAnswer;
use App\Models\QuestionComment;
use App\Models\Question;
use App\Models\User;

class DatabaseSeeder extends Seeder
{


    // ベストアンサーに登録する回答id保存用フィールド
    private $answerId;

    // ベストアンサーに登録する質問コメントid保存用フィールド
    private $questionCommentId;

    // ベストアンサーに登録する回答コメントid保存用フィールド
    private $answerCommentId;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * ユーザー 10件登録
         */
        User::factory()->count(10)->create();

        /**
         * 質問データ 5件登録
         *
         * 質問コメント有り
         * 回答有り
         * 回答コメント無し
         * ベストアンサー無し
         *
         */
        Question::factory()->count(5)->create(['is_answered' => true])->each(function ($question) {

            // 質問1つに対して3件の質問コメントデータを登録
            QuestionComment::factory()->count(3)->create(['question_id' => $question->question_id]);

            // 質問1つに対して3件の回答データを登録
            Answer::factory()->count(3)->create(['question_id' => $question->question_id])->each(function ($answer) {

                // 回答1つに対して3件の回答コメントを作成
                AnswerComment::factory()->count(3)->create(['answer_id' => $answer->answer_id]);
            });
        });

        /**
         * 質問データ 5件登録
         *
         * 質問コメント無し
         * 回答無し
         * 回答コメント無し
         * ベストアンサー無し
         *
         */
        Question::factory()->count(5)->create();

        /**
         * 質問データ 5件登録
         *
         * 質問コメント有り
         * 回答無し
         * 回答コメント無し
         * ベストアンサー無し
         *
         */
        Question::factory()->count(5)->create()->each(function ($question) {

            // 質問1つに対して3件の質問コメントを登録
            QuestionComment::factory()->count(3)->create(['question_id' => $question->question_id]);
        });

        /**
         * 質問データ 5件登録
         *
         * 質問コメント有り
         * 回答有り
         * 回答コメント無し
         * ベストアンサー無し
         *
         */
        Question::factory()->count(5)->create(['is_answered' => true])->each(function ($question) {

            // 質問1つに対して3件の質問コメントを登録
            QuestionComment::factory()->count(3)->create(['question_id' => $question->question_id]);

            // 質問1件に対して2件の回答を登録
            Answer::factory()->count(2)->create(['question_id' => $question->question_id]);
        });


        /**
         * 質問データ 5件登録
         *
         * 質問コメント有り
         * 回答有り
         * 回答コメント有り
         * ベストアンサー有り（回答を登録）
         *
         */
        Question::factory()->count(5)->create(['is_answered' => true, 'is_solved' => true])->each(function ($question) {

            // 質問1つに対して3件の質問コメントデータを登録
            QuestionComment::factory()->count(3)->create(['question_id' => $question->question_id]);

            // 質問1つに対して3件の回答データを登録

            Answer::factory()->count(3)->create(['question_id' => $question->question_id])->each(function ($answer) {

                // 回答1つに対して3件の回答コメントを作成
                AnswerComment::factory()->count(3)->create(['answer_id' => $answer->answer_id]);

                // ベストアンサーに登録する回答テーブルのidを保存
                $this->answerId = $answer->answer_id;
            });

            // 質問1件に対してベストアンサーを1件登録
            // 回答をベストアンサーへ登録
            BestAnswer::factory()->count(1)->create(['question_id' => $question->question_id, 'answer_id' => $this->answerId]);
        });


        /**
         * 質問データ 5件登録
         *
         * 質問コメント有り
         * 回答有り
         * 回答コメント無し
         * ベストアンサー有り（質問コメントを登録）
         *
         */
        Question::factory()->count(5)->create(['is_answered' => true, 'is_solved' => true])->each(function ($question) {

            // 質問1つに対して3件の質問コメントデータを登録
            QuestionComment::factory()->count(3)->create(['question_id' => $question->question_id])->each(function ($question_comment) {

                // ベストアンサーへ登録する質問コメントのidを保存
                $this->questionCommentId = $question_comment->question_comment_id;
            });

            // 質問1つに対して3件の回答データを登録

            Answer::factory()->count(3)->create(['question_id' => $question->question_id]);

            // 質問1件に対してベストアンサーを1件登録
            // 質問コメントをベストアンサーへ登録
            BestAnswer::factory()->count(1)->create(['question_id' => $question->question_id, 'question_comment_id' => $this->questionCommentId]);
        });


        /**
         * 質問データ 5件登録
         *
         * 質問コメント有り
         * 回答有り
         * 回答コメント有り
         * ベストアンサー有り（回答コメントを登録）
         *
         */
        Question::factory()->count(5)->create(['is_answered' => true, 'is_solved' => true])->each(function ($question) {

            // 質問1つに対して3件の質問コメントデータを登録
            QuestionComment::factory()->count(3)->create(['question_id' => $question->question_id]);

            // 質問1つに対して3件の回答データを登録

            Answer::factory()->count(3)->create(['question_id' => $question->question_id])->each(function ($answer) {

                // 回答1つに対して3件の回答コメントを作成
                AnswerComment::factory()->count(3)->create(['answer_id' => $answer->answer_id])->each(function ($answer_comment) {

                    // ベストアンサーへ登録する回答コメントのidを保存
                    $this->answerCommentId = $answer_comment->answer_comment_id;
                });
            });

            // 質問1件に対してベストアンサーを1件登録
            // 回答コメントをベストアンサーへ登録
            BestAnswer::factory()->count(1)->create(['question_id' => $question->question_id, 'answer_comment_id' => $this->answerCommentId]);
        });
    }
}
