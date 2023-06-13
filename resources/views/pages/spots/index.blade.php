@extends('layouts.frontend')

@section('content')
    <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-5">
        @foreach ($spots as $spot)
            <a class="rounded overflow-hidden shadow-md ease-in-out transition-all hover:shadow-lg" href="{{ route('spot.show', $spot->id) }}">
                <div class="w-full flex justify-center">
                    <img class="w-56" src="{{ asset($spot->getFirstMediaUrl('images')) }}" alt="Mountain">
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
            </a>
            {{--<h1>{{ $spot->spot_name }}</h1>
            <div>{!! $spot->description !!}</div>--}}
        @endforeach
    </div>
@endsection
