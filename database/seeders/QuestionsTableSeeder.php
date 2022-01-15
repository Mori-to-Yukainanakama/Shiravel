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
        //
        DB::table('questions')->insert([
            'question_id' => 1,
            'user_id' => 1,
            'title' => 'テストタイトル',
            'content' => '質問内容',
            'created_at' => now(),
        ]);
    }
}
