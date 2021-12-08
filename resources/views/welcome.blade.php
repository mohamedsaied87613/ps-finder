<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            {{-- Upper Div --}}
            <div class="flex border-b border-gray-400 bg-gray-200">
                {{-- Logo --}}
                <div class="px-5 py-3 text-gray-500 inline-flex items-center w-full">                        
                    <x-ps-icon class="inline-block"></x-ps-icon>
                    <p class="text-2xl font-bold ml-5">
                        Game Zone
                    </p>
                </div>
                {{-- Auth --}}
                @if (Route::has('login'))
                    <div class="flex justify-end w-full px-6 py-4">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="text-sm text-gray-700 underline">
                                Home
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-sm text-gray-700 underline">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 text-sm text-gray-700 underline">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>

            {{-- Logo --}}
            <div class="flex justify-center w-full text-green-300">

                <div class="hidden lg:flex mr-6">
                    <div class="rounded-full border-8 border-gray-500 border-dotted py-8 mt-24">
                        <div class="text-gray-600 flex justify-center my-2 mx-10">
                            <x-arrowup-icon></x-arrowup-icon>
                        </div>
                        <div class="flex">
                            <div class="w-1/2 text-gray-600 flex justify-end my-2 mx-10">
                                <x-arrowleft-icon></x-arrowleft-icon>
                            </div>
                            <div class="w-1/2 text-gray-600 flex justify-start my-2 mx-10">
                                <x-arrowright-icon></x-arrowright-icon>
                            </div>
                        </div>
                        <div class="text-gray-600 flex justify-center my-2 mx-10">
                            <x-arrowdown-icon></x-arrowdown-icon>
                        </div>
                    </div>
                </div>

                <div class="m-10">
                    <x-joystick-icon></x-joystick-icon>
                </div>

                <div class="hidden lg:flex ml-6">
                    <div class="rounded-full border-8 border-gray-500 border-dashed py-8 mt-24">
                        <div class="text-green-400 flex justify-center my-2 mx-10">
                            <x-triangle-icon></x-triangle-icon>
                        </div>
                        <div class="flex">
                            <div class="w-1/2 text-red-400 flex justify-end my-2 mx-10">
                                <x-circle-icon></x-circle-icon>
                            </div>
                            <div class="w-1/2 text-pink-400 flex justify-start my-2 mx-10">
                                <x-square-icon></x-square-icon>
                            </div>
                        </div>
                        <div class="text-purple-400 flex justify-center my-2 mx-10">
                            <x-xxx-icon></x-xxx-icon>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Text --}}
            <div class="flex justify-center w-full">
                <p class="mt-6 text-xl text-gray-700 font-bold">
                    PlayStation Store Finders
                </p>
            </div>
            <div class="flex justify-center w-full">
                <p class="mt-3 text-md text-gray-500 font-semibold">
                    Search, Pick Your Favourite PS Store, Reserve and Play
                </p>
            </div>

            {{-- Shapes --}}

            
        </div>
    </body>
</html>

