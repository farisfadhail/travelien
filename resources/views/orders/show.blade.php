<x-app-layout>
    <x-slot name="header">
        {{ __('Order Show') }}
    </x-slot>

    <!-- Invoice -->
    <div class="w-full sm:px-6 mx-auto my-4 sm:my-10 bg-white shadow-lg p-8">
    <!-- Grid -->
    <div class="mb-5 pb-5 flex justify-between items-center border-b border-gray-200 dark:border-gray-700">
        <div>
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Invoice</h2>
        </div>
        <!-- Col -->

        <div class="inline-flex gap-x-2">
        <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" href="{{ route('user.order.index') }}">
            Back to dashboard
        </a>
        @if ($order[0]->payment_status == 'paid')
            <a  class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                href="{{ route('invoice-pdf', $order[0]->order_id) }}"
            >

                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                </svg>
                Invoice PDF
            </a>
        @endif
        @if ($order[0]->payment_status == 'pending')
            <a  class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                href="{{ route('user.order.edit', $order[0]->order_id) }}"
            >
            Edit
            </a>
        @endif
        </div>
        <!-- Col -->
    </div>
    <!-- End Grid -->

    <!-- Grid -->
    <div class="grid md:grid-cols-2 gap-3">
        <div>
        <div class="grid space-y-3">
            <dl class="grid sm:flex gap-x-3 text-sm">
            <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                Billed to:
            </dt>
            <dd class="text-gray-800 dark:text-gray-200">
                <a class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium" href="#">
                    {{ Auth::user()->email }}
                </a>
            </dd>
            </dl>

            <dl class="grid sm:flex gap-x-3 text-sm">
                <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                    Billing details:
                </dt>
                <dd class="font-medium text-gray-800 dark:text-gray-200">
                    <span class="block font-semibold">{{ $order[0]->name }}</span>
                </dd>
            </dl>

            <dl class="grid sm:flex gap-x-3 text-sm">
                <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                    Phone:
                </dt>
                <dd class="font-medium text-gray-800 dark:text-gray-200">
                    {{ '+'.$order[0]->phone }}
                </dd>
            </dl>

            <dl class="grid sm:flex gap-x-3 text-sm">
                <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                    Status:
                </dt>
                <dd class="font-medium text-gray-800 dark:text-gray-200">
                    {{ strtoupper($order[0]->payment_status) }}
                </dd>
            </dl>
        </div>
        </div>
        <!-- Col -->

        <div>
        <div class="grid space-y-3">
            <dl class="grid sm:flex gap-x-3 text-sm">
            <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                Invoice number:
            </dt>
            <dd class="font-medium text-gray-800 dark:text-gray-200">
                {{ $order[0]->uid }}
            </dd>
            </dl>

            <dl class="grid sm:flex gap-x-3 text-sm">
            <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                Currency:
            </dt>
            <dd class="font-medium text-gray-800 dark:text-gray-200">
                IDR - Indonesia Rupiah
            </dd>
            </dl>

            <dl class="grid sm:flex gap-x-3 text-sm">
            <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                Pay date:
            </dt>
            <dd class="font-medium text-gray-800 dark:text-gray-200">
                @if ($order[0]->payment_status == 'pending')
                    Belum melakukan pembayaran
                @else
                    {{ $payment_date }}
                @endif
            </dd>
            </dl>

            <dl class="grid sm:flex gap-x-3 text-sm">
            <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                Billing method:
            </dt>
            <dd class="font-medium text-gray-800 dark:text-gray-200">
                @if ($order[0]->payment_status == 'pending')
                    Belum melakukan pembayaran
                @else
                    @if ($order[0]->payment_type == 'bank_transfer')
                        {{ 'Bank Transfer - '.strtoupper($order[0]->bank) }}
                    @else
                        {{ strtoupper($order[0]->payment_type) }}
                    @endif
                @endif
            </dd>
            </dl>
        </div>
        </div>
        <!-- Col -->
    </div>
    <!-- End Grid -->

    <!-- Table -->
    <div class="mt-6 border border-gray-200 p-4 rounded-lg space-y-4 dark:border-gray-700">
        <div class="hidden sm:grid sm:grid-cols-5">
        <div class="sm:col-span-2 text-xs font-medium text-gray-500 uppercase">Item</div>
        <div class="text-left text-xs font-medium text-gray-500 uppercase">Qty</div>
        <div class="text-left text-xs font-medium text-gray-500 uppercase">Price per ticket</div>
        <div class="text-right text-xs font-medium text-gray-500 uppercase">Total</div>
        </div>

        <div class="hidden sm:block border-b border-gray-200 dark:border-gray-700"></div>

        <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
        <div class="col-span-full sm:col-span-2">
            <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Item</h5>
            <p class="font-medium text-gray-800 dark:text-gray-200">{{ 'Ticket to '.$order[0]->spot_name }}</p>
        </div>
        <div>
            <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Price per ticket</h5>
            <p class="text-gray-800 dark:text-gray-200">{{ 'Rp. '.number_format($order[0]->ticket_price) }}</p>
        </div>
        <div>
            <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Qty</h5>
            <p class="text-gray-800 dark:text-gray-200">{{ $order[0]->ticket_amount }}</p>
        </div>
        <div>
            <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Total</h5>
            <p class="sm:text-right text-gray-800 dark:text-gray-200">{{ 'Rp. '.number_format($order[0]->total_price) }}</p>
        </div>
        </div>
    </div>
    <!-- End Table -->

    <!-- Flex -->
    <div class="mt-8 flex sm:justify-end">
        <div class="w-full max-w-2xl sm:text-right space-y-2">
        <!-- Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
            <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                <dt class="col-span-3 text-gray-500">Total:</dt>
                <dd class="col-span-2 font-medium text-gray-800 dark:text-gray-200">{{ 'Rp. '.number_format($order[0]->total_price) }}</dd>
            </dl>
            @if ($order[0]->payment_status == 'paid')
                <dl class="grid sm:grid-cols-5 col-span-3 gap-x-3 text-sm mt-8">
                    <dt class="col-span-3 text-gray-500"></dt>
                    <dd class="col-span-2 font-medium text-gray-800 dark:text-gray-200">{!! DNS2D::getBarcodeHTML("$code", 'QRCODE') !!}</dd>
                </dl>
            @endif
        </div>
        <!-- End Grid -->
        </div>
    </div>
    <!-- End Flex -->
    </div>
    <!-- End Invoice -->
</x-app-layout>
