<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CompanyDashboard extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('company/CompanyCommonFunction');
		$this->load->model('company/CompanyDashboardModel');
		//$this->load->model('admin/PushnotificationModel');
		$this->load->library('session');
		error_reporting(-1);
		
		if (!$this->session->userdata())
		{
			redirect('company', 'refresh');
		}
	}
	function dashboardPage() 
	{
		 /*
		 $data['client_count'] 		= $this->CompanyCommonFunction->client_count();
		 $data['manager_count']		= $this->CompanyCommonFunction->manager_count();
		 $data['waiter_count'] 		= $this->CompanyCommonFunction->waiter_count();
		 $data['restaurant_count'] 	= $this->CompanyCommonFunction->restaurant_count();
		 */
		/*$data['bulletData'] 	= $this->CompanyCommonFunction->bulletData();	 */		
		$header_value = array(
			'page_title' => 'Dashboard',
			'nav'		 =>	'dashboard'
		);
		$this->load->view('company/templates/header',$header_value);
		$this->load->view('company/companyDashboard');
		$this->load->view('company/templates/footer');
	}
	function Userslisting()
	{
		$Data['usersData'] = $this->CompanyDashboardModel->usersListing();
		$header_value = array(
			'page_title' => 'User List',
			'nav'		 =>	'User'
		);
		$this->load->view('company/templates/header',$header_value);
		$this->load->view('company/userslist',$Data);
		$this->load->view('company/templates/footer'); 
	}
	function userProfile($id)
	{
		if(isset($_POST['submit']))
		{
			$hidd_id 	 	= $this->input->post('hidd_id');
			$data =  array(
				'adminNotes'  => $this->input->post('adminNotes')
			);
			$data['userData'] = $this->CompanyDashboardModel->userProfileEdit($hidd_id,$data);
			$header_value = array(
				'page_title' => 'User List',
				'nav'		 =>	'User'
			);
			$this->load->view('company/templates/header',$header_value);
			$this->load->view('company/userProfile',$data);
			$this->load->view('company/templates/footer'); 
		}
		else
		{
			$data['userData'] = $this->CompanyDashboardModel->userProfile($id);
			$header_value = array(
				'page_title' => 'User List',
				'nav'		 =>	'User'
			);
			$this->load->view('company/templates/header',$header_value);
			$this->load->view('company/userProfile',$data);
			$this->load->view('company/templates/footer'); 
		}
	}
	function userDelete($id)
	{
		$data = $this->CompanyDashboardModel->userDelete($id);
		if ($data)
		{
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:red;font-size: 18px;fontfamily: bold;'>User deleted Successfully !!</div>");
			header("location:".base_url()."company/Userslisting");
		}
	}
	function userBlock($id)
	{
		$data = $this->CompanyDashboardModel->userBlock($id);
		if ($data == "true")
		{
			$this->session->set_flashdata("message_name",
				"<div id='request' style = 'color:green;font-size: 18px;font-family: bold;'>You have unblocked the user..!!</div>");
			header("location:".base_url()."company/Userslisting");
		}
		else
		{
			$message = 'Your account has been blocked by admin';
			$userData = array(
				'users_id' 	=> $data[0]['user_id'],
				'type' 		=> 'Logout/Block',
			);
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:red;font-size: 18px;fon-family: bold;'>You have blocked the user...!!</div>");
			header("location:".base_url()."employee/Userslisting");

		}
	}
	function userApprovedDeclined()
	{
		$data = array(
				'userStatus'  => $this->input->post('userStatus'),
				'id'   		 => $this->input->post('hidd_id') 
				);
			$query = $this->EmployeeEmployeeDashboardModel->userApprovedDeclined($data);

			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;font-family: bold;'>Status Updated Successfully !!</div>");	
		
			header("location:" . base_url() . "employee/Userslisting");
	}
	
	function adslisting()
	{
		$Data['adsData'] = $this->EmployeeEmployeeDashboardModel->adslisting();
			
		$header_value = array(
						'page_title' => 'Classifieds List',
						'nav'		 =>	'ads'
						);
		$this->load->view('employee/templates/header',$header_value);
		$this->load->view('employee/adslist',$Data);
		$this->load->view('employee/templates/footer'); 
	}
	function adsDelete($id)
	{
		$data = $this->EmployeeEmployeeDashboardModel->adsDelete($id);
		if ($data)
		{
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:red;font-size: 18px;fontfamily: bold;'>Classified deleted Successfully !!</div>");			
			header("location:".base_url()."employee/adslisting");
		}	
	}
	function adsProfile($id)
	{
		$data['adData'] = $this->EmployeeEmployeeDashboardModel->adsProfile($id);

		$header_value = array(
						'page_title' => 'Classifieds Details',
						'nav'		 =>	'ads'
						);
		$this->load->view('employee/templates/header',$header_value);
		$this->load->view('employee/adsProfile',$data);
		$this->load->view('employee/templates/footer'); 
	}
	function adsApproveDecline()
	{
		$dat = array(
				'id'  			 => $this->input->get('id'),
				'status'   		 => $this->input->get('status') 
				);
		
		 $data = $this->EmployeeDashboardModel->adsApprovedDeclined($dat);
		 $this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;font-family: bold;'>Status Updated Successfully !!</div>");	
		
		header("location:" . base_url() . "employee/ads-profile/".$dat['id']);
	}
	

	function gameSiteListing()
	{
		$Data['siteData'] = $this->EmployeeDashboardModel->gameSiteListing();
		$header_value = array(
						'page_title' => 'Sites List',
						'nav'		 =>	'game'
						);
		$this->load->view('employee/templates/header',$header_value);
		$this->load->view('employee/gameSiteList',$Data);
		$this->load->view('employee/templates/footer'); 
	}
	function gameDetails($id)
	{
		$data['gameData'] = $this->EmployeeDashboardModel->gameDetails($id);

		$header_value = array(
						'page_title' => 'gamae Details',
						'nav'		 =>	'game'
						);
		$this->load->view('employee/templates/header',$header_value);
		$this->load->view('employee/gameProfile',$data);
		$this->load->view('employee/templates/footer'); 
	}
	function gameApproveDecline()
	{
		$dat = array(
				'id'  		=> $this->input->get('id'),
				'status'  	=> $this->input->get('status') 
				);
		
		 $data = $this->EmployeeDashboardModel->gameApproveDecline($dat);
		 $this->session->set_flashdata(
		 	"message_name","<div id='request' style = 'color:green;font-size: 18px;font-family: bold;'>
		 	Status Updated Successfully !!
		 	</div>"
		 );	
		
		header("location:" . base_url() . "employee/game-details/".$dat['id']);
	}
	function gameSiteDelete($id)
	{
		$data = $this->EmployeeDashboardModel->gameSiteDelete($id);
		if($data)
		{
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:red;font-size: 18px;fontfamily: bold;'>Game deleted Successfully !!</div>");			
			header("location:".base_url()."employee/game-sites");
		}	
	}
	function gamesSitesEdit($id)
	{
		if(isset($_POST['submit']))
		{
			$hidd_id = $this->input->post('hidd_id');
			$data = array(
				'SelectGameSite' 	 	    => $this->input->post('SelectGameType') ,
				'GameWebSite'  			    => $this->input->post('GameWebSite') ,
				'GameStreetAddress'  	    => $this->input->post('GameStreetAddress') ,
				'GameTelephone'  		    => $this->input->post('GameTelephone') ,
				'GameCodeName'  		    => $this->input->post('GameCode') ,
				'GameBuildingAddress' 	    => $this->input->post('GameBuildingAddress') ,
				'GameIdealNumPlayPerSite' 	=> $this->input->post('GameIdealNumPlayPerSite') ,
				'GameDepositeRequired' 	  	=> $this->input->post('GameDepositeRequired') ,
				'GameStoreOnsite' 	  		=> $this->input->post('GameStoreOnsite') ,
				'GameTravelTips'	 		=> $this->input->post('GameTravelTips') ,
				'GameArea'   		 		=> $this->input->post('GameArea'),
				'GameEmailAddress'   		=> $this->input->post('GameEmailAddress'),
				'GameSize'   		 		=> $this->input->post('GameSize'),
				'GameCity'   		 		=> $this->input->post('GameCity'),
				'GameMinPlayer'   			=> $this->input->post('GameMinPlayer'),
				'GameBasicDescription'  	=> $this->input->post('GameBasicDescription')
			);
			$data['gameSite'] = $this->EmployeeDashboardModel->gamesSitesEditQuery($data,$hidd_id);
			$header_value = array(
				'page_title' => 'Sites Edit',
				'nav'		 =>	'game'
			);
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;font-family: bold;'>
				Data Updated Successfully !!
				</div>"
			);	
			$this->load->view('employee/templates/header',$header_value);
			$this->load->view('employee/gamesSiteEdit',$data);
			$this->load->view('employee/templates/footer');
		}
		else
		{
			$data['gameSite'] = $this->EmployeeDashboardModel->gamesSitesEdit($id);

			$header_value = array(
						'page_title' => 'Sites Edit',
						'nav'		 =>	'game'
						);
			$this->load->view('employee/templates/header',$header_value);
			$this->load->view('employee/gamesSiteEdit',$data);
			$this->load->view('employee/templates/footer');
		}
	}
	
}