<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add a new property
         <small>Fill up the forms below</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li>Manage Properties</li>
         <li>View Property</li>
         <li class="active">Add Property</li>
      </ol>
   </section>
   <!-- Main content -->
    <section class="content">
      <div class="row">
         <?php echo form_open_multipart('Main_controller/addProperty');?>
          <div class="col-md-5">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Basic Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
                <div class="box-body">
                  <div class="form-group">
                     <label for="p_title">Property Title</label>
                     <input type="text" class="form-control" name="p_title" required = "required">
                  </div>
                  <div class="form-group">
                     <label>More Details</label>
                     <textarea class="form-control" rows="3" name="p_details" placeholder="Property Details" required="required"></textarea>
                  </div>
                  <div class="form-group">
                     <label>Sold As</label>
                     <select class='form-control' id='exampleSelect1' name = 'p_soldas'>
                        <option value='SALE' selected>For Sale</option>
                        <option value='LEASE'>For Lease</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="p_type">Property Type</label>
                     <select class='form-control' id='exampleSelect1' name = 'p_type'>
                        <option value='house' selected>House</option>
                        <option value='commercial'>Commercial</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="p_price">Property Price</label>
                     <input type="Number" class="form-control" name="p_price" required = "required" placeholder="Price of the Property">
                  </div>
                </div>
               <!-- /.box-body -->
            </div>

            <div class="box box-success">
            <div class="box-header with-border">
              <h4 style="text-align: center;">Property Profile Picture</h4>
            </div>
            <div class="box-body">
               <div class="row">
                 <div class="col-xs-12">
                    <div class="form-group">
                      <label>Property Profile Picture</label>
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
                 </div>
               </div>
            </div>
            <div class="box-footer"> 
              <p>If you wish to add more after saving the property click on manage properties > Update > below you can see add images button</p>
            </div>
          </div>
          </div>

          <div class="col-md-7">

            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Property Location</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-3">
                        <label>Street</label>
                        <input type="text" name = "pa_street" class="form-control" placeholder="Street" required="required">
                  </div>
                  <div class="col-xs-3">
                        <label>Barangay</label>
                        <input type="text" name = "pa_barangay" class="form-control" placeholder="Barangay" required="required">
                  </div>
                  <div class="col-xs-3">
                        <label>City/Municipality</label> 
                        <input type="text" name = "pa_city" class="form-control" placeholder="City/Municipality" required="required">
                  </div>
                  <div class="col-xs-3">
                        <label>Province</label>
                        <input type="text" name = "pa_province" class="form-control" placeholder="Province" required="required">
                  </div>
                </div>
              </div>
            </div>
            <!-- anemities -->
            <div class="box box-success">
               <div class="box-header with-border">
                  <h3 class="box-title">Anemities & Floor Area</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
                <div class="box-body">
                  <div class="row">
                     <div class="col-xs-4">
                        <label for="p_title"><i class="fa fa-bed"></i> Total Number of Bed</label>
                        <input type="Number" class="form-control" name="p_bed" placeholder="Number of Bed" required = "required">
                     </div>
                     <div class="col-xs-4">
                        <label for="p_title"><i class="fa fa-bath"></i> Total Number Bath</label>
                        <input type="Number" class="form-control" name="p_bath" placeholder="Number of Bathroom" required = "required">
                     </div>
                     <div class="col-xs-4">
                        <label for="p_title"><i class="fa fa-expand"></i> Floor Area (sqm)</label>
                        <input type="Number" class="form-control" name = "p_area" placeholder="Area in Square Meter" required = "required">
                     </div>
                  </div>
                </div>
               <!-- /.box-body -->
            </div>

            <div class="box box-success">
               <div class="box-header with-border">
                  <h3 class="box-title">Select a Seller</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
                <div class="box-body">
                  <div class="row">
                     <div class="col-xs-9">
                        <select class="form-control">
                          <?php foreach ($records as $r) {?>
                              <option value = "<?php echo $r->User_Id?>"><?php echo $r->User_fname." ".$r->User_lname; ?></option>
                            <?php } ?>
                    
                        </select>
                     </div>
                     <div class="col-xs-2">
                        <button class="btn btn-success"><a style="color:white;" href="<?php echo site_url('Main_controller/addUserView')?>"><i class="fa fa-plus"></i> Add Seller</a></button>
                     </div>
                  </div>
                </div>
               <!-- /.box-body -->
            </div>

            <div class="box box-danger">
             <div class="box-header with-border" style="background-color: orange; color: white;">
              <h4 style="text-align: center;">Do you wish to continue?</h4>
             </div>
           <!-- /.box-header -->
           <!-- form start -->
             <div class="box-body">
               <div class="row">
                 <div class="col-xs-6">
                 <button type="submit" class="btn btn-success btn-sm" style="width: 100%;"><i class="fa fa-check"></i> Yes</button>
                 </div>
                 <div class="col-xs-6">
                 <button type="button" class="btn btn-danger btn-sm" style="width: 100%;"><a style="color: white;" href="<?php echo site_url('Main_controller/manageProperties');?>"><i class="fa fa-times-circle"></i> Cancel</a></button>
                 </div>
               </div>
             </div>
           <!-- /.box-body -->
           </div>


            <!-- /.box-body -->

            
          </div>


         </form>
      </div>
      <div class="row">
        <div class="col-md-12">
          
        </div>
      </div>
    </section>
</div>
