@extends('layouts.main')

@section('title', $title)
@section('description', $description)

{{-- title, description, content(optional), count(optional) --}}
@section('content')

    <section class="min-h-screen relative py-15 flex flex-col items-center about-page">

        <div
            class="h-[450px] w-[calc(100%+100px)] bg-blue-100 absolute -top-20 -left-10 z-10 flex flex-col items-center justify-center rotate-[-5deg]">
        </div>

        <div class="flex flex-col items-center z-20 pt-5 pb-7">
            <h1 class="text-4xl font-bold text-slate-600 text-center pb-3">{{ $title }}</h1>
            <p class="text-slate-400 text-center w-[80%] md:w-[60%] xl:w-[50%] mx-auto min-w-44">{{ $description }}</p>
        </div>

        @if (isset($content))
            <div class="w-full md:w-3/4 lg:w-3/4 rounded-lg shadow-lg p-6 z-20">
                <div class="bg-white w-full rounded-lg shadow-lg p-6 text-gray-700 no-tailwind">
                    <div class="">
                        {!! $content !!}
                    </div>
                </div>
            </div>
        @else
            @if (isset($count))
                <div class="z-20 container mx-auto px-4 py-4 md:px-0 w-full md:w-3/4 lg:w-3/4">
                    {{-- items grid --}}

                    @if (isset($count) && $count == 0)
                        <div class="flex items-center justify-center w-full min-h-[40vh]">
                            <span class="text-slate-500">No items found!</span>
                        </div>
                    @endif
                    {{ $slot }}
                </div>
            @else
                <div class="w-full md:w-3/4 lg:w-3/4 rounded-lg shadow-lg p-6 z-20">
                    <div class="bg-white w-full rounded-lg shadow-lg p-6 text-gray-700">
                        {{$slot}}
                    </div>
                </div>
            @endif
        @endif

    </section>
@endsection
