<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SuperAdminAccountsModel extends CI_Model 
{
	function createAccounts($accData)
	{
		$this->db->insert('accountTypes', $accData);
		return $this->db->insert_id(); 
	}
	function accountsList()
	{
		$this->db->select('*');
		$this->db->from('accountTypes rc');
		$this->db->order_by('rc.ids', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	function accountDelete($accountId)
	{
		$this->db->where('ids', $accountId);
		$this->db->delete('accountTypes');
		return true;
	}
	function groupList()
	{
		$this->db->select('*');
		$this->db->from('accountGroups');
		//$this->db->order_by('rc.ids', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

}