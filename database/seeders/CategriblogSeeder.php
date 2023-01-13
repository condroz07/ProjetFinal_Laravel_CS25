<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategriblogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categriblogs')->insert([
            [
                "name" => "festiviter"
            ],
            [
                "name" => "photo"
            ],
            [
                "name" => "mannequinat"
            ],
            [
                "name" => "life hack"
            ],
            [
                "name" => "restauration"
            ],
        ]);
    }
}
