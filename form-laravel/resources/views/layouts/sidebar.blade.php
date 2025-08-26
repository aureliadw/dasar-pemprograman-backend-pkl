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
              CRUD
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.pembayaran.index') }}" class="nav-link">
                <i class="nav-icon fas fa-angle-right"></i>
                <p>Pembayaran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.pengajuan.index') }}" class="nav-link">
                <i class="nav-icon fas fa-angle-right"></i>
                <p>Pengajuan Penawaran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.posting-proyek.index') }}" class="nav-link">
                <i class="nav-icon fas fa-angle-right"></i>
                <p>Posting Proyek</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.ulasan.index') }}" class="nav-link">
                <i class="nav-icon fas fa-angle-right"></i>
                <p>Ulasan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.portofolio.index') }}" class="nav-link">
                <i class="nav-icon fas fa-angle-right"></i>
                <p>Portofolio</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.manajemen-tugas.index') }}" class="nav-link">
                <i class="nav-icon fas fa-angle-right"></i>
                <p>Manajemen Tugas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.users.index') }}" class="nav-link">
                <i class="nav-icon fas fa-angle-right"></i>
                <p>Registrasi</p>
              </a>
            </li>

             {{-- Tampilkan khusus admin --}}
            @role('admin')
              <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-lock"></i>
                  <p>Manajemen Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('permissions.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-key"></i>
                  <p>Manajemen Permission</p>
                </a>
              </li>
            @endrole
            
          </ul>
        </li>

      </ul>
    </nav>
  </div>
</aside>
