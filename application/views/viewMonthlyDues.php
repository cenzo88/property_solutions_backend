<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        BUYER's MONTHLY DUES
        <small>List of people who have chooses to loan their property</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Invoice</li>
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
              <h3 class="box-title">Monthly Dues</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Invoice Number</th>
                  <th>Property Title</th>
                  <th>Buyer</th>
                  <th>Date Created</th>
                  <th>Payable Period</th>
                  <th>expected_monthly_due</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                      foreach ($records as $r) { ?>
                      <tr>
                        <td><?php echo $r->Invoice_ID;?></td>
                        <td><?php echo $r->Property_title;?></td>
                        <td><?php echo $r->User_fname." ".$r->User_lname;?></td>
                        <td><?php echo $r->Date_created;?></td>
                        <td><?php echo $r->Date_created;?></td>
                        <td><?php echo $r->payable_period;?> months</td>
                        <td>Php <?php echo $r->expected_monthly_due;?></td>
                      </tr>
                     <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Invoice Number</th>
                  <th>Property Title</th>
                  <th>Buyer</th>
                  <th>Date Created</th>
                  <th>Payable Period</th>
                  <th>expected_monthly_due</th>
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

  
