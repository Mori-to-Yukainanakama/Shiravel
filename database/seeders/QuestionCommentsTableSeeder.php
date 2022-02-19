<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //質問コメントのテストデータ
        DB::table('question_comments')->insert([
            'question_comment_id' => 1,
            'user_id' => 1,
            'question_id' => 1,
            'content' => 'ユーザー１が投稿した質問コメント',
            'created_at' => now(),
        ]);

        DB::table('question_comments')->insert([
            'question_comment_id' => 2,
            'user_id' => 2,
            'question_id' => 2,
            'content' => 'ユーザー２が投稿した質問コメント',
            'created_at' => now(),
        ]);

        DB::table('question_comments')->insert([
            'question_comment_id' => 3,
            'user_id' => 3,
            'question_id' => 2,
            'content' => 'ユーザー３が投稿した質問コメント',
            'created_at' => now(),
        ]);

        DB::table('question_comments')->insert([
            'question_comment_id' => 4,
            'user_id' => 1,
            'question_id' => 3,
            'content' => 'ユーザー２が投稿した質問コメント2つ目',
            'created_at' => now(),
        ]);
    }
}
