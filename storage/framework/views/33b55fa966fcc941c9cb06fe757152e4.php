<?php $__env->startSection('content'); ?>


<?php if(Session::has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(Session::get('success')); ?>

        </div>
    <?php endif; ?>

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
                        <?php $__currentLoopData = $allOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $OrderData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <?php
          $userData = \App\Models\User::where('id', $OrderData->user_id)->first();
          ?>
                        <tr>
                        <td>000<?php echo e($OrderData->id); ?></td>
                        <td><?php echo e($userData->name); ?></td>
                        <td><?php echo e($OrderData->paymentType); ?></td>
                     
                        <td>$<?php echo e($OrderData->total); ?></td>
                        <td><?php echo e($OrderData->status?$OrderData->status: 'Pending'); ?></td>
                         <td><a href="<?php echo e(route('orderDetails', $OrderData->id)); ?>" class="edit btn btn-primary btn-sm">View</a>
                         
                       </td>
                        </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                  
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>;




   
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u209708021/domains/weaverstore.net/public_html/resources/views/admin/allOrder.blade.php ENDPATH**/ ?>