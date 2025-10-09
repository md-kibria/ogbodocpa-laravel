@extends('layouts.admin')

@section('title', 'User Profile')
@section('header', 'User Profile')

@section('content')



    <div class="overflow-x-auto w-full pt-6 pb-4 dark flex flex-col md:flex-row items-center justify-center min-h-screen gap-2">



        <div class="w-full max-w-sm bg-gray-800 border border-gray-700 rounded-lg shadow-sm">
            <div class="flex justify-end px-4 pt-4">
                <form action="{{ route('admin.users.destroy', $user->id) }}"
                    onsubmit="return confirm('Are you sure you want to delete?')" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="inline-block text-red-500 hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg text-2xl p-1 cursor-pointer">
                        <ion-icon name="trash-outline"></ion-icon>
                    </button>
                </form>
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
                <h5 class="mb-1 text-xl font-medium text-white">{{ $user?->first_name }} {{ $user?->last_name }}
                    @if ($user->status === 'active')
                        <span class="text-green-500 text-sm">
                            ({{ $user->status }})
                        </span>
                    @elseif($user->status === 'pending')
                        <span class="text-yellow-500 text-sm">
                            ({{ $user->status }})
                        </span>
                    @else
                        <span class="text-red-500 text-sm">
                            ({{ $user->status }})
                        </span>
                    @endif
                </h5>
                <span class="text-sm text-gray-400">{{ $user->email }}</span>
                <div class="flex mt-4 md:mt-6">
                    <form action="{{ route('admin.users.update', $user->id) }}"
                        onsubmit="return confirm('Are you sure you want to approve?')" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="status" value="active">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-800 cursor-pointer">
                            Approve
                        </button>
                    </form>
                    <form action="{{ route('admin.users.update', $user->id) }}"
                        onsubmit="return confirm('Are you sure you want to reject?')" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="status" value="rejected">
                        <button type="submit"
                            class="py-2 px-6 ms-2 text-sm font-medium text-red-400 focus:outline-none bg-red-200 rounded-lg border border-red-600 hover:bg-red-300 hover:text-white focus:z-10 focus:ring-4 focus:ring-red-700 cursor-pointer">
                            Reject
                        </button>
                    </form>
                </div>
                
            </div>
        </div>


        <div class="w-full max-w-sm bg-gray-800 border border-gray-700 rounded-lg shadow-sm">
            
            <div class="px-6 py-4">
                <h5 class="mb-4 text-xl font-medium text-white text-center">User's Details</h5>
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <span class="font-semibold text-gray-400 w-[90px]">Email: </span>
                        <span class="text-white">{{ $user?->email }}</span>
                    </li>
                    <li class="flex items-center">
                        <span class="font-semibold text-gray-400 w-[90px]">Phone: </span>
                        <span class="text-white">{{ $user?->phone }}</span>
                    </li>
                    {{-- <li class="flex items-center">
                        <span class="font-semibold text-gray-400 w-[90px]">Birthday: </span>
                        <span class="text-white">{{ $user?->birthday }} {{ $user?->birthmonth }}</span>
                    </li>
                    <li class="flex items-center">
                        <span class="font-semibold text-gray-400 w-[90px]">Gender: </span>
                        <span class="text-white">{{ $user?->gender }}</span>
                    </li> --}}
                    <li class="flex items-center">
                        <span class="font-semibold text-gray-400 w-[90px]">Address: </span>
                        <span class="text-white">{{ $user?->address }}</span>
                    </li>
                    {{-- <li class="flex items-center">
                        <span class="font-semibold text-gray-400 w-[90px]">Address 2: </span>
                        <span class="text-white">{{ $user?->address_2 }}</span>
                    </li> --}}
                    <li class="flex items-center">
                        <span class="font-semibold text-gray-400 w-[90px]">City: </span>
                        <span class="text-white">{{ $user?->city }}</span>
                    </li>
                    <li class="flex items-center">
                        <span class="font-semibold text-gray-400 w-[90px]">State: </span>
                        <span class="text-white">{{ $user?->state }}</span>
                    </li>
                    <li class="flex items-center">
                        <span class="font-semibold text-gray-400 w-[90px]">Zip: </span>
                        <span class="text-white">{{ $user?->zip }}</span>
                    </li>
                    <li class="flex items-center">
                        <span class="font-semibold text-gray-400 w-[90px]">Country: </span>
                        <span class="text-white">{{ $user?->country }}</span>
                    </li>
                </ul>
        </div>
    </div>
    
    








@endsection
