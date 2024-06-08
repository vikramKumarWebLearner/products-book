@extends('layouts.app')

@section('content')
<div class="container">
            <div class="row">
                <div class="col-md-10 mt-5 m-auto">
                        <div class="card">
                                <div class="card-body">
                                <form  method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="user_name" class="form-label">User Name</label>
                                            <input type="text" class="form-control" id="user_name" name="user_name" value="{{$order->user_name}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="total" class="form-label">Total</label>
                                            <input type="text" class="form-control" id="total" name="total" value="{{$order->total}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="user_id" class="form-label">User </label>
                                            <select class="form-select" aria-label="Default select example" id="user_id" name="user_id">
                                                @foreach($users as $user)
                                                                <option value="{{ $user->id }}"  {{ $user->id == $order->user_id ? 'selected' : '' }}>
                                                                    {{ $user->name }}
                                                                </option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="product_id" class="form-label">Product Id</label>
                                            <select class="form-select" aria-label="Default select example" id="product_id" name="product_id">
                                          @foreach($products as $product)
                                                        <option value="{{ $product->id }}" {{ $product->id == $order->product_id ? 'selected' : '' }}>
                                                            {{ $product->name }}
                                                        </option>
                                            @endforeach
                                    </select>
                                        </div>
                                </form>
                                </div>
                        </div>
                </div>
            </div>
       </div>
@endsection
