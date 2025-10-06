@extends('layouts.main')

@section('content')
    <section class="min-h-screen bg-slate-900/75 flex flex-col justify-center relative px-2 sm:px-10">
        @if ($header->imageUrl)
            <img src="{{ $header->imageUrl }}" alt=""
                class="absolute top-0 left-0 w-full h-full object-cover opacity-30 -z-10">
        @endif
        <div class="container mx-auto py-20 sm:py-0">
            <span
                class="text-blue-400 text-md sm:text-lg uppercase leading-10 w-full block text-center sm:text-left pb-2 sm:pb-0">{{ $header->sub_title }}</span>
            <h1
                class="text-4xl sm:text-5xl font-semibold text-white leading-10 sm:leading-14 w-full md:max-w-4xl text-center sm:text-left">
                {{ $header->title }}</h1>
            <p class="text-gray-300 w-full md:max-w-3xl py-5 text-center sm:text-left">{{ $header->description }}</p>
            <div class="flex gap-2 py-5 justify-center sm:justify-start">
                <a href="{{ route('contact') }}"
                    class="text-gray-300 border-2 border-slate-300 py-2 px-4 rounded-full hover:text-white hover:bg-blue-500 hover:border-blue-500 transition">Contact
                    Us</a>
                <a href="{{ route('services') }}"
                    class="text-white border-2 border-blue-500 bg-blue-500 hover:text-blue-500 hover:bg-transparent transition-all py-2 px-4 rounded-full flex items-center gap-2 hover:gap-3">Our
                    Services <ion-icon name="arrow-forward-outline" class="mt-1 text-lg"></ion-icon></a>
            </div>
        </div>
    </section>




    @if(count($services_list) !== 0)
    <section class="container mx-auto py-20 px-5 md:px-10 lg:px-22">
        <h2 class="text-3xl font-semibold text-center mb-16 text-slate-600">Our Services</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 gap-10">
            @foreach ($services_list as $item)
                <div class="bg-transparent ">
                    <div class="h-40 w-full overflow-hidden mb-4 rounded-sm">
                        <img src="{{ asset('/storage/' . $item->image) }}" alt=""
                            class="w-full h-40 mx-auto object-cover transform transition-transform duration-500 hover:scale-110">
                    </div>
                    <a href="{{ route('service', $item->slug) }}">
                        <h3 class="text-2xl font-semibold mb-2 text-slate-700 text-left">{{ $item->title }}</h3>
                    </a>
                    <p class="text-gray-600 text-left text-sm">
                        {{ \Illuminate\Support\Str::words(html_entity_decode(strip_tags($item->description)), 20) }}</p>
                    <a href="{{ route('service', $item->slug) }}" aria-label="Learn more about {{ $item->name }}"
                        class="text-blue-500 mt-2 flex items-center gap-1 hover:gap-3 transition-all">
                        Learn more
                        <ion-icon name="arrow-forward-outline" class="mt-1 text-md"></ion-icon>
                    </a>

                </div>
            @endforeach
        </div>
    </section>
    @endif

    <section class="">
        <div class="flex flex-col md:flex-row items-center justify-center gap-10 px-10 py-20 bg-gray-100">
            <div class="relative z-20">
                <img class="w-full h-[400px] md:w-[400px] md:h-[500px] object-cover rounded-4xl z-20"
                    src="{{ $philosophy->imageUrl }}" alt="">
                <div
                    class="border-2 border-dashed border-slate-500 pr-5 pb-5 -pl-5 rounded-[45px] absolute top-5 left-5 -right-5 -bottom-5 -z-10">
                </div>
            </div>
            <div class="text-center sm:text-left">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 text-slate-600 text-center sm:text-left">
                    {{ $philosophy->title }}</h2>
                <p class="text-lg text-gray-500 mb-8 max-w-2xl text-center sm:text-left">
                    {{ $philosophy->description }}
                </p>

                <a class="inline-flex items-center gap-2 rounded-sm border border-blue-400 bg-blue-400 px-8 py-3 text-white hover:bg-transparent hover:text-blue-400 focus:ring-3 focus:outline-hidden transition duration-300"
                    href="{{ route('about') }}">
                    <span class="text-sm font-medium"> Learn More </span>

                    <svg class="size-5 shadow-sm rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <section class="">
        <div class="flex flex-col md:flex-row items-center justify-center gap-10 px-10 py-20">
            <div class="text-center sm:text-left">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 text-slate-600">{{ $appointment->title }}</h2>
                <p class="text-lg text-gray-500 mb-8 max-w-2xl">
                    {{ $appointment->description }}
                </p>

                <a class="inline-flex items-center gap-2 rounded-sm border border-blue-400 bg-blue-400 px-8 py-3 text-white hover:bg-transparent hover:text-blue-400 focus:ring-3 focus:outline-hidden transition duration-300"
                    href="{{ route('appointment') }}">
                    <span class="text-sm font-medium"> Book Now </span>

                    <svg class="size-5 shadow-sm rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
            <div class="w-md bg-slate-50">
                <div
                    class="bg-slate-50 p-6 rounded-t-lg shadow-md hover:shadow-2xl transition-shadow py-10 w-full flex flex-col items-center gap-2">
                    <h3 class="text-2xl flex items-center font-semibold text-slate-700 gap-2"><ion-icon
                            class="text-blue-500 font-bold" name="time-outline"></ion-icon> Hours</h3>
                    <p class="text-slate-600 text-center">{{ $appointment->schedule }}</p>
                </div>
                <div class="bg-slate-50">
                    <div class="border-b border-dashed mx-6 border-slate-500"></div>
                </div>
                <div
                    class="bg-slate-50 p-6 rounded-b-lg shadow-md hover:shadow-2xl transition-shadow py-10 w-full flex flex-col items-center gap-2">
                    <h3 class="text-2xl flex items-center font-semibold text-slate-700 gap-2"><ion-icon
                            class="text-blue-500 font-bold" name="location-outline"></ion-icon> Address</h3>
                    <p class="text-slate-600 text-center w-[194px]">{{ $appointment->address }}</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="w-full min-h-screen flex items-center justify-center rounded-lg p-6 z-20 bg-gray-100">
            <div class="bg-white md:w-3/4 lg:w-3/4 mx-auto rounded-lg shadow-lg p-6 text-gray-400">
                <div class="card-body py-5">
                    <p class="w-1/2 text-center mx-auto"></p>

                    <div class="flex flex-wrap">
                        <form action="{{ route('message.store') }}" method="POST"
                            class="w-full lg:w-1/2 px-5 lg:border-r border-gray-300">
                            @csrf
                            <div class="space-y-4">
                                <b class="text-gray-400 text-sm font-semibold">Available 24/7</b>
                                <h2 class="text-2xl text-gray-600 font-semibold">Get In Touch</h2>
                                <div>
                                    <input type="text" name="name" id="firstNameinput" placeholder="Enter your name"
                                        class="w-full border @error('name') border-red-300 @else border-gray-300 @enderror rounded px-2 py-1.5">
                                    @error('name')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <input type="text" name="email" id="email"
                                        placeholder="Enter your email address"
                                        class="w-full border @error('email') border-red-300 @else border-gray-300 @enderror rounded px-2 py-1.5">
                                    @error('email')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <textarea name="message" id="message" placeholder="Enter your message" cols="30" rows="6"
                                        class="w-full border @error('message') border-red-300 @else border-gray-300 @enderror rounded px-2 py-1.5"></textarea>
                                    @error('message')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <button type="submit"
                                        class="w-full bg-blue-400 hover:bg-blue-300 text-white py-2 rounded cursor-pointer">Submit</button>
                                </div>
                            </div>
                        </form>

                        <div class="w-full lg:w-1/2 px-5 pt-10 lg:pt-0 flex flex-col justify-center space-y-3">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center justify-center border border-gray-500 rounded-full h-9 w-9">
                                    <ion-icon name="location-outline" class="text-2xl text-gray-500"></ion-icon>
                                </div>
                                <div class="flex-grow text-gray-600">
                                    <h3 class="text-xl font-semibold mb-0.5">Location</h3>
                                    <p class="border-b border-gray-300 text-sm pb-0.5">{{ $info->address }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="flex items-center justify-center border border-gray-500 rounded-full h-9 w-9">
                                    <ion-icon name="call-outline" class="text-2xl text-gray-500"></ion-icon>
                                </div>
                                <div class="flex-grow text-gray-600">
                                    <h3 class="text-xl font-semibold mb-0.5">Phone Number</h3>
                                    <a href="tel:{{ $info->phone ? $info->phone : '' }}"
                                        class="block border-b border-gray-300 text-sm pb-0.5 text-gray-600">{{ $info->phone }}</a>
                                </div>
                            </div>

                            {{-- <div class="flex items-center space-x-4">
                                <div class="flex items-center justify-center border border-gray-500 rounded-full h-9 w-9">
                                    <ion-icon name="mail-outline" class="text-2xl text-gray-500"></ion-icon>
                                </div>
                                <div class="flex-grow text-gray-600">
                                    <h3 class="text-xl font-semibold mb-0.5">Email Address</h3>
                                    <a href="mailto:{{ $info->email ? $info->email : '' }}"
                                        class="block border-b border-gray-300 text-sm pb-0.5 text-gray-600">{{ $info->email }}</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
