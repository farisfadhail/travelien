@extends('layouts.frontend')

@section('content')
    <main class="pt-8 pb-16 px-8 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900">
        <div class="flex justify-between mx-auto max-w-screen-xl ">
            <div class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <div class="flex justify-center">
                    <img src="{{ asset($spot_image) }}" class=" w-4/5 mb-8" alt="">
                </div>
                <header class="mb-2 lg:mb-4 not-format flex justify-between">
                    <div class="">
                        <h1 class="mb-2 text-3xl font-bold leading-tight text-gray-900 lg:mb-2 lg:text-3xl dark:text-white">{{ $spot->spot_name }}</h1>
                        <h3 class="text-lg font-semibold leading-tight text-[#ff7158] lg:text-lg dark:text-white">
                            {{ 'Rp. '.number_format($spot->ticket_price) }}
                            <span class="text-gray-900">
                                per ticket
                            </span>
                        </h3>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('user.order.createPage', $spot->id) }}"
                            class=" px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                        >
                            Buy Ticket Now
                        </a>
                        <h3 class="mt-4 text-gray-900 lg:text-lg dark:text-white" style="font-size: 16px">
                            Telah dipesan {{ $orders }} kali
                        </h3>
                    </div>
                </header>
                <div class="lead text-2xl font-semibold mb-2">
                    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
                    Deskripsi
                </div>
                <div class="lead">{!! $spot->description !!}</div>
                <figure class="mt-8 flex justify-center">
                    {!! $spot->link_maps !!}
                </figure>
                </section>
            </article>
        </div>
    </main>
@endsection
