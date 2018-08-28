<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SuperAdminAccounts extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('superAdmin/SuperAdminAccountsModel');
		$this->load->library('session');
		error_reporting(0);
		if (!$this->session->userdata())
		{
			redirect('superAdmin', 'refresh');
		}
	}
	public function index()
	{
		echo "Super Admin Accounts";
	}
	function accountsList()
	{
		$data['companyData'] = $this->SuperAdminAccountsModel->accountsList();
		$data['groupData'] = $this->SuperAdminAccountsModel->groupList();
		$header_value = array(
			'page_title' => 'Account List',
			'nav'		 =>	'accountList'
		);
		$this->load->view('superAdmin/templates/header',$header_value);
		$this->load->view('superAdmin/supperAdminAccountList',$data);
		$this->load->view('superAdmin/templates/footer');
	}
	function createAccounts()
	{
		echo "<pre>";print_r($_POST);die;
		if(isset($_POST['submit']))
		{
			

			$accData = array(
				'accountName' => $_POST['accountName'],
				'description' => $_POST['description'],
				'groupId' 	 => $_POST['group'],
				'VAT_rate' => $_POST['VAT_rate'],
				'accountNumber' => $_POST['accountNumber']
			);
			$data = $this->SuperAdminAccountsModel->createAccounts($accData);
			if($data > 0)
			{
				$this->session->set_flashdata("message_name", "<div id='request' style ='color:green;font-size: 18px;fontfamily: bold;'>Account Added Successfully !!</div>");
				redirect('superAdmin/accountslist');
			}
		}
		else
		{
			$this->session->set_flashdata("message_name","<div id='request' style='color:red;font-size: 18px;fontfamily: bold;'> data not found!!</div>");
				redirect('superAdmin/accountslist');
		}
	}
	function accountDelete()
	{
		$accountId = $this->uri->segment(3);
		$this->SuperAdminAccountsModel->accountDelete($accountId);
		$this->session->set_flashdata("message_name", "<div id='request' style ='color:green;font-size: 18px;fontfamily: bold;'>Account delete Successfully !!</div>");
		redirect('superAdmin/accountslist');
	}	

}