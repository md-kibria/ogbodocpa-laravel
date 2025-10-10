@extends('layouts.admin')

@php
    $title = $page->slug == 'honorees' ? 'Past Winners' : ucfirst($page->slug);
@endphp
@section('title', 'Update ' . $title . ' Page')
@section('header', 'Update ' . $title . ' Page')

@section('content')

    <div class="w-full py-22">

        <form action="{{ route('admin.pages.update', $page->slug) }}"
            class="w-full py-12 grid grid-cols-1 md:grid-cols-3 gap-5" method="POST" enctype="multipart/form-data">
            <div class="sm:col-span-2 w-full h-fit border border-slate-700 mx-auto p-4 px-6 rounded-lg">
                @csrf
                @method('PUT')
                <label for="name" class="block font-light my-2 text-slate-100">
                    <span class="text-sm font-medium text-gray-200"> Name </span>

                    <input type="name" id="name"
                        class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('name') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                        placeholder="Enter name" value="{{ old('name') ?? $page->name }}" name="name" />
                    @error('name')
                        <span class="text-light text-red-300">{{ $message }}</span>
                    @enderror
                </label>
                <label for="description" class="block font-light my-2 text-slate-100">
                    <span class="text-sm font-medium text-gray-200">Description </span>

                    <textarea name="description" id="description" cols="30" rows="5"
                        class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('description') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                        placeholder="Enter description">{{ old('description') ?? $page->description }}</textarea>
                    @error('description')
                        <span class="text-light text-red-300">{{ $message }}</span>
                    @enderror
                </label>

                @if ($page->slug == 'nominees')
                    <label class="inline-flex items-center cursor-pointer font-light my-2 text-slate-100">
                        <span class="mr-3 text-sm font-medium text-gray-300">Visibility</span>
                        <input name="visible" type="checkbox" value="1" class="sr-only peer"
                            @checked($page->visible) id="visible" />
                        <div
                            class="relative w-11 h-6 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-800 rounded-full peer bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all border-gray-600 peer-checked:bg-blue-600">
                        </div>
                    </label>


                    @error('visible')
                        <span class="text-light text-red-300">{{ $message }}</span>
                    @enderror
                @endif


                <input type="hidden" name="slug" id="slug" class="hidden" value="{{ $page->slug }}" />

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

    @if ($page->slug == 'features_1' || $page->slug == 'features_2' || $page->slug == 'features_3')
        <x-editor-script id="description" />
    @endif

@endsection
