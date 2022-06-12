<!-- Brand Logo -->
<a href="/" class="brand-link">
  <img src="/uploads/logo/logo.png" alt="Shuma Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text font-weight-light">Shuma</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="/uploads/users/user_avatar.png" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">{{Auth::user()->full_name}}</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="#" class="nav-link {{ (request()->routeIs('admin.home')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.places.index') }}" class="nav-link {{ (request()->routeIs('admin.places.*')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-store-alt"></i>
          <p>
            Places
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.users.index') }}" class="nav-link {{ (request()->routeIs('admin.users.*')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Users
          </p>
        </a>
      </li>
      
      <li class="nav-item">
        <a href="{{ route('admin.compatibility-questions.index') }}" class="nav-link {{ (request()->routeIs('admin.questions.*')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-circle-question"></i>
          <p>
            Questions
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview {{ (request()->segment(2) == 'settings') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-cog"></i>
          <p>
            Settings
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link {{ (request()->routeIs('admin.amenities.*')) ? 'active' : '' }}">
              <i class="fas fa-circle nav-icon"></i>
              <p>Amenities</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link {{ (request()->routeIs('admin.interests.*')) ? 'active' : '' }}">
              <i class="fas fa-circle nav-icon"></i>
              <p>Interests</p>
            </a>
          </li>
          <li class="nav-item has-treeview {{ (request()->segment(4) == 'access-control-levels') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                ACL
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link {{ (request()->routeIs('admin.roles.*')) ? 'active' : '' }}">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link {{ (request()->routeIs('admin.permissions.*')) ? 'active' : '' }}">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Permissions</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ (request()->segment(3) == 'locations') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Locations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.countries.index') }}" class="nav-link {{ (request()->routeIs('admin.countries.*')) ? 'active' : '' }}">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>countries</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.regions.index') }}" class="nav-link {{ (request()->routeIs('admin.regions.*')) ? 'active' : '' }}">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>regions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.cities.index') }}" class="nav-link {{ (request()->routeIs('admin.cities.*')) ? 'active' : '' }}">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>cities</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>
            {{ __('Logout') }}
          </p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>

    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>