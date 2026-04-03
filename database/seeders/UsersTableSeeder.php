<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $data = array(
            array(
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('Admin123'),
                'role' => 'admin',
                'status' => 'active'
            ),
            array(
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('Admin123'),
                'role' => 'user',
                'status' => 'active'
            ),
        );

        DB::table('users')->insert($data);
    }
}