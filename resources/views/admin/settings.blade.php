@extends('layouts.admin')

@section('title', 'Settings')
@section('header', 'Settings')

@section('content')

    <div class="w-full py-2">

        <form class="my-10 p-4 rounded-md border border-slate-700" action="{{ route('admin.settings.update') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-3xl">Site Info</h2>
                <div>
                    {{-- <span class="bg-yellow-500 p-2 px-3 mx-1 rounded-md">
                  Edit
                </span> --}}
                    <button
                        class="rounded shadow-sm sm:text-sm border border-gray-600 bg-blue-300 hover:bg-blue-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3"
                        type="submit">
                        Update
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div class="col-span-2">

                    <div class="flex flex-col my-1">
                        <label for="title" class="font-light my-2 text-slate-100">Title</label>
                        <input
                            class="p-2 px-3 rounded-md bg-transparent ring-1 @error('title') ring-red-300 @else ring-slate-600 @enderror"
                            type="text" id="title" name="title" placeholder="Your title here"
                            value="{{ old('title') ?? $info->title }}">

                        @error('title')
                            <span class="text-light text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col my-1">
                        <label for="logo" class="font-light my-2 text-slate-100">Logo</label>
                        <input
                            class="p-2 px-3 rounded-md bg-transparent ring-1 @error('logo') ring-red-300 @else ring-slate-600 @enderror"
                            type="file" id="logo" name="logo" placeholder="Your logo here" value="">

                        @error('logo')
                            <span class="text-light text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col my-1">
                        <label for="footer_logo" class="font-light my-2 text-slate-100">Footer Logo</label>
                        <input
                            class="p-2 px-3 rounded-md bg-transparent ring-1 @error('footer_logo') ring-red-300 @else ring-slate-600 @enderror"
                            type="file" id="footer_logo" name="footer_logo" placeholder="Your footer_logo here"
                            value="">

                        @error('footer_logo')
                            <span class="text-light text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col my-1">
                        <label for="description" class="font-light my-2 text-slate-100">Description</label>
                        <textarea
                            class="p-2 px-3 rounded-md bg-transparent ring-1 @error('description') ring-red-300 @else ring-slate-600 @enderror"
                            type="text" id="description" rows="3" name="description" placeholder="Your description here">{{ old('description') ?? $info->description }}</textarea>

                        @error('description')
                            <span class="text-light text-red-300">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="py-3"></div>
                    <div class="flex flex-col my-1">
                        <label for="is_appointment" class="font-light my-2 text-slate-100">Appointment Visibility</label>

                        <select name="is_appointment" id="is_appointment"
                            class="p-2 px-3 rounded-md bg-slate-700 ring-1 @error('is_appointment') ring-red-300 @else ring-slate-600 @enderror">
                            <option value="1" @selected($info->is_appointment == 1)>Show</option>
                            <option value="0" @selected($info->is_appointment == 0)>Hide</option>
                        </select>


                        @error('is_appointment')
                            <span class="text-light text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="py-3"></div>

                    <div class="flex flex-col my-1">
                        <label for="email" class="font-light my-2 text-slate-100">Email</label>
                        <input
                            class="p-2 px-3 rounded-md bg-transparent ring-1 @error('email') ring-red-300 @else ring-slate-600 @enderror"
                            type="text" id="email" name="email" placeholder="Your email here"
                            value="{{ old('email') ?? $info->email }}">

                        @error('email')
                            <span class="text-light text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col my-1">
                        <label for="phone" class="font-light my-2 text-slate-100">Phone</label>
                        <input
                            class="p-2 px-3 rounded-md bg-transparent ring-1 @error('phone') ring-red-300 @else ring-slate-600 @enderror"
                            type="text" id="phone" name="phone" placeholder="Your phone here"
                            value="{{ old('phone') ?? $info->phone }}">

                        @error('phone')
                            <span class="text-light text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col my-1">
                        <label for="address" class="font-light my-2 text-slate-100">Address</label>
                        <input
                            class="p-2 px-3 rounded-md bg-transparent ring-1 @error('address') ring-red-300 @else ring-slate-600 @enderror"
                            type="text" id="address" name="address" placeholder="Your address here"
                            value="{{ old('address') ?? $info->address }}">

                        @error('address')
                            <span class="text-light text-red-300">{{ $message }}</span>
                        @enderror
                    </div>




                </div>
                <div class="felx">
                    <label for="title" class="block font-light my-2 text-slate-100">Preview Logo</label>
                    <img class="ring-1 rounded-lg ring-slate-600 w-full" src="{{ asset('/storage/' . $info->logo) }}" />
                    <label for="title" class="block font-light my-2 text-slate-100">Footer Logo</label>
                    <img class="ring-1 rounded-lg ring-slate-600 w-full"
                        src="{{ asset('/storage/' . $info->footer_logo) }}" />
                </div>
            </div>
        </form>

        <form class="my-10 p-4 rounded-md border border-slate-700" action="{{ route('admin.settings.media.update') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-3xl">Social Media</h2>
                <div>
                    {{-- <span class="bg-yellow-500 p-2 px-3 mx-1 rounded-md">
                  Edit
                </span> --}}
                    <button
                        class="rounded shadow-sm sm:text-sm border border-gray-600 bg-blue-300 hover:bg-blue-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3"
                        type="submit">
                        Update
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div class="col-span-3">

                    @foreach ($medias as $media)
                        <div class="flex flex-col my-1">
                            <label for="{{ $media->name }}"
                                class="font-light my-2 text-slate-100 capitalize">{{ $media->name }}</label>
                            <input
                                class="p-2 px-3 rounded-md bg-transparent ring-1 @error($media->name) ring-red-300 @else ring-slate-600 @enderror"
                                type="text" id="{{ $media->name }}" name="{{ $media->name }}"
                                placeholder="Your {{ $media->name }} url here"
                                value="{{ old($media->name) ?? $media->url }}">

                            @error($media->name)
                                <span class="text-light text-red-300">{{ $message }}</span>
                            @enderror
                        </div>
                    @endforeach

                </div>
            </div>
        </form>

    </div>

    <x-editor-script id="ad" />
@endsection
