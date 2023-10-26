<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PictureController extends Controller
{
  public function index()
  {
    $pictures = Picture::all();
    foreach ($pictures as $picture) {
      $picture->filename = url('storage/' . $picture->filename);
    }
    return response()->json(compact('pictures'));
  }

  public function show(string $id)
  {
    $picture = Picture::find($id);

    if (!$picture) return response(null, 404);

    return response()->json($picture);
  }
}
