<x-app-layout>
    <x-slot name="header">
        {{ __('Order Show') }}
    </x-slot>

    <!--Container-->
	<div class="w-full mx-auto px-2 ">

        <div class="px-8 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex justify-between">
                <h1 class=" text-2xl font-semibold mb-4 mt-2">Order Data</h1>

                <div class="flex align-middle">
                    {{-- Membuat tombol untuk ke halaman index --}}
                    <a
                        class="mr-4 px-4 py-4 font-medium leading-5 text-black transition-colors duration-150 bg-slate-600 border border-transparent rounded-lg active:bg-slate-600 hover:bg-slate-700 focus:outline-none focus:shadow-outline-slate"
                        href="{{ route('order.index') }}"
                    >
                        Back to Dashboard
                    </a>
                    {{-- Membuat tombol untuk ke halaman route user-order.edit dengan membawa id dari user_order --}}
                    <a
                        class="px-4 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow"
                        href="{{ route('order.edit', $order[0]->order_id) }}"
                    >
                        Edit
                    </a>
                </div>
            </div>

            <label class="block text-sm ">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Nama Pemesan</span>
                <div class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @php
                        echo $order[0]->name
                    @endphp
                </div>
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Nama Spot</span>
                <div class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @php
                        echo $order[0]->spot_name
                    @endphp
                </div>
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Jumlah Tiket</span>
                <div class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @php
                        echo $order[0]->ticket_amount
                    @endphp
                </div>
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Total Harga</span>
                <div class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @php
                        echo 'Rp. '.number_format($order[0]->total_price)
                    @endphp
                </div>
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Status Pembayaran</span>
                <div class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @php
                        echo strtoupper($order[0]->payment_status)
                    @endphp
                </div>
            </label>

            <label class="block text-sm my-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Nomor Telepon</span>
                <div class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @php
                        echo $order[0]->phone
                    @endphp
                </div>
            </label>

        </div>

	</div>
	<!--/container-->
</x-app-layout>
