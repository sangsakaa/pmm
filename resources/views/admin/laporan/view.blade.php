<x-app-layout>
  <x-slot name="header">
    @section('title', ' | LAPORAN PMM')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard Laporan PMM - ')  . $title->nama_topik .' - '. $title->judul_topik}}
    </h2>
  </x-slot>
  <div class="py-2">
    <div class=" max-w-full mx-auto sm:px-2 lg:px-2">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 overflow-auto">

          <div class=" grid grid-cols-2">
            <div> Nama Topik</div>
            <div> : {{$title->nama_topik}}</div>
            <div> Judul Topik</div>
            <div> : {{$title->judul_topik}}</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="py-2">
    <div class=" max-w-full mx-auto sm:px-2 lg:px-2">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 overflow-auto">
          <form action="/laporan-pmm/{{$laporan->id}}" method="post">
            @csrf
            <div>
              <button class="bg-purple-500 text-white px-2 py-1 text-sm">Simpan Lap PMM</button>
              <a href="/daftar-laporan" class="bg-purple-500 text-white px-2 py-1 text-sm">Kembali</a>
            </div>
            <input hidden type="text" name="laporan_id" value="{{$laporan->id}}">

            <table class=" mt-2 w-full">
              <thead>
                <tr class=" border mt-2">
                  <th class=" border px-1">No</th>
                  <th class=" border px-1">Nama Modul</th>
                  <th class=" border px-1">Judul Modul</th>
                  <th class=" border px-1">Keterangan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dataModel as $item)
                <input hidden type="text" name="modul_id[]" value="{{$item->id}}">
                <tr class=" border text-sm">
                  <td class=" text-center border">
                    {{$loop->iteration}}
                  </td>
                  <td class=" border text-center px-1">
                    {{$item->nama_modul}}
                  </td>
                  <td class=" border px-1">
                    {{$item->judul_modul}}

                  </td>

                  <td class=" border px-1">
                    <select name="keterangan[{{$item->id}}]" id="" class="py-1 w-full px-1">
                      <option value="belum tuntas" {{ $item->keterangan === "belum tuntas" || $item->keterangan === null ? 'selected' : '' }}>Belum Tuntas</option>
                      <option value="tuntas" {{ $item->keterangan === "tuntas" ? 'selected' : '' }} class="{{ $item->keterangan === 'tuntas' ? 'text-green-700' : 'text-red-700' }}">Tuntas</option>
                    </select>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
</x-app-layout>