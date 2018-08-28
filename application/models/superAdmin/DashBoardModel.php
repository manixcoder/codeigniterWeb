<?php
	class DashBoardModel extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function usersListing()
		{
			$this->db->from('restaurantOwner');
			$this->db->order_by("restaurantOwnerId", "Desc");
			$query = $this->db->get();
			$userData = $query->result_array();
			return $userData;
		}
		function userProfile($id)
		{
			$this->db->from('registration');
			$this->db->where('user_id',$id);
			$query = $this->db->get();
			$userData = $query->result_array();
			return $userData;
		}
		function userProfileEdit($hidd_id,$adminNotes)
		{
			$this->db->where('user_id',$hidd_id);
			$this->db->update('registration',$adminNotes);


			$this->db->from('registration');
			$this->db->where('user_id',$hidd_id);
			$query = $this->db->get();
			$userData = $query->result_array();
			return $userData;
		}

		function userDelete($id)
		{
			$this->db->from('registration');
			$this->db->where('user_id',$id);
			$this->db->where('is_login','true');
			$query = $this->db->get();
			$userData = $query->result_array();

		
			//$this->db->where('user_id', $id); // notification will sent only login user.
			//$this->db->delete('registration');
			if(!empty($userData))
			{
			return $userData;	
			}
			else
			{
				return true;
			}
		}
		function userApprovedDeclined($data)
	    {
	   		$userStatus  = $data['userStatus'];
	   		$id 		= $data['id'];
	   		$data = array(
	   			'is_Block'   => $userStatus
	   		);
			$this->db->where('user_id', $id);
			$this->db->update('registration', $data);
			return true;
	    }
		function userBlock($id)
		{
			$this->db->from('registration');
			$this->db->where('user_id',$id);
			$query = $this->db->get();
			$userData = $query->result_array();
			$status = $userData[0]['is_Block'];
			if($status == "true")
			{
				$data = array(
					"is_Block" => "false"
				);
				$this->db->where('user_id', $id);
				$this->db->update('registration', $data); 
				return "true";
			}
			else
			{
				$this->db->from('registration');
				$this->db->where('user_id',$id);
				$this->db->where('is_login','true');
				$query = $this->db->get();
				$data = $query->result_array();
				$message = 'Your account has been blocked by admin';
				$userData 		= array(
						'users_id' 	=> $data[0]['user_id'],
						'type' 		=> 'Logout/Block',
						);
				$this->PushnotificationModel->userDeleteNotification($data[0]['device_id'], $message, $userData);
					$data = array(
								 "is_Block" => "true",
								 "is_login" => "false" 	
							 );
				$this->db->where('user_id', $id);
				$this->db->update('registration', $data);
				return true;
			}
		}
		function adslisting()
		{
			$this->db->from('userPostAdds ua');
			$this->db->join('registration r', 'ua.users_id = r.user_id');
			$this->db->order_by("addsId", "Desc");
			$query = $this->db->get();
			$userData = $query->result_array();
			return $userData;
		}
		function adsDelete($id)
		{
			$this->db->where('addsId', $id);
			$this->db->delete('userPostAdds');
			return true;
		}
		function adsProfile($id)
		{
			$this->db->from('userPostAdds');
			$this->db->where('addsId',$id);
			$query = $this->db->get();
			$adData = $query->result_array();
			return $adData;
		}
	   /*function adsApprovedDeclined($id)
	   {
	   		$this->db->from('userPostAdds');
			$this->db->where('addsId', $id);
			$query = $this->db->get();

			$userData = $query->result_array();

	    	$status = $userData[0]['admin_is_block'];
		if($status == "true")
			{
				$data = array(
								 "admin_is_block" => "false"
							 );
				$this->db->where('addsId', $id);
				$this->db->update('userPostAdds', $data); 
				return "false";
			}
			else	
			{
				$data = array(
								 "admin_is_block" => "true"
							 );
				$this->db->where('addsId', $id);
				$this->db->update('userPostAdds', $data);
				return "true";
			}
	   }*/

	   function adsApprovedDeclined($data)
	   {

	   		$adsStatus  = $data['status'];
	   		$id 		= $data['id'];
	   		$data = array(
						'adds_status'   => $adsStatus
						);
			$this->db->where('addsId', $id);
			$this->db->update('userPostAdds', $data);
		return false;
	   }
  
	   function gameSiteListing()
	   {
	   		$this->db->from('storeGameSite sg');
			$this->db->join('registration r', 'sg.UserId = r.user_id');
			$this->db->order_by("sg.id", "Desc");
			$query = $this->db->get();
			$gameData = $query->result_array();
			return $gameData;
	   }
	   function gameSiteDelete($id)
	   {

	   		$this->db->where('id', $id);
			$this->db->delete('storeGameSite');
			return true;
	   }
	   function gamesSitesEdit($id)
	   {
	   		$this->db->from('storeGameSite');
	   		$this->db->where('id', $id);
			$query = $this->db->get();
			$gameData = $query->result_array();
			return $gameData;
	   }
	   function gamesSitesEditQuery($data,$hidd_id)
	   {
	   		$this->db->where('id',$hidd_id);
			$this->db->update('storeGameSite',$data);

			$this->db->from('storeGameSite');
	   		$this->db->where('id',$hidd_id);
			$query = $this->db->get();
			$gameData = $query->result_array();
			return $gameData;
	   }
	   function gameApproveDecline($data)
	   {
	   		$gameStatus  = $data['status'];
	   		$id 		= $data['id'];
	   		$data = array(
						'admin_is_block'   => $gameStatus
						);
			$this->db->where('id', $id);
			$this->db->update('storeGameSite', $data);
			return true;
	   }

	   function gameDetails($id)
	   {
	   		$this->db->from('storeGameSite');
			$this->db->where('id',$id);
			$query = $this->db->get();
			$game = $query->result_array();
		


			$this->db->from('storeGameSiteOpening us');
			$this->db->where('store_id', $id);
			$query = $this->db->get();
			$timeData = $query->result_array();

			return $arrayName = array('game' =>$game ,'timeData' => $timeData);
	   }		
	}