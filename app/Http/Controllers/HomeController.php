<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query();

        $products->when($request->search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        });


        return view('home', [
            'products' => $products->get()
        ]);
    }
}
