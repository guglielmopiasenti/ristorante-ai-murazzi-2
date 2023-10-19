@extends('layouts.app')
@section('title', 'Menu')
@section('content')

    <div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32">
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
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Sezione menu</h2>
                <p class="mt-6 text-lg leading-8 text-gray-300">Qui puoi Aggiungere, modificare, eliminare i tuoi piatti</p>
            </div>

        </div>
    </div>
    <div class="container mx-auto text-white">
        <h2 class="py-5 text-4xl">Elenco piatti</h2>
        <div class="py-5 flex flex-wrap gap-3">
            <a class=" flex mx-1 items-center justify-center rounded-full border border-transparent bg-indigo-600 px-3 py-2 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                href="{{ route('admin.dishes.create') }}">Crea un nuovo piatto</a>
            <a class="flex mx-1 items-center justify-center rounded-full border border-transparent bg-red-600 px-3 py-2 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                href="{{ route('admin.dishes.trash') }}">Vai al cestino <span
                    class="text-sm">({{ $trash_count }})</span></a>
        </div>

        <div class="overflow-x-auto">
            <table
                class="w-full mx-auto p-5 table-auto border border-gray-600 rounded-lg border-separate border-spacing-3 my-5 text-left">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Ha immagine?</th>
                        <th scope="col">È visibile?</th>
                        <th scope="col" class="text-center">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dishes as $dish)
                        <tr>
                            <td>{{ $dish->id }}</td>
                            <td>{{ $dish->name }}</td>
                            <td>{{ $dish->price }}€</td>
                            <td>
                                @if ($dish->image != null && $dish->image != 'placeholder.jpg')
                                    Sì
                                @else
                                    No
                                @endif
                            </td>
                            <td>
                                @if ($dish->is_visible)
                                    <i class="fas fa-eye"></i>
                                @else
                                    <i class="fas fa-eye-slash"></i>
                                @endif
                            </td>
                            <td>
                                <div class="grid grid-cols-3 items-center">
                                    <div class="justify-self-end">
                                        <a class="rounded-full border border-transparent bg-blue-600 px-3 py-2 text-sm text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                            href="{{ route('admin.dishes.show', $dish->id) }}"><i
                                                class="fas fa-eye me-2"></i><span
                                                class="hidden lg:inline">Dettagli</span></a>
                                    </div>
                                    <div class="justify-self-center">
                                        <a class="rounded-full border border-transparent bg-indigo-600 px-2 py-2 text-sm text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                            href="{{ route('admin.dishes.edit', $dish->id) }}"><i
                                                class="fas fa-pen me-2"></i><span
                                                class="hidden lg:inline">Modifica</span></a>
                                    </div>

                                    <div x-data="{ open: false, dishId: null, route: 'dishes' }" class="justify-self-start">
                                        <button @click="open = true, dishId = {{ $dish->id }}" x-transition type="button"
                                            class="rounded-full border border-transparent bg-red-600 px-2 py-2 text-sm text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                            <i class="fa-solid fa-trash me-2"></i><span
                                                class="hidden lg:inline">Elimina</span>
                                        </button>
                                        @include('includes.delete-modal')
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <td colspan="8">
                            <h3 class="font-bold text-red-500 text-center">Nessun piatto</h3>
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
