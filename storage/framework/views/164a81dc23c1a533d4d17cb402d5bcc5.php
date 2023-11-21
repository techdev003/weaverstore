<?php echo $__env->make('partials.nevbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('partials.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH /var/www/html/akshay/ecommerceProject/resources/views/partials/layout.blade.php ENDPATH**/ ?>