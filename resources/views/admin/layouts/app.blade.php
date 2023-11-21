
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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
        @include('admin.layouts.css')
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="app sidebar-mini">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
                @include('admin.layouts.navigation')
                @include('admin.layouts.sidebar')
             
           
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">

                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                      

                    </div>
                </header>
            @endif

            <!-- Page Content -->
          <div class="content-wrapper" style="min-height: 1302.4px;">
            <main class="app-content">
             @yield('content')
              </main>
               @include('admin.layouts.js')
          </div>               
        </div>
        @include('admin.layouts.footer')
    </body>
</html>

