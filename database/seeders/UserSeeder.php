<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                "name" => "Admin",
                "email" => "admin@admin.com",
                "role_id" => 1,
                "avatar" => "author_1.png",
                "password" => Hash::make("admin@admin.com")
            ],
            [
                "name" => "Lui",
                "email" => "moi@moi.com",
                "role_id" => 2,
                "avatar" => "author_2.png",
                "password" => Hash::make("moi@moi.com")
            ],
            [
                "name" => "Redac",
                "email" => "red@red.com",
                "role_id" => 3,
                "avatar" => "author_2.png",
                "password" => Hash::make("red@red.com")
            ],
            [
                "name" => "Member",
                "email" => "member@member.com",
                "role_id" => 4,
                "avatar" => "author_3.png",
                "password" => Hash::make("member@member.com")
            ],
        ]);
    }
}
