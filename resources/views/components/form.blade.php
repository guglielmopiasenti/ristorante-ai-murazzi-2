@extends('layouts.app')

@section('content')
    <div>
        @if ($dish->exists)
            <div class="container-fluid px-0 overflow-x-hidden">
                <video autoplay muted preload="auto" class="object-fit-contain">
                    <source src="{{ asset('edit-dish.mp4') }}" type="video/mp4">
                </video>
            </div>
        @else
            <div class="container-fluid px-0 overflow-x-hidden">
                <video autoplay muted preload="auto" class="object-fit-contain">
                    <source src="{{ asset('create-dish.mp4') }}" type="video/mp4">
                </video>
            </div>
        @endif
    </div>

    <div class="content">
        <div class="container">
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
                        <label for="dishName" class="block text-sm font-medium leading-6 text-gray-400">Dish Name <sup class="text-danger">*</sup></label>
                        <input name="name" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('name') is-invalid @enderror form-control"
                            id="dishName" value="{{ old('name', $dish->name) }}" required>
                        <small id="dish-name-error" class="text-danger"></small>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Dish Image -->
                    <div class="mb-3">
                        <label for="dishImage" class="block text-sm font-medium leading-6 text-gray-400">Dish Image</label>
                        <input name="image" type="file" class="@error('image') is-invalid @enderror form-control"
                            id="dishImage">
                        <input type="hidden" name="current_image" value="{{ $dish->image }}">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        @if (!$dish->image)
                            <img src="{{ asset('storage/placeholder.jpg') }}" class="object-cover h-85 w-85" id="preview">
                        @elseif($dish->image)
                            <img src="{{ asset('storage/' . $dish->image) }}" class="object-cover h-85 w-85" id="preview">
                        @endif
                    </div>

                    <!-- Dish Price -->
                    <div class="mb-3">
                        <label for="dishPrice" class="block text-sm font-medium leading-6 text-gray-400">Dish Price <sup class="text-danger">*</sup></label>
                        <input name="price" type="number" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('price') is-invalid @enderror form-control"
                            id="dishPrice" value="{{ old('price', $dish->price) }}" required>
                        <small id="dish-price-error" class="text-danger"></small>
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Dish Ingredients -->
                    <div class="mb-3">
                        <label for="dishIngredients" class="block text-sm font-medium leading-6 text-gray-400">Dish Ingredients <sup class="text-danger">*</sup></label>
                        <textarea name="ingredients" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('ingredients') is-invalid @enderror form-control" id="dishIngredients"
                            required>{{ old('ingredients', $dish->ingredients) }}</textarea>
                        <small id="dish-ingredients-error" class="text-danger"></small>
                        @error('ingredients')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Dish Description -->
                    <div class="mb-3">
                        <label for="dishDescription" class="block text-sm font-medium leading-6 text-gray-400">Dish Description</label>
                        <textarea name="description" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('description') is-invalid @enderror form-control"
                            id="dishDescription">{{ old('description', $dish->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Dish visibility -->
                    <div class="mb-3">
                        <label for="is_visible" class="block text-sm font-medium leading-6 text-gray-400">Visible?</label>
                        <input value="1" type="checkbox" name="is_visible" id="is_visible"
                            {{ old('is_visible', $dish->is_visible) ? 'checked' : '' }}>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    @vite('resources/js/image-preview.js');
    <script>
        document.getElementById('dishImage').addEventListener('change', function(e) {
            var preview = document.getElementById('preview');
            var fileInput = e.target;

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
    </script>
@endsection

