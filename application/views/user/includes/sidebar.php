      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url('user/Dashboard'); ?>">
              <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('user/UserProfile'); ?>">
              <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span></a>
        </li>
        <?php if($this->session->userdata('role')=='admin') { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('admin/ManageUsers'); ?>">
              <i class="fas fa-fw fa-users"></i>
              <span>Manage Users</span></a>
          </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('user/ChangePassword'); ?>">
              <i class="fas fa-fw fa-table"></i>
            <span>Change Pasword</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('user/Login/logout'); ?>">
              <i class="fas fa-sign-out-alt"></i>
            <span>Log Out</span></a>
        </li>


      </ul>