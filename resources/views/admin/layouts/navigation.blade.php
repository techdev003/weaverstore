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
                            Welcome, {{ Auth::user()->name }}
                            <form method="POST" action="{{ route('logout') }}" class="logouts">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>
                  
                    </nav>
                    
                </ul>    
            </header>
 