<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        USERS
        <small>You can only delete a user, considering he or she is acting inappropriately</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <section class="col-lg-6">
          <a class="btn btn-app" href="<?php echo site_url('Main_controller/addUserView');?>">
            <i class="fa fa-plus"></i>Add Users
          </a>
        </section>
      </div>
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of USERS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>User Name</th>
                  <th>Email Address</th>
                  <th>Contact Number</th>
                  <th>Address</th>
                  <th>Delete this user</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                      foreach ($records as $r) { ?>
                      <tr>
                        <td><?php echo $r->User_Id;?></td>
                        <td><?php echo $r->User_fname." ".$r->User_lname;?></td>
                        <td><?php echo $r->User_emailadd;?></td>
                        <td><?php echo $r->User_contact;?></td>
                        <td><?php echo $r->User_Address_Line1.", ".$r->User_Address_Line2.", ".$r->User_Address_Line3;?></td>
                        <td><button type="button" class="btn btn-block btn-danger"><a style = "color:white;" href="<?= site_url('Main_controller/deleteUser/'.$r->User_Id); ?>"><i class="fa fa-trash"></i> Delete</a></button></td>
                      </tr>
                     <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>User Name</th>
                  <th>Email Address</th>
                  <th>Contact Number</th>
                  <th>Address</th>
                  <th>Delete this user</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </section>
        <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

  
