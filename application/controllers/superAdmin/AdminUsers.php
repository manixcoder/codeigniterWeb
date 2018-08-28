<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminUsers extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();		
		$this->load->model('superAdmin/AdminUsersModel');
		$this->load->library('session');
		error_reporting(0);
		if (!$this->session->userdata())
		{
			redirect('superAdmin', 'refresh');
		}
	}
	function index()
	{
		echo "Admin Users";
	}
	function adminListing()
	{
		$data['adminData'] = $this->AdminUsersModel->adminListing();
		$header_value = array(
			'page_title' => 'Admin List',
			'nav'		 =>	'admin'
		);
		$this->load->view('superAdmin/templates/header',$header_value);
		$this->load->view('superAdmin/adminList',$data);
		$this->load->view('superAdmin/templates/footer');
	}
	function companyList()
	{
		$data['companyData'] = $this->AdminUsersModel->companyList();
		$header_value = array(
			'page_title' => 'Company List',
			'nav'		 =>	'companyList'
		);
		$this->load->view('superAdmin/templates/header',$header_value);
		$this->load->view('superAdmin/companyList',$data);
		$this->load->view('superAdmin/templates/footer');
	}
	function employeeList()
	{
		$data['empData'] = $this->AdminUsersModel->employeeList();
		$header_value = array(
			'page_title' => 'Admin List',
			'nav'		 =>	'admin'
		);
		$this->load->view('superAdmin/templates/header',$header_value);
		$this->load->view('superAdmin/employeeList',$data);
		$this->load->view('superAdmin/templates/footer');
	}
	function addAdmin()
	{

		if(isset($_POST['submit']))
		{
			/*echo "<pre>";print_r($_POST);
			echo "<pre>";print_r($_FILES);die;*/
			$this->form_validation->set_rules('adminEmail', 'Email', 'required|is_unique[accountAdmin.adminEmail]');
			$this->form_validation->set_rules('adminPhoneNumber', 'PhoneNumber', 'required|is_unique[accountAdmin.adminPhoneNumber]');
			if ($this->form_validation->run() == FALSE)
			{
				$header_value = array(
					'page_title' => 'Register Admin',
					'nav' =>	'admin');
				$this->load->view('superAdmin/templates/header',$header_value);
				$this->load->view('superAdmin/addAdmin');
				$this->load->view('superAdmin/templates/footer');
			}
			else
			{
				/*manager Profile Image Upload code*/
				$config['upload_path'] 		= './uploads/managerPanImage/';
				$config['allowed_types'] 	= '*';
				$this->upload->initialize($config);
				$this->upload->do_upload('adminProfileImage', $config);
				$upload_data = $this->upload->data();
				if ($upload_data['is_image']=='1')
				{
					$adminProfileImage = 'uploads/managerPanImage/' . $upload_data['file_name'];
				}
				else
				{
					$adminProfileImage = "uploads/main/noimage.png";
				}

				/*manager Pan Image Upload code*/
				$config['upload_path'] 		= './uploads/managerPanImage/';
				$config['allowed_types'] 	= '*';
				$this->upload->initialize($config);
				$this->upload->do_upload('adminPanImage', $config);
				$upload_data = $this->upload->data();
				if ($upload_data['is_image']=='1')
				{
					$adminPanImage = 'uploads/managerPanImage/' . $upload_data['file_name'];
				}
				else
				{
					$adminPanImage = "uploads/main/noimage.png";
				}

				/*manager Aadhar Image Upload code*/
				$config['upload_path'] 		= './uploads/managerAadharImage/';
				$config['allowed_types'] 	= '*';
				$this->upload->initialize($config);
				$this->upload->do_upload('adminAadharImage', $config);
				$upload_data = $this->upload->data();
				if ($upload_data['is_image']=='1')
				{
					$adminAadharImage = 'uploads/managerAadharImage/' . $upload_data['file_name'];
				}
				else
				{
					$adminAadharImage = "uploads/main/noimage.png";
				}

				/*manager Resume Upload code*/
				$config['upload_path'] 		= './uploads/managerResume/';
				$config['allowed_types'] 	= '*';
				$this->upload->initialize($config);
				$this->upload->do_upload('managerResume', $config);
				$upload_data = $this->upload->data();
				//echo "<pre>";print_r($upload_data);die;
				if ($upload_data['file_name'] !='')
				{
					$managerResume = 'uploads/managerResume/' . $upload_data['file_name'];
				}
				else
				{
					$managerResume = "uploads/main/noimage.png";
				}
				$data = array(
					'adminFirstName' 			=> $this->input->post('adminFirstName') ,
					'adminLastName' 			=> $this->input->post('adminLastName') ,
					'adminEmail' 				=> $this->input->post('adminEmail') ,
					'adminPassword' 			=> $this->input->post('adminPassword') ,
					'adminAadharNumber' 		=> $this->input->post('adminAadharNumber') ,
					'adminAadharImage' 			=> $adminAadharImage ,
					'adminPanNumber'			=> $this->input->post('adminPanNumber'),
					'adminPhoneNumber'			=> $this->input->post('adminPhoneNumber'),
					'adminAlternatePhoneNumber'	=> $this->input->post('adminAlternatePhoneNumber'),
					'adminUserType'				=> '2',
					'adminSex'					=> $this->input->post('adminSex'),
					'adminDOB'					=> $this->input->post('adminDOB'),
					'adminAddress'				=> $this->input->post('adminAddress'),
					'adminProfileImage' 		=> $adminProfileImage,
					'adminPanImage'				=> $adminPanImage,
					'managerResume'				=> $managerResume
				);
				$this->AdminUsersModel->addAdmin($data);
				$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Admin added Successfully !!</div>");
				redirect('superAdmin/admin-list');
				$header_value = array(
					'page_title' => 'Register Admin',
					'nav'		 =>	'admin'
				);
				$this->load->view('superAdmin/templates/header',$header_value);
				$this->load->view('superAdmin/addAdmin',$data);
				$this->load->view('superAdmin/templates/footer');
			}
		}
		else
		{
			$header_value = array(
				'page_title' => 'Register Admin',
				'nav'		 =>	'admin'
			);
			$this->load->view('superAdmin/templates/header',$header_value);
			$this->load->view('superAdmin/addAdmin');
			$this->load->view('superAdmin/templates/footer');
		}
	}
	function adminDelete($id)
	{
		$id = $this->uri->segment(4);
		$header_value = array(
			'page_title' => 'Delete Admin'
		);
		$this->load->view('superAdmin/templates/header', $header_value);
		$postvalue = $this->AdminUsersModel->adminDelete($id);
		if ($postvalue == true)
		{
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;font-family: bold;'>Deleted admin successfully !</div>");
			redirect('superAdmin/admin-list');
		}
		else
		{
			$this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center"><strong>Error ! </strong> Not able to delete Admin !</div>');
		}
		$this->load->view('superAdmin/templates/footer');
	}
	function editAdmin($id)
	{
		if(isset($_POST['submit']))
		{
			$config['upload_path'] 		= './uploads/customerImage/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size'] 		= '100';
			//$config['max_width'] 		= '10000';
			//$config['max_height'] 		= '10000';
			$this->upload->initialize($config);
			$this->upload->do_upload('adminProfileImage', $config);
			$upload_data = $this->upload->data();
			//echo "<pre>";print_r($upload_data);die;
			if ($upload_data['is_image']=="1")
			{
				$adminProfileImage = 'uploads/customerImage/' . $upload_data['file_name'];
			}
			else
			{
				$adminProfileImage = "uploads/main/noimage.png";
			}
			$data = array(
				'adminFirstName' 		=> $this->input->post('adminFirstName') ,
				'adminLastName' 		=> $this->input->post('adminLastName') ,
				'adminEmail'			=> $this->input->post('adminEmail') ,
				'adminAadharNumber' 	=> $this->input->post('adminAadharNumber') ,
				'adminPanNumber' 		=> $this->input->post('adminPanNumber') ,
				'adminPhoneNumber'		=> $this->input->post('adminPhoneNumber') ,
				'adminAlternatePhoneNumber'	=>$this->input->post('adminAlternatePhoneNumber') ,
				'adminDOB'				=> $this->input->post('adminDOB') ,
				'adminAddress'			=> $this->input->post('adminAddress'),
				'adminSex'				=> $this->input->post('adminSex'),
				'adminProfileImage' 	=> $adminProfileImage
			);
			$data1['client_data'] = $this->AdminUsersModel->updateAdmin($id,$data);
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Admin updated Successfully !!</div>");
			redirect('superAdmin/admin-list');
			$header_value = array(
				'page_title' => 'Update Admin',
				'nav'		 =>	'admin'
			);
			$this->load->view('superAdmin/templates/header',$header_value);
			$this->load->view('superAdmin/editAdmin',$data1);
			$this->load->view('superAdmin/templates/footer');
		}
		else
		{
			$data['client_data'] = $this->AdminUsersModel->edit_Client($id);
			$header_value = array(
				'page_title' => 'Update Admin',
				'nav'		 =>	'admin'
			);
			$this->load->view('superAdmin/templates/header',$header_value);
			$this->load->view('superAdmin/editAdmin',$data);
			$this->load->view('superAdmin/templates/footer');
		}
	}
	function blockAdmin($id)
	{
		echo "admin Id ".$id;

	}
	function unBlockAdmin($id)
	{
		echo "admin Id ".$id;
	}
}