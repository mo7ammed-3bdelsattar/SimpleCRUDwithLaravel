<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductControler extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('site.products.index', compact('products'));
    }

    public function create()
    {
        return view('site.products.create');
    }
    public function store(ProductRequest $request)
    {
        // dd();
        $product = Product::create($request->validated());
        return redirect()->route('products.index')->with('success', 'product stored successfully');
    }
    public function show(Product $product)
    {

        return view('site.products.show', compact('product'));
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'product deleted successfully');
    }
    public function edit(Product $product)
    {
        return view('site.products.edit', compact('product'));
    }
    public function update(ProductRequest $request,$id)
    {
        Product::where('id', $id)
            ->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'price'=>$request->price,
            ]);
        return redirect()->route('products.index')->with('success', 'product updated successfully');
    }
}
