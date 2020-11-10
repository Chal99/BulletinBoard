<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => Str::random(10),
                'email' => Str::random(20) . '@gmail.com',
                'password' => Hash::make('password'),
                'profile' => '',
                'type' => '1',
                'phone' => '094234234',
                'address' => 'Yangon',
                'dob' => '1998:9:27 20:12:32',
                'create_user_id' => '1',
                'updated_user_id' => '1',
                'deleted_user_id' => '1',
                'deleted_at' => '1998:9:27 20:12:32',
            ],
            [
                'name' => Str::random(3),
                'email' => Str::random(3) . '@gmail.com',
                'password' => Hash::make('password'),
                'profile' => '',
                'type' => '1',
                'phone' => '094234234',
                'address' => 'Yangon',
                'dob' => '1998-9-27',
                'create_user_id' => '1',
                'updated_user_id' => '1',
                'deleted_user_id' => '1',
                'deleted_at' => '1998:9:27 20:12:32',
            ],
            [
                'name' => Str::random(3),
                'email' => Str::random(3) . '@gmail.com',
                'password' => Hash::make('password'),
                'profile' => '',
                'type' => '1',
                'phone' => '094234234',
                'address' => 'Yangon',
                'dob' => '1998-9-27',
                'create_user_id' => '1',
                'updated_user_id' => '1',
                'deleted_user_id' => '1',
                'deleted_at' => '1998:9:27 20:12:32',
            ]
        );
    }
}
