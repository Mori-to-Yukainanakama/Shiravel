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
            'is_answered' => true,
            'is_solved' => true,
            'created_at' => now(),
        ]);

        DB::table('questions')->insert([
            'question_id' => 2,
            'user_id' => 2,
            'title' => 'ユーザー２が投稿したタイトル',
            'content' => 'ユーザー２が投稿した質問内容2つめ',
            'is_answered' => true,
            'is_solved' => true,
            'created_at' => now(),
        ]);

        DB::table('questions')->insert([
            'question_id' => 3,
            'user_id' => 3,
            'title' => 'ユーザー３が投稿したタイトル',
            'content' => 'ユーザー３が投稿した質問内容',
            'is_answered' => true,
            'is_solved' => true,
            'created_at' => now(),
        ]);

        DB::table('questions')->insert([
            'question_id' => 4,
            'user_id' => 1,
            'title' => 'ユーザー１が投稿したタイトル2つ目',
            'content' => 'ユーザー１が投稿した質問内容２つ目',
            'is_answered' => true,
            'created_at' => now(),
        ]);

        DB::table('questions')->insert([
            'question_id' => 5,
            'user_id' => 2,
            'title' => 'ユーザー2が投稿したタイトル3つ目',
            'content' => 'ベストアンサーがもらえない',
            'is_answered' => true,
            'created_at' => now(),
        ]);

        DB::table('questions')->insert([
            'question_id' => 6,
            'user_id' => 3,
            'title' => 'Laravel Sanctum SPA認証',
            'content' => '難しい、、、、サンクたむ',
            'created_at' => now(),
        ]);

        DB::table('questions')->insert([
            'question_id' => 7,
            'user_id' => 2,
            'title' => 'ポケモンの捕まえ方',
            'content' => 'モンスターボール以外でどうやって捕まえればいいですか',
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'question_id' => 8,
            'user_id' => 2,
            'title' => '寒い日に食べるもの',
            'content' => '鍋以外ないですよね？？',
            'created_at' => now(),
        ]);

        DB::table('questions')->insert([
            'question_id' => 9,
            'user_id' => 1,
            'title' => '靴下に穴が空きました',
            'content' => 'どうやったら靴下に穴が開かないようにできますか',
            'created_at' => now(),
        ]);

        DB::table('questions')->insert([
            'question_id' => 10,
            'user_id' => 1,
            'title' => '冬季オリンピック',
            'content' => '自分も金メダル欲しいです。どうすればいいでしょうか',
            'created_at' => now(),
        ]);

        DB::table('questions')->insert([
            'question_id' => 11,
            'user_id' => 2,
            'title' => 'LINE通話について',
            'content' => 'LINEの通話機能はすぐ電波悪くなります',
            'created_at' => now(),
        ]);

        DB::table('questions')->insert([
            'question_id' => 12,
            'user_id' => 2,
            'title' => 'テストデータ作成',
            'content' => 'テストデータ作成するのだるい',
            'created_at' => now(),
        ]);
    }
}
