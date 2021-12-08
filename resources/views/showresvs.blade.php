<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservations') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse ($reservations as $reservation)
                {{-- RESERVATION --}}
                <div class="mb-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    {{-- UPPER_CONTENT --}}
                    <div class="p-6 flex bg-white border-b border-gray-200">
                        {{-- icon --}}
                        <div class="mr-5">
                            <x-reserve-icon></x-reserve-icon>    
                        </div>
                        {{-- text --}}
                        <div class="hover:bg-gray-200 rounded p-1">
                            {{-- case reserver --}}
                            @if (auth()->user()->id == $reservation->user_id)
                                <p>
                                    You reserved on PlayStation store 
                                    <span class="font-bold">{{ $reservation->playStation->name }}</span>.
                                </p>
                            {{-- case owner --}}                                
                            @else
                                <p>
                                    User
                                    <span class="font-bold">{{ $reservation->user->name }}</span>
                                    reserved on your PlayStation store
                                    <span class="font-bold">{{ $reservation->playStation->name }}</span>.
                                </p>
                            @endif
                            <p class="pt-3">
                                <span class="text-gray-400 font-bold">Start time:</span>
                                {{ str_replace(" ", " | ", $reservation->start_time) }}
                            </p>
                        </div>
                    </div>
                    {{-- LOWER_CONTENT --}}
                    <div class="grid grid-cols-2">
                        {{-- status --}}
                        <div class="px-5 py-3">
                            <p>
                                <span class="hover:bg-gray-200 rounded p-2">
                                    <span class="text-gray-400 font-bold">Status:</span>
                                    @if ($reservation->start_time >= date('Y-m-d H:i'))
                                        <span class="font-bold ml-2">{{ $reservation->status }}</span>
                                    @else 
                                        <span class="font-bold ml-2">Expired</span>
                                    @endif
                                </span>
                            </p>
                        </div>
                        
                        {{-- buttons --}}
                        <div class="p-3 flex justify-end">
                            {{-- case expired --}}
                            {{-- Do not show any Options --}}
                            {{-- case not expired --}}
                            @if ($reservation->start_time >= date('Y-m-d H:i'))
                                {{-- case reserver --}}
                                @if (auth()->user()->id == $reservation->user_id)
                                    {{-- disabled and active cancel button --}}
                                    @if ($reservation->status == "Cancelled")
                                        <button class="mr-3 border-b-2 border-dotted font-semibold
                                            italic text-green-600 hover:text-green-400
                                            opacity-50 cursor-not-allowed">
                                            cancelled
                                        </button>
                                        <form method="POST" action="/showresvs/{{ $reservation->id }}/Active">
                                            @csrf
                                            @method('PUT')
                                            <button class="mr-3 border-b-2 border-dotted font-semibold
                                                italic text-green-600 hover:text-green-400"
                                                type="submit">
                                                undo
                                            </button>
                                        </form>
                                    @else 
                                        <form method="POST" action="/showresvs/{{ $reservation->id }}/Cancelled">
                                            @csrf
                                            @method('PUT')
                                            <button class="mr-3 border-b-2 border-dotted font-semibold
                                                italic text-green-600 hover:text-green-400"
                                                type="submit">
                                                cancel
                                            </button>
                                        </form>
                                    @endif
                                {{-- case owner --}}
                                @else 
                                    {{-- disabled and active confirm button --}}
                                    @if ($reservation->status == "Confirmed")
                                        <button class="mr-3 border-b-2 border-dotted font-semibold
                                            italic text-green-600 hover:text-green-400
                                            opacity-50 cursor-not-allowed">
                                            confirmed
                                        </button>
                                    @else 
                                        <form method="POST" action="/showresvs/{{ $reservation->id }}/Confirmed">
                                            @csrf
                                            @method('PUT')
                                            <button class="mr-3 border-b-2 border-dotted font-semibold
                                                italic text-green-600 hover:text-green-400"
                                                type="submit">
                                                confirm
                                            </button>
                                        </form>
                                    @endif
                                    {{-- disabled and active reject button --}}
                                    @if ($reservation->status == "Rejected")
                                        <button class="mr-3 border-b-2 border-dotted font-semibold
                                            italic text-red-600 hover:text-red-400
                                            opacity-50 cursor-not-allowed">
                                            rejected
                                        </button>
                                    @else 
                                        <form method="POST" action="/showresvs/{{ $reservation->id }}/Rejected">
                                            @csrf
                                            @method('PUT')
                                            <button class="mr-3 border-b-2 border-dotted font-semibold
                                                italic text-red-600 hover:text-red-400"
                                                type="submit">
                                                reject
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            @endif
                            
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex justify-center m-10">
                    <p class="text-gray-500 text-xl font-bold">
                        No Reservations yet!!
                    </p>
                </div>
            @endforelse
            
            <hr class="shadow my-6">
            <div class="row px-20 pb-10">
                {{ $reservations->links() }}
            </div>
            
        </div>
    </div>
</x-app-layout>
