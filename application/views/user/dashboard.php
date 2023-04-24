 <?php include APPPATH.'views/user/includes/header.php';?>
    <div id="wrapper">
      <!-- Sidebar -->
      <?php include APPPATH.'views/user/includes/sidebar.php';?>
      <div id="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              Dashboard
            </li>
            <li class="breadcrumb-item active">
              <a href="<?php echo site_url('user/Dashboard'); ?>">
              <?php if($this->session->userdata('role')=='admin') { ?>
                Admin
              <?php } else { ?>User <?php } ?>
                Portal
              </a>
              </li>
          </ol>
          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-12 col-sm-6 mb-3">
                <h3>Welcome: <?php echo $profile->first_name;?> <?php echo $profile->last_name;?>  </h3>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
        <!-- Sticky Footer -->
  <?php include APPPATH.'views/user/includes/footer.php';?>