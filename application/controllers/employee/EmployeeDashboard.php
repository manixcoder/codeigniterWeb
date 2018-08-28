<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmployeeDashboard extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('employee/EmployeeCommonFunction');
		$this->load->model('employee/EmployeeDashboardModel');
		$this->load->library('session');
		error_reporting(-1);		
		if (!$this->session->userdata())
		{
			redirect('employee', 'refresh');
		}
	}
	function dashboardPage() 
	{
		$employeeSession 		= $this->session->userdata();
		$empId 					= $employeeSession['employee_session'][0]['adminId'];
		$data['compCount'] 		= $this->EmployeeCommonFunction->getCompanyCount($empId);
		$data['custCount']		= $this->EmployeeCommonFunction->getCustCount($empId);
		$data['compData'] 		= $this->EmployeeCommonFunction->getAllCompany($empId);
		/*$data['restaurant_count'] 	= $this->EmployeeCommonFunction->restaurant_count();*/
		$header_value = array(
			'page_title' => 'Dashboard',
			'nav'		 =>	'dashboard'
		);
		$this->load->view('employee/templates/header',$header_value);
		$this->load->view('employee/employeeDashboard',$data);
		$this->load->view('employee/templates/footer');
	}
	function Userslisting()
	{
		$Data['usersData'] = $this->EmployeeDashboardModel->usersListing();
		$header_value = array(
			'page_title' => 'User List',
			'nav'		 =>	'User'
		);
		$this->load->view('employee/templates/header',$header_value);
		$this->load->view('employee/userslist',$Data);
		$this->load->view('employee/templates/footer'); 
	}
	function userProfile($id)
	{
		if(isset($_POST['submit']))
		{
			$hidd_id 	 	= $this->input->post('hidd_id');
			$data =  array(
				'adminNotes'  => $this->input->post('adminNotes')
			);
			$data['userData'] = $this->EmployeeDashboardModel->userProfileEdit($hidd_id,$data);
			$header_value = array(
				'page_title' => 'User List',
				'nav'		 =>	'User'
			);
			$this->load->view('employee/templates/header',$header_value);
			$this->load->view('employee/userProfile',$data);
			$this->load->view('employee/templates/footer'); 
		}
		else
		{
			$data['userData'] = $this->EmployeeDashboardModel->userProfile($id);
			$header_value = array(
				'page_title' => 'User List',
				'nav'		 =>	'User'
			);
			$this->load->view('employee/templates/header',$header_value);
			$this->load->view('employee/userProfile',$data);
			$this->load->view('employee/templates/footer'); 
		}
	}
	function gameApproveDecline()
	{
		$data = array(
			'id'  		=> $this->input->get('id'),
			'status'  	=> $this->input->get('status') 
		);
		$data = $this->EmployeeDashboardModel->gameApproveDecline($data);
		$this->session->set_flashdata("message_name","<div id='request' style ='color:green;font-size: 18px;font-family: bold;'>Status Updated Successfully !!</div>");
		header("location:" . base_url() . "employee/game-details/".$data['id']);
	}		
}