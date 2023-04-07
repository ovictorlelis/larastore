<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.home', compact('products'));
    }

    public function edit(Product $product)
    {
        return view('admin.edit', compact('product'));
    }

    public function update()
    {
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string',
            'price' => 'string|nullable',
            'stock' => 'integer|nullable',
            'cover' => 'file|nullable',
            'description' => 'string|required',
        ]);
        $input['slug'] = Str::slug($input['name']);

        if (!empty($input['cover']) && $input['cover']->isValid()) {
            $file = $input['cover'];
            $path = $file->store('public/products');
            $input['cover'] = $path;
        }

        Product::create($input);

        return redirect()->route('admin.products');
    }
}
