<nav id="navbar"
    class="fixed top-0 left-0 w-full z-50 flex items-center justify-between px-10 py-7 transition-all duration-300 @if (Route::currentRouteName() == 'home') bg-transparent @else bg-white shadow-md @endif">
    <h1 class="text-2xl text-white">
        <a href="{{ route('home') }}">
            @if ($logo)
                <img src="{{ $logo }}" alt="" class="h-[60px] w-auto">
            @else
                <h1 class="text-2xl font-bold text-slate-600">Logo</h1>
            @endif
        </a>
    </h1>
    <!-- Hidden checkbox for toggle -->
    <input type="checkbox" id="menu-toggle" class="peer hidden">

    <label for="menu-toggle" id="menu"
        class="inline-block md:hidden text-3xl cursor-pointer @if (Route::currentRouteName() == 'home') text-slate-400 @else text-black @endif"><ion-icon
            name="reorder-four-outline"></ion-icon></label>

    <ul id="nav-links"
        class="peer-checked:flex hidden md:flex items-center space-x-6 absolute md:static flex-col md:flex-row gap-6 md:gap-0 -mt-22 md:mt-0 justify-center md:justify-end h-screen md:h-fit w-full @if (Route::currentRouteName() == 'home') bg-white md:bg-transparent @else bg-white @endif  top-22 left-0 -z-40 transition-all">
        <li><a class="nav-link @if (Route::currentRouteName() == 'home') text-blue-300 @else text-slate-400 @endif text-lg hover:text-blue-400 transition-all"
                href="{{ route('home') }}">Home</a></li>
        <li><a class="nav-link @if (Route::currentRouteName() == 'about') text-blue-300 @else text-slate-400 @endif text-lg hover:text-blue-400 transition-all"
                href="{{ route('about') }}">About</a></li>
        <li><a class="nav-link @if (Route::currentRouteName() == 'services') text-blue-300 @else text-slate-400 @endif text-lg hover:text-blue-400 transition-all"
                href="{{ route('services') }}">Services</a></li>
        @if ($is_appointment)
            <li><a class="nav-link @if (Route::currentRouteName() == 'appointment') text-blue-300 @else text-slate-400 @endif text-lg hover:text-blue-400 transition-all"
                    href="{{ route('appointment') }}">Appointment</a></li>
        @endif
        <li><a class="nav-link @if (Route::currentRouteName() == 'contact') text-blue-300 @else text-slate-400 @endif text-lg hover:text-blue-400 transition-all"
                href="{{ route('contact') }}">Contact</a></li>
        <li><a class="nav-link @if (Route::currentRouteName() == 'resources') text-blue-300 @else text-slate-400 @endif text-lg hover:text-blue-400 transition-all"
                href="{{ route('resources') }}">Resources</a></li>
        <li>
            @guest
                <a class="text-white text-lg py-2 px-4 -ml-6 md:ml-0 bg-blue-500 hover:bg-blue-600 rounded-full cursor-pointer transition-all"
                    href="{{ route('home') }}">Login</a>
            @endguest
            @auth
                <a class="text-white text-lg py-2 px-4 -ml-6 md:ml-0 bg-blue-500 hover:bg-blue-600 rounded-full cursor-pointer transition-all"
                    href="{{ route('profile') }}">Profile</a>
            @endauth
        </li>
    </ul>
</nav>

@if (Route::currentRouteName() != 'home')
    <div class="h-22"></div>
@else
    <script>
        const navbar = document.getElementById("navbar");
        const menu = document.getElementById("menu");
        const navLinks = document.querySelectorAll(".nav-link");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 250) {
                navbar.classList.add("bg-white", "shadow-md");
                navbar.classList.remove("bg-transparent");

                menu.classList.remove("text-slate-400");
                menu.classList.add("text-black");

                // Change links to black
                navLinks.forEach(link => {
                    link.classList.remove("text-slate-300");
                    link.classList.add("text-slate-700");
                });
            } else {
                navbar.classList.add("bg-transparent");
                navbar.classList.remove("bg-white", "shadow-md");

                menu.classList.add("text-slate-400");
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
