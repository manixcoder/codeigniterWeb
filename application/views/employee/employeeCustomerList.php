<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//echo "<pre>";print_r($custData);die;
?>
<div class="content-wrapper" style="min-height: 916px;">
   <div style="padding: 20px 30px; background: rgb(243, 156, 18) none repeat scroll 0% 0%; z-index: 999999; font-size: 16px; font-weight: 600; display: none;">
      <a class="pull-right" href="#" data-toggle="tooltip" data-placement="left" title="" style="color: rgb(255, 255, 255); font-size: 20px;" data-original-title="Never show me this again!">
      ×
      </a>
      <a href="https://themequarry.com" style="color: rgba(255, 255, 255, 0.9); display: inline-block; margin-right: 10px; text-decoration: none;">
      Ready to sell your theme? Submit your theme to our new marketplace now and let over 200k visitors see it!</a>
      <a class="btn btn-default btn-sm" href="https://themequarry.com" style="margin-top: -5px; border: 0px none; box-shadow: none; color: rgb(243, 156, 18); font-weight: 600; background: rgb(255, 255, 255) none repeat scroll 0% 0%;">
      Lets Do It!</a>
   </div>
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Customer Data
         <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <!--  <li><a href="#">Customer</a></li> -->
         <li class="active">Customer List</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Customer Data Table</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                <div style = "text-align: right; padding-right: 70px;"><input type="button" name="add" value="Add New Customer" class = "btn-info btn" onClick="add_newClient()"/>
                </div>
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                  <div class="row">
                    <div class="col-sm-12">
                      <center>
                        <h3><?php echo $this->session->flashdata('message_name'); ?></h3>
                      </center>
                      <div class = "responsive">
                        <table id="User_listingTable1" class="table table-bordered table-striped">
                          <thead>
                            <tr role="row">
                              <th>Sr.No </th> 
                              <th>Company Name</th>                             
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone Number</th>
                              <th>Address</th>
                              <th>customerType</th>
                              <th>Mobile Number</th>
                              <th>Fax</th>
                              <th>PaymentTerms</th>
                              <th>Currency</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            if(!empty($custData)){
                            $count = 0;
                            foreach($custData as $client)
                             {?>
                            <tr role="row" class="odd">
                              <td><?php echo $count = $count+1; ?></td>
                              <td><?php echo $client['companyName'];?></td>
                              <td><?php echo $client['customerName']; ?></td>
                              <td><?php echo $client['customerEmail']; ?></td>
                              <td><?php echo $client['customerPhone']; ?></td>
                              <td><?php echo $client['customerAddress']; ?></td>
                              <td><?php echo $client['customerType']; ?></td>
                              <td><?php echo $client['customerNumber']; ?></td>
                              <td><?php echo $client['customerFax']; ?></td>
                              <td><?php echo $client['customerPaymentTerms']; ?></td>
                              <td><?php echo $client['customerCurrency']; ?></td>
                              <td>
                                <a href="<?php echo base_url().'employee/editCustomer/'?><?php echo $client['custId'];?>"><i class="fa fa-fw fa-edit"></i></a>
                                	<a href="<?php echo base_url().'employee/deleteCustomer/'?><?php echo $client['custId'];?>"><i class="glyphicon glyphicon-trash"></i></a>
                              </td>
                            </tr>
                              <?php 
                               }
                               }
                               else
                               {
                                echo "data not found";
                               }
                                ?>
                              </tbody>
                        </table>
                        </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<script>
	function add_newClient()
	{												
		window.location.href="<?php echo base_url(); ?>employee/addContacts";
	}
</script>
<script>
function clientBlock(id)
{
    var x = confirm("Are you sure you want to block this user ?");
     if (x)
     {
      window.location.href="<?php echo base_url(); ?>admin/Users/blockClient/"+id;
     }
     else
      {
        return false;
      }
  }
</script>
<script>
  function clientUnBlock(id)
  {
    var x = confirm("Are you sure you want to unblock this user?");
    if (x)
      {
        window.location.href="<?php echo base_url(); ?>admin/Users/blockClient/"+id;
      }
      else
      {
        return false;
      }
  }
</script>
