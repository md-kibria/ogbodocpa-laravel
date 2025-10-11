<div class="bg-slate-700 py-3 px-5 rounded-md absolute lg:static z-40  user-menu hidden lg:block">

    <p class="text-2xl absolute right-2 top-2 z-50 hover:text-red-500 user-menu-close">
        <ion-icon name="close-circle-outline"></ion-icon>
    </p>

    <h2 class="text-2xl py-2 border-b border-slate-400 mb-4 pb-3">Welcome, {{ Auth::user()->first_name }}!</h2>

    <ul>
        <li>
            <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.dashboard') bg-slate-600 text-green-300 @endif"
                href="{{ route('admin.dashboard') }}">
                <p class="text-2xl"><ion-icon class="my-auto block" name="grid-outline"></ion-icon></p>
                <p>Dashboard</p>
            </a>
        </li>
        <li>
            <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.services.index') bg-slate-600 text-green-300 @endif"
                href="{{ route('admin.services.index') }}">
                <p class="text-2xl my-auto block"><ion-icon class="my-auto block" name="layers-outline"></ion-icon>
                </p>
                <p>Services</p>
            </a>
        </li>
        <li>
            <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.resources.index') bg-slate-600 text-green-300 @endif"
                href="{{ route('admin.resources.index') }}">
                <p class="text-2xl my-auto block"><ion-icon class="my-auto block" name="library-outline"></ion-icon>
                </p>
                <p>Resources</p>
            </a>
        </li>
        <li>
            <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.appointments.index') bg-slate-600 text-green-300 @endif"
                href="{{ route('admin.appointments.index') }}">
                <p class="text-2xl my-auto block"><ion-icon class="my-auto block" name="clipboard-outline"></ion-icon></p>
                <p>Appointments</p>
            </a>
        </li>
        <li>
            <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.consultains.index') bg-slate-600 text-green-300 @endif"
                href="{{ route('admin.consultains.index') }}">
                <p class="text-2xl my-auto block"><ion-icon class="my-auto block" name="school-outline"></ion-icon></p>
                <p>Consultants</p>
            </a>
        </li>
        <li>
            <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.partners.index') bg-slate-600 text-green-300 @endif"
                href="{{ route('admin.partners.index') }}">
                <p class="text-2xl my-auto block"><ion-icon class="my-auto block" name="ribbon-outline"></ion-icon></p>
                <p>Partners</p>
            </a>
        </li>

        <li>
            <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.home') bg-slate-600 text-green-300 @endif"
                href="{{ route('admin.home') }}">
                <p class="text-2xl"><ion-icon class="my-auto block" name="planet-outline"></ion-icon>
                </p>
                <p>Home Page</p>
            </a>
        </li>
        <li x-data="{ open: false }" @click="open = !open" class="cursor-pointer">
            <a
                class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.pages' || Route::currentRouteName() == 'admin.pages') bg-slate-600 text-green-300 @endif">
                <p class="text-2xl"><ion-icon class="my-auto block" name="document-text-outline"></ion-icon></p>
                <p>Other Pages</p>
                <p x-show="!open" class="ml-auto mt-1 font-bold text-lg pr-2 transition-all"><ion-icon name="chevron-down-outline"></ion-icon></p>
                <p x-show="open" class="ml-auto mt-1 font-bold text-lg pr-2 transition-all"><ion-icon name="chevron-up-outline"></ion-icon></p>
                
            </a>

            <ul x-show="open" x-transition class="pl-4">
                <li>
                    <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4"
                        href="{{ route('admin.about') }}">
                        <p class="text-2xl"><ion-icon class="my-auto block" name="at-outline"></ion-icon></p>
                        <p>About Page</p>
                    </a>
                </li>


                <li>
                    <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4"
                        href="{{ route('admin.pages', 'services') }}">
                        <p class="text-2xl"><ion-icon class="my-auto block" name="at-outline"></ion-icon></p>
                        <p>Services Page</p>
                    </a>
                </li>
                <li>
                    <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4"
                        href="{{ route('admin.pages', 'resources') }}">
                        <p class="text-2xl"><ion-icon class="my-auto block" name="at-outline"></ion-icon></p>
                        <p>Resources Page</p>
                    </a>
                </li>
                <li>
                    <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4"
                        href="{{ route('admin.pages', 'appointment') }}">
                        <p class="text-2xl"><ion-icon class="my-auto block" name="at-outline"></ion-icon></p>
                        <p>Appointment Page</p>
                    </a>
                </li>

                <li>
                    <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4"
                        href="{{ route('admin.pages', 'contact') }}">
                        <p class="text-2xl"><ion-icon class="my-auto block" name="at-outline"></ion-icon></p>
                        <p>Contact Page</p>
                    </a>
                </li>
            </ul>
        </li>


       
        <li>
            <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.members') bg-slate-600 text-green-300 @endif"
                href="{{ route('admin.users') }}">
                <p class="text-2xl"><ion-icon class="my-auto block" name="people-outline"></ion-icon>
                </p>
                <p>Users</p>
            </a>
        </li>
        <li>
            <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.admins') bg-slate-600 text-green-300 @endif"
                href="{{ route('admin.admins') }}">
                <p class="text-2xl"><ion-icon class="my-auto block" name="construct-outline"></ion-icon>
                </p>
                <p>Admins</p>
            </a>
        </li>
        <li>
            <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.messages') bg-slate-600 text-green-300 @endif"
                href="{{ route('admin.messages') }}">
                <p class="text-2xl"><ion-icon class="my-auto block" name="mail-unread-outline"></ion-icon>
                </p>
                <p>Messages</p>
            </a>
        </li>
        <li>
            <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.profile') bg-slate-600 text-green-300 @endif"
                href="{{ route('admin.profile') }}">
                <p class="text-2xl"><ion-icon class="my-auto block" name="person-outline"></ion-icon>
                </p>
                <p>Profile</p>
            </a>
        </li>
        <li>
            <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.profile.password') bg-slate-600 text-green-300 @endif"
                href="{{ route('admin.profile.password') }}">
                <p class="text-2xl"><ion-icon class="my-auto block" name="lock-closed-outline"></ion-icon></p>
                <p>Password</p>
            </a>
        </li>
        <li>
            <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 text-blue-300 @if (Route::currentRouteName() == 'admin.settings') bg-slate-600 text-green-300 @endif"
                href="{{ route('admin.settings') }}">
                <p class="text-2xl my-auto block"><ion-icon class="my-auto block" name="settings-outline"></ion-icon>
                </p>
                <p>Settings</p>
                <div class="grow h-full pr-2">
                    <div class="bg-blue-300 h-2 w-2 rounded block ml-auto my-auto"></div>
                </div>
            </a>
        </li>
        <li>
            <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'logout') bg-slate-600 text-green-300 @endif"
                href="{{ route('logout') }}">
                <p class="text-2xl"><ion-icon class="my-auto block" name="arrow-back-circle-outline"></ion-icon></p>
                <p>Logout</p>
            </a>
        </li>
    </ul>

</div>
