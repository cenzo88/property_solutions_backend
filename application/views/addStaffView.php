<div class="content-wrapper">
	<section class="content-header">
		<h1>Add New Staff
			<small>Please fill up the forms below</small>
		</h1>
	</section>
	<section class="content">
		<?php echo form_open_multipart('Main_controller/addStaff');?>
		<div class="row">
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Basic Details</h3>
					</div>
				
					<div class="box-body">
						<div class="form-group">
							<label for="userFname">First Name</label>
							<input type="text" class="form-control" name="userFname" required = "required" placeholder="First Name of the Seller">
						</div>
						<div class="form-group">
							<label for="userLname">Last Name</label>
							<input type="text" class="form-control" name="userLname" required = "required" placeholder="Last Name of the Seller">
						</div>
						<div class="form-group">
							<label for="userContact">Contact Number</label>
							<input type="Number" class="form-control" name="userContact" required = "required" placeholder="Contact Number">
						</div>
						<div class="form-group">
							<label for="designation">Designation / Job Title</label>
							<input type="text" class="form-control" name="designation" required = "required" placeholder="Designation">
						</div>
						<div class="form-group">
							<label for="userEmail" id = "emailAlert">Email</label>
							<input type="Email" class="form-control" name="userEmail" required = "required" placeholder="Email">
						</div>
					</div>

				</div>

				
			</div>
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Log In details</h3>
					</div>
				
					<div class="box-body">
						<div class="form-group">
							<label for="userEmail" id = "emailAlert">Username</label>
							<input type="text" class="form-control" name="username" required = "required" placeholder="username">
						</div>
						<div class="form-group">
							<label for="userPassword" id = "passAlert">Password</label>
							<input type="Password" class="form-control" name="userPassword" required = "required" placeholder="At least 8 characters">
						</div>
						<div class="form-group">
							<label for="userConfirmPassword">Confirm Password</label>
							<input type="Password" class="form-control" name="userConfirmPassword" required = "required" placeholder="Please type again your password">
						</div>
					</div>
				</div>
				<div class="box box-primary">
					<div class="box-body" style="background-color: #f1c40f; color: white;">
						<h5 style="text-align: center;">Save Changes?</h5>
					</div>
					<div class="box-footer">
						<div class="row">
							<div class="col-md-6">
								<button type="submit" class="btn btn-success" style="width: 100%"><i class="fa fa-check"></i> Yes</button>
							</div>
							<div class="col-md-6">
								<button class="btn btn-danger" style="width: 100%"><i class="fa fa-times-circle"></i> No</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">User Picture</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
	                      <label>User Profile Picture</label>
	                      <div class="input-group">
	                          <span class="input-group-btn">
	                              <span class="btn btn-default btn-file">
	                                  Browse… <input type="file" id="imgInp" name="userfile">
	                              </span>
	                          </span>
	                          <input type="text" class="form-control" readonly>
	                      </div>
	                      <img id='img-upload'/>
	                    </div>
	                    <hr>
					</div>
				</div>

				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Address</h3>
					</div>
				
					<div class="box-body">
						<div class="form-group">
							<label for="addressLine1">Address Line 1</label>
							<input type="text" class="form-control" name="aline1" required = "required" placeholder="House Number, Street">
						</div>
						<div class="form-group">
							<label for="addressLine2">Address Line 2</label>
							<input type="text" class="form-control" name="aline2" required = "required" placeholder="Area Name, Distict">
						</div>
						<div class="form-group">
							<label for="userContact">Address Line 3</label>
							<input type="text" class="form-control" name="aline3" required = "required" placeholder="City, Province">
						</div>
					</div>

				</div>
			</div>		
		</div>
		</form>
	</section>
</div>

