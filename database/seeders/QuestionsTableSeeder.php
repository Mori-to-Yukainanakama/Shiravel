<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //質問テーブルのテストデータ
        DB::table('questions')->insert([
            'question_id' => 1,
            'user_id' => 1,
            'title' => 'ユーザー１が投稿したタイトル',
            'content' => 'ユーザー２が投稿した質問内容',
            'created_at' => now(),
        ]);

        DB::table('questions')->insert([
            'question_id' => 2,
            'user_id' => 2,
            'title' => 'ユーザー２が投稿したタイトル',
            'content' => 'ユーザー２が投稿した質問内容2つめ',
            'created_at' => now(),
        ]);

        DB::table('questions')->insert([
            'question_id' => 3,
            'user_id' => 3,
            'title' => 'ユーザー３が投稿したタイトル',
            'content' => 'ユーザー３が投稿した質問内容',
            'created_at' => now(),
        ]);

        DB::table('questions')->insert([
            'question_id' => 4,
            'user_id' => 1,
            'title' => 'ユーザー１が投稿したタイトル2つ目',
            'content' => 'ユーザー１が投稿した質問内容２つ目',
            'created_at' => now(),
        ]);

        DB::table('questions')->insert([
            'question_id' => 5,
            'user_id' => 2,
            'title' => 'ユーザー2が投稿したタイトル3つ目',
            'content' => 'ベストアンサーがもらえない',
            'created_at' => now(),
        ]);
    }
}
