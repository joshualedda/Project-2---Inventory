<aside class="left-sidebar">
  <div>

    <div class="brand-logo d-flex align-items-center justify-content-center py-3">
      <a href="<?= base_url('dashboard'); ?>" class="text-nowrap logo-img">
        <img src="<?= base_url('assets/images/logo.png'); ?>" width="120" alt="Logo" />
      </a>
    </div>


    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar>
      <ul id="sidebarnav">

        <!-- Home Section -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Home</span>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('user/dashboard'); ?>">
            <i class="ti ti-layout-dashboard"></i>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('user/myfile'); ?>">
            <i class="ti ti-files"></i>
            <span class="hide-menu">My Files</span>
          </a>
        </li>


        <!-- Inventory Management -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Inventory</span>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('user/departments'); ?>">
            <i class="ti ti-building"></i>
            <span class="hide-menu">Departments</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('user/files'); ?>">
            <i class="ti ti-file-text"></i>
            <span class="hide-menu">Files</span>
          </a>
        </li>

        <!-- Commented for future refference -->
        <!-- <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('user/categories'); ?>">
            <i class="ti ti-folder"></i>
            <span class="hide-menu">Categories</span>
          </a>
        </li> -->


        <!-- Commented for the meantime -->
        <!-- <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('types'); ?>">
            <i class="bi bi-layers"></i>
            <span class="hide-menu">File Types</span>
          </a>
          </li>
          -->


        <!-- Commented for the meantime, for future use -->
        <!-- <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Reports</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('user/reports'); ?>">
            <i class="ti ti-report-analytics"></i>
            <span class="hide-menu">Generate Reports</span>
          </a>
        </li> -->

        <!-- Settings -->
        <!-- <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">System Settings</span>
        </li> -->

        <!-- Users -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">User</span>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('user/profile'); ?>">
            <i class="ti ti-user"></i>
            <span class="hide-menu">Profile</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('login/logout'); ?>">
            <i class="ti ti-logout"></i>
            <span class="hide-menu">Log Out</span>
          </a>
        </li>

      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
</aside>