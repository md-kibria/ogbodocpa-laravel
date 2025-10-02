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
    <ul id="nav-links" class="flex items-center space-x-6">
        <li><a class="nav-link @if (Route::currentRouteName() == 'home') text-blue-500 @else text-slate-700 @endif text-lg hover:text-blue-400 transition-all"
                href="{{ route('home') }}">Home</a></li>
        <li><a class="nav-link @if (Route::currentRouteName() == 'about') text-blue-500 @else text-slate-700 @endif text-lg hover:text-blue-400 transition-all"
                href="{{ route('about') }}">About</a></li>
        <li><a class="nav-link @if (Route::currentRouteName() == 'services') text-blue-500 @else text-slate-700 @endif text-lg hover:text-blue-400 transition-all"
                href="{{ route('services') }}">Services</a></li>
        <li><a class="nav-link @if (Route::currentRouteName() == 'home') text-blue-500 @else text-slate-700 @endif text-lg hover:text-blue-400 transition-all"
                href="{{ route('home') }}">Appointment</a></li>
        <li><a class="nav-link @if (Route::currentRouteName() == 'contact') text-blue-500 @else text-slate-700 @endif text-lg hover:text-blue-400 transition-all"
                href="{{ route('contact') }}">Contact</a></li>
        <li><a class="nav-link @if (Route::currentRouteName() == 'resources') text-blue-500 @else text-slate-700 @endif text-lg hover:text-blue-400 transition-all"
                href="{{ route('resources') }}">Resources</a></li>
        <li><a class="text-white text-lg py-2 px-4 bg-blue-500 hover:bg-blue-600 rounded-full cursor-pointer transition-all"
                href="{{ route('home') }}">Login</a></li>
    </ul>
</nav>

@if (Route::currentRouteName() != 'home')
    <div class="h-22"></div>
@else

<script>
    const navbar = document.getElementById("navbar");
    const navLinks = document.querySelectorAll(".nav-link");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 250) {
            navbar.classList.add("bg-white", "shadow-md");
            navbar.classList.remove("bg-transparent");

            // Change links to black
            navLinks.forEach(link => {
                link.classList.remove("text-slate-300");
                link.classList.add("text-slate-700");
            });
        } else {
            navbar.classList.add("bg-transparent");
            navbar.classList.remove("bg-white", "shadow-md");

            // Reset links to slate
            navLinks.forEach(link => {
                link.classList.remove("text-slate-700");
                link.classList.add("text-slate-300");
            });
        }
    });
</script>

@endif