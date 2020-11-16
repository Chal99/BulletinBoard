<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


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
                'title' => 'title1',
                'description' => 'this is description',
                'status' => '1',
                'create_user_id' => '1',
                'updated_user_id' => '1',
                'deleted_user_id' => null,
                'deleted_at' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        );
        DB::table('posts')->insert(
            [
                'title' => 'title2',
                'description' => 'this is description',
                'status' => '1',
                'create_user_id' => '1',
                'updated_user_id' => '1',
                'deleted_user_id' => null,
                'deleted_at' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

            ]
        );
        DB::table('posts')->insert(
            [
                'title' => 'title3',
                'description' => 'this is description',
                'status' => '1',
                'create_user_id' => '1',
                'updated_user_id' => '1',
                'deleted_user_id' => null,
                'deleted_at' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        );
    }
}
