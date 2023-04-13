<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return response()->json([
            "results" => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = findOrFail($request->category_id);

        $product = $category->products()->create([
            'description'=> $request->description,
            'stock' => $request->stock
        ]);

        return response()->json([
            "results" => $product
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        
        return response()->json([
            "result"=> $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $product_id)
    {
        $category = Category::findOrFail($request->category_id);

        $product = $category->products()->where('id',$product_id)->update([
            'description'=> $request->description,
            'stock' => $request->stock
        ]);

        return response()->json([
            "result"=> $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id)->delete();
        
        return response()->json([
            "result"=> $product
        ]);
    }
}
