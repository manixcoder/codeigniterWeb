<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CompanyDetails extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('company/CompanyDetailsModel');
		$this->load->model('company/PushnotificationModel');
		error_reporting(0);
	}
	function index()
	{
		echo "Company Details";
		$header_value = array(
			'page_title' => 'Dashboard',
			'nav'		 =>	'dashboard'
		);
		$this->load->view('company/templates/header',$header_value);
		$this->load->view('company/companyDashboard');
		$this->load->view('company/templates/footer');
	}
}