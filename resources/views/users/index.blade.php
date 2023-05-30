<x-app-layout>
    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>

    <!--Container-->
	<div class="w-full mx-auto px-2 ">

		<!--Card-->
		<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


			<table id="dataTable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
				<thead>
					<tr>
						<th data-priority="1">Name</th>
						<th data-priority="2">Email</th>
					</tr>
				</thead>
				<tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-center">{{ $user->name }}</td>
                            <td class="text-center">{{ $user->email }}</td>
                        </tr>
                    @endforeach
				</tbody>

			</table>


		</div>
		<!--/Card-->


	</div>
	<!--/container-->
</x-app-layout>
