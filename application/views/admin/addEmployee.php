<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper" style="min-height: 946px;">
  <section class="content-header">
    <h1>
      Add Employee
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Employee List</a></li>
      <li class="active">Add Employee</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Employee Form</h3>
          </div>
          <h3 class="sus"><?php echo $this->session->flashdata('message_name'); ?></h3>
          <?php $this->session->unset_userdata('message_name'); ?>
          <form  method="Post" role="form" action="" lpformnum="131" enctype = "multipart/form-data">
            <div class="box-body">               
              <div class="form-group">
                <label for="adminFirstName">First Name</label>
                <input class="form-control" id="adminFirstName" name="adminFirstName" placeholder="Enter First Name"  type="text" required />
              </div> 
              <div class="form-group">
                <label for="custLastName">Last Name</label>
                <input class="form-control" id="custLastName" name="adminLastName" placeholder="Enter Last Name"  type="text" required />
              </div>              
              <div class="form-group">
                <label for="adminEmail">Email </label>
                <input class="form-control" id="adminEmail" name="adminEmail" placeholder="Enter Email"  type="email" required/>
                <span class="error"><?php echo form_error('adminEmail'); ?></span> 
              </div>
              <div class="form-group">
                <label for="adminPassword">Password </label>
                <input class="form-control" id="adminPassword" name="adminPassword" placeholder="Enter Password" type="password" required/>
              </div>              
              <div class="form-group">
                <label for="adminAadharNumber">Aadhar Card</label>
                <input class="form-control" id="adminAadharNumber" name="adminAadharNumber" placeholder="Enter Adhar Number"  type="text" required/>
              </div>
              <div class="form-group">
                <label for="adminPhoneNumber">Phone Number </label>
                <input class="form-control" id="adminPhoneNumber" name="adminPhoneNumber" pattern="\d*" maxlength="15" placeholder="Enter Phone Number"  maxlength="15" pattern="\d*" type="number" required/>
                <span class="error"><?php echo form_error('adminPhoneNumber'); ?></span> 
              </div>
              <div class="form-group">
                <label for="adminPanNumber">Pan Number </label>
                <input class="form-control" id="adminPanNumber" name="adminPanNumber" placeholder="Enter Pan Number"  type="text" required/>
              </div>
              <div class="form-group">
                <label for="adminAlternatePhoneNumber">Alternate Phone Number</label>
                <input class="form-control" id="adminAlternatePhoneNumber" name="adminAlternatePhoneNumber" placeholder="Enter Alternate Phone Number"  type="text" required/>
              </div>
              <div class="form-group">
                <label for="adminStreetLine">Gender</label><br>
                <input type="radio" name="adminSex" value="1" checked> Male<br>
                <input type="radio" name="adminSex" value="2"> Female<br>
                <input type="radio" name="adminSex" value="3"> Other
              </div>
              <div class="form-group">
                <label>Date of Birth</label>                
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" id="datepicker2" class="form-control pull-right" name="adminDOB">
                </div>
              </div>             
              <div class="form-group">
                <label for="adminProfileImage">Profile image </label>
                <input class="form-control" id="adminProfileImage" name="adminProfileImage" accept="image/x-png,image/gif,image/jpeg" type="file" /> 
              </div>
              <div class="form-group">
                <label for="adminAddress">Address</label>
                <textarea class="form-control" id="adminAddress" name="adminAddress" placeholder="Enter Address"></textarea>
              </div>             
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <script type="text/javascript">
    //onkeyup="nospaces(this)"
    function nospaces(t)
    {
      if(t.value.match(/\s/g))
        {
          alert('Sorry, you are not allowed to enter any space');
          t.value=t.value.replace(/\s+/g,'');
        }
    }
  </script>
  <style type="text/css">
      .form-50 {
        width: 50 %!important;
        float: left;
        padding: 10px;
      }
  </style>