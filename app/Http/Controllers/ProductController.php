<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
     
    // show all product
      public function index()
      {
          $products = Product::paginate(10);
           return view('product.index',compact("products"));
      }

    //   product create
      public function create()
      {
        return view('product.create');
      }

      public function store(ProductRequest $request)
      {
        $validatedData = $request->validated();
        $product           = new  Product;
        $product->name = $validatedData['product_name'];
        $product->qty = $validatedData['product_qty'];
        $product->amount = $validatedData['product_amount'];
        $product->total       =  $validatedData['product_qty'] * $validatedData['product_amount'];
        $product->save();
        return redirect()->route('products')->with('message', 'Product Added Successfully');
      }

      public function delete($id)
      {
         $product = Product::findOrFail($id);
          $product->delete();
          return redirect()->route('products')->with('message', 'Product deleted successfully.');
      }
}
