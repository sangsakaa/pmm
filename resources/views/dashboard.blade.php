<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class=" max-w-full mx-auto sm:px-2 lg:px-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p> You're logged in!</p>
                    @if(Auth::check())
                    @if(Auth::user()->hasRole('pengawas'))
                    {{-- Tampilkan konten khusus untuk pengawasan --}}
                    <p>Selamat datang, Pengawasan!</p>
                    @elseif(Auth::user()->hasRole('super admin'))
                    {{-- Tampilkan konten khusus untuk admin --}}

                    <p>Selamat datang, Admin!</p>
                    @elseif(Auth::user()->hasRole('guru'))
                    {{-- Tampilkan konten khusus untuk guru --}}
                    <p>Selamat datang, Guru!</p>
                    @else
                    {{-- Tampilkan konten untuk pengguna umum --}}
                    <p>Selamat datang, Pengguna!</p>
                    @endif
                    @else
                    {{-- Tampilkan pesan untuk pengunjung yang belum login --}}
                    <p>Silakan login untuk mengakses konten.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>