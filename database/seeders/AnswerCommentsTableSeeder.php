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
            'content' => '回答コメント',
            'created_at' => now(),
        ]);
    }
}
