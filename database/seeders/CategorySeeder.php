<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = config('categories.categories');

        foreach ($categories as $categoryData) {
            $category = new Category();
            $category->name = $categoryData['name'];
            $category->save();
        }
    }
}
