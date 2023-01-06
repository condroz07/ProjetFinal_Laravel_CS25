<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouleurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('couleurs')->insert([
            [
                "name" => "jaune"
            ],
            [
                "name" => "vert"
            ],
            [
                "name" => "rose"
            ],
            [
                "name" => "bleu"
            ],
            [
                "name" => "blanc"
            ],
            [
                "name" => "multicolor"
            ],
            [
                "name" => "orange"
            ],
            [
                "name" => "noir"
            ],
            [
                "name" => "rouge"
            ],
        ]);
    }
}
