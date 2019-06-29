<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Properties
        <small>Manage Approved and Unsold Properties</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Properties</li>
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
                  <th>Create Invoice</th>
                  <th>View</th>
                  <th>Update</th>
                  <th>Delete</th>
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
                        <td><button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Invoice</button></td>
                        <td><button type="button" class="btn btn-block btn-primary"><a style="color:white;" href="<?= site_url('Main_controller/viewProperty')."/".$r->Property_id?>"><i class="fa fa-eye"></i> View</a></button></td>
                        <td><button type="button" class="btn btn-block btn-warning"><a style="color:white;" href="<?= site_url('Main_controller/updatePropertyView')."/".$r->Property_id?>"><i class="fa fa-edit"></i> Update</a></button></td>
                        <td><button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#modal-danger"><a style = "color:white;" href="<?php echo site_url('Main_controller/deleteProperty')."/".$r->Property_id;?>"><i class="fa fa-trash"></i> Delete</a></button></td>
                      </tr>
                     
                      <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <?php echo form_open_multipart('Main_controller/newInvoice');?>
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Select Buyer</h4>
                            </div>
                            <div class="modal-body">

                              <div class="row">
                                <div class="col-md-6">
                                     <input type="hidden" name="prop_ID" value="<?php echo $r->Property_id;?>">
                                  <div class="form-group">
                                     <label>Select Buyer Here:</label>
                                     <select class='form-control' id='exampleSelect1' name = 'User_Id'>
                                        <?php foreach ($records2 as $r2) {?>
                                          <option value="<?php echo $r2->User_Id; ?>"><?php echo $r2->User_fname . " " . $r2->User_lname;?></option>
                                        <?php } ?>
                                     </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label>If buyer not on selection click here to add!</label>
                                  <button class="btn btn-success"><a style="color: white;" href="<?php echo site_url('Main_controller/addUserView');?>"><i class="fa fa-plus"></i> Add Buyer</a></button>
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
                  <th>ID</th>
                  <th>Title</th>
                  <th>Location</th>
                  <th>Sale as</th>
                  <th>Seller</th>
                  <th>Create Invoice</th>
                  <th>View</th>
                  <th>Update</th>
                  <th>Delete</th>
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

  
