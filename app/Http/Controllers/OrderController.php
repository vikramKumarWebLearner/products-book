<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Http\Requests\OrderRequest;
class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(10);
        return view("order.index",compact('orders'));
    }

    public function create()
    {
        $order = Order::get()->pluck('user_id');
        $users = User::where('role_id',2)->whereNotIn('id',$order)->get();
        $products = Product::get();
        return view("order.create",compact('users','products'));
    }

    public function store(OrderRequest $request)
    {
        $validatedData = $request->validated();

        $order  = new Order;
        $order->user_name = $validatedData['user_name'];
        $order->total = $validatedData['total'];
        $order->user_id = $validatedData['user_id'];
        $order->product_id = $validatedData['product_id'];
        $order->save();
         return redirect()->route('orders')->with('message', 'Order Added Successfully');
    }

    public function edit($id)
    {
            $order = Order::findOrFail($id);
            $users = User::where(['role_id' => 2,'id' =>$order->user_id])->get();
            $products = Product::where('id',$order->product_id)->get();
            return view('order.edit',compact('order','users','products'));
    }
}
