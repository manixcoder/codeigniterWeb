<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  //echo "<pre>";print_r($compData);die;
?>
<div class="content-wrapper" style="min-height: 946px;">
  <section class="content-header">
    <h1>
      Add Customer
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Customer List</a></li>
      <li class="active">Add Customer</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Customer Form</h3>
          </div>
          <h3 class="sus"><?php echo $this->session->flashdata('message_name'); ?></h3>
          <?php $this->session->unset_userdata('message_name'); ?>
          <form  method="Post" role="form" action="" lpformnum="131" enctype = "multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label>Select Company</label>
                  <select class="form-control" name="companyId">
                    <option>Select Company</option>
                    <?php foreach($compData as $emp){?>
                      <option value="<?php echo $emp['id'];?>" ><?php echo $emp['companyName'];?></option>
                    <?php }?>
                  </select>
              </div> 
              <div class="form-group">
                <label for="customerName">Name</label>
                    <input class="form-control" id="customerName" name="customerName" placeholder="Enter Customer Name"  type="text" required />
                  <span class="error"><?php echo form_error('companyName'); ?></span>
              </div>            
              <div class="form-group">
                <label for="customerEmail">Email</label>
                <input class="form-control" id="customerEmail" name="customerEmail" placeholder="Enter Customer Email"  type="email" required/>
                <span class="error"><?php echo form_error('componyEmail'); ?></span> 
              </div>
                           
              <div class="form-group">
                <label for="customerPhone">Phone Number</label>
                <input class="form-control" id="customerPhone" name="customerPhone" placeholder="Enter Customer Phone"  type="text" required/>
              </div>

              <div class="form-group">
                <label for="customerAddress">Address</label>
                <textarea class="form-control" id="customerAddress" name="customerAddress" placeholder="Enter Address"></textarea>
              </div>

              <div class="form-group">
                <label for="customerType">Customer Type</label>
                <select class="form-control" name="customerType" >
                  <option>Choose one of the following...</option>
                  <option value="1" >Customer</option>
                  <option value="2" >Vender</option>
                  <option value="3" >Both</option>
                </select>
              </div>
              <div class="form-group">
                <label for="customerContact">Contact</label>
                <input class="form-control" id="customerContact" name="customerContact" placeholder="Enter customerContact"/>
              </div>

              <div class="form-group">
                <label for="customerNumber">Number</label>
                <input class="form-control" id="customerNumber" name="customerNumber" placeholder="Enter Customer Number"/>
              </div>

              <div class="form-group">
              	<!-- <div class="form-group form-50"> -->
                <label for="customerFax">Fax</label>
                <input class="form-control" id="customerFax" name="customerFax" placeholder="Enter Company Customer Fax Number"/>
              </div>

              <div class="form-group">
                <label for="customerPaymentTerms">Payment Terms</label>
                <input class="form-control" id="customerPaymentTerms" name="customerPaymentTerms" placeholder="Enter Customer Payment Terms"/>
              </div>
              

              <div class="form-group">
                <label for="customerCurrency">Currency</label>
                <select class="form-control" name="customerCurrency" title="Choose one of the following...">
                  <option value="indianRupee" >Indian Rupee</option>
                </select>
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
  <style type="text/css">
    .form-50 {
    width: 50 %!important;
    float: left;
    padding: 10px;
  }
  </style>
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