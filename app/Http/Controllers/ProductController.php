<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductGroup;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('enabled', true)->get();
        return $products;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $product = Product::create([
            'title' => $data['title'],
            'name' => $data['name'],
            'description' => $data['description'],
            'group_id' => $data['group'],
            'price' => $data['price'],
            'stock' => $data['stock'],
            'image' => $data['image'],
            'enabled' => true
        ]);
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productid)
    {
        $data = $request->all();
        $product = Product::find($productid);
        $product->title = $request->title;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->group_id = $request->group;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->image = $request->image;

        $product->save();

        return $product;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $productid)
    {
        $product_delete = Product::find($productid);
        $product_delete->delete();
    }

    public function allGroups()
    {
        return ProductGroup::where('enabled', true)->get();
    }

}
