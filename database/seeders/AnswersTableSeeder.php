<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //回答テーブルのテストデータ
        DB::table('answers')->insert([
            'answer_id' => 1,
            'user_id' => 1,
            'question_id' => 1,
            'content' => 'ユーザー１が投稿した回答内容',
            'created_at' => now(),
        ]);

        DB::table('answers')->insert([
            'answer_id' => 2,
            'user_id' => 2,
            'question_id' => 1,
            'content' => 'ユーザー２が投稿した回答内容',
            'created_at' => now(),
        ]);

        DB::table('answers')->insert([
            'answer_id' => 3,
            'user_id' => 3,
            'question_id' => 3,
            'content' => 'ユーザー３が投稿した回答内容',
            'created_at' => now(),
        ]);

        DB::table('answers')->insert([
            'answer_id' => 4,
            'user_id' => 2,
            'question_id' => 3,
            'content' => 'ユーザー２が投稿した回答内容2つ目',
            'created_at' => now(),
        ]);

        DB::table('answers')->insert([
            'answer_id' => 5,
            'user_id' => 1,
            'question_id' => 2,
            'content' => 'ユーザー１が投稿した回答内容2つ目',
            'created_at' => now(),
        ]);
    }
}
