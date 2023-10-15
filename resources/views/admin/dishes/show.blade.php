@extends('layouts.app')
@section('title', 'Plate')
@section('content')

    <div class="relative isolate overflow-hidden bg-gray-900 py-20">
        <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl"
            aria-hidden="true">
            <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu"
            aria-hidden="true">
            <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-9">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl pb-10">{{ $dish->name }}</h2>
                <h5 class="text-xl my-6 text-white">Prezzo: {{ $dish->price }}€</h5>
                <p class="mt-6 text-lg leading-8 text-gray-300"><strong>Ingredienti: </strong>{{ $dish->ingredients }}</p>
                <p class="mt-6 text-lg leading-8 text-gray-300">{{ $dish->description }}</p>
                <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
                    <div
                        class="grid grid-cols-1 gap-x-8 gap-y-6 text-base font-semibold leading-7 text-white sm:grid-cols-2 md:flex lg:gap-x-10">
                        <a href="{{ route('admin.dishes.edit', $dish->id) }}"
                            class="bg-blue-600 text-white py-2 px-4 rounded-full mr-4">
                            <i class="fa-solid fa-pen"></i> Modifica
                        </a>
                        <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-full">
                                <i class="fas fa-trash mr-2"></i>Elimina
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div>
              <img class="aspect-square object-cover rounded mb-3" src="{{ asset('storage/' . $dish->image) }}"
                  alt="{{ $dish->name }}">
          </div>
        </div>
    </div>
@endsection
