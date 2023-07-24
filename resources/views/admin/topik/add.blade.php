<x-app-layout>
  <x-slot name="header">
    @section('title', ' | Create Topik')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard Tambah Topik') }}
    </h2>
  </x-slot>
  <div class="py-2">
    <div class=" max-w-full mx-auto sm:px-2 lg:px-2">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form action="/add-topik" method="post">
            @csrf
            <div class=" grid grid-cols-1 gap-1">
              <label for="">Nama Topik</label>
              <input type="text" name="nama_topik" class=" py-1 w-1/2 " placeholder=" Contoh : Topik 1">
              <label for="">Judul Topik</label>
              <input type="text" name="judul_topik" class=" py-1 w-1/2 " placeholder=" Contoh : kurikulum Merdeka Balajar">
              <div class=" flex gap-2">
                <button type="submit" class=" bg-blue-700 px-2 py-1 text-white w-fit">Simpan</button>
                <a href="/data-topik" class=" bg-yellow-300 px-2 py-1 text-black w-fit">Kembali</a>
                <button type="reset" class=" bg-red-700 px-2 py-1 text-white w-fit">Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</x-app-layout>