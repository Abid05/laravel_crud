
<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <div class="sidebar m-0">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              <img src="https://www.w3schools.com/w3images/avatar5.png" class="img-circle elevation-2"
                  alt="User Image">
          </div>
          <div class="info">
              <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
              data-accordion="false">
              <li class="nav-item">
                  <a href="{{ route('product.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-share"></i>
                      <p>
                          Product
                          <i class="fas fa-angle-right right"></i>
                      </p>
                  </a>
              </li>


              <li class="nav-header">Profile</li>
              
              <li class="nav-item">
                <a href="{{ route('admin.password.change') }}" class="nav-link">
                    <i class="nav-icon far fa-circle text-info"></i>
                    <p class="text">Password Change</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.logout') }}" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Logout</p>
                </a>
            </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>