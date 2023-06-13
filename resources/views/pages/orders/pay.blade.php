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
                                <div class="font-bold text-xl mb-2">{{ $order[0]->spot_name }}</div>
                                <div class="text-gray-700 text-base">
                                    {!! Str::limit($order[0]->description, 100) !!}
                                </div>
                            </div>
                            <div class="px-6 pt-4 pb-2 text-right">
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-[#ff7158] mr-2 mb-2">
                                    {{ 'Rp. '.number_format($order[0]->ticket_price) }}
                                    <span class="text-gray-700">
                                        per ticket
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                            <div class="md:col-span-5">
                                    <label for="name">Full Name</label>
                                    <input disabled type="text" name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $order[0]->name }}" />
                                    @error('name')
                                    <small class="text-red-700">{{ $message }}</small>
                                    @enderror
                                </div>
    
                                <div class="md:col-span-3">
                                    <label for="identity_number">Identity Number</label>
                                    <input type="number" name="identity_number" id="identity_number" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $order[0]->identity_number }}" placeholder="" disabled/>
                                    <span class="text-xs text-gray-600 dark:text-gray-400">
                                        Masukkan nomor KTP atau Passport
                                    </span>
                                    @error('identity_number')
                                        <small class="text-red-700">{{ $message }}</small>
                                    @enderror
                                </div>
    
                                <div class="md:col-span-2">
                                    <label for="phone">Phone</label>
                                    <input type="number" name="phone" id="phone" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $order[0]->phone }}" placeholder="" disabled/>
                                    <span class="text-xs text-gray-600 dark:text-gray-400">
                                        Angka 0 pada awal diganti dengan 62. ex: 62872357125
                                    </span>
                                    @error('phone')
                                    <small class="text-red-700">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <div class="md:col-span-3">
                                    <label for="date">Reservation Date</label>
                                    <input type="text" name="date" id="date" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $formattedDate }}" placeholder=""  disabled/>
                                    @error('date')
                                        <small class="text-red-700">{{ $message }}</small>
                                    @enderror
                                </div>
    
                                <div class="md:col-span-2">
                                    <label for="ticket_amount">Ticket Amount</label>
                                    <input type="number" name="ticket_amount" id="amount" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $order[0]->ticket_amount }}" placeholder="" disabled/>
                                    @error('ticket_amount')
                                        <small class="text-red-700">{{ $message }}</small>
                                        @enderror
                                </div>
    
                                <label class="md:col-span-3 md:mt-4">
                                    <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Total Payment : </span>
                                    <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">{{ $order[0]->total_price }}</span>
                                </label>

                                <div class="md:col-span-2 md:mt-4 text-right">
                                    <div class="inline-flex items-end">
                                        <a href="{{ route('user.order.index') }}" class="font-bold py-2 px-4 rounded">Batal</a>
                                    </div>
                                    <div class="inline-flex items-end">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                            type="submit"
                                            id="pay-button"
                                        >
                                        Pay Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('user.order.payment') }}" id="submit-form" method="POST">
                        @csrf
                        <input type="hidden" name="json" id="json_callback">
                        <input type="hidden" name="order_id" value="{{ $order[0]->order_id }}">
                    </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                window.snap.pay('{{ $snap_token }}', {
                onSuccess: function(result){
                    console.log(result);
                    response_to_form(result);
                },
                onPending: function(result){
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                    response_to_form(result);
                },
                onError: function(result){
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                    response_to_form(result);
                },
                onClose: function(){
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                    response_to_form(result);
                }
            })
        });

        function response_to_form(result) {
            document.getElementById('json_callback').value = JSON.stringify(result);
            $('#submit-form').submit();
        }
    </script>
    @endsection
    