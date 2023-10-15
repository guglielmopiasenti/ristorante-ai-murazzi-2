<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="antialiased relative">
    <div class="min-h-screen bg-[url('/public/img/Ristorante_ai_Murazzi.png')] bg-contain selection:text-white">
        <!-- Background Overlay -->
        <div class="absolute inset-0 bg-black opacity-50 z-0"></div>

        
        <!-- Content -->
        <div class="relative z-10">
            <!-- Navigation -->
            <nav class="mx-auto flex max-w-7xl items-center justify-between p-1 lg:px-8" aria-label="Global">
                @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-gray-500">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-gray-500">Log in</a>
    
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-gray-500">Register</a>
                    @endif
                    @endauth
                </div>
                @endif
            </nav>
            <div class="flex justify-center w-full py-32 sm:py-48 lg:py-56">
                <!-- Your title and content -->
                <div class="text-center">
                    <div class="lg:text-9xl font-edmund text-white sm:text-6xl">Ristorante ai Murazzi</div>
                    <p class="mt-6 text-3xl leading-8 text-white">Effettua il login ed accedi alla tua Dashboard.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="{{ route('login') }}" class="rounded-full bg-indigo-600 px-3.5 py-2.5 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Accedi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
