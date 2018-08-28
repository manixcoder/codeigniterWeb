<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('superAdmin/SuperAdminCommonFunction');
		$this->load->model('superAdmin/DashBoardModel');
		$this->load->library('session');
		error_reporting(0);
		if (!$this->session->userdata())
		{
			redirect('superAdmin', 'refresh');
		}
	}
	function index()
	{
		$header_value = array(
				'page_title' => 'Dashboard',
				'nav'		 =>	'dashboard'
			);
		$this->load->view('superAdmin/templates/header',$header_value);
		$this->load->view('superAdmin/superAdminDashboard');
		$this->load->view('superAdmin/templates/footer');

	}
	function dashboardPage() 
	{
		$data['adminData'] = $this->SuperAdminCommonFunction->getAdminlist();
		$data['empData'] = $this->SuperAdminCommonFunction->getEmployeeList();
		 $data['compData'] = $this->SuperAdminCommonFunction->getCompanyList();
		 $data['adminCount'] = $this->SuperAdminCommonFunction->adminCount();
		 $data['empCount'] = $this->SuperAdminCommonFunction->empCount();
		 $data['companyCount'] = $this->SuperAdminCommonFunction->companyCount();
		 $header_value = array(
		 	'page_title' => 'Dashboard',
		 	'nav'		 =>	'dashboard'
		 );
		 $this->load->view('superAdmin/templates/header',$header_value);
		 $this->load->view('superAdmin/superAdminDashboard',$data);
		 $this->load->view('superAdmin/templates/footer');
	}
	
}