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
}
