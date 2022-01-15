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
            'content' => '質問コメント',
            'created_at' => now(),
        ]);
    }
}
