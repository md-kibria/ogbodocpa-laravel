@extends('layouts.admin')

@section('title', 'Consultant Profile')
@section('header', 'Consultant Profile')

@section('content')



    <div class="overflow-x-auto w-full pt-6 pb-4 dark flex flex-col items-start justify-center min-h-screen gap-5">


        <div class="w-full bg-gray-800 border border-gray-700 rounded-lg shadow-sm">

            <div class="px-6 py-4">
                <h5 class="mb-6 text-xl font-medium text-white text-left">Profile Details</h5>
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <span class="font-semibold text-gray-400 w-[90px]">Name: </span>
                        <span class="text-white">{{ $consultain?->name }}</span>
                    </li>
                    <li class="flex items-center">
                        <span class="font-semibold text-gray-400 w-[90px]">Email: </span>
                        <span class="text-white">{{ $consultain?->email ?? 'Null' }}</span>
                    </li>
                    <li class="flex items-center">
                        <span class="font-semibold text-gray-400 w-[90px]">Phone: </span>
                        <span class="text-white">{{ $consultain?->phone ?? 'Null'}}</span>
                    </li>
                    <li class="flex items-center">
                        <span class="font-semibold text-gray-400 w-[90px]">Address: </span>
                        <span class="text-white">{{ $consultain?->address ?? 'Null' }}</span>
                    </li>
                    <li class="flex items-center">
                        <span class="font-semibold text-gray-400 w-[90px]">Service: </span>
                        <span class="text-white">{{ $consultain?->service->title }}</span>
                    </li>

                </ul>
            </div>
        </div>
        <div class="w-full bg-gray-800 border border-gray-700 rounded-lg shadow-sm">

            <div class="px-6 py-4">
                <h5 class="mb-6 text-xl font-medium text-white text-left">Schedules</h5>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2">
                    <div id="openModalBtn"
                        class="w-full min-h-40 border-2 border-dashed border-slate-500 rounded-md flex items-center justify-center cursor-pointer hover:bg-slate-700 hover:border-slate-400">
                        <span class="text-7xl text-slate-500"><ion-icon name="add-outline"></ion-icon></span>
                    </div>

                    @foreach ($consultain->schedules as $item)
                    {{-- {{dd($item)}} --}}
                        <div class="bg-slate-500 rounded-md w-full">
                            <div class="bg-slate-600 p-3 rounded-t-md">
                                <span class="text-xl">{{ \Carbon\Carbon::createFromFormat('H:i:s', $item->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->end_time)->format('h:i A') }}</span>
                            </div>
                            <div class="grid grid-cols-2 p-3">
                                <span class="@if($item->sunday) text-green-200 @else text-red-200 line-through @endif">Sunday</span>
                                <span class="@if($item->monday) text-green-200 @else text-red-200 line-through @endif">Monday</span>
                                <span class="@if($item->tuesday) text-green-200 @else text-red-200 line-through @endif">Tuesday</span>
                                <span class="@if($item->wednesday) text-green-200 @else text-red-200 line-through @endif">Wednesday</span>
                                <span class="@if($item->thursday) text-green-200 @else text-red-200 line-through @endif">Thursday</span>
                                <span class="@if($item->friday) text-green-200 @else text-red-200 line-through @endif">Friday</span>
                                <span class="@if($item->saturday) text-green-200 @else text-red-200 line-through @endif">Saturday</span>
                                <div class="flex justify-end gap-2">
                                    {{-- <span class="text-yellow-400 text-lg cursor-pointer"><ion-icon name="construct"></ion-icon></span> --}}

                                    <form action="{{ route('admin.consultains.schedules.destroy', $item->id) }}"
                                    onsubmit="return confirm('Are you sure you want to delete?')" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="text-red-400 text-lg cursor-pointer">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>





        <!-- Modal Trigger Button -->
        {{-- <button id="openModalBtn" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Schedule</button> --}}

        <!-- Modal Overlay -->
        <div id="scheduleModal" class="fixed inset-0 bg-bl ack bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-slate-700 rounded-lg shadow-lg w-full max-w-md p-6 relative">
                <h3 class="text-xl font-semibold mb-4 text-center">Add Schedule</h3>
                <form action="{{ route('admin.consultains.schedules.store', $consultain?->id) }}" method="POST"
                    class="space-y-4">
                    @csrf
                    @method('POST')
                    <div class="mb-4">
                        <label for="start_time" class="block text-gray-100 font-medium mb-1">Start Time</label>
                        <input type="time" id="start_time" name="start_time"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="end_time" class="block text-gray-100 font-medium mb-1">End Time</label>
                        <input type="time" id="end_time" name="end_time"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <span class="block text-gray-100 font-medium mb-2">Days of Week</span>
                        <div class="grid grid-cols-2 gap-2">
                            <label class="flex items-center">
                                <input type="checkbox" name="days[]" value="sunday" class="mr-2" checked>
                                Sunday
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="days[]" value="monday" class="mr-2" checked>
                                Monday
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="days[]" value="tuesday" class="mr-2" checked>
                                Tuesday
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="days[]" value="wednesday" class="mr-2" checked>
                                Wednesday
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="days[]" value="thursday" class="mr-2" checked>
                                Thursday
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="days[]" value="friday" class="mr-2" checked>
                                Friday
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="days[]" value="saturday" class="mr-2" checked>
                                Saturday
                            </label>
                        </div>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" id="closeModalBtn"
                            class="px-4 py-2 bg-gray-400 rounded hover:bg-gray-500">Cancel</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Save</button>
                    </div>
                </form>
                <!-- Close Icon -->
                <button id="closeModalIcon"
                    class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl">&times;</button>
            </div>
        </div>

        <script>
            const openModalBtn = document.getElementById('openModalBtn');
            const scheduleModal = document.getElementById('scheduleModal');
            const closeModalBtn = document.getElementById('closeModalBtn');
            const closeModalIcon = document.getElementById('closeModalIcon');

            openModalBtn.addEventListener('click', () => {
                scheduleModal.classList.remove('hidden');
            });

            closeModalBtn.addEventListener('click', () => {
                scheduleModal.classList.add('hidden');
            });

            closeModalIcon.addEventListener('click', () => {
                scheduleModal.classList.add('hidden');
            });
        </script>




    @endsection
