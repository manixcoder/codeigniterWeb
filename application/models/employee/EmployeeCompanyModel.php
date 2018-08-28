<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmployeeCompanyModel extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('employee/EmployeeCommonFunction');
	}
	function getEmployeeCompanyList($empId)
	{
		$this->db->select('*');
		$this->db->from('accountCompanies');
		$this->db->where('employeeId', $empId);
		$query = $this->db->get();
		return $query->result_array();
	}
	function companyDetails($companyId,$employeeId)
	{
		$this->db->select('*');
		$this->db->from('accountCompanies');
		$this->db->where('id', $companyId);
		$this->db->where('employeeId', $employeeId);
		$query = $this->db->get();
		return $query->result_array();
	}	

}