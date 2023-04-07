@extends('layouts.default')

@section('content')
    <section>
        <div class="container px-5 pt-5 mx-auto">
            <form action="{{ route('home') }}" class="flex items-center justify-end space-x-5" method="GET">
                <div>
                    <input
                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        id="name" name="search" type="search" value="{{ request()->search }}">
                </div>

                <div>
                    <button
                        class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded"
                        type="submit">
                        Pesquisar
                    </button>
                </div>
            </form>
        </div>
    </section>
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
