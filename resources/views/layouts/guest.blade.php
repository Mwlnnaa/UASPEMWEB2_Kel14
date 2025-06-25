<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'RateIT') }}</title>


        <!-- guest.blade.php -->


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

<main>
    <div class="text-center mt-6">
        <a href="{{ url('/dashboard') }}" class="text-sm px-4 py-2 text-white bg-gray-700 hover:bg-gray-800 rounded">
            ← Kembali ke Dashboard
        </a>
    </div>

    {{ $slot }}
</main>

    <body class="font-sans text-gray-900 antialiased">
        <!-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"> -->

           <div class="mb-4 text-center">
    <a href="/" class="text-2xl font-bold text-white">Rate<span class="text-orange-400">IT</span></a>
</div>


            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
