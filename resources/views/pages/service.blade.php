@extends('layouts.main')

@section('title', $service->title)
@section('description', $service->content)

@section('content')
    <div
        class="h-[450px] w-[calc(100%+100px)] bg-slate-100 absolute -top-20 -left-10 -z-10 flex flex-col items-center justify-center rotate-[-5deg]">
    </div>
    <section class="container mx-auto min-h-screen relative py-15 flex flex-col justify-center items-center">

        <div class="mt-10 w-full max-w-4xl mx-auto bg-white rounded shadow-md overflow-hidden">
            {{-- <div class="w-full h-44 bg-amber-400">asdf --}}
            <img src="{{ asset('/storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-96 object-cover">
            {{-- </div> --}}
            <div class="p-6">
                <h2 class="text-3xl font-semibold text-gray-800 mb-4">{{ $service->title }}</h2>
                {{-- <div class="text-gray-500 text-sm flex gap-3 mb-6 notranslate">
                   
                    <p class="flex gap-1"><ion-icon name="calendar-outline" class="block my-auto"></ion-icon> <span
                            class="font-medium">{{ $service->created_at->format('d F, Y') }}</span></p>
                </div> --}}
                <div class="text-gray-700 leading-relaxed no-tailwind">
                    {!! $service->description !!}
                </div>




            </div>
        </div>

    </section>
@endsection
