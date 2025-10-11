@extends('layouts.main')

@section('content')
    <section class="min-h-screen bg-slate-900/70 flex flex-col justify-center relative px-2 sm:px-10">
        @if ($header->imageUrl)
            <img src="{{ $header->imageUrl }}" alt="{{ $header->title }}"
                class="absolute top-0 left-0 w-full h-full object-cover opacity-100 -z-10">
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



    <section class="container mx-auto -mt-40 py-20 px-5 md:px-10 lg:px-22 relative">
        <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 gap-10">
            @foreach ([$features_1, $features_2, $features_3] as $item)
                <div class="bg-transparent ">
                    <div class="h-56 w-full overflow-hidden mb-4 rounded-sm">
                        @if ($item->image)
                            <img src="{{ asset('/storage/' . $item->image) }}" alt="{{ $item->title }}"
                                class="w-full h-56 mx-auto object-cover transform transition-transform duration-500 hover:scale-110">
                        @endif
                    </div>
                    <h3 class="text-2xl font-semibold mb-2 text-slate-700 text-left">{{ $item->title }}</h3>
                    <p class="text-gray-600 text-left text-sm">
                        {{ \Illuminate\Support\Str::words(html_entity_decode(strip_tags($item->description)), 20) }}</p>

                </div>
            @endforeach
        </div>
    </section>

    <section class="">
        <div class="flex flex-col md:flex-row items-center justify-center gap-10 px-10 py-20 bg-gray-100">
            <div class="relative z-20">
                <img class="w-full h-[400px] md:w-[400px] md:h-[500px] object-cover rounded-4xl z-20"
                    src="{{ $about->imageUrl }}" alt="{{ $about->title }}">
                <div
                    class="border-2 border-dashed border-slate-500 pr-5 pb-5 -pl-5 rounded-[45px] absolute top-5 left-5 -right-5 -bottom-5 -z-10">
                </div>
            </div>
            <div class="text-center sm:text-left">
                <h2 class="text-4xl md:text-5xl font-bold max-w-2xl mb-4 text-slate-600 text-center sm:text-left">
                    {{ $about->title }}</h2>
                <p class="text-lg text-gray-500 mb-8 max-w-2xl text-center sm:text-left">
                    {{ $about->description }}
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

    @if (count($services) !== 0)
        <section class="container mx-auto py-20 px-5 md:px-10 lg:px-22">
            {{-- <h2 class="text-3xl md:text-4xl font-semibold text-left md:mb-10 text-blue-400 uppercase">What We Do</h2>
            <!-- mb-16 -->
            <div class="flex justify-center md:justify-end pb-10 md:pb-3">
                <a href="{{ route('services') }}" aria-label="Learn more about {{ $item->name }}"
                    class="text-indigo-500 mt-2 flex items-center gap-1 hover:gap-3 transition-all">
                    View All Services
                    <ion-icon name="arrow-forward-outline" class="mt-1 text-md"></ion-icon>
                </a>
            </div> --}}

            <div class="flex items-start justify-start mb-10 flex-col">
                <h2 class="text-3xl md:text-4xl font-semibold text-left text-blue-400 uppercase">What We Do</h2>
                <a href="{{ route('services') }}" aria-label="Learn more about {{ $item->name }}"
                    class="text-indigo-500 flex items-center gap-1 hover:gap-3 transition-all">
                    View All Services
                    <ion-icon name="arrow-forward-outline" class="mt-1 text-md"></ion-icon>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 gap-10">
                @foreach ($services as $item)
                    <div class="bg-transparent ">
                        <div class="h-40 w-full overflow-hidden mb-4 rounded-sm">
                            <img src="{{ asset('/storage/' . $item->image) }}" alt="{{ $item->title }}"
                                class="w-full h-40 mx-auto object-cover transform transition-transform duration-500 hover:scale-110">
                        </div>
                        <a href="{{ route('service', $item->slug) }}">
                            <h3 class="text-2xl font-semibold mb-2 text-slate-700 text-left">{{ $item->title }}</h3>
                        </a>
                        <p class="text-gray-600 text-left text-sm">
                            {{ \Illuminate\Support\Str::words(html_entity_decode(strip_tags($item->description)), 20) }}
                        </p>
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

    <div class="relative bg-blue-500/60 h-[400px] flex items-center justify-center">
        <img src="{{ asset('/storage/' . $philosophy->image) }}" alt="{{ $philosophy->title }}"
            class="absolute top-0 left-0 w-full h-full object-cover opacity-100 -z-10">
        <div class="container mx-auto text-white flex flex-col md:flex-row items-center justify-center">
            <div class="text-center">
                <h2 class="text-4xl font-bold mb-6 uppercase">{{ $philosophy->title }}</h2>
                <p class="mb-4 text-2xl">{{ $philosophy->description }}</p>
            </div>
        </div>
    </div>

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
                    <p class="text-slate-600 text-center">{{ $info->business_hours }}</p>
                </div>
                <div class="bg-slate-50">
                    <div class="border-b border-dashed mx-6 border-slate-500"></div>
                </div>
                <div
                    class="bg-slate-50 p-6 rounded-b-lg shadow-md hover:shadow-2xl transition-shadow py-10 w-full flex flex-col items-center gap-2">
                    <h3 class="text-2xl flex items-center font-semibold text-slate-700 gap-2"><ion-icon
                            class="text-blue-500 font-bold" name="location-outline"></ion-icon> Address</h3>
                    <p class="text-slate-600 text-center w-[194px]">{{ $info->address }}</p>
                    <p class="text-slate-600 text-center w-[194px]">Phone: {{ $info->phone }} <br/> Fax: {{ $info->fax }} </p>
                </div>
            </div>
        </div>
    </section>

    @if (count($partners) !== 0)
        <section class="bg-gray-200">
            <div class="container mx-auto py-20 px-5 md:px-10 lg:px-22">

                <div class="flex items-start justify-start mb-10 flex-col">
                    <h2 class="text-3xl md:text-4xl font-semibold text-left text-blue-400 uppercase">our partners</h2>
                    {{-- <a href="{{ route('services') }}" aria-label="Learn more about {{ $item->name }}"
                        class="text-indigo-500 flex items-center gap-1 hover:gap-3 transition-all">
                        View All Services
                        <ion-icon name="arrow-forward-outline" class="mt-1 text-md"></ion-icon>
                    </a> --}}
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 gap-10">
                    @foreach ($partners as $item)
                        @if ($item->url)
                            <a href="{{ $item->url }}" target="_blank"
                                class="h-46 w-full overflow-hidden rounded-md">
                                <img src="{{ asset('/storage/' . $item->logo) }}" alt="{{ $item->name }}"
                                    class="h-full w-full object-cover transform transition-transform duration-500 hover:scale-110 rounded-md">
                            </a>
                        @else
                            <div class="h-46 w-full overflow-hidden rounded-md">
                                <img src="{{ asset('/storage/' . $item->logo) }}" alt="{{ $item->name }}"
                                    class="h-full w-full object-cover transform transition-transform duration-500 hover:scale-110 rounded-md">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
