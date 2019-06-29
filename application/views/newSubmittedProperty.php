<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        APPROVE NEWLY SUBMITTED PROPERY
        <small>You must approve the property in order to be sold!</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Newly Submitted Properties</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <section class="col-lg-6">
          <a class="btn btn-app" href="<?php echo site_url('Main_controller/addPropertyView');?>">
            <i class="fa fa-plus"></i>Add Property
          </a>
        </section>
      </div>
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of UNSOLD Properties</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Location</th>
                  <th>Sale as</th>
                  <th>Seller</th>
                  <th>Seller Contact Number</th>
                  <th>Seller Email</th>
                  <th>Click to Approve Property</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                      foreach ($records as $r) { ?>
                      <tr>
                        <td><?php echo $r->Property_id;?></td>
                        <td><?php echo $r->Property_title;?></td>
                        <td><?php echo $r->pa_street.", ".$r->pa_barangay.", ".$r->pa_city.", ".$r->pa_province;?></td>
                        <td><?php echo $r->Property_saleas;?></td>
                        <td><?php echo $r->User_fname." ".$r->User_lname;?></td>
                        <td><?php echo $r->User_contact;?></td>
                        <td><?php echo $r->User_emailadd;?></td>
                        <td><button type="button" class="btn btn-block btn-danger"><a style = "color:white;" href="<?php echo site_url('Main_controller/approveProperty')."/".$r->Property_id;?>"><i class="fa fa-check"></i> APPROVE</button></a></td>
                      </tr>
                     <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Location</th>
                  <th>Sale as</th>
                  <th>Seller</th>
                  <th>Seller Contact Number</th>
                  <th>Seller Email</th>
                  <th>Click to Approve Property</th>
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

  
