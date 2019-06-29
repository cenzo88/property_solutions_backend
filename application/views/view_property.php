<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php foreach ($records as $r) {?>
      
    
    <section class="content-header">
      <h1 style="text-align: center; margin-top: 50px;">
        <?php echo $r->Property_title; ?>
        <small>FOR <?php echo $r->Property_saleas; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Manage Properties</li>
        <li class="active">View Property</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
         <section class="col-lg-12 connectedSortable">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo $r->User_fname ." ".$r->User_lname?></h3>
              <h5 class="widget-user-desc">Seller</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?php echo $r->image;?>" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php 
                        $this->db->like('User_Id_Seller', $r->User_Id_Seller);
                        $this->db->from('property');
                        echo $this->db->count_all_results();
                    ?>
                    </h5>
                    <span class="description-text">Submitted Properties</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php 

                    $this->db->select('*');
                    $this->db->from('invoice');
                    $this->db->join('property', 'invoice.Property_id = property.Property_id');
                    $this->db->where('property.User_Id_Seller', $r->User_Id_Seller);
                    echo $this->db->count_all_results();

                    ?></h5>
                    <span class="description-text">Properties Sold</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </section>
      </div>
      <div class="row">  
        <section class="col-lg-7 connectedSortable">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <img src="<?php echo $r->Property_picmain; ?>" style = "width: 100%;">
            </div>
            <!-- /.box-body -->
          </div>
        </section>

        <section class="col-lg-5 connectedSortable">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">| Property Details</h3>
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
              
              <p style="font-size: 20px;"><i class="fa fa-map-marker" style="font-size: 25px;"></i>   <?php echo $r->pa_street.", ".$r->pa_barangay.", ".$r->pa_city.", ".$r->pa_province;?></p>
              <p><?php echo $r->Property_detail;?></p>
              <p style="font-size: 20px;">Php <?php echo $r->Property_price;?></p>
              <hr>

              <button type="button" class="btn btn-block btn-success"><i class="fa fa-plus"></i> Invoice</button>
              <button type="button" class="btn btn-block btn-warning"><a style="color:white;" href="<?= site_url('Main_controller/updatePropertyView')."/".$r->Property_id?>"><i class="fa fa-edit"></i> Update</a></button>
              <button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-trash"></i> Delete</button>

              <!-- modal -->
              <div class="modal modal-danger fade" id="modal-danger">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Do you want to delete this property?</h4>
                    </div>
                    <div class="modal-body">
                      <p>This action will delete permanently this property from the database&hellip;</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-outline"><a style = "color:white;" href="<?php echo site_url('Main_controller/deleteProperty')."/".$r->Property_id;?>">Yes</a></button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </section>
      </div>
      <!-- /.row (main row) -->
       <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $r->Property_areasize;?><small>sqm</small></h3>

              <p>Floor Area</p>
            </div>
            <div class="icon">
              <i class="fa fa-expand"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $r->Number_of_bedroom;?></h3>
              <p>Bedrooms</p>
            </div>
            <div class="icon">
              <i class="fa fa-bed"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $r->Number_of_bathroom;?></h3>

              <p>Number of Toilets</p>
            </div>
            <div class="icon">
              <i class="fa fa-bath"></i>
            </div>
          </div>
        </div>
      </div>

      <!-- /.row -->
     
    </section>
    <!-- /.content -->

  <?php } ?>
</div>

        