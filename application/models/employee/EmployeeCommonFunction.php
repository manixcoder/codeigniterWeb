<?php
class EmployeeCommonFunction extends CI_Model
	{
	function __construct()
		{
			parent::__construct();
			error_reporting(0);
		}
	function getCompanyCount($empId)
	{
		$this->db->select('*');
		$this->db->from('accountCompanies');
		$this->db->where('employeeId', $empId);
		$query = $this->db->get();
		$userData = $query->result_array();
		return $query->num_rows();
	}
	function getCustCount($empId)
	{
		$this->db->select('*');
		$this->db->from('accountCustomers');
		$this->db->where('empId', $empId);
		$query = $this->db->get();
		$userData = $query->result_array();
		return $query->num_rows();
	}
	function getAllCompany($empId)
	{
		$this->db->select('*');
		$this->db->from('accountCompanies');
		$this->db->where('employeeId', $empId);
		$query = $this->db->get();
		return $query->result_array();
	}
	function getEmployeeCompanyList($empId)
		{
			$this->db->select('*');
			$this->db->from('accountCompanies');
			$this->db->where('employeeId', $empId);
			$query = $this->db->get();
			return $query->result_array();
			//return $query->num_rows();
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
	}
?>