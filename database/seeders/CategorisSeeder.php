<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoris')->insert([
            [
                "name" => "table"
            ],
            [
                "name" => "chaise"
            ],
            [
                "name" => "fauteuil"
            ],
            [
                "name" => "canapé"
            ],
            [
                "name" => "chaussure"
            ],
            [
                "name" => "tee-shirt"
            ],
            [
                "name" => "accésoire"
            ],
            [
                "name" => "pentalon"
            ],
        ]);
    }
}
