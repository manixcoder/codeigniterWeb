<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//echo "<pre>";print_r($clientsData);die;
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
         Company Data
         <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <!--  <li><a href="#">Customer</a></li> -->
         <li class="active">Company List</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Company Data Table</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                <div style = "text-align: right; padding-right: 70px;"><input type="button" name="add" value="Add New Company" class = "btn-info btn" onClick="add_newClient()"/>
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
                              <th>Assign To</th>
                              <th>Company Logo</th>
                              <th>Company Name</th>
                              <th>Email</th>
                              <th>Phone Number</th>
                              <th>Mobile Number</th>
                              <th>Fax Number</th>
                              <th>Others</th>
                              <th>WebSite</th>
                              <th>GST Registration Type</th>
                              <th>GSTIN Number</th>
                              <th>Address</th>
                              <th>Notes</th>
                              <th>TaxInfo TaxRegNo</th>
                              <th>TaxInfo CSTRegNo</th>
                              <th>TaxInfo PAN Card</th>
                              <th>PrefrredPaymentMethod</th>
                              <th>PreferedDeliverMethod</th>
                              <th>Opening Balance</th>
                              <th>Created</th>
                             <!--  <th>Action</th> -->
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $count = 0;
                            foreach($clientsData as $client)
                             {
                              //echo "<pre>";print_r($client);
                            ?>
                            <tr role="row" class="odd">
                              <td><?php echo $count = $count+1; ?></td>
                              <td><?php echo $client['adminFirstName']." ".$client['adminLastName']; ?></td>
                              <td><?php
                              if($client['companyLogo'] !='')
                              {
                              ?>
                              <img src="<?php echo base_url().$client['companyLogo'];?>" class="img-circle" height="60px" width="60px">
                              <?php
                              }
                              else
                              {
                              ?>
                              <img src="<?php echo base_url();?>uploads/main/noimage.png" class="img-circle" height="60px" width="60px">
                            <?php 
                            }
                            ?>
                              </td>
                                 <td><?php echo $client['companyName']; ?></td>
                                 <td><?php echo $client['companyEmail']; ?></td>
                                 <td><?php echo $client['companyPhoneNumber']; ?></td>
                                 <td><?php echo $client['companyMobileNumber']; ?></td>
                                 <td><?php echo $client['companyFaxNumber']; ?></td>
                                 <td><?php echo $client['companyOthers']; ?></td>
                                 <td><?php echo $client['companyWebSite']; ?></td>
                                 <td><?php echo $client['companyGSTRegistrationType']; ?></td>
                                 <td><?php echo $client['companyGSTINNumber']; ?></td>
                                 <td><?php echo $client['companyAddress']; ?></td>
                                 <td><?php echo $client['companyNotes']; ?></td>
                                 <td><?php echo $client['companyTaxInfo_taxRegNo']; ?></td>
                                 <td><?php echo $client['companyTaxInfo_CSTRegNo']; ?></td>
                                 <td><?php echo $client['companyTaxInfo_PANNo']; ?></td>
                                 <td><?php echo $client['companyPB_PrefrredPaymentMethod']; ?></td>
                                 <td><?php echo $client['companyPB_PreferedDeliverMethod']; ?></td>
                                 <td><?php echo $client['companyOpeningBalance']; ?></td>
                                 <td><?php echo $client['createdAt']; ?></td>
                                 <!-- <td>
                                  <a href="<?php // echo base_url().'admin/edit-cleint/'?><?php // echo $client['id'];?>"><i class="fa fa-fw fa-edit"></i></a>
                                  <?php // if($client['is_Block'] == "false")
                                   {?>
                                    <a href="#" onclick = "clientUnBlock('<?php // echo $client['id']; ?>');"><i class="fa fa-ban" aria-hidden="true" style="color:#ce1d00;"></i></a>
                                    <?php } //else if($client['is_Block'] == "true") { ?>
                                      <a href="#" onclick = "clientBlock('<?php // echo $client['id']; ?>');">
                                        <i class="fa fa-ban" aria-hidden="true" style="color:#454545;"></i></a>
                                       <?php 
                                     //}else {
                                       // echo 
                                     //}
                                 ?>
                               </td> -->                               
                              </tr>
                              <?php 
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
    window.location.href="<?php echo base_url(); ?>admin/addCompany";
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