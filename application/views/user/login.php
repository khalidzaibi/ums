<!DOCTYPE html>
<html lang="en">
  <head>
    <title>User Login</title>
    <?php echo link_tag('assests/vendor/bootstrap/css/bootstrap.min.css'); ?>
    <?php echo link_tag('assests/vendor/fontawesome-free/css/all.min.css'); ?>
    <?php echo link_tag('assests/css/sb-admin.css'); ?>
  </head>
  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <!---- Success Message ---->
          <?php if ($this->session->flashdata('success')) { ?>
            <p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); $this->session->set_flashdata('success',''); ?></p>
          <?php } ?>
          <!---- Error Message ---->
          <?php if ($this->session->flashdata('error')) { ?>
            <p style="color:red; font-size:18px;" align="center"><?php echo $this->session->flashdata('error'); $this->session->set_flashdata('error','');?></p>
          <?php } ?>  
          <?php echo form_open('user/Login/userLogin');?>
            <div class="form-group">
              <div class="form-label-group">
                <?php echo form_input(['name'=>'email','id'=>'email','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('email')]);?>
                <?php echo form_label('Email', 'email'); ?>
                <?php echo form_error('email',"<div style='color:red'>","</div>");?>
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <?php echo form_password(['name'=>'password','id'=>'password','class'=>'form-control','autofocus'=>'autofocus']);?>
                <?php echo form_label('Password', 'password'); ?>
                <?php echo form_error('password',"<div style='color:red'>","</div>");?>
                <a class="d-block small mt-3" href="<?php echo base_url(); ?>user/Login/ForgotPassword">Forgot Password</a>
              </div>
            </div>
            <?php echo form_submit(['name'=>'login','value'=>'Login','class'=>'btn btn-primary btn-block']); ?>
          <?php echo form_close(); ?>

          <div class="text-center">
            <a class="d-block small mt-3" href="<?php echo base_url(); ?>user/Signup">User Signup</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assests/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
  </body>
</html>
