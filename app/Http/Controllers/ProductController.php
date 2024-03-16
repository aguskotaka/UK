<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::paginate(2);
        return view('product',  compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
        ]);

        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }
    public function update(Request $request, $id)
    {

        $product = $request->validate([
            'product_name' => 'string',
            'product_price'=> 'numeric',
            'stock'=> 'numeric',
        ]);

        Product::findOrFail($id)->update($product);
        // dd($product);
        // die;
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('product.index');
    }
}
