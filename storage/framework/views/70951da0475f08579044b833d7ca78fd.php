<?php $__env->startSection('content'); ?>



<main class="p-5">
      <!-- Product List -->
      <div
        class="grid gap-8 grig-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 p-5"
      >
     <?php 
      if ($productData) {  ?>
      <?php $__currentLoopData = $productData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
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

      
          <a href="<?php echo e(route('shopProduct', ['slug' => $product->Prod_Name])); ?>" class="block overflow-hidden">
       
          <?php if($product->image): ?>
    <img src="<?php echo e(asset('uploads/' . $product->image)); ?>" alt="<?php echo e($product->image); ?>" style="width: 317px; height:200px">
<?php else: ?>
    No Image
<?php endif; ?>

          </a>
          <div data-productname="<?php echo e($product->Prod_Name); ?>" class="p-4">
            <h3 class="text-lg">
              <a href="<?php echo e(route('shopProduct', ['slug' => $product->Prod_Name])); ?>">
              <?php echo e($product->Prod_Name); ?>

              </a>
            </h3>
            <h5 data-productprice="<?php echo e($product->Price); ?>" class="font-bold"> Price: $ <?php echo e($product->Price); ?></h5>
          </div>
          <div class="flex justify-between py-3 px-4">
          <?php
          if (auth()->check()) {
    $productExists = \App\Models\Wishlist::where('product_id', $product->id)
        ->where('user_id', auth()->user()->id)
        ->exists();
    $buttoncss = $productExists ? 'response-success' : '';
    $foricon = $productExists ? 'wishlist-icon' : '';
          }else{
            $buttoncss = '';
            $foricon = '';
          }
?>

<button
    data-productid="<?php echo e($product->id); ?>" 
    class="w-10 h-10 rounded-full border border-1 border-purple-600 flex items-center justify-center hover:bg-purple-600 hover:text-white active:bg-purple-800 transition-colors wishlistItem <?php echo e($buttoncss); ?>"
    :class="isInWatchlist(id) ? 'bg-purple-600 text-white' : 'text-purple-600'"
>
    <svg
        id="wishlist-icon"
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6 <?php echo e($foricon); ?>"
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

            <button data-productid="<?php echo e($product->id); ?>"  class="btn-primary add-to-cart-btn">
              Add to Cart
            </button>
          </div>
        </div>
        <!--/ Product Item -->
        <!-- Product Item -->
         
   
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php }  ?>
        </div>
        <!--/ Product Item -->
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/akshay/ecommerceProject/resources/views/home.blade.php ENDPATH**/ ?>