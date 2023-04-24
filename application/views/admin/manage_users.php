    <?php include APPPATH.'views/user/includes/header.php';?>
      <div id="wrapper">
        <?php include APPPATH.'views/user/includes/sidebar.php';?>
        <div id="content-wrapper">
          <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?php echo site_url('user/Dashboard'); ?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Manage Users</li>
            </ol>

            <!-- DataTables Example -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-table"></i> Manage Users
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <!---- Success Message ---->
                  <?php if ($this->session->flashdata('success')) { ?>
                    <p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); $this->session->set_flashdata('success',''); ?></p>
                  <?php } ?>
                </div> 
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>CreatedAt</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(count($allUsers)) : $cnt=1; 
                            foreach ($allUsers as $row) :
                      ?>                    
                        <tr>
                          <td><?php echo htmlentities($cnt);?></td>
                          <td><?php echo htmlentities($row->first_name)?></td>
                          <td><?php echo htmlentities($row->last_name)?></td>
                          <td><?php echo htmlentities($row->role)?></td>
                          <td><?php echo htmlentities($row->email)?></td>
                          <td><?php echo htmlentities($row->phone)?></td>
                          <td><?php echo htmlentities($row->created_at)?></td>
                          <td>
                            <?php  if($this->session->userdata('uid')!=$row->id){
                              echo  anchor("admin/ManageUsers/update_user/{$row->id}",' ','class="fa fa-edit"');
                            ?>
                            |
                            <?php
                              echo  anchor("admin/ManageUsers/deleteUser/{$row->id}",' ','class="fa fa-trash"');
                              } ?>
                          </td>
                        </tr>
                      <?php  $cnt++; endforeach; else : ?>
                      <tr>
                      <td colspan="7">No Record found</td>
                      </tr>
                      <?php
                      endif;
                      ?>                
                    </tbody>
                  </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
        <!-- Sticky Footer -->
        <?php include APPPATH.'views/user/includes/footer.php';?>
