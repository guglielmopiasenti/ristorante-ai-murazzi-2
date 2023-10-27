<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['name', 'image', 'price', 'category_id', 'ingredients', 'description', 'is_visible'];

    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    public function getDishesByCategory()
    {
        $dishes = Dish::whereNull('deleted_at')
            ->where('is_visible', true)
            ->with('category') // Eager load the category
            ->get();

        // Organize dishes by category name
        $dishesByCategory = [];
        foreach ($dishes as $dish) {
            $categoryName = $dish->category->name; // Assuming the category has a name field

            if (!isset($dishesByCategory[$categoryName])) {
                $dishesByCategory[$categoryName] = [];
            }

            $dishesByCategory[$categoryName][] = $dish;
        }

        return response()->json($dishesByCategory);
    }
}
