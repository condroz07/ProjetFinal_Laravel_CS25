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
                "text" => 'MCSE boot camps have its supporters and its detractors. Some people do not understand why
                you
                should have to spend money on boot camp when you can get the MCSE study materials yourself
                at a
                fraction of the camp price. However, who has the willpower
                MCSE boot camps have its supporters and its detractors. Some people do not understand why
                you
                should have to spend money on boot camp when you can get the MCSE study materials yourself
                at a
                fraction of the camp price. However, who has the willpower to actually sit through a
                self-imposed MCSE training. who has the willpower to actually',
                "categriblogs_id" => 1,
                "created_at" => "2023-01-12 15:12:05",
                "tags_id" => 2
            ],
            [
                "name" => 'Blog photo',
                "src" => 'single_blog_2.png',
                "text" => 'MCSE boot camps have its supporters and its detractors. Some people do not understand why
                you
                should have to spend money on boot camp when you can get the MCSE study materials yourself
                at a
                fraction of the camp price. However, who has the willpower
                MCSE boot camps have its supporters and its detractors. Some people do not understand why
                you
                should have to spend money on boot camp when you can get the MCSE study materials yourself
                at a
                fraction of the camp price. However, who has the willpower to actually sit through a
                self-imposed MCSE training. who has the willpower to actually',
                "categriblogs_id" => 2,
                "created_at" => "2023-01-12 15:12:05",
                "tags_id" => 1
            ],
            [
                "name" => 'Défiller de mode',
                "src" => 'single_blog_3.png',
                "text" => 'MCSE boot camps have its supporters and its detractors. Some people do not understand why
                you
                should have to spend money on boot camp when you can get the MCSE study materials yourself
                at a
                fraction of the camp price. However, who has the willpower
                MCSE boot camps have its supporters and its detractors. Some people do not understand why
                you
                should have to spend money on boot camp when you can get the MCSE study materials yourself
                at a
                fraction of the camp price. However, who has the willpower to actually sit through a
                self-imposed MCSE training. who has the willpower to actually',
                "categriblogs_id" => 3,
                "created_at" => "2023-01-12 15:12:05",
                "tags_id" => 4
            ],
            [
                "name" => 'Life hack',
                "src" => 'single_blog_4.png',
                "text" => 'MCSE boot camps have its supporters and its detractors. Some people do not understand why
                you
                should have to spend money on boot camp when you can get the MCSE study materials yourself
                at a
                fraction of the camp price. However, who has the willpower
                MCSE boot camps have its supporters and its detractors. Some people do not understand why
                you
                should have to spend money on boot camp when you can get the MCSE study materials yourself
                at a
                fraction of the camp price. However, who has the willpower to actually sit through a
                self-imposed MCSE training. who has the willpower to actually',
                "categriblogs_id" => 4,
                "created_at" => "2023-01-12 15:12:05",
                "tags_id" => 5
            ],
            [
                "name" => 'Patisserie',
                "src" => 'single_blog_5.png',
                "text" => 'MCSE boot camps have its supporters and its detractors. Some people do not understand why
                you
                should have to spend money on boot camp when you can get the MCSE study materials yourself
                at a
                fraction of the camp price. However, who has the willpower
                MCSE boot camps have its supporters and its detractors. Some people do not understand why
                you
                should have to spend money on boot camp when you can get the MCSE study materials yourself
                at a
                fraction of the camp price. However, who has the willpower to actually sit through a
                self-imposed MCSE training. who has the willpower to actually',
                "categriblogs_id" => 5,
                "created_at" => "2023-01-12 15:12:05",
                "tags_id" => 3
            ],
            ]
        );
    }
}
