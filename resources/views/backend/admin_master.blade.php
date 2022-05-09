<!DOCTYPE html>
<html lang="en">

    @include('backend.layouts.head')

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">

    @include('backend.layouts.header')

  <!-- Left side column. contains the logo and sidebar -->
    @include('backend.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
    @section('content')
    @show


  <!-- /.content-wrapper -->
    @include('backend.layouts.footer')



  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


@include('backend.layouts.partials.scripts')


</body>
</html>
