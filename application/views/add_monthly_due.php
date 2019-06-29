<div class="content-wrapper">
	<section class="content-header">
		<h1>ADD NEW MONTHLY DUES ALERT
			<small>Fill up the forms so that it will notify you!</small>
		</h1>
	</section>
	<section class="content">
		<?php echo form_open_multipart('Main_controller/addMonthlyDue');?>
		<div class="row">
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Basic Details</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label for="userFname">Select Invoice</label>
							<select class="form-control" name = "invoice_ID">
								<?php 
									foreach ($records as $r) {
										echo "<option value = '".$r->Invoice_ID."'> Invoice # ".$r->Invoice_ID ." - ".$r->Property_title."</option>";
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for = "payable_period">Payable Period in Months</label>
							<input type="Number" class="form-control" name = "payable_period">
						</div>
						<div class="form-group">
							<label for = "payable_period">Expected Monthly Due</label>
							<input type="Number" class="form-control" name = "monthlyDue">
						</div>
						<button type="submit" class="btn btn-success"><i class = "fa fa-check"> Submit</i></button>
					</div>
				</div>
			</div>
		</div>
		</form>
	</section>
</div>