<?php foreach ($records as $r) {?>
	
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			View Invoice <small><?php echo $r->Property_title;?></small>
		</h1>
		<ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li>Manage Invoice</li>
	        <li class="active"v>Invoice #<?php echo $r->Invoice_ID;?></li>
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

      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong><?php echo $r->fname." ".$r->lname;?></strong><br>
            <?php echo $r->designation; ?><br>
            <?php echo $r->Staff_Address_Line1; ?><br>
            <?php echo $r->Staff_Address_Line2; ?><br>
            <?php echo $r->Staff_Address_Line3;?><br>
            Phone: <?php echo $r->contactNumber;?><br>
            Email: <?php echo $r->email;?>
          </address>
        </div>
        <!-- /.col -->
        
        	<div class="col-sm-4 invoice-col">
	          To
	          <address>
	            <strong><?php echo $r->User_fname." ".$r->User_lname;?></strong><br>
	            <?php echo $r->User_Address_Line1;?><br>
	            <?php echo $r->User_Address_Line2;?><br>
	            <?php echo $r->User_Address_Line3;?><br>
	            Email: <?php echo $r->User_emailadd;?>
	          </address>
	        </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>Invoice #<?php echo $r->Invoice_ID;?></b><br>
            <b>Amount Paid: Php <?php echo $r->amount_paid;?></b><br>
            <b>Amount Due: <span style="font-size: 30px;">Php <?php echo $r->due_amount;?></span></b><br>
            
            <b></b>
          </div>
          <!-- /.col -->
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
            	<tr>
	              <td><?php echo $r->Property_title;?></td>
	              <td><?php echo $r->Property_id;?></td>
	              <td><?php echo $r->Property_detail;?></td>
	              <td>Php <?php echo $r->Property_price;?></td>
	            </tr>
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
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
           <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
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
	    document.getElementById('total').innerHTML = totalString;
	});
</script>