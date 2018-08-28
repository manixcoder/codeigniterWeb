<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminCompaniesModel extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/AdminCommonFunction');
	}
	function companiesListing($adminId)
	{
		$this->db->select('rc.*,aa.adminFirstName,aa.adminLastName,aa.adminProfileImage');
		$this->db->from('accountCompanies rc');
		$this->db->join('accountAdmin aa', 'rc.employeeId=aa.adminId');
		$this->db->where('rc.mangerId', $adminId); 
		$this->db->order_by('rc.id', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	function getEmployee($adminId)
	{
		$this->db->select('*');
		$this->db->from('accountAdmin rc');
		$this->db->where('mangerId', $adminId); 
		$this->db->order_by('adminId', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	function addCompany($data)
	{
		//echo "<pre>";print_r($data);die;
		$companyEmail 		= $data['companyEmail'];
		$companyPassword 	= $data['companyPassword'];
		$inserted_id = $this->db->insert("accountCompanies",array(
			'mangerId'=> $data['mangerId'],
			'employeeId'=>$data['employeeId'],
			'companyName'=>$data['companyName'],
			'companyEmail'=> $data['companyEmail'],
			'companyPassword'=> md5(md5($data['companyPassword'])),
			'companyPhoneNumber'=> $data['companyPhoneNumber'],
			'companyGSTImage'=> $data['companyGSTImage'],
			'companyWebSite'=> $data['companyWebSite'],
			'companyGSTRegistrationType'=> $data['companyGSTRegistrationType'],
			'companyGSTINNumber'=> $data['companyGSTINNumber'],
			'companyAddress'=> $data['companyAddress'],
			'companyTaxInfo_taxRegNo'=> $data['companyTaxInfo_taxRegNo'],
			'companyTaxInfo_PANNo'=> $data['companyTaxInfo_PANNo'],
			'companyRegNoImage'=> $data['companyRegNoImage'],
			'companyPanCardImage'=> $data['companyPanCardImage'], 
			'companyLogo'=>$data['companyLogo']
		));
		$insert_id = $this->db->insert_id();
		if($insert_id > 0 )
		{
			$AppName 	= "bookkeepers@accounts.fortecsolution.com";
				$body 		= '<html>
				<body style="background-color:#F4F4F4;">
				<table style="max-width:500px;min-width:500px;margin:0 auto;background-color:#fff;text-align:center;">
				<tr>
				<td style="color:#696969;font-family:open sans;font-size:14px;padding:7px 0;text-align:left;
				padding-left:20px;padding-right:20px;padding-top:40px;">
				Hello'.$companyEmail.'
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
				Email : ' . $companyEmail . ' and Password :'.$companyPassword.'
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
				/*if ($mail)
				{
					echo "<script>alert(send)</script>";
				}
				else
				{
					echo "<script>alert(Not send)</script>";
				}*/
				return true;
			}		
			return true;

	}

}