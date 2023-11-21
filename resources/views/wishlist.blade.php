@extends('partials.layout')

@section('content')

<main class="p-5">
      <div class="container lg:w-2/3 xl:w-2/3 mx-auto">
        <h1 class="text-3xl font-bold mb-6">Your Watchlist</h1>

        <!-- Product Items -->
      <div class="bg-white p-4 rounded-lg shadow">
        @foreach ($wishlists as $wishlist)
          
        <div x-data="productItem(product)" class="flex flex-col sm:flex-row items-center gap-4">
                <img src="{{ asset('uploads/' . $wishlist->product->image) }}" class="w-36" alt="{{$wishlist->product->image}}" />
                <div class="flex flex-col justify-between">
                  <div class="flex justify-between mb-3">
                    <h3>
                    {{ $wishlist->product->Prod_Name }}
                    </h3>
                    <span class="text-lg font-semibold"> $ {{ $wishlist->product->Price }} </span>
                  </div>
                  <div class="flex justify-end items-center">
                    <a
                      href="#"
                      data-item-id=" {{ $wishlist->id }}"
                      class="text-purple-600 hover:text-purple-500 deletewishlist"
                      >Remove</a
                    >
                  </div>
                </div>
              </div>
              @endforeach
              <?php if(count($wishlists) == 0){ ?>
                  
               <h2>Wishlist not available</h2>
            <?php   }
              
              
              ?>
         
</div>
        <div
          x-data="{
          get items() {
            return this.$store.header.watchingItems
          }
        }"
          class="bg-white p-4 rounded-lg shadow"
        >
          <template x-for="product of items">
            <div>
              <!-- Product Item -->
              <div x-data="productItem(product)" class="flex flex-col sm:flex-row items-center gap-4">
                <img src="/src/img/1_1.jpg" class="w-36" alt="" />
                <div class="flex flex-col justify-between">
                  <div class="flex justify-between mb-3">
                    <h3>
                      Logitech G502 HERO High Performance Wired Gaming Mouse,
                      HERO 25K Sensor, 25,600 DPI, RGB, Adjustable Weights, 11
                    </h3>
                    <span class="text-lg font-semibold"> $17.99 </span>
                  </div>
                  <div class="flex justify-end items-center">
                    <a
                      href="#"
                      @click.prevent="removeFromWatchlist()"
                      class="text-purple-600 hover:text-purple-500"
                      >Remove</a
                    >
                  </div>
                </div>
              </div>
              <!--/ Product Item -->
              <hr class="my-5" />
            </div>
          </template>
        </div>
        <!--/ Product Items -->
      </div>
    </main>
  </body>
</html>


@endsection