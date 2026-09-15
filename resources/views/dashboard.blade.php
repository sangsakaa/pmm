<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-bold text-slate-800">
                    Dashboard
                </h2>
                <p class="text-sm text-slate-500 mt-1">
                    Platform Merdeka Mengajar — SMA Wahidiyah Kediri
                </p>
            </div>

            <div class="hidden sm:flex items-center gap-2">
                <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                <span class="text-sm text-slate-500">Sistem Aktif</span>
            </div>
        </div>
    </x-slot>

    <style>
        .pmm-bg {
            background: #f3f8f4;
            min-height: calc(100vh - 65px);
        }

        .pmm-card {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid #e1ebe4;
            box-shadow: 0 8px 30px rgba(47, 107, 79, 0.06);
        }

        .pmm-primary {
            background: #2f6b4f;
        }

        .pmm-primary-dark {
            background: #214d39;
        }

        .pmm-light {
            background: #e8f3ec;
        }

        .pmm-text {
            color: #2f6b4f;
        }

        .pmm-icon {
            width: 46px;
            height: 46px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: #e8f3ec;
            color: #2f6b4f;
        }
    </style>

    <div class="pmm-bg py-6">

        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">

            {{-- WELCOME --}}
            <div class="pmm-primary rounded-3xl p-6 sm:p-8 text-white mb-6 overflow-hidden relative">

                <div class="relative z-10">

                    <div class="flex items-center gap-3 mb-4">

                        <div class="w-12 h-12 bg-white/15 rounded-2xl flex items-center justify-center backdrop-blur">
                            <img
                                src="{{ asset('img/sma.png') }}"
                                alt="SMA Wahidiyah Kediri"
                                class="w-9 h-9 object-contain">
                        </div>

                        <div>
                            <p class="text-xs uppercase tracking-widest text-white/70">
                                Platform Merdeka Mengajar
                            </p>

                            <p class="font-semibold">
                                SMA Wahidiyah Kediri
                            </p>
                        </div>

                    </div>

                    <h1 class="text-2xl sm:text-3xl font-bold mb-2">
                        Selamat datang, {{ Auth::user()->name }} 👋
                    </h1>

                    <p class="text-white/80 max-w-2xl">
                        Kelola aktivitas pembelajaran, perangkat ajar,
                        modul, dan laporan guru melalui satu platform.
                    </p>

                </div>

                {{-- Decorative --}}
                <div class="absolute -right-16 -top-20 w-64 h-64 rounded-full bg-white/5"></div>
                <div class="absolute right-20 -bottom-32 w-72 h-72 rounded-full bg-white/5"></div>

            </div>


            {{-- ROLE CARD --}}
            @if(Auth::check())

            @if(Auth::user()->hasRole('superAdmin'))

            {{-- SUPER ADMIN --}}
            <div class="pmm-card rounded-2xl p-6 mb-6">

                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">

                    <div class="flex items-center gap-4">

                        <div class="pmm-icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-7a2 2 0 00-2-2H6a2 2 0 00-2 2v7a2 2 0 002 2zm10-11V7a4 4 0 00-8 0v1h8z" />
                            </svg>
                        </div>

                        <div>
                            <h3 class="font-bold text-slate-800">
                                Super Administrator
                            </h3>

                            <p class="text-sm text-slate-500">
                                Anda memiliki akses penuh terhadap sistem PMM.
                            </p>
                        </div>

                    </div>

                    <span class="inline-flex items-center px-4 py-2 rounded-full bg-emerald-50 text-emerald-700 text-sm font-semibold">
                        superAdmin
                    </span>

                </div>

            </div>


            @elseif(Auth::user()->hasRole('admin'))

            {{-- ADMIN --}}
            <div class="pmm-card rounded-2xl p-6 mb-6">

                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">

                    <div class="flex items-center gap-4">

                        <div class="pmm-icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM4 21a8 8 0 0116 0" />
                            </svg>
                        </div>

                        <div>
                            <h3 class="font-bold text-slate-800">
                                Administrator
                            </h3>

                            <p class="text-sm text-slate-500">
                                Kelola data dan aktivitas pembelajaran sekolah.
                            </p>
                        </div>

                    </div>

                    <span class="inline-flex items-center px-4 py-2 rounded-full bg-blue-50 text-blue-700 text-sm font-semibold">
                        admin
                    </span>

                </div>

            </div>


            @elseif(Auth::user()->hasRole('guru'))

            {{-- GURU --}}
            <div class="pmm-card rounded-2xl p-6 mb-6">

                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">

                    <div class="flex items-center gap-4">

                        <div class="pmm-icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M12 14l6.16-3.42A12.08 12.08 0 0118 16.5c0 1.5-2.69 3.5-6 3.5s-6-2-6-3.5c0-2.37 1.84-4.55 4.5-5.73" />
                            </svg>
                        </div>

                        <div>
                            <h3 class="font-bold text-slate-800">
                                Guru
                            </h3>

                            <p class="text-sm text-slate-500">
                                Kelola aktivitas dan laporan pembelajaran Anda.
                            </p>
                        </div>

                    </div>

                    <span class="inline-flex items-center px-4 py-2 rounded-full bg-purple-50 text-purple-700 text-sm font-semibold">
                        guru
                    </span>

                </div>

            </div>


            @else

            {{-- USER UMUM --}}
            <div class="pmm-card rounded-2xl p-6 mb-6">

                <h3 class="font-bold text-slate-800">
                    Selamat datang!
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Anda berhasil masuk ke Platform Merdeka Mengajar.
                </p>

            </div>

            @endif

            @endif


            {{-- QUICK ACCESS --}}
            <div class="mb-4">

                <h3 class="text-lg font-bold text-slate-800">
                    Akses Cepat
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Menu yang dapat Anda akses dari dashboard.
                </p>

            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

                {{-- GURU --}}
                <div class="pmm-card rounded-2xl p-6 hover:shadow-lg transition">

                    <div class="pmm-icon mb-4">

                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M17 20h5v-2a4 4 0 00-4-4h-1" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M9 20H4v-2a4 4 0 014-4h1" />
                            <circle cx="12" cy="7" r="4" stroke-width="1.8" />
                        </svg>

                    </div>

                    <h4 class="font-bold text-slate-800">
                        Data Guru
                    </h4>

                    <p class="text-sm text-slate-500 mt-1">
                        Kelola data guru SMA Wahidiyah Kediri.
                    </p>

                </div>


                {{-- TOPIK --}}
                <div class="pmm-card rounded-2xl p-6 hover:shadow-lg transition">

                    <div class="pmm-icon mb-4">

                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M4 6h16M4 12h16M4 18h10" />
                        </svg>

                    </div>

                    <h4 class="font-bold text-slate-800">
                        Topik Pembelajaran
                    </h4>

                    <p class="text-sm text-slate-500 mt-1">
                        Kelola topik pembelajaran dan materi.
                    </p>

                </div>


                {{-- MODUL --}}
                <div class="pmm-card rounded-2xl p-6 hover:shadow-lg transition">

                    <div class="pmm-icon mb-4">

                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M4 5a2 2 0 012-2h12a2 2 0 012 2v15a2 2 0 01-2 2H6a2 2 0 01-2-2V5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M8 7h8M8 11h8M8 15h5" />
                        </svg>

                    </div>

                    <h4 class="font-bold text-slate-800">
                        Modul
                    </h4>

                    <p class="text-sm text-slate-500 mt-1">
                        Akses dan kelola modul pembelajaran.
                    </p>

                </div>


                {{-- LAPORAN --}}
                <div class="pmm-card rounded-2xl p-6 hover:shadow-lg transition">

                    <div class="pmm-icon mb-4">

                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M4 19V5a2 2 0 012-2h12a2 2 0 012 2v14" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M8 17v-5M12 17V8M16 17v-3" />
                        </svg>

                    </div>

                    <h4 class="font-bold text-slate-800">
                        Laporan
                    </h4>

                    <p class="text-sm text-slate-500 mt-1">
                        Pantau laporan aktivitas pembelajaran.
                    </p>

                </div>

            </div>


            {{-- FOOTER INFO --}}
            <div class="mt-8 text-center">

                <p class="text-xs text-slate-400">
                    PMM — Platform Merdeka Mengajar
                </p>

                <p class="text-xs text-slate-400 mt-1">
                    SMA Wahidiyah Kediri
                </p>

            </div>

        </div>

    </div>

</x-app-layout>