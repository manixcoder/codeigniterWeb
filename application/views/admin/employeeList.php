<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper" style="min-height: 916px;">
  <div style="padding: 20px 30px; background: rgb(243, 156, 18) none repeat scroll 0% 0%; z-index: 999999; font-size: 16px; font-weight: 600; display: none;">
    <a class="pull-right" href="#" data-toggle="tooltip" data-placement="left" title="" style="color: rgb(255, 255, 255); font-size: 20px;" data-original-title="Never show me this again!">×
    </a>
    <a href="https://themequarry.com" style="color: rgba(255, 255, 255, 0.9); display: inline-block; margin-right: 10px; text-decoration: none;">
    Ready to sell your theme? Submit your theme to our new marketplace now and let over 200k visitors see it!
    </a>
    <a class="btn btn-default btn-sm" href="https://themequarry.com" style="margin-top: -5px; border: 0px none; box-shadow: none; color: rgb(243, 156, 18); font-weight: 600; background: rgb(255, 255, 255) none repeat scroll 0% 0%;">
    Lets Do It!
    </a>
  </div>
  <section class="content-header">
    <h1>
      Employee Data
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Employee</a></li>
      <li class="active">Employee List</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Employee Data Table</h3>
          </div>
          <div class="box-body">
            <div style = "text-align: right; padding-right: 70px;"><input type="button" name="add" value="Add Employee" class = "btn-info btn" onClick="add_newClient()"/>
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
                          <th>login Status</th>
                          <th>Profile Image</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>PhoneNumber</th>
                          <th>Alt Phone Number</th>
                          <th>Aadhar Number</th>
                          <th>Pan Number</th>
                          <th>Address</th>
                          <th>Sex</th>
                          <th>DOB</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $count = 0;
                        foreach($clientsData as $client)
                          {?>
                          <tr role="row" class="odd">
                            <td>
                              <?php echo $count = $count+1;
                               ?>
                            </td>
                            <td>
                              <?php 
                              if($client['loginStatus'] =='0')
                              {
                                echo '<i class="fa fa-circle"></i>';
                              }
                              else
                              {
                                echo '<i class="fa fa-circle text-success"></i>';
                              }
                              ?>
                            </td>
                            <td>
                              <?php
                              if(!empty($client['adminProfileImage']))
                                {?>
                                <img src="<?php echo base_url().$client['adminProfileImage'];?>" class="img-circle" height="60px" width="60px">
                              <?php 
                                }
                                else
                                {
                              ?>
                              <img src="<?php echo base_url();?>Uploads/main/noimage.jpg" class="img-circle" height="60px" width="60px">
                              <?php
                                }
                              ?>
                            </td>
                            <td><?php echo $client['adminFirstName'];?></td>
                            <td><?php echo $client['adminLastName']; ?></td>
                            <td><?php echo $client['adminEmail']; ?></td>
                            <td><?php echo $client['adminPhoneNumber']; ?></td>
                            <td><?php echo $client['adminAlternatePhoneNumber']; ?></td>
                            <td><?php echo $client['adminAadharNumber']; ?></td>
                            <td><?php echo $client['adminPanNumber']; ?></td>
                            <td><?php echo $client['adminAddress']; ?></td>
                            <td>
                              <?php if($client['adminSex'] =='1') 
                              { 
                                echo "Male"; 
                              } 
                              else if ($client['adminSex'] =='2')
                                {
                                  echo "Female";
                                } 
                                else 
                                { 
                                  echo "Other"; 
                                } 
                              ?>
                            </td>
                            <td>
                              <?php echo $client['adminDOB']; ?>
                            </td>
                            <td>
                              <a href="<?php echo base_url().'admin/editEmployee/'?><?php echo $client['adminId'];?>"><i class="fa fa-fw fa-edit"></i>
                              </a>
                              <a href="<?php echo base_url().'admin/deleteEmployee/'?><?php echo $client['adminId'];?>"><i class="glyphicon glyphicon-trash"></i>
                              </a>
                              <!-- <a href="#" onclick = "clientUnBlock('<?php echo $client['adminId']; ?>');"><i class="fa fa-ban" aria-hidden="true" style="color:#ce1d00;"></i></a>
                                	<a href="#" onclick = "clientBlock('<?php echo $client['adminId']; ?>');"><i class="fa fa-ban" aria-hidden="true" style="color:#454545;"></i></a> -->
                            </td>
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
		window.location.href="<?php echo base_url(); ?>admin/addEmployee";
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
