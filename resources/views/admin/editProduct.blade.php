@extends('admin.layouts.app')

@section('content')
    <h1>Edit Product</h1>

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>

    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="row">
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="col-lg-12">
        <form method="POST" action="{{ route('product.update', $product) }}" enctype="multipart/form-data">
        @csrf
    @method('PATCH') 
            <div class="card-body">
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" required name="Prod_Name" value="{{ $product->Prod_Name }}" class="form-control" value="{{ old('Prod_Name') }}" >
                </div>
                <div class="form-group">
                    <label>Product Details</label>
                    <textarea name="Description" value ="{{ $product->Description }}" class="form-control ckeditor ">{{ $product->Description }}</textarea> 
                    
                </div>
               
                <div class="form-group">
                    <label>Product Price</label>
                    <input type="text" required name="Price" value="{{ $product->Price }}"  class="form-control" value="{{ old('Price') }}" >
                </div>
                <div class="form-group">
                    <label>Product InventoryID</label>
                    <input type="text" required name="InventoryID" value="{{ $product->InventoryID }}"  class="form-control" value="{{ old('InventoryID') }}" >
                </div>
                
                  <div class="form-group">
                    <label>Product Quantity</label>
                    <input type="text"  name="quantity" class="form-control" required value="{{ $product->quantity }}" >
                </div>
              
              
                @if ($product->image)
                        <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->Prod_Name }}" class="avatar avatar-sm rounded-circle me-2" width="100">
                    @else
                        No Image
                    @endif 
                <div class="form-group">
                    <label>Product Image</label>
                    <input type="file" name="image" class="form-control-file" >
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
