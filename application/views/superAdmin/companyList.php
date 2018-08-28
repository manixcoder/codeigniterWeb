<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//echo "<pre>";print_r($companyData);die;
 ?>
 <div class="content-wrapper res-list-view" style="min-height: 916px;">
  <div style="padding: 20px 30px; background: rgb(243, 156, 18) none repeat scroll 0% 0%; z-index: 999999; font-size: 16px; font-weight: 600; display: none;">
    <a class="pull-right" href="#" data-toggle="tooltip" data-placement="left" title="" style="color: rgb(255, 255, 255); font-size: 20px;" data-original-title="Never show me this again!">
      ×
    </a>
    <a href="https://themequarry.com" style="color: rgba(255, 255, 255, 0.9); display: inline-block; margin-right: 10px; text-decoration: none;">
    Ready to sell your theme? Submit your theme to our new marketplace now and let over 200k visitors see it!</a>
    <a class="btn btn-default btn-sm" href="https://themequarry.com" style="margin-top: -5px; border: 0px none; box-shadow: none; color: rgb(243, 156, 18); font-weight: 600; background: rgb(255, 255, 255) none repeat scroll 0% 0%;">
    Lets Do It!</a>
  </div>
  <section class="content-header">
    <h1>Comapny Data
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Comapny List</li>
    </ol>
  </section>
  <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Comapny Data Table</h3>
              </div>
              <div class="box-body">
                <!-- <div style = "text-align: right; padding-right: 70px;">
                  <input type="button" name="add" value="Add New Manager" class = "btn-info btn" onClick="addNewAdmin()"/>
                </div> -->
                  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row rest-list">
                      <div class="col-sm-12 my-table">
                        <center><h3><?php echo $this->session->flashdata('message_name'); ?></h3></center>
                        <div class ="responsive">
                          <table id="User_listingTable1" class="table table-bordered table-striped">
                            <thead>
                              <tr role="row"> 
                              <th>Sr.No </th>
                              <th>Manager Name</th>
                              <th>Manager Image</th>
                              <th>Emp Name</th>
                              <th>Emp Image</th>
                              <th>Company Name</th>
                              <th>Phone Number</th>
                              <th>Mobile Number</th>
                              <th>Email</th>
                              <th>WebSite</th>
                              <th>Addres</th>
                              
                              <!-- <th>Action</th> --> 
                            </tr>
                          </thead> 
                          <tbody>
                          <?php
                          $count = 0;
                          foreach($companyData as $client)
                          {
                           //echo "<pre>"; print_r($client);die;
                          ?>
                          <tr role="row" class="odd">
                            <td><?php echo $count = $count+1;?></td>
                            <td><?php echo $client['managerName'];?></td>
                            <td>
                              <?php
                              if(!empty($client['managerImage']))
                              {
                              ?>
                              <img src="<?php echo base_url().$client['managerImage'];?>" class="img-circle" height="60px" width="60px">
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
                          <td><?php echo $client['empName'];?></td>
                            <td>
                              <?php if(!empty($client['empImage']))
                              {
                              ?>
                              <img src="<?php echo base_url().$client['empImage'];?>" class="img-circle" height="60px" width="60px">
                              <?php
                              }
                              else
                              {
                            ?>
                            <img src="<?php echo base_url();?>Uploads/main/noimage.jpg" class="img-circle" height="60px" width="60px">
                            <?php
                            }?></td>
                            <td><?php echo $client['companyName'];?></td>
                            <td><?php echo $client['companyPhoneNumber'];?></td>
                            <td><?php echo $client['companyMobileNumber'];?></td>
                            <td><?php echo $client['companyEmail'];?></td>
                            <td><?php echo $client['companyWebSite'];?></td>
                            <td><?php  $string = strip_tags($client['companyAddress']);
                            /*if (strlen($string) > 10)
                            {
                              // truncate string
                              $stringCut = substr($string, 0, 10);
                              $endPoint = strrpos($stringCut, ' ');
                              //if the string doesn't contain any space then it will cut without word basis.
                              $string = $endPoint ? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                              $string .= '... <a href="/this/story">Read More</a>';
                            }
                            echo $string;*/
                            echo $client['companyAddress'];
                            ?>
                            </td>
                            
                            <!-- <td><?php echo $client['adminUpdatedAt'];?></td> -->
                           <!--  <td>
                              <a href="<?php echo base_url(); ?>superAdmin/AdminUsers/adminDelete/<?php echo $client['adminId']; ?>" onclick="return confirm('Are you sure to delete this Admin !');"><i class="fa fa-fw fa-trash-o"></i></a>
                              <a href="<?php echo base_url().'superAdmin/AdminUsers/editAdmin/'?><?php echo $client['adminId'];?>"><i class="fa fa-fw fa-edit"></i>
                              </a>
                              <?php if($client['is_Block'] == "true")
                              {
                                ?>
                                <a href="#" onclick = "clientUnBlock('<?php echo $client['adminId']; ?>');"><i class="fa fa-ban" aria-hidden="true" style="color:#ce1d00;"></i>
                                  </a>
                                    <?php 
                                  } else if($client['is_Block'] == "false") 
                                  { 
                                  ?>
                                  <a href="#" onclick = "adminBlock('<?php echo $client['adminId']; ?>');">
                                    <i class="fa fa-ban" aria-hidden="true" style="color:#454545;"></i>
                                  </a>
                                  <?php
                                  }
                                  else
                                  {
                                    // echo
                                  }
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
  jQuery(document).ready(function()
  {
    jQuery(".butt").on("click",function()
    {
      var b = jQuery(this).attr("data-info");
      jQuery("#restaurantName").val(b);
      var restid = jQuery(this).attr("data-restid");
      jQuery("#restaurantid").val(restid);
      var base_url =jQuery("#baseurl").val();
      //var restid = jQuery(this).attr("data-restid");
      //data-ordertype
      jQuery.ajax({
       type: "POST",
       url: base_url + "admin/Restaurant/RestaurantOrderId",
       data: {restid:restid},
       cache:false,
       success:
          function(data)
          {
            $("#checkdata").html(data);
            //alert(data);
          }
        });
    });
  });
</script>
<script>
  jQuery(document).ready(function(){
    jQuery(".descr").on("click",function(){
      var d = jQuery(this).attr("data-description");
      //alert(d);
      jQuery("#rest_descr").val(d);
    });
  });
</script>


<style>
#fancybox-wrap{
  top: 20% !important; padding: 0 !important;
}
.content-wrapper.res-list-view 
{
   min-height: auto !important;

}
</style>
<script>
  function addNewAdmin()
  {                       
    window.location.href="<?php echo base_url(); ?>superAdmin/add-admin";
  }
</script>
<script>
function adminBlock(id)
{
  //alert(id);
    var x = confirm("Are you sure you want to block this Admin ?");
     if (x)
     {
          window.location.href="<?php echo base_url(); ?>superAdmin/AdminUsers/blockAdmin/"+id;
     }
     else
     {
        return false;
     }
}
</script>
<script>
function adminUnBlock(id)
{
    var x = confirm("Are you sure you want to unblock this Admin ?");
    if (x)
    {
     window.location.href="<?php echo base_url(); ?>superAdmin/AdminUsers/unBlockAdmin/"+id;
    }
  else
  {
     return false;
  }
}
</script>