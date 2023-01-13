<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adresses')->insert([
            [
                "entreprise" => "molengeek",
                "ville" => "bruxelles",
                "adresse" => "place de la minoterie 10",
                "postale" => "1080",
                "phone" => "+32498442712",
                "email" => "projetlaravelcs25@gmail.com"
            ]
        ]);
    }
}
