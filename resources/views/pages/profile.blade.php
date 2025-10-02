@extends('layouts.main')

@section('title', $user->name . ' Profile')

@section('content')

    <div
        class="h-[450px] w-[calc(100%+100px)] bg-blue-100 absolute -top-20 -left-10 -z-10 flex flex-col items-center justify-center rotate-[-5deg]">
    </div>
    <div class="container mx-auto min-h-screen py-15 px-2 flex flex-col justify-center items-center">



        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="flex justify-end px-4 pt-4">
                <a class="inline-block text-red-500 hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg text-2xl p-1 cursor-pointer"
                    title="Logout" href="{{ route('logout') }}">
                    <ion-icon name="log-out-outline"></ion-icon>
                </a>

            </div>
            <div class="flex flex-col items-center pb-10">
                <div class="w-24 h-24 mb-3 rounded-full shadow-lg relative">
                    <img class="w-full h-full mb-3 rounded-full"
                        src="{{ $user->image ? asset('/storage/' . $user->image) : '/img/profile.png' }}"
                        alt="{{ $user->name }}" />

                    @if ($user->status === 'active')
                        <p
                            class="text-green-500 text-2xl absolute -right-0 bottom-2 bg-white rounded-full h-6 w-6 flex items-center justify-center">
                            <ion-icon name="checkmark-circle"></ion-icon>
                        </p>
                    @elseif($user->status === 'pending')
                        <p
                            class="text-yellow-500 text-2xl absolute -right-0 bottom-2 bg-white rounded-full h-6 w-6 flex items-center justify-center">
                            <ion-icon name="time"></ion-icon>
                        </p>
                    @else
                        <p
                            class="text-red-500 text-2xl absolute -right-0 bottom-2 bg-white rounded-full h-6 w-6 flex items-center justify-center">
                            <ion-icon name="close-circle"></ion-icon>
                        </p>
                    @endif
                </div>
                <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $user?->first_name }} {{ $user?->last_name }}</h5>
                <span class="text-sm text-gray-500">{{ $user->email }}</span>
                <div class="flex mt-4 md:mt-6">
                    <a href="{ route('forum') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white border border-blue-500 bg-blue-500 hover:text-blue-500 hover:bg-transparent rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300 transition-all"
                        title="Appointments">Appointments</a>
                    <a href="{{ route('profile.edit') }}"
                        class="py-2 px-9 ms-2 text-sm font-medium text-blue-400 focus:outline-none bg-white rounded-lg border border-blue-400 hover:bg-blue-100 hover:text-blue-500 focus:z-10 focus:ring-4 focus:ring-gray-100 transition-all"
                        title="Update Profile">Update</a>
                </div>
            </div>
        </div>


    </div>
@endsection
