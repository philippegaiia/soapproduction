<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Soapmaker') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>


    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow mb-2">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            @if (session()->has('message'))
                <div class="max-w-7xl mx-auto px-4 pb-1 mb-2 sm:px-6 lg:px-8 whitespace-no-wrap ">
                    <x-success-message>
                        <span class="text-green-500 font-semibold">Succès!</span>
                        <p class="text-gray-600 text-sm">{{ session()->get('message') }}</p>
                    </x-success-message>
                </div>
            @endif


            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>

    </body>
</html>
