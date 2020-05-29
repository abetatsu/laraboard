<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('listings')->insert([
            [
                'title' => '緊急タスク',
                'user_id' => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'title' => '買い出しリスト',
                'user_id' => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'title' => '勉強',
                'user_id' => '2',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'title' => '運動',
                'user_id' => '2',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);
    }
}
