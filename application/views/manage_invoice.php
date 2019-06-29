<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        MANAGE INVOICE
        <small>Here you can add payments, view or delete invoice</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Invoice</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
      <div class="row">
        <section class="col-lg-6">
          <a class="btn btn-app" href="<?php echo site_url('Main_controller/newMonthlyDue');?>">
            <i class="fa fa-plus"></i>New Monthly Due
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
                  <th>Invoice Number</th>
                  <th>Property Title</th>
                  <th>Buyer</th>
                  <th>Date Created</th>
                  <th>Add Payment</th>
                  <th>View Invoice</th>
                  <th>Remove Invoice</th>
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
                        <td>
                          <!-- Disable when paid full or has a paid amount -->

                          <?php 
                            if ($r->Payable_amount == $r->amount_paid ) {
                              echo '<button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-default" disabled><i class="fa fa-plus"></i> Add Payment</button>';
                            }else{
                              echo '<button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add Payment</button>';
                            }
                          ?>
                          
                        </td>
                        <td>

                          <button type="button" class="btn btn-block btn-primary"><a style="color: white;" href="<?php echo site_url('Main_controller/viewThisInvoice')."/".$r->Invoice_ID;?>"><i class="fa fa-eye"></i> View Invoice</a></button>

                        </td>
                        <td>

                          <button type="button" class="btn btn-block btn-danger"><a style = "color:white;" href="<?php echo site_url('Main_controller/deleteInvoice')."/".$r->Invoice_ID."/".$r->Property_id;?>"><i class="fa fa-trash"></i> Delete</a></button>

                        </td>
                      </tr>
                      
                      <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <?php echo form_open_multipart('Main_controller/recievePayments');?>
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Make Payments for <?php echo $r->Property_title; ?></h4>
                            </div>
                            <div class="modal-body">

                              <div class="row">
                                <div class="col-md-12">
                                     <input type="hidden" name="invoiceID" value="<?php echo $r->Invoice_ID;?>">
                                     <input type="hidden" name="oldDueAmount" value="<?php echo $r->due_amount;?>">
                                      <input type="hidden" name="oldAmountPaid" value="<?php echo $r->amount_paid;?>">
                                  <div class="form-group">
                                     <label style="display: block;text-align: center; line-height: 150%; font-size: .85em;">Enter Amount Tendered</label>
                                     <input type="Number" class="form-control" name = "amount_tendered" style="text-align: center;" required="required" value="5000">
                                  </div>
                                  <div class="form-group">
                                    <label>Note</label>
                                     <input type="text" class="form-control" name = "payment_note" required="required">
                                  </div>
                                </div>
                              </div>                   
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success">Continue <i class="fa fa-arrow-right"></i></button>
                            </div>
                          </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                     <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Invoice Number</th>
                  <th>Property Title</th>
                  <th>Buyer</th>
                  <th>Date Created</th>
                  <th>Add Payment</th>
                  <th>View Invoice</th>
                  <th>Remove Invoice</th>
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

  
