<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\DishController;
use App\Http\Controllers\Api\PictureController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// routes for dishes

Route::apiResource('/dishes', DishController::class);

// routes for pictures

Route::apiResource('/pictures', PictureController::class);


// routes fo email

Route::post('/contact-message', [ContactController::class, 'message']);
