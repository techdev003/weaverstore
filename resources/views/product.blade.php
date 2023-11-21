
@extends('partials.layout')

@section('content')
<style>
    span.descreption {
    color: black;
    font-size: 18px;
}
</style>
<p x-text="id"></p>

<main class="p-5">
  <div class="container mx-auto">
    <div class="grid gap-6 grid-cols-1 lg:grid-cols-5">
      <div class="lg:col-span-3">
        
        <div
          x-data="{
images: ['http://127.0.0.1:8000/uploads/1698664896.jpg'],
activeImage: null,
prev() {
  let index = this.images.indexOf(this.activeImage);
  if (index === 0) 
      index = this.images.length;
  this.activeImage = this.images[index - 1];
},
next() {
  let index = this.images.indexOf(this.activeImage);
  if (index === this.images.length - 1) 
      index = -1;
  this.activeImage = this.images[index + 1];
},
init() {
  this.activeImage = this.images.length > 0 ? this.images[0] : null
}
}"
        >
          <div class="relative">
           <template x-for="image in images">
              <div
                x-show="activeImage === image"
                class="aspect-w-3 aspect-h-2"
              >
                <img src="{{ asset('uploads/' . $shopProducts[0]->image) }}" alt="" class="w-auto mx-auto"/>
              </div>
            </template>
            <a
              @click.prevent="prev"
              class="cursor-pointer bg-black/30 text-white absolute left-0 top-1/2 -translate-y-1/2"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-10 w-10"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M15 19l-7-7 7-7"
                />
              </svg>
            </a>
            <a
              @click.prevent="next"
              class="cursor-pointer bg-black/30 text-white absolute right-0 top-1/2 -translate-y-1/2"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-10 w-10"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M9 5l7 7-7 7"
                />
              </svg>
            </a>
          </div>
          <div class="flex">
            <template x-for="image in images">
              <a
                @click.prevent="activeImage = image"
                class="cursor-pointer w-[80px] border border-gray-300 hover:border-purple-500 flex items-center justify-center"
                :class="{'border-purple-600': activeImage === image}"
              >
              <img :src="{{ asset('uploads/' . $shopProducts[0]->image) }}" alt="" class="w-auto mx-auto"/>
              </a>
            </template>
          </div>
        </div>
      </div>
      <div class="lg:col-span-2">
        <h1 class="text-lg font-semibold">
        {{$shopProducts[0]->Prod_Name}}
        </h1>
        <div class="text-xl font-bold mb-6">$ {{$shopProducts[0]->Price}}</div>
        <div class="flex items-center mb-6">
          <div class="flex items-center text-orange-400">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
              />
            </svg>
          </div>
          <a
            href="#"
            class="ml-3 font-normal text-purple-600 hover:text-purple-500"
          >
            67 reviews
          </a>
        </div>
        <div class="flex items-center justify-between mb-5">
          <label for="quantity" class="block font-bold mr-4">
            Quantity
          </label>
          <input
            type="number"
            name="quantity"
            x-ref="quantityEl"
            value="1"
            class="w-32 focus:border-purple-500 focus:outline-none rounded"
          />
        </div>
        <button  data-productid="{{ $shopProducts[0]->id }}"
          class="btn-primary py-4 text-lg flex justify-center min-w-0 w-full mb-6 add-to-cart-btn2"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mr-2"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
            />
          </svg>
          Add to Cart
        </button>
        <div class="mb-6" x-data="{expanded: false}">
          <div
            x-show="expanded"
            x-collapse.min.120px
            class="text-gray-500 wysiwyg-content"
          >
  
            <span class="descreption">Description:</span>
            <p class="">
            {{$shopProducts[0]->Description	}}
            </p>
          </div>
          <p class="text-right">
            <a
              @click="expanded = !expanded"
              href="javascript:void(0)"
              class="text-purple-500 hover:text-purple-700"
              x-text="expanded ? 'Read Less' : 'Read More'"
            ></a>
          </p>
        </div>
      </div>
    </div>
  </div>
</main>


<main class="p-5">
      <!-- Product List -->
      <div
        class="grid gap-8 grig-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 p-5"
      >
      @foreach ($lataestProducts as $product)
    
        <!-- Product Item -->
        <div
          x-data="productItem({
            id: 1, 
            image: 'img/1_1.jpg', 
            title: 'Logitech G502 HERO High Performance Wired Gaming Mouse, HERO 25K Sensor, 25,600 DPI, RGB, Adjustable Weights, 11',
            price: 17.99
          })"
          class="border border-1 border-gray-200 rounded-md hover:border-purple-600 transition-colors bg-white"
        >
          <a href="{{ route('shopProduct', ['slug' => $product->slug]) }}" class="block overflow-hidden">
       
          @if ($product->image)
    <img src="{{ asset('uploads/' . $product->image) }}" alt="{{$product->image}}" style="width: 317px; height:200px">
@else
    No Image
@endif

          </a>
          <div data-productname="{{ $product->Prod_Name }}" class="p-4">
            <h3 class="text-lg">
              <a href="{{ route('shopProduct', ['slug' => $product->slug]) }}">
              {{ $product->Prod_Name }}
              </a>
            </h3>
            <h5 data-productprice="{{ $product->Price }}" class="font-bold"> {{ $product->Price }}</h5>
          </div>
          <div class="flex justify-between py-3 px-4">

          @php
        
    $productExists = \App\Models\Wishlist::where('product_id', $product->id)
        ->where('user_id', auth()->user()? auth()->user()->id: '')
        ->exists();
    $buttoncss = $productExists ? 'response-success' : '';
    $foricon = $productExists ? 'wishlist-icon' : '';
@endphp
            <button
            data-productid="{{ $product->id }}" 
              class="w-10 h-10 rounded-full border border-1 border-purple-600 flex items-center justify-center hover:bg-purple-600 hover:text-white active:bg-purple-800 transition-colors wishlistItem {{$buttoncss}}"
              :class="isInWatchlist(id) ? 'bg-purple-600 text-white' : 'text-purple-600'"
            >
              <svg
              id="wishlist-icon"
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 {{$foricon}}"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                />
              </svg>
            </button>
            <button data-productid="{{ $product->id }}"  class="btn-primary add-to-cart-btn">
              Add to Cart
            </button>
          </div>
        </div>
        <!--/ Product Item -->
        <!-- Product Item -->
         
       
        @endforeach
        <!--/ Product Item -->
         </div>
      </div>
      <!--/ Product List -->
    </main>
<!-- Toast -->
<div
  x-data="toast"
  x-show="visible"
  x-transition
  x-cloak
  @notify.window="show($event.detail.message)"
  class="fixed w-[400px] left-1/2 -ml-[200px] top-16 py-2 px-4 pb-4 bg-emerald-500 text-white"
>
  <div class="font-semibold" x-text="message"></div>
  
  <button
    @click="close"
    class="absolute flex items-center justify-center right-2 top-2 w-[30px] h-[30px] rounded-full hover:bg-black/10 transition-colors"
  >
    <svg
      xmlns="http://www.w3.org/2000/svg"
      class="h-6 w-6"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
      stroke-width="2"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        d="M6 18L18 6M6 6l12 12"
      />
    </svg>
  </button>
  <!-- Progress -->
  <div>
    <div
      class="absolute left-0 bottom-0 right-0 h-[6px] bg-black/10"
      :style="{'width': `${percent}%`}"
    ></div>
  </div>
</div>
<!--/ Toast -->
</body>
</html>

@endsection