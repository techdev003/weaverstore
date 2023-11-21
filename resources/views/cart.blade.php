
@extends('partials.layout')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .quantityinput {
  width: 45%;
  border-radius: 16px;
  margin-left: 20px;
}

.alert.alert-info {
    background-color: #059669;
    text-align: center;
    padding-top: 13px;
    padding-bottom: 13px;
    color: #ffff;
}
.updatebtns {
    display: flex;
    justify-content: flex-end;
}
.flex.justify-between.subtotals {
    display: flex;
    align-items: center;
    justify-content: end !important;
}
span.font-semibold {
    padding-right: 25px;
}
p.text-gray-500.mb-6 {
    text-align: right;
}
.Proceedto {
    display: flex;
    justify-content: flex-end;

}
</style>
<main class="p-5">
      <div class="container lg:w-2/3 xl:w-2/3 mx-auto">
        <h1 class="text-3xl font-bold mb-6">Your Cart Items</h1>
        
        @if (Session::has('success'))
   <div class="alert alert-info">{{ Session::get('success') }}</div>
@endif

        <div
          x-data="{
          get items() {
            return Object.values(this.$store.header.cartItemsObject)
          },
          get total() {
            return this.items.reduce((accum, next) => accum + next.price * next.quantity, 0).toFixed(2)
          }
        }"
          class="bg-white p-4 rounded-lg shadow"
        >  @php $total = 0 @endphp
          <!-- Product Items -->
          <form action="{{ route('updateCart') }}" method="post" id="updateCartForm">
              @csrf
            
          @if(session('cart'))

        
                @foreach(session('cart') as $id => $cartItem)
                @php $total += $cartItem['price'] * $cartItem['quantity'] @endphp
          <div>
                <div
               
                  x-data="productItem(product)"
                  class="w-full flex flex-col sm:flex-row items-center gap-4"
                >
                
                  <a href="/src/product.html" class="w-36 h-32 flex items-center justify-center overflow-hidden">
     
  <img src="{{ asset('uploads/' . $cartItem['image']) }}" alt="{{$cartItem['image']}}" style="width: 317px;">

                  </a>
                  <div class="flex-1 flex flex-col justify-between">
                    <div class="flex justify-between mb-3">
                      <h3 x-text="product.title"></h3>
                      <span class="text-lg font-semibold">
                
                        $ {{$cartItem['price']}}<span x-text="product.price"></span>
                      </span>
                    </div>
                    <div class="flex justify-between items-center">
                      <div class="flex items-center">
                        Qty
                       
                        <input min="0" name="quantity[{{ $id }}]" value="{{ $cartItem['quantity'] }}" type="number" class="form-control px-1 quantityinput" id="quantity{{ $id }}">
                      </div>

                      <div class="flex justify-between items-center">
                    
                      <a
                        @click.prevent="removeItemFromCart()"
                        href="#" class="deleteCart" data-item-id="{{ $id }}"
                        class="text-purple-600 hover:text-purple-500"
                        ><i class="fa fa-remove" style="font-size:24px"></i></a
                      >
                    </div>
                  </div>
                </div>
                <!--/ Product Item -->
                <hr class="my-5" />
              </div>
          @endforeach
          @endif
          <from>
              <?php 
            if(session('cart')) { ?>
            <div class="updatebtns"> <button type="submit" class="btn block btn-primary btn-sm">Update</button></div>
           
          <div>
          <div class="border-t border-gray-300 pt-4">
            <div class="flex justify-between subtotals">
              <span class="font-semibold">Subtotal</span>
              <span class="text-xl" x-text="`${{ $total }}`"></span>
            </div>
            <p class="text-gray-500 mb-6">
              Shipping and taxes calculated at checkout.
            </p>

            <div class="Proceedto"><a href="{{ route('checkout.index') }}" class="btn-primary  py-3 text-lg">
    Proceed to Checkout
</a></div>
  <?php  } else{ ?>
     <h2>Product not available</h2> 
      
 <?php } ?>
  

          </div>
        </div>
      </div>
    </main>
  </body>
</html>

@endsection