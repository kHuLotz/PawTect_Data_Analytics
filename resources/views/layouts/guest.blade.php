<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PawTect') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        
    </head>
    

    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900 bg-cover bg-center h-screen relative" style="background-image: url('https://www.wagr.ai/cdn/shop/articles/keeping-dogs-humans-safe-a-guide-to-preventing-dog-bites-305945.jpg?v=1708730202');">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg flex flex-col items-center">
                <!-- Logo Section -->
                <div class="flex flex-col items-center">
                    <a href="/">
                        <img src="/images/logo.png" 
                             class="h-auto w-36 max-w-full img-thumbnail mt-5" 
                             style="max-height: 60px;" 
                             alt="PawTect Logo">
                        <span class="text-orange-500 hover:text-orange-700 text-4xl ml-2"><b></b></span>
                    </a>
                </div>

                <!-- Navigation Section -->
                @if (Route::has('login') && Route::has('register'))
                    <div class="mt-4 flex justify-center">
                        @auth
                            <!-- Dashboard Link -->
                            <a href="{{ url('/dashboard') }}" class="rounded-md text-white bg-orange-700 hover:bg-orange-600 transition">
                                Dashboard
                            </a>
                        @else
                            <!-- Conditional Buttons -->
                            @if (request()->routeIs('login'))
                                <!-- Show Register if on Login Page -->
                                <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-white bg-orange-600 hover:bg-orange-500 transition">
                                    Register
                                </a>
                            @elseif (request()->routeIs('register'))
                                <!-- Show Log in if on Register Page -->
                                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-white bg-orange-600 hover:bg-orange-500 transition">
                                    Log in
                                </a>
                            @else
                                <!-- Show Both if Neither Login Nor Register -->
                                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-white bg-orange-600 hover:bg-orange-500 transition">
                                    Log in
                                </a>
                                <a href="{{ route('register') }}" class="ml-4 rounded-md px-3 py-2 text-white bg-green-500 hover:bg-green-600 transition">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif

                <!-- Slot Section -->
                <div class="mt-4">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
