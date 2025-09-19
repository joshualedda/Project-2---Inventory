<aside class="left-sidebar">
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-center py-3">
      <a href="<?= base_url('clinic/dashboard'); ?>" class="text-nowrap logo-img">
        <img src="<?= base_url('assets/images/logo.jpg'); ?>" width="120" alt="Logo" />
      </a>
    </div>

    <nav class="sidebar-nav scroll-sidebar" data-simplebar>
      <ul id="sidebarnav">
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Clinic</span>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('clinic/dashboard'); ?>">
            <i class="ti ti-layout-dashboard"></i>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('clinic/clinic-patients'); ?>">
            <i class="ti ti-user-heart"></i>
            <span class="hide-menu">Clinic Patients</span>
          </a>
        </li>

        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">System</span>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('login/logout'); ?>">
            <i class="ti ti-logout"></i>
            <span class="hide-menu">Log Out</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>

