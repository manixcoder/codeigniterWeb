<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CompanyDetailsModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('company/CompanyDetailsModel');
		$this->load->model('company/CompanyCommonFunction');
		error_reporting(0);
	}

}