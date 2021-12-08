<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="flex mt-7 justify-center">
        <span class="text-gray-500">
            Select Your Current Zone or Search for PlayStation Stores
        </span>
    </div>

    <div class="flex justify-center items-center pt-1">
        <x-validation-errors :errors="$errors" />
    </div>
    <form method="GET" action="{{ route('dashboard.show') }}">
        @csrf
        @method('GET')
        <div class="flex mt-7 justify-center">
            <div class="mr-12">
                
                <select class="bg-white w-auto rounded-full
                    text-gray-500 hover:text-blue-400" autofocus
                    name="zone_name">
                    <option value="" disabled selected hidden>Pick Zone</option>
                    @foreach ($zones as $zone)
                        <option value="{{ $zone->name }}"> {{ $zone->name }}</option>
                    @endforeach                                
                </select>
            </div>

            <div class="flex">
                <x-input type="text" placeholder="Search..."
                    class="rounded-l-full border-none"
                    name="ps_name"/>
                <button class="bg-white w-auto rounded-r-full
                    flex justify-end items-center text-blue-500
                    p-2 hover:text-blue-400">
                    <x-search-icon></x-search-icon>
                </button>
            </div>
        </div>
    </form>

    <hr class="my-5 shadow">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <?php $ps_stores = Session::get('ps_stores'); ?>

        @if (isset($ps_stores))
            @forelse ($ps_stores as $ps)
                <a href="/dashboard/show/{{ $ps->id }}">
                    <div class="m-6 bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                        {{-- Title --}}
                        <div class="px-5 py-3 text-white inline-flex items-center bg-gray-800 w-full">
                            <x-ps-icon class="inline-block"></x-ps-icon>
                            <p class="text-lg font-bold ml-5">
                                {{ $ps->name }}
                            </p>
                        </div>
                        {{-- Main Info --}}
                        <div class="px-5 py-3 bg-white border-b border-gray-200">
                            {{-- Address --}}
                            <div class="flex p-2">
                                <p class="mr-5 w-1/3 flex-shrink-0 font-bold">Address</p>
                                <p class="text-md text-gray-500 font-bold">
                                    {{ $ps->full_address }}
                                </p>
                            </div>
                            {{-- offer --}}
                            <div class="flex p-2">
                                <p class="mr-5 w-1/3 flex-shrink-0 font-bold">
                                    Offer
                                </p>
                                <p class="text-md text-gray-500 font-bold">
                                    {{ $ps->offer }}
                                </p>
                            </div>
                            {{-- price --}}
                            <div class="flex p-2">
                                <p class="mr-5 w-1/3 flex-shrink-0 font-bold">
                                    Price/Hour
                                </p>
                                <p class="text-md text-green-500 font-bold">
                                    {{ $ps->hour_price }} LE
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="flex justify-center m-10">
                    <p class="text-gray-500 text-xl font-bold">
                        No Results Found!!
                    </p>
                </div>
            @endforelse    
        @endif
        
        @if (isset($ps_stores) && $ps_stores->isNotEmpty())
            <hr class="shadow my-6">
            <div class="row px-20 pb-10">
                {{-- ['zone_name' => $ps_stores[0]->zone->name] --}}
                {{ $ps_stores->appends(['zone_name' => $ps_stores[0]->zone->name])->links() }}
            </div>
        @endif
        
    </div>
</x-app-layout>
