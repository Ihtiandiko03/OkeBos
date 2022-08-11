<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"> <span>Pengguna</span> </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/dashboard/profil">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Ubah Profil
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/dashboard/pengiriman">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Pengirimanku
            </a>
          </li>
        </ul>

        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"> <span>Administrator</span> </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="/dashboard/admin">
              <span data-feather="grid" class="align-text-bottom"></span>
              Menu Admin
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/dashboard/admin/driver">
              <span data-feather="grid" class="align-text-bottom"></span>
              Agen
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/dashboard/admin/driver">
              <span data-feather="grid" class="align-text-bottom"></span>
              Kurir
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/dashboard/admin/pengiriman">
              <span data-feather="grid" class="align-text-bottom"></span>
              Pengiriman
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/dashboard/rute">
              <span data-feather="grid" class="align-text-bottom"></span>
              Rute
            </a>
          </li>
        </ul>
        @endcan

        
        @can('kurir')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"> <span>Kurir</span> </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="/dashboard/kurir">
              <span data-feather="grid" class="align-text-bottom"></span>
              Pemesanan
            </a>
          </li>
        </ul>
        @endcan


      </div>
    </nav>