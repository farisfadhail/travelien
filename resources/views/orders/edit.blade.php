<x-app-layout>
    <x-slot name="header">
        {{ __('Order') }}
    </x-slot>

    <!--Container-->
	<div class="w-full mx-auto px-2 ">

        {{-- Menggunakan tag form untuk melakukan input data dengan method default post --}}
        <form method="POST" enctype="multipart/form-data" action="{{ route('user.order.update', $order->id) }}"  class="px-8 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            {{-- Menambahkan csrf agar request form dapat disimpan --}}
            @csrf
            {{-- Method diubah menjadi PUT untuk update data --}}
            @method('PUT')
            <h1 class=" text-2xl font-semibold mb-4 mt-2">Edit Data Order</h1>

            <label class="block text-sm ">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Full Name</span>
                {{-- Membuat input dengan name name --}}
                {{-- Ketika terdapat data name, maka akan dimasukkan datanya sebagai value --}}
                <input
                    class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukkan nama lengkap..."
                    name="name"
                    type="text"
                    value="{{ old('name', $user_order[0]->name)}}"
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Identity Number</span>
                {{-- Membuat input dengan name indentity_number --}}
                {{-- Ketika terdapat data indentity_number, maka akan dimasukkan datanya sebagai value --}}
                <input
                    class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukkan nomor identitas..."
                    name="identity_number"
                    type="number"
                    value="{{ old('identity_number', $user_order[0]->identity_number)}}"
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Phone</span>
                <input
                    class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukkan nomor telepon..."
                    name="phone"
                    type="number"
                    value="{{ old('phone', $user_order[0]->phone)}}"
                />
                <span class="text-xs text-gray-600 dark:text-gray-400">
                  Angka 0 pada awal diganti dengan 62. ex: 62872357125
                </span>
            </label>

            <label class="block text-sm ">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Date</span>
                {{-- Membuat input dengan name date --}}
                {{-- Ketika terdapat data date, maka akan dimasukkan datanya sebagai value --}}
                <input
                    class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="date"
                    type="date"
                    value="{{ old('date', $order->date)}}"
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Ticket Amount</span>
                {{-- Membuat input dengan name ticket_amount --}}
                {{-- Ketika terdapat data ticket_amount, maka akan dimasukkan datanya sebagai value --}}
                <input
                    class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukkan jumlah tiket..."
                    name="ticket_amount"
                    type="number"
                    value="{{ old('ticket_amount', $order->ticket_amount)}}"
                    id="amount"
                />
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">
                    Spot
                </span>
                <select id="spot" class="block w-full mt-1 text-md py-2 rounded-lg dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="spot_id" >
                    <option class="text-gray-400">Pilih destinasi wisata...</option>
                    @foreach ($spots as $s)
                        <option value="{{ $s->id }}" {{ $s->spot_name == $spot[0]->spot_name ? 'selected' : '' }} data-price="{{ $s->ticket_price }}">{{ $s->spot_name }}</option>
                    @endforeach
                </select>
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Total Payment : </span>
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg" id="result"></span>
            </label>

            <div class="flex justify-end mt-4 mb-2">
                <button
                    class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                    type="submit"
                    id="pay_button"
                >
                    Edit Order
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
