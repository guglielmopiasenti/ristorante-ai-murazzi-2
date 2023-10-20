<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $dishes = config('dishes');

        foreach ($dishes as $dish) {
            $food = new Dish();
            $food->category_id = $dish['category_id'];
            $food->name = $dish['name'];
            $food->price = $dish['price'];
            $food->image = $dish['image'];
            $food->ingredients = $dish['ingredients'];
            $food->description = $dish['description'];
            $food->is_visible = $dish['is_visible'];
            $food->save();
        }
    }
}
