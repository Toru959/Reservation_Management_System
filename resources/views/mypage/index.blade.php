<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            予約済みのイベント一覧
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-4 mx-auto">
                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif
                      <div class="flex flex-col text-center w-full mb-20">
                      <div class="w-full mx-auto overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                          <thead>
                            <tr>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Event Name</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Start Date</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">End Date</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Number of reservations</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($fromTodayEvents as $event)
                            <tr>
                              <td class="text-blue-500 px-4 py-3"><a href="{{ route('mypage.show', ['id' => $event['id'] ]) }}">{{ $event['name'] }}</a></td>
                              <td class="px-4 py-3">{{ $event['start_date'] }}</td>
                              <td class="px-4 py-3">{{ $event['end_date'] }}</td>
                              <td class="px-4 py-3">
                                {{ $event['number_of_people'] }}
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      {{-- <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                        <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
                      </div> --}}
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2 class="text-center py-2">過去のイベント一覧</h2>
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-4 mx-auto">
                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif
                      <div class="flex flex-col text-center w-full mb-20">
                      <div class="w-full mx-auto overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                          <thead>
                            <tr>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Event Name</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Start Date</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">End Date</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Number of reservations</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($pastEvents as $event)
                            <tr>
                              <td class="text-blue-500 px-4 py-3"><a href="{{ route('mypage.show', ['id' => $event['id'] ]) }}">{{ $event['name'] }}</a></td>
                              <td class="px-4 py-3">{{ $event['start_date'] }}</td>
                              <td class="px-4 py-3">{{ $event['end_date'] }}</td>
                              <td class="px-4 py-3">
                                {{ $event['number_of_people'] }}
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      {{-- <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                        <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
                      </div> --}}
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
