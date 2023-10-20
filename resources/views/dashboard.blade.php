@extends('layouts.app')
@section('title', 'Menu')
@section('content')

    <div class="relative isolate overflow-hidden bg-gray-900 py-24">
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
                <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Dashboard</h2>
                <p class="mt-6 text-lg leading-8 text-gray-300">Da qui puoi accedere alle sezioni e modificare piatti e foto
                    del ristorante.</p>
            </div>
            <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
                <div
                    class="grid grid-cols-1 gap-x-8 gap-y-6 text-base font-semibold leading-7 text-white sm:grid-cols-2 md:flex lg:gap-x-10">
                    <a href="{{ route('admin.dishes.index') }}">
                        Sezione Menu <span aria-hidden="true">&rarr;</span></a>
                    <a href="{{ route('admin.pictures.index') }}">Sezione Foto <span aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-grey-950 py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 grid grid-cols-2 gap-x-40">
            <div class="mx-auto max-w-2xl lg:text-center">
                <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Tutto quello che ti serve per
                    gestire il ristorante</p>
                <p class="mt-6 text-lg leading-8 text-gray-400">Da questa Dashboard puoi accedere ad ogni area del
                    ristorante.</p>
            </div>
            <div class="mx-auto max-w-2xl lg:max-w-4xl">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:gap-y-12">
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-200">
                            <div
                                class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                                </svg>
                            </div>
                            Upload semplificato
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-400">Carica velocemente un nuovo piatto semplicemente
                            completando il form.</dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-200">
                            <div
                                class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                <i class="fa-solid fa-gear fa-lg w-5 text-white text-center"></i>
                            </div>
                            Gestione piatti e foto
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-400">Aggiungi, modifica o elimina velocemente piatti e
                            foto del ristorante.</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>


@endsection
