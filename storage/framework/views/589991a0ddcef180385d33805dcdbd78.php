<?php $__env->startSection('content'); ?>

<main class="p-5">
      <div class="container lg:w-2/3 xl:w-2/3 mx-auto">
        <h1 class="text-3xl font-bold mb-6">Your Watchlist</h1>

        <!-- Product Items -->
      <div class="bg-white p-4 rounded-lg shadow">
        <?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
        <div x-data="productItem(product)" class="flex flex-col sm:flex-row items-center gap-4">
                <img src="<?php echo e(asset('uploads/' . $wishlist->product->image)); ?>" class="w-36" alt="<?php echo e($wishlist->product->image); ?>" />
                <div class="flex flex-col justify-between">
                  <div class="flex justify-between mb-3">
                    <h3>
                    <?php echo e($wishlist->product->Prod_Name); ?>

                    </h3>
                    <span class="text-lg font-semibold"> $ <?php echo e($wishlist->product->Price); ?> </span>
                  </div>
                  <div class="flex justify-end items-center">
                    <a
                      href="#"
                      data-item-id=" <?php echo e($wishlist->id); ?>"
                      class="text-purple-600 hover:text-purple-500 deletewishlist"
                      >Remove</a
                    >
                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/akshay/ecommerceProject/resources/views/wishlist.blade.php ENDPATH**/ ?>