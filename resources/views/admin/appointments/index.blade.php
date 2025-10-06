@extends('layouts.admin')

@section('title', 'Appointments')
@section('header', 'Appointments')

@section('content')



    <div class="overflow-x-auto w-full pt-6 pb-4">
        <table class="border-collapse border border-slate-500 my-2 w-full text-slate-300">
            <thead>
                <tr>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Id</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">User</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Email</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Service</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Consultain</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Date</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Schedule</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Status</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $item)
                    <tr class="even:bg-slate-600">
                        <td class="border border-slate-700 p-3">{{ $item->id }}</td>
                        <td class="border border-slate-700 p-3">{{ $item->user->name }}</td>
                        <td class="border border-slate-700 p-3">{{ $item->user->email }}</td>
                        <td class="border border-slate-700 p-3">{{ $item->service->title }}</td>
                        <td class="border border-slate-700 p-3">{{ $item->consultain->name }}</td>
                        <td class="border border-slate-700 p-3">
                            {{ \Carbon\Carbon::parse($item->date)->toFormattedDateString() }}
                        </td>
                        <td class="border border-slate-700 p-3">
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->schedule->start_time)->format('h:i A') }} <br/> to
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->schedule->end_time)->format('h:i A') }}
                        </td>
                        <td class="border border-slate-700 p-3">
                            @if ($item->status === 'confirmed' || $item->status === 'active')
                                <p class="bg-green-200 text-green-600 text-center rounded-md capitalize w-fit px-2 mx-auto">
                                    {{ $item->status }}
                                </p>
                            @elseif($item->status === 'pending')
                                <p class="bg-blue-200 text-blue-600 text-center rounded-md capitalize w-fit px-2 mx-auto">
                                    {{ $item->status }}
                                </p>
                            @else
                                <p class="bg-red-200 text-red-600 text-center rounded-md capitalize w-fit px-2 mx-auto">
                                    {{ $item->status }}</p>
                            @endif
                        </td>
                        <td class="border border-slate-700 p-3">
                            <span
                                class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
                                {{-- <a href="{{ route('admin.users.show', $item->id) }}"
                                    class="bg-blue-500 hover:bg-blue-400 cursor-pointer px-3 py-1.5 text-sm font-medium text-gray-100 transition-colors hover:text-gray-900 focus:relative">
                                    Profile
                                </a> --}}


                                <form action="{{ route('admin.appointments.cancel', $item->id) }}"
                                    onsubmit="return confirm('Are you sure you want to cancel?')" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <button type="submit"
                                        class="bg-red-400 hover:bg-red-300 cursor-pointer px-3 py-1.5 text-sm font-medium text-gray-100 transition-colors hover:text-gray-900 focus:relative">
                                        Cancel
                                    </button>
                                </form>
                            </span>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-white">
            {{ $appointments->links('pagination::tailwind') }}
        </div>

    </div>


@endsection
