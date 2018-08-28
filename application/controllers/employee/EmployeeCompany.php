<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeCompany extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('employee/EmployeeCommonFunction');
		$this->load->model('employee/EmployeeCompanyModel');
		$this->load->library('session');
		error_reporting(-1);
		$empSession = $this->session->userdata();
		if (!$empSession)
		{
			redirect('employee', 'refresh');
		}
	}
	function index()
	{
		echo "EmployeeCompany";
	}
	function companyListForEmp()
	{
		$empSession = $this->session->userdata();
		$empId = $empSession['employee_session'][0]['adminId'];
		$data['companyData'] = $this->EmployeeCompanyModel->getEmployeeCompanyList($empId);
		//echo "<pre>";print_r($empSession);die;
		
		$header_value = array(
			'page_title' => 'Company List',
			'nav'		 =>	'companylist'
		);
		$this->load->view('employee/templates/header',$header_value);
		$this->load->view('employee/employeeCompanyList',$data);
		$this->load->view('employee/templates/footer');

	}
	function companyDetails()
	{
		$companyId 	= $this->uri->segment(3);
		$employeeId = $this->uri->segment(4);
		$companyData['companyData'] = $this->EmployeeCompanyModel->companyDetails($companyId,$employeeId);
		if(!empty($companyData['companyData']))
		{
			$header_value = array(
				'page_title' => 'Company List',
				'nav'		 =>	'companyDetails'
			);
			$this->load->view('employee/templates/header',$header_value);
			$this->load->view('employee/employeeCompanyDetails',$companyData);
			$this->load->view('employee/templates/footer');
		}
		else
		{
			header("location:" . base_url() . "employee/companyList");
			//redirect('employee/companyList','refresh');
		}
	}

}