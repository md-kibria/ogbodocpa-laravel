@extends('layouts.main')

@section('content')

    <body class="bg-gray-50">
        <!-- 404 Content -->
        <main class="max-w-7xl mx-auto px-4 py-24">
            <div class="text-center">
                <h1 class="text-7xl font-bold text-gray-900 mb-4">404</h1>
                <h2 class="text-3xl font-semibold text-gray-700 mb-4">Page Not Found</h2>
                <p class="text-gray-600 mb-8">The page you're looking for doesn't exist or has been moved.</p>

                <div class="grid sm:grid-cols-2 w-full sm:w-[350px] mx-auto gap-4 justify-center">
                    <a href="{{ route('home') }}"
                        class="bg-blue-600 text-white px-6 py-3 rounded font-semibold hover:bg-blue-700 transition">
                        Back to Home
                    </a>
                    <a href="{{ route('services') }}"
                        class="border border-blue-600 text-blue-600 px-6 py-3 rounded font-semibold hover:bg-blue-50 transition">
                        Services
                    </a>
                </div>
            </div>
        </main>
    </body>
@endsection
