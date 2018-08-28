<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminDashboard extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/AdminCommonFunction');
		$this->load->model('admin/AdminDashBoardModel');
		$this->load->library('session');
		$adminSession = $this->session->userdata();
		error_reporting(-1);
		if (empty($adminSession))
		{
			redirect('admin', 'refresh');
		}
	}
	function dashboardPage() 
	{
		$adminSession = $this->session->userdata();		
		$adminId = $adminSession['admin_session'][0]['adminId'];
		$data['empCount'] 		= $this->AdminCommonFunction->getEmployeeCount($adminId);
		$data['compCount']		= $this->AdminCommonFunction->getCompanyCount($adminId);
		$data['latestEmp'] 		= $this->AdminCommonFunction->getlatestEmployee($adminId);
		$data['activeEmpNum'] 	= $this->AdminCommonFunction->getActiveEmpNum($adminId);
		$data['activeEmp'] 		= $this->AdminCommonFunction->getActiveEmp($adminId);
		$header_value = array(
			'page_title' => 'Dashboard',
			'nav'		 =>	'dashboard'
		);
		$this->load->view('admin/templates/header',$header_value);
		$this->load->view('admin/adminDashboard',$data);
		$this->load->view('admin/templates/footer');
	}
	function Userslisting()
	{
		$Data['usersData'] = $this->AdminDashBoardModel->usersListing();
		$header_value = array(
			'page_title' => 'User List',
			'nav'		 =>	'User'
		);
		$this->load->view('admin/templates/header',$header_value);
		$this->load->view('admin/userslist',$Data);
		$this->load->view('admin/templates/footer'); 
	}
	function userProfile($id)
	{
		if(isset($_POST['submit']))
		{
			$hidd_id 	 	= $this->input->post('hidd_id');
			$data =  array(
				'adminNotes'  => $this->input->post('adminNotes')
			);
			$data['userData'] = $this->AdminDashBoardModel->userProfileEdit($hidd_id,$data);
			$header_value = array(
				'page_title' => 'User List',
				'nav'		 =>	'User'
			);
			$this->load->view('admin/templates/header',$header_value);
			$this->load->view('admin/userProfile',$data);
			$this->load->view('admin/templates/footer'); 
		}
		else
		{
			$data['userData'] = $this->AdminDashBoardModel->userProfile($id);
			$header_value = array(
				'page_title' => 'User List',
				'nav'		 =>	'User'
			);
			$this->load->view('admin/templates/header',$header_value);
			$this->load->view('admin/userProfile',$data);
			$this->load->view('admin/templates/footer'); 
		}
	}
	function userDelete($id)
	{
		$data = $this->AdminDashBoardModel->userDelete($id);
		if ($data)
		{
			$message = "Your account has been deleted by admin";
			$userData = array(
				'users_id' 	=> $data[0]['user_id'],
				'type' 		=> 'Logout/Block',
			);
			$data = $this->PushnotificationModel->userDeleteNotification($data[0]['device_id'], $message, $userData);
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:red;font-size: 18px;fontfamily: bold;'>User deleted Successfully !!</div>");
			header("location:".base_url()."admin/Userslisting");
		}
	}
	function userBlock($id)
	{
		$data = $this->AdminDashBoardModel->userBlock($id);
		if ($data == "true")
		{
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;font-family: bold;'>You have unblocked the user..!!</div>");
			header("location:".base_url()."admin/Userslisting");
		}
		else
		{
			$message = 'Your account has been blocked by admin';
			$userData = array(
				'users_id' 	=> $data[0]['user_id'],
				'type' 		=> 'Logout/Block',
			);
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:red;font-size: 18px;fon-family: bold;'>You have blocked the user...!!</div>");
			header("location:".base_url()."admin/Userslisting");

		}
	}
	function userApprovedDeclined()
	{
		$data = array(
			'userStatus'  => $this->input->post('userStatus'),
			'id'   		  => $this->input->post('hidd_id') 
		);
		$query = $this->AdminDashBoardModel->userApprovedDeclined($data);
		$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;font-family: bold;'>Status Updated Successfully !!</div>");
		header("location:".base_url()."admin/Userslisting");
	}
}