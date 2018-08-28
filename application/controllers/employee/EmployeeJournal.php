<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmployeeJournal extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('employee/EmployeeCommonFunction');
		$this->load->model('employee/EmployeeJournalModel');
		$this->load->library('session');
		error_reporting(-1);
		$empSession = $this->session->userdata();
		if (!$empSession)
		{
			redirect('employee', 'refresh');
		}
	}
	public function index()
	{
		echo "Hello Manish";
	}
	function companyJournalCreate()
	{
		$header_value = array(
			'page_title' => 'Company Journal',
			'nav'		 =>	'companyJournal'
		);
		$this->load->view('employee/templates/header',$header_value);
		$this->load->view('employee/employeeCompanyJournal');
		$this->load->view('employee/templates/footer');
	}
	public function getTableProductRow()
	{
		$products = $this->EmployeeJournalModel->getActiveProductData();
		echo "<pre>";print_r($products);die;
		echo json_encode($products);
	}
	public function getProductValueById()
	{
		$product_id = $this->input->post('product_id');
		if($product_id)
		{
			$product_data = $this->EmployeeJournalModel->getProductData($product_id);
			echo json_encode($product_data);
		}
	}

}