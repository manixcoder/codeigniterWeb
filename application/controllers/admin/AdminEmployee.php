<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class AdminEmployee extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('admin/AdminCommonFunction');
			$this->load->model('admin/AdminEmployeeModel');
			$this->load->library('session');
			error_reporting(-1);
			$sessionData = $this->session->userdata();
			if (!$sessionData)
			{
				redirect('admin', 'refresh');
			}
		}
		function employeeListing()
		{
			$sessionData = $this->session->userdata();
			$adminId = $sessionData['admin_session'][0]['adminId'];			
			$Data['clientsData'] = $this->AdminEmployeeModel->employeeListing($adminId);
			$header_value = array(
				'page_title' => 'Employee List',
				'nav'		 =>	'employee'
			);
			$this->load->view('admin/templates/header',$header_value);
			$this->load->view('admin/employeeList',$Data);
			$this->load->view('admin/templates/footer'); 
		}
		function addEmployee()
		{
			if(isset($_POST['submit']))
			{
				$this->form_validation->set_rules('adminEmail', 'Email', 'required|is_unique[accountAdmin.adminEmail]');
				$this->form_validation->set_rules('adminPhoneNumber', 'Phone Number', 'required|is_unique[accountAdmin.adminPhoneNumber]');
				$header_value = array(
						'page_title' => 'Register Employee',
						'nav' =>	'admin'
					);
				$this->load->view('admin/templates/header',$header_value);
				if ($this->form_validation->run() == FALSE)
				{
					$this->load->view('admin/addEmployee');
					$this->load->view('admin/templates/footer');
				}
				else
				{
					$sessionData = $this->session->userdata();
					$config['upload_path'] 		= './uploads/customerImage/';
					$config['allowed_types'] 	= 'gif|jpg|png';
					$config['max_size'] 		= '1000';
					//$config['max_width'] 		= '10000';
					//$config['max_height'] 		= '10000';
					$this->upload->initialize($config);
					$this->upload->do_upload('adminProfileImage', $config);
					$upload_data = $this->upload->data();
					if ($upload_data['is_image'] == '1')
					{
						$adminProfileImage = 'uploads/customerImage/' . $upload_data['file_name'];
					}
					else
					{
						$adminProfileImage = "uploads/main/noprifile.png";
					}
					$data = array(
						'mangerId'=> $sessionData['admin_session'][0]['adminId'],
						'adminFirstName' => $this->input->post('adminFirstName') ,
						'adminLastName' => $this->input->post('adminLastName') ,
						'adminEmail' => $this->input->post('adminEmail') ,
						'adminPassword' => $this->input->post('adminPassword') ,
						'adminAadharNumber'=> $this->input->post('adminAadharNumber') ,
						'adminPhoneNumber' => $this->input->post('adminPhoneNumber') ,
						'adminAlternatePhoneNumber' => $this->input->post('adminAlternatePhoneNumber') ,
						'adminUserType' => '3',
						'adminSex' => $this->input->post('adminSex'),
						'adminDOB' => $this->input->post('adminDOB'),
						'adminAddress' => $this->input->post('adminAddress'),
						'adminProfileImage' => $adminProfileImage
					);
					$data = $this->AdminEmployeeModel->addEmployee($data);
					$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Employee added Successfully !!</div>");
					redirect('admin/employeeListing');
					/*$header_value = array(
					'page_title' => 'Register Employee',
					'nav'		 =>	'employee'
					);
					$this->load->view('admin/templates/header',$header_value);*/
					$this->load->view('admin/addEmployee',$data);
					$this->load->view('admin/templates/footer');
				}
			}
			else 
			{
				$header_value = array(
					'page_title' => 'Register Employee',
					'nav'		 =>	'employee'
				);
				$this->load->view('admin/templates/header',$header_value);
				$this->load->view('admin/addEmployee');
				$this->load->view('admin/templates/footer'); 
			}
		}
		function editEmployee()
		{
			$id= $this->uri->segment(3);
			//echo "<pre>";print_r($_POST);

			if(isset($_POST['submit']))
			{
				$sessionData = $this->session->userdata();
					$config['upload_path'] 		= './uploads/customerImage/';
					$config['allowed_types'] 	= 'gif|jpg|png';
					$config['max_size'] 		= '1000';
					//$config['max_width'] 		= '10000';
					//$config['max_height'] 		= '10000';
					$this->upload->initialize($config);
					$this->upload->do_upload('adminProfileImage', $config);
					$upload_data = $this->upload->data();
					if ($upload_data['is_image'] == '1')
					{
						$adminProfileImage = 'uploads/customerImage/' . $upload_data['file_name'];
					}
					else
					{
						$adminProfileImage = "uploads/main/noprifile.png";
					}
				$data = array(
					'adminFirstName' 		=> $this->input->post('adminFirstName') ,
					'adminLastName' 		=> $this->input->post('adminLastName') ,
					'adminAadharNumber' 	=> $this->input->post('adminAadharNumber') ,
					'adminPhoneNumber' 		=> $this->input->post('adminPhoneNumber') ,
					'adminPanNumber' 		=> $this->input->post('adminPanNumber') ,
					'adminAlternatePhoneNumber' => $this->input->post('adminAlternatePhoneNumber') ,
					'adminSex' 		=> $this->input->post('adminSex') ,
					'adminProfileImage'=>$adminProfileImage,
					'adminDOB' 		=> $this->input->post('adminDOB') ,
					'adminAddress' 		=> $this->input->post('adminAddress') 
				);
				$data1['employeedata'] = $this->AdminEmployeeModel->update_client_query($id,$data);
				$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Employee updated Successfully !!</div>");
				redirect('admin/employeeListing');
				
				$this->load->view('admin/editEmployee',$data1);
				$this->load->view('admin/templates/footer'); 
			}
			else 
			{
				$data['employeedata'] = $this->AdminEmployeeModel->edit_Client($id);
				$header_value = array(
				'page_title' => 'Update Client',
				'nav'		 =>	'User'
				);
				$this->load->view('admin/templates/header',$header_value);
				$this->load->view('admin/editEmployee',$data);
				$this->load->view('admin/templates/footer'); 
			}
		}
		function blockClient($id)
		{
			$data = $this->AdminEmployeeModel->blockClient($id);
			if ($data == "Unblock")
			{			
				$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;font-family: bold;'>You have unblocked the user..!!</div>");
				header("location:".base_url()."admin/clients-list");
			}
			else
			{
				$this->session->set_flashdata("message_name", "<div id='request' style = 'color:red;font-size: 18px;fon-family: bold;'>You have blocked the user...!!</div>");
				header("location:".base_url()."admin/clients-list");
			}
		}
		function deleteEmployee()
		{
			$id = $this->uri->segment(3);
			$data = $this->AdminEmployeeModel->deleteEmployee($id);
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Employee Delete Successfully !!</div>");
			redirect('admin/employeeListing');
		}
		function managerListing()
		{
			$Data['managersData'] = $this->AdminEmployeeModel->managerListing();			
			$header_value = array(
				'page_title' => 'Managers List',
				'nav'		 =>	'User'
			);
			$this->load->view('admin/templates/header',$header_value);
			$this->load->view('admin/managerList',$Data);
			$this->load->view('admin/templates/footer'); 
		}
		function updateCumission()
		{
			if(isset($_POST['update']))
			{
				$this->db->where('restaurantOwnerId', $_POST['restaurantOwnerId']);
				$this->db->update('restaurantOwner', array(
					'adminPercentage'=>$_POST['adminPercentage']
				));
				redirect('admin/manager-list');
			}
		}
}	