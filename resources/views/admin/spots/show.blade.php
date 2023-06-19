<x-app-layout>
    <x-slot name="header">
        {{ __('Spot Show') }}
    </x-slot>

    <!--Container-->
	<div class="w-full mx-auto px-2 ">

        <div class="px-8 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex justify-between">
                <h1 class=" text-2xl font-semibold mb-4 mt-2">Spot Data</h1>

                <div class="flex align-middle">
                    {{-- Membuat tombol untuk ke halaman index --}}
                    <a
                        class="mr-4 px-4 py-4 font-medium leading-5 text-black transition-colors duration-150 bg-slate-600 border border-transparent rounded-lg active:bg-slate-600 hover:bg-slate-700 focus:outline-none focus:shadow-outline-slate"
                        href="{{ route('admin.spot.index') }}"
                    >
                        Back to Dashboard
                    </a>
                    {{-- Membuat tombol untuk ke halaman edit dengan membawa id dari spot --}}
                    <a
                        class="px-4 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow"
                        href="{{ route('admin.spot.edit', $spot->id) }}"
                    >
                        Edit
                    </a>
                </div>
            </div>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Foto Spot</span>
                <img src="{{ asset($spot_image) }}" class=" w-64 mt-4" alt="">
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Nama Spot</span>
                <div class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    {{ $spot->spot_name }}
                </div>
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Harga per tiket</span>
                <div class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    {{ $spot->ticket_price }}
                </div>
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Deskripsi</span>
                <div class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    {!! $spot->description !!}
                </div>
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Desa</span>
                <div class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    {{ $spot->village }}
                </div>
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Kecamatan</span>
                <div class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    {{ $spot->district }}
                </div>
            </label>

            <label class="block text-sm my-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Google Maps</span>
                <div class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    {!! $spot->link_maps !!}
                </div>
            </label>

        </div>

	</div>
	<!--/container-->
</x-app-layout>
