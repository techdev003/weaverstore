
@extends('admin.layouts.app')
@section('content')


@if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

<div class="container">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-footer">
                <h1 class="tile-title">Product  Management</h1>
                <a href="{{ route('addproduct') }}" class="btn btn-primary dd" id="">Add</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered " id="producttable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>                        
                            <th>Description</th>
                            <th>Quantity</th>
                            
                             <th>Price</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($productData as $product)
                        <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->Prod_Name }}</td>
                        <td>{{ $product->Description }}</td>
                     
                        <td>{{ $product->quantity }}</td>
                        <td>${{ $product->Price }}</td>
                         <td><a href="{{ route('product.edit', $product->id) }}" class="edit btn btn-primary btn-sm">Edit</a>
                          <a href="{{route('product.productDelete', $product->id)}}" class="delete btn btn-danger btn-sm">Delete</a>
                       </td>
                        </tr>
                     @endforeach
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                  
            </div>
        </div>
    </div>
</div>
@endsection;




   