<?php $__env->startSection('content'); ?>


<?php if(Session::has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(Session::get('success')); ?>

        </div>
    <?php endif; ?>
    
    <style>
        .w-16.h-16.flex.items-center.border.border-gray-300 {
    display: inline-block;
    width: 30%;
}
.flex-1.flex.flex-col.justify-between.pb-3 {
    display: inline-block;
    width: 30%;
    word-break: break-word;
}

h3.text-ellipsis.mb-4 {
    padding-left: 20px;
}
.flex.flex-col.justify-between.items-end.pb-3.w-32 {
    display: inline-block;
    width: 38%;
}
.text-lg.mb-4 {
    text-align: right;
}

.flex.flex-col.justify-between.items-end.pb-3.w-32.quinetity {
    width: 19%;
}

.flex.flex-col.justify-between.items-end.pb-3.w-32 {
    display: inline-block;
    width: 17%;
}
    </style>

<div class="container">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-footer">
                <h1 class="tile-title">Order Details</h1>
               
            </div>
            
            
            
            <main class="p-5">

      <div class="container lg:w-2/3 xl:w-2/3 mx-auto">
        <h1 class="text-3xl font-bold mb-6">Order # 000<?php echo e($orderdetails->id); ?> Details</h1>
  
        <div class="bg-white p-3 rounded-md shadow-md">
          <div>
            <table class="table-sm">
              <tbody>
                <tr>
                  <td class="font-bold">Order # 000</td>
                  <td><?php echo e($orderdetails->id); ?></td>
                </tr>
                <tr>
                  <td class="font-bold">Order Date</td>
                  <?php 
                   $dateTime = new DateTime($orderdetails->created_at);
                   $formattedDate = $dateTime->format("M j, h:ia");
                   ?>
                  <td><?php echo e($formattedDate); ?></td>
                </tr>
                <tr>
                  <td class="font-bold">Status</td>
                  <td>
                    <span 
                      ><?php echo e($orderdetails->status?$orderdetails->status: 'pending'); ?></span
                    >
                  </td>
                </tr>
                <tr>
                  <td class="font-bold">SubTotal</td>
                  <td>$<?php echo e($orderdetails->total); ?></td>
                </tr>
              </tbody>
            </table>
          </div>

          <hr class="my-5" />

          <!-- Order Items -->
          <?php $__currentLoopData = $OrderItemData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
          <?php
          $productdata = \App\Models\Product::where('id', $order->product_id)->first();
          ?>
         

            <div>
            <!-- Product Item -->
            <div class="flex gap-6">
              <div class="w-16 h-16 flex items-center border border-gray-300">
                <img src="<?php echo e(asset('uploads/' . $productdata->image)); ?>" alt="<?php echo e($productdata->image); ?>" / width="200">
              </div>
              <div class="flex-1 flex flex-col justify-between pb-3">
                <h3 class="text-ellipsis mb-4">
                <?php echo e($productdata->Prod_Name); ?>

                </h3>
              </div>
              
                 <div class="flex flex-col justify-between items-end pb-3 w-32 quinetity">
                <div class="text-lg mb-4">Quantity:  <?php echo e($order->product_qty); ?></div>
              </div>
              <div class="flex flex-col justify-between items-end pb-3 w-32">
                <div class="text-lg mb-4">Price: $ <?php echo e($productdata->Price * $order->product_qty); ?></div>
              </div>
            </div>
            <!--/ Product Item -->
            <hr class="my-2" />
           
          </div>
    
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <!--/ Order Items -->

          
        </div>
      </div>
    </main>
            </div>
                     </div>
                              </div>
                              
                              <?php $__env->stopSection(); ?>;
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u209708021/domains/weaverstore.net/public_html/resources/views/admin/orderdetails.blade.php ENDPATH**/ ?>