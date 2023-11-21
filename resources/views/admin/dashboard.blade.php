@extends('admin.layouts.app')

@section('content')

<style>
    .allorder {
    background-color: #ffffff;
    width: 171px;
    padding: 15px;
    margin-top: 56px;
}
</style>
<div class="content-wrapper" style="min-height: 1302.4px;">
 


<div class="container">
    <div class="col-md-12">
       <h2>Welcome Admin Dashboard</h2> 
       <div class="row">
           <div class="col-md-4">
       <div class="allorder">
       <h5>Item Sold</h5>
       <h3>{{$allorder}}</h3>
       </div>
       
       </div>
         <div class="col-md-4">
        <div class="allorder">
       <h5>Total Sale</h5>
       <h3>${{ number_format($totalsale,2) }}</h3>
       </div>
        </div>
        
           <div class="col-md-4">
        <div class="allorder">
       <h5>All product quantity</h5>
       <h3>{{ $totalquatity }}</h3>
  
       </div>
        </div>
       
       </div>
        </div>
          </div>
            </div>


@endsection
