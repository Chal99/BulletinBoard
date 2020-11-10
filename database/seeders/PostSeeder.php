<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert(
            [
                'title' => Str::random(10),
                'description' => Str::random(20),
                'status' => '1',
                'create_user_id' => '1',
                'updated_user_id' => '1',
                'deleted_user_id' => '1',
                'deleted_at' => '1998:9:27 20:12:32',
            ],
            [
                'title' => Str::random(10),
                'description' => Str::random(20),
                'status' => '1',
                'create_user_id' => '1',
                'updated_user_id' => '1',
                'deleted_user_id' => '1',
                'deleted_at' => '1998:9:27 20:12:32',
            ],
            [
                'title' => Str::random(10),
                'description' => Str::random(20),
                'status' => '1',
                'create_user_id' => '1',
                'updated_user_id' => '1',
                'deleted_user_id' => '1',
                'deleted_at' => '1998:9:27 20:12:32',
            ]
        );
    }
}