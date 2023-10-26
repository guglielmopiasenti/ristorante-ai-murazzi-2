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
    $dishes = Dish::whereNull('deleted_at')->get();

    return response()->json(compact('dishes'));
  }

  public function show(string $id)
  {
    $dish = Dish::find($id);

    if (!$dish) return response(null, 404);

    return response()->json($dish);
  }
}
