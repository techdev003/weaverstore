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
                <h1 class="tile-title">Product  Management</h1>
                <a href="<?php echo e(route('addproduct')); ?>" class="btn btn-primary dd" id="">Add</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered " id="producttable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>                        
                            <th>Description</th>
                            <th>Quantity</th>
                            
                             <th>Price</th>
                            <th>Action</th>
                        </tr>
                        <?php $__currentLoopData = $productData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td><?php echo e($product->id); ?></td>
                        <td><?php echo e($product->Prod_Name); ?></td>
                        <td><?php echo e($product->Description); ?></td>
                     
                        <td><?php echo e($product->quantity); ?></td>
                        <td>$<?php echo e($product->Price); ?></td>
                         <td><a href="<?php echo e(route('product.edit', $product->id)); ?>" class="edit btn btn-primary btn-sm">Edit</a>
                          <a href="<?php echo e(route('product.productDelete', $product->id)); ?>" class="delete btn btn-danger btn-sm">Delete</a>
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




   
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u209708021/domains/weaverstore.net/public_html/resources/views/admin/productTable.blade.php ENDPATH**/ ?>