<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminUsersModel extends CI_Model 
{
	function __construct()
	{
		parent::__construct();		
		$this->load->model('superAdmin/SuperAdminCommonFunction');
		$this->load->library('session');
		
	}
	function addAdmin($data)
	{
		//echo "<pre>";print_r($data);die;
		$this->db->insert("accountAdmin",array(
			'adminFirstName' => $data['adminFirstName'],
			'adminLastName' => $data['adminLastName'],
			'adminEmail' => $data['adminEmail'],
			'adminPassword' => md5(md5($data['adminPassword'])),
			'adminAadharNumber' => $data['adminAadharNumber'],
			'adminAadharImage' => $data['adminAadharImage'],
			'adminPanNumber' => $data['adminPanNumber'],
			'adminPhoneNumber' => $data['adminPhoneNumber'],
			'adminAlternatePhoneNumber' => $data['adminAlternatePhoneNumber'],
			'adminUserType' => $data['adminUserType'],
			'adminSex' => $data['adminSex'],
			'adminDOB' => $data['adminDOB'],
			'adminAddress' => $data['adminAddress'],
			'adminProfileImage' => $data['adminProfileImage'],
			'adminPanImage' => $data['adminPanImage'],
			'managerResume' => $data['managerResume']
		));
		$id = $this->db->insert_id();
		if($id > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function adminListing()
	{
		$this->db->select('*');
		$this->db->from('accountAdmin rc');
		$this->db->order_by('adminId', 'DESC');
		$this->db->where('adminUserType', '2');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function employeeList()
	{
		$this->db->select('*');
		$this->db->from('accountAdmin rc');
		$this->db->order_by('adminId', 'DESC');
		$this->db->where('adminUserType', '3');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function companyList()
	{
		$this->db->select("*");
		$this->db->from('accountCompanies');
		$query = $this->db->get();
		$comData = $query->result_array();
		foreach ($comData as $key => $comp)
		{
			$managerData 	= $this->SuperAdminCommonFunction->getManagerDetail($comp['mangerId']);
			$empData 		= $this->SuperAdminCommonFunction->getManagerDetail($comp['employeeId']);
			if($comp['mangerId']==$managerData[0]['adminId'])
			{
				$comp['managerName'] = $managerData[0]['adminFirstName']." ".$managerData[0]['adminLastName'];
				$comp['managerImage'] = $managerData[0]['adminProfileImage'];
			}
			else
			{
				$comp['managerName'] = "";
				$comp['managerImage'] = "";
			}
			if($comp['employeeId'] == $empData[0]['adminId'])
			{
				$comp['empName']= $empData[0]['adminFirstName']." ".$empData[0]['adminLastName'];
				$comp['empImage'] = $empData[0]['adminProfileImage'];
			}
			else
			{
				$comp['empName'] = '';
				$comp['empImage']='';
			}
			$realData[]=$comp;
		}
		return $realData;
	}
	
	function adminDelete($id)
	{
		$this->db->select("*");
		$this->db->from('accountAdmin');
		$this->db->where('adminId', $id);
		$query = $this->db->get();
		$eventData = $query->result_array();
		
		$this->db->where('adminId', $id);
		$delete = $this->db->delete('accountAdmin');
		return $delete;
		
	}
	function updateAdmin($id,$data)
	{
		$this->db->where('adminId',$id);
		$this->db->update('accountAdmin',$data);
		$this->db->select('*');
		$this->db->from('accountAdmin');
		$this->db->where('adminId',$id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function edit_Client($id)
	{
		$this->db->select('*');
		$this->db->from('accountAdmin');
		$this->db->where('adminId',$id);
		$query = $this->db->get();
		return $query->result_array();
	}	

}