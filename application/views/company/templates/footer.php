 <?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
		<b>Version</b>1.01
	</div>
    <strong>&copy; 2017-2018 <a href="<?php echo base_url();?>admin">BREAKBILL Admin Dashboard</a>.</strong> All rights
    reserved.
</footer>
<aside class="control-sidebar control-sidebar-dark">
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
		<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
		<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
	</ul>
    <div class="tab-content">
		<div class="tab-pane" id="control-sidebar-home-tab">
			<h3 class="control-sidebar-heading">Recent Activity</h3>
			<ul class="control-sidebar-menu">
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-birthday-cake bg-red"></i>
						
						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
							
							<p>Will be 23 on April 24th</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-user bg-yellow"></i>
						
						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
							
							<p>New phone +1(800)555-1234</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
						
						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
							
							<p>nora@example.com</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-file-code-o bg-green"></i>
						
						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
							
							<p>Execution time 5 seconds</p>
						</div>
					</a>
				</li>
			</ul>			
			<h3 class="control-sidebar-heading">Tasks Progress</h3>
			<ul class="control-sidebar-menu">
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Custom Template Design
							<span class="label label-danger pull-right">70%</span>
						</h4>						
						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Update Resume
							<span class="label label-success pull-right">95%</span>
						</h4>						
						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-success" style="width: 95%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Laravel Integration
							<span class="label label-warning pull-right">50%</span>
						</h4>						
						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-warning" style="width: 50%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Back End Framework
							<span class="label label-primary pull-right">68%</span>
						</h4>						
						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-primary" style="width: 68%"></div>
						</div>
					</a>
				</li>
			</ul>			
		</div>
		<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
		<div class="tab-pane" id="control-sidebar-settings-tab">
			<form method="post">
				<h3 class="control-sidebar-heading">General Settings</h3>
				
				<div class="form-group">
					<label class="control-sidebar-subheading">
						Report panel usage
						<input type="checkbox" class="pull-right" checked>
					</label>
					
					<p>
						Some information about this general settings option
					</p>
				</div>
				<div class="form-group">
					<label class="control-sidebar-subheading">
						Allow mail redirect
						<input type="checkbox" class="pull-right" checked>
					</label>
					
					<p>
						Other sets of options are available
					</p>
				</div>
				<div class="form-group">
					<label class="control-sidebar-subheading">
						Expose author name in posts
						<input type="checkbox" class="pull-right" checked>
					</label>					
					<p>
						Allow the user to show his name in blog posts
					</p>
				</div>
				<h3 class="control-sidebar-heading">Chat Settings</h3>
				<div class="form-group">
					<label class="control-sidebar-subheading">
						Show me as online
						<input type="checkbox" class="pull-right" checked>
					</label>
				</div>
				<div class="form-group">
					<label class="control-sidebar-subheading">
						Turn off notifications
						<input type="checkbox" class="pull-right">
					</label>
				</div>
				<div class="form-group">
					<label class="control-sidebar-subheading">
						Delete chat history
						<a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
					</label>
				</div>
			</form>
		</div>
	</div>
</aside>
<div class="control-sidebar-bg"></div>
</div>
<script src="<?php echo base_url(); ?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!--- custom jquery --->
<script src="<?php echo base_url('assets/admin/custom/Admin_ajax_functions.js'); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bootstrap/css/pop.css">
<script src="<?php echo base_url(); ?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/knob/jquery.knob.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<!--script src="<?php echo base_url(); ?>assets/admin/plugins/iCheck/icheck.min.js"></script-->
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/fastclick/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/admin/dist/js/pages/dashboard.js"></script>


<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="bower_components/chart.js/Chart.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/dist/js/pages/dashboard2.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/bower_components/chart.js/Chart.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/dist/js/demo.js"></script>
<script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.min.js');?>"></script>









<script> $.widget.bridge('uibutton', $.ui.button); </script>
<script type="text/javascript">
    var nowDate = new Date();
	var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
$('#datepicker').datepicker({
	autoclose: true,
	startDate: today, 
	format: "yyyy-mm-dd" 
});
</script>


<script type="text/javascript">
    var today = new Date();
$('#datepicker2').datepicker({
	autoclose: true,
	maxDate: today,
	endDate: "today",
	format: "yyyy-mm-dd" 
});
</script>
<script>
	$(function () {
		$("#User_listingTable1").DataTable();	
	});
</script>
<script>
	
	$(function () {
		$("#example1").DataTable();	
	});
</script>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>
<script type="text/javascript">
    $(function($){
        var addToAll = false;
        var gallery = true;
        var titlePosition = 'inside';
        $(addToAll ? 'img' : 'img.fancybox').each(function(){
            var $this = $(this);
            var title = $this.attr('title');
            var src = $this.attr('data-big') || $this.attr('src');
            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
            $this.wrap(a);
        });
        if (gallery)
            $('a.fancybox').attr('rel', 'fancyboxgallery');
        $('a.fancybox').fancybox({
            titlePosition: titlePosition
        });
    });
    $.noConflict();
</script>

<link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" />
<style type="text/css">
    a.fancybox img {
        border: none;
        box-shadow: 0 1px 7px rgba(0,0,0,0.6);
        -o-transform: scale(1,1); -ms-transform: scale(1,1); -moz-transform: scale(1,1); -webkit-transform: scale(1,1); transform: scale(1,1); -o-transition: all 0.2s ease-in-out; -ms-transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out; transition: all 0.2s ease-in-out;
    } 
    a.fancybox:hover img {
        position: relative; z-index: 999; -o-transform: scale(1.03,1.03); -ms-transform: scale(1.03,1.03); -moz-transform: scale(1.03,1.03); -webkit-transform: scale(1.03,1.03); transform: scale(1.03,1.03);
    }
</style>
</body>
</html>