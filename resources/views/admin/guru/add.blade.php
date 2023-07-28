<x-app-layout>
  <x-slot name="header">
    @section('title', ' | Create Topik')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard Tambah Guru') }}
    </h2>
  </x-slot>
  <div class="py-2">
    <div class=" max-w-full mx-auto sm:px-2 lg:px-2">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form action="/data-guru" method="post">
            @csrf
            <div class=" grid grid-cols-1 w-1/2">
              <label for="">NUPTK</label>
              <input type="text" required name="nuptk" class=" py-1  px-1">
              <label for="">Nama Siswa</label>
              <input type="text" required name="nama_guru" class=" py-1  px-2">
              <label for="">Jenis Kelamin</label>
              <select required name="jenis_kelamin" class=" py-1" id="">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="l">Laki</option>
                <option value="p">Perempuan</option>
              </select>
              <div class=" grid grid-cols-2 gap-2">
                <div class="  grid">
                  <label for="">Tempat Lahir</label>
                  <input type="text" required name="tempat_lahir" class=" py-1 px-1">
                </div>
                <div class=" grid">
                  <label for="">Tempat Lahir</label>
                  <input type="date" required name="tanggal_lahir" class=" py-1 px-1">
                </div>
                <button class=" bg-blue-700 text-white py-1 ">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</x-app-layout>