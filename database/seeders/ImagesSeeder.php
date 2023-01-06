<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                "name" => "Chaussure blanche",
                "src" => "f-p-1.jpg",
                "categoris_id" => 5,
                "couleur_id" => 5,
                "prix" => 35
            ],
            [
                "name" => "Sac Rose",
                "src" => "f-p-2.jpg",
                "categoris_id" => 7,
                "couleur_id" => 3,
                "prix" => 50
            ],
            [
                "name" => "Montre Digital",
                "src" => "f-p-3.jpg",
                "categoris_id" => 7,
                "couleur_id" => 8,
                "prix" => 75
            ],
            [
                "name" => "Jeans Blue",
                "src" => "i2.jpg",
                "categoris_id" => 8,
                "couleur_id" => 4,
                "prix" => 35
            ],
            [
                "name" => "Montre",
                "src" => "i5.jpg",
                "categoris_id" => 7,
                "couleur_id" => 8,
                "prix" => 50
            ],
            [
                "name" => "Chaussure blanche",
                "src" => "i6.jpg",
                "categoris_id" => 5,
                "couleur_id" => 6,
                "prix" => 35
            ],
            [
                "name" => "Sac Rouge",
                "src" => "i7.jpg",
                "categoris_id" => 7,
                "couleur_id" => 9,
                "prix" => 65
            ],
            [
                "name" => "Chaussure de sport",
                "src" => "i8.jpg",
                "categoris_id" => 5,
                "couleur_id" => 6,
                "prix" => 85
            ],
            [
                "name" => "Chaise Vert",
                "src" => "product_1.png",
                "categoris_id" => 2,
                "couleur_id" => 2,
                "prix" => 150
            ],
            [
                "name" => "Chaise Rouge",
                "src" => "product_2.png",
                "categoris_id" => 2,
                "couleur_id" => 9,
                "prix" => 140
            ],
            [
                "name" => "Chaise Orange",
                "src" => "product_3.png",
                "categoris_id" => 2,
                "couleur_id" => 7,
                "prix" => 160
            ],
            [
                "name" => "Chaise Multicolor",
                "src" => "product_4.png",
                "categoris_id" => 2,
                "couleur_id" => 6,
                "prix" => 200
            ],
            [
                "name" => "Chaise Blanche",
                "src" => "product_5.png",
                "categoris_id" => 2,
                "couleur_id" => 5,
                "prix" => 125
            ],
            [
                "name" => "Chaise Verte",
                "src" => "product_6.png",
                "categoris_id" => 2,
                "couleur_id" => 2,
                "prix" => 140
            ],
            [
                "name" => "Chaise Blanche",
                "src" => "product_7.png",
                "categoris_id" => 2,
                "couleur_id" => 5,
                "prix" => 120
            ],
            [
                "name" => "Chaise Rouge",
                "src" => "product_8.png",
                "categoris_id" => 2,
                "couleur_id" => 9,
                "prix" => 145
            ],
            [
                "name" => "Jeans Femme Bleu",
                "src" => "s-product-1.jpg",
                "categoris_id" => 8,
                "couleur_id" => 4,
                "prix" => 45
            ],

        ]);
    }
}
