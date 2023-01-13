<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                "name" => 'Soirée spécial',
                "src" => 'single_blog_1.png',
                "categriblogs_id" => 1,
                "created_at" => "2023-01-12 15:12:05"
            ],
            [
                "name" => 'Blog photo',
                "src" => 'single_blog_2.png',
                "categriblogs_id" => 2,
                "created_at" => "2023-01-12 15:12:05"
            ],
            [
                "name" => 'Défiller de mode',
                "src" => 'single_blog_3.png',
                "categriblogs_id" => 3,
                "created_at" => "2023-01-12 15:12:05"
            ],
            [
                "name" => 'Life hack',
                "src" => 'single_blog_4.png',
                "categriblogs_id" => 4,
                "created_at" => "2023-01-12 15:12:05"
            ],
            [
                "name" => 'Patisserie',
                "src" => 'single_blog_5.png',
                "categriblogs_id" => 5,
                "created_at" => "2023-01-12 15:12:05"
            ],
            ]
        );
    }
}
