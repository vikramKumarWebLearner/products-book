@extends('layouts.app')

@section('content')
<div class="container">
            <div class="row">
                <div class="col-md-10 mt-5 m-auto">
                        <div class="card">
                                <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                                   @csrf
                                        <div class="mb-3">
                                            <label for="product_name" class="form-label">Product Name</label>
                                            <input type="text" class="form-control" id="product_name" name="product_name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="product" class="form-label">Product qty</label>
                                            <input type="text" class="form-control" id="product_qty" name="product_qty" onChange="calVal()">
                                        </div>
                                        <div class="mb-3">
                                            <label for="product" class="form-label">Product amount</label>
                                            <input type="text" class="form-control" id="product_amount" name="product_amount" onChange="calVal()">
                                        </div>
                                        <div class="mb-3">
                                            <label for="product_total" class="form-label">Product total</label>
                                            <input type="text" class="form-control" id="product_total"  name="product_total" disabled >
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                </div>
                        </div>
                </div>
            </div>
       </div>
@endsection


<script>
     function calVal(){
       var qty =  document.getElementById('product_qty').value;
       var amount = document.getElementById('product_amount').value; 
       var total = document.getElementById('product_total');
       total.value = qty * amount;
     }
</script>