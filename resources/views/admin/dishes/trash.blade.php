@extends ('layouts.app')

@section('title', 'Cestino')

@section('content')

    <div x-data="{ openRestoreModal: false, openDeleteModal: false, dishId: null }" class="container mx-auto py-24">
        <h1 class="text-center mt-5 mb-5 text-7xl text-white font-bold">Cestino</h1>

        @forelse ($dishes as $dish)
            <div class="mx-auto max-w-7xl py-10 sm:px-6 lg:px-8">
                <div
                    class="relative isolate overflow-hidden bg-gray-950 px-6 pt-16 shadow-2xl sm:rounded-3xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0 grid grid-cols-2">
                    <svg viewBox="0 0 1024 1024"
                        class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0"
                        aria-hidden="true">
                        <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)"
                            fill-opacity="0.7" />
                        <defs>
                            <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
                                <stop stop-color="#7775D6" />
                                <stop offset="1" stop-color="#E935C1" />
                            </radialGradient>
                        </defs>
                    </svg>
                    <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-24 lg:text-left">
                        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">{{ $dish->name }}</h2>
                        <p class="mt-6 text-lg leading-8 text-gray-300">{{ $dish->ingredients }}</p>
                        <p class="mt-6 text-lg leading-8 text-gray-300">{{ $dish->category->name }}</p>
                        <p class="mt-6 text-lg leading-8 text-gray-300">{{ $dish->description }}</p>
                        <div class="grid grid-cols-4">
                            <div class="mt-10">
                                <button @click="openRestoreModal = true, dishId = {{ $dish->id }}" x-transition
                                    class="rounded-full bg-indigo-600 px-3.5 py-2.5 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                                    Ripristina
                                </button>
                                <template x-if="openRestoreModal">
                                    @include('includes.restore-modal')
                                </template>
                            </div>

                            <div class="mt-10">
                                <button @click="openDeleteModal = true, dishId = {{ $dish->id }}" x-transition
                                    class="rounded-full bg-red-600 px-3.5 py-2.5 font-semibold text-white shadow-sm hover:bg-red-500">
                                    Elimina
                                </button>
                                <template x-if="openDeleteModal">
                                    @include('includes.drop-modal')
                                </template>
                            </div>
                        </div>
                    </div>
                    <div class="justify-self-end">
                        <img class="absolute right-0 top-0 object-cover w-[33rem] h-[31rem] rounded-r-3xl bg-white/5 ring-1 ring-white/10"
                            src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center mt-10">
                <i class="fa-solid fa-trash fa-2xl text-white mb-12"></i>
                <h4 class="text-3xl text-white mb-5">Il Cestino è vuoto</h4>
                <p class="text-lg text-gray-300 mb-10">
                    Non hai elementi nel cestino. Qui è tutto pulito!</p>
            </div>
        @endforelse

        <footer class="text-center mt-10 mb-5">
            <a href="{{ route('admin.dishes.index') }}"
                class="mx-2 items-center justify-center rounded-full border border-transparent bg-indigo-600 px-4 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 ">Go
                back to the dishes list</a>
        </footer>
    </div>

@endsection
