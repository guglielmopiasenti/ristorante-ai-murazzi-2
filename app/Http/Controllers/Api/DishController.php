<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DishController extends Controller
{
  public function index()
  {
    $dishes = Dish::whereNull('deleted_at')
      ->where('is_visible', true)
      ->with('category')
      ->get();

    foreach ($dishes as $dish) {
      $dish->image = url('storage/' . $dish->image);
    }
    return response()->json(compact('dishes'));
  }

  public function show(string $id)
  {
    $dish = Dish::find($id);

    if (!$dish) return response(null, 404);

    return response()->json($dish);
  }
}
