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
            
                    {{-- <form method="GET" action="{{ route('events.edit', ['event' => $event->id]) }}">        --}}
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
                        <form id="cancel_{{ $event->id }}" method="post" action="{{ route('mypage.cancel', ['id'=>$event->id]) }}">
                        @csrf
                        <div class="md:flex justify-between items-end">
                            <div class="mt-4">
                                <x-label  value="Reserved People" />
                                @if($reservation)
                                    {{ $reservation->number_of_people }}
                                @endif
                            </div>
                           
                            @if($event->eventDate >= \Carbon\Carbon::today()->format('Y/m/d'))                            
                                <x-button class="ml-4">
                                    <a href="#" data-id="{{ $event->id }}" onclick="cancelPost(this)">Cancel</a>
                                </x-button>
                            @endif
                        </div>
                        </form>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
<script>
    function cancelPost(e){
        'use strict';
        if (confirm('本当にキャンセルしてもよろしいですか？')){
            decument.getElementById('cancel_'+e.dataset.id).submit();
        }
    }
</script>
</x-app-layout>
