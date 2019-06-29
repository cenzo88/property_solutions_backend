<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        STAFF
        <small>You can terminate nor view his or her DTR for paypal purposes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Staff</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <section class="col-lg-6">
          <a class="btn btn-app" href="<?php echo site_url('Main_controller/addStaffView');?>">
            <i class="fa fa-plus"></i>Add New Staff
          </a>
        </section>
      </div>
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Staff</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Staff Name</th>
                  <th>Contact Number</th>
                  <th>Email Address</th>
                  <th>designation</th>
                  <th>View DTR (<?php echo date('M');?>)</th>
                  <th>Terminate</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                      foreach ($records as $r) { ?>
                      <tr>
                        <td><?php echo $r->Staff_ID;?></td>
                        <td><?php echo $r->fname." ".$r->lname;?></td>
                        <td><?php echo $r->contactNumber;?></td>
                        <td><?php echo $r->email;?></td>
                        <td><?php echo $r->designation;?></td>
                        <td><button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-danger"><a style = "color:white;" href="<?php echo site_url('Main_controller/viewPersonalDtr')."/".$r->Staff_ID;?>"><i class="fa fa-eye"></i> DTR</a></button></td>
                        <td><button type="button" class="btn btn-block btn-danger"><a style = "color:white;" href="<?php echo site_url('Main_controller/deleteStaff')."/".$r->Staff_ID;?>"><i class="fa fa-trash"></i> Terminate</a></button></td>
                      </tr>
                     <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Staff Name</th>
                  <th>Contact Number</th>
                  <th>Email Address</th>
                  <th>designation</th>
                  <th>View DTR (<?php echo date('M')?>);</th>
                  <th>Terminate</th>
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

  
