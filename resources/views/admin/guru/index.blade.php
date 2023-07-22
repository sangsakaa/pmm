<x-app-layout>
  <x-slot name="header">
    @section('title', ' | Data Guru')
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
                <th class=" border px-1">NUPTK</th>
                <th class=" border px-1">Nama</th>
                <th class=" border px-1  capitalize">Jenis Kelamin</th>
                <th class=" border px-1">Tempat Lahir</th>
                <th class=" border px-1">Tanggal Lahir</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dataGuru as $item)
              <tr class=" border text-sm">
                <td class=" text-center border">

                  @if($item->nuptk !== null)
                  {{$item->nuptk}}
                  @else
                  <span class=" text-red-600">
                    Non NUPTK
                  </span>
                  @endif
                </td>
                <td class=" border px-1">
                  {{$item->nama_guru}}
                </td>
                <td class=" border px-1 text-center">
                  {{$item->jenis_kelamin}}
                </td>
                <td class=" uppercase  text-center border px-1">
                  {{$item->tempat_lahir}}
                </td>
                <td class=" border px-1 text-center">

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