<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SuperAdminGroups extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('superAdmin/SuperAdminCommonFunction');
		$this->load->model('superAdmin/SuperAdminGroupsModel');
		$this->load->library('session');
		error_reporting(0);
		if (!$this->session->userdata())
		{
			redirect('superAdmin', 'refresh');
		}
	}
	function index()
	{
		echo "Super Admin Groups";
	}
	function createGroups()
	{
		if(isset($_POST['submit']))
		{
			//echo "<pre>";print_r($_POST);die;
			$this->form_validation->set_rules('groupName', 'Group Name', 'required|is_unique[accountGroups.groupName]');
			
			if ($this->form_validation->run() == FALSE)
			{
				$header_value = array(
					'page_title' => 'Add Group',
					'nav' =>	'addGroup'
				);
				$this->load->view('superAdmin/templates/header',$header_value);
				$this->load->view('superAdmin/superAdminAddGroup');
				$this->load->view('superAdmin/templates/footer');
			}
			else
			{
				$data = array(
					'groupName' 			=> $this->input->post('groupName')
				);
				$this->SuperAdminGroupsModel->createGroups($data);
				$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Group added Successfully !!</div>");
				redirect('superAdmin/grouplist');
				$header_value = array(
					'page_title' => 'Add Group',
					'nav' =>	'addGroup'
				);
				$this->load->view('superAdmin/templates/header',$header_value);
				$this->load->view('superAdmin/superAdminAddGroup',$data);
				$this->load->view('superAdmin/templates/footer');
			}
		}
		else
		{
			$header_value = array(
				'page_title' => 'Add Group',
				'nav' =>	'addGroup'
			);
			$this->load->view('superAdmin/templates/header',$header_value);
			$this->load->view('superAdmin/superAdminAddGroup');
			$this->load->view('superAdmin/templates/footer');
		}
	}
	function getGroupsList()
	{
		$data['groupData'] = $this->SuperAdminGroupsModel->getGroupsList();
		//echo "<pre>";print_r($data);die;
		$header_value = array(
			'page_title' => 'Group List',
			'nav'		 =>	'groupList'
		);
		$this->load->view('superAdmin/templates/header',$header_value);
		$this->load->view('superAdmin/superGetGroupsList',$data);
		$this->load->view('superAdmin/templates/footer');
	}
	function groupEdit()
	{
		$id= $this->uri->segment(3);
		if(isset($_POST['submit']))
		{
			
			$changeData = array(
				'groupName' => $this->input->post('groupName')
			);
			$data['groupData'] = $this->SuperAdminGroupsModel->updateGroupQuery($id,$changeData);
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Group updated Successfully !!</div>");
			redirect('superAdmin/grouplist');
			$this->load->view('superAdmin/superAdminEditGroup',$data);
			$this->load->view('superAdmin/templates/footer'); 
		}
		else
		{
			$data['groupData'] = $this->SuperAdminGroupsModel->getGroup($id);
			$header_value = array(
				'page_title' => 'Update Client',
				'nav'		 =>	'User'
			);
			$this->load->view('superAdmin/templates/header',$header_value);
			$this->load->view('superAdmin/superAdminEditGroup',$data);
			$this->load->view('superAdmin/templates/footer');
		}
	}
	function groupDelete()
	{
		$id= $this->uri->segment(3);
		$groupData = $this->SuperAdminGroupsModel->getGroup($id);
		if($groupData[0])
		{
			$this->SuperAdminGroupsModel->deleteGroup($id);
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Group Delete Successfully !!</div>");
			redirect('superAdmin/grouplist');

		}
		else
		{
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:red;font-size: 18px;fontfamily: bold;'>Group not found !!</div>");
			redirect('superAdmin/grouplist');
		}

		echo "<pre>";print_r($groupData);die;
	}

}