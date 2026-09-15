<x-app-layout>

  <x-slot name="header">

    @section('title', ' | LAPORAN PMM')

    <div>
      <h2 class="font-bold text-xl text-[#214d39] leading-tight">
        Laporan PMM
      </h2>

      <p class="text-sm text-gray-500 mt-1">
        {{ $title->nama_topik }} — {{ $title->judul_topik }}
      </p>
    </div>

  </x-slot>


  <div class="py-6">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-5">


      {{-- =====================================================
                FLASH MESSAGE
            ====================================================== --}}

      @if(session('success'))

      <div class="rounded-2xl border border-[#cce4d4] bg-[#eef8f1] px-5 py-4">

        <div class="flex items-start gap-3">

          <div class="w-9 h-9 shrink-0 rounded-xl bg-[#d8ebdf] flex items-center justify-center">

            <svg
              class="w-5 h-5 text-[#2f6b4f]"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M5 13l4 4L19 7" />
            </svg>

          </div>

          <div>

            <p class="font-bold text-[#214d39] text-sm">
              Berhasil
            </p>

            <p class="text-sm text-gray-600 mt-0.5">
              {{ session('success') }}
            </p>

          </div>

        </div>

      </div>

      @endif


      @if(session('error'))

      <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4">

        <div class="flex items-start gap-3">

          <div class="w-9 h-9 shrink-0 rounded-xl bg-red-100 flex items-center justify-center">

            <svg
              class="w-5 h-5 text-red-600"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12" />
            </svg>

          </div>

          <div>

            <p class="font-bold text-red-700 text-sm">
              Terjadi Kesalahan
            </p>

            <p class="text-sm text-red-600 mt-0.5">
              {{ session('error') }}
            </p>

          </div>

        </div>

      </div>

      @endif


      @if($errors->any())

      <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4">

        <p class="font-bold text-red-700 text-sm mb-2">
          Periksa kembali data berikut:
        </p>

        <ul class="list-disc list-inside text-sm text-red-600 space-y-1">

          @foreach($errors->all() as $error)

          <li>{{ $error }}</li>

          @endforeach

        </ul>

      </div>

      @endif



      {{-- =====================================================
                INFORMASI LAPORAN
            ====================================================== --}}

      <div class="bg-white rounded-2xl shadow-sm border border-[#dce9df] overflow-hidden">

        <div class="px-6 py-5 bg-[#f4f9f5] border-b border-[#e2eee5]">

          <div class="flex items-center gap-3">

            <div class="w-11 h-11 rounded-xl bg-[#dceee2] flex items-center justify-center">

              <svg
                class="w-6 h-6 text-[#2f6b4f]"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a2 2 0 011.414.586l4.414 4.414A2 2 0 0119 9v10a2 2 0 01-2 2z" />
              </svg>

            </div>

            <div>

              <h3 class="font-bold text-[#214d39]">
                Detail Laporan PMM
              </h3>

              <p class="text-xs text-gray-500">
                Informasi laporan dan progres modul
              </p>

            </div>

          </div>

        </div>


        <div class="p-6">

          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">


            {{-- GURU --}}

            <div class="rounded-xl border border-[#e0ebe3] bg-[#f8fbf9] p-4">

              <p class="text-xs text-gray-400 uppercase tracking-wide">
                Nama Guru
              </p>

              <p class="mt-1 font-semibold text-[#214d39]">
                {{ $title->nama_guru }}
              </p>

            </div>


            {{-- TOPIK --}}

            <div class="rounded-xl border border-[#e0ebe3] bg-[#f8fbf9] p-4">

              <p class="text-xs text-gray-400 uppercase tracking-wide">
                Nama Topik
              </p>

              <p class="mt-1 font-semibold text-[#214d39]">
                {{ $title->nama_topik }}
              </p>

            </div>


            {{-- JUDUL --}}

            <div class="rounded-xl border border-[#e0ebe3] bg-[#f8fbf9] p-4">

              <p class="text-xs text-gray-400 uppercase tracking-wide">
                Judul Topik
              </p>

              <p class="mt-1 font-semibold text-[#214d39]">
                {{ $title->judul_topik }}
              </p>

            </div>

          </div>



          {{-- =================================================
                        STATUS PEMERIKSAAN
                    ================================================== --}}

          @php
          $statusPemeriksaan = $laporan->status_pemeriksaan ?? 'Belum Diperiksa';

          $statusClass = match ($statusPemeriksaan) {
          'Disetujui' => 'bg-[#e7f5eb] text-[#287044] border-[#cce5d2]',
          'Perlu Perbaikan' => 'bg-[#fff0f0] text-[#b34a4a] border-[#f0cccc]',
          'Diperiksa' => 'bg-[#fff6dc] text-[#9a6b12] border-[#eedba8]',
          default => 'bg-gray-100 text-gray-600 border-gray-200',
          };
          @endphp


          <div class="mt-5 rounded-xl border {{ $statusClass }} p-4">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

              <div>

                <p class="text-xs uppercase tracking-wide opacity-70">
                  Status Pemeriksaan
                </p>

                <span class="inline-flex mt-2 px-3 py-1.5 rounded-lg text-xs font-bold border {{ $statusClass }}">
                  {{ $statusPemeriksaan }}
                </span>

              </div>


              @if($laporan->diperiksa_at)

              <div class="text-left md:text-right">

                <p class="text-xs opacity-70">
                  Terakhir diperiksa
                </p>

                <p class="text-sm font-semibold mt-1">
                  {{ $laporan->diperiksa_at->format('d M Y, H:i') }}
                </p>

              </div>

              @endif

            </div>


            @if($laporan->catatan_pemeriksaan)

            <div class="mt-4 pt-4 border-t border-current/10">

              <p class="text-xs font-bold mb-1">
                Catatan Pemeriksaan
              </p>

              <p class="text-sm opacity-80">
                {{ $laporan->catatan_pemeriksaan }}
              </p>

            </div>

            @endif

          </div>

        </div>

      </div>



      {{-- =====================================================
                STATUS ROLE
            ====================================================== --}}

      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

        <div>

          <h3 class="text-lg font-bold text-[#214d39]">
            Daftar Modul
          </h3>

          <p class="text-sm text-gray-500">
            Status penyelesaian modul PMM.
          </p>

        </div>


        @if(Auth::user()->hasRole('guru'))

        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#e8f3ec] text-[#2f6b4f] text-xs font-bold">

          <span class="w-2 h-2 rounded-full bg-[#4d8a68]"></span>

          Guru — Mode Pengisian

        </span>

        @elseif(Auth::user()->hasRole('pengawas'))

        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#fff6dc] text-[#9a6b12] text-xs font-bold">

          <span class="w-2 h-2 rounded-full bg-[#c8922e]"></span>

          Pengawas — Mode Pemeriksaan

        </span>

        @else

        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-100 text-gray-600 text-xs font-bold">

          <span class="w-2 h-2 rounded-full bg-gray-400"></span>

          Monitoring

        </span>

        @endif

      </div>



      {{-- =====================================================
                TABLE MODUL
            ====================================================== --}}

      <div class="bg-white rounded-2xl shadow-sm border border-[#dce9df] overflow-hidden">


        {{-- =================================================
                    FORM GURU
                ================================================== --}}

        @if(Auth::user()->hasRole('guru'))

        <form
          action="{{ route('laporan-pmm.update', $laporan->id) }}"
          method="POST">

          @csrf

          @endif


          <div class="overflow-x-auto">

            <table class="w-full">

              <thead>

                <tr class="bg-[#f4f9f5] border-b border-[#dce9df]">

                  <th class="px-4 py-4 text-center text-xs font-bold text-[#214d39] w-16">
                    No
                  </th>

                  <th class="px-4 py-4 text-left text-xs font-bold text-[#214d39]">
                    Nama Modul
                  </th>

                  <th class="px-4 py-4 text-left text-xs font-bold text-[#214d39]">
                    Judul Modul
                  </th>

                  <th class="px-4 py-4 text-center text-xs font-bold text-[#214d39] w-52">
                    Keterangan
                  </th>

                </tr>

              </thead>


              <tbody class="divide-y divide-[#edf2ee]">

                @forelse($dataModel as $item)

                <tr class="hover:bg-[#f9fbf9] transition">


                  {{-- NOMOR --}}

                  <td class="px-4 py-4 text-center text-sm text-gray-500">

                    {{ $loop->iteration }}

                  </td>


                  {{-- NAMA MODUL --}}

                  <td class="px-4 py-4">

                    <p class="font-semibold text-[#214d39] text-sm">
                      {{ $item->nama_modul }}
                    </p>

                  </td>


                  {{-- JUDUL MODUL --}}

                  <td class="px-4 py-4">

                    <p class="text-sm text-gray-600">
                      {{ $item->judul_modul }}
                    </p>

                  </td>


                  {{-- STATUS MODUL --}}

                  <td class="px-4 py-4">

                    @if(Auth::user()->hasRole('guru'))

                    {{-- =============================
                                                GURU BOLEH EDIT
                                            ============================== --}}

                    <input
                      type="hidden"
                      name="modul_id[]"
                      value="{{ $item->id }}">

                    <select
                      name="keterangan[{{ $item->id }}]"
                      class="w-full rounded-xl border-[#cddfd2] text-sm bg-white focus:border-[#4d8a68] focus:ring-[#4d8a68]">

                      <option
                        value="belum tuntas"
                        {{ $item->keterangan === null || $item->keterangan === 'belum tuntas' ? 'selected' : '' }}>
                        Belum Tuntas
                      </option>

                      <option
                        value="tuntas"
                        {{ $item->keterangan === 'tuntas' ? 'selected' : '' }}>
                        Tuntas
                      </option>

                    </select>

                    @else

                    {{-- =============================
                                                READ ONLY
                                            ============================== --}}

                    @if($item->keterangan === 'tuntas')

                    <div class="flex justify-center">

                      <span class="inline-flex items-center gap-2 px-3 py-2 rounded-xl bg-[#e7f5eb] text-[#287044] text-xs font-bold">

                        <svg
                          class="w-4 h-4"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24">
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7" />
                        </svg>

                        Tuntas

                      </span>

                    </div>

                    @else

                    <div class="flex justify-center">

                      <span class="inline-flex items-center gap-2 px-3 py-2 rounded-xl bg-[#fff0f0] text-[#b34a4a] text-xs font-bold">

                        <svg
                          class="w-4 h-4"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24">
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                        </svg>

                        Belum Tuntas

                      </span>

                    </div>

                    @endif

                    @endif

                  </td>

                </tr>

                @empty

                <tr>

                  <td
                    colspan="4"
                    class="px-6 py-12 text-center">

                    <div class="text-gray-500">

                      Belum ada modul untuk topik ini.

                    </div>

                  </td>

                </tr>

                @endforelse

              </tbody>

            </table>

          </div>



          {{-- =================================================
                    FOOTER
                ================================================== --}}

          <div class="px-6 py-5 bg-[#f8fbf9] border-t border-[#e3eee6]">

            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">


              {{-- KEMBALI --}}

              <a
                href="{{ route('daftar-laporan') }}"
                class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl border border-[#cddfd2] bg-white text-[#2f6b4f] text-sm font-semibold hover:bg-[#edf5ef] transition">

                <svg
                  class="w-4 h-4"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 19l-7-7 7-7" />
                </svg>

                Kembali

              </a>



              {{-- =================================================
                            GURU
                        ================================================== --}}

              @if(Auth::user()->hasRole('guru'))

              <button
                type="submit"
                class="inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-xl bg-[#2f6b4f] text-white text-sm font-bold hover:bg-[#214d39] transition shadow-sm">

                <svg
                  class="w-4 h-4"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7" />
                </svg>

                Simpan Laporan PMM

              </button>

              @endif



              {{-- =================================================
                            PENGAWAS
                        ================================================== --}}

              @if(Auth::user()->hasRole('pengawas'))

              <div class="w-full sm:w-auto sm:min-w-[560px]">

                <form
                  action="{{ route('laporan-pmm.update', $laporan->id) }}"
                  method="POST"
                  class="space-y-3">

                  @csrf

                  <input
                    type="hidden"
                    name="aksi"
                    value="periksa">


                  <div class="grid grid-cols-1 md:grid-cols-2 gap-3">


                    {{-- STATUS PEMERIKSAAN --}}

                    <div>

                      <label class="block text-xs font-bold text-[#214d39] mb-1">
                        Status Pemeriksaan
                      </label>

                      <select
                        name="status_pemeriksaan"
                        required
                        class="w-full rounded-xl border-[#cddfd2] bg-white text-sm focus:border-[#4d8a68] focus:ring-[#4d8a68]">

                        <option value="Diperiksa"
                          {{ old('status_pemeriksaan', $laporan->status_pemeriksaan) === 'Diperiksa' ? 'selected' : '' }}>
                          Diperiksa
                        </option>

                        <option value="Disetujui"
                          {{ old('status_pemeriksaan', $laporan->status_pemeriksaan) === 'Disetujui' ? 'selected' : '' }}>
                          Disetujui
                        </option>

                        <option value="Perlu Perbaikan"
                          {{ old('status_pemeriksaan', $laporan->status_pemeriksaan) === 'Perlu Perbaikan' ? 'selected' : '' }}>
                          Perlu Perbaikan
                        </option>

                      </select>

                    </div>



                    {{-- CATATAN PEMERIKSAAN --}}

                    <div>

                      <label class="block text-xs font-bold text-[#214d39] mb-1">
                        Catatan Pemeriksaan
                      </label>

                      <textarea
                        name="catatan_pemeriksaan"
                        rows="2"
                        placeholder="Tulis catatan atau hasil pemeriksaan..."
                        class="w-full rounded-xl border-[#cddfd2] bg-white text-sm focus:border-[#4d8a68] focus:ring-[#4d8a68]">{{ old('catatan_pemeriksaan', $laporan->catatan_pemeriksaan) }}</textarea>

                    </div>

                  </div>


                  {{-- VALIDASI CATATAN --}}

                  @if($errors->has('catatan_pemeriksaan'))

                  <p class="text-xs text-red-600">
                    {{ $errors->first('catatan_pemeriksaan') }}
                  </p>

                  @endif


                  <div class="flex justify-end">

                    <button
                      type="submit"
                      class="inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-xl bg-[#c8922e] text-white text-sm font-bold hover:bg-[#a97819] transition shadow-sm">

                      <svg
                        class="w-4 h-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M5 13l4 4L19 7" />
                      </svg>

                      Simpan Pemeriksaan

                    </button>

                  </div>

                </form>

              </div>

              @endif

            </div>

          </div>


          @if(Auth::user()->hasRole('guru'))

        </form>

        @endif

      </div>



      {{-- =====================================================
                INFORMASI
            ====================================================== --}}

      <div class="rounded-2xl bg-[#eef7f1] border border-[#d6e8db] p-5">

        <div class="flex gap-3">

          <div class="w-9 h-9 shrink-0 rounded-xl bg-[#d8ebdf] flex items-center justify-center">

            <svg
              class="w-5 h-5 text-[#2f6b4f]"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24">

              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000-16 8 8 0 000 16z" />

            </svg>

          </div>


          <div>

            <h4 class="font-bold text-[#214d39] text-sm">
              Informasi
            </h4>


            @if(Auth::user()->hasRole('guru'))

            <p class="text-sm text-gray-600 mt-1">
              Silakan pilih status setiap modul sesuai dengan progres
              pembelajaran Anda, kemudian klik
              <strong>Simpan Laporan PMM</strong>.
            </p>

            @elseif(Auth::user()->hasRole('pengawas'))

            <p class="text-sm text-gray-600 mt-1">
              Anda sedang memeriksa laporan PMM milik
              <strong>{{ $title->nama_guru }}</strong>.
              Status modul tidak dapat diubah oleh Pengawas.
              Silakan pilih status pemeriksaan dan berikan catatan
              jika diperlukan.
            </p>

            @else

            <p class="text-sm text-gray-600 mt-1">
              Halaman ini digunakan untuk monitoring laporan PMM
              <strong>{{ $title->nama_guru }}</strong>.
            </p>

            @endif

          </div>

        </div>

      </div>


    </div>

  </div>

</x-app-layout>