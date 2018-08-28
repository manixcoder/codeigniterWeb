<?php
	class AdminEmployeeModel extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('admin/AdminCommonFunction');
			error_reporting(0);
			
		}
		function employeeListing($adminId)
		{
			//echo $adminId;die;
			$this->db->select('*');
			$this->db->from('accountAdmin rc');
			$this->db->where('mangerId', $adminId);
			$this->db->order_by('adminId', 'DESC');
			$this->db->where('adminUserType', '3');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		function addEmployee($data)
		{
			//echo "<pre>";print($data);die;
			$custEmail 		= $data['adminEmail'];
			$adminPassword 	= $data['adminPassword'];
			$employeeName 	= $data['adminFirstName']." ".$data['adminLastName'];
			$acceptableChars = "0123456789";
			$randomCode 		= "";
			for ($i = 0; $i < 6; $i++)
			{
				$randomCode.= substr($acceptableChars, rand(0, strlen($acceptableChars) - 1) , 1);
			}
			$code 			= $randomCode;
			//$data['custOTP']   = $code;
			$inserted_id = $this->db->insert("accountAdmin",array(
				'mangerId'=> $data['mangerId'],
				'adminFirstName'=> $data['adminFirstName'],
				'adminLastName'=> $data['adminLastName'],
				'adminEmail'=> $data['adminEmail'],
				'adminPassword'=> md5(md5($data['adminPassword'])),
				'adminAadharNumber'=> $data['adminAadharNumber'],
				'adminPhoneNumber'=> $data['adminPhoneNumber'],
				'adminAlternatePhoneNumber'=> $data['adminAlternatePhoneNumber'],
				'adminUserType'=> $data['adminUserType'],
				'adminSex'=> $data['adminSex'],
				'adminDOB'=> $data['adminDOB'],
				'adminAddress'=> $data['adminAddress'],
				'adminProfileImage'=> $data['adminProfileImage']

			));
			$insert_id = $this->db->insert_id();
			/*
			if($insert_id > 0 )
			{
				
				$AppName 	= "bookkeepers@accounts.fortecsolution.com";
				$body 		= '<html>
				<body style="background-color:#F4F4F4;">
				<table style="max-width:500px;min-width:500px;margin:0 auto;background-color:#fff;text-align:center;">
				<tr>
				<td style="color:#696969;font-family:open sans;font-size:14px;padding:7px 0;text-align:left;
				padding-left:20px;padding-right:20px;padding-top:40px;">
				Hello'.$employeeName.'
				</td>
				</tr>
				<tr>
				<td style="color:#696969;font-family:open sans;font-size:14px;padding:7px 0;
				text-align:left;padding-left:20px;padding-right:20px;line-height:24px;">
				Admin has been Register you as a Employee. Please login and use the below OTP to Access further.
				</td>
				</tr>
				<tr>
				<td style="color:#696969;font-family:open sans;font-size:14px;padding:30px 0;
				text-align:left;padding-left:20px;padding-right:20px;">
				Email : ' . $custEmail . ' and Password :'.$adminPassword.'
				</td>
				</tr>
				<tr>
				<td style="color:#696969;font-family:open sans;font-size:14px;padding:0;
				text-align:left;padding-left:20px;padding-right:20px;">
				Regards
				</td>
				</tr>
				<tr>
				<td style="color:#23A8E0;font-family:open sans;font-size:14px;padding:0;
				text-align:left;padding-left:20px;padding-right:20px;padding-bottom:40px;">
				Book Keeper
				</td>
				</tr>
				</table>
				</body>
				</html>';
				// >>>>>>>>>>>>>>Sending Mail<<<<<<<<<<<<
				
				$headers = "From: " . $AppName . " \r\n";
				$headers.= "MIME-Version: 1.0\r\n";
				$headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$mail = @mail($custEmail, "OTP", $body, $headers);
				if ($mail)
				{
					echo "<script>alert(send)</script>";
				}
				else
				{
					echo "<script>alert(Not send)</script>";
				}
			}*/			
			return true;
		}
		function edit_Client($id)
		{
			$this->db->select('*');
			$this->db->from('accountAdmin');
			$this->db->where('adminId',$id);
			$query = $this->db->get();
			return $query->result_array();
		}
		function update_client_query($id,$data)
		{
			$this->db->where('adminId',$id);
			$this->db->update('accountAdmin',$data);			
			$this->db->select('*');
			$this->db->from('accountAdmin');
			$this->db->where('adminId',$id);
			$query = $this->db->get();
			return $query->result_array();
		}
		function deleteEmployee($id)
		{
			$this->db->where('adminId',$id);
			$this->db->delete('accountAdmin');
			return true;
		}
		function blockClient($id)
		{
			$this->db->from('accountAdmin');
			$this->db->where('adminId',$id);
			$query = $this->db->get();
			$userData = $query->result_array();
			$status = $userData[0]['is_Block'];			
			if($status == "Block")
			{
				$data = array(
				"is_Block" => "Unblock"	//when admin is block login status false
				);
				$this->db->where('restCustomerId', $id);
				$this->db->update('restaurantCustomer', $data); 
				return "Unblock";
			}
			else
			{
				$this->db->from('restaurantCustomer');
				$this->db->where('restCustomerId',$id);				
				$query = $this->db->get();
				$data = $query->result_array();
				
				$data = array(
				"is_Block" => "Block"								 	
				); 
				$this->db->where('restCustomerId', $id);
				$this->db->update('restaurantCustomer', $data);
				return "Block";
			}
		}		
		function managerListing()
		{
			$this->db->select('ro.*,rd.restName');
			$this->db->from('restaurantOwner ro');
			$this->db->JOIN('restaurantData rd','rd.restaurantId = ro.restId');
			$this->db->order_by('restaurantOwnerId', 'DESC');
			$this->db->where('restUserType','O');
			$query = $this->db->get();
			return $query->result_array();
		}
		function add_manager($data)
		{
			$restOwnerEmail = $data['restOwnerEmail'];
			$acceptableChars = "0123456789";
			$randomCode 		= "";
			for ($i = 0; $i < 6; $i++)
			{
				$randomCode.= substr($acceptableChars, rand(0, strlen($acceptableChars) - 1) , 1);
			}
			$code 			= $randomCode;
			$data['otp']   = $code;
			$this->db->insert("restaurantOwner",$data);
			$inserted_id = $this->db->insert_id();
			/*if ($inserted_id)
				{
					require_once ('vendor/autoload.php');
					//\Stripe\Stripe::setApiKey("sk_test_a30KKs2jQf95NXcplMQxhZhb");
					\Stripe\Stripe::setApiKey("sk_test_uDV2z5Io6BVSj0GH7sVMGycT");
					
					$acct =\Stripe\Account::create(array(
						"country"=>"GB",
						"type"=>"custom",
					));
					$id = $acct->id;
					$this->db->where('restOwnerEmail', $restOwnerEmail);
					$this->db->update('restaurantOwner', array(
						'stripeAccount'=>$id,
						'stripeAccountStatus'=>'0'
					));
					$Acunt =\Stripe\Account::retrieve($id);
					$Acunt->tos_acceptance->date = time();
					$Acunt->tos_acceptance->ip = $_SERVER['REMOTE_ADDR'];
					$Acunt->save();
					$account =\Stripe\Account::retrieve($id);
					$account->email = $restOwnerEmail;
					$account->save();
				}*/
			
			if($inserted_id)
			{
				
				$AppName 	= "testewb121@gmail.com";
				$body 		= '
				<html>
				<body style="background-color:#F4F4F4;">
				<table style="max-width:500px;min-width:500px;margin:0 auto;background-color:#fff;text-align:center;">
				<tr>
				<td style="color:#696969;font-family:open sans;font-size:14px;padding:7px 0;text-align:left;
				padding-left:20px;padding-right:20px;padding-top:40px;">
				Hi Hello
				</td>
				</tr>
				<tr>
				<td style="color:#696969;font-family:open sans;font-size:14px;padding:7px 0;
				text-align:left;padding-left:20px;padding-right:20px;line-height:24px;">
				Admin has been Register you as a Retaurant manager. Please login with following credentials and check OTP on Registered Email for Access further.
				</td>
				</tr>
				<tr>
				<td style="color:#696969;font-family:open sans;font-size:14px;padding:30px 0;
				text-align:left;padding-left:20px;padding-right:20px;">
				Please use this OTP for reset Password: ' . $code . '
				</td>
				</tr>
				<tr>
				<td style="color:#696969;font-family:open sans;font-size:14px;padding:0;
				text-align:left;padding-left:20px;padding-right:20px;">
				Regards
				</td>
				</tr>
				<tr>
				<td style="color:#23A8E0;font-family:open sans;font-size:14px;padding:0;
				text-align:left;padding-left:20px;padding-right:20px;padding-bottom:40px;">
				LeanBill App
				</td>
				</tr>
				</table>
				</body>
				</html>';
				// >>>>>>>>>>>>>>Sending Mail<<<<<<<<<<<<
				
				$headers = "From: " . $AppName . " \r\n";
				$headers.= "MIME-Version: 1.0\r\n";
				$headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$mail = @mail($restOwnerEmail, "Change Password", $body, $headers);
				if ($mail)
				{
					echo "<script>alert(send)</script>";
				}
				else
				{
					echo "<script>alert(Not send)</script>";
				}
			}
			return true;
		}
		function edit_manager($id)
		{
			$this->db->select('*');
			$this->db->from('restaurantOwner');
			$this->db->where('restaurantOwnerId',$id);
			$query = $this->db->get();
			$Data = $query->result_array();
			return $Data;
		}
		function edit_manager_query($id,$data)
		{
			$this->db->where('restaurantOwnerId',$id);
			$this->db->update('restaurantOwner',$data);			
			$this->db->select('*');
			$this->db->from('restaurantOwner');
			$this->db->where('restaurantOwnerId',$id);
			$query = $this->db->get();
			$Data = $query->result_array();
			return $Data;
		}
		function blockManager($id)
		{
			$this->db->from('restaurantOwner');
			$this->db->where('restaurantOwnerId',$id);
			$query = $this->db->get();
			$userData = $query->result_array();
			$status = $userData[0]['is_Block'];			
			if($status == "Block")
			{
				$data = array(
				"is_Block" => "Unblock" //when admin is block login status false
				);
				$this->db->where('restaurantOwnerId', $id);
				$this->db->update('restaurantOwner', $data);
				// Notification 
				$this->db->select('*');
				$this->db->from('restaurantOwner');
				$this->db->where('restaurantOwnerId', $id);
				$query = $this->db->get();
				$restaurantOwnerData =  $query->result_array();
				$restId = $restaurantOwnerData[0]['restId'];
				$this->db->select('*');
				$this->db->from('restaurantOwner');
				$this->db->where('restId', $restId);
				$this->db->where('loginStatus', '0');
				$query = $this->db->get();
				$finalData =  $query->result_array();
				foreach ($finalData as  $restData) 
				{
					if ($restData['restOwnerDeviceType'] == '1')
					{
						$message = array(
							'message' 			=> "Admin has unblocked your account",
							'title' 			=> "Admin has unblocked your account",
							'userName' 			=> $restData['restFirstName'],
							'restaurantId' 		=> $restData['restId'],
							'notificationType' 	=> "restaurantOwnerUnBlock",
							'vibrate' 			=> 1,
							'sound' 			=> 1
						);
						$this->PushnotificationModel->send_gcm($restData['restOwnerDeviceId'], $message);
					}					
				}
				// Notification
				return "Unblock";
			}
			else
			{
				$this->db->from('restaurantOwner');
				$this->db->where('restaurantOwnerId',$id);
				$query = $this->db->get();
				$data = $query->result_array();
				$data = array(
					"is_Block" => "Block"	
				); 
				$this->db->where('restaurantOwnerId', $id);
				$this->db->update('restaurantOwner', $data);
				// Notification 
				$this->db->select('*');
				$this->db->from('restaurantOwner');
				$this->db->where('restaurantOwnerId', $id);
				$query = $this->db->get();
				$restaurantOwnerData =  $query->result_array();
				$restId = $restaurantOwnerData[0]['restId'];
				$this->db->select('*');
				$this->db->from('restaurantOwner');
				$this->db->where('restId', $restId);
				$this->db->where('loginStatus', '0');
				$query = $this->db->get();
				$finalData =  $query->result_array();
				foreach ($finalData as  $restData) 
				{
					if ($restData['restOwnerDeviceType'] == '1')
					{
						$message = array(
							'message' 			=> "Admin has blocked your account",
							'title' 			=> "Admin has blocked your account",
							'userName' 			=> $restData['restFirstName'],
							'restaurantId' 		=> $restData['restId'],
							'notificationType' 	=> "restaurantOwnerBlock",
							'vibrate' 			=> 1,
							'sound' 			=> 1
						);
						$this->PushnotificationModel->send_gcm($restData['restOwnerDeviceId'], $message);
					}
				}
				// Notification 				
				return "Block";
			}
		}
		function waiterListing()
		{
			$this->db->select('ro.*,rd.restName');
			$this->db->from('restaurantOwner ro');
			$this->db->order_by('restaurantOwnerId', 'DESC');
			$this->db->join('restaurantData rd', 'rd.restaurantId = ro.restId');
			$this->db->where('restUserType','W');
			$query = $this->db->get();
			$userData = $query->result_array();
			return $userData;
		}
		
		function add_waiter($data)
		{
			
			$restOwnerEmail = $data['restOwnerEmail'];
			$acceptableChars = "0123456789";
			$randomCode 		= "";
			for ($i = 0; $i < 6; $i++)
			{
				$randomCode.= substr($acceptableChars, rand(0, strlen($acceptableChars) - 1) , 1);
			}
			$code 			= $randomCode;
			$data['OTP']   = $code;
			$inserted_id = $this->db->insert("restaurantOwner",$data);
			if($inserted_id)
			{
				
				$AppName 	= "testewb121@gmail.com";
				$body 		= '
				<html>
				<body style="background-color:#F4F4F4;">
				<table style="max-width:500px;min-width:500px;margin:0 auto;background-color:#fff;text-align:center;">
				<tr>
				<td style="color:#696969;font-family:open sans;font-size:14px;padding:7px 0;text-align:left;
				padding-left:20px;padding-right:20px;padding-top:40px;">
				Hello
				</td>
				</tr>
				<tr>
				<td style="color:#696969;font-family:open sans;font-size:14px;padding:7px 0;
				text-align:left;padding-left:20px;padding-right:20px;line-height:24px;">
				Admin has been Register you as a Waiter. Please login and use the below OTP to Access further.
				</td>
				</tr>
				<tr>
				<td style="color:#696969;font-family:open sans;font-size:14px;padding:30px 0;
				text-align:left;padding-left:20px;padding-right:20px;">
				OTP : ' . $code . '
				</td>
				</tr>
				<tr>
				<td style="color:#696969;font-family:open sans;font-size:14px;padding:0;
				text-align:left;padding-left:20px;padding-right:20px;">
				Regards
				</td>
				</tr>
				<tr>
				<td style="color:#23A8E0;font-family:open sans;font-size:14px;padding:0;
				text-align:left;padding-left:20px;padding-right:20px;padding-bottom:40px;">
				LeanBill App
				</td>
				</tr>
				</table>
				</body>
				</html>';
				// >>>>>>>>>>>>>>Sending Mail<<<<<<<<<<<<
				
				$headers = "From: " . $AppName . " \r\n";
				$headers.= "MIME-Version: 1.0\r\n";
				$headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$mail = @mail($restOwnerEmail, "OTP", $body, $headers);
				if ($mail)
				{
					echo "<script>alert(send)</script>";
				}
				else
				{
					echo "<script>alert(Not send)</script>";
				}
			}
			return true;
		}
		function fetct_restaurant()
			{
				$this->db->select('restaurantId,restName');
				$this->db->from('restaurantData');	
				$query = $this->db->get();
				return $query->result_array();			
			}
		function edit_waiter($id)
			{
				$this->db->select('*');
				$this->db->from('restaurantOwner ro');
				$this->db->join('restaurantData rd', 'rd.restaurantId = ro.restId');
				$this->db->where('restaurantOwnerId',$id);
				$query = $this->db->get();
				return $query->result_array();			
			}
		function edit_waiter_query ($id,$data)
		{
			$this->db->where('restaurantOwnerId',$id);
			$this->db->update('restaurantOwner',$data);				 
			$this->db->select('*');
			$this->db->from('restaurantOwner ro');
			$this->db->join('restaurantData rd', 'rd.restaurantId = ro.restId');
			$this->db->where('restaurantOwnerId',$id);
			$query = $this->db->get();
			return $query->result_array();				 
		}
		function blockWaiter($id)
		{
			$this->db->from('restaurantOwner');
			$this->db->where('restaurantOwnerId',$id);
			$query = $this->db->get();
			$userData = $query->result_array();
			$status = $userData[0]['is_Block'];				
			if($status == "Block")
			{
				$data = array(
					"is_Block" => "Unblock" //when admin is block login status false
				);
				$this->db->where('restaurantOwnerId', $id);
				$this->db->update('restaurantOwner', $data); 
				//Notification 
				$this->db->select('*');
				$this->db->from('restaurantOwner');
				$this->db->where('restaurantOwnerId', $id);
				$this->db->where('loginStatus', '0');
				$query = $this->db->get();
				$finalData =  $query->result_array();
				foreach ($finalData as  $restData) 
				{
					if ($restData['restOwnerDeviceType'] == '1')
					{
						$message = array(
							'message' 			=> "Admin has unblocked your account",
							'title' 			=> "Admin has blocked your account",
							'userName' 			=> $restData['restFirstName'],
							'restaurantId' 		=> $restData['restId'],
							'notificationType' 	=> "restaurantOwnerUnBlock",
							'vibrate' 			=> 1,
							'sound' 			=> 1
						);
						$this->PushnotificationModel->send_gcm($restData['restOwnerDeviceId'], $message);
					}
				}
				return "Unblock";
			}
			else
			{
				$this->db->from('restaurantOwner');
				$this->db->where('restaurantOwnerId',$id);
				$query = $this->db->get();
				$data = $query->result_array();
				$data = array(
					"is_Block" => "Block"	
				); 
				$this->db->where('restaurantOwnerId', $id);
				$this->db->update('restaurantOwner', $data);
				//Notification 
				$this->db->select('*');
				$this->db->from('restaurantOwner');
				$this->db->where('restaurantOwnerId', $id);
				$this->db->where('loginStatus', '0');
				$query = $this->db->get();
				$finalData =  $query->result_array();
				foreach ($finalData as  $restData) 
				{
					if ($restData['restOwnerDeviceType'] == '1')
					{
						$message = array(
							'message' 			=> "Admin has blocked your account",
							'title' 			=> "Admin has blocked your account",
							'userName' 			=> $restData['restFirstName'],
							'restaurantId' 		=> $restData['restId'],
							'notificationType' 	=> "restaurantOwnerBlock",
							'vibrate' 			=> 1,
							'sound' 			=> 1
						);
						$this->PushnotificationModel->send_gcm($restData['restOwnerDeviceId'], $message);
					}
				}
				return "Block";
			}
		}
		public function getClientOrderData($id){
		
			$this->db->select('co.*,rc.*','');
			$this->db->from('restaurantCustomer rc');
			$this->db->where('co.custId',$id);
			$this->db->order_by('restCustomerId', 'DESC');
			$this->db->join('customerOrder co','co.custId=rc.restCustomerId');
			$this->db->join('restaurantCheckInData chkIn','chkIn.custId=rc.restCustomerId');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		
		}
		
		public function getAllOrderType(){
		
			$this->db->select('*');
			$this->db->from('orderType');
			$query = $this->db->get();
			$result = $query->result();
			return $result;
		
		}
	}
?>