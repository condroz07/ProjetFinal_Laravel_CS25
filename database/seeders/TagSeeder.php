<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                "name" => "photo"
            ],
            [
                "name" => "soirée"
            ],
            [
                "name" => "restauration"
            ],
            [
                "name" => "mannequin"
            ],
            [
                "name" => "life hack"
            ],
        ]);
    }
}
