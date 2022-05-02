<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @include('admin.includes.head')
    </head>

    <body class="hold-transition sidebar-mini">
        <div id="adminapp">
            <div class="wrapper">
                <!-- Navbar -->
                @include('admin.includes.navbar')

                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <!-- Main Sidebar Container -->
                    @include('admin.includes.main-sidebar')
                    <!-- /.sidebar -->
                </aside>

                <div class="content-wrapper">
                    @include('admin.includes.messages')
                    <!-- Content Wrapper. Contains page content -->
                    @yield('content')
                </div>
                <!-- Main Footer -->
                @include('admin.includes.footer')
            </div>
        </div>
        <!-- REQUIRED SCRIPTS -->
        <script src="/js/app.js"></script>
    </body>

    </html>