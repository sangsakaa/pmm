<x-app-layout>

  <x-slot name="header">
    @section('title', ' | Tambah Modul')

    <div>
      <h2 class="text-xl font-bold text-[#214d39]">
        Tambah Modul
      </h2>

      <p class="text-sm text-gray-500 mt-1">
        Tambahkan modul pembelajaran baru ke dalam topik PMM
      </p>
    </div>
  </x-slot>


  <div class="py-6">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

      {{-- Card --}}
      <div class="bg-white rounded-2xl shadow-sm border border-[#dce9df] overflow-hidden">

        {{-- Header Card --}}
        <div class="px-6 py-5 bg-[#f7fbf8] border-b border-[#e5eee8]">

          <div class="flex items-center gap-3">

            <div class="w-11 h-11 rounded-xl bg-[#e8f3ec]
                                    flex items-center justify-center">

              <svg xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6 text-[#2f6b4f]"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253" />
              </svg>

            </div>

            <div>
              <h3 class="font-bold text-[#214d39] text-lg">
                Form Tambah Modul
              </h3>

              <p class="text-sm text-gray-500">
                Lengkapi informasi modul di bawah ini.
              </p>
            </div>

          </div>

        </div>


        {{-- Form --}}
        <form action="/add-modul" method="POST">

          @csrf

          <div class="p-6 space-y-6">

            {{-- Error --}}
            @if ($errors->any())

            <div class="rounded-xl border border-red-200
                                        bg-red-50 p-4">

              <div class="flex gap-3">

                <svg xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5 text-red-600 mt-0.5"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor">

                  <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 8v4m0 4h.01M10.29 3.86l-7.82 13.5A2 2 0 004.2 20.5h15.6a2 2 0 001.73-3.14l-7.82-13.5a2 2 0 00-3.42 0z" />
                </svg>

                <div>
                  <p class="font-semibold text-red-700">
                    Terdapat kesalahan pada form.
                  </p>

                  <ul class="mt-2 text-sm text-red-600 list-disc list-inside">

                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach

                  </ul>
                </div>

              </div>

            </div>

            @endif


            {{-- Topik --}}
            <div>

              <label for="topik_id"
                class="block text-sm font-semibold text-gray-700 mb-2">

                Topik

              </label>

              <select
                name="topik_id"
                id="topik_id"
                class="w-full rounded-xl border border-[#cfded4]
                                       bg-white px-4 py-3
                                       text-gray-700
                                       focus:border-[#2f6b4f]
                                       focus:ring-2 focus:ring-[#b9d5c2]
                                       outline-none transition">

                <option value="">
                  -- Pilih Topik --
                </option>

                @foreach($dataTopik as $list)

                <option
                  value="{{ $list->id }}"
                  {{ old('topik_id') == $list->id ? 'selected' : '' }}>

                  {{ $list->nama_topik }} — {{ $list->judul_topik }}

                </option>

                @endforeach

              </select>

              @error('topik_id')
              <p class="mt-1 text-sm text-red-600">
                {{ $message }}
              </p>
              @enderror

            </div>


            {{-- Nama Modul --}}
            <div>

              <label for="nama_modul"
                class="block text-sm font-semibold text-gray-700 mb-2">

                Nama Modul

              </label>

              <input
                type="text"
                name="nama_modul"
                id="nama_modul"
                value="{{ old('nama_modul') }}"
                placeholder="Contoh: KM-01"
                class="w-full rounded-xl border border-[#cfded4]
                                       px-4 py-3
                                       text-gray-700
                                       placeholder-gray-400
                                       focus:border-[#2f6b4f]
                                       focus:ring-2 focus:ring-[#b9d5c2]
                                       outline-none transition">

              <p class="mt-1.5 text-xs text-gray-500">
                Contoh format: KM-01, PP-01, PD-01.
              </p>

              @error('nama_modul')
              <p class="mt-1 text-sm text-red-600">
                {{ $message }}
              </p>
              @enderror

            </div>


            {{-- Judul Modul --}}
            <div>

              <label for="judul_modul"
                class="block text-sm font-semibold text-gray-700 mb-2">

                Judul Modul

              </label>

              <input
                type="text"
                name="judul_modul"
                id="judul_modul"
                value="{{ old('judul_modul') }}"
                placeholder="Contoh: Memahami Konsep Dasar Kurikulum Merdeka"
                class="w-full rounded-xl border border-[#cfded4]
                                       px-4 py-3
                                       text-gray-700
                                       placeholder-gray-400
                                       focus:border-[#2f6b4f]
                                       focus:ring-2 focus:ring-[#b9d5c2]
                                       outline-none transition">

              @error('judul_modul')
              <p class="mt-1 text-sm text-red-600">
                {{ $message }}
              </p>
              @enderror

            </div>

          </div>


          {{-- Footer --}}
          <div class="px-6 py-4 bg-[#f7fbf8]
                                border-t border-[#e5eee8]
                                flex flex-col sm:flex-row
                                gap-3 sm:justify-end">

            {{-- Reset --}}
            <button
              type="reset"
              class="px-5 py-2.5 rounded-xl
                                   border border-gray-300
                                   bg-white text-gray-700
                                   font-semibold text-sm
                                   hover:bg-gray-50
                                   transition">

              Reset

            </button>


            {{-- Kembali --}}
            <a
              href="/data-modul"
              class="px-5 py-2.5 rounded-xl
                                   bg-[#e7ece9] text-[#214d39]
                                   font-semibold text-sm
                                   text-center
                                   hover:bg-[#dce5df]
                                   transition">

              Kembali

            </a>


            {{-- Simpan --}}
            <button
              type="submit"
              class="px-5 py-2.5 rounded-xl
                                   bg-[#2f6b4f] text-white
                                   font-semibold text-sm
                                   hover:bg-[#214d39]
                                   transition
                                   shadow-sm">

              Simpan Modul

            </button>

          </div>

        </form>

      </div>

    </div>

  </div>

</x-app-layout>