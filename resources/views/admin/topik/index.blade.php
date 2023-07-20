<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard Topik') }}
    </h2>
  </x-slot>

  <div class="py-2">
    <div class=" max-w-full mx-auto sm:px-2 lg:px-2">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class=" w-full">
            <thead>
              <tr class=" border">
                <th class=" border">No</th>
                <th class=" border">Nama Topik</th>
                <th class=" border">Judul Topik</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dataTopik as $item)
              <tr class=" border">
                <td class=" text-center border">
                  {{$loop->iteration}}
                </td>
                <td class=" text-center border">
                  {{$item->nama_topik}}
                </td>
                <td class=" border">
                  {{$item->judul_topik}}
                </td>

              </tr>
              @endforeach
            </tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</x-app-layout>