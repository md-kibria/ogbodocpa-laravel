@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 my-8 w-full">
        {{-- Dashboard card --}}
        <div class="bg-purple-200 p-3 rounded-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-400">Total Appointments</p>
                    <p class="text-4xl text-purple-500 flex">{{ $appointmentsCount > 9 ? $appointmentsCount : '0' . $appointmentsCount }}</p>
                </div>
                <div>
                    <div class="bg-purple-500 h-12 w-12 rounded-full flex items-center justify-center">
                        <p class="text-2xl text-center mt-0.5 mr-0.5"><ion-icon class="my-auto block"
                                name="clipboard-outline"></ion-icon></p>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-2 border-purple-400" />
        </div>
        {{-- Dashboard card // --}}

        {{-- Dashboard card --}}
        <div class="bg-blue-200 p-3 rounded-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-400">Total Services</p>
                    <p class="text-4xl text-blue-500">{{ $servicesCount > 9 ? $servicesCount : '0' . $servicesCount }}</p>
                </div>
                <div>
                    <div class="bg-blue-500 h-12 w-12 rounded-full flex items-center justify-center">
                        <p class="text-2xl text-center mt-0.5 mr-0.5"><ion-icon class="my-auto block"
                                name="layers-outline"></ion-icon></p>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-2 border-blue-400" />
        </div>
        {{-- Dashboard card // --}}

        {{-- Dashboard card --}}
        <div class="bg-green-200 p-3 rounded-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-400">Total Consultains</p>
                    <p class="text-4xl text-green-500">{{ $consultainsCount > 9 ? $consultainsCount : '0' . $consultainsCount }}</p>
                </div>
                <div>
                    <div class="bg-green-500 h-12 w-12 rounded-full flex items-center justify-center">
                        <p class="text-2xl text-center mt-0.5 mr-0.5"><ion-icon class="my-auto block"
                                name="people-outline"></ion-icon></p>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-2 border-green-400" />
        </div>
        {{-- Dashboard card // --}}

    </div>


    <div class="flex gap-2 flex-col md:flex-row">
        {{-- news --}}
        <div class="overflow-x-auto w-full py-2">
            <p class="text-lg">Recent Signups</p>
            <table class="border-collapse border border-slate-500 my-2 w-full text-slate-300">
                <thead>
                    <tr>
                        {{-- <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Id</th> --}}
                        <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Name</th>
                        <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Date</th>
                        <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($users) == 0)
                        <tr>
                            <td colspan="3" class="border border-slate-700 p-3 text-center">No items found.</td>
                        </tr>
                    @endif
                    @foreach ($users as $item)
                        <tr>
                            <td class="border border-slate-700 p-3">{{ $item->name }}</td>
                            <td class="border border-slate-700 p-3 w-22">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M') }}
                            </td>
                            <td class="border border-slate-700 p-3">
                                @if ($item->status == 'published')
                                    <p
                                        class="bg-green-200 text-green-600 text-center rounded-md capitalize w-fit px-2 mx-auto">
                                        {{ $item->status }}
                                    </p>
                                @else
                                    <p class="bg-red-200 text-red-600 text-center rounded-md capitalize w-fit px-2 mx-auto">
                                        {{ $item->status }}</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- events --}}
        <div class="overflow-x-auto w-full py-2">
            <p class="text-lg">Latest Appointments</p>
            <table class="border-collapse border border-slate-500 my-2 w-full text-slate-300">
                <thead>
                    <tr>
                        <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Name</th>
                        <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Email</th>
                        <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Consultain</th>
                        <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($appointments) == 0)
                        <tr>
                            <td colspan="3" class="border border-slate-700 p-3 text-center">No items found.</td>
                        </tr>
                    @endif
                    @foreach ($appointments as $item)
                        <tr>
                            <td class="border border-slate-700 p-3">{{ $item->user->name }}</td>
                            <td class="border border-slate-700 p-3">{{ $item->user->email }}</td>
                            <td class="border border-slate-700 p-3">{{ $item->consultain->name }}</td>
                            <td class="border border-slate-700 p-3">
                                @if ($item->status === 'confirmed' || $item->status === 'active')
                                    <p
                                        class="text-green-600 text-center rounded-md capitalize w-fit mx-auto">
                                        {{ $item?->status }}
                                    </p>
                                @elseif ($item?->status == 'ongoing')
                                    <p
                                        class="text-blue-600 text-center rounded-md capitalize w-fit mx-auto">
                                        {{ $item?->status }}
                                    </p>
                                @else
                                    <p class="text-red-600 text-center rounded-md capitalize w-fit mx-auto">
                                        {{ $item?->status }}</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
