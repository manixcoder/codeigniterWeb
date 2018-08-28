<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SuperAdminCommonFunction extends CI_Model
{
	function getManagerDetail($adminId)
	{
		$this->db->select("*");
		$this->db->from('accountAdmin');
		$this->db->where('adminId', $adminId);
		$query = $this->db->get();
		return $query->result_array();
	}
	function getAdminlist()
	{
		$this->db->select("*");
		$this->db->from('accountAdmin');
		$this->db->where('adminUserType', '2');
		$this->db->order_by('adminId', 'DESC');
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result_array();
	}
	function getEmployeeList()
	{
		$this->db->select("*");
		$this->db->from('accountAdmin');
		$this->db->where('adminUserType', '3');		
		$this->db->order_by('adminId', 'DESC');
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result_array();
	}
	function getCompanyList()
	{
		$this->db->select("*");
		$this->db->from('accountCompanies');				
		$this->db->order_by('id', 'DESC');
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result_array();
	}
	function adminCount()
	{
		$this->db->select('*');
		$this->db->from('accountAdmin');
		$this->db->where('adminUserType', '2');
		$query = $this->db->get();
		$userData = $query->result_array();
		return $query->num_rows();
	}
	function empCount()
	{
		$this->db->select('*');
		$this->db->from('accountAdmin');
		$this->db->where('adminUserType', '3');
		$query = $this->db->get();
		$userData = $query->result_array();
		return $query->num_rows();
	}
	function companyCount()
	{
		$this->db->select('*');
		$this->db->from('accountCompanies');
		$query = $this->db->get();
		$userData = $query->result_array();
		return $query->num_rows();
	}

}