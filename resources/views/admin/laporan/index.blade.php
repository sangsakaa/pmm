<x-app-layout>

  <x-slot name="header">

    @section('title', ' | Laporan PMM')

    <div>
      <h2 class="text-xl font-bold text-[#214d39]">
        Laporan PMM
      </h2>

      <p class="text-sm text-gray-500 mt-1">
        Monitoring dan perkembangan PMM
      </p>
    </div>

  </x-slot>


  {{-- =========================================================
        PRINT STYLE
    ========================================================== --}}

  <style>
    @media print {

      body * {
        visibility: hidden;
      }

      #blanko,
      #blanko * {
        visibility: visible;
      }

      #blanko {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
      }

      .no-print {
        display: none !important;
      }

      table {
        width: 100% !important;
        border-collapse: collapse !important;
      }

      th,
      td {
        border: 1px solid #000 !important;
        color: #000 !important;
      }

      .print-hidden {
        display: none !important;
      }
    }
  </style>


  <div class="py-6">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


      {{-- =====================================================
                ALERT SUCCESS / ERROR
            ====================================================== --}}

      @if(session('success'))

      <div class="mb-5 rounded-xl border border-[#cce5d2] bg-[#e8f3ec] px-4 py-3 text-sm text-[#287044]">
        <div class="flex items-center gap-2">

          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5 shrink-0"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M5 13l4 4L19 7" />

          </svg>

          <span>
            {{ session('success') }}
          </span>

        </div>
      </div>

      @endif


      @if(session('error'))

      <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-600">
        <div class="flex items-center gap-2">

          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5 shrink-0"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 9v2m0 4h.01M5.07 19h13.86a2 2 0 001.73-3L13.73 4a2 2 0 00-3.46 0L3.34 16a2 2 0 001.73 3z" />

          </svg>

          <span>
            {{ session('error') }}
          </span>

        </div>
      </div>

      @endif


      {{-- =====================================================
                VALIDATION ERROR
            ====================================================== --}}

      @if($errors->any())

      <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-600">

        <div class="font-bold mb-1">
          Terjadi kesalahan:
        </div>

        <ul class="list-disc list-inside space-y-1">

          @foreach($errors->all() as $error)

          <li>
            {{ $error }}
          </li>

          @endforeach

        </ul>

      </div>

      @endif


      {{-- =====================================================
                HEADER CARD
            ====================================================== --}}

      <div class="bg-white rounded-2xl shadow-sm border border-[#dce9df] overflow-hidden">

        <div class="p-6">

          <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">


            {{-- INFO --}}

            <div class="flex items-center gap-4">

              <div class="w-12 h-12 rounded-xl bg-[#e8f3ec] flex items-center justify-center">

                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-6 h-6 text-[#2f6b4f]"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor">

                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2z" />

                </svg>

              </div>


              <div>

                <h3 class="text-lg font-bold text-[#214d39]">
                  Rekap Laporan PMM
                </h3>

                <p class="text-sm text-gray-500">

                  @if(Auth::user()->hasRole('guru'))

                  Silakan buat dan lengkapi laporan PMM Anda.

                  @elseif(Auth::user()->hasRole('pengawas'))

                  Pemeriksaan dan monitoring laporan PMM guru.

                  @else

                  Monitoring seluruh laporan PMM guru.

                  @endif

                </p>

              </div>

            </div>


            {{-- =================================================
                            BUTTON
                        ================================================== --}}

            <div class="flex flex-col sm:flex-row gap-2 no-print">


              {{-- BUAT PMM --}}

              @if(Auth::user()->hasRole('guru'))

              <form
                action="{{ route('daftar-laporan.store') }}"
                method="POST">

                @csrf

                <button
                  type="submit"
                  class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-[#2f6b4f] text-white font-semibold text-sm hover:bg-[#214d39] transition shadow-sm">

                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 4v16m8-8H4" />

                  </svg>

                  Buat PMM

                </button>

              </form>

              @endif


              {{-- CETAK --}}

              <button
                type="button"
                onclick="window.print()"
                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-[#e8f3ec] text-[#2f6b4f] font-semibold text-sm hover:bg-[#dcece1] transition">

                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor">

                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5h-2M6 14h12v8H6v-8z" />

                </svg>

                Cetak

              </button>

            </div>

          </div>


          {{-- =====================================================
                        SEARCH
                    ====================================================== --}}

          @if(
          Auth::user()->hasRole('superAdmin') ||
          Auth::user()->hasRole('admin') ||
          Auth::user()->hasRole('pengawas')
          )

          <div class="mt-6 pt-5 border-t border-[#e5eee8] no-print">

            <form
              action="{{ route('daftar-laporan') }}"
              method="GET"
              class="flex flex-col sm:flex-row gap-2">

              <div class="relative flex-1">

                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor">

                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z" />

                </svg>

                <input
                  type="text"
                  name="cari"
                  value="{{ request('cari') }}"
                  placeholder="Cari nama guru, topik..."
                  class="w-full rounded-xl border border-[#cfded4] pl-10 pr-4 py-2.5 focus:border-[#2f6b4f] focus:ring-2 focus:ring-[#b9d5c2] outline-none">

              </div>


              <button
                type="submit"
                class="px-5 py-2.5 rounded-xl bg-[#214d39] text-white font-semibold text-sm hover:bg-[#2f6b4f] transition">

                Cari

              </button>


              @if(request('cari'))

              <a
                href="{{ route('daftar-laporan') }}"
                class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl border border-[#cfded4] text-[#214d39] font-semibold text-sm hover:bg-[#f5faf6] transition">

                Reset

              </a>

              @endif

            </form>

          </div>

          @endif

        </div>

      </div>


      {{-- =========================================================
                TABLE
            ========================================================== --}}

      <div class="mt-6 bg-white rounded-2xl shadow-sm border border-[#dce9df] overflow-hidden">

        <div id="blanko">


          {{-- PRINT HEADER --}}

          <div class="hidden print:block p-4 text-center">

            <h1 class="text-xl font-bold">
              LAPORAN PMM
            </h1>

            <p class="text-sm">
              SMA Wahidiyah Kediri
            </p>

            <p class="text-sm mt-1">
              Rekap Laporan PMM
            </p>

            <hr class="my-3">

          </div>


          <div class="overflow-x-auto">

            <table class="w-full text-sm">

              <thead>

                <tr class="bg-[#214d39] text-white">

                  <th class="border px-3 py-3 text-center w-14">
                    No
                  </th>


                  @if(
                  Auth::user()->hasRole('superAdmin') ||
                  Auth::user()->hasRole('admin') ||
                  Auth::user()->hasRole('pengawas')
                  )

                  <th class="border px-3 py-3 text-left min-w-[180px]">
                    Nama Guru
                  </th>

                  @endif


                  <th class="border px-3 py-3 text-left min-w-[220px]">
                    Topik
                  </th>


                  <th class="border px-3 py-3 text-center">
                    Modul
                  </th>


                  <th class="border px-3 py-3 text-center">
                    Tuntas
                  </th>


                  <th class="border px-3 py-3 text-center">
                    Belum
                  </th>


                  <th class="border px-3 py-3 text-center min-w-[170px]">
                    Pemeriksaan
                  </th>


                  <th class="border px-3 py-3 text-center min-w-[140px]">
                    Aksi
                  </th>

                </tr>

              </thead>


              <tbody class="divide-y divide-[#e5eee8]">

                @forelse($rekapLap as $item)

                @php

                $total = $item->daftarLaporan->count();

                $tuntas = $item->daftarLaporan
                ->where('keterangan', 'tuntas')
                ->count();

                $belum = $item->daftarLaporan
                ->where('keterangan', 'belum tuntas')
                ->count();

                $statusPemeriksaan = $item->status_pemeriksaan ?? 'Belum Diperiksa';

                @endphp


                <tr class="hover:bg-[#f7fbf8] transition">


                  {{-- NO --}}

                  <td class="border px-3 py-3 text-center">
                    {{ $loop->iteration }}
                  </td>


                  {{-- NAMA GURU --}}

                  @if(
                  Auth::user()->hasRole('superAdmin') ||
                  Auth::user()->hasRole('admin') ||
                  Auth::user()->hasRole('pengawas')
                  )

                  <td class="border px-3 py-3">

                    <div class="font-semibold text-[#214d39]">
                      {{ $item->guru->nama_guru ?? '-' }}
                    </div>

                    @if($item->guru?->nuptk)

                    <div class="text-xs text-gray-400 mt-1">
                      NUPTK: {{ $item->guru->nuptk }}
                    </div>

                    @endif

                  </td>

                  @endif


                  {{-- TOPIK --}}

                  <td class="border px-3 py-3">

                    <div class="font-semibold text-[#214d39]">
                      {{ $item->topik->nama_topik ?? '-' }}
                    </div>

                    <div class="text-xs text-gray-500 mt-1">
                      {{ $item->topik->judul_topik ?? '-' }}
                    </div>

                  </td>


                  {{-- TOTAL MODUL --}}

                  <td class="border px-3 py-3 text-center font-semibold">
                    {{ $total }}
                  </td>


                  {{-- TUNTAS --}}

                  <td class="border px-3 py-3 text-center font-bold text-[#2f6b4f]">
                    {{ $tuntas }}
                  </td>


                  {{-- BELUM --}}

                  <td class="border px-3 py-3 text-center font-bold text-red-600">
                    {{ $belum }}
                  </td>


                  {{-- =================================================
                                            STATUS PEMERIKSAAN
                                        ================================================== --}}

                  <td class="border px-3 py-3 text-center">

                    @if($statusPemeriksaan === 'Disetujui')

                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#e8f3ec] text-[#2f6b4f] text-xs font-bold">

                      <span>
                        ✓
                      </span>

                      Disetujui

                    </span>


                    @elseif($statusPemeriksaan === 'Perlu Perbaikan')

                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-red-50 text-red-600 text-xs font-bold">

                      <span>
                        !
                      </span>

                      Perlu Perbaikan

                    </span>


                    @elseif($statusPemeriksaan === 'Diperiksa')

                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#fff6dc] text-[#9a6b12] text-xs font-bold">

                      <span>
                        ●
                      </span>

                      Diperiksa

                    </span>


                    @else

                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gray-100 text-gray-600 text-xs font-bold">

                      <span>
                        ○
                      </span>

                      Belum Diperiksa

                    </span>

                    @endif

                  </td>


                  {{-- =================================================
                                            AKSI
                                        ================================================== --}}

                  <td class="border px-3 py-3 text-center">

                    <a
                      href="{{ route('laporan-pmm', $item->id) }}"
                      class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#214d39] text-white text-xs font-semibold hover:bg-[#2f6b4f] transition">

                      @if(Auth::user()->hasRole('guru'))

                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.5-9.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 7.5-7.5z" />

                      </svg>

                      Isi PMM

                      @elseif(Auth::user()->hasRole('pengawas'))

                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />

                      </svg>

                      Periksa

                      @else

                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />

                      </svg>

                      Lihat

                      @endif

                    </a>

                  </td>

                </tr>


                @empty

                <tr>

                  <td
                    colspan="8"
                    class="px-5 py-14 text-center">

                    <div class="flex flex-col items-center justify-center">

                      <div class="w-14 h-14 rounded-full bg-[#e8f3ec] flex items-center justify-center mb-4">

                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="w-7 h-7 text-[#2f6b4f]"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor">

                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2z" />

                        </svg>

                      </div>


                      <div class="text-gray-500 font-semibold">
                        Belum ada laporan PMM.
                      </div>


                      @if(Auth::user()->hasRole('guru'))

                      <p class="text-sm text-gray-400 mt-2">
                        Klik tombol
                        <strong>Buat PMM</strong>
                        untuk membuat laporan.
                      </p>

                      @else

                      <p class="text-sm text-gray-400 mt-2">
                        Belum ada laporan PMM guru yang tersedia.
                      </p>

                      @endif

                    </div>

                  </td>

                </tr>

                @endforelse

              </tbody>

            </table>

          </div>

        </div>

      </div>


      {{-- =========================================================
                LEGEND
            ========================================================== --}}

      <div class="mt-4 flex flex-wrap gap-3 text-xs no-print">

        <span class="px-3 py-1.5 rounded-lg bg-gray-100 text-gray-600 font-semibold">
          ○ Belum Diperiksa
        </span>

        <span class="px-3 py-1.5 rounded-lg bg-[#fff6dc] text-[#9a6b12] font-semibold">
          ● Diperiksa
        </span>

        <span class="px-3 py-1.5 rounded-lg bg-[#e8f3ec] text-[#2f6b4f] font-semibold">
          ✓ Disetujui
        </span>

        <span class="px-3 py-1.5 rounded-lg bg-red-50 text-red-600 font-semibold">
          ! Perlu Perbaikan
        </span>

      </div>


    </div>

  </div>


</x-app-layout>