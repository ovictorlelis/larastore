@extends('layouts.default')

@section('content')
    <section class="text-gray-600">
        <div class="container px-5 py-10 mx-auto">
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <div class="flex items-center justify-between mb-2">
                    <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Produtos</h1>
                    <a class="flex ml-auto text-white bg-indigo-500 border-0 py-1.5 px-3 text-sm focus:outline-none hover:bg-indigo-600 rounded"
                        href="{{ route('admin.product.create') }}">Adicionar</a>
                </div>
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">#
                            </th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"
                                style="width: 150px">Imagem</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Nome</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Valor</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Estoque</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 text-right">
                                Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse ($products as $product)
                            <tr @if ($loop->even) class="bg-gray-100" @endif>
                                <td class="px-4 py-3">{{ $product->id }}</td>
                                <td class="px-4 py-3">
                                    <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                                        src="@if ($product->cover) {{ \Illuminate\Support\Facades\Storage::url($product->cover) }} @else https://placehold.co/600x400 @endif">
                                </td>
                                <td class="px-4 py-3">{{ $product->name }}</td>
                                <td class="px-4 py-3">R$ {{ $product->price }}</td>
                                <td class="px-4 py-3">{{ $product->stock }}</td>
                                <td class="px-4 py-3 text-sm text-right space-x-3 text-gray-900">
                                    <a class="mt-3 text-indigo-500 inline-flex items-center"
                                        href="{{ route('admin.product.edit', $product->id) }}">Editar</a>
                                    <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST"
                                        onsubmit="return confirm('Deseja excluir esse produto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="mt-3 text-indigo-500 inline-flex items-center" type="submit">
                                            Deletar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <p>Nenhum produto cadastrado</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
