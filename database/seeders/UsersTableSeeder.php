<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'user_id' => 1,
            'name' => 'mori',
            'email' => 'aaa@example.com',
            'password' => 'aaaaa',
            'created_at' => now(),
        ]);
    }
}
