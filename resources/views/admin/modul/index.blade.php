<x-app-layout>

  <x-slot name="header">
    @section('title', ' | Modul')

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
      <div>
        <h2 class="text-xl font-bold text-[#214d39]">
          Data Modul
        </h2>
        <p class="text-sm text-gray-500 mt-1">
          Kelola modul pembelajaran PMM
        </p>
      </div>

      <a href="/add-modul"
        class="inline-flex items-center justify-center gap-2
                      px-4 py-2.5 rounded-xl
                      bg-[#2f6b4f] text-white
                      font-semibold text-sm
                      hover:bg-[#214d39]
                      transition shadow-sm">

        <svg xmlns="http://www.w3.org/2000/svg"
          class="w-5 h-5"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 4v16m8-8H4" />
        </svg>

        Tambah Modul
      </a>
    </div>
  </x-slot>


  <div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      {{-- Card --}}
      <div class="bg-white rounded-2xl shadow-sm border border-[#dce9df] overflow-hidden">

        {{-- Header --}}
        <div class="px-6 py-5 border-b border-[#e5eee8] bg-[#f7fbf8]">

          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

            <div>
              <h3 class="text-lg font-bold text-[#214d39]">
                Daftar Modul
              </h3>

              <p class="text-sm text-gray-500 mt-1">
                Daftar modul pembelajaran yang tersedia
              </p>
            </div>

            <div class="px-4 py-2 rounded-xl bg-[#e8f3ec] text-[#2f6b4f] text-sm font-semibold">
              Total: {{ $dataModul->count() }} Modul
            </div>

          </div>

        </div>


        {{-- Table --}}
        <div class="overflow-x-auto">

          <table class="w-full text-sm">

            <thead>
              <tr class="bg-[#eef6f0] text-[#214d39]">

                <th class="px-5 py-4 text-center font-bold whitespace-nowrap">
                  No
                </th>

                <th class="px-5 py-4 text-left font-bold whitespace-nowrap">
                  Nama Modul
                </th>

                <th class="px-5 py-4 text-left font-bold whitespace-nowrap">
                  Judul Modul
                </th>

                <th class="px-5 py-4 text-left font-bold whitespace-nowrap">
                  Topik
                </th>

              </tr>
            </thead>


            <tbody class="divide-y divide-[#e5eee8]">

              @forelse ($dataModul as $item)

              <tr class="hover:bg-[#f7fbf8] transition">

                {{-- No --}}
                <td class="px-5 py-4 text-center">

                  <span class="inline-flex items-center justify-center
                                                     w-8 h-8 rounded-lg
                                                     bg-[#e8f3ec]
                                                     text-[#2f6b4f]
                                                     font-bold">

                    {{ $loop->iteration }}

                  </span>

                </td>


                {{-- Nama Modul --}}
                <td class="px-5 py-4">

                  <span class="inline-flex items-center
                                                     px-3 py-1.5
                                                     rounded-lg
                                                     bg-[#e8f3ec]
                                                     text-[#2f6b4f]
                                                     font-semibold">

                    {{ $item->nama_modul }}

                  </span>

                </td>


                {{-- Judul Modul --}}
                <td class="px-5 py-4">

                  <div class="font-semibold text-gray-800">
                    {{ $item->judul_modul }}
                  </div>

                </td>


                {{-- Topik --}}
                <td class="px-5 py-4">

                  @if($item->topik)
                  <span class="text-gray-600">
                    {{ $item->topik->nama_topik }}
                  </span>
                  @else
                  <span class="text-gray-400 italic">
                    Tidak ada topik
                  </span>
                  @endif

                </td>

              </tr>

              @empty

              <tr>

                <td colspan="4" class="px-5 py-12 text-center">

                  <div class="flex flex-col items-center">

                    <div class="w-16 h-16 rounded-2xl
                                                        bg-[#e8f3ec]
                                                        flex items-center justify-center
                                                        mb-4">

                      <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8 text-[#2f6b4f]"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253" />
                      </svg>

                    </div>

                    <h3 class="text-lg font-bold text-gray-700">
                      Belum Ada Modul
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                      Silakan tambahkan modul pembelajaran.
                    </p>

                    <a href="/add-modul"
                      class="mt-4 px-4 py-2 rounded-xl
                                                      bg-[#2f6b4f] text-white
                                                      font-semibold text-sm
                                                      hover:bg-[#214d39]
                                                      transition">

                      + Tambah Modul

                    </a>

                  </div>

                </td>

              </tr>

              @endforelse

            </tbody>

          </table>

        </div>

      </div>

    </div>
  </div>

</x-app-layout>