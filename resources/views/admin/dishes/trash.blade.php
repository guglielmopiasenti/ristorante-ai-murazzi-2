@extends('layouts.app')

@section('title', 'Dish Trash')

@section('content')

    <div class="container">
        <h1 class="text-center mt-5">Dishes Trash</h1>
        <ul class="list-none">
            @forelse ($dishes as $dish)
                <li class="my-5">
                    <div class="restaurant-card p-5">
                        <div class="card-header rounded border-0 mb-4 flex justify-between items-center">
                            <h2 class="m-0 flex items-center">
                                {{ $dish->name }}
                            </h2>
                            <div class="h-1 mb-5"></div>
                        </div>
                        <div class="card-body">
                            <p class="">
                                {{ $dish->description }}
                            </p>
                        </div>
                        <div class="d-md:hidden d-lg:hidden">
                            Created: {{ $dish->created_at }} <br>
                            Last edit: {{ $dish->updated_at }} <br>
                            Deleted: {{ $dish->deleted_at }}
                        </div>
                        <div class="card-footer flex justify-between justify-items-center border-0 bg-gray-200 mt-3">
                            <div class="buttons">
                                <button class="button-main-db restore-button" data-bs-toggle="modal"
                                    data-bs-target="#restoreModal" data-route="dishes" data-id="{{ $dish->id }}">Restore
                                    dish</button>
                            </div>
                            <div class="text-end hidden md:inline lg:inline">
                                Created: {{ $dish->created_at }} <br>
                                Last edit: {{ $dish->updated_at }} <br>
                                Deleted: {{ $dish->deleted_at }}
                            </div>
                        </div>
                    </div>
                </li>
            @empty
                <h4 class="alert alert-danger mt-5 text-center">Trash is empty</h4>
            @endforelse
        </ul>
        <footer class="text-center mb-5">
            <a href="{{ route('admin.dishes.index') }}" class="btn button-secondary-db mx-2 mt-5">Go back to the dishes
                list</a>
        </footer>
    </div>
    @section('scripts')
        @vite('resources/js/restore-confirm.js')
    @endsection
@endsection
