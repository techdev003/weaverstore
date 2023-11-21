@if(Auth::id())
    @php
        $role = Auth()->user()->role;
    @endphp
            
   @if($role == 'admin')

        <aside class="app-sidebar">
            <div class="app-sidebar__user">
                <img class="app-sidebar__user-avatar" src="{{ asset('storage/' . Auth::user()->image) }}" style="width: 53px; height: 50px;">


                <div>
                    <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
                </div>
            </div>
            <ul class="app-menu">
                
                        <li>
                            <a class="app-menu__item {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                <i class="app-menu__icon fa fa-dashboard"></i>
                                <span class="app-menu__label">Dashboard</span>
                            </a>
                        </li>

                                                      <li>
                                    <a class="treeview-item {{ Request::is('admin/productlist') ? 'active' : '' }}" href="{{ route('productlist') }}">
                                      
                                        All Product
                                    </a>
                                </li>
                                <li>
                                    <a class="treeview-item {{ Request::is('admin/addproduct') ? 'active' : '' }}" href="{{ route('addproduct') }}">
                               
                                        Add Product
                                    </a>
                                </li>
                                
                                   <li>
                                    <a class="treeview-item {{ Request::is('admin/order') ? 'active' : '' }}" href="{{ route('order.list') }}">
                                      
                                        Order
                                    </a>
                                </li>
                                
                                  
                            </ul>
                        </li> 
       
            </ul>
        </aside>

    @endif
@endif

<style type="text/css">
    .app-menu__item.active
    {
        color: yellow;
    }
    .treeview-item.active {
        color: greenyellow;
    }
</style>
