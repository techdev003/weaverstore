
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
                <h1 class="tile-title">All Order</h1>
               
            </div>

            <div class="table-responsive">
                <table class="table table-bordered " id="allorder">
                    <thead>
                        <tr>
                             <th>Order ID</th>
                            <th>Buyer</th>                        
                            <th>PaymentType</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($allOrder as $OrderData)
                               @php
          $userData = \App\Models\User::where('id', $OrderData->user_id)->first();
          @endphp
                        <tr>
                        <td>000{{ $OrderData->id }}</td>
                        <td>{{ $userData->name }}</td>
                        <td>{{ $OrderData->paymentType }}</td>
                     
                        <td>${{ $OrderData->total }}</td>
                        <td>{{ $OrderData->status?$OrderData->status: 'Pending'  }}</td>
                         <td><a href="{{ route('orderDetails', $OrderData->id)}}" class="edit btn btn-primary btn-sm">View</a>
                         
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




   