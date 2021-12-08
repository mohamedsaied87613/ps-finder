<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Bussiness') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <x-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="/bussprofile/{{ $ps_store->id }}/update">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-cols-2 gap-6 mb-6">
                            <div>
                                <x-label for="name" :value="__('Name')" />
                                <x-input class="block mt-1 w-full"
                                    type="text" name="name"
                                    value="{{ $ps_store->name }}" autofocus/>
                            </div>

                            <div>
                                <x-label for="zone_name" :value="__('Zone')" />
                                <select class="block mt-1 w-full rounded"
                                    name="zone_name" autofocus>
                                    <option value="{{ $ps_store->zone->name }}" selected hidden>
                                        {{ $ps_store->zone->name }}
                                    </option>
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone->name }}"> {{ $zone->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div>
                                <x-label for="full_address" :value="__('Full Address')" />
                                <x-input class="block mt-1 w-full"
                                    type="text" name="full_address"
                                    value="{{ $ps_store->full_address }}" autofocus/>
                            </div>
                            <div>
                                <x-label for="hour_price" :value="__('Hour Price')" />
                                <x-input class="block mt-1 w-full"
                                    type="text" name="hour_price"
                                    value="{{ $ps_store->hour_price }}" autofocus />
                            </div>
                        
                            <div>
                                <x-label for="open_at" :value="__('Open At')" />
                                <x-input class="block mt-1 w-full"
                                 type="time" name="open_at"
                                 value="{{ $ps_store->open_at }}" autofocus/>
                            </div>
                            
                            <div>
                                <x-label for="closed_at" :value="__('Closed At')" />
                                <x-input class="block mt-1 w-full"
                                 type="time" name="closed_at"
                                 value="{{ $ps_store->closed_at }}" autofocus/>
                            </div>

                        </div>

                        <div class="mb-6">
                            <x-label for="offer" :value="__('Offer')" />
                            <textarea class="block mt-1 w-full rounded"
                             type="text" name="offer" rows="3"
                             placeholder="{{ $ps_store->offer }}"
                             autofocus></textarea>
                        </div>
                        <div class="mb-6">
                            <x-label for="description" :value="__('Description')" />
                            <textarea class="block mt-1 w-full rounded"
                             type="text" name="description" rows="3"
                             placeholder="{{ $ps_store->description }}"
                             autofocus></textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
