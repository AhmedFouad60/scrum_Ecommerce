@include('Admin.AdminPanel.layouts.header')
@include('Admin.AdminPanel.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @yield('breadcrumb')

  <!-- Main content -->
  <section class="content">
    @include('Admin.AdminPanel.layouts.message')
    @yield('content')
  </section>
  <!-- /.content -->
</div>

@include('Admin.AdminPanel.layouts.footer')
