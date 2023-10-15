@extends('layouts.app')

@section('content')
    <div class="bg-light rounded-3 p-5 mb-4">
        <div class="container py-5">
            <div class="logo_laravel">
                <!-- You can place your logo here -->
            </div>
            <h1 class="text-5xl font-bold">
                Dishes Page
            </h1>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h3 class="text-3xl font-semibold">Add a Dish</h3>

            @include('components.form', ['dish' => new \App\Models\Dish()])

            <!-- Submit Button -->
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Submit
            </button>
        </div>
    </div>
@endsection
