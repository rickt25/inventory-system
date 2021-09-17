<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{ asset('assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link @if(request()->routeIs('dashboard')) active @endif" href="{{ route('dashboard') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if(request()->routeIs('category')) active @endif" href="{{ route('category') }}">
                <i class="ni ni-tag text-orange"></i>
                <span class="nav-link-text">Categories</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="map.html">
                <i class="ni ni-bag-17 text-primary"></i>
                <span class="nav-link-text">Products</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.html">
                <i class="ni ni-delivery-fast text-yellow"></i>
                <span class="nav-link-text">Orders</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>