<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ユーザーテーブルのテストデータ
        DB::table('users')->insert([
            'user_id' => 1,
            'name' => 'mori',
            'email' => 'mori@mori',
            'password' => Hash::make('morimorimori'),
            'created_at' => now(),
        ]);

        DB::table('users')->insert([
            'user_id' => 2,
            'name' => 'tanaka',
            'email' => 'tanaka@tanaka',
            'password' => Hash::make('tanakatanaka'),
            'created_at' => now(),
        ]);

        DB::table('users')->insert([
            'user_id' => 3,
            'name' => 'yama',
            'email' => 'yama@yama',
            'password' => Hash::make('yamayamayama'),
            'created_at' => now(),
        ]);
    }
}
