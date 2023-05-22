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
            
                    <form method="GET" action="{{ route('events.edit', ['event' => $event->id]) }}">       
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
                            <div class="flex space-x-4 justify-around">
                               @if($event->is_visible)
                                On Desplay
                               @else
                                Non Desplay
                               @endif
                            </div>
                            @if($event->eventDate >= \Carbon\Carbon::today()->format('Y/m/d'))
                                <x-button class="ml-4">
                                    Edit
                                </x-button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="max-w-2xl py-5 mx-auto">
                    @if($users->isEmpty())
                        <div class="text-center py-4">Reservation Status</div>
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                            <thead>
                              <tr>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Reservation Company Name</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Number of Reservations</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($reservations as $reservation)
                            @if(is_null($reservation['canceled_date']))
                            <tr>
                                <td class="px-4 py-3">{{ $reservation['name'] }}</td>
                                <td class="px-4 py-3">{{ $reservation['number_of_people'] }}</td>
                            </tr>
                            @endif
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
