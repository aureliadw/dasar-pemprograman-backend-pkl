<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="#" class="brand-link">
    <span class="brand-text font-weight-light">My Dashboard</span>
  </a>

  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

        {{-- Dashboard --}}
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>

        {{-- Admin Menu --}}
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>
              Admin
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.pembayaran.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pembayaran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.pengajuan-penawaran.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengajuan Penawaran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.posting-proyek.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Posting Proyek</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.ulasan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ulasan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Portofolio</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>CRUD Form 6</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>CRUD Form 7</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
  </div>
</aside>
