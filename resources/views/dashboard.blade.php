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
                    @role('super admin')
                    <form action="/dashboard" method="post">
                        @csrf
                        <button class=" hover:bg-blue-900 bg-blue-600 px-2 py-1 text-white capitalize">buat Akun Guru</button>
                    </form>
                    @endrole
                    @role('guru')
                    <span> {{Auth::user()->name}}</span>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-app-layout>