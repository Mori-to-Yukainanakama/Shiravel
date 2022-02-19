<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BestAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ベストアンサーのテストデータ
        DB::table('best_answers')->insert([
            'best_answer_id' => 1,
            'question_id' => 1,
            'answer_id' => 1,
            'question_comment_id' => null,
            'answer_comment_id' => null,
            'created_at' => now(),
        ]);

        DB::table('best_answers')->insert([
            'best_answer_id' => 2,
            'question_id' => 2,
            'answer_id' => null,
            'question_comment_id' => 2,
            'answer_comment_id' => null,
            'created_at' => now(),
        ]);

        DB::table('best_answers')->insert([
            'best_answer_id' => 3,
            'question_id' => 3,
            'answer_id' => null,
            'question_comment_id' => null,
            'answer_comment_id' => 3,
            'created_at' => now(),
        ]);
    }
}
