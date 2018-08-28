<?php
class AdminCommonFunction extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			error_reporting(0);
		}
		function getEmployeeCount($adminId)
		{
			$this->db->select('*');
			$this->db->from('accountAdmin');
			$this->db->where('mangerId', $adminId);
			$query = $this->db->get();
			$userData = $query->result_array();
			return $query->num_rows();
		}
		function getlatestEmployee($adminId)
		{
			$this->db->select('*');
			$this->db->from('accountAdmin');
			$this->db->where('mangerId', $adminId);
			$this->db->order_by('adminId', 'desc');
			$this->db->limit(8);
			$query = $this->db->get();
			return $query->result_array();
		}
		function getActiveEmpNum($adminId)
		{
			$this->db->select('*');
			$this->db->from('accountAdmin');
			$this->db->where('mangerId', $adminId);
			$this->db->where('loginStatus', '1');			
			$query = $this->db->get();
			return $query->num_rows();
			//return $query->result_array();
		}
		function getActiveEmp($adminId)
		{
			$this->db->select('*');
			$this->db->from('accountAdmin');
			$this->db->where('mangerId', $adminId);
			$this->db->where('loginStatus', '1');			
			$query = $this->db->get();
			//return $query->num_rows();
			return $query->result_array();
		}
		function getCompanyCount($adminId)
		{
			$this->db->select('*');
			$this->db->from('accountCompanies');
			$this->db->where('mangerId', $adminId);
			//$this->db->where('loginStatus', '1');			
			$query = $this->db->get();
			return $query->num_rows();
			//return $query->result_array();
		}
	}
?>