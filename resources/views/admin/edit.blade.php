@extends('layouts.default')

@section('content')
    <section class="text-gray-600">
        <div class="container px-5 py-10 mx-auto">
            <div class="lg:w-2/4 w-full mx-auto overflow-auto">
                <div class="flex items-center justify-between mb-2">
                    <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Editar produto</h1>
                </div>

                <form action="{{ route('admin.product.update', $product->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap">

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label class="leading-7 text-sm text-gray-600" for="name">Nome do produto</label>
                                <input
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    id="name" name="name" type="text" value="{{ old('name', $product->name) }}">
                                @error('name')
                                    <p class="text-red-400 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label class="leading-7 text-sm text-gray-600" for="name">Preço</label>
                                <input
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    id="price" name="price" type="text"
                                    value="{{ old('price', $product->price) }}" />
                                @error('price')
                                    <p class="text-red-400 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label class="leading-7 text-sm text-gray-600" for="name">Estoque</label>
                                <input
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    id="stock" name="stock" type="text"
                                    value="{{ old('stock', $product->stock) }}">
                                @error('stock')
                                    <p class="text-red-400 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label class="leading-7 text-sm text-gray-600" for="name">Imagem de capa</label>
                                <input
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    id="cover" name="cover" type="file" />
                                @error('cover')
                                    <p class="text-red-400 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <img alt="ecommerce" class="h-40 block mx-auto rounded"
                                src="@if ($product->cover) {{ \Illuminate\Support\Facades\Storage::url($product->cover) }} @else https://placehold.co/600x400 @endif">
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label class="leading-7 text-sm text-gray-600" for="name">Descrição</label>
                                <textarea
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    id="description" name="description">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <p class="text-red-400 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <button
                                class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded"
                                type="submit">Editar</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
