<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoodItem;

class FoodItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FoodItem::create([
            'name' => 'Pizza',
            'description' => 'Delicious cheesy pizza',
            'price' => 1200,
            'image_url' => 'images/pizza.jpg',
        ]);

        // Add more entries if needed
        FoodItem::create([
            'name' => 'Burger',
            'description' => 'Juicy beef burger',
            'price' => 800,
            'image_url' => 'images/burger.jpg',
        ]);
    }
}
