<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // usersテーブル指定
        $this->call(UsersTableSeeder::class);

        // questionテーブル指定
        $this->call(QuestionsTableSeeder::class);

        // answersテーブル指定
        $this->call(AnswersTableSeeder::class);

        // question_commentsテーブル指定
        $this->call(QuestionCommentsTableSeeder::class);

        // answer_commentsテーブル指定
        $this->call(AnswerCommentsTableSeeder::class);

        // best_answersテーブル指定
        $this->call(BestAnswersTableSeeder::class);
    }
}
