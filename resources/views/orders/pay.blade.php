<x-app-layout>
    <x-slot name="header">
        {{ __('Pay Order') }}
    </x-slot>

    <!--Container-->
	<div class="w-full mx-auto px-2 ">

        <div class="px-8 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex justify-between">
                <h1 class=" text-2xl font-semibold mb-4 mt-2">Order Data</h1>

                <div class="flex align-middle">
                    <a
                        class=" mr-4 px-4 py-4 font-medium leading-5 text-black transition-colors duration-150 bg-slate-600 border border-transparent rounded-lg active:bg-slate-600 hover:bg-slate-700 focus:outline-none focus:shadow-outline-slate"
                        href="{{ route('order.index') }}"
                    >
                        Back to Dashboard
                    </a>
                    <button
                        class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-400 border border-transparent rounded-lg active:bg-green-400 hover:bg-green-500 focus:outline-none focus:shadow-outline-green"
                        type="submit"
                        id="pay-button"
                    >
                        Pay Now
                    </button>
                </div>
            </div>

            <label class="block text-sm ">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Nama Pemesan</span>
                <div class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @php
                        echo $user_order[0]->name
                    @endphp
                </div>
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Nama Spot</span>
                <div class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @php
                        echo $spot[0]->spot_name
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
                        echo $order[0]->total_price
                    @endphp
                </div>
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Status Pembayaran</span>
                <div class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @php
                        echo $order[0]->payment_status
                    @endphp
                </div>
            </label>

            <label class="block text-sm my-4">
                <span class="text-gray-700 dark:text-gray-400 font-semibold text-lg">Nomor Telepon</span>
                <div class="block w-full py-3 rounded-lg text-md border-gray-400 mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @php
                        echo $user_order[0]->phone
                    @endphp
                </div>
            </label>

        </div>

        <form action="{{ route('order.payment') }}" id="submit-form" method="POST">
            @csrf
            <input type="hidden" name="json" id="json_callback">
            <input type="hidden" name="order_id" value="{{ $order[0]->id }}">
        </form>

	</div>
	<!--/container-->

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

</x-app-layout>
