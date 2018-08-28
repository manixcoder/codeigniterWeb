<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminCompaniesController extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/AdminCommonFunction');
		$this->load->model('admin/AdminCompaniesModel');
		$this->load->library('session');
		error_reporting(-1);
		$sessionData = $this->session->userdata();
		if (!$sessionData)
		{
			redirect('admin', 'refresh');
		}
	}
	function index()
	{
		echo "Companies Controller";
	}
	function companiesListing()
	{
		$sessionData = $this->session->userdata();
		$adminId = $sessionData['admin_session'][0]['adminId'];
		$Data['clientsData'] = $this->AdminCompaniesModel->companiesListing($adminId);
		//echo "<pre>";print_r($Data);die;
		$header_value = array(
			'page_title' => 'Company List',
			'nav'		 =>	'company'
		);
		$this->load->view('admin/templates/header',$header_value);
		$this->load->view('admin/companiesList',$Data);
		$this->load->view('admin/templates/footer');
	}
	function addCompany()
	{
		if(isset($_POST['submit']))
			{
			/*	echo "<pre>";print_r($_POST);
				echo "<pre>";print_r($_FILES);
				die;*/
				$this->form_validation->set_rules('companyEmail', 'Email', 'required|is_unique[accountCompanies.companyEmail]');
				$this->form_validation->set_rules('companyPhoneNumber', 'Phone Number', 'required|is_unique[accountCompanies.companyPhoneNumber]');
				$header_value = array(
					'page_title' => 'Register Company',
					'nav' =>	'company'
				);
				$this->load->view('admin/templates/header',$header_value);
				if ($this->form_validation->run() == FALSE)
				{
					$sessionData = $this->session->userdata();
					$adminId = $sessionData['admin_session'][0]['adminId'];
					$Data['empData'] = $this->AdminCompaniesModel->getEmployee($adminId);
					$this->load->view('admin/addCompanies',$Data);
					$this->load->view('admin/templates/footer');
				}
				else
				{
					$sessionData = $this->session->userdata();

					$config['upload_path'] 		= './uploads/customerImage/';
					$config['allowed_types'] 	= 'gif|jpg|png';
					$this->upload->initialize($config);
					$this->upload->do_upload('companyLogo', $config);
					$upload_data= $this->upload->data();
					if ($upload_data['is_image'])
					{
						$companyLogo = 'uploads/customerImage/' . $upload_data['file_name'];
					}
					else
					{
						$companyLogo = "uploads/main/noprifile.png";
					}

					$config['upload_path'] 		= './uploads/companyGSTImage/';
					$config['allowed_types'] 	= 'gif|jpg|png';
					$this->upload->initialize($config);
					$this->upload->do_upload('companyGSTImage', $config);
					$upload_data= $this->upload->data();
					if ($upload_data['is_image'])
					{
						$companyGSTImage = 'uploads/companyGSTImage/' . $upload_data['file_name'];
					}
					else
					{
						$companyGSTImage = "uploads/main/noprifile.png";
					}

					$config['upload_path'] 		= './uploads/companyGSTImage/';
					$config['allowed_types'] 	= 'gif|jpg|png';
					$this->upload->initialize($config);
					$this->upload->do_upload('companyRegNoImage', $config);
					$upload_data= $this->upload->data();
					if ($upload_data['is_image'])
					{
						$companyRegNoImage = 'uploads/companyGSTImage/' . $upload_data['file_name'];
					}
					else
					{
						$companyRegNoImage = "uploads/main/noprifile.png";
					}
					$config['upload_path'] 		= './uploads/companyGSTImage/';
					$config['allowed_types'] 	= 'gif|jpg|png';
					$this->upload->initialize($config);
					$this->upload->do_upload('companyPanCardImage', $config);
					$upload_data= $this->upload->data();
					if ($upload_data['is_image'])
					{
						$companyPanCardImage = 'uploads/companyGSTImage/' . $upload_data['file_name'];
					}
					else
					{
						$companyPanCardImage = "uploads/main/noprifile.png";
					}
					$data = array(
						'mangerId'=> $sessionData['admin_session'][0]['adminId'],
						'employeeId'=>$this->input->post('employeeId'),
						'companyName' => $this->input->post('companyName') ,
						'companyLogo' => $companyLogo,
						'companyEmail' => $this->input->post('companyEmail') ,
						'companyPassword'=> $this->input->post('companyPassword') ,
						'companyPhoneNumber' => $this->input->post('companyPhoneNumber') ,
						'companyMobileNumber' => $this->input->post('companyMobileNumber') ,
						'companyGSTImage' => $companyGSTImage ,
						'companyWebSite' => $this->input->post('companyWebSite'),
						'companyGSTRegistrationType' => $this->input->post('companyGSTRegistrationType'),
						'companyGSTINNumber' => $this->input->post('companyGSTINNumber'),
						'companyAddress' => $this->input->post('companyAddress'),
						'companyNotes' => $this->input->post('companyNotes'),
						'companyTaxInfo_taxRegNo' => $this->input->post('companyTaxInfo_taxRegNo'),
						'companyRegNoImage'=>$companyRegNoImage,
						'companyTaxInfo_PANNo' => $this->input->post('companyTaxInfo_PANNo'),
						'companyPanCardImage'=>$companyPanCardImage
					);
					$data = $this->AdminCompaniesModel->addCompany($data);
					$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Company added Successfully !!</div>");
					redirect('admin/companiesListing');
					/*$header_value = array(
						'page_title' => 'Register Employee',
						'nav'		 =>	'employee'
					);
					$this->load->view('admin/templates/header',$header_value);*/
					$this->load->view('admin/addCompanies',$data);
					$this->load->view('admin/templates/footer');
				}
			}
			else 
			{
				$sessionData = $this->session->userdata();
				$adminId = $sessionData['admin_session'][0]['adminId'];
				$data['empData'] = $this->AdminCompaniesModel->getEmployee($adminId);
				$header_value = array(
					'page_title' => 'Register Company',
					'nav'		 =>	'company'
				);
				$this->load->view('admin/templates/header',$header_value);
				$this->load->view('admin/addCompanies',$data);
				$this->load->view('admin/templates/footer'); 
			}
	}

}