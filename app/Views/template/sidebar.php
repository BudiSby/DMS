<?php

$request = \Config\Services::request();
$segment = $request->uri->getSegment(1);
$segment2 = $request->uri->getSegment(2);

$data_user = getProfile();


?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url(); ?>public/assets/dist/img/PILLogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Digital Document</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url(); ?>public/assets/uploads/users/<?= $data_user['image']; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block text-capitalize"><?= $data_user['username']; ?> - <?= $data_user['title']; ?></a>
      </div>
    </div>



    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item ">
          <a href="<?= base_url(); ?>dashboard" class="nav-link <?= ($segment == 'dashboard') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item ">
          <a href="<?= base_url(); ?>document" class="nav-link <?= ($segment == 'document') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Document
            </p>
          </a>
        </li>

        <li class="nav-item  <?= ($segment == 'profile' || $segment == 'change-password') ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              User Profile
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('profile'); ?>" class="nav-link <?= ($segment == 'profile') ? 'active' : ''; ?>">
                <i class="fas fa-chevron-circle-right nav-icon"></i>
                <p>
                  My Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('change-password'); ?>" class="nav-link <?= ($segment == 'change-password') ? 'active' : ''; ?>">
                <i class="fas fa-chevron-circle-right nav-icon"></i>
                <p>
                  Change Password
                </p>
              </a>
            </li>
          </ul>
        </li>


        <?php if (session()->get('role_id') == 1) : ?>
          <hr color="gray" />

          <li class="nav-item">
            <a href="<?= base_url('users'); ?>" class="nav-link <?= ($segment == 'users') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users Management
              </p>
            </a>
          </li>

          <li class="nav-item  <?= ($segment == 'division' || $segment == 'subdivision' || $segment == 'doctype' || $segment == 'year') ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Doc Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('year'); ?>" class="nav-link <?= ($segment == 'year') ? 'active' : ''; ?>">
                  <i class="fas fa-chevron-circle-right nav-icon"></i>
                  <p>
                    Year
                  </p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('division'); ?>" class="nav-link <?= ($segment == 'division') ? 'active' : ''; ?>">
                  <i class="fas fa-chevron-circle-right nav-icon"></i>
                  <p>
                    Division
                  </p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('subdivision'); ?>" class="nav-link <?= ($segment == 'subdivision') ? 'active' : ''; ?>">
                  <i class="fas fa-chevron-circle-right nav-icon"></i>
                  <p>
                    Sub-Division
                  </p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('doctype'); ?>" class="nav-link <?= ($segment == 'doctype') ? 'active' : ''; ?>">
                  <i class="fas fa-chevron-circle-right nav-icon"></i>
                  <p>
                    Doc Type
                  </p>
                </a>
              </li>
            </ul>
          </li>

          <hr color="gray" />

        <?php endif; ?>

        <li class="nav-item">
          <a href="<?= base_url(); ?>auth/logout" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Signout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>