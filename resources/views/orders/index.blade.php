<x-app-layout>
    <x-slot name="header">
        {{ __('Orders') }}
    </x-slot>

    <!--Container-->
	<div class="w-full mx-auto px-2 ">

        {{-- Tombol untuk create user-order --}}
        <a href="{{ route('user-order.create') }}">
            <button
                class="my-4 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
            >
                Create +
            </button>
        </a>

		<!--Card-->
		<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

            {{-- Membuat table dari DataTables --}}
			<table id="dataTable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
				<thead>
					<tr>
						<th data-priority="1">Date</th>
						<th data-priority="2">Name</th>
						<th data-priority="3">Spot</th>
                        <th data-priority="4">Ticket Amount</th>
                        <th data-priority="5">Total Price</th>
						<th data-priority="6">Payment Status</th>
						<th data-priority="7">Action</th>
					</tr>
				</thead>
				<tbody>
                    {{-- Membuat iterasi dari data orders --}}
                    @foreach ($orders as $order)
                        <tr>
                            <td class="text-center">{{ $order->date }}</td>
                            <td class="text-center">
                                @php
                                    //$order->user_order_id
                                    $userOrderName = DB::select('SELECT * from user_orders where id = ?', [$order->user_order_id]);
                                    echo $userOrderName[0]->name;
                                @endphp
                            </td>
                            <td class="text-center">
                                @php
                                    $spotName = DB::select('SELECT * from spots where id = ?', [$order->spot_id]);
                                    echo $spotName[0]->spot_name;
                                @endphp
                            </td>
                            <td class="text-center">{{ $order->ticket_amount }}</td>
                            <td class="text-center">{{ 'Rp. '.number_format($order->total_price) }}</td>
                            <td class="text-center">{{ $order->payment_status }}</td>
                            <td>
                                <div class="flex justify-center">
                                    <a
                                        class=" mr-4 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg active:bg-gray-600 hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"
                                        href="{{ route('order.show', $order->id) }}"
                                    >
                                        Detail
                                    </a>
                                    {{-- Jika payment_status != PENDING maka code didalamnya tidak akan dijalankan --}}
                                    @if($order->payment_status == 'PENDING')
                                        <a
                                            class=" mr-4 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
                                            href="{{ route('order.payment-page', $order->id) }}"
                                            id="pay-button"
                                        >
                                            Pay
                                        </a>
                                        <?php
                                            $userOrder = DB::select('SELECT * FROM user_orders where id = ? limit 1', [$order->user_order_id]);
                                        ?>

                                        <a
                                            class=" mr-4 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow"
                                            href="{{ route('user-order.edit', $userOrder[0]->id) }}"
                                        >
                                            Edit
                                        </a>
                                    @endif
                                    {{-- Form untuk menghapus data order --}}
                                    <form method="POST" action="{{ route('order.destroy', $order->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class=" mr-4 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                                            type="submit"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
				</tbody>

			</table>


		</div>
		<!--/Card-->


	</div>
	<!--/container-->
</x-app-layout>
