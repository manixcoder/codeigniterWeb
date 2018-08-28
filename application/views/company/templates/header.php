<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $company_session = $this->session->userdata('company_session');
  //echo "<pre>";print_r($company_session);die;
  if(!is_array($company_session[0]) && $company_session[0]=='')
  {
    header("location:" . base_url() . "company");
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
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                   <img src="<?php echo base_url().$company_session[0]['companyLogo'];?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $company_session[0]['companyName'] ; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url().$company_session[0]['companyLogo'];?>" class="user-image" alt="User Image">
                    
                    <p>
                      <?php echo $company_session[0]['companyName'] ; ?> - Web Admin
                      <small>Member since Dec. 2016</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="row">
                      
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
                      <a href="<?php echo base_url();?>company/CompanyAuth/logOut" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!--    <li>
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
              <img src="<?php echo base_url().$company_session[0]['companyLogo'];?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>
                <?php echo $company_session[0]['companyName']; ?>
              </p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <div>
            <div>
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>   
            <li class="<?php echo (isset($nav) && $nav =='dashboard')? 'active' : "";  ?> treeview">
              <a href="<?php echo base_url();?>admin">      
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span> 
              </a> 
            </li>   
            <li class="<?php echo (isset($nav) && $nav =='User')? 'active' : "";  ?> treeview">
              <a href="#">
                <i class="fa fa-users" aria-hidden="true"></i> <span>Company </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?php echo base_url()?>employee/companyDetails"><i class="fa fa-circle-o"></i>Company Detals</a></li>
                <!-- <li class=""><a href="<?php echo base_url()?>admin/manager-list"><i class="fa fa-circle-o"></i>Managers</a></li>           
                <li class=""><a href="<?php echo base_url()?>admin/waiter-list"><i class="fa fa-circle-o"></i>Waiters</a></li> -->
              </ul>
            </li> 
            
          </ul>
          </div>
          </div>
        </section>
        <!--/.sidebar -->
      </aside>                  