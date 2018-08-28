<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmployeeJournalModel extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('employee/EmployeeCommonFunction');
	}
	public function getActiveProductData()
	{
		$sql = "SELECT * FROM products WHERE availability = ? ORDER BY id DESC";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}
	public function getProductData($id = null)
	{
		if($id) 
		{
			$sql = "SELECT * FROM products where id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
		$sql = "SELECT * FROM products ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

}