<?php
	class AdminAuthModel extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function login($email, $password)
		{
			$this->db->select('aa.*,aur.accountRole');
			$this->db->from('accountAdmin aa');
			$this->db->join('accountUserRole aur', 'aa.adminUserType=aur.id');
			$this->db->where('aa.adminEmail', $email);
			$this->db->where('aa.adminPassword', md5(md5($password)));
			$this->db->where('aa.adminUserType', '2');
			$query = $this->db->get();
			$userData = $query->result_array();
			
			if(isset($userData[0]))
			{
				$this->db->where('adminId', $userData[0]['adminId']);
				$this->db->update('accountAdmin', array(
					'loginStatus'=>'1'
				));
				//$this->session->sess_expiration = '28800';// expires in 8 hours
				$this->session->set_userdata("admin_session", $userData);
			}
			return $userData;
		}
		function adminProfile()
		{
			$this->db->select('*');
			$this->db->from('adminUser');
			$this->db->where('id','1');
			$query = $this->db->get();
			return $data = $query->result_array();	
		}
		function adminProfileUpdate($data,$id)
		{
			$this->db->where('id', $id);
			$this->db->update('adminUser', $data);
			$this->db->select('*');
			$this->db->from('adminUser');
			$this->db->where('id', $id);
			$query = $this->db->get();
			return $data = $query->result_array();	
				 
		}
	}