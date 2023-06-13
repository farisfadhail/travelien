<x-app-layout>
    <x-slot name="header">
        {{ __('Spot') }}
    </x-slot>

    <!--Container-->
	<div class="w-full mx-auto px-2 ">

        {{-- Menggunakan tag form untuk melakukan input data dengan method default post --}}
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.spot.update', $spot->id) }}"  class="px-8 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            {{-- Menambahkan csrf agar request form dapat disimpan --}}
            @csrf
            {{-- Method diubah menjadi PUT untuk update data --}}
            @method('PUT')
            <h1 class=" text-2xl font-semibold mb-4 mt-2">Edit Spot Data</h1>

            <label class="block text-sm ">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Foto Spot</span>
                <input
                    class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="spot_image"
                    type="file"
                />
            </label>

            <label class="block text-sm ">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Nama Spot</span>
                {{-- Membuat input dengan name spot_name --}}
                {{-- Ketika terdapat data spot_name, maka akan dimasukkan datanya sebagai value --}}
                <input
                    class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukkan nama tempat..."
                    name="spot_name"
                    type="text"
                    value="{{ old('spot_name', $spot->spot_name) }}"
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Harga</span>
                {{-- Membuat input dengan name ticket_price --}}
                {{-- Ketika terdapat data ticket_price, maka akan dimasukkan datanya sebagai value --}}
                <input
                    class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukkan harga tiket"
                    name="ticket_price"
                    type="number"
                    value="{{ old('ticket_price', $spot->ticket_price) }}"
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Description</span>
                <textarea name="description" id="editor">{{ old('body', $spot->description) }}</textarea>
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">
                    Desa
                </span>
                <select class="block w-full mt-1 text-md py-2 rounded-lg dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="village" >
                    <option value="" class="text-gray-400">Pilih Desa...</option>
                    <option value="Ungkalan" {{ 'Ungkalan' == $spot->village ? 'selected' : '' }}>Ungkalan</option>
                    <option value="Sabrang" {{ 'Sabrang' == $spot->village ? 'selected' : '' }}>Sabrang</option>
                    <option value="Sumberrejo" {{ 'Sumberrejo' == $spot->village ? 'selected' : '' }}>Sumberrejo</option>
                    <option value="Lojejer" {{ 'Lojejer' == $spot->village ? 'selected' : '' }}>Lojejer</option>
                    <option value="Puger" {{ 'Puger' == $spot->village ? 'selected' : '' }}>Puger</option>
                </select>
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">
                    Kecamatan
                </span>
                <select class="block w-full mt-1 text-md py-2 rounded-lg dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="district">
                    <option value="" class="text-gray-400">Pilih Kecamatan...</option>
                    <option value="Kaliwates" {{ "Kaliwates" == $spot->district ? 'selected' : '' }}>Kaliwates</option>
                    <option value="Sumbersari" {{ "Sumbersari" == $spot->district ? 'selected' : '' }}>Sumbersari</option>
                    <option value="Ambulu" {{ 'Ambulu' == $spot->district ? 'selected' : '' }}>Ambulu</option>
                    <option value="Wuluhan" {{ 'Wuluhan' == $spot->district ? 'selected' : '' }}>Wuluhan</option>
                    <option value="Patrang" {{ 'Patrang' == $spot->district ? 'selected' : '' }}>Patrang</option>
                </select>
            </label>

            <div class="flex justify-end mt-4 mb-2">
                <a
                    class=" mr-4 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                    href="{{ route('admin.spot.index') }}"
                >
                    Kembali
                </a>
                <button
                    class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                    type="submit"
                >
                    Update now
                </button>
            </div>

        </form>

	</div>
	<!--/container-->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</x-app-layout>
