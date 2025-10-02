@extends('layouts.admin')

@section('title', 'Edit Service')
@section('header', 'Edit Service')

@section('content')


    <form action="{{ route('admin.services.update', $service->id) }}" class="w-full py-12 grid grid-cols-1 md:grid-cols-3 gap-5" method="POST" enctype="multipart/form-data">
        <div class="sm:col-span-2 w-full h-fit border border-slate-700 mx-auto p-4 px-6 rounded-lg">
            @csrf
            @method('PUT')
            <label for="title" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> Title </span>

                <input type="title" id="title"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('title') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter title" value="{{ old('title') ?? $service->title }}" name="title" />
                    @error('title') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="image" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">Image </span>

                <input type="file" id="image"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('image') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter image" name="image" />
                    @error('image') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="description" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">Description </span>

                <textarea name="description" id="description" cols="30" rows="10" class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('description') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3" placeholder="Enter description">{{ old('description') ?? $service->description }}</textarea>
                    @error('description') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>

            <input type="submit" id="submit"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border border-gray-600 bg-blue-300 hover:bg-blue-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3" value="Submit"/>
        </div>

         <div class="sm:col-span-1 w-full h-fit border border-slate-700 mx-auto p-4 px-6 rounded-lg">
            <label for="seo_keywords" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> SEO Keyword </span>

                <input type="seo_keywords" id="seo_keywords"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('seo_keywords') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter seo keywords" value="{{ old('seo_keywords') ?? $service->seo_keywords }}" name="seo_keywords" />
                    @error('seo_keywords') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="seo_description" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> SEO Description </span>

                <textarea name="seo_description" id="seo_description" cols="30" rows="4" class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('seo_description') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3" placeholder="Enter seo description">{{ old('seo_description') ?? $service->seo_description }}</textarea>
                    @error('seo_description') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
        </div>
    </form>
    
    <x-editor-script id="description" />

@endsection
