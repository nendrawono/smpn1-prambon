
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= BASE_URL; ?>"  class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIABK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item <?= ($data['title'] == "Dashboard" ? 'menu-is-opening menu-open' : '') ?>">
            <a href="<?= BASE_URL; ?>/dashboard" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item <?= ($data['title'] == "Master" ? 'menu-is-opening menu-open' : '') ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                MASTER DATA
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= BASE_URL; ?>/masteruser" class="nav-link <?= ($data['title_page'] == "Data Master User" ? 'active' : '') ?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>USERS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= BASE_URL; ?>/mastersiswa" class="nav-link <?= ($data['title_page'] == "Data Master Siswa" ? 'active' : '') ?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SISWA</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= BASE_URL; ?>/masterkelas" class="nav-link <?= ($data['title_page'] == "Data Master Kelas" ? 'active' : '') ?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>KELAS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= BASE_URL; ?>/mastermatpel" class="nav-link <?= ($data['title_page'] == "Data Master Mata Pelajaran" ? 'active' : '') ?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>MATA PELAJARAN</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= BASE_URL; ?>/masterekstra" class="nav-link <?= ($data['title_page'] == "Data Master Ekstrakurikuler" ? 'active' : '') ?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>EKSTRAKURIKULER</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">RAPOR SISWA</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                RAPOR
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
