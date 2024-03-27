<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show($id)
    {
        // Retrieve the product with its category
        $product = Product::with('category')->find($id);

        // Pass the product to the view
        return view('products.show', ['product' => $product]);
    }

    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC')->get();

        return view('products.index', compact('product'));
    }
    /**
     * Show the form for creating a new resource.
     */

//
    public function create()
    {
        $categories = Category::all();
        return view('products.create', ['categories' => $categories]);
    }
    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        Product::create($request->all());

        return redirect()->route('products')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
//    public function show(string $id)
//    {
//        $product = Product::findOrFail($id);
//
//        return view('products.show', compact('product'));
//    }

    /**
     * Show the form for editing the specified resource.
     */
//    public function edit(string $id)
//    {
//        $product = Product::findOrFail($id);
//
//        return view('products.edit', compact('product'));
//    }
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('products.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->all());

        return redirect()->route('products')->with('success', 'product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products')->with('success', 'product deleted successfully');
    }
}
