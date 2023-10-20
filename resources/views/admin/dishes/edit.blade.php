@extends('layouts.app')
@section('title', 'Modifica Piatto')
@section('content')
    <div class="bg-light rounded-3 p-5 mb-4">
        <div class="container py-5">
            <div class="logo_laravel">
                <!-- Your logo content here -->
            </div>
            <h1 class="text-5xl font-bold">
                Edit Dish
            </h1>
        </div>
    </div>

    <div class="content">
        <div class="container">
            @include('components.form', ['dish' => $dish])

            <!-- Submit Button -->
            <div class="flex justify-center lg:justify-start items-center space-x-4">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Update
                </button>
                <a class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded"
                    href="{{ route('admin.dishes.index') }}">Go back
                </a>
            </div>
        </div>
    </div>
@endsection
