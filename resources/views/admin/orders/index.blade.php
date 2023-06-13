<x-app-layout>
    <x-slot name="header">
        {{ __('Orders') }}
    </x-slot>

    <!--Container-->
	<div class="w-full mx-auto px-2 ">

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
                            <td class="text-center">{{ $order->name }}</td>
                            <td class="text-center">{{ $order->spot_name }}</td>
                            <td class="text-center">{{ $order->ticket_amount }}</td>
                            <td class="text-center">{{ 'Rp. '.number_format($order->total_price) }}</td>
                            <td class="text-center">{{ strtoupper($order->payment_status) }}</td>
                            <td>
                                <div class="flex justify-center">
                                    <a
                                        class=" mr-4 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg active:bg-gray-600 hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"
                                        href="{{ route('admin.order.show', $order->order_id) }}"
                                    >
                                        Detail
                                    </a>
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
