@extends('layouts.admin')

@section('title', 'Update ' . ucfirst($page->slug) . ' Page')
@section('header', 'Update ' . ucfirst($page->slug) . ' Page')

@section('content')

    <div class="w-full py-22">

        <form action="{{ route('admin.page.update') }}" class="w-full grid grid-cols-1 md:grid-cols-3 gap-5"
            method="POST">
            <div class="sm:col-span-2 w-full h-fit border border-slate-700 mx-auto p-4 px-6 rounded-lg">
                @csrf
                @method('POST')
                <label for="name" class="block font-light my-2 text-slate-100">
                    <span class="text-sm font-medium text-gray-200"> Name </span>

                    <input type="name" id="name"
                        class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('name') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                        placeholder="Enter name" value="{{ old('name') ?? $page->name }}" name="name" />
                    @error('name')
                        <span class="text-light text-red-300">{{ $message }}</span>
                    @enderror
                </label>
                <label for="content" class="block font-light my-2 text-slate-100">
                    <span class="text-sm font-medium text-gray-200">Page Content </span>

                    <input type="text" id="content"
                        class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('content') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                        placeholder="Enter content" value="{{ old('content') ?? $page->content }}" name="content" />
                    @error('content')
                        <span class="text-light text-red-300">{{ $message }}</span>
                    @enderror
                </label>
                <input type="hidden" name="slug" value="{{ $page->slug }}" />

                <input type="submit" id="submit"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border border-gray-600 bg-blue-300 hover:bg-blue-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3"
                    value="Update" />
            </div>
            <div class="sm:col-span-1 w-full h-fit border border-slate-700 mx-auto p-4 px-6 rounded-lg">
                <label for="seo_keywords" class="block font-light my-2 text-slate-100">
                    <span class="text-sm font-medium text-gray-200"> SEO Keyword </span>

                    <input type="seo_keywords" id="seo_keywords"
                        class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('seo_keywords') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                        placeholder="Enter seo keywords" value="{{ old('seo_keywords') ?? $page->seo_keywords }}"
                        name="seo_keywords" />
                    @error('seo_keywords')
                        <span class="text-light text-red-300">{{ $message }}</span>
                    @enderror
                </label>
                <label for="seo_description" class="block font-light my-2 text-slate-100">
                    <span class="text-sm font-medium text-gray-200"> SEO Description </span>

                    <textarea name="seo_description" id="seo_description" cols="30" rows="4"
                        class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('seo_description') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                        placeholder="Enter seo description">{{ old('seo_description') ?? $page->seo_description }}</textarea>
                    @error('seo_description')
                        <span class="text-light text-red-300">{{ $message }}</span>
                    @enderror
                </label>
            </div>
        </form>
    </div>

    <x-editor-script id="content" />

@endsection
