<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//echo "<pre>";print_r($groupData);die;
?>
<div class="content-wrapper" style="min-height: 946px;">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Group Edit
         <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">Group List</a></li>
         <li class="active">Group Edit</li>
      </ol>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Group Data</h3>
               <center><h3 class="sus"><?php echo $this->session->flashdata('message_name'); ?></h3></center><?php $this->session->unset_userdata('message_name');?>
               <form  method="Post" role="form" action="" lpformnum="131" enctype = "multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="groupName">Group Name</label>
                    <input class="form-control" id="groupName" value="<?php echo $groupData[0]['groupName']; ?>"  name="groupName" placeholder="Enter Group Name"  type="text" required />
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