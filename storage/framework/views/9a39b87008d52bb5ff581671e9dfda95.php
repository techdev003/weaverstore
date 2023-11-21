<?php $__env->startSection('content'); ?>
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
        
        <?php if(Session::has('success')): ?>
   <div class="alert alert-info"><?php echo e(Session::get('success')); ?></div>
<?php endif; ?>

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
                        ><i class="fa fa-remove" style="font-size:24px"></i></a
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
              <?php 
            if(session('cart')) { ?>
            <div class="updatebtns"> <button type="submit" class="btn block btn-primary btn-sm">Update</button></div>
           
          <div>
          <div class="border-t border-gray-300 pt-4">
            <div class="flex justify-between subtotals">
              <span class="font-semibold">Subtotal</span>
              <span class="text-xl" x-text="`$<?php echo e($total); ?>`"></span>
            </div>
            <p class="text-gray-500 mb-6">
              Shipping and taxes calculated at checkout.
            </p>

            <div class="Proceedto"><a href="<?php echo e(route('checkout.index')); ?>" class="btn-primary  py-3 text-lg">
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u209708021/domains/weaverstore.net/public_html/resources/views/cart.blade.php ENDPATH**/ ?>