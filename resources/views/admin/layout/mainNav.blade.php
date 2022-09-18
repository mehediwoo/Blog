<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="{{url('/dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
      <li class="nav-item">
        <a href="{{url('/categoris')}}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Category
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url('/post')}}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Post
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url('/tag')}}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Tag
          </p>
        </a>
      </li>
      <br>
        <a href="{{url('/')}}" target="_blank" class="btn btn-warning text-dark">
            Visite Frontend
        </a>
    </ul>
  </nav>
