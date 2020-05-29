<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
            ],[
            'name' => 'test2',
            'email' => 'test2@test.com',
            'password' => Hash::make('password'),
            ]
        ]);
    }
}
