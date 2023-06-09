<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベント新規登録
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="max-w-2xl py-5 mx-auto">
        
                    <x-validation-errors class="mb-4" />
            
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
            
                    <form method="POST" action="{{ route('events.store') }}">
                        @csrf           
                        <div class="mt-4">
                            <x-label for="event_name" value="Evnet Name" />
                            <x-input id="event_name" class="block mt-1 w-full" type="text" name="event_name" :value="old('event_name')" required autofocus autocomplete="username" />
                        </div>
                        <div class="mt-4">
                            <x-label for="information" value="Evnet Details" />
                            <x-textarea row="3" id="information" name="information" class="block mt-1 w-full">{{ old('information') }}</x-textarea>
                        </div>           
                        <div class="md:flex justify-between">
                            <div class="mt-4">
                                <x-label for="event_date" value="Event Date" />
                                <x-input id="event_date" class="block mt-1 w-full" type="text" name="event_date" required />
                            </div>
                            <div class="mt-4">
                                <x-label for="start_time" value="Sart Time" />
                                <x-input id="start_time" class="block mt-1 w-full" type="text" name="start_time" required />
                            </div>
                            <div class="mt-4">
                                <x-label for="end_time" value="End Time" />
                                <x-input id="end_time" class="block mt-1 w-full" type="text" name="end_time" required />
                            </div>
                        </div>
                        <div class="md:flex justify-between items-end">
                            <div class="mt-4">
                                <x-label for="max_people" value="Max People" />
                                <x-input id="max_people" class="block mt-1 w-full" type="number" name="max_people" required />
                            </div>
                            <div class="flex space-x-4 justify-around">
                                <input type="radio" name="is_visible" value="1" checked /> Desplay
                                <input type="radio" name="is_visible" value="0" /> No Desplay
                            </div>
                            <x-button class="ml-4">
                                New Create
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/flatpickr.js'])
</x-app-layout>
