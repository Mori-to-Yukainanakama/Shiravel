<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //回答コメントテーブルのテストデータ
        DB::table('answer_comments')->insert([
            'answer_comment_id' => 1,
            'user_id' => 1,
            'answer_id' => 1,
            'content' => 'ユーザー１が投稿した回答コメント',
            'created_at' => now(),
        ]);

        DB::table('answer_comments')->insert([
            'answer_comment_id' => 2,
            'user_id' => 2,
            'answer_id' => 2,
            'content' => 'ユーザー２が投稿した回答コメント',
            'created_at' => now(),
        ]);

        DB::table('answer_comments')->insert([
            'answer_comment_id' => 3,
            'user_id' => 2,
            'answer_id' => 3,
            'content' => 'ユーザー２が投稿した回答コメント2つ目',
            'created_at' => now(),
        ]);

        DB::table('answer_comments')->insert([
            'answer_comment_id' => 4,
            'user_id' => 2,
            'answer_id' => 1,
            'content' => 'ユーザー２が投稿した回答コメント３つ目',
            'created_at' => now(),
        ]);
    }
}
