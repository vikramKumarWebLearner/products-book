@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 mt-5 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="heading ">
                            <h4 class="text-center">All Orders</h5>
                                <a href="{{ route('order.create')}}" class="btn btn-primary">Create Order</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Order id</th>
                                <th scope="col">Order total</th>
                                <th scope="col">Order user</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider" id="tbody">
                            @forelse ($orders as $order)
                                  <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->total}}</td>
                                        <td>{{$order->user_name}}</td>
                                        <td><a href="{{route('order.edit',['id' =>$order->id])}}" class="btn btn-primary">View Order</a></td>
                                  </tr>
                            @empty
                                <tr>
                                <td>No Order</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection