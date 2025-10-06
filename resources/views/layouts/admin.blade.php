<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Developer: Kibria (https://github.com/md-kibria) -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css.css">

    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">

    <script src="{{url('/tinymce/tinymce.min.js')}}"></script>

    <x-admin.style />


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{url('/js/alpine.min.js')}}"></script>
    @vite('resources/css/app.css')


    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bgc: '#010922',
                        primary: '#8080D7',
                        sec: '#AAD9D9',
                        nav: '#12165A',
                        black: '#161A30'
                    }
                },
                screen: {
                    'xs': '400px'
                }
            }
        }
    </script>
</head>

<body class="bg-[#010922] text-white relative">

    <x-admin.navbar />

    <div id="p"></div>

    <main class="container mx-auto">

        <div class="grid grid-cols-1 lg:grid-cols-4 py-5 gap-3 min-h-screen">
            <x-admin.sidebar />
            <div class="bg-[#161A30] py-4 px-5 rounded-md col-span-3">
                {{-- <div class="flex"> --}}
                <p class="text-3xl lg:hidden user-menu-btn"><ion-icon name="menu-outline"></ion-icon></p>
                {{-- </div> --}}
                <h1 class="text-3xl border-b border-slate-400 pb-3 mt-2">@yield('header')</h1>

                @yield('content')

            </div>
        </div>

    </main>


    <footer class="container mx-auto mt-4 mb-10 px-0">
        <p class="text-left">&copy; {{ date('Y') }} All rights reserved.</p>
    </footer>

    <x-flash-message />

    <script src="{{url('/js/main.js')}}"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
