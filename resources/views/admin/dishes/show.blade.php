@extends('layouts.app')
@section('title', 'Plate')
@section('content')

    <div class=" antialiased bg-gray-900 min-h-screen flex items-center justify-center">
        <div class="max-w-5xl bg-gray-800 p-6 rounded-lg shadow-lg text-white">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 my-5">
                <div>
                    <img class="w-full h-auto rounded mb-3" src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
                </div>
                <div>
                    <h3 class="text-2xl font-semibold mb-2">{{ $dish->name }}</h3>
                    <h5 class="text-xl mb-2">{{ $dish->price }}€</h5>
                    <p class="text-gray-400">{{ $dish->description }}</p>
                    <p><strong>Ingredients: </strong>{{ $dish->ingredients }}</p>
                </div>
            </div>
            <div class="flex justify-center mb-5 mt-9">
                <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="bg-indigo-600 text-white py-2 px-4 rounded-full mr-4">
                    <i class="fa-solid fa-pen"></i> Edit
                </a>
                <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-full">
                        <i class="fas fa-trash mr-2"></i>Delete dish
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
