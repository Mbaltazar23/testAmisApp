<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productRequest = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required|integer',
            'points' => 'required|integer',
            'category_id' => 'required',
        ]);

        $productRequest = (object) $productRequest;
        $product = new Product;
        $product->name = $productRequest->name;
        $product->description = $productRequest->description;
        $product->stock = $productRequest->stock;
        $product->points = $productRequest->points;
        $product->category_id = $productRequest->category_id;
        $product->save();
        Alert::success('Success Title', 'Success Message');
        return redirect()->route('productos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required|integer',
            'points' => 'required|integer',
            'category_id' => 'required',
        ]);
        $productUpdate = Product::find($id);
        $productUpdate->name = $request->get('name');
        $productUpdate->description = $request->get('description');
        $productUpdate->stock = $request->get('stock');
        $productUpdate->points = $request->get('points');
        $productUpdate->category_id = $request->get('category_id');
        $productUpdate->update();
        return redirect('/productos')->with('success', 'update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productDelete = Product::find($id);
        $productDelete->delete(); // Easy right?
        return redirect('/productos')->with('success', 'destroy.');
    }
}
