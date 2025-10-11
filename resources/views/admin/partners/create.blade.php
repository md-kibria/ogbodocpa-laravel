@extends('layouts.admin')

@section('title', 'Add Partner')
@section('header', 'Add Partner')

@section('content')

    <div class="w-full py-22">

        <form action="{{ route('admin.partners.store') }}" class="border border-slate-700 w-2/3 mx-auto p-4 px-6 rounded-lg" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <label for="name" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> Name </span>

                <input type="text" id="name"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('name') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter partner name here" value="{{ old('name') }}" name="name" />
                    @error('name') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="logo" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">Logo </span>

                <input type="file" id="logo"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('logo') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter logo" name="logo" />
                    @error('logo') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="url" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> URL(optional) </span>

                <input type="text" id="url"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('url') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter partner URL here" value="{{ old('url') }}" name="url" />
                    @error('url') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>

            <input type="submit" id="submit"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border border-gray-600 bg-blue-300 hover:bg-blue-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3" value="Submit"/>
        </form>
    </div>
    
    <x-editor-script id="content" />

@endsection
