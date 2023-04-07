<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.home', compact('products'));
    }

    public function edit()
    {
        return view('admin.edit');
    }

    public function update()
    {
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store()
    {
    }
}
