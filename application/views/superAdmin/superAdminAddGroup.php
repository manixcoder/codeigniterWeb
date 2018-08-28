<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper" style="min-height: 946px;">
  <section class="content-header">
    <h1>
      Add Group
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Group List</a></li>
      <li class="active">Add Group</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Group Form</h3>
          </div>
          <h3 class="sus"><?php echo $this->session->flashdata('message_name'); ?></h3>
          <?php $this->session->unset_userdata('message_name'); ?>
          <form  method="Post" role="form" action="" lpformnum="131" enctype = "multipart/form-data">
            <div class="box-body">               
              <div class="form-group">
                <label for="groupName">Group Name</label>
                <input class="form-control" id="groupName" name="groupName" placeholder="Enter Group Name"  type="text" required />
                 <span class="error"><?php echo form_error('groupName'); ?></span>
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
    //onkeyup="nospaces(this)";
    function nospaces(t)
    {
      if(t.value.match(/\s/g))
        {
          alert('Sorry, you are not allowed to enter any space');
          t.value=t.value.replace(/\s+/g,'');
        }
    }
  </script>