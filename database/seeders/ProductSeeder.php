<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                "name" => "Chaussure blanche",
                "src" => "f-p-1.jpg",
                "categoris_id" => 2,
                "couleur_id" => 4,
                "prix" => 35,
                "quantite" => 4
            ],
            [
                "name" => "Sac Rose",
                "src" => "f-p-2.jpg",
                "categoris_id" => 3,
                "couleur_id" => 2,
                "prix" => 50,
                "quantite" => 3 
            ],
            [
                "name" => "Montre Digital",
                "src" => "f-p-3.jpg",
                "categoris_id" => 3,
                "couleur_id" => 7,
                "prix" => 75,
                "quantite" => 8 
            ],
            [
                "name" => "Jeans Blue",
                "src" => "i2.jpg",
                "categoris_id" => 4,
                "couleur_id" => 3,
                "prix" => 35,
                "quantite" => 5 
            ],
            [
                "name" => "Montre",
                "src" => "i5.jpg",
                "categoris_id" => 3,
                "couleur_id" => 7,
                "prix" => 50,
                "quantite" =>2 
            ],
            [
                "name" => "Chaussure blanche",
                "src" => "i6.jpg",
                "categoris_id" => 2,
                "couleur_id" => 4,
                "prix" => 35,
                "quantite" => 9 
            ],
            [
                "name" => "Sac Rouge",
                "src" => "i7.jpg",
                "categoris_id" => 3,
                "couleur_id" => 8,
                "prix" => 65,
                "quantite" => 12 
            ],
            [
                "name" => "Chaussure de sport",
                "src" => "i8.jpg",
                "categoris_id" => 2,
                "couleur_id" => 5,
                "prix" => 85,
                "quantite" => 3
            ],
            [
                "name" => "Chaise Vert",
                "src" => "product_1.png",
                "categoris_id" => 1,
                "couleur_id" => 1,
                "prix" => 150,
                "quantite" => 6
            ],
            [
                "name" => "Chaise Rouge",
                "src" => "product_2.png",
                "categoris_id" => 1,
                "couleur_id" => 8,
                "prix" => 140,
                "quantite" => 5
            ],
            [
                "name" => "Chaise Orange",
                "src" => "product_3.png",
                "categoris_id" => 1,
                "couleur_id" => 6,
                "prix" => 160,
                "quantite" => 15
            ],
            [
                "name" => "Chaise Multicolor",
                "src" => "product_4.png",
                "categoris_id" => 1,
                "couleur_id" => 5,
                "prix" => 200,
                "quantite" => 7
            ],
            [
                "name" => "Chaise Blanche",
                "src" => "product_5.png",
                "categoris_id" => 1,
                "couleur_id" => 4,
                "prix" => 125,
                "quantite" => 1
            ],
            [
                "name" => "Chaise Blanche",
                "src" => "product_7.png",
                "categoris_id" => 1,
                "couleur_id" => 4,
                "prix" => 120,
                "quantite" => 4
            ],
            [
                "name" => "Chaise Rouge",
                "src" => "product_8.png",
                "categoris_id" => 1,
                "couleur_id" => 8,
                "prix" => 145,
                "quantite" => 6
            ],
            [
                "name" => "Jeans Blue femme",
                "src" => "s-product-1.jpg",
                "categoris_id" => 4,
                "couleur_id" => 3,
                "prix" => 65,
                "quantite" => 5
            ]
        ]);
    }
}
