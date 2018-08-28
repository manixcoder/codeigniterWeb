<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$admin_session = $this->session->userdata('superAdminSession');
  //echo "<pre>";print_r($admin_session);//die;
if(!is_array($admin_session[0]) && $admin_session[0]=='')
{
	header("location:" . base_url() . "superAdmin");
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
	<!--  <link rel='shortcut icon' href='<?php echo base_url('uploads/main/favicon.jpg');?>' type='image/x-icon' /> -->
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
			<a href="<?php //echo base_url()?>superAdmin" class="logo">
				<span class="logo-mini">Munims</span>
				<span class="logo-lg"><b>The</b>Munims</span>
			</a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Messages: style can be found in dropdown.less-->
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo base_url().$admin_session[0]['adminProfile'];?>" class="user-image" alt="User Image">
								<span class="hidden-xs"><?php echo $admin_session[0]['firstName'] ." ".$admin_session[0]['lastName']; ?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="<?php echo base_url().$admin_session[0]['adminProfile'];?>" class="img-circle" alt="User Image">

									<p>
										<?php echo $admin_session[0]['firstName'] ." ".$admin_session[0]['lastName']; ?> - Web Admin
										<small>Member since Dec. 2016</small>
									</p>
								</li>
								<!-- Menu Body -->
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
            		<!-- <a href="<?php //echo base_url()?>admin/admin-profile" class="btn btn-default btn-flat">Profile</a> -->
            	</div>
            	<div class="pull-right">
            		<a href="<?php echo base_url();?>superAdmin/SuperAdminAuth/logOut" class="btn btn-default btn-flat">Sign out</a>
            	</div>
            </li>
        </ul>
    </li>
    <!-- Control Sidebar Toggle Button -->
              <!--<li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li> -->
        </ul>
    </div>
</nav>
</header>      
<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?php echo base_url().$admin_session[0]['adminProfile'];?>" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?php echo $admin_session[0]['firstName'] ." ".$admin_session[0]['lastName']; ?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<ul class="sidebar-menu">
			<li class="header">MAIN NAVIGATION</li>
			<li class="<?php echo (isset($nav) && $nav =='dashboard')? 'active' : "";  ?> treeview">
				<a href="<?php echo base_url();?>superAdmin">
					<i class="fa fa-dashboard"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li class="<?php echo (isset($nav) && $nav =='User')? 'active' : "";  ?> treeview">
				<a href="<?php echo base_url()?>superAdmin/admin-list"">
					<i class="fa fa-users" aria-hidden="true"></i> <span>Manager</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class=""><a href="<?php echo base_url()?>superAdmin/admin-list"><i class="fa fa-circle-o"></i>Manager List</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="<?php echo base_url('superAdmin/companyList');?>">
					<i class="fa fa-tags" aria-hidden="true"></i> <span>Companies</span>
				</a>
			</li>
			<li class="treeview">
				<a href="<?php echo base_url('superAdmin/employeeList');?>">
					<i class="fa fa-tags" aria-hidden="true"></i> <span>Employee</span>
				</a>
			</li>
			<li class="<?php echo (isset($nav) && $nav =='groupList')? 'active' : "";  ?> treeview">
				<a href="#">
					<i class="fa fa-tags" aria-hidden="true"></i><span>Groups</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">            
					<li><a href="<?php echo base_url()?>superAdmin/grouplist"><i class="fa fa-circle-o"></i>Groups List</a></li>
				</ul>
			</li>
			<li class="<?php echo (isset($nav) && $nav =='accountsList')? 'active' : "";  ?> treeview">
				<a href="#">
					<i class="fa fa-tags" aria-hidden="true"></i><span>Accounts</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">            
					<li><a href="<?php echo base_url()?>superAdmin/accountslist"><i class="fa fa-circle-o"></i>Accounts List</a></li>
				</ul>
			</li>
            <!--<li class="<?php //echo (isset($nav) && $nav =='Restaurant')? 'active' : "";  ?> treeview">
              <a href="#">
              <i class="fa fa-list-alt" aria-hidden="true"></i><span>Restaurant Categary</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">            
              <li>
              <a href="<?php //echo base_url()?>admin/restaurantCategaryListing"><i class="fa fa-circle-o"></i>Categary List</a>
              </li>               
              </ul>              
              </li> 
              <li class="<?php //echo (isset($nav) && $nav =='Restaurant')? 'active' : "";  ?> treeview">
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
              <a href="<?php //echo base_url('superAdmin/foodcategory');?>">
                <i class="fa fa-cutlery" aria-hidden="true"></i> <span>Food Category</span> 
              </a>
              
            </li>
            <li class="treeview">
              <a href="<?php //echo base_url('superAdmin/beverages_category');?>">
                <i class="fa fa-beer" aria-hidden="true"></i><span>Beverages Category</span> 
              </a>
              
            </li>
            <li class="treeview">
              <a href="<?php //echo base_url('superAdmin/fooditem');?>">
                <i class="fa fa-cutlery" aria-hidden="true"></i><span>Food Products</span> 
              </a>
              
            </li>
            <li class="treeview">
              <a href="<?php //echo base_url('superAdmin/beverageitem');?>">
                <i class="fa fa-beer" aria-hidden="true"></i><span>Beverage Products</span> 
              </a>
          </li> -->
            <!-- 
            <li class="treeview">
              <a href="<?php // echo base_url('superAdmin/allergies-list');?>"><i class="fa fa-beer" aria-hidden="true"></i><span>Allergies</span>
              </a>
            </li> 
        -->

			   <!-- 
         <li class="<?php // echo (isset($nav) && $nav =='Pre Order')? 'active' : "";  ?> treeview">
              <a href="#">
                <i class="fa fa-users" aria-hidden="true"></i> <span>All Order </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?php // echo base_url()?>superAdmin/pre-order-list"><i class="fa fa-circle-o"></i>Pre Order</a></li>
                <li class=""><a href="<?php // echo base_url()?>superAdmin/order-list"><i class="fa fa-circle-o"></i>Order</a></li>           
                <li class=""><a href="<?php // echo base_url()?>superAdmin/take-away-list"><i class="fa fa-circle-o"></i>Take Away</a></li>
              </ul>
            </li>  
        </li> -->
            <!--  
              <li class="<?php // echo (isset($nav) && $nav =='game')? 'active' : "";  ?> treeview">
              <a href="#">
              <i class="fa fa-gamepad"></i><span> Game site</span> 
              
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li class=""><a href="<?php // echo base_url()?>superAdmin/game-sites"><i class="fa fa-circle-o"></i> Sites</a></li>
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
              <li class=""><a href="<?php // echo base_url()?>superAdmin/stores-List"><i class="fa fa-circle-o"></i>Stores</a></li>
              </ul>
              </li>
              
              <li class="<?php // echo (isset($nav) && $nav =='bullet')? 'active' : "";  ?> treeview">
              <a href="#">
              <i class="fa fa-dot-circle-o" aria-hidden="true"></i></i><span>Bullet</span> 
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>  
              </a>
              <ul class="treeview-menu">
              <li class=""><a href="<?php // echo base_url()?>superAdmin/bullet-list"><i class="fa fa-circle-o"></i>Bullets</a></li>
              </ul>
          </li> -->

      </ul>
  </section>
  <!--/.sidebar -->
</aside>                  