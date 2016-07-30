@include('admin.layout.header')

<div id="wrapper">
@include('admin.layout.navbar')
 <div id="page-wrapper">
@yield('content')
</div>
<!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

@include('admin.layout.media')
@include('admin.layout.footer')