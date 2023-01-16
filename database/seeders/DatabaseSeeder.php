<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BlogCateg;
use App\Models\Discount;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesSeeder::class,
            UserSeeder::class,
            CategorisSeeder::class,
            DiscountSeeder::class,
            CouleurSeeder::class,
            ProductSeeder::class,
            CategriblogSeeder::class,
            BlogSeeder::class,
            AdressesSeeder::class
        ]);
    }
}
