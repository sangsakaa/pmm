<x-app-layout>

  <x-slot name="header">
    @section('title', ' | Topik')

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

      <div>
        <h2 class="text-xl font-bold text-[#214d39]">
          Data Topik
        </h2>

        <p class="text-sm text-gray-500 mt-1">
          Kelola topik pembelajaran PMM
        </p>
      </div>

      <a href="/add-topik"
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

        Tambah Topik

      </a>

    </div>
  </x-slot>


  <div class="py-6">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      {{-- Card --}}
      <div class="bg-white rounded-2xl shadow-sm
                        border border-[#dce9df]
                        overflow-hidden">


        {{-- Card Header --}}
        <div class="px-6 py-5
                            bg-[#f7fbf8]
                            border-b border-[#e5eee8]">

          <div class="flex flex-col sm:flex-row
                                sm:items-center sm:justify-between gap-3">

            <div>

              <h3 class="text-lg font-bold text-[#214d39]">
                Daftar Topik
              </h3>

              <p class="text-sm text-gray-500 mt-1">
                Daftar topik pembelajaran yang tersedia
              </p>

            </div>


            {{-- Total --}}
            <div class="px-4 py-2 rounded-xl
                                    bg-[#e8f3ec]
                                    text-[#2f6b4f]
                                    text-sm font-semibold">

              Total:
              {{ $dataTopik->count() }}
              Topik

            </div>

          </div>

        </div>


        {{-- Table --}}
        <div class="overflow-x-auto">

          <table class="w-full text-sm">

            <thead>

              <tr class="bg-[#eef6f0] text-[#214d39]">

                <th class="px-5 py-4
                                           text-center font-bold
                                           whitespace-nowrap">
                  No
                </th>

                <th class="px-5 py-4
                                           text-left font-bold
                                           whitespace-nowrap">
                  Nama Topik
                </th>

                <th class="px-5 py-4
                                           text-left font-bold
                                           whitespace-nowrap">
                  Judul Topik
                </th>

              </tr>

            </thead>


            <tbody class="divide-y divide-[#e5eee8]">

              @forelse ($dataTopik as $item)

              <tr class="hover:bg-[#f7fbf8] transition">


                {{-- No --}}
                <td class="px-5 py-4 text-center">

                  <span class="inline-flex items-center
                                                     justify-center
                                                     w-8 h-8 rounded-lg
                                                     bg-[#e8f3ec]
                                                     text-[#2f6b4f]
                                                     font-bold">

                    {{ $loop->iteration }}

                  </span>

                </td>


                {{-- Nama Topik --}}
                <td class="px-5 py-4">

                  <div class="flex items-center gap-3">

                    <div class="w-10 h-10
                                                        rounded-xl
                                                        bg-[#e8f3ec]
                                                        flex items-center
                                                        justify-center
                                                        flex-shrink-0">

                      <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-[#2f6b4f]"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18s-3.332-.477-4.5 1.253" />
                      </svg>

                    </div>


                    <div>

                      <div class="font-bold text-gray-800">
                        {{ $item->nama_topik }}
                      </div>

                    </div>

                  </div>

                </td>


                {{-- Judul Topik --}}
                <td class="px-5 py-4">

                  <div class="text-gray-600">
                    {{ $item->judul_topik }}
                  </div>

                </td>

              </tr>


              @empty

              {{-- Empty State --}}
              <tr>

                <td colspan="3"
                  class="px-5 py-14 text-center">

                  <div class="flex flex-col
                                                    items-center">

                    <div class="w-16 h-16
                                                        rounded-2xl
                                                        bg-[#e8f3ec]
                                                        flex items-center
                                                        justify-center
                                                        mb-4">

                      <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8 text-[#2f6b4f]"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18s-3.332-.477-4.5-1.253" />
                      </svg>

                    </div>


                    <h3 class="text-lg
                                                       font-bold
                                                       text-gray-700">

                      Belum Ada Topik

                    </h3>


                    <p class="text-sm
                                                      text-gray-500 mt-1">

                      Silakan tambahkan topik
                      pembelajaran terlebih dahulu.

                    </p>


                    <a href="/add-topik"
                      class="mt-4 px-4 py-2
                                                      rounded-xl
                                                      bg-[#2f6b4f]
                                                      text-white
                                                      font-semibold
                                                      text-sm
                                                      hover:bg-[#214d39]
                                                      transition">

                      + Tambah Topik

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