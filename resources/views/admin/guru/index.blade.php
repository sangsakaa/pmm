<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-2">
    <div class=" max-w-full mx-auto sm:px-2 lg:px-2">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 overflow-auto">
          <table class=" w-full">
            <thead>
              <tr class=" border">
                <th class=" border">NUPTK</th>
                <th class=" border">Nama</th>
                <th class=" border  capitalize">Jenis Kelamin</th>
                <th class=" border">Tempat Lahir</th>
                <th class=" border">Tanggal Lahir</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dataGuru as $item)
              <tr class=" border">
                <td class=" border">
                  {{$item->nuptk}}
                </td>
                <td class=" border">
                  {{$item->nama_guru}}
                </td>
                <td class=" border text-center">
                  {{$item->jenis_kelamin}}
                </td>
                <td class=" uppercase  text-center border">
                  {{$item->tempat_lahir}}
                </td>
                <td class=" border text-center">

                  {{ \Carbon\Carbon::parse($item->tanggal_lahir)->isoFormat(' DD MMMM Y') }}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</x-app-layout>