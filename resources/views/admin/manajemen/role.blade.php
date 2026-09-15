<x-app-layout>

  <x-slot name="header">
    @section('title', ' | Manajemen Role')

    <div>
      <h2 class="text-xl font-bold text-[#214d39]">
        Manajemen Role
      </h2>

      <p class="text-sm text-gray-500 mt-1">
        Kelola role dan hak akses pengguna aplikasi PMM
      </p>
    </div>
  </x-slot>


  <div class="py-6">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


        {{-- ========================= --}}
        {{-- FORM TAMBAH ROLE --}}
        {{-- ========================= --}}
        <div class="lg:col-span-1">

          <div class="bg-white rounded-2xl shadow-sm
                                border border-[#dce9df]
                                overflow-hidden">

            {{-- Header --}}
            <div class="px-6 py-5
                                    bg-[#f7fbf8]
                                    border-b border-[#e5eee8]">

              <div class="flex items-center gap-3">

                <div class="w-11 h-11
                                            rounded-xl
                                            bg-[#e8f3ec]
                                            flex items-center
                                            justify-center">

                  <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-[#2f6b4f]"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 11c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z" />

                    <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M6 21v-2a6 6 0 0112 0v2" />

                  </svg>

                </div>

                <div>

                  <h3 class="text-lg font-bold text-[#214d39]">
                    Tambah Role
                  </h3>

                  <p class="text-sm text-gray-500">
                    Buat role pengguna baru
                  </p>

                </div>

              </div>

            </div>


            {{-- Notification --}}
            @if(Session::has('message'))

            <div
              id="notification"
              class="mx-6 mt-5 px-4 py-3 rounded-xl
                                       {{ Session::get('alert-class', 'bg-[#e8f3ec] text-[#2f6b4f]') }}">

              <div class="flex items-start gap-2">

                <svg xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5 flex-shrink-0"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor">

                  <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />

                </svg>

                <span class="text-sm font-medium">
                  {{ Session::get('message') }}
                </span>

              </div>

            </div>

            <script>
              setTimeout(function() {
                const notification =
                  document.getElementById('notification');

                if (notification) {
                  notification.style.display = 'none';
                }
              }, 5000);
            </script>

            @endif


            {{-- Form --}}
            <form action="/role-management"
              method="POST">

              @csrf

              <div class="p-6 space-y-5">


                {{-- Name --}}
                <div>

                  <label
                    for="name"
                    class="block text-sm font-semibold
                                               text-gray-700 mb-2">

                    Nama Role

                  </label>

                  <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    placeholder="Contoh: admin"
                    class="w-full rounded-xl
                                               border border-[#cfded4]
                                               px-4 py-3
                                               text-gray-700
                                               placeholder-gray-400
                                               focus:border-[#2f6b4f]
                                               focus:ring-2
                                               focus:ring-[#b9d5c2]
                                               outline-none transition">

                  @error('name')

                  <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                  </p>

                  @enderror

                </div>


                {{-- Guard --}}
                <div>

                  <label
                    for="guard_name"
                    class="block text-sm font-semibold
                                               text-gray-700 mb-2">

                    Guard Name

                  </label>

                  <input
                    type="text"
                    name="guard_name"
                    id="guard_name"
                    value="web"
                    readonly
                    class="w-full rounded-xl
                                               border border-[#cfded4]
                                               bg-gray-100
                                               px-4 py-3
                                               text-gray-500
                                               cursor-not-allowed">

                  <p class="mt-1.5 text-xs text-gray-500">
                    Guard aplikasi menggunakan <strong>web</strong>.
                  </p>

                </div>


                {{-- Button --}}
                <button
                  type="submit"
                  class="w-full
                                           inline-flex
                                           items-center
                                           justify-center
                                           gap-2
                                           px-5 py-3
                                           rounded-xl
                                           bg-[#2f6b4f]
                                           text-white
                                           font-semibold
                                           hover:bg-[#214d39]
                                           transition
                                           shadow-sm">

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

                  Create Role

                </button>

              </div>

            </form>

          </div>

        </div>


        {{-- ========================= --}}
        {{-- DAFTAR ROLE --}}
        {{-- ========================= --}}
        <div class="lg:col-span-2">

          <div class="bg-white rounded-2xl shadow-sm
                                border border-[#dce9df]
                                overflow-hidden">


            {{-- Header --}}
            <div class="px-6 py-5
                                    bg-[#f7fbf8]
                                    border-b border-[#e5eee8]">

              <div class="flex flex-col
                                        sm:flex-row
                                        sm:items-center
                                        sm:justify-between
                                        gap-3">

                <div>

                  <h3 class="text-lg font-bold text-[#214d39]">
                    Daftar Role
                  </h3>

                  <p class="text-sm text-gray-500 mt-1">
                    Role yang tersedia dalam aplikasi
                  </p>

                </div>


                <div class="px-4 py-2
                                            rounded-xl
                                            bg-[#e8f3ec]
                                            text-[#2f6b4f]
                                            text-sm
                                            font-semibold">

                  Total:
                  {{ $roles->count() }}
                  Role

                </div>

              </div>

            </div>


            {{-- Table --}}
            <div class="overflow-x-auto">

              <table class="w-full text-sm">

                <thead>

                  <tr class="bg-[#eef6f0]
                                               text-[#214d39]">

                    <th class="px-5 py-4
                                                   text-center
                                                   font-bold">
                      No
                    </th>

                    <th class="px-5 py-4
                                                   text-left
                                                   font-bold">
                      Nama Role
                    </th>

                    <th class="px-5 py-4
                                                   text-center
                                                   font-bold">
                      Guard
                    </th>

                  </tr>

                </thead>


                <tbody class="divide-y
                                             divide-[#e5eee8]">

                  @forelse($roles as $role)

                  <tr class="hover:bg-[#f7fbf8]
                                                   transition">


                    {{-- No --}}
                    <td class="px-5 py-4
                                                       text-center">

                      <span
                        class="inline-flex
                                                           items-center
                                                           justify-center
                                                           w-8 h-8
                                                           rounded-lg
                                                           bg-[#e8f3ec]
                                                           text-[#2f6b4f]
                                                           font-bold">

                        {{ $loop->iteration }}

                      </span>

                    </td>


                    {{-- Role --}}
                    <td class="px-5 py-4">

                      <div class="flex
                                                            items-center
                                                            gap-3">

                        <div
                          class="w-10 h-10
                                                               rounded-xl
                                                               bg-[#e8f3ec]
                                                               flex
                                                               items-center
                                                               justify-center">

                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5
                                                                   text-[#2f6b4f]"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />

                          </svg>

                        </div>


                        <div>

                          <div class="font-bold
                                                                    text-gray-800">

                            {{ $role->name }}

                          </div>

                          <div class="text-xs
                                                                    text-gray-400">

                            Role pengguna

                          </div>

                        </div>

                      </div>

                    </td>


                    {{-- Guard --}}
                    <td class="px-5 py-4
                                                       text-center">

                      <span
                        class="inline-flex
                                                           px-3 py-1.5
                                                           rounded-lg
                                                           bg-gray-100
                                                           text-gray-600
                                                           font-medium
                                                           text-xs">

                        {{ $role->guard_name }}

                      </span>

                    </td>

                  </tr>


                  @empty

                  <tr>

                    <td colspan="3"
                      class="px-5 py-14
                                                       text-center">

                      <div
                        class="flex flex-col
                                                           items-center">

                        <div
                          class="w-16 h-16
                                                               rounded-2xl
                                                               bg-[#e8f3ec]
                                                               flex
                                                               items-center
                                                               justify-center
                                                               mb-4">

                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-8 h-8
                                                                   text-[#2f6b4f]"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />

                          </svg>

                        </div>


                        <h3
                          class="text-lg
                                                               font-bold
                                                               text-gray-700">

                          Belum Ada Role

                        </h3>


                        <p
                          class="text-sm
                                                               text-gray-500
                                                               mt-1">

                          Belum ada role
                          pengguna yang tersedia.

                        </p>

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

    </div>

  </div>

</x-app-layout>