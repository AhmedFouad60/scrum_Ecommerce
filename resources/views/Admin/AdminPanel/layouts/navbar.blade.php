    <header class="main-header">
          <!-- Logo -->
          <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
          </a>
          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
              <span class="sr-only">Toggle navigation</span>
            </a>
        @include('Admin.AdminPanel.layouts.menu')

          </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
              <div class="pull-left image">
                <img src="{{url('Design/adminlte')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
              <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                      <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                      </button>
                    </span>
              </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
              <li class="header">MAIN NAVIGATION</li>


              <li class="treeview">
                <a href="#">
                  <i class="fa fa-dashboard"></i> <span>Users</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="active"><a href="/admin/users"><i class="fa fa-circle-o"></i> All User</a></li>
                  <li><a href="/admin/users/create"><i class="fa fa-circle-o"></i> Create User</a></li>
                </ul>
              </li>



              <li class="treeview">
                <a href="#">
                  <i class="fa fa-dashboard"></i> <span>Categories</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="active"><a href="/admin/categories"><i class="fa fa-circle-o"></i> All Categories</a></li>
                  <li><a href="/admin/categories/create"><i class="fa fa-circle-o"></i> Create Category</a></li>
                </ul>
              </li>



                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Products</span>
                        <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="/admin/products"><i class="fa fa-circle-o"></i> All Products</a></li>
                        <li><a href="/admin/products/create"><i class="fa fa-circle-o"></i> Create new Product</a></li>
                    </ul>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Roles</span>
                        <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="/admin/roles"><i class="fa fa-circle-o"></i> All Roles</a></li>
                        <li><a href="/admin/roles/create"><i class="fa fa-circle-o"></i> Create Role</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Permissions</span>
                        <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="/admin/permissions"><i class="fa fa-circle-o"></i> All Permissions</a></li>
                        <li><a href="/admin/permissions/create"><i class="fa fa-circle-o"></i> Create permission</a></li>
                    </ul>
                </li>



               </ul>
          </section>
          <!-- /.sidebar -->
    </aside>
