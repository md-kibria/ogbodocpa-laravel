@extends('layouts.admin')

@section('title', 'Appointment Review')
@section('header', 'Appointment Review')

@section('content')


    <div
        class="overflow-x-auto w-full pt-6 pb-4 dark flex flex-col md:flex-row items-center justify-center min-h-screen gap-2">

        <div class="w-full max-w-xl bg-gray-800 border border-gray-700 rounded-lg shadow-sm">
            <div class="px-6 py-6">
                <h5 class="mb-4 text-xl font-medium text-white">Appointment Details</h5>
                <div class="grid grid-cols-1 gap-3 text-sm">
                    <div class="flex items-center">
                        <span class="font-semibold text-gray-400 w-32">ID:</span>
                        <span class="text-white">#{{ $appointment->id }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold text-gray-400 w-32">Status:</span>
                        <span class="text-white capitalize">
                            @if ($appointment->status === 'confirmed' || $appointment->status === 'active' || $appointment->status === 'completed')
                                <span
                                    class="bg-green-200 text-green-600 rounded-md px-2 py-0.5">{{ $appointment->status }}</span>
                            @elseif ($appointment->status === 'pending')
                                <span
                                    class="bg-blue-200 text-blue-600 rounded-md px-2 py-0.5">{{ $appointment->status }}</span>
                            @else
                                <span
                                    class="bg-red-200 text-red-600 rounded-md px-2 py-0.5">{{ $appointment->status }}</span>
                            @endif
                        </span>
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold text-gray-400 w-32">User:</span>
                        <span class="text-white">{{ $appointment->user?->first_name .' '. $appointment->user?->last_name }} ({{ $appointment->user?->email }})</span>
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold text-gray-400 w-32">Service:</span>
                        <span class="text-white">{{ $appointment->service?->title }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold text-gray-400 w-32">Consultant:</span>
                        <span class="text-white">{{ $appointment->consultain?->name }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold text-gray-400 w-32">Date:</span>
                        <span
                            class="text-white">{{ \Carbon\Carbon::parse($appointment->date)->toFormattedDateString() }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold text-gray-400 w-32">Time:</span>
                        <span class="text-white">
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $appointment->schedule->start_time)->format('h:i A') }}
                            -
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $appointment->schedule->end_time)->format('h:i A') }}
                        </span>
                    </div>
                    @if ($appointment->notes)
                        <div class="flex items-start">
                            <span class="font-semibold text-gray-400 w-32">Notes:</span>
                            <span class="text-white">{{ $appointment->notes }}</span>
                        </div>
                    @endif
                </div>

                <div class="flex items-center gap-2 mt-6">
                    <form action="{{ route('admin.appointments.approve', $appointment->id) }}" method="POST"
                        onsubmit="return confirm('Confirm this appointment?')">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-800 cursor-pointer">
                            Confirm
                        </button>
                    </form>
                    <form action="{{ route('admin.appointments.reject', $appointment->id) }}" method="POST"
                        onsubmit="return confirm('Reject this appointment?')">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="py-2 px-6 text-sm font-medium text-red-400 focus:outline-none bg-red-200 rounded-lg border border-red-600 hover:bg-red-300 hover:text-white focus:z-10 focus:ring-4 focus:ring-red-700 cursor-pointer">
                            Reject
                        </button>
                    </form>
                    {{-- <form action="{{ route('admin.appointments.cancel', $appointment->id) }}" method="POST"
                        onsubmit="return confirm('Cancel this appointment?')">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="py-2 px-6 text-sm font-medium text-yellow-600 focus:outline-none bg-yellow-200 rounded-lg border border-yellow-600 hover:bg-yellow-300 hover:text-white focus:z-10 focus:ring-4 focus:ring-yellow-700 cursor-pointer">
                            Cancel
                        </button>
                    </form> --}}
                </div>
            </div>
        </div>

        <div class="w-full max-w-xl bg-gray-800 border border-gray-700 rounded-lg shadow-sm md:pb-25">
            <div class="px-6 py-6">
                <h5 class="mb-4 text-xl font-medium text-white">Update Schedule</h5>
                <form action="{{ route('admin.appointments.update', $appointment->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-300 mb-1">Date</label>
                        <input type="date" id="date" name="date" value="{{ old('date', $appointment->date) }}"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required />
                        @error('date')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="schedule_id" class="block text-sm font-medium text-gray-300 mb-1">Time Slot</label>
                        <select id="schedule_id" name="schedule_id"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                            <option value="">Select schedule</option>
                        </select>
                        @error('schedule_id')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                            class="py-2 px-6 text-sm font-medium text-blue-600 focus:outline-none bg-blue-200 rounded-lg border border-blue-600 hover:bg-blue-300 hover:text-white focus:z-10 focus:ring-4 focus:ring-blue-700 cursor-pointer">Save
                            Changes</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const fetchUrl = `{{ url('/api/appointment/consultain/' . $appointment->consultain_id) }}`;
                const date = document.getElementById('date');
                const scheduleId = document.getElementById('schedule_id');

                date.addEventListener('change', function() {
                    fetch(
                            `${fetchUrl}?date=${date.value}`
                        )
                        .then(response => response.json())
                        .then(data => {
                            scheduleId.innerHTML = '';
                            if (data.length == 0) {
                                scheduleId.innerHTML = '<option value="">Not Available</option>';
                            }
                            data.forEach(slot => {
                                if (!slot.is_booked) {
                                    const option = document.createElement('option');
                                    option.value = slot.id;
                                    option.textContent = slot.start_time + ' - ' + slot.end_time;
                                    scheduleId.appendChild(option);
                                }
                            });
                        })
                        .catch(() => {
                            scheduleId.innerHTML = '<option value="">Select</option>';
                        });
                });
            });
        </script>
    @endsection
