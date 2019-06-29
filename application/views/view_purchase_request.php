<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PURCHASE REQUEST
        <small>List of customer queries from prospect buyer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Sales</li>
        <li class="active">Purchase Request</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
      
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Queries</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Prospect Buyer</th>
                  <th>Prospect Buyer Contact Number</th>
                  <th>Property Title</th>
                  <th>Date of Meeting</th>
                  <th>Message</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                      foreach ($records as $r) { ?>
                      <tr>
                        <td><?php echo $r->User_fname." ".$r->User_lname;?></td>
                        <td><?php echo $r->User_contact;?></td>
                        <td><?php echo $r->Property_title;?></td>
                        <td><?php echo $r->Date_of_meeting;?></td>
                        <td><?php echo $r->message_to_admin;?></td>
                      </tr>
                     <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Prospect Buyer</th>
                  <th>Prospect Buyer Contact Number</th>
                  <th>Property Title</th>
                  <th>Date of Meeting</th>
                  <th>Messaged</th>
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

  
