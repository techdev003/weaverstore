<?php echo $__env->make('partials.nevbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('partials.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH /home/u209708021/domains/weaverstore.net/public_html/resources/views/partials/layout.blade.php ENDPATH**/ ?>