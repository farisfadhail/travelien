<x-app-layout>
    <x-slot name="header">
        {{ __('Spots') }}
    </x-slot>

    <!--Container-->
	<div class="w-full mx-auto px-2 ">

        {{-- Tombol untuk create user-order --}}
        <a href="{{ route('admin.spot.create') }}">
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
						<th data-priority="1">Spot Name</th>
						<th data-priority="2">Ticket Price</th>
						<th data-priority="3">Village</th>
						<th data-priority="4">District</th>
						<th data-priority="5">Action</th>
					</tr>
				</thead>
				<tbody>
                    {{-- Membuat iterasi dari variable $spots untuk kemudian ditampilkan --}}
                    @foreach ($spots as $spot)
                        <tr>
                            <td class="text-center">{{ $spot->spot_name }}</td>
                            <td class="text-center">{{ 'Rp. '.number_format($spot->ticket_price) }}</td>
                            <td class="text-center">{{ $spot->village }}</td>
                            <td class="text-center">{{ $spot->district }}</td>
                            <td>
                                <div class="flex justify-center">
                                    <a
                                        class=" mr-4 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg active:bg-gray-600 hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"
                                        href="{{ route('admin.spot.show', $spot->id) }}"
                                    >
                                        Detail
                                    </a>
                                    <a
                                        class=" mr-4 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow"
                                        href="{{ route('admin.spot.edit', $spot->id) }}"
                                    >
                                        Edit
                                    </a>
                                    {{-- Form untuk menghapus data order --}}
                                    <form id="deleteForm" action="{{ route('admin.spot.destroy', $spot->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"  onclick="return confirmDelete()" class="mr-4 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">Delete</button>
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

    <script>
        function confirmDelete() {
            var result = confirm("Are you sure you want to delete this data?");
            return result;
        }
    </script>
</x-app-layout>
