<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <i class="far fa-user fa-2x" style="color:#D6D8D9;"></i>
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="{{route('admin.dashboard')}}" class="nav-link {{Request::segment(2)=='dashboard' ? 'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.category.index')}}" class="nav-link {{Request::segment(2)=='category' ? 'active':''}}">
              <i class="nav-icon fab fa-elementor"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.post.index')}}" class="nav-link {{Request::segment(2)=='post' ? 'active':''}}">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>
                Post
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="{{route('admin.order.index')}}" class="nav-link {{Request::segment(2)=='order' ? 'active':''}}">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Order
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="{{route('admin.brandproduct.index')}}" class="nav-link {{Request::segment(2)=='brandproduct' ? 'active':''}}">
              <i class="nav-icon fas fa-copyright"></i>
              <p>
                Brand Product
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.contact.index')}}" class="nav-link {{Request::segment(2)=='contact' ? 'active':''}}">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
               Contact
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.featuredproduct.index')}}" class="nav-link {{Request::segment(2)=='featuredproduct' ? 'active':''}}">
              <i class="nav-icon far fa-thumbs-up"></i>
              <p>
               Featured Product
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.bestseller.index')}}" class="nav-link {{Request::segment(2)=='bestseller' ? 'active':''}}">
              <i class="nav-icon fas fa-award"></i>
              <p>
               Best Seller
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
<div class="ml-3 mt-5">
  <a class="btn btn-secondary" href="{{url('/logout')}}">Log out</a>
</div>
    </div>
    <!-- /.sidebar -->
  </aside>