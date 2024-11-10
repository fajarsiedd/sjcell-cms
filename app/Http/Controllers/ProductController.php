<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('id', $search)->get();
        } else {
            $products = Product::all();
        }


        return view('products.index', ['title' => 'Products', 'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', ['title' => 'Add Product']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {                
        $request->validate([
            'thumbnail' => 'required|file',
        ]);

        $product = new Product([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'category' => $request->get('category'),
            'price' => $request->get('price'),
            'status' => $request->has('status'),
        ]);

        $filePath = $request->file('thumbnail')->store('uploads', 'public');

        $product->thumbnail = $filePath;

        $product->save();

        return redirect('/products')->with('success', 'Product created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        return view('products.show', ['title' => 'Detail Product', 'product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);

        return view('products.edit', ['title' => 'Edit Product', 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        if ($request->file('thumbnail')) {
            // dd(asset('storage/' . $product->thumbnail));
            Storage::delete(asset('storage/' . $product->thumbnail));

            $filePath = $request->file('thumbnail')->store('uploads', 'public');

            $product->thumbnail = $filePath;
        }

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->category = $request->get('category');
        $product->price = $request->get('price');
        $product->status = $request->has('status');

        $product->save();

        return redirect('/products')->with('success', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products')->with('success', 'Product deleted!');
    }
}