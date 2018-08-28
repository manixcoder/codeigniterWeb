<?php
	defined('BASEPATH') OR exit('No direct script access allowed');   //Army app
	class CompanyAuth extends CI_Controller 
	{	
		function __construct()
		{
			parent::__construct();
			//$this->load->model('admin/EmployeeDashboardModel');
			$this->load->model('company/CompanyAuthModel');
			$this->load->helper('url');
			$this->load->library('session');
			error_reporting(-1);
			if (!$this->session->userdata())
			{
				redirect('company', 'refresh');
			}
		}
		function index()
		{
			$employee_session = $this->session->userdata('employee_session');	
			if(is_array($employee_session[0]) && $employee_session[0]!='')
			{
				redirect('company/dashboard', 'refresh');
			} 
			else
			{
				if(isset($_POST['login'])) 
				{
				
					$LoginData = $this->CompanyAuthModel->login($_POST['email'], $_POST['password']);
					if(isset($LoginData[0]))
					{
						redirect('company/dashboard', 'refresh');
					}
					else
					{					
						$this->session->set_flashdata('message_name', "<div style = 'color:red;font-size:16px;'><b>Invalid ! Email or Password</b></div>");
						$this->session->set_flashdata('type', 'failoure');
						$this->load->view('company/companyLogin');
					}
				}
				else
				{
					$this->load->view('company/companyLogin');
				}
			}
		}
		function logOut()
		{
			$this->session->unset_userdata('company_session');
			session_destroy();
			header("location:" . base_url() . "company");
		}
		
	/*	function admin_profile()
		{
			if(isset($_POST['submit']))
			{
				 
				$id   		 = $this->input->post('hidd_id');
				$data = array(
						'FirstName'  => $this->input->post('FirstName') ,
						'LastName'   => $this->input->post('LastName')
						);
				$data['admin_data'] = $this->EmployeeDashboardModel->admin_profile_update($data,$id);
				$this->session->set_flashdata("message_name", "<div style = 'color:green;font-size: 18px;font-family: bold;'>Data updated Successfully !!</div>");
				$header_value = array(
						
									'page_title' => 'Admin Profile',
									'nav'		=>	'admin'
								);
				$this->load->view('admin/templates/header',$header_value);
				$this->load->view('admin/admin_profile',$data);
				$this->load->view('admin/templates/footer');
			}
			else
			{
				$data['admin_data'] 	= $this->EmployeeDashboardModel->admin_profile();
				$header_value = array(
						
									'page_title' => 'Admin Profile',
									'nav'		=>	'admin'
								  );
				$this->load->view('admin/templates/header',$header_value);
				$this->load->view('admin/admin_profile',$data);
				$this->load->view('admin/templates/footer');
			}
		}
	function change_password()
	{
		$data = array(
						'old_password'  => $this->input->post('old_password') ,
						'new_password'  => $this->input->post('new_password')
						);
		$data = $this->EmployeeDashboardModel->change_password($data);
		if($data)
		{
			$header_value = array(
								'page_title' => 'Admin | Log in',
								'nav'		=>	'admin'
								);
			$this->session->unset_userdata('admin_session');
			session_destroy();
			header("location:" . base_url() . "admin");
			$this->session->set_flashdata("true_message", "<div style = 'color:green;font-size: 18px;font-family: bold;'>Password updated Successfully !!</div>");
		}
		else
		{
			$this->session->set_flashdata("worng_message", "<div style = 'color:green;font-size: 18px;font-family: bold;'>Invalid Password you entered</div>");
			header("location:" . base_url() . "admin/admin-profile"); 


		}
	} */
	}