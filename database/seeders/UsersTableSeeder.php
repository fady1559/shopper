<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password123'), // Use bcrypt for hashing the password
                'image' => null,
                'email_verified_at' => now(),
                'User_Type' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Moderator User',
                'email' => 'moderator@example.com',
                'password' => bcrypt('password123'),
                'image' => null,
                'email_verified_at' => now(),
                'User_Type' => 'moderator',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Customer User',
                'email' => 'customer@example.com',
                'password' => bcrypt('password123'),
                'image' => null,
                'email_verified_at' => now(),
                'User_Type' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
