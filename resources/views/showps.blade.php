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
            <div class="py-5 lg:px-2">
                <div class="max-w-7xl mx-auto">
                    {{-- INFO --}}
                    <div class="bg-white overflow-hidden shadow-sm rounded mb-5">
                        <div class="bg-white border-b border-gray-200">
                            <div class="p-6 text-white inline-flex items-center bg-gray-800 w-full">
                                <x-info-icon class="inline-block"></x-info-icon>
                                <p class="ml-2 font-bold lg:text-2xl md:text-xl leading-tight">
                                    Info
                                </p>
                            </div>

                            <div class="px-6">
                                <div class="flex my-3">
                                    <x-label class="w-1/3 flex-shrink-0 font-semibold lg:text-lg md:text-md text-gray-800 leading-tight">
                                        Name
                                    </x-label>
                                    <p class="font-semibold lg:text-lg md:text-md text-gray-500">
                                        {{ $ps_store->name }}
                                    </p>
                                </div>
                                <hr class="shadow-md mr-20">

                                <div class="flex my-3">
                                    <x-label class="w-1/3 flex-shrink-0 font-semibold lg:text-lg md:text-md text-gray-800 leading-tight">
                                        Address
                                    </x-label>
                                    <p class="font-semibold lg:text-lg md:text-md text-gray-500">
                                        {{ $ps_store->full_address }}
                                    </p>
                                </div>
                                <hr class="shadow-md mr-20">

                                <div class="flex my-3">
                                    <x-label class="w-1/3 flex-shrink-0 font-semibold lg:text-lg md:text-md text-gray-800 leading-tight">
                                        Price/Hour
                                    </x-label>
                                    <p class="font-semibold lg:text-lg md:text-md text-gray-500">
                                        {{ $ps_store->hour_price }} LE
                                    </p>
                                </div>
                                <hr class="shadow-md mr-20">

                                <div class="flex my-3">
                                    <x-label class="w-1/3 flex-shrink-0 font-semibold lg:text-lg md:text-md text-gray-800 leading-tight">
                                        Offer
                                    </x-label>
                                    <p class="font-semibold lg:text-lg md:text-md text-gray-500">
                                        {{ $ps_store->offer }}
                                    </p>
                                </div>
                                <hr class="shadow-md mr-20">

                                <div class="flex my-3">
                                    <x-label class="w-1/3 flex-shrink-0 font-semibold lg:text-lg md:text-md text-gray-800 leading-tight">
                                        Description
                                    </x-label>
                                    <p class="font-semibold lg:text-lg md:text-md text-gray-500">
                                        {{ $ps_store->description }}
                                    </p>
                                </div>
                                <hr class="shadow-md mr-20">

                                <div class="flex my-3">
                                    <x-label class="w-1/3 flex-shrink-0 font-semibold lg:text-lg md:text-md text-gray-800 leading-tight">
                                        Open
                                    </x-label>
                                    <p class="font-semibold lg:text-lg md:text-md text-gray-500">
                                        {{ $ps_store->open_at }}
                                    </p>
                                </div>
                                <hr class="shadow-md mr-20">

                                <div class="flex my-3">
                                    <x-label class="w-1/3 flex-shrink-0 font-semibold lg:text-lg md:text-md text-gray-800 leading-tight">
                                        Closed
                                    </x-label>
                                    <p class="font-semibold lg:text-lg md:text-md text-gray-500">
                                        {{ $ps_store->closed_at }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Reserve --}}
                    @if ($ps_store->user_id != auth()->user()->id)

                    <div class="bg-white overflow-hidden shadow-sm rounded">
                        <div class="bg-white border-b border-gray-200">
                            <div class="p-6 text-white inline-flex items-center bg-gray-800 w-full">
                                <x-reserve-icon class="inline-block"></x-reserve-icon>
                                <p class="ml-2 font-bold lg:text-2xl md:text-xl leading-tight">
                                    Reserve
                                </p>
                            </div>
                        </div>

                        <div class="flex justify-center items-center pt-1">
                            <x-validation-errors :errors="$errors" />
                        </div>

                        <form method="POST" action="/createresv/{{ $ps_store->id }}">
                            @csrf
                            @method('POST')
                            <div class="px-6 flex items-center my-3">
                                <x-label class="w-1/3 font-semibold lg:text-lg
                                    md:text-md text-gray-800 leading-tight">
                                    Pick Date
                                </x-label>
                                <x-input type="datetime-local" name="start_time"></x-input>
                            </div>

                            <div class="flex justify-end p-5">
                                <x-button>
                                    {{ __('Confirm') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </body>
</html>
