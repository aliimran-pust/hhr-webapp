@include('backend.partials.page_head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('backend.partials.navbar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div><!-- /.content-wrapper -->

        @include('backend.partials.footer')
    </div>
    <!-- ./wrapper -->

    @include('backend.partials.page_tail')
</body>

</html>
