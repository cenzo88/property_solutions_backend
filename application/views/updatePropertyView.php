<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <?php foreach ($records as $r) {?>
   <section class="content-header">
      <h1>
         Change Details of
         <small><?php echo $r->Property_title." - For ".$r->Property_saleas; ?></small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li>Manage Properties</li>
         <li>View Property</li>
         <li class="active">Update Property</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <?php echo form_open_multipart('Main_controller/updateProperty');?>
            <div class="col-md-5">
               <div class="box box-primary">
                  <div class="box-header with-border">
                     <h3 class="box-title">Basic Details</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <input type="hidden" name="prop_id" value="<?php echo $r->Property_id;?>">
                  <div class="box-body">
                     <div class="form-group">
                        <label for="p_title">Property Title</label>
                        <input type="text" class="form-control" name="p_title" value="<?php echo $r->Property_title;?>" required = "required">
                     </div>
                     <div class="form-group">
                        <label>More Details</label>
                        <textarea class="form-control" rows="3" name="p_details" placeholder="Property Details" required="required"><?php echo $r->Property_detail;?></textarea>
                     </div>
                     <div class="form-group">
                        <label>Sold As</label>
                        <?php 
                           if($r->Property_saleas == "SALE"){
                             echo "<select class='form-control' id='exampleSelect1' name = 'p_soldas'>
                                   <option value='SALE' selected>For Sale</option>
                                   <option value='LEASE'>For Lease</option>
                                </select>";
                           }else if($r->Property_saleas == "LEASE"){
                             echo "<select class='form-control' id='exampleSelect1' name = 'p_soldas'>
                                   <option value='SALE'>For Sale</option>
                                   <option value='LEASE' selected>For Lease</option>
                                </select>";
                           }else if($r->Property_saleas == ""){
                             echo "<select class='form-control' id='exampleSelect1' name = 'p_soldas'>
                                   <option value='SALE'>For Sale</option>
                                   <option value='LEASE'>For Lease</option>
                                </select>";
                           }
                           ?>
                     </div>
                     <div class="form-group">
                        <label for="p_type">Property Type</label>
                        <?php 
                           if($r->Property_type == "house"){
                             echo "<select class='form-control' id='exampleSelect1' name = 'p_type'>
                                     <option value='house' selected>House</option>
                                     <option value='commercial'>Commercial</option>
                                   </select>";
                           }else if($r->Property_type == "commercial"){
                             echo "<select class='form-control' id='exampleSelect1' name = 'p_type'>
                                     <option value='house'>House</option>
                                     <option value='commercial' selected>Commercial</option>
                                   </select>";
                           }else if($r->Property_type == ""){
                             echo "<select class='form-control' id='exampleSelect1' name = 'p_type'>
                                     <option value='house'>House</option>
                                     <option value='commercial'>Commercial</option>
                                   </select>";
                           }
                           ?>
                     </div>
                     <div class="form-group">
                       <label for="p_price">Property Price (Php) </label>
                      <input type="Number" class="form-control" name="p_price" required = "required" value="<?php echo $r->Property_price; ?>">
                     </div>
                  </div>
                  <!-- /.box-body -->
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
         <input type="text" name = "pa_street" class="form-control" placeholder="Street" required="required" value="<?php echo $r->pa_street;?>">
         </div>
         <div class="col-xs-3">
         <label>Barangay</label>
         <input type="text" name = "pa_barangay" class="form-control" placeholder="Barangay" required="required" value="<?php echo $r->pa_barangay;?>">
         </div>
         <div class="col-xs-3">
         <label>City/Municipality</label> 
         <input type="text" name = "pa_city" class="form-control" placeholder="City/Municipality" required="required" value="<?php echo $r->pa_city;?>">
         </div>
         <div class="col-xs-3">
         <label>Province</label>
         <input type="text" name = "pa_province" class="form-control" placeholder="Province" required="required" value="<?php echo $r->pa_province;?>">
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
         <input type="Number" class="form-control" name="p_bed" placeholder="Number of Bed" value="<?php echo $r->Number_of_bedroom;?>" required = "required">
         </div>
         <div class="col-xs-4">
         <label for="p_title"><i class="fa fa-bath"></i> Total Number Bath</label>
         <input type="Number" class="form-control" name="p_bath" placeholder="Number of Bathroom" value="<?php echo $r->Number_of_bathroom;?>" required = "required">
         </div>
         <div class="col-xs-4">
         <label for="p_title"><i class="fa fa-expand"></i> Floor Area (sqm)</label>
         <input type="Number" class="form-control" name = "p_area" placeholder="Area in Square Meter" value="<?php echo $r->Property_areasize;?>" required = "required">
         </div>
         </div>
         </div>
         <!-- /.box-body -->
         </div>
         <div class="box box-success">
         <!-- form start -->
         <div class="box-body">
         <div class="row">
         <div class="col-xs-6">
         <div class="form-group">
         <label>Admin Approval</label>
         <?php 
            if($r->admin_approval == 1){
              echo "<select class='form-control' id='exampleSelect1' name = 'approval'>
                    <option value='1' selected>Approved</option>
                    <option value='0'>Unapproved</option>
                 </select>";
            }else if($r->admin_approval == 0){
              echo "<select class='form-control' id='exampleSelect1' name = 'approval'>
                    <option value='1'>Approved</option>
                    <option value='0' selected>Unapproved</option>
                 </select>";
            }
            ?>
         </div>
         </div>
         <div class="col-xs-6">
         <div class="form-group">
         <label>Sold Status</label>
         <?php 
            if($r->Sold_status == "SOLD"){
              echo "<select class='form-control' id='exampleSelect1' name = 'sold_status'>
                    <option value='SOLD' selected>Sold</option>
                    <option value='UNSOLD'>Unsold</option>
                 </select>";
            }else if($r->Sold_status == "UNSOLD"){
              echo "<select class='form-control' id='exampleSelect1' name = 'sold_status'>
                    <option value='SOLD'>Sold</option>
                    <option value='UNSOLD' selected>Unsold</option>
                 </select>";
            }
            ?>
         </div>
         </div>
         </div>
         </div>
         <!-- /.box-body -->
         </div>
         <div class="box box-danger">
         <div class="box-header with-border" style="background-color: orange; color: white;">
         <h4 style="text-align: center;">Save Changes?</h4>
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
         </form>
         </div>
      </div>
      <?php } ?>
      <div class="row">
         <div class="col-md-12">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Images</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <div class="box-body">
                  <div class="row">
                     <?php foreach ($records2 as $r2) {?>
                     <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                           data-target="#image-gallery">
                        <img class="img-thumbnail"
                           src="<?php echo $r2->Image?>"
                           style = "height: 140px;">
                        <button type="button" class="btn btn-block btn-danger btn-xs" onclick="window.location.href='<?php echo site_url('Main_controller/deleteImage/');?><?php echo $r2->image_id;?>'"><i class="fa fa-trash"></i> Delete</button>
                        </a>
                     </div>
                     <?php } ?>
                  </div>
               </div>
               <div class="box-footer">
                  <div class="form-group">
                     <p style="margin: 10px; text-align: center; font-style: italic;">Add Images Here</p>
                     <?php echo form_open_multipart('Main_controller/do_upload');?>
                     <input type="hidden" name="id" value="<?php echo $records[0]->Property_id;?>">
                     <input type="file" id="exampleInputFile" name="userfile" style="margin: 10px;" size="20" />
                     <br /><br />
                     <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Image</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- /.box-body -->
      </div>
</div>
</section>
<!-- /.content -->
</div>