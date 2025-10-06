<nav class="h-20 bg-transparent backdrop-blur-md right-0 left-0 top-0 z-50 sticky shadow-md">
    <div class="container mx-auto h-full flex items-center justify-between px-5 sm:px-0">
        <a href="{ route('admin.dashboard') }}" class="text-2xl h-full flex items-center">
            {{-- <img class="h-full" src="/logo2.png" alt=""> --}}
            <span class="">
                <div class="flex items-center gap-1">
                    <ion-icon name="construct-outline"></ion-icon>
                    ADMIN
                </div>
            </span>
        </a>

        <ul
            class="nav-items right-full flex gap-4 items-center justify-center lg:justify-end absolute md:static right-0 z-40 flex-col md:flex-row bg-transparent backdrop-blur-md md:bg-transparent top-20 w-96 h-60 md:h-auto">
            <li>
                <a class="font-light hover:text-slate-300 text-xl" href="{{ route('home') }}" target="_blank">
                    <ion-icon name="home-outline"></ion-icon>
                    <p class="inline md:hidden">Home</p>
                </a>
            </li>
            <li>
                <a class="font-light hover:text-slate-300 text-xl" href="{{ route('admin.appointments.index') }}">
                    <ion-icon name="clipboard-outline"></ion-icon>
                    <p class="inline md:hidden">Appointments</p>
                </a>
            </li>
            <li>
                <a class="font-light hover:text-slate-300 text-xl" href="{{ route('admin.services.index') }}">
                    <ion-icon name="layers-outline"></ion-icon>
                    <p class="inline md:hidden">Services</p>
                </a>
            </li>
            <li>
                <a class="font-light hover:text-slate-300 text-xl" href="{{ route('admin.consultains.index') }}">
                    <ion-icon name="people-outline"></ion-icon>
                    <p class="inline md:hidden">Consultains</p>
                </a>
            </li>
            <li class="relative group">
                <a class="h-full" href="{{ route('admin.dashboard') }}">
                    <img class="h-10 w-10 rounded-full ring-1"
                        src="{{ Auth::user()->image ? asset('/storage/' . Auth::user()->image) : asset('/img/profile.png') }}"
                        alt="">
                </a>
                <div
                    class="hidden group-hover:block absolute right-0 top-10 bg-slate-500 text-slate-100 p-1 px-5 rounded-md">
                    <a class="block my-1 hover:text-slate-400" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    <a class="block my-1 hover:text-slate-400" href="{{ route('logout') }}">Logout</a>
                </div>
            </li>
        </ul>
        <div class="flex gap-4 md:hidden">
            <p class="text-3xl md:hidden cursor-pointer" id="nav-menu"><ion-icon name="menu-outline"></ion-icon>
            </p>
        </div>

    </div>
</nav>
