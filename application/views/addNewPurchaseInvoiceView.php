<?php foreach ($records as $r) {?>
	
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Create New Invoice <small><?php echo $r->Property_title;?></small>
		</h1>
		<ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li>Manage Properties</li>
	        <li class="active">New PURCHASE Invoice</li>
      	</ol>
	</section>
	<section class="content">
		<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Property Solutions Inc.
            <small class="pull-right">Date: <?php echo date("Y/m/d")?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->

        <?php
          $staff = $this->db->get_where('staff',array('Staff_ID' => $this->session->userdata('User_Id')))->row_array();
         ?>

      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong><?php echo $staff['fname']." ".$staff['lname'];?></strong><br>
            <?php echo $staff['designation'];?><br>
            <?php echo $staff['Staff_Address_Line1'];?><br>
            <?php echo $staff['Staff_Address_Line2'];?><br>
            <?php echo $staff['Staff_Address_Line3'];?><br>
            Phone: <?php echo $staff['contactNumber'];?><br>
            Email: <?php echo $staff['email'];?>
          </address>
        </div>
        <!-- /.col -->
        <?php foreach ($records2 as $r2) {?>
        	<div class="col-sm-4 invoice-col">
	          To
	          <address>
	            <strong><?php echo $r2->User_fname." ".$r2->User_lname;?></strong><br>
	            <?php echo $r2->User_Address_Line1;?><br>
	            <?php echo $r2->User_Address_Line2;?><br>
	            <?php echo $r2->User_Address_Line3;?><br>
	            Email: <?php echo $r2->User_emailadd;?>
	          </address>
	        </div>
        <?php } ?>
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              
              <th>Property Title</th>
              <th>Property Number</th>
              <th>Details</th>
              <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($records as $r) {?>
            	<tr>
	              <td><?php echo $r->Property_title;?></td>
	              <td><?php echo $r->Property_id;?></td>
	              <td><?php echo $r->Property_detail;?></td>
	              <td>Php <?php echo $r->Property_price;?></td>
	            </tr>
            <?php } ?>
            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
           Property Location <br>
           <?php echo $r->pa_street.", ".$r->pa_barangay.", ".$r->pa_city.", ".$r->pa_province;?>
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Arrange a meeting for the buyer for the actual payment</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Reservation Fee</th>
                <td>Php <span id="resFee"></span></td>
              </tr>
              <tr>
                <th style="width:50%">Property Price</th>
                <td>Php <span id="PropPrice"><?php echo $r->Property_price;?></span></td>
              </tr>	
              <tr>
                <th style="width:50%">Processing Fee</th>
                <td>Php <span id="procfee">700.00</span></td>
              </tr>
              <tr>
                <th>Total:</th>
                <td><span id="total"></span></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <?php echo form_open_multipart('Main_controller/addInvoice');?>
          	  <input type = "hidden" value="<?php echo $r->Property_id;?>" name="Property_Id">
	          <input type = "hidden" value="<?php echo $r2->User_Id;?>" name="User_Id">
	          <input type = "hidden" value="<?php echo date('Y/m/d'); ?>" name="dateCreated">
	          <input type = "hidden" value="<?php echo $this->session->userdata('User_Id')?>" name="adminAssisting">
	          <input type = "hidden" id = "payable_amount" name = "payable_amount">
            <input type = "hidden" name = "proccess_fee" value="700">
            <input type = "hidden" name = "Reservation_fee" id="Reservation_fee">
            <input type = "hidden" name = "amount_due" id="amount_due">
	          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Create This Invoice
	          </button>
          </form>
          
          
        </div>
      </div>
    </section>
	</section>
</div>
<?php } ?>
<script type="text/javascript">
	$( document ).ready(function() {
      var pprice = document.getElementById('PropPrice').innerHTML;
      var resfee = pprice * 0.01;
	    var pfee = document.getElementById('procfee').innerHTML;
	    var total = parseFloat(resfee) + parseFloat(pprice) + parseFloat(pfee);
	    var totalString = "Php " + total;

      document.getElementById('resFee').innerHTML = resfee;
      document.getElementById('Reservation_fee').value = resfee;
      document.getElementById('amount_due').value = total;
	    document.getElementById('payable_amount').value = total;
	    document.getElementById('total').innerHTML = totalString;
	});
</script>