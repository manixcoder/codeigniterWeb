<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SuperAdminAuthModel extends CI_Model 
{
	function __construct()
		{
			parent::__construct();
		}
	function login($email, $password)
		{
			$this->db->select('sas.*,acr.accountRole');
			$this->db->from('accountSuperAdmin sas');
			$this->db->join('accountUserRole acr', 'sas.userType=acr.id');
			$this->db->where('sas.sAdminEmail', $email);
			$this->db->where('sas.sPassword', md5(md5($password)));
			$this->db->where('sas.userType', '1');
			$query = $this->db->get();
			$userData = $query->result_array();
			if(isset($userData[0]))
			{
				$this->session->set_userdata("superAdminSession", $userData);
			}
			return $userData;
		}
}