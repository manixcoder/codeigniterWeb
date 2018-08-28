<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  //echo "<pre>";print_r($empData);die;
?>
<div class="content-wrapper" style="min-height: 946px;">
  <section class="content-header">
    <h1>
      Add Company
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Company List</a></li>
      <li class="active">Add Company</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Company Form</h3>
          </div>
          <h3 class="sus"><?php echo $this->session->flashdata('message_name'); ?></h3>
          <?php $this->session->unset_userdata('message_name'); ?>
          <form  method="Post" role="form" action="" lpformnum="131" enctype = "multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label>Assign To Employee</label>
                  <select class="form-control" name="employeeId" required>
                    <option required>Select Employee</option>
                    <?php foreach($empData as $emp){?>
                    <option value="<?php echo $emp['adminId'];?>" ><?php echo $emp['adminFirstName']." ".$emp['adminLastName'];?></option>
                  <?php }?>
                </select>
              </div>
              <div class="form-group">
                <label for="companyLogo">Company Logo</label>
                    <input class="form-control" id="companyLogo" name="companyLogo" type="file" required />
              </div> 
              <div class="form-group">
                <label for="companyName">Company Name</label>
                    <input class="form-control" id="companyName" name="companyName" placeholder="Enter Last Name"  type="text" required />
                  <span class="error"><?php echo form_error('companyName'); ?></span>
              </div>
              <div class="form-group">
                <label for="companyType">Company Type</label>
                <select class="form-control" name="companyType">
                    <option>Select Company Type</option>
                    <option value="partnership" >Partnership</option>
                    <option value="" >Firm</option>
                    <option value="llp" >Limited Liability Partnership</option>
                    <option value="pvltd" >Private Limited</option>
                    <option value="ltd" >Limited</option>
                    <option value="Trust" >Trust</option>
                    <option value="Socity" >Socity</option>
                    <option value="aop/bop" >AOP/BOI</option>
                    <option value="huf" >HUF</option>
                </select>                    
              </div>            
              <div class="form-group">
                <label for="companyEmail">Email</label>
                <input class="form-control" id="companyEmail" name="companyEmail" placeholder="Enter Email"  type="email" required/>
                <span class="error"><?php echo form_error('componyEmail'); ?></span> 
              </div>
              <div class="form-group">
                <label for="companyPassword">Password </label>
                <input class="form-control" id="companyPassword" name="companyPassword" placeholder="Enter Password" type="password" required/>
              </div>              
              <div class="form-group">
                <label for="companyPhoneNumber">Phone Number</label>
                <input class="form-control" id="companyPhoneNumber" name="companyPhoneNumber" placeholder="Enter Adhar Number"  type="text" required/>
              </div>
              <div class="form-group">
                <label for="companyMobileNumber">Mobile Number</label>
                <input class="form-control" id="companyMobileNumber" name="companyMobileNumber" placeholder="Enter Mobile Number"  type="text"/>
              </div>
              

              <div class="form-group">
                <label for="companyWebSite">Web Site</label>
                <input class="form-control" id="companyWebSite" name="companyWebSite" placeholder="https://www.google.co.in"/>
              </div>

              <div class="form-group">
                <label for="companyGSTRegistrationType">GST Registration Type</label>
                <select class="form-control" name="companyGSTRegistrationType">
                    <option>Select GST Registration Type</option>
                    <option value="GSTregistered-Regular" >GST registered- Regular</option>
                    <option value="GSTregistered-Composition" >GST registered- Composition</option>
                    <option value="GSTunregistered" >GST unregistered</option>
                    <option value="ISD" >Input Service Destriputry</option>
                    <option value="TANBased" >TAN Based</option>
                    <option value="casualtax" >Casual tax</option>
                    <option value="e-commerce">E-Commerce</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="companyGSTINNumber">GSTIN Number</label>
                <input class="form-control" id="companyGSTINNumber" name="companyGSTINNumber" placeholder="Enter GSTIN Number"/>
              </div>
              <div class="form-group">
                <label for="companyGSTImage">GST Image</label>
                    <input class="form-control" id="companyGSTImage" name="companyGSTImage" type="file" />
              </div>
              <div class="form-group">
                <label for="companyAddress">Address</label>
                <textarea class="form-control" id="companyAddress" name="companyAddress" placeholder="Enter Address"></textarea>
              </div>
              <div class="form-group">
                <label for="postalCode">Postal Code</label>
                <input class="form-control" id="postalCode" name="postalCode" placeholder="123456"/>
              </div>
              <div class="form-group">
                <label for="companyNotes">Notes</label>
                <textarea class="form-control" id="companyNotes" name="companyNotes" placeholder="Enter Notes"></textarea>
              </div>
              <div class="form-group">
                <label class="text-aqua" for="companyGSTRegistrationType">Company Tax Info</label>
              </div>
              <div class="form-group">
                <label for="companyTaxInfo_taxRegNo">RegNo</label>
                <input class="form-control" id="companyTaxInfo_taxRegNo" name="companyTaxInfo_taxRegNo" placeholder="Enter RegNo"/>
              </div>
              <div class="form-group">
                <label for="companyRegNoImage">Reg No Image</label>
                    <input class="form-control" id="companyRegNoImage" name="companyRegNoImage" type="file" />
              </div>
              <div class="form-group">
                <label for="companyTaxInfo_PANNo">PAN No</label>
                <input class="form-control" id="companyTaxInfo_PANNo" name="companyTaxInfo_PANNo" placeholder="Enter TaxInfo PAN No"/>
              </div>
              <div class="form-group">
                <label for="panCardImage">PAN Card Image</label>
                    <input class="form-control" id="panCardImage" name="panCardImage" type="file" />
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