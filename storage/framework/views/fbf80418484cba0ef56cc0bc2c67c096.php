<?php if(Auth::id()): ?>
    <?php
        $role = Auth()->user()->role;
    ?>
            
   <?php if($role == 'admin'): ?>

        <aside class="app-sidebar">
            <div class="app-sidebar__user">
                <img class="app-sidebar__user-avatar" src="<?php echo e(asset('storage/' . Auth::user()->image)); ?>" style="width: 53px; height: 50px;">


                <div>
                    <p class="app-sidebar__user-name"><?php echo e(Auth::user()->name); ?></p>
                </div>
            </div>
            <ul class="app-menu">
                
                        <li>
                            <a class="app-menu__item <?php echo e(Request::is('admin/dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">
                                <i class="app-menu__icon fa fa-dashboard"></i>
                                <span class="app-menu__label">Dashboard</span>
                            </a>
                        </li>

                                                      <li>
                                    <a class="treeview-item <?php echo e(Request::is('admin/productlist') ? 'active' : ''); ?>" href="<?php echo e(route('productlist')); ?>">
                                      
                                        All Product
                                    </a>
                                </li>
                                <li>
                                    <a class="treeview-item <?php echo e(Request::is('admin/addproduct') ? 'active' : ''); ?>" href="<?php echo e(route('addproduct')); ?>">
                               
                                        Add Product
                                    </a>
                                </li>
                                
                                   <li>
                                    <a class="treeview-item <?php echo e(Request::is('admin/order') ? 'active' : ''); ?>" href="<?php echo e(route('order.list')); ?>">
                                      
                                        Order
                                    </a>
                                </li>
                                
                                  
                            </ul>
                        </li> 
       
            </ul>
        </aside>

    <?php endif; ?>
<?php endif; ?>

<style type="text/css">
    .app-menu__item.active
    {
        color: yellow;
    }
    .treeview-item.active {
        color: greenyellow;
    }
</style>
<?php /**PATH /home/u209708021/domains/weaverstore.net/public_html/resources/views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>