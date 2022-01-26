<?php

use App\Product;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {
            $product = new Product();
            $product->name = $faker->sentence;
            $product->image = $faker->imageUrl(500, 400, 'Product');
            $product->description = $faker->paragraph();
            $product->price = $faker->randomFloat(2, 1, 4000);
            $product->quantity = $faker->numberBetween(1, 100);
            $product->save();
        }
    }
}