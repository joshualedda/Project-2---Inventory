<aside class="left-sidebar">
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-center py-3">
      <a href="<?= base_url('dashboard'); ?>" class="text-nowrap logo-img">
        <img src="<?= base_url('assets/images/logo.jpg'); ?>" width="120" alt="Logo" />
      </a>
    </div>

    <nav class="sidebar-nav scroll-sidebar" data-simplebar>
      <ul id="sidebarnav">
        <!-- Home Section -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Home</span>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/dashboard'); ?>">
            <i class="ti ti-layout-dashboard"></i>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/students'); ?>">
            <i class="ti ti-school"></i>
            <span class="hide-menu">Students</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/courses'); ?>">
            <i class="ti ti-certificate"></i>
            <span class="hide-menu">Courses</span>
          </a>
        </li>

        <!-- Offices -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Offices</span>
        </li>

        <!-- Scholarship -->
        <li class="sidebar-item" id="sidebarItem">
          <a class="sidebar-link sidebar-dropdown">
          <i class="ti ti-award"></i>
            <span class="hide-menu">Scholarships</span>
          </a>
          <ul id="menu-nav" class="nav-content">
           
          <li class="sidebar-item px-4">
              <a class="sidebar-link" href="<?= base_url('admin/scholarships'); ?>">
              <i class="ti ti-users"></i>
                <span class="hide-menu">Scholar Students</span>
              </a>
            </li>
            
          <li class="sidebar-item px-4">
              <a class="sidebar-link" href="<?= base_url('admin/scholarshipprogram'); ?>">
              <i class="ti ti-clipboard-list"></i>
                <span class="hide-menu">Programs</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- Guidance -->
           <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/Guidance'); ?>">
                    <i class="ti ti-compass"></i>
            <span class="hide-menu">Guidance</span>
          </a>
        </li>

        <!-- Clinic -->
        <li class="sidebar-item" id="sidebarItem">
          <a class="sidebar-link sidebar-dropdown">
            <i class="ti ti-stethoscope"></i>
            <span class="hide-menu">Clinic</span>
          </a>
          <ul id="menu-nav" class="nav-content">

            <li class="sidebar-item px-4">
              <a class="sidebar-link" href="<?= base_url('admin/clinic-patients'); ?>">
             <i class="ti ti-heartbeat"></i>
                <span class="hide-menu">Clinic Patients</span>
              </a>
            </li>

          </ul>
        </li>

        <!-- Alumni -->
        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/alumni'); ?>">
          <i class="ti ti-address-book"></i>
            <span class="hide-menu">Alumni</span>
          </a>
        </li>


        <!-- Sports -->
        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('sports'); ?>">
            <i class="ti ti-ball-football"></i>
            <span class="hide-menu">Sports</span>
          </a>
        </li>

        <!-- Settings -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">System Settings</span>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('backup'); ?>">
            <i class="ti ti-database-export"></i>
            <span class="hide-menu">Back Up</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('activitylog'); ?>">
            <i class="ti ti-clipboard-list"></i>
            <span class="hide-menu">Activity Log</span>
          </a>
        </li>

        <!-- Users -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">User Management</span>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('profile'); ?>">
            <i class="ti ti-user"></i>
            <span class="hide-menu">Profile</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/users'); ?>">
            <i class="ti ti-users"></i>
            <span class="hide-menu">Manage Users</span>
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


  </div>
</aside>