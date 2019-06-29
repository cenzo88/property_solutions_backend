<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Property_Solutions | Dashboard</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="<?= base_url('')?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?= base_url('')?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="<?= base_url('')?>/assets/bower_components/Ionicons/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?= base_url('')?>/assets/dist/css/AdminLTE.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?= base_url('')?>/assets/dist/css/skins/_all-skins.min.css">
      <!-- Morris chart -->
      <link rel="stylesheet" href="<?= base_url('')?>/assets/bower_components/morris.js/morris.css">
      <!-- jvectormap -->
      <link rel="stylesheet" href="<?= base_url('')?>/assets/bower_components/jvectormap/jquery-jvectormap.css">
      <!-- DataTables -->
      <link rel="stylesheet" href="<?= base_url('')?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
      <!-- Date Picker -->
      <link rel="stylesheet" href="<?= base_url('')?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="<?= base_url('')?>/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="<?= base_url('')?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      <!-- jQuery 3 -->
      <script src="<?= base_url('')?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="<?= base_url('')?>/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
         $.widget.bridge('uibutton', $.ui.button);
      </script>
      <!-- Bootstrap 3.3.7 -->
      <script src="<?= base_url('')?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- Morris.js charts -->
      <script src="<?= base_url('')?>/assets/bower_components/raphael/raphael.min.js"></script>
      <script src="<?= base_url('')?>/assets/bower_components/morris.js/morris.min.js"></script>
      <!-- Sparkline -->
      <script src="<?= base_url('')?>/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
      <!-- jvectormap -->
      <script src="<?= base_url('')?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="<?= base_url('')?>/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="<?= base_url('')?>/assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
      <!-- DataTables -->
      <script src="<?= base_url('')?>/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="<?= base_url('')?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <!-- daterangepicker -->
      <script src="<?= base_url('')?>/assets/bower_components/moment/min/moment.min.js"></script>
      <script src="<?= base_url('')?>/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
      <!-- datepicker -->
      <script src="<?= base_url('')?>/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="<?= base_url('')?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
      <!-- Slimscroll -->
      <script src="<?= base_url('')?>/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
      <!-- FastClick -->
      <script src="<?= base_url('')?>/assets/bower_components/fastclick/lib/fastclick.js"></script>
      <!-- AdminLTE App -->
      <script src="<?= base_url('')?>/assets/dist/js/adminlte.min.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="<?= base_url('')?>/assets/dist/js/pages/dashboard.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="<?= base_url('')?>/assets/dist/js/demo.js"></script>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script type="text/javascript">
         function validateAddUserInput(){
            var error = "";

            var userPassword = document.getElementById("userPassword").val();
            var userPasswordConfirm = document.getElementById("userConfirmPassword").val();

            if(userPassword !== userPasswordConfirm){
               error = "Password Do Not Match";
               document.getElementById("passAlert").innerHTML = error;

               return false;
            }else{
               return true;
            }

            
         }
      </script>
      <script type="text/javascript">
         $(document).ready( function() {
         $(document).on('change', '.btn-file :file', function() {
         var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
         input.trigger('fileselect', [label]);
         });

         $('.btn-file :file').on('fileselect', function(event, label) {
             
             var input = $(this).parents('.input-group').find(':text'),
                 log = label;
             
             if( input.length ) {
                 input.val(log);
             } else {
                 if( log ) alert(log);
             }
          
         });
         function readURL(input) {
             if (input.files && input.files[0]) {
                 var reader = new FileReader();
                 
                 reader.onload = function (e) {
                     $('#img-upload').attr('src', e.target.result);
                 }
                 
                 reader.readAsDataURL(input.files[0]);
             }
         }

         $("#imgInp").change(function(){
             readURL(this);
         });   
      });
      </script>
      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      <style type="text/css">
      .btn-file {
          position: relative;
          overflow: hidden;
      }
      .btn-file input[type=file] {
          position: absolute;
          top: 0;
          right: 0;
          min-width: 100%;
          min-height: 100%;
          font-size: 100px;
          text-align: right;
          filter: alpha(opacity=0);
          opacity: 0;
          outline: none;
          background: white;
          cursor: inherit;
          display: block;
      }

      #img-upload{
          width: 100%;
      }
      </style>
   </head>
   <div class="wrapper">
      <header class="main-header">
         <!-- Logo -->
         <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>P</b>S</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Property</b>Solutions</span>
         </a>
         <!-- Header Navbar: style can be found in header.less -->
         <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
               <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->
                  
                  <!-- Notifications: style can be found in dropdown.less -->
                  
                  <!-- Tasks: style can be found in dropdown.less -->
                  
                  <?php
                     $staff = $this->db->get_where('staff',array('Staff_ID' => $this->session->userdata('User_Id')))->row_array();
                  ?>
                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <img src="<?php if($staff['image'] == ""){?>
                     <?= base_url('assets/img/user.jpg')?>
                     <?php }else{
                        echo $staff['image'];
                     }?>" class="user-image" alt="User Image">
                     <span class="hidden-xs"><?php echo $staff['fname']." ".$staff['lname'];?></span>
                     </a>
                     <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                           <img src="<?php if($staff['image'] == ""){?>
                     <?= base_url('assets/img/user.jpg')?>
                     <?php }else{
                        echo $staff['image'];
                     }?>" class="img-circle" alt="User Image">
                           <p>
                              <?php echo $staff['fname']." ".$staff['lname'];?> - <?php echo $staff['designation'];?>
                           </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                           
                           <div class="pull-right">
                              <a href="<?php echo site_url('Main_controller/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                           </div>
                        </li>
                     </ul>
                  </li>
                  <!-- Control Sidebar Toggle Button -->
                  <li>
                     <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
         <!-- sidebar: style can be found in sidebar.less -->
         <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
               <div class="pull-left image">
                  <img src="<?php if($staff['image'] == ""){?>
                     <?= base_url('assets/img/user.jpg')?>
                     <?php }else{
                        echo $staff['image'];
                     }?>" class="img-circle" alt="User Image">
               </div>
               <div class="pull-left info">
                  <p><?php echo $staff['fname']." ".$staff['lname'];?></p>
                  <a href="#"><i class="fa fa-circle text-success"></i>Log Key: <?php echo $this->session->userdata('Log_key') ?></a>
               </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
               <li class="header">MAIN NAVIGATION</li>
             
               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-home"></i>
                  <span>Properties</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li>
                        <a href="<?= site_url('Main_controller/manageProperties')?>">
                           <i class="fa fa-circle-o"></i> Manage Properties
                        </a>
                     </li>
                     <li>
                        <a href="<?= site_url('Main_controller/viewNewPropertySubmission')?>">
                           <i class="fa fa-circle-o"></i> Seller Submission Approval
                        </a>
                     </li>
                  </ul>
               </li>
               <li class="">
                  <a href="<?= site_url('Main_controller/manageUsers')?>">
                  <i class="fa fa-child"></i>
                  <span>Users</span>
                  </a>
               </li>
               <li class="">
                  <a href="<?= site_url('Main_controller/viewMessages') ?>">
                  <i class="fa fa-wechat"></i>
                  <span>Messages</span>
                  </a>
               </li>
               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-list-ul"></i> 
                  <span>Personel</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="<?= site_url('Main_controller/managePersonelView')?>/assets/pages/forms/general.html"><i class="fa fa-circle-o"></i> Manage Personel</a></li>
                  </ul>
               </li>
               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-dollar"></i> 
                  <span>Sales</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="<?= site_url('Main_controller/manageInvoiceView')?>"><i class="fa fa-circle-o"></i> Manage Invoices</a></li>
                     <li><a href="<?= site_url('Main_controller/manageMonthlyDues')?>"><i class="fa fa-circle-o"></i> Monthly Dues</a></li>
                     <li><a href="<?= site_url('Main_controller/purchaseRequest')?>"><i class="fa fa-circle-o"></i> Purchase Requests</a></li>
                     <li><a href="<?= site_url('Main_controller/viewPayments')?>"><i class="fa fa-circle-o"></i> View Payments</a></li>
                  </ul>
               </li>
            </ul>
         </section>
         <!-- /.sidebar -->
      </aside>
   