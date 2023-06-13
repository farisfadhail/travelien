@extends('layouts.frontend')

@section('content')
    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                    <div class="text-gray-600">
                        <p class="font-medium text-lg">Personal Details</p>
                        <p>Please fill out all the fields.</p>
                        <div class="mt-4 rounded overflow-hidden shadow-md ease-in-out transition-all hover:shadow-lg">
                            <div class="w-full flex justify-center">
                                <img class="w-56" src="{{ asset($spot_image) }}" alt="Mountain">
                            </div>
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $spot->spot_name }}</div>
                                <div class="text-gray-700 text-base">
                                    {!! Str::limit($spot->description, 100) !!}
                                </div>
                            </div>
                            <div class="px-6 pt-4 pb-2 text-right">
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-[#ff7158] mr-2 mb-2">
                                    {{ 'Rp. '.number_format($spot->ticket_price) }}
                                    <span class="text-gray-700">
                                        per ticket
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <form class="lg:col-span-2" action="{{ route('user.order.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                            <div class="md:col-span-5">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('name', $user_order[0]->name)}}" />
                                @error('name')
                                    <small class="text-red-700">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="md:col-span-3">
                                <label for="identity_number">Identity Number</label>
                                <input type="number" name="identity_number" id="identity_number" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('identity_number', $user_order[0]->identity_number)}}" placeholder="" />
                                <span class="text-xs text-gray-600 dark:text-gray-400">
                                    Masukkan nomor KTP atau Passport
                                </span>
                                @error('identity_number')
                                    <small class="text-red-700">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="phone">Phone</label>
                                <input type="number" name="phone" id="phone" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('phone', $user_order[0]->phone)}}" placeholder="" />
                                <span class="text-xs text-gray-600 dark:text-gray-400">
                                    Angka 0 pada awal diganti dengan 62. ex: 62872357125
                                </span>
                                @error('phone')
                                    <small class="text-red-700">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="md:col-span-3">
                                <label for="date">Reservation Date</label>
                                <input type="date" name="date" id="date" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('date', $order->date)}}" placeholder="" />
                                @error('date')
                                    <small class="text-red-700">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="ticket_amount">Ticket Amount</label>
                                <input type="number" name="ticket_amount" id="amount" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('ticket_amount', $order->ticket_amount)}}" placeholder="" />
                                @error('ticket_amount')
                                    <small class="text-red-700">{{ $message }}</small>
                                @enderror
                            </div>

                            <label class="md:col-span-3 md:mt-4">
                                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Total Payment : </span>
                                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg" id="result">0</span>
                            </label>

                            <div class="md:col-span-2 md:mt-4 text-right">
                                <div class="inline-flex items-end">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Order</button>
                                </div>
                            </div>
                            <input class="hidden" type="hidden" name="spot_id" id="spot_id" value="{{ $spot->id }}" data-price="{{ $spot->ticket_price }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Event listener untuk menghitung total secara otomatis saat nilai jumlah tiket berubah
        document.getElementById('amount').addEventListener('input', calculateTotal);

        function calculateTotal() {
            var jumlahTiket = parseInt(document.getElementById('amount').value) || 0;
            var hargaPerTiket = parseInt(document.getElementById('spot_id').getAttribute('data-price'));

            var totalHarga = jumlahTiket * hargaPerTiket;

            document.getElementById('result').innerHTML = totalHarga;
        }
    </script>

@endsection
