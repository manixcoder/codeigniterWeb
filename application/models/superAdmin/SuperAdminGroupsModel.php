<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SuperAdminGroupsModel extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('superAdmin/SuperAdminCommonFunction');
	}
	function createGroups($data)
	{
		$this->db->insert('accountGroups', $data);
		return true;
	}
	function getGroupsList()
	{
		$this->db->select('*');
		$this->db->from('accountGroups');
		$this->db->order_by('gpId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	function getGroup($id)
	{
		$this->db->select('*');
		$this->db->from('accountGroups');
		$this->db->where('gpId', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	function updateGroupQuery($id,$changeData)
	{
		$this->db->where('gpId', $id);
		$this->db->update('accountGroups', array(
			'groupName'=>$changeData['groupName']
		));
		return true;
	}
	function deleteGroup($id)
	{
		$this->db->where('gpId', $id);
		$this->db->delete('accountGroups');
	}
}