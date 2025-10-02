@extends('layouts.admin')

@section('title', 'Add Resource')
@section('header', 'Add Resource')

@section('content')



    <div class="w-full py-22">

        <form action="{{ route('admin.resources.store') }}" class="border border-slate-700 w-2/3 mx-auto p-4 px-6 rounded-lg" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <label for="title" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> Title </span>

                <input type="title" id="title"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('title') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter title here" value="{{ old('title') }}" name="title" />
                    @error('title') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="url" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> URL </span>

                <input type="url" id="url"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('url') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter URL here" value="{{ old('url') }}" name="url" />
                    @error('url') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="tags" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> Tags(optional) </span>

                <input type="tags" id="tags"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('tags') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter tags separated by commas" value="{{ old('tags') }}" name="tags" />
                    @error('tags') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="description" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">Description </span>

                <textarea name="description" id="description" cols="30" rows="5" class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('description') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3" placeholder="Enter description here">{{ old('description') }}</textarea>
                    @error('description') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>

            <input type="submit" id="submit"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border border-gray-600 bg-blue-300 hover:bg-blue-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3" value="Submit"/>
        </form>
    </div>


@endsection
