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
                "name" => "chaise"
            ],
            [
                "name" => "chaussure"
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
