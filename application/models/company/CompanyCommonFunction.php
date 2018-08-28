<?php
class CompanyCommonFunction extends CI_Model
	{
	function __construct()
		{
			parent::__construct();
			//$this->load->model('webservices/PushnotificationModel');
			//$this->load->model('admin/PushnotificationModel');
			error_reporting(0);
		}
	function client_count()
		{
			$this->db->select('*');
			$this->db->from('restaurantCustomer');
			$query = $this->db->get();
			$userData = $query->result_array();
			return $query->num_rows();
		}
	function manager_count()
		{
			$this->db->select('*');
			$this->db->from('restaurantOwner');
			$this->db->where('restUserType', 'O');
			$query = $this->db->get();
			$userData = $query->result_array();
			return $query->num_rows();
		}
	function waiter_count()
		{
			$this->db->select('*');
			$this->db->from('restaurantOwner');
			$this->db->where('restUserType', 'W');
			$query = $this->db->get();
			$userData = $query->result_array();
			return $query->num_rows();
		}
	function restaurant_count()
		{
			$this->db->select('*');
			$this->db->from('restaurantData');
			$query = $this->db->get();
			$userData = $query->result_array();
			return $query->num_rows();
		}
	function getAllRestaurant()
		{
			$this->db->select('*');
			$this->db->from('restaurantData');
			$query = $this->db->get();
			return $query->result_array();
		}
	function GetCurrencyById($RId)
		{
			$this->db->select('*');
			$this->db->from('restaurantData');
			$this->db->where('restaurantId', $RId);
			$query = $this->db->get();
			return $query->result_array();
		}
	function UpdateProductCurrency($Id, $dataArray)
		{
			$this->db->select('*');
			$this->db->from('restaurantProduct');
			$this->db->where('productRestId', $Id);
			$query = $this->db->get();
			$returndata = $query->result_array();
			foreach($returndata as $single)
				{
					$priceexplode = explode(" ", $single['productPrice']);
					$this->db->where('restProductId', $single['restProductId']);
					$ProData = array(
						"productPrice" => $priceexplode[0] . " " . $dataArray
					);
					$this->db->update('restaurantProduct', $ProData);
				}
		}
	function sendNotificationToManagerToUpdatePromo($restsId,$id)
		{
			$this->db->select('*');
			$this->db->from('restaurantOwner');			
			$this->db->where('restId', $restsId);
			$this->db->where('loginStatus', '0');
			$this->db->where('restUserType !=', 'W');
			$this->db->where('is_UserVerified !=', 'false');
			$query = $this->db->get();
			$returndata = $query->result_array();
			if (!empty($returndata))
				{
					$PromoData = $this->getPromoData($id);
					foreach($returndata as $rest)
						{
							if ($rest['restOwnerDeviceType'] == '1')
								{
									$message = array(
										'message' 			=> "PromoCodeEdited",
										'title' 			=> "PromoCodeEdited",
										'promoData' 		=> $PromoData,
										'restaurantId' 		=> "",										
										'notificationType' 	=> "PromoCodeEdited",
										'notificationId' 	=> rand(1000, 9999) ,
										'vibrate' 			=> 1,
										'sound' 			=> 1
									);
									$this->PushnotificationModel->send_gcm($rest['restOwnerDeviceId'], $message);
								}
						}
				}
		}
	function sendNotificationToManagerToEditRestaurent($id,$restaurantData)
		{
			//echo "<pre>";print_r($restaurantData);
			$this->db->select('*');
			$this->db->from('restaurantOwner');			
			$this->db->where('restId', $id);
			$this->db->where('loginStatus', '0');
			$this->db->where('restUserType !=', 'W');
			$this->db->where('is_UserVerified !=', 'false');
			$query = $this->db->get();
			$returndata = $query->result_array();
			if (!empty($returndata))
				{
					
					foreach($returndata as $rest)
						{
							if ($rest['restOwnerDeviceType'] == '1')
								{
									$message = array(
										'message' 			=> "restaurantDataEdited",
										'title' 			=> "restaurantDataEdited",
										'restaurantData' 	=> $restaurantData[0],
										'restaurantId' 		=> "",										
										'notificationType' 	=> "restaurantDataEdited",
										'notificationId' 	=> rand(1000, 9999) ,
										'vibrate' 			=> 1,
										'sound' 			=> 1
									);
									$this->PushnotificationModel->send_gcm($rest['restOwnerDeviceId'], $message);
								}
						}
				}
		}
	function sendNotificationToManagerToDeletePromo($restsId,$id)
		{
			$this->db->select('*');
			$this->db->from('restaurantOwner');			
			$this->db->where('restId', $restsId);
			$this->db->where('loginStatus', '0');
			$this->db->where('restUserType !=', 'W');
			$this->db->where('is_UserVerified !=', 'false');
			$query = $this->db->get();
			$returndata = $query->result_array();
			if (!empty($returndata))
				{
					$PromoData = $this->getPromoData($id);
					foreach($returndata as $rest)
						{
							if ($rest['restOwnerDeviceType'] == '1')
								{
									$message = array(
										'message' 			=> "PromoCodeDelete",
										'title' 			=> "PromoCodeDelete",
										'promoData' 		=> $PromoData,
										'restaurantId' 		=> "",										
										'notificationType' 	=> "PromoCodeDelete",
										'notificationId' 	=> rand(1000, 9999) ,
										'vibrate' 			=> 1,
										'sound' 			=> 1
									);
									$this->PushnotificationModel->send_gcm($rest['restOwnerDeviceId'], $message);
								}
						}
				}
		}
	function sendNotificationToManager($restsId,$promoId)
		{

			$this->db->select('*');
			$this->db->from('restaurantOwner');			
			$this->db->where('restId', $restsId);
			$this->db->where('loginStatus', '0');
			$this->db->where('restUserType !=', 'W');
			$this->db->where('is_UserVerified !=', 'false');
			$query = $this->db->get();
			$returndata = $query->result_array();
			if (!empty($returndata))
				{
					$PromoData = $this->getPromoData($promoId);
					foreach($returndata as $rest)
						{
							if ($rest['restOwnerDeviceType'] == '1')
								{
									$message = array(
										'message' 			=> "PromoCodeAdd",
										'title' 			=> "PromoCodeAdd",
										'promoData' 		=> $PromoData,
										'restaurantId' 		=> "",										
										'notificationType' 	=> "PromoCodeAdd",
										'notificationId' 	=> rand(1000, 9999) ,
										'vibrate' 			=> 1,
										'sound' 			=> 1
									);
									$this->PushnotificationModel->send_gcm($rest['restOwnerDeviceId'], $message);
								}
						}
				}
		}
	function getPromoData($promoId)
		{
			$this->db->select('*');
			$this->db->from('restaurentPromoCode');
			$this->db->where('restPromoId', $promoId);
			$query = $this->db->get();
			$promoCodeData = $query->result_array();
			foreach ($promoCodeData as  $promo) 
			{
				$PromoRelated = $this->getPromoRelatedData($promoId);				
				if($promoId == $PromoRelated[0]['promoId'])
				{
					$promo['ReletedProducts'] = $PromoRelated;
				}
				else
				{
					$promo['ReletedProducts'] = [];
				}
				$realData[] = $promo;				
			}
			//echo "<pre>";print_r($realData);die;
			return $realData;
		}
	function getPromoRelatedData($restPromoId)
		{
			$this->db->select('*');
			$this->db->from('promoCodeReletedProducts pcr');
			$this->db->JOIN('restaurantProduct rp','pcr.validProductsId=rp.restProductId');
			$this->db->where('pcr.promoId', $restPromoId);
			$query = $this->db->get();
			return $query->result_array();
		}
	function notificationForAddFoodCategory($catRestaurantId, $categoryType, $lastid)
		{
			$this->db->select('*');
			$this->db->from('restaurantOwner');
			$this->db->where('restId', $catRestaurantId);
			$this->db->where('loginStatus !=', '1');
			$this->db->where('is_UserVerified ', 'true');
			$this->db->where('is_Block', 'Unblock');
			$this->db->where('restUserType', 'O');
			$query = $this->db->get();
			$restaurantOwnerData = $query->result_array();
			$this->db->select('*');
			$this->db->from('productCategory');
			$this->db->where('categoryId', $lastid);
			$query = $this->db->get();
			$CategoryData = $query->result_array();
			if (!empty($restaurantOwnerData))
				{
				foreach($restaurantOwnerData as $rest)
					{
					if ($rest['restOwnerDeviceType'] == '1')
						{
						if ($categoryType == 'F')
							{
								$message = array(
									'message' => "New Food Category Add",
									'title' => "New Food Category Add",
									'categoryData' => $CategoryData,
									'restaurantId' => "",
									'notificationType' => "NewFoodCategoryAdd",
									'notificationId' => rand(1000, 9999) ,
									'vibrate' => 1,
									'sound' => 1
								);							
							}
						  else
							{
								$message = array(
									'message' => "New Beverages  Category Add",
									'title' => "New Beverages  Category Add",
									'categoryData' => $CategoryData,
									'restaurantId' => "",
									'notificationType' => "NewBeveragesCategoryAdd",
									'notificationId' => rand(1000, 9999) ,
									'vibrate' => 1,
									'sound' => 1
								);							
							}
							$this->PushnotificationModel->send_gcm($rest['restOwnerDeviceId'], $message);
						}
					}
				}
		}

	function updateCategoryNotification($id)
		{
			$this->db->select('*');
			$this->db->from('productCategory');
			$this->db->where('categoryId', $id);
			$query = $this->db->get();
			$CategoryData = $query->result_array();
			$this->db->select('*');
			$this->db->from('restaurantOwner');
			$this->db->where('restId', $CategoryData[0]['catRestaurantId']);
			$this->db->where('loginStatus', '0');
			$this->db->where('is_UserVerified', 'true');
			$this->db->where('restUserType', 'O');
			$query = $this->db->get();
			$restaurantOwnerData = $query->result_array();
			if (!empty($restaurantOwnerData))
				{
				foreach($restaurantOwnerData as $rest)
					{
					if ($rest['restOwnerDeviceType'] == '1')
						{
						if ($CategoryData[0]['categoryType'] == 'F')
							{
								$message = array(
									'message' => "Food Category Edited",
									'title' => "New Food Category Add",
									'categoryData' => $CategoryData,
									'restaurantId' => "",
									'notificationType' => "FoodCategoryEdited",
									'notificationId' => rand(1000, 9999) ,
									'vibrate' => 1,
									'sound' => 1
								);
							}
						  else
							{
								$message = array(
									'message' => "Beverages  Category Edited",
									'title' => "Beverages  Category Edited",
									'categoryData' => $CategoryData,
									'restaurantId' => "",
									'notificationType' => "BeveragesCategoryEdited",
									'notificationId' => rand(1000, 9999) ,
									'vibrate' => 1,
									'sound' => 1
								);
							}

						$this->PushnotificationModel->send_gcm($rest['restOwnerDeviceId'], $message);
						}
					}
				}
		}

	function deleteCategoryNotification($CategoryData, $catRestaurantId, $id)
		{
			$this->db->select('*');
			$this->db->from('restaurantOwner');
			$this->db->where('restId', $catRestaurantId);
			$this->db->where('loginStatus', '0');
			$this->db->where('is_UserVerified', 'true');
			$this->db->where('restUserType', 'O');
			$query = $this->db->get();
			$restaurantOwnerData = $query->result_array();
			if (!empty($restaurantOwnerData))
				{
					foreach($restaurantOwnerData as $rest)
						{
							if ($rest['restOwnerDeviceType'] == '1')
								{
									if ($CategoryData[0]['categoryType'] == 'F')
										{
											$message = array(
												'message' 			=> "Food Category delete",
												'title' 			=> "Food Category delete",
												'categoryData' 		=> $CategoryData,
												'restaurantId' 		=> "",
												'notificationType' 	=> "FoodCategorydelete",
												'notificationId' 	=> rand(1000, 9999) ,
												'vibrate' => 1,
												'sound' => 1
											);
										}
									  else
										{
											$message = array(
												'message' => "Beverages  Category delete",
												'title' => "Beverages  Category delete",
												'categoryData' => $CategoryData,
												'restaurantId' => "",
												'notificationType' => "BeveragesCategorydelete",
												'notificationId' => rand(1000, 9999) ,
												'vibrate' => 1,
												'sound' => 1
											);
										}
									$this->PushnotificationModel->send_gcm($rest['restOwnerDeviceId'], $message);
								}
						}
				}
		}
	function sendDeleteProductNotification($productData, $id)
		{
			$this->db->select('*');
			$this->db->from('restaurantOwner');
			$this->db->where('restId', $productData[0]['productRestId']);
			$this->db->where('loginStatus', '0');
			$this->db->where('is_UserVerified', 'true');
			$this->db->where('restUserType', 'O');
			$query = $this->db->get();
			$restaurantOwnerData = $query->result_array();
			if (!empty($restaurantOwnerData))
				{
				foreach($restaurantOwnerData as $rest)
					{
					if ($rest['restOwnerDeviceType'] == '1')
						{
						if ($productData[0]['categoryType'] == 'F')
							{
								$message = array(
									'message' => "Food  delete",
									'title' => "Food  delete",
									'categoryData' => $productData,
									'restaurantId' => "",
									'notificationType' => "Fooddelete",
									'notificationId' => rand(1000, 9999) ,
									'vibrate' => 1,
									'sound' => 1
								);
							}
						  else
							{
								$message = array(
									'message' => "Beverages  delete",
									'title' => "Beverages delete",
									'categoryData' => $productData,
									'restaurantId' => "",
									'notificationType' => "Beveragesdelete",
									'notificationId' => rand(1000, 9999) ,
									'vibrate' => 1,
									'sound' => 1
								);
							}
						$this->PushnotificationModel->send_gcm($rest['restOwnerDeviceId'], $message);
						}
					}
				}
		}
	function notificationForAddProduct($productRestId, $productData)
		{
			$this->db->select('*');
			$this->db->from('restaurantOwner');
			$this->db->where('restId', $productRestId);
			$this->db->where('loginStatus', '0');
			$this->db->where('is_UserVerified', 'true');
			$this->db->where('restUserType', 'O');
			$query = $this->db->get();
			$restaurantOwnerData = $query->result_array();
			if (!empty($restaurantOwnerData))
				{
				foreach($restaurantOwnerData as $rest)
					{
					if ($rest['restOwnerDeviceType'] == '1')
						{
						if ($productData[0]['categoryType'] == 'F')
							{
								$message = array(
									'message' => "FoodAdd",
									'title' => "FoodAdd",
									'categoryData' => $productData,
									'restaurantId' => "",
									'notificationType' => "FoodAdd",
									'notificationId' => rand(1000, 9999) ,
									'vibrate' => 1,
									'sound' => 1
								);
							}
						  else
							{
								$message = array(
									'message' => "BeveragesAdd",
									'title' => "BeveragesAdd",
									'categoryData' => $productData,
									'restaurantId' => "",
									'notificationType' => "BeveragesAdd",
									'notificationId' => rand(1000, 9999) ,
									'vibrate' => 1,
									'sound' => 1
								);
							}
						$this->PushnotificationModel->send_gcm($rest['restOwnerDeviceId'], $message);
						}
					}
				}
		}
	function sendNotificationForAddAllergies($restsId, $AllergiesData)
		{
			
		$this->db->select('*');
		$this->db->from('restaurantOwner');
		$this->db->where('restId', $restsId);
		$this->db->where('loginStatus', '0');
		$this->db->where('is_UserVerified', 'true');
		$this->db->where('restUserType', 'O');
		$query = $this->db->get();
		$restaurantOwnerData = $query->result_array();
		if (!empty($restaurantOwnerData))
			{
			foreach($restaurantOwnerData as $rest)
				{
				if ($rest['restOwnerDeviceType'] == '1')
					{
					$message = array(
						'message' => "AllergiesAdd",
						'title' => "AllergiesAdd",
						'categoryData' => $AllergiesData,
						'restaurantId' => "",
						'notificationType' => "AllergiesAdd",
						'notificationId' => rand(1000, 9999) ,
						'vibrate' => 1,
						'sound' => 1
					);
					$this->PushnotificationModel->send_gcm($rest['restOwnerDeviceId'], $message);
					}
				}
			}
		}
	function sendNotificationForDeleteAllergies($AllergiesData)
		{
			$this->db->select('*');
			$this->db->from('restaurantOwner');
			$this->db->where('restId', $AllergiesData[0]['restsId']);
			$this->db->where('loginStatus', '0');
			$this->db->where('is_UserVerified', 'true');
			$this->db->where('restUserType', 'O');
			$query = $this->db->get();
			$restaurantOwnerData = $query->result_array();
			if (!empty($restaurantOwnerData))
				{
				foreach($restaurantOwnerData as $rest)
					{
					if ($rest['restOwnerDeviceType'] == '1')
						{
							$message = array(
								'message' 			=> "AllergiesDelete",
								'title' 			=> "AllergiesDelete",
								'categoryData' 		=> $AllergiesData,
								'restaurantId' 		=> "",
								'notificationType' 	=> "AllergiesDelete",
								'notificationId' 	=> rand(1000, 9999) ,
								'vibrate' 			=> 1,
								'sound' 			=> 1
							);
							$this->PushnotificationModel->send_gcm($rest['restOwnerDeviceId'], $message);
						}
					}
				}
		}

		function calculateDiscount($basePrice,$discountPercentage)
		{
			$basePrice 			= '233';
			$discountPercentage = '12';
			$discount  			= $basePrice * $discountPercentage / 100;
			return $realPrice 	= $basePrice-$discount;

		}
		function getUnpaidOrderData($checkId,$mostUniqueKey)
		{
			$this->db->select('*');
			$this->db->from('customerOrderCart');
			$this->db->where('checkInId', $checkId);
			$this->db->where('mostUniqueKey', $mostUniqueKey);			
			$this->db->where('paymentStatus !=', '1');
			$query = $this->db->get();
			$orderCartData = $query->result_array();
			foreach ($orderCartData as  $orderCart) 
			{
				$this->db->select('*');
				$this->db->from('customerCreditCardDetails');
				$this->db->where('custId', $orderCart['shareByUser']);
				$query = $this->db->get();
				$creditCard = $query->result_array();
				// echo "<pre>";print_r($creditCard);
				$this->deductPayment($orderCart['selectedProductPrice'],$orderCart['restId'],$creditCard,$checkId,$mostUniqueKey);
			}
			//echo "<pre>";print_r($orderCartData);
			//die;
		}
		
		function getUnpaidPreOrderData($checkId,$mostUniqueKey)
		{
			$this->db->select('*');
			$this->db->from('customerOrderCartData');
			$this->db->where('checkInId', $checkId);
			$this->db->where('mostUniqueKey', $mostUniqueKey);			
			$this->db->where('paymentStatus !=', '1');
			$query = $this->db->get();
			$orderCartData = $query->result_array();
			//echo "<pre>";print_r($orderCartData);die;
			foreach ($orderCartData as  $orderCart) 
			{
				$this->db->select('*');
				$this->db->from('customerCreditCardDetails');
				$this->db->where('custId', $orderCart['shareByUser']);
				$query = $this->db->get();
				$creditCard = $query->result_array();
				// echo "<pre>";print_r($creditCard);
				$outPut =$this->deductPayment($orderCart['selectedProductPrice'],$orderCart['restId'],$creditCard,$checkId,$mostUniqueKey);
			}
			return $outPut;
			//echo $checkId." Hello Manish ".$mostUniqueKey;
		}
		function getUnpaidTakeAwayData($checkId,$mostUniqueKey)
		{
			$this->db->select('*');
			$this->db->from('customerTakeAwayCart');
			$this->db->where('checkInId', $checkId);
			$this->db->where('mostUniqueKey', $mostUniqueKey);			
			//$this->db->where('paymentStatus !=', '1');
			$query = $this->db->get();
			$orderCartData = $query->result_array();
			echo "<pre>";print_r($orderCartData);die;

		}

		function deductPayment($selectedProductPrice,$restId,$creditCardDetails,$checkId,$mostUniqueKey)
		{
			require_once (APPPATH . 'libraries/stripe/Stripe.php');			
			require_once ('vendor/autoload.php');
			$params = array(
			"testmode" 			=> "on",
			//"testmode" 			=> "off",
			"private_live_key" 	=> "sk_live_5gkGgXTxGb3g9GeXC9wJvOP4",
			"public_live_key" 	=> "pk_live_nZwkIA7iOcs4Q036Hkt8WwVg",
			"private_test_key" 	=> "sk_test_uDV2z5Io6BVSj0GH7sVMGycT",
			"public_test_key" 	=> "pk_test_4FkN029quzZc4k5FWFuPn106"
		   );
		Stripe::setApiKey($params['private_test_key']);
		$result = Stripe_Token::create(array(
			"card" => array(
				"name" 			=> $creditCardDetails[0]['cardHolderName'],
				"number" 		=> $creditCardDetails[0]['cardNumber'] ,
				"exp_month" 	=> $creditCardDetails[0]['expiredMonth'] ,
				"exp_year" 		=> $creditCardDetails[0]['expiredYear'] ,
				"cvc" 			=> $creditCardDetails[0]['cvvNumber']
			)
		));
		$token = $result['id'];
		//echo "<pre>";print_r($result);die;		
		if ($params['testmode'] == "on")
			{
				\Stripe\Stripe::setApiKey($params['private_test_key']);
				$pubkey = $params['public_test_key'];
			}
		  else
			{
				\Stripe\Stripe::setApiKey($params['private_live_key']);
				$pubkey = $params['public_live_key'];
			}
		if (isset($token))
			{
			$amount = $selectedProductPrice*100; // Chargeble amount
			$restId = $restId; // Chargeble amount
			$invoiceid 		= "14526321"; // Invoice ID
			$description 	= "Invoice #" . $invoiceid . " - " . $invoiceid;
			try
				{
					$this->db->select('*');
					$this->db->from('restaurantOwner');
					$this->db->where('restId', $restId);
					$this->db->where('restUserType', 'O');
					$query = $this->db->get();
					$ownerData = $query->result_array();
					$percentage = $ownerData[0]['adminPercentage'];
					$stripeId = $ownerData[0]['stripeAccount'];

					$application_fee = intval($amount * 0.2);
					
					$restPayment = $amount-$application_fee;
					$adminId   = 	"acct_1BxrZbElmZzW0QT1";
					$managerId =	$stripeId;

					$fee = $amount*5/100;
					
					/*
					// WORKING CODE 
					$charge = \Stripe\Charge::create(array(
						"amount" => $amount,
						"currency" => "usd",
						"source" => "tok_visa",
						"application_fee" => $fee,
					), array("stripe_account" => $managerId));
					*/
					

					$charge = \Stripe\Charge::create(array(
						"amount" 			=> $amount,
						"currency" 			=> "gbp",
						"source" 			=> "tok_visa",
						"application_fee" 	=> $fee,
					), array("stripe_account" => $managerId));
					$result = "success";
				}
			catch(Stripe_CardError $e)
				{
					//echo "<pre>";print_r($e);
					$error = $e->getMessage();					
					//$result = "declined";
					$result = $error;
				}
			catch(Stripe_InvalidRequestError $e)
				{
					$error = $e->getMessage();					
					//$result = "declined";
					$result = $error;
				}
			catch(Stripe_AuthenticationError $e)
				{
					$error 	= $e->getMessage();					
					//$result = "declined";
					$result = $error;
				}
			catch(Stripe_ApiConnectionError $e)
				{
					$error 	= $e->getMessage();					
					//$result = "declined";
					$result = $error;
				}
			catch(Stripe_Error $e)
				{
					$error 	= $e->getMessage();					
					//$result = "declined";
					$result = $error;
				}
			catch(Exception $e)
				{
				if ($e->getMessage() == "zip_check_invalid")
					{
						$error 	= $e->getMessage();					
						//$result = "declined";
						$result = $error;
					}
				else if ($e->getMessage() == "address_check_invalid")
					{
						$error 	= $e->getMessage();						
						//$result = "declined";
						$result = $error;
					}
				else if ($e->getMessage() == "cvc_check_invalid")
					{
						$error 	= $e->getMessage();						
						//$result = "declined";
						$result = $error;
					}
				  else
					{
						$error 	= $e->getMessage();	
						
						//$result = "declined";
						$result = $error;
					}
				}

			}
		//echo "<pre>";print_r($result);die;
		if ($result == 'success')
			{
				/*$this->db->where('generateCode', $checkId);
				$this->db->where('mostUniqueKey', $mostUniqueKey);
				$this->db->update('restaurantCheckInData', array(
					'stripCheckStatus'=>'1'
				));*/
				return $charge->id;
				/*$result = array(
					'code' 			=> '201',
					'status' 		=> 'success',
					'transactionId' => $charge->id,
					'message' 		=> 'Payment done Successfully.'
				);
				print_r(json_encode($result));*/
			}
		  else
			{
				return $e->getMessage();
				/*$result = array(
					'code' 			=> '200',
					'status' 		=> 'failure',
					//'paymentType' 	=> $e->getMessage(),
					'message' 		=> 'Payment not done.'
				);
				print_r(json_encode($result));*/
			}

		}
		
	}
?>