<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  //echo "<pre>";print_r($companyData);die;
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee
        <small>Preview page</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Company Details</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- =========================================================== -->
      <h2 class="page-header">Company Details</h2>
      <div class="row">
        <?php foreach($companyData as $company): ;?>
        
        <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo $company['companyName'];?></h3>
              <h5 class="widget-user-desc"><?php echo $company['companyEmail'];?></h5>
            </div>
            <!-- <div class="widget-user-image">
              <img class="img-circle" src="<?php echo base_url();?>assets/admin/dist/img/user1-128x128.jpg" alt="User Avatar">
            </div> -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">3,200</h5>
                    <span class="description-text">Revenue</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">13,000</h5>
                    <span class="description-text">Vendor</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">35</h5>
                    <span class="description-text">Customer</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- </a> -->
        <!-- /.col -->
    <?php endforeach;?>


      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->