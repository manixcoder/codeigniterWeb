<?php
	class CompanyAuthModel extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			// $this->load->model('admin/PushnotificationModel');
		}
		function login($email, $password)
		{
			$this->db->select('*');
			$this->db->from('accountCompanies');
			$this->db->where('companyEmail', $email);
			$this->db->where('companyPassword', md5(md5($password)));
			//$this->db->where('adminUserType', '3');
			$query = $this->db->get();
			$userData = $query->result_array();
			
			if(isset($userData[0]))
			{
				$this->session->set_userdata("company_session", $userData);
			}
			return $userData;
		}
		/*
		function admin_profile()
		{
			$this->db->select('*');
			$this->db->from('adminUser');
			$this->db->where('id','1');
			$query = $this->db->get();
			return $data = $query->result_array();	
		}
		function admin_profile_update($data,$id)
		{
			 $this->db->where('id', $id);
			 $this->db->update('adminUser', $data);

     		$this->db->select('*');
			$this->db->from('adminUser');
			$this->db->where('id', $id);
			$query = $this->db->get();
			return $data = $query->result_array();	
				 
		}
		*/
	}