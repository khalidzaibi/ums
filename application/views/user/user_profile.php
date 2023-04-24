   <?php include APPPATH.'views/user/includes/header.php';?>
    <div id="wrapper">
      <!-- Sidebar -->
      <?php include APPPATH.'views/user/includes/sidebar.php';?>
      <div id="content-wrapper">
        
            <div class="container-fluid mb-3">
              <!-- Breadcrumbs-->
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="<?php echo site_url('user/Dashboard'); ?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Profile</li>
              </ol>
              <!-- Page Content -->
              <h1>My Profile</h1>
              <hr>
                <!---- Success Message ---->
                <?php if ($this->session->flashdata('success')) { ?>
                  <p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); $this->session->set_flashdata('success','');  ?></p>
                <?php } ?>
                  <!---- Error Message ---->
                <?php if ($this->session->flashdata('error')) { ?>
                  <p style="color:red; font-size:18px;"><?php echo $this->session->flashdata('error'); $this->session->set_flashdata('error',''); ?></p>
                <?php } ?> 
              </div>
          
            <div class="card-body">
              <?php echo form_open_multipart('user/UserProfile/updateProfile');?>
                  <p> <strong>Register Date :</strong> <?php echo $profile->created_at; ?>
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
                            <label>Profile Picture</label>
                            <div class="form-label-group">
                              <input type="file" name="profile" class="form-control"/>
                            </div>
                          </div>
                      </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6">  
                      <?php echo form_submit(['name'=>'update-user-profile','value'=>'Update Profile','class'=>'btn btn-primary btn-block']); ?>
                    </div>
                  </div>

              <?php echo form_close();?>
            </div>
      </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
     <?php include APPPATH.'views/user/includes/footer.php';?>
      