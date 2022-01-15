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
        //
        DB::table('answers')->insert([
            'answer_id' => 1,
            'user_id' => 1,
            'question_id' => 1,
            'content' => '回答内容',
            'created_at' => now(),
        ]);
    }
}
