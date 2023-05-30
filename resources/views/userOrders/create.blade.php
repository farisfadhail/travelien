<x-app-layout>
    <x-slot name="header">
        {{ __('User Order') }}
    </x-slot>

    <!--Container-->
	<div class="w-full mx-auto px-2 ">

        <form method="POST" enctype="multipart/form-data" action="{{ route('user-order.store') }}"  class="px-8 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @csrf
            <h1 class=" text-2xl font-semibold mb-4 mt-2">Create Data User for order</h1>

            <label class="block text-sm ">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Full Name</span>
                <input
                    class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukkan nama lengkap..."
                    name="name"
                    type="text"
                    value="{{ old('name')}}"
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Identity Number</span>
                <input
                    class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukkan nomor identitas..."
                    name="identity_number"
                    type="number"
                    value="{{ old('identity_number')}}"
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Phone</span>
                <input
                    class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukkan nomor telepon..."
                    name="phone"
                    type="number"
                    value="{{ old('phone')}}"
                />
                <span class="text-xs text-gray-600 dark:text-gray-400">
                  Angka 0 pada awal diganti dengan 62. ex: 62872357125
                </span>
            </label>

            <div class="flex justify-end mt-4 mb-2">
                <a
                    class=" mr-4 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                    href="{{ route('order.index') }}"
                >
                    Kembali
                </a>
                <button
                    class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                    type="submit"
                >
                    Create now
                </button>
            </div>

        </form>

	</div>
	<!--/container-->
</x-app-layout>
