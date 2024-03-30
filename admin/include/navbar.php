      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <!-- <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link">Pharmacy Inventory Software</a>
          </li> -->
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>

          <li class="nav-item dropdown nav-profile">
            <img src="dist/img/asif.jpg" alt="User Avatar" data-toggle="dropdown" class="p-0 mr-3 img-circle nav-link" style="cursor: pointer;"/>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
              <a href="profile.php" class="dropdown-item"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
              <a href="setting.php" class="dropdown-item"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a>
              <div class="dropdown-divider"></div>
              <a href="actions/logout.php?logout=<?php echo base64_encode($_SESSION['pharmacyAdmin']); ?>" class="dropdown-item"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
            </div>
          </li>

          <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="actions/logout.php?logout=<?php echo base64_encode($_SESSION['pharmacyAdmin']); ?>" class="nav-link">Logout</a>
          </li> -->
        </ul>
      </nav>