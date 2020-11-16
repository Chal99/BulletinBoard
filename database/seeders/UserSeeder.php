<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


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
                'name' => 'hlahla',
                'email' => 'scm.myathetchal@gmail.com',
                'password' => Hash::make('asd123'),
                'profile' => 'sdfs',
                'type' => '0',
                'phone' => '094234234',
                'address' => 'Yangon',
                'dob' => '1998:9:27 20:12:32',
                'create_user_id' => '1',
                'updated_user_id' => '1',
                'deleted_user_id' => null,
                'deleted_at' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'tintin',
                'email' => 'myathetchal.199827@gmail.com',
                'password' => Hash::make('asd123'),
                'profile' => 'sdfsdf',
                'type' => '1',
                'phone' => '094234234',
                'address' => 'Mandalay',
                'dob' => '1998:9:27 20:12:32',
                'create_user_id' => '1',
                'updated_user_id' => '1',
                'deleted_user_id' => null,
                'deleted_at' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'winwin',
                'email' => 'scm.aungpyaesone@gmail.com',
                'password' => Hash::make('asd123'),
                'profile' => 'dsfsd',
                'type' => '1',
                'phone' => '094234234',
                'address' => 'Naypyitaw',
                'dob' => '1998:9:27 20:12:32',
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
