<x-app-layout>
  <x-slot name="header">
    @section('title', ' | LAPORAN PMM')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard Laporan') }}
    </h2>
  </x-slot>

  <div class="py-2">
    <div class=" max-w-full mx-auto sm:px-2 lg:px-2">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 overflow-auto">
          <div>
            @role('super admin')
            <form action="/daftar-laporan" method="post">
              @csrf
              <button class="bg-blue-700 text-white px-2 py-1 text-sm">BUAT PMM</button>
            </form>
            @endrole
          </div>
          <table class=" w-full">
            <thead>
              <tr class=" border mt-2">
                <th rowspan="2" class=" border px-1">No</th>
                <th rowspan="2" class=" border px-1">Topik</th>
                <th rowspan="2" class=" border px-1">Judul Topik</th>

                <th rowspan="2" class=" border px-1">Detail Modul</th>
                <th rowspan="2" class=" border px-1">Total Modul</th>
                <th colspan="3" class=" border px-1">Status</th>
              </tr>
              <tr class=" border mt-2">
                <td class=" border px-2  w-7 ">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="  text-green-700 w-6 h-6 font-semibold">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                  </svg>

                </td>
                <td class=" border px-2  w-7 text-center ">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" text-red-700 font-semibold w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </span>

                </td>
                <th class=" border px-4">Ket</th>
              </tr>

            </thead>
            <tbody>
              @foreach ($dataLap as $item)
              <tr class=" border px-1  text-sm">
                <td class=" text-center border px-1 ">
                  {{$loop->iteration}}

                </td>
                <td class=" text-center border px-1 ">
                  <a href="/laporan-pmm/{{$item->id}}">
                    {{$item->nama_topik}}</a>
                </td>
                <td class=" font-semibold text-red-700 px-1 w-1/4   text-wrap text-left">
                  {{$item->judul_topik}}
                </td>
                <td class=" border  px-1">
                  @foreach($item->Laporan as $lit)

                  @foreach($lit->Laporan as $lits)
                  <ul>
                    <li class=" flex">
                      @if($lit->keterangan == "tuntas")
                      <span class=" font-semibold text-green-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                      </span>
                      @else
                      <span class=" text-red-700"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                      </span>
                      @endif {{$lit->nama_modul}} {{$lits->judul_modul}}
                    </li>
                  </ul>
                  @endforeach
                  @endforeach
                </td>
                <td class=" uppercase  text-center border  px-1">
                  {{$item->Laporan->count()}}
                </td>
                <td class="   text-center border  px-1">
                  <ul>
                    <li>
                      {{ $item->Laporan->where('keterangan', 'tuntas')->count() }}
                    </li>

                  </ul>
                </td>
                <td class="   text-center border  px-1">
                  <ul>
                    <li>
                      {{ $item->Laporan->where('keterangan', 'belum tuntas')->count() }}
                    </li>
                  </ul>
                </td>
                <td class="   text-center border  px-1">

                  @if($item->Laporan->where('keterangan', 'tuntas')->count() === $item->Laporan->count())
                  <span class=" capitalize text-green-700 font-semibold">sudah aksi nyata</span>
                  @else
                  <span class=" capitalize text-red-700 font-semibold">belum aksi nyata</span>
                  @endif

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</x-app-layout>