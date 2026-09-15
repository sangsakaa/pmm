<nav x-data="{ open: false }" class="bg-white border-b border-emerald-100 shadow-sm">

    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            {{-- LEFT --}}
            <div class="flex items-center">

                {{-- LOGO --}}
                <div class="shrink-0 flex items-center">

                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3">

                        <img
                            src="{{ asset('img/sma.png') }}"
                            alt="SMA Wahidiyah Kediri"
                            class="h-10 w-10 object-contain">

                        <div class="hidden md:block leading-tight">
                            <div class="font-bold text-emerald-800">
                                PMM
                            </div>

                            <div class="text-[10px] uppercase tracking-wider text-slate-400">
                                SMA Wahidiyah Kediri
                            </div>
                        </div>

                    </a>

                </div>


                {{-- DESKTOP NAVIGATION --}}
                <div class="hidden sm:flex items-center ml-8 gap-1">

                    {{-- DASHBOARD --}}
                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>


                    {{-- SUPER ADMIN --}}
                    @role('superAdmin')

                    <x-nav-link
                        :href="route('data-guru')"
                        :active="request()->routeIs('data-guru')">
                        Data Guru
                    </x-nav-link>

                    <x-nav-link
                        :href="route('data-topik')"
                        :active="request()->routeIs('data-topik')">
                        Topik
                    </x-nav-link>

                    <x-nav-link
                        :href="route('data-modul')"
                        :active="request()->routeIs('data-modul')">
                        Modul
                    </x-nav-link>

                    <x-nav-link
                        :href="route('daftar-laporan')"
                        :active="request()->routeIs('daftar-laporan')">
                        Laporan
                    </x-nav-link>

                    <x-nav-link
                        :href="route('has-role')"
                        :active="request()->routeIs('has-role')">
                        User Management
                    </x-nav-link>

                    @endrole


                    {{-- ADMIN --}}
                    @role('admin')

                    <x-nav-link
                        :href="route('data-guru')"
                        :active="request()->routeIs('data-guru')">
                        Data Guru
                    </x-nav-link>

                    <x-nav-link
                        :href="route('data-topik')"
                        :active="request()->routeIs('data-topik')">
                        Topik
                    </x-nav-link>

                    <x-nav-link
                        :href="route('data-modul')"
                        :active="request()->routeIs('data-modul')">
                        Modul
                    </x-nav-link>

                    <x-nav-link
                        :href="route('daftar-laporan')"
                        :active="request()->routeIs('daftar-laporan')">
                        Laporan
                    </x-nav-link>

                    @endrole


                    {{-- PENGAWAS --}}
                    @role('pengawas')

                    <x-nav-link
                        :href="route('daftar-laporan')"
                        :active="request()->routeIs('daftar-laporan')">
                        Laporan PMM
                    </x-nav-link>

                    @endrole


                    {{-- GURU --}}
                    @role('guru')

                    <x-nav-link
                        :href="route('daftar-laporan')"
                        :active="request()->routeIs('daftar-laporan')">
                        Laporan PMM
                    </x-nav-link>

                    @endrole

                </div>

            </div>


            {{-- RIGHT --}}
            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <x-dropdown align="right" width="56">

                    <x-slot name="trigger">

                        <button
                            class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm font-medium text-slate-600 hover:text-emerald-700 hover:bg-emerald-50 focus:outline-none transition">

                            {{-- USER AVATAR --}}
                            <div class="w-9 h-9 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>

                            <div class="hidden lg:block text-left">

                                <div class="font-semibold text-slate-700">
                                    {{ Auth::user()->name }}
                                </div>

                                <div class="text-xs text-slate-400">

                                    @if(Auth::user()->hasRole('superAdmin'))
                                    Super Administrator

                                    @elseif(Auth::user()->hasRole('admin'))
                                    Administrator

                                    @elseif(Auth::user()->hasRole('pengawas'))
                                    Pengawas

                                    @elseif(Auth::user()->hasRole('guru'))
                                    Guru

                                    @else
                                    Pengguna
                                    @endif

                                </div>

                            </div>

                            <svg
                                class="fill-current h-4 w-4 text-slate-400"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">

                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />

                            </svg>

                        </button>

                    </x-slot>


                    <x-slot name="content">

                        {{-- USER INFO --}}
                        <div class="px-4 py-3 border-b border-slate-100">

                            <div class="font-semibold text-slate-700">
                                {{ Auth::user()->name }}
                            </div>

                            <div class="text-xs text-slate-400 mt-1">
                                {{ Auth::user()->email }}
                            </div>

                            <div class="mt-2">

                                @if(Auth::user()->hasRole('superAdmin'))

                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-emerald-100 text-emerald-700">
                                    Super Administrator
                                </span>

                                @elseif(Auth::user()->hasRole('admin'))

                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-blue-100 text-blue-700">
                                    Administrator
                                </span>

                                @elseif(Auth::user()->hasRole('pengawas'))

                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-amber-100 text-amber-700">
                                    Pengawas
                                </span>

                                @elseif(Auth::user()->hasRole('guru'))

                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-sky-100 text-sky-700">
                                    Guru
                                </span>

                                @else

                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-slate-100 text-slate-600">
                                    Pengguna
                                </span>

                                @endif

                            </div>

                        </div>


                        {{-- LOGOUT --}}
                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="text-red-600 hover:bg-red-50">

                                Keluar

                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>


            {{-- MOBILE HAMBURGER --}}
            <div class="-mr-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-xl text-slate-500 hover:text-emerald-700 hover:bg-emerald-50 focus:outline-none transition">

                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24">

                        <path
                            :class="{'hidden': open, 'inline-flex': ! open}"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path
                            :class="{'hidden': ! open, 'inline-flex': open}"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />

                    </svg>

                </button>

            </div>

        </div>

    </div>


    {{-- MOBILE NAVIGATION --}}
    <div
        :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden border-t border-emerald-100 bg-white">

        <div class="pt-3 pb-3 px-4 space-y-1">

            {{-- DASHBOARD --}}
            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')">

                Dashboard

            </x-responsive-nav-link>


            {{-- SUPER ADMIN --}}
            @role('superAdmin')

            <x-responsive-nav-link
                :href="route('data-guru')"
                :active="request()->routeIs('data-guru')">

                Data Guru

            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('data-topik')"
                :active="request()->routeIs('data-topik')">

                Topik

            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('data-modul')"
                :active="request()->routeIs('data-modul')">

                Modul

            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('daftar-laporan')"
                :active="request()->routeIs('daftar-laporan')">

                Laporan

            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('has-role')"
                :active="request()->routeIs('has-role')">

                User Management

            </x-responsive-nav-link>

            @endrole


            {{-- ADMIN --}}
            @role('admin')

            <x-responsive-nav-link
                :href="route('data-guru')"
                :active="request()->routeIs('data-guru')">

                Data Guru

            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('data-topik')"
                :active="request()->routeIs('data-topik')">

                Topik

            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('data-modul')"
                :active="request()->routeIs('data-modul')">

                Modul

            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('daftar-laporan')"
                :active="request()->routeIs('daftar-laporan')">

                Laporan

            </x-responsive-nav-link>

            @endrole


            {{-- PENGAWAS --}}
            @role('pengawas')

            <x-responsive-nav-link
                :href="route('daftar-laporan')"
                :active="request()->routeIs('daftar-laporan')">

                Laporan PMM

            </x-responsive-nav-link>

            @endrole


            {{-- GURU --}}
            @role('guru')

            <x-responsive-nav-link
                :href="route('daftar-laporan')"
                :active="request()->routeIs('daftar-laporan')">

                Laporan PMM

            </x-responsive-nav-link>

            @endrole

        </div>


        {{-- MOBILE USER --}}
        <div class="pt-4 pb-3 border-t border-emerald-100">

            <div class="px-4 flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                <div>

                    <div class="font-semibold text-slate-700">
                        {{ Auth::user()->name }}
                    </div>

                    <div class="font-medium text-xs text-slate-400">
                        {{ Auth::user()->email }}
                    </div>

                    <div class="mt-1 text-xs font-semibold">

                        @if(Auth::user()->hasRole('superAdmin'))
                        <span class="text-emerald-700">Super Administrator</span>

                        @elseif(Auth::user()->hasRole('admin'))
                        <span class="text-blue-600">Administrator</span>

                        @elseif(Auth::user()->hasRole('pengawas'))
                        <span class="text-amber-600">Pengawas</span>

                        @elseif(Auth::user()->hasRole('guru'))
                        <span class="text-sky-600">Guru</span>

                        @else
                        <span class="text-slate-500">Pengguna</span>
                        @endif

                    </div>

                </div>

            </div>


            {{-- LOGOUT --}}
            <div class="mt-3 px-4">

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">

                        Keluar

                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>

</nav>