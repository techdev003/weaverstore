<?php $__env->startSection('content'); ?>

<style>
  .quantityinput {
  width: 45%;
  border-radius: 16px;
  margin-left: 20px;
}

</style>
<main class="p-5">
      <div class="container lg:w-2/3 xl:w-2/3 mx-auto">
        <h1 class="text-3xl font-bold mb-6">Your Cart Items</h1>

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
        >  <?php $total = 0 ?>
          <!-- Product Items -->
          <form action="<?php echo e(route('updateCart')); ?>" method="post" id="updateCartForm">
              <?php echo csrf_field(); ?>
            
          <?php if(session('cart')): ?>

        
                <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $total += $cartItem['price'] * $cartItem['quantity'] ?>
          <div>
                <div
               
                  x-data="productItem(product)"
                  class="w-full flex flex-col sm:flex-row items-center gap-4"
                >
                
                  <a href="/src/product.html" class="w-36 h-32 flex items-center justify-center overflow-hidden">
     
  <img src="<?php echo e(asset('uploads/' . $cartItem['image'])); ?>" alt="<?php echo e($cartItem['image']); ?>" style="width: 317px;">

                  </a>
                  <div class="flex-1 flex flex-col justify-between">
                    <div class="flex justify-between mb-3">
                      <h3 x-text="product.title"></h3>
                      <span class="text-lg font-semibold">
                
                        $ <?php echo e($cartItem['price']); ?><span x-text="product.price"></span>
                      </span>
                    </div>
                    <div class="flex justify-between items-center">
                      <div class="flex items-center">
                        Qty
                       
                        <input min="0" name="quantity[<?php echo e($id); ?>]" value="<?php echo e($cartItem['quantity']); ?>" type="number" class="form-control px-1 quantityinput" id="quantity<?php echo e($id); ?>">
                      </div>

                      <div class="flex justify-between items-center">
                    
                      <a
                        @click.prevent="removeItemFromCart()"
                        href="#" class="deleteCart" data-item-id="<?php echo e($id); ?>"
                        class="text-purple-600 hover:text-purple-500"
                        >Remove</a
                      >
                    </div>
                  </div>
                </div>
                <!--/ Product Item -->
                <hr class="my-5" />
              </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
          <from>
          <?php if(session('cart')): ?>
             <button type="submit" class="btn block btn-primary btn-sm" style="margin-left: 826px;">Update</button>
             <?php endif; ?>
          <div>
          <div class="border-t border-gray-300 pt-4">
            <div class="flex justify-between">
              <span class="font-semibold">Subtotal</span>
              <span class="text-xl" x-text="`$<?php echo e($total); ?>`"></span>
            </div>
            <p class="text-gray-500 mb-6">
              Shipping and taxes calculated at checkout.
            </p>

            <a href="<?php echo e(route('checkout.index')); ?>" class="btn-primary w-full py-3 text-lg">
    Proceed to Checkout
</a>

          </div>
        </div>
      </div>
    </main>
  </body>
</html>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/akshay/ecommerceProject/resources/views/cart.blade.php ENDPATH**/ ?>