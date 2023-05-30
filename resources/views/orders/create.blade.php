<x-app-layout>
    <x-slot name="header">
        {{ __('Order') }}
    </x-slot>

    <!--Container-->
	<div class="w-full mx-auto px-2 ">

        <form method="POST" enctype="multipart/form-data" action="{{ route('order.store') }}"  class="px-8 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @csrf
            <h1 class=" text-2xl font-semibold mb-4 mt-2">Create Data Order</h1>

            <label class="block text-sm ">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Date</span>
                <input
                    class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="date"
                    type="date"
                    value="{{ old('date')}}"
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Ticket Amount</span>
                <input
                    class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukkan jumlah tiket..."
                    name="ticket_amount"
                    type="number"
                    value="{{ old('ticket_amount')}}"
                    id="amount"
                />
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">
                    Spot
                </span>
                <select id="spot" class="block w-full mt-1 text-md py-2 rounded-lg dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="spot_id" >
                    <option class="text-gray-400">Pilih destinasi wisata...</option>
                    @foreach ($spots as $spot)
                        <option value="{{ $spot->id }}" data-price="{{ $spot->ticket_price }}">{{ $spot->spot_name }}</option>
                    @endforeach
                </select>
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Total Payment : </span>
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg" id="result"></span>
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
                    id="pay_button"
                >
                    Add Order
                </button>
            </div>

        </form>

	</div>
	<!--/container-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fungsi untuk menghitung total spot
            function calculateTotal() {
                var amount = parseInt(document.getElementById('amount').value) || 0;
                var spot = parseInt(document.getElementById('spot').options[document.getElementById('spot').selectedIndex].getAttribute('data-price')) || 0;

                var total = amount * spot;

                document.getElementById('result').textContent = total;
            }

            // Tambahkan event listener saat input diubah
            document.getElementById('amount').addEventListener('input', function() {
                calculateTotal();
            });

            document.getElementById('spot').addEventListener('change', function() {
                calculateTotal();
            });

            // Panggil fungsi calculateTotal() saat halaman dimuat
            calculateTotal();
        });
    </script>
</x-app-layout>
