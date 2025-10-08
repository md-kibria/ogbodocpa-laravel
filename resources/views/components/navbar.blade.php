<nav id="navbar"
    class="fixed top-0 left-0 w-full z-50 flex items-center justify-between px-2 sm:px-5 md:px-10 py-4 transition-all duration-300 @if (Route::currentRouteName() == 'home') bg-transparent @else bg-blue-300 shadow-md @endif">
    <h1 class="text-2xl text-white">
        <a href="{{ route('home') }}">
            @if ($logo)
                <img src="{{ $logo }}" alt="" class="h-[70px] w-auto">
            @else
                <h1 class="text-2xl font-bold text-slate-600 py-3">Logo</h1>
            @endif
        </a>
    </h1>
    <!-- Hidden checkbox for toggle -->
    <input type="checkbox" id="menu-toggle" class="peer hidden">

    <label for="menu-toggle" id="menu"
        class="inline-block md:hidden text-3xl cursor-pointer @if (Route::currentRouteName() == 'home') text-slate-600 @else text-black @endif">
        <ion-icon class="peer-checked:hidden block" name="reorder-four-outline"></ion-icon>
        <ion-icon class="peer-checked:block hidden" name="close-outline"></ion-icon>
    </label>

    <ul id="nav-links"
        class="peer-checked:flex hidden md:flex items-start md:items-center space-x-6 absolute md:static flex-col md:flex-row gap-3 md:gap-0  md:mt-0 justify-start pt-5 md:pt-0 md:justify-end h-screen md:h-fit w-[300px] @if (Route::currentRouteName() == 'home') bg-slate-100 md:bg-transparent @else bg-slate-100 md:bg-transparent @endif  top-25.5 right-0 -z-40 transition-all px-2 md:px-0">
        <li class="px-3 border-b py-3 w-full md:px-0 md:border-b-0 md:py-0 md:w-auto border-slate-500"><a
                class="nav-link @if (Route::currentRouteName() == 'home') text-slate-400 @else @if (Route::currentRouteName() == 'home') text-slate-400 @else text-slate-600 @endif @endif text-xl hover:text-blue-400 transition-all"
                href="{{ route('home') }}">Home</a></li>
        <li class="px-3 border-b py-3 w-full md:px-0 md:border-b-0 md:py-0 md:w-auto border-slate-500"><a
                class="nav-link @if (Route::currentRouteName() == 'about') text-slate-700 @else @if (Route::currentRouteName() == 'home') text-slate-400 @else text-slate-600 @endif @endif text-xl hover:text-blue-400 transition-all"
                href="{{ route('about') }}">About</a></li>
        <li class="px-3 border-b py-3 w-full md:px-0 md:border-b-0 md:py-0 md:w-auto border-slate-500"><a
                class="nav-link @if (Route::currentRouteName() == 'services') text-slate-700 @else @if (Route::currentRouteName() == 'home') text-slate-400 @else text-slate-600 @endif @endif text-xl hover:text-blue-400 transition-all"
                href="{{ route('services') }}">Services</a></li>
        @if ($is_appointment)
            <li class="px-3 border-b py-3 w-full md:px-0 md:border-b-0 md:py-0 md:w-auto border-slate-500"><a
                    class="nav-link @if (Route::currentRouteName() == 'appointment') text-slate-700 @else @if (Route::currentRouteName() == 'home') text-slate-400 @else text-slate-600 @endif @endif text-xl hover:text-blue-400 transition-all"
                    href="{{ route('appointment') }}">Appointment</a></li>
        @endif
        <li class="px-3 border-b py-3 w-full md:px-0 md:border-b-0 md:py-0 md:w-auto border-slate-500"><a
                class="nav-link @if (Route::currentRouteName() == 'contact') text-slate-700 @else @if (Route::currentRouteName() == 'home') text-slate-400 @else text-slate-600 @endif @endif text-xl hover:text-blue-400 transition-all"
                href="{{ route('contact') }}">Contact</a></li>
        <li class="px-3 border-b py-3 w-full md:px-0 md:border-b-0 md:py-0 md:w-auto border-slate-500"><a
                class="nav-link @if (Route::currentRouteName() == 'resources') text-slate-700 @else @if (Route::currentRouteName() == 'home') text-slate-400 @else text-slate-600 @endif @endif text-xl hover:text-blue-400 transition-all"
                href="{{ route('resources') }}">Resources</a></li>
        <li class="px-3 border-b py-3 w-full md:px-0 md:border-b-0 md:py-0 md:w-auto border-slate-500">
            @guest
                <a class="text-slate-700 md:text-white text-xl py-2 md:px-4 md:bg-blue-500 md:hover:bg-blue-600 rounded-full cursor-pointer transition-all"
                    href="{{ route('login') }}">Login</a>
            @endguest
            @auth
                <a class="text-slate-700 md:text-white text-lg py-2 md:px-4 md:bg-blue-500 md:hover:bg-blue-600 rounded-full cursor-pointer transition-all"
                    href="{{ route('profile') }}">Profile</a>
            @endauth
        </li>
    </ul>
</nav>

@if (Route::currentRouteName() != 'home')
    <div class="h-25"></div>
@else
    <script>
        const navbar = document.getElementById("navbar");
        const menu = document.getElementById("menu");
        const navLinks = document.querySelectorAll(".nav-link");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 250) {
                navbar.classList.add("bg-blue-300", "shadow-md");
                navbar.classList.remove("bg-transparent");

                menu.classList.remove("text-slate-600");
                menu.classList.add("text-black");

                // Change links to black
                navLinks.forEach(link => {
                    link.classList.remove("text-slate-300");
                    link.classList.add("text-slate-700");
                });
            } else {
                navbar.classList.add("bg-transparent");
                navbar.classList.remove("bg-blue-300", "shadow-md");

                menu.classList.add("text-slate-600");
                menu.classList.remove("text-black");

                // Reset links to slate
                navLinks.forEach(link => {
                    link.classList.remove("text-slate-700");
                    link.classList.add("text-slate-300");
                });
            }
        });
    </script>
@endif
