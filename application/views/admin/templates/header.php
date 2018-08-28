<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $admin_session = $this->session->userdata('admin_session');
  //echo "<pre>";print_r($admin_session);die;
  if(!is_array($admin_session[0]) && $admin_session[0]=='')
  {
    header("location:" . base_url() . "admin");
  } 


?>

<style>
  .lst-icon 
  {
    color:#ff0000; 
  } 
  
  .error 
  {
    color:#ff0000;font-weight: bold;
  }
</style>

<style>
  .sus > div 
  {
    background: rgba(7, 128, 0, 0.4) none repeat scroll 0 0;
    border: 1px solid rgb(4, 128, 0);
    border-radius: 3px;
    font-family: "Source Sans Pro",sans-serif!important;
    font-size: 14px!important;
    margin: 23px auto;
    padding: 10px;
    text-align: center;
    width: 92%;
  }
  /*responsive table add scrolll bar*/
  @media screen and (max-width: 1157px) 
  {
    .responsive .col-sm-12 
      {
        overflow: auto;
      }
  }
 
  
</style>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $page_title;?></title>
    <!-- <link rel='shortcut icon' href='<?php echo base_url('uploads/main/favicon.jpg');?>' type='image/x-icon' /> -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/morris/morris.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/AdminLTE.min.css">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <a href="<?php echo base_url()?>admin" class="logo">
          <span class="logo-mini">Munims</span>
          <span class="logo-lg"><b>The</b>Munims</span>
        </a>
        <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url().$admin_session[0]['adminProfileImage'];?>" class="user-image" alt="User Image" height="60px" width="60px">
                  <span class="hidden-xs"><?php echo $admin_session[0]['adminFirstName'] ." ".$admin_session[0]['adminLastName']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?php echo base_url().$admin_session[0]['adminProfileImage'];?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $admin_session[0]['adminFirstName'] ." ".$admin_session[0]['adminLastName']; ?> - Web Admin
                      <small>Member since  <?php $joinDate =explode(" ", $admin_session[0]['adminCreatedAt']); $source = $joinDate[0]; $date = new DateTime($source); echo $date->format('d-m-Y');
                      ?></small>
                    </p>
                  </li>
                  <li class="user-body">
                    <div class="row">
                      <!--div class="col-xs-4 text-center">
                        <a href="#">Followers</a>
                        </div>
                        <div class="col-xs-4 text-center">
                        <a href="#">Sales</a>
                        </div>
                        <div class="col-xs-4 text-center">
                        <a href="#">Friends</a>
                      </div-->
                    </div>
                    <!-- /.row -->
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                      <!-- <a href="<?php echo base_url()?>admin/admin-profile" class="btn btn-default btn-flat">Profile</a> -->
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url();?>admin/AdminAuth/logOut" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>              
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url().$admin_session[0]['adminProfileImage'];?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>
                <?php echo $admin_session[0]['adminFirstName'] ." ".$admin_session[0]['adminLastName']; ?>
              </p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>   
            <li class="<?php echo (isset($nav) && $nav =='dashboard')? 'active' : "";  ?> treeview">
              <a href="<?php echo base_url();?>admin">      
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span> 
              </a> 
            </li>   
            <li class="<?php echo (isset($nav) && $nav =='employee')? 'active' : "";  ?> treeview">
              <a href="#">
                <i class="fa fa-users" aria-hidden="true"></i> <span>Employee</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo (isset($nav) && $nav =='employee')? 'active' : "";  ?> treeview">
                <li class=""><a href="<?php echo base_url()?>admin/employeeListing"><i class="fa fa-circle-o"></i>Employee</a></li>
                <!-- <li class=""><a href="<?php // echo base_url()?>admin/manager-list"><i class="fa fa-circle-o"></i>Managers</a></li>           
                <li class=""><a href="<?php // echo base_url()?>admin/waiter-list"><i class="fa fa-circle-o"></i>Waiters</a></li> -->
              </ul>
            </li> 
            <li class="<?php echo (isset($nav) && $nav =='company')? 'active' : "";  ?> treeview">
              <a href="#">
                <i class="fa fa-cutlery" aria-hidden="true"></i><span>Company</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">            
                <li>
                  <li class="<?php  echo (isset($nav) && $nav =='company')? 'active' : "";  ?> treeview">
                  <a href="<?php echo base_url()?>admin/companiesListing"><i class="fa fa-circle-o"></i>Company</a>
                </li>
                <!-- <li>
                  <a href="<?php // echo base_url()?>admin/editedrestaurant-list"><i class="fa fa-circle-o"></i>Edited Restaurants</a>
                </li> -->
              </ul>              
            </li>  
            <!-- <li class="treeview">
              <a href="<?php // echo base_url('admin/promocodes');?>">
                <i class="fa fa-tags" aria-hidden="true"></i> <span>Promo code</span> 
              </a>
              
            </li> -->
            <!--<li class="<?php // echo (isset($nav) && $nav =='Promocode')? 'active' : "";  ?> treeview">
              <a href="#">
                <i class="fa fa-tags" aria-hidden="true"></i><span>Promo code</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">            
                <li><a href="<?php //echo base_url()?>admin/promocode-list"><i class="fa fa-circle-o"></i>codes</a></li>
              </ul>
            </li>-->
            <!--<li class="<?php // echo (isset($nav) && $nav =='Restaurant')? 'active' : "";  ?> treeview">
              <a href="#">
              <i class="fa fa-list-alt" aria-hidden="true"></i><span>Restaurant Categary</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">            
              <li>
              <a href="<?php // echo base_url()?>admin/restaurantCategaryListing"><i class="fa fa-circle-o"></i>Categary List</a>
              </li>               
              </ul>              
              </li> 
              <li class="<?php // echo (isset($nav) && $nav =='Restaurant')? 'active' : "";  ?> treeview">
              <a href="#">
              <i class="fa-food" aria-hidden="true"></i><span>Restaurant Product</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">            
              <li>
              <a href="#"><i class="fa fa-circle-o"></i>Product List</a>
              </li>               
              </ul>              
            </li> -->
            <!-- <li class="treeview">
              <a href="<?php // echo base_url('admin/foodcategory');?>">
                <i class="fa fa-cutlery" aria-hidden="true"></i> <span>Food Category</span> 
              </a>
              
            </li> -->
            <!-- <li class="treeview">
              <a href="<?php //echo base_url('admin/beverages_category');?>">
                <i class="fa fa-beer" aria-hidden="true"></i><span>Beverages Category</span> 
              </a>
              
            </li> -->
            <!-- <li class="treeview">
              <a href="<?php // echo base_url('admin/fooditem');?>">
                <i class="fa fa-cutlery" aria-hidden="true"></i><span>Food Products</span> 
              </a>
              
            </li> -->
            <!-- <li class="treeview">
              <a href="<?php // echo base_url('admin/beverageitem');?>">
                <i class="fa fa-beer" aria-hidden="true"></i><span>Beverage Products</span> 
              </a>
              
            </li> -->
            <!-- <li class="treeview">
              <a href="<?php // echo base_url('admin/allergies-list');?>">
                <i class="fa fa-beer" aria-hidden="true"></i><span>Allergies</span> 
              </a>
              
            </li> -->
            <!-- <li class="<?php // echo (isset($nav) && $nav =='Pre Order')? 'active' : "";  ?> treeview">
              <a href="#"><i class="fa fa-users" aria-hidden="true"></i><span>All Order </span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?php // echo base_url()?>admin/pre-order-list"><i class="fa fa-circle-o"></i>Pre Order</a></li>
                <li class=""><a href="<?php // echo base_url()?>admin/order-list"><i class="fa fa-circle-o"></i>Order</a></li>           
                <li class=""><a href="<?php // echo base_url()?>admin/take-away-list"><i class="fa fa-circle-o"></i>Take Away</a></li>
              </ul>
            </li> --> 
            <!-- </li> --> 
			
			
			
			
            <!--  
              <li class="<?php // echo (isset($nav) && $nav =='game')? 'active' : "";  ?> treeview">
              <a href="#">
              <i class="fa fa-gamepad"></i><span> Game site</span> 
              
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li class=""><a href="<?php // echo base_url()?>admin/game-sites"><i class="fa fa-circle-o"></i> Sites</a></li>
              </ul>
              </li>
              
              <li class="<?php // echo (isset($nav) && $nav =='Store')? 'active' : "";  ?> treeview">
              <a href="#">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i></i><span>Store</span> 
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>  
              </a>
              <ul class="treeview-menu">
              <li class=""><a href="<?php //echo base_url()?>admin/stores-List"><i class="fa fa-circle-o"></i>Stores</a></li>
              </ul>
              </li>
              
              <li class="<?php echo (isset($nav) && $nav =='bullet')? 'active' : "";  ?> treeview">
              <a href="#">
              <i class="fa fa-dot-circle-o" aria-hidden="true"></i></i><span>Bullet</span> 
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>  
              </a>
              <ul class="treeview-menu">
              <li class=""><a href="<?php echo base_url()?>admin/bullet-list"><i class="fa fa-circle-o"></i>Bullets</a></li>
              </ul>
            </li> -->
            
          </ul>
        </section>
        <!--/.sidebar -->
      </aside>                  