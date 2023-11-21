<?php $__env->startSection('content'); ?>
    <h1>Edit Product</h1>

    <?php if(Session::has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(Session::get('success')); ?>

        </div>

    <?php endif; ?>

    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>


<div class="row">
      <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

    <div class="col-lg-12">
        <form method="POST" action="<?php echo e(route('product.update', $product)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?> 
            <div class="card-body">
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" required name="Prod_Name" value="<?php echo e($product->Prod_Name); ?>" class="form-control" value="<?php echo e(old('Prod_Name')); ?>" >
                </div>
                <div class="form-group">
                    <label>Product Details</label>
                    <textarea name="Description" value ="<?php echo e($product->Description); ?>" class="form-control ckeditor "><?php echo e($product->Description); ?></textarea> 
                    
                </div>
               
                <div class="form-group">
                    <label>Product Price</label>
                    <input type="text" required name="Price" value="<?php echo e($product->Price); ?>"  class="form-control" value="<?php echo e(old('Price')); ?>" >
                </div>
                <div class="form-group">
                    <label>Product InventoryID</label>
                    <input type="text" required name="InventoryID" value="<?php echo e($product->InventoryID); ?>"  class="form-control" value="<?php echo e(old('InventoryID')); ?>" >
                </div>
                
                  <div class="form-group">
                    <label>Product Quantity</label>
                    <input type="text"  name="quantity" class="form-control" required value="<?php echo e($product->quantity); ?>" >
                </div>
              
              
                <?php if($product->image): ?>
                        <img src="<?php echo e(asset('uploads/' . $product->image)); ?>" alt="<?php echo e($product->Prod_Name); ?>" class="avatar avatar-sm rounded-circle me-2" width="100">
                    <?php else: ?>
                        No Image
                    <?php endif; ?> 
                <div class="form-group">
                    <label>Product Image</label>
                    <input type="file" name="image" class="form-control-file" >
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u209708021/domains/weaverstore.net/public_html/resources/views/admin/editProduct.blade.php ENDPATH**/ ?>