<?php
	class EmployeeAuthModel extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			// $this->load->model('admin/PushnotificationModel');
		}
		function login($email, $password)
		{
			$this->db->select('aa.*,ar.accountRole');
			$this->db->from('accountAdmin aa');
			$this->db->join('accountUserRole ar', 'aa.adminUserType=ar.id');
			$this->db->where('aa.adminEmail', $email);
			$this->db->where('aa.adminPassword', md5(md5($password)));
			$this->db->where('aa.adminUserType', '3');
			$query = $this->db->get();
			$userData = $query->result_array();
			
			if(isset($userData[0]))
			{
				$this->db->where('adminId', $userData[0]['adminId']);
				$this->db->update('accountAdmin', array(
					'loginStatus'=>'1'
				));
				$this->session->set_userdata("employee_session", $userData);
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