            <style>
                form.logouts {
                   display: inline-block;
               }
               nav.dark\:bg-gray-800.border-b.border-gray-100.dark\:border-gray-700 {
                  color: #fff;
                }
                .text-left {
                   color: #fff;
               }
               table.dataTable thead td {
                padding: 10px 5px !important;
                 max-width: 220px !important;
               }
               .table td {
                 padding: 10px 0.75rem !important;
               }
            </style>
            <header class="app-header"><a class="app-header__logo" href="index.html">Weaver Store</a>
                  <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>

                  <!-- Navbar Right Menu-->
                <ul class="app-nav">
                    <nav x-data="{ open: false }" class="dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                        <div class="mt-3 space-y-1">
                            <!-- Authentication -->
                            Welcome, <?php echo e(Auth::user()->name); ?>

                            <form method="POST" action="<?php echo e(route('logout')); ?>" class="logouts">
                                <?php echo csrf_field(); ?>

                                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault();
                                                    this.closest(\'form\').submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault();
                                                    this.closest(\'form\').submit();']); ?>
                                    <?php echo e(__('Log Out')); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                            </form>
                        </div>
                  
                    </nav>
                    
                </ul>    
            </header>
 <?php /**PATH /home/u209708021/domains/weaverstore.net/public_html/resources/views/admin/layouts/navigation.blade.php ENDPATH**/ ?>