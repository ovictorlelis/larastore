@extends('layouts.default')

@section('content')
    <section class="text-gray-600">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-wrap -m-4">
                @forelse ($products as $product)
                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                        <a class="block relative h-48 rounded overflow-hidden">
                            <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                                src="@if ($product->cover) {{ \Illuminate\Support\Facades\Storage::url($product->cover) }} @else https://placehold.co/600x400 @endif">
                        </a>
                        <div class="mt-4">
                            <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->name }}</h2>
                            <p class="mt-1">R$ {{ $product->price }}</p>
                        </div>
                        <a class="mt-3 text-indigo-500 inline-flex items-center"
                            href="{{ route('product', $product->slug) }}">
                            Ver mais
                            <svg class="w-4 h-4 ml-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                @empty
                    <p class="text-center w-full">Nenhum produto cadastrado</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
