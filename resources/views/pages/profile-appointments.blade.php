@extends('layouts.main')

@section('title', 'Profile Update')

@section('content')

    <div
        class="h-[450px] w-[calc(100%+100px)] bg-blue-100 absolute -top-20 -left-10 -z-10 flex flex-col items-center justify-center rotate-[-5deg]">
    </div>

    
    <div class="container mx-auto min-h-screen py-15 px-2 flex flex-col justify-center items-center">
        <div class="flex flex-col items-center z-20 pt-0 pb-7">
               <h1 class="text-4xl font-bold text-slate-600 text-center pb-3">Your Appointment</h1>
           </div>


        <div class="w-full max-w-fit p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 overflow-x-scroll">
           

                {{-- <h5 class="text-xl font-medium">Manage your appointments</h5> --}}
                <p class="text-sm text-gray-500">Manage your appointments</p>



                <table class="min-w-full mt-8 border border-gray-200 rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Id</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Date</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Time</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Service</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Consultant</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Email</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Phone</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Status</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr class="border-t border-slate-400">
                                <td class="px-4 py-2 text-sm text-gray-600">{{ $appointment->id }}</td>
                                <td class="px-4 py-2 text-sm text-gray-600">
                                    {{ \Carbon\Carbon::parse($appointment->date)->toFormattedDateString() }}</td>
                                <td class="px-4 py-2 text-sm text-gray-600">{{ $appointment->schedule->start_time }}</td>
                                <td class="px-4 py-2 text-sm text-gray-600">{{ $appointment->service->title }}</td>
                                <td class="px-4 py-2 text-sm text-gray-600">{{ $appointment->consultain->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-600">{{ $appointment->consultain->email ?? 'Null' }}
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-600">{{ $appointment->consultain->phone ?? 'Null' }}
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-600">
                                    @if ($appointment->status === 'confirmed' || $appointment->status === 'active')
                                        <p class="text-green-600 text-center rounded-md capitalize w-fit mx-auto">
                                            {{ $appointment->status }}
                                        </p>
                                    @elseif($appointment->status === 'pending')
                                        <p class="text-blue-600 text-center rounded-md capitalize w-fit mx-auto">
                                            {{ $appointment->status }}
                                        </p>
                                    @else
                                        <p class="text-red-600 text-center rounded-md capitalize w-fit mx-auto">
                                            {{ $appointment->status }}</p>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-600">
                                    <form action="{{ route('profile.appointments.cancel', $appointment->id) }}"
                                        onsubmit="return confirm('Are you sure you want to cancel?')" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                            class="bg-red-400 hover:bg-red-300 cursor-pointer px-3 py-1.5 text-sm font-medium text-gray-100 transition-colors hover:text-gray-900 focus:relative">
                                            Cancel
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if ($appointments->isEmpty())
                            <tr>
                                <td colspan="4" class="px-4 py-4 text-center text-gray-500 text-sm">No appointments
                                    found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

      
        </div>



    </div>
@endsection
