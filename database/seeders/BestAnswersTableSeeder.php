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
        //
        DB::table('best_answers')->insert([
            'best_answer_id' => 1,
            'answer_id' => 1,
            'question_comment_id' => 1,
            'answer_comment_id' => 1,
            'created_at' => now(),
        ]);
    }
}
