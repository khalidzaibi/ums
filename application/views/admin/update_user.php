   <?php include APPPATH.'views/user/includes/header.php';?>
    <div id="wrapper">
      <!-- Sidebar -->
      <?php include APPPATH.'views/user/includes/sidebar.php';?>
      <div id="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo site_url('user/Dashboard'); ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Update user</li>
          </ol>

          <!-- Page Content -->
          <div class="card-body">
              <?php echo form_open('admin/ManageUsers/saveUpdateUser');?>
                  <p> <strong>Register Date :</strong> <?php echo $profile->created_at; ?>
                  <input type="hidden" name="id" value="<?= $profile->id; ?>" />
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6">
                        <div class="form-label-group">
                          <?php echo form_input(['name'=>'first_name','id'=>'first_name','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('first_name',$profile->first_name)]);?>
                          <?php echo form_label('Fisrt Name', 'first_name'); ?>
                          <?php echo form_error('first_name',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6">
                        <div class="form-label-group">
                          <?php echo form_input(['name'=>'last_name','id'=>'last_name','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('last_name',$profile->last_name)]);?>
                          <?php echo form_label('Last Name', 'last_name'); ?>
                          <?php echo form_error('last_name',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-label-group">
                              <?php echo form_input(['name'=>'email','id'=>'email','class'=>'form-control','autofocus'=>'autofocus','readonly'=>'true','value'=>set_value('email',$profile->email)]);?>
                              <?php echo form_label('Email', 'email'); ?>
                              <?php echo form_error('email',"<div style='color:red'>","</div>");?>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="form-row">
                          <div class="col-md-6">
                            <div class="form-label-group">
                              <?php echo form_input(['name'=>'phone','id'=>'phone','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('phone',$profile->phone)]);?>
                              <?php echo form_label('Phone', 'phone'); ?>
                              <?php echo form_error('phone',"<div style='color:red'>","</div>");?>
                            </div>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="form-row">
                          <div class="col-md-6">
                            <div class="form-label-group">
                            <select name="role" class="form-control">
                              <option value="user" <?php if($profile->role=='user'){echo 'selected';} ?>>User</option>
                              <option value="admin" <?php if($profile->role=='admin'){echo 'selected';} ?>>Admin</option>
                            </select>
                              <?php echo form_error('role',"<div style='color:red'>","</div>");?>
                            </div>
                          </div>
                      </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6">  
                      <?php echo form_submit(['name'=>'update-user-profile','value'=>'Update User','class'=>'btn btn-primary btn-block']); ?>
                    </div>
                  </div>
              <?php echo form_close();?>
            </div>
        </div>
        <!-- /.container-fluid -->
        <!-- Sticky Footer -->
       <?php include APPPATH.'views/user/includes/footer.php';?>