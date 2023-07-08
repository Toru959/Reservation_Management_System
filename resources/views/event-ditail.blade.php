<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベント詳細
        </h2>
    </x-slot>

    <div class="pt-4 pd-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="max-w-2xl py-5 mx-auto">
        
                    <x-validation-errors class="mb-4" />
            
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
            
                    <form method="post" action="{{ route('events.reserve', ['id' => $event->id]) }}">       
                        @csrf
                        <div class="mt-4">
                            <x-label for="event_name" value="Evnet Name" />
                           {{ $event->name }}
                        </div>
                        <div class="mt-4">
                            <x-label for="information" value="Evnet Details" />
                            {!! nl2br(e($event->information)) !!}
                        </div>           
                        <div class="md:flex justify-between">
                            <div class="mt-4">
                                <x-label for="event_date" value="Event Date" />
                                {{ $event->eventDate }}
                            </div>
                            <div class="mt-4">
                                <x-label for="start_time" value="Sart Time" />
                                {{ $event->startTime }}
                            </div>
                            <div class="mt-4">
                                <x-label for="end_time" value="End Time" />
                                {{ $event->endTime }}
                            </div>
                        </div>
                        <div class="md:flex justify-between items-end">
                            <div class="mt-4">
                                <x-label for="max_people" value="Max People" />
                                {{ $event->max_people }}
                            </div>
                            <div class="mt-4">
                                @if($reservablePeople <= 0)
                                    <span class="text-red-500 text-xs">This event is full.</span>
                                @else
                                <x-label for="reserved_people" value="Reserved People" />
                                <select name="reserved_people">
                                    @for($i = 1; $i <= $reservablePeople; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                @endif
                            </div>
                            @if($isReserved === null)
                                <input type="hidden" name="id" value="{{ $event->id }}">
                                @if($reservablePeople > 0)
                                <x-button class="ml-4">
                                    Reserve
                                </x-button>
                                @endif
                            @else
                                <span class="text-xs">This event has already been booked</span>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
