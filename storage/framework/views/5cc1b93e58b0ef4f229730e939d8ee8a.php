
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>Weaver Store</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
        <style type="text/css">
            .dd {
                  margin-bottom: 20;
                }
        </style>
        <?php echo $__env->make('admin.layouts.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="app sidebar-mini">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
                <?php echo $__env->make('admin.layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             
           
            <!-- Page Heading -->
            <?php if(isset($header)): ?>
                <header class="bg-white dark:bg-gray-800 shadow">

                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                      

                    </div>
                </header>
            <?php endif; ?>

            <!-- Page Content -->
          <div class="content-wrapper" style="min-height: 1302.4px;">
            <main class="app-content">
             <?php echo $__env->yieldContent('content'); ?>
              </main>
               <?php echo $__env->make('admin.layouts.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>               
        </div>
        <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>

<?php /**PATH /home/u209708021/domains/weaverstore.net/public_html/resources/views/admin/layouts/app.blade.php ENDPATH**/ ?>