@extends('layouts.admin')

@section('title', 'Edit Consultain')
@section('header', 'Edit Consultain')

@section('content')



    <div class="w-full py-22">

        <form action="{{ route('admin.consultains.update', $consultain->id) }}" class="border border-slate-700 w-2/3 mx-auto p-4 px-6 rounded-lg" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="name" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> Name </span>

                <input type="name" id="name"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('name') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter name here" value="{{ old('name') ?? $consultain->name }}" name="name" />
                    @error('name') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="email" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> Email </span>

                <input type="email" id="email"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('email') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter email here" value="{{ old('email') ?? $consultain->email }}" name="email" />
                    @error('email') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="phone" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> Phone </span>

                <input type="phone" id="phone"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('phone') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter phone here" value="{{ old('phone') ?? $consultain->phone }}" name="phone" />
                    @error('phone') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="address" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> Address(optional) </span>

                <input type="address" id="address"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('address') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter address here" value="{{ old('address') }}" name="address" />
                    @error('address') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="service_id" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">Service</span>

                <select name="service_id" id="service_id" class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('service_id') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3">
                    <option value="">Select Service</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" @selected($consultain->service_id === $service->id)>{{ $service->title }}</option>
                    @endforeach
                </select>
            </label>

            <input type="submit" id="submit"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border border-gray-600 bg-blue-300 hover:bg-blue-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3" value="Submit"/>
        </form>
    </div>


@endsection
