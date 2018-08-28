<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerManagementModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('employee/EmployeeCommonFunction');
	}
	function addCustomer($data)
	{
		$this->db->insert('accountCustomers', $data);
		return $this->db->insert_id();
	}
	function getCustomerList($empId)
	{
		$this->db->select('ac.*,acc.companyName');
		$this->db->from('accountCustomers ac');
		$this->db->join('accountCompanies acc', 'ac.companyId=acc.id');
		$this->db->where('ac.empId', $empId);
		$query = $this->db->get();
		return $query->result_array();
	}
	function deleteCustomer($id)
	{
		$this->db->where('custId', $id);
		$this->db->delete('accountCustomers');
		return true;
	}
	function updateCustomer($id,$data)
	{
		$this->db->where('custId', $id);
		$this->db->update('accountCustomers', $data);
		return true;

	}
	function editCustomer($id)
	{
		$this->db->select('*');
		$this->db->from('accountCustomers');
		$this->db->where('custId', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

}