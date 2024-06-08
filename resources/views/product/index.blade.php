@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 mt-5 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="heading ">
                            <h4 class="text-center">All Product</h5>
                                <a href="{{ route('product.create')}}" class="btn btn-primary">Create Product</a>
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
                                <th scope="col">Product name</th>
                                <th scope="col">Product qty</th>
                                <th scope="col">Product amount</th>
                                <th scope="col"> Product total</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider" id="tbody">
                            @forelse ($products as $product)
                                  <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->qty}}</td>
                                        <td>{{$product->amount}}</td>
                                        <td>{{$product->total}}</td>
                                        <td><a href="{{route('product',['id' =>$product->id])}}" class="btn btn-danger">Remove Product</a></td>
                                  </tr>
                            @empty
                                <tr>
                                <td>No Product</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="col-12">
                              <p>=====================================================================</p>
                              @php
                                        $grandTotal=0;
                              @endphp
                               @foreach($products as $product)
                                    @php
                                                $grandTotal+=$product->total;
                                    @endphp
                               @endforeach
                               <p class="ms-4">Total:-{{$grandTotal}}</p>
                        </div>
                        {{ $products->links() }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
@endsection