<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bussiness Info') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse ($ps_stores as $ps)
                <div class="mb-3 bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                    {{-- TITLE --}}
                    <div class="px-5 py-3 text-white inline-flex items-center bg-gray-800 w-full">                        
                        <x-ps-icon class="inline-block"></x-ps-icon>
                        <p class="text-lg font-bold ml-5">
                            {{ $ps->name }}
                        </p>
                    </div>
                    {{-- MAIN_INFO --}}
                    <div class="px-5 py-3 bg-white border-b border-gray-200">
                        <div class="flex p-2">
                            <p class="mr-5 w-1/3 flex-shrink-0 font-bold">Address</p>
                            <p class="text-md text-gray-500 font-bold">
                                {{ $ps->full_address }}
                            </p>
                        </div>

                        <div class="flex p-2">
                            <p class="mr-5 w-1/3 flex-shrink-0 font-bold">Price/Hour</p>
                            <p class="text-md text-gray-500 font-bold">
                                {{ $ps->hour_price }} LE
                            </p>
                        </div>

                        <div class="flex p-2">
                            <p class="mr-5 w-1/3 flex-shrink-0 font-bold">Open</p>
                            <p class="text-md text-gray-500 font-bold">
                                {{ $ps->open_at }}
                            </p>
                        </div>

                        <div class="flex p-2">
                            <p class="mr-5 w-1/3 flex-shrink-0 font-bold">Closed</p>
                            <p class="text-md text-gray-500 font-bold">
                                {{ $ps->closed_at }}
                            </p>
                        </div>
                    </div>
                    {{-- Buttons --}}
                    <div class="p-3 flex justify-end">
                        {{-- update --}}
                        <a class="mr-3 border-b-2 border-dotted font-semibold
                            italic text-green-600 hover:text-green-400"
                            href="/bussprofile/{{ $ps->id }}">
                            edit
                        </a>
                        {{-- delete --}}
                        <form method="POST" action="/bussprofile/{{ $ps->id }}/delete">
                            @csrf
                            @method('delete')
                            <button class="mr-3 border-b-2 border-dotted font-semibold
                                italic text-red-600 hover:text-red-400"
                                type="submit">
                                delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty                
                <div class="flex justify-center m-10">
                    <p class="text-gray-500 text-xl font-bold">
                        No Bussiness Had been Created!!
                    </p>
                </div>
            @endforelse
        </div>

        <hr class="shadow my-6">
        <div class="row px-20 pb-10">
            {{ $ps_stores->links() }}
        </div>
    </div>
</x-app-layout>
