<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CustomerManagement extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('employee/EmployeeCommonFunction');
		$this->load->model('employee/CustomerManagementModel');
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
		echo "CustomerManagement";
	}
	function addCustomer()
	{
		
		if(isset($_POST['submit']))
			{
				//echo "<pre>";print_r($_POST);die;
				/*$this->form_validation->set_rules('adminEmail', 'Email', 'required|is_unique[accountAdmin.adminEmail]');
				$this->form_validation->set_rules('adminPhoneNumber', 'Phone Number', 'required|is_unique[accountAdmin.adminPhoneNumber]');
				$header_value = array(
						'page_title' => 'Register Customer',
						'nav' =>	'customer'
					);
				$this->load->view('employee/templates/header',$header_value);
				if ($this->form_validation->run() == FALSE)
				{
					$this->load->view('employee/employeeAddCustomer');
					$this->load->view('employee/templates/footer');
				}
				else
				{*/
					/*$sessionData = $this->session->userdata();
					$config['upload_path'] 		= './uploads/customerImage/';
					$config['allowed_types'] 	= 'gif|jpg|png';
					$config['max_size'] 		= '1000';
					//$config['max_width'] 		= '10000';
					//$config['max_height'] 		= '10000';
					$this->upload->initialize($config);
					$this->upload->do_upload('adminProfileImage', $config);
					$upload_data= $this->upload->data();
					if ($upload_data['is_image'])
					{
						$adminProfileImage = 'uploads/customerImage/' . $upload_data['file_name'];
					}
					else
					{
						$adminProfileImage = "uploads/main/noprifile.png";
					}*/
					$empSession 		= $this->session->userdata();
					$empId 				= $empSession['employee_session'][0]['adminId'];
					$data = array(
						'empId'=> $empSession['employee_session'][0]['adminId'],
						'companyId' => $this->input->post('companyId') ,
						'customerName' => $this->input->post('customerName') ,
						'customerEmail' => $this->input->post('customerEmail') ,
						'customerPhone' => $this->input->post('customerPhone') ,
						'customerAddress' => $this->input->post('customerAddress') ,
						'customerType'=> $this->input->post('customerType') ,
						'customerContact' => $this->input->post('customerContact') ,
						'customerNumber' => $this->input->post('customerNumber') ,
						'customerFax' => $this->input->post('customerFax'),
						'customerPaymentTerms' => $this->input->post('customerPaymentTerms'),
						'customerCurrency' => $this->input->post('customerCurrency')
					);
					$this->CustomerManagementModel->addCustomer($data);
					$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Customer added Successfully !!</div>");
					redirect('employee/contactsList');
					/*
						$header_value = array(
						'page_title' => 'Register Employee',
						'nav'		 =>	'employee'
						);
						$this->load->view('admin/templates/header',$header_value);
					*/
					$this->load->view('employee/employeeAddCustomer',$data);
					$this->load->view('employee/templates/footer');
				//}
			}
			else 
			{
				$empSession 		= $this->session->userdata();
				$empId 				= $empSession['employee_session'][0]['adminId'];
				$data['compData'] 	= $this->EmployeeCommonFunction->getEmployeeCompanyList($empId);
				$header_value = array(
					'page_title' => 'Register Customer', 
					'nav'		 =>	'customer'
				);
				$this->load->view('employee/templates/header',$header_value);
				$this->load->view('employee/employeeAddCustomer',$data);
				$this->load->view('employee/templates/footer'); 
			}

	}
	function getCustomerList()
	{
		$empSession 		= $this->session->userdata();
		$empId 				= $empSession['employee_session'][0]['adminId'];
		$data['custData'] 	= $this->CustomerManagementModel->getCustomerList($empId);
		

		$header_value = array(
			'page_title' => 'Customer List',
			'nav'		 =>	'customerlist'
		);
		$this->load->view('employee/templates/header',$header_value);
		$this->load->view('employee/employeeCustomerList',$data);
		$this->load->view('employee/templates/footer');
	}
	function deleteCustomer()
	{
		
		$id = $this->uri->segment(3);
		$data = $this->CustomerManagementModel->deleteCustomer($id);
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Customer Delete Successfully !!</div>");
		redirect('employee/contactsList');
	}
	function editCustomer()
	{
		$id = $this->uri->segment(3);
		if(isset($_POST['submit']))
		{
			//echo "<pre>";print_r($_POST);die;
			$sessionData = $this->session->userdata();
			
			$data = array(
				'customerName' 		=> $this->input->post('customerName') ,
				'customerEmail' 		=> $this->input->post('customerEmail') ,
				'customerPhone' 	=> $this->input->post('customerPhone') ,
				'customerAddress' 		=> $this->input->post('customerAddress') ,
				'customerType' 		=> $this->input->post('customerType') ,
				'customerContact' => $this->input->post('customerContact') ,
				'customerNumber' 		=> $this->input->post('customerNumber') ,
				'customerFax' 		=> $this->input->post('customerFax') ,
				'customerPaymentTerms' => $this->input->post('customerPaymentTerms'),
				'customerCurrency' => $this->input->post('customerCurrency')
			);
			$data1['customerData'] = $this->CustomerManagementModel->updateCustomer($id,$data);
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Customer updated Successfully !!</div>");
			redirect('employee/contactsList');
			$this->load->view('employee/employeeEditCustomer',$data1);
			$this->load->view('employee/templates/footer');
		}
		else
		{
			$data['customerData'] = $this->CustomerManagementModel->editCustomer($id);
			$header_value = array(
				'page_title' => 'Update Client',
				'nav'		 =>	'User'
			);
			$this->load->view('employee/templates/header',$header_value);
			$this->load->view('employee/employeeEditCustomer',$data);
			$this->load->view('employee/templates/footer');
		}
	}
}