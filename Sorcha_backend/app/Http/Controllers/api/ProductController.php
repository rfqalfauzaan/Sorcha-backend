<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'weight' => 'required|numeric',
            'shop_id' => 'required|exists:shops,id',
            'description' => 'required|string',
        ]);

        $product = Product::create($request->all());

        return response()->json(['message' => 'Product created successfully', 'data' => $product], 201);
    }
}
