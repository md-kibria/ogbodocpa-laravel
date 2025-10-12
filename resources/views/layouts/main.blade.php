<!DOCTYPE html>
<html lang="en">

<head>
    <x-meta />
    @vite('resources/css/app.css')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    {{-- <link rel="icon" type="image/png" sizes="192x192" href="/web-app-manifest-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="/web-app-manifest-512x512.png"> --}}
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="shortcut icon" href="/favicon.ico">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,200..800;1,6..72,200..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <x-navbar />
    </header>

    <main class="overflow-x-hidden relative">
        @yield('content')
    </main>

    <x-footer />

    <x-flash-message />


    @vite('resources/js/app.js')

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</body>

</html>
