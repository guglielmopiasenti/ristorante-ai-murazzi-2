@extends('layouts.app')

@section('content')
    <div>
        @if ($dish->exists)
            <div class="bg-gray-900 lg:py-20 sm:py-20">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl lg:text-center">
                        <h2 class="text-base font-semibold leading-7 text-indigo-600">Modifica velocemente un piatto</h2>
                        <p class="my-6 lg:text-6xl font-bold tracking-tight text-white sm:text-4xl">Modifica un Piatto</p>
                        <p class="mt-6 text-lg leading-8 text-gray-600">Completa il form e modifica un piatto esistente.</p>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-gray-900 lg:py-20 sm:py-20">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl lg:text-center">
                        <h2 class="text-base font-semibold leading-7 text-indigo-600">Aggiungi velocemente un piatto</h2>
                        <p class="my-6 lg:text-6xl font-bold tracking-tight text-white sm:text-4xl">Crea un Piatto</p>
                        <p class="mt-6 text-lg leading-8 text-gray-600">Completa il form e aggiungi un piatto al menu.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="content">
        <div class="container mx-auto">
            <div class="p-5">
                <form class="my-5" method="POST" enctype="multipart/form-data" novalidate
                    @if ($dish->exists) action="{{ route('admin.dishes.update', $dish->id) }}"
                    @else action="{{ route('admin.dishes.store') }}" @endif
                    id="submit-form">
                    @csrf
                    @if ($dish->exists)
                        @method('PUT')
                    @endif

                    <!-- Dish Name -->
                    <div class="mb-3">
                        <label for="dishName" class="block text-sm font-medium leading-6 text-gray-400">Nome Piatto <sup
                                class="text-danger">*</sup></label>
                        <input name="name" type="text"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @if (!$errors->has('name')) border-green-300 @endif"
                            id="dishName" value="{{ old('name', $dish->name) }}" required>
                        <small id="dish-name-error" class="text-red-500"></small>
                        @error('name')
                            <div class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Dish Image -->
                    <div x-data="{ imagePreview: '{{ $dish->image ? asset('storage/' . $dish->image) : asset('storage/placeholder.jpg') }}' }" class="col-span-full">
                        <label for="dishImage" class="block text-sm font-medium leading-6 text-gray-400">Immagine
                            Piatto</label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-400 px-6 py-10">
                            <div class="text-center">
                                <img x-bind:src="imagePreview" class="mx-auto h-32 w-32 object-cover">
                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                    <label for="file-upload"
                                        class="relative cursor-pointer rounded-md bg-white px-2 font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Carica</span>
                                        <input x-on:change="imagePreview = URL.createObjectURL($event.target.files[0])"
                                            name="image" type="file" class="sr-only" id="file-upload">
                                    </label>
                                    <p class="pl-1">o droppa img</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF</p>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="current_image" value="{{ $dish->image }}">
                    @error('image')
                        <div class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Dish Price -->
                    <div class="my-3">
                        <label for="dishPrice" class="block text-sm font-medium leading-6 text-gray-400">Dish Price <sup
                                class="text-danger">*</sup></label>
                        <input name="price" type="number"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @if (!$errors->has('price')) border-green-300 @endif"
                            id="dishPrice" value="{{ old('price', $dish->price) }}" required>
                        <small id="dish-price-error" class="text-danger"></small>
                        @error('price')
                            <div class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Dish Ingredients -->
                    <div class="mb-3">
                        <label for="dishIngredients" class="block text-sm font-medium leading-6 text-gray-400">Dish
                            Ingredients <sup class="text-danger">*</sup></label>
                        <textarea name="ingredients"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @if (!$errors->has('ingredients')) border-green-300 @endif"
                            id="dishIngredients" required>{{ old('ingredients', $dish->ingredients) }}</textarea>
                        <small id="dish-ingredients-error" class="text-danger"></small>
                        @error('ingredients')
                            <div class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Dish Description -->
                    <div class="mb-3">
                        <label for "dishDescription" class="block text-sm font-medium leading-6 text-gray-400">Dish
                            Description</label>
                        <textarea name="description"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @if (!$errors->has('description')) border-green-300 @endif"
                            id="dishDescription">{{ old('description', $dish->description) }}</textarea>
                        @error('description')
                            <div class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Dish visibility -->
                    <div class="mb-3">
                        <label for="is_visible" class="block text-sm font-medium leading-6 text-gray-400">Visible?</label>
                        <input value="1" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" name="is_visible"
                            id="is_visible" {{ old('is_visible', $dish->is_visible) ? 'checked' : '' }}>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                        <button type="submit"
                            class="rounded-full bg-indigo-600 px-3 py-2 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
