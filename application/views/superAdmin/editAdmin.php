<?php
defined('BASEPATH') OR exit('No direct script access allowed'); //echo "<pre>";print_r($client_data);die;
?>
<div class="content-wrapper" style="min-height: 946px;">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Admin Edit
         <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">Admin List</a></li>
         <li class="active">Admin Edit</li>
      </ol>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Admin Data</h3>
               <center><h3 class="sus"><?php echo $this->session->flashdata('message_name'); ?></h3></center><?php $this->session->unset_userdata('message_name');?>
               <form  method="Post" role="form" action="" lpformnum="131" enctype = "multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="adminFirstName">First Name</label>
                    <input class="form-control" id="adminFirstName" value="<?php echo $client_data[0]['adminFirstName']; ?>"  name="adminFirstName" placeholder="Enter First Name"  type="text" required />
                  </div>
                  <div class="form-group">
                    <label for="adminLastName">Last Name</label>
                    <input class="form-control" id="adminLastName" value="<?php echo $client_data[0]['adminLastName'];?>" name="adminLastName" placeholder="Enter Last Name"  type="text" required />
                  </div>
                  <div class="form-group">
                    <label for="adminEmail">Email </label>
                    <input class="form-control" id="custEmail" value="<?php echo $client_data[0]['adminEmail'];?>" name="adminEmail" placeholder="Enter Email" type="email" readonly/>
                    <span class="error"><?php echo form_error('adminEmail'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="adminAadharNumber">Aadhar Card</label>
                    <input class="form-control" id="adminAadharNumber" value="<?php echo $client_data[0]['adminAadharNumber'];?>" name="adminAadharNumber" placeholder="Enter Aadhar Number" type="text" />
                    <span class="error"><?php echo form_error('adminAddharNumber'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="adminPanNumber">Pan Number</label>
                    <input class="form-control" id="adminPanNumber" value="<?php echo $client_data[0]['adminPanNumber'];?>" name="adminPanNumber" placeholder="Enter Username" type="text" />
                    <span class="error"><?php echo form_error('adminPanNumber'); ?></span>
                  </div>

                  <div class="form-group">
                    <label for="adminPhoneNumber">Phone Number</label>
                    <input class="form-control" id="adminPhoneNumber" value="<?php echo $client_data[0]['adminPhoneNumber'];?>" name="adminPhoneNumber" placeholder="Enter Phone Number" type="text" />
                    <span class="error"><?php echo form_error('adminAddharNumber'); ?></span>
                  </div>

                  <div class="form-group">
                    <label for="adminAlternatePhoneNumber">Alternate Phone Number</label>
                    <input class="form-control" id="adminAlternatePhoneNumber" value="<?php echo $client_data[0]['adminAlternatePhoneNumber'];?>" name="adminAlternatePhoneNumber" placeholder="Enter Alternate Phone Number" type="text" />
                    <span class="error"><?php echo form_error('adminAlternatePhoneNumber'); ?></span>
                  </div>                  
                  <div class="form-group">
                    <label>Date of Birth</label>
                      <div class="input-group date">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="text" id="datepicker2" class="form-control pull-right" value="<?php echo $client_data[0]['adminDOB'];?>" name="adminDOB">
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="adminStreetLine">Gender</label><br>
                    
                    <input type="radio" name="adminSex" value="1" <?php echo ($client_data[0]['adminSex']== '1') ?  "checked" : "" ;  ?>> Male<br>
                    <input type="radio" name="adminSex" value="2" <?php echo ($client_data[0]['adminSex']== '2') ?  "checked" : "" ;  ?>> Female<br>
                    <input type="radio" name="adminSex" value="3" <?php echo ($client_data[0]['adminSex']== '3') ?  "checked" : "" ;  ?>> Other
                  </div>
                  <div class="form-group">
                    <label for="adminProfileImage">Profile image </label><br>
                    <img src="<?php echo base_url().$client_data[0]['adminProfileImage'];?>" class="img-circle" height="60px" width="60px"> 
                    <input class="form-control" id="adminProfileImage" value="<?php echo $client_data[0]['adminProfileImage'];?>" name="adminProfileImage" accept="image/x-png,image/gif,image/jpeg" type="file" />
                  </div>
                  <div class="form-group">
                    <label for="adminAddress">Addres</label>
                    <input class="form-control" id="adminAddress" value="<?php echo $client_data[0]['adminAddress'];?>" name="adminAddress" placeholder="Enter Email" type="text" />
                    <span class="error"><?php echo form_error('adminAddress'); ?></span>
                  </div>
                  
                <div class="box-footer">
                  <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                  </div>
                </div>
              </form>
            </div>
         </div>
      </div>
    </section>
  </div>