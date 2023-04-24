<!DOCTYPE html>
<html lang="en">
  <head>
    <title>User - Signup</title>
    <?php echo link_tag('assests/vendor/bootstrap/css/bootstrap.min.css'); ?>
    <?php echo link_tag('assests/vendor/fontawesome-free/css/all.min.css'); ?>
    <?php echo link_tag('assests/css/sb-admin.css'); ?>
  </head>
  <body class="bg-dark">
    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">User Signup</div>
        <div class="card-body">
          <!---- Success Message ---->
          <?php if ($this->session->flashdata('success')) { ?>
            <p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); $this->session->set_flashdata('success',''); ?></p>
          <?php } ?>
          <!---- Error Message ---->
          <?php if ($this->session->flashdata('error')) { ?>
            <p style="color:red; font-size:18px;"><?php echo $this->session->flashdata('error'); $this->session->set_flashdata('error',''); ?></p>
          <?php } ?>  
          
            <!-- user signup form is here. -->
          <?php echo form_open('user/signup/user_signup');?>
            <div class="form-group">
              <div class="form-row">

                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(['name'=>'first_name','id'=>'first_name','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('first_name')]);?>
                    <?php echo form_label('First Name', 'first_name'); ?>
                    <?php echo form_error('first_name',"<div style='color:red'>","</div>");?>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(['name'=>'last_name','id'=>'last_name','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('last_name')]);?>
                    <?php echo form_label('Last Name', 'last_name'); ?>
                    <?php echo form_error('last_name',"<div style='color:red'>","</div>");?>
                  </div>
                </div>

              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <?php echo form_input(['name'=>'email','id'=>'email','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('email')]);?>
                <?php echo form_label('Email', 'email'); ?>
                <?php echo form_error('email',"<div style='color:red'>","</div>");?>
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <?php echo form_input(['name'=>'phone','id'=>'phone','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('phone')]);?>
                <?php echo form_label('Phone', 'phone'); ?>
                <?php echo form_error('phone',"<div style='color:red'>","</div>");?>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">

                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_password(['name'=>'password','id'=>'password','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('password')]);?>
                    <?php echo form_label('Password', 'password'); ?>
                    <?php echo form_error('password',"<div style='color:red'>","</div>");?>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_password(['name'=>'confirmpassword','id'=>'confirmpassword','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('confirmpassword')]);?>
                    <?php echo form_label('Confirm Password', 'confirmpassword'); ?>
                    <?php echo form_error('confirmpassword',"<div style='color:red'>","</div>");?>
                  </div>
                </div>

              </div>
            </div>
          <?php echo form_submit(['name'=>'signup','value'=>'signup','class'=>'btn btn-primary btn-block']); ?>

          </div>
          <div class="text-center mb-3">
            <a class="d-block small mt-3" href="<?php echo base_url(); ?>user/Login">Login</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assests/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
  </body>
</html>
