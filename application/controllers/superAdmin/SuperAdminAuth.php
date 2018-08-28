<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuperAdminAuth extends CI_Controller 
{
	function __construct()		
	{
		parent::__construct();
		$this->load->model('superAdmin/SuperAdminAuthModel');
		$this->load->helper('url');
		$this->load->library('session');
		if (!$this->session->userdata())
		{
			
			redirect('superAdmin', 'refresh');
		}
	}	
	function index()
	{
		$superASession = $this->session->userdata('superAdminSession');
		if(is_array($superASession[0]) && $superASession[0]!='')
		{
			redirect('superAdmin/dashboard', 'refresh');
		}
		else
		{
			if(isset($_POST['login'])) 
			{
				$LoginData = $this->SuperAdminAuthModel->login($_POST['email'], $_POST['password']);
				if(isset($LoginData[0]))
				{
					//echo "<pre>";print_r($superASession);die;
					/*$this->session->unset_userdata('superAdminSession');
					session_destroy();*/
					
					redirect('superAdmin/dashboard', 'refresh');
				}
				else
				{
					$this->session->set_flashdata('message_name', "<div style = 'color:red;font-size:16px;'><b>Invalid ! Email or Password</b></div>");
					$this->session->set_flashdata('type', 'failoure');
					$this->load->view('superAdmin/login');
				}
			}
			else
			{
				$this->load->view('superAdmin/login');
			}
		}
	}
	function logOut()
	{
		$this->session->unset_userdata('superAdminSession');
		session_destroy();
		header("location:" . base_url() . "superAdmin");
	}
}