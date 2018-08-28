<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*---------------------SuperAdmin Start-----------------------------*/

$route['superAdmin'] 			= 'superAdmin/SuperAdminAuth';
$route['superAdmin/dashboard'] 	= 'superAdmin/Dashboard/dashboardPage';
$route['superAdmin/admin-list'] = 'superAdmin/AdminUsers/adminListing';
$route['superAdmin/companyList'] = 'superAdmin/AdminUsers/companyList';
$route['superAdmin/employeeList'] = 'superAdmin/AdminUsers/employeeList';
$route['superAdmin/add-admin'] = 'superAdmin/AdminUsers/addAdmin';
$route['superAdmin/edit-admin']	= 'superAdmin/AdminUsers/editAdmin';
$route['superAdmin/addGroup'] ='superAdmin/SuperAdminGroups/createGroups';
$route['superAdmin/grouplist'] ='superAdmin/SuperAdminGroups/getGroupsList';
$route['superAdmin/groupEdit/(:num)'] ='superAdmin/SuperAdminGroups/groupEdit/$i';
$route['superAdmin/groupdelete/(:num)'] ='superAdmin/SuperAdminGroups/groupDelete/$i';
$route['superAdmin/createAccounts']	='superAdmin/SuperAdminAccounts/createAccounts';
$route['superAdmin/accountslist']	='superAdmin/SuperAdminAccounts/accountsList';
$route['superAdmin/accountdelete/(:num)']='superAdmin/SuperAdminAccounts/accountDelete/$i';
/*---------------------SuperAdmin End-----------------------------*/


/*=====================Admin/Manager Panel Start=======================*/

$route['admin'] 				= 'admin/AdminAuth';
$route['admin/dashboard'] 		= 'admin/AdminDashboard/dashboardPage';
$route['admin/employeeListing'] = 'admin/AdminEmployee/employeeListing';
$route['admin/addEmployee'] 	= 'admin/AdminEmployee/addEmployee';
$route['admin/editEmployee/(:num)'] = 'admin/AdminEmployee/editEmployee/$i';

$route['admin/deleteEmployee/(:num)'] 	= 'admin/AdminEmployee/deleteEmployee/$i';
$route['admin/companiesListing']	= 'admin/AdminCompaniesController/companiesListing';
$route['admin/addCompany']	 	= 'admin/AdminCompaniesController/addCompany';

/*=====================Admin/Manager Panel End=======================*/

/*=====================Employee Panel Start=======================*/
$route['employee']   	 	= 'employee/EmployeeAuth';
$route['employee/dashboard']    = 'employee/EmployeeDashboard/dashboardPage';
$route['employee/companyList']  = 'employee/EmployeeCompany/companyListForEmp';
$route['employee/addContacts']  = 'employee/CustomerManagement/addCustomer';
$route['employee/contactsList'] = 'employee/CustomerManagement/getCustomerList';
$route['employee/deleteCustomer/(:num)'] = 'employee/CustomerManagement/deleteCustomer/$i';
$route['employee/editCustomer/(:num)'] = 'employee/CustomerManagement/editCustomer/$i';
$route['employee/companyDetails/(:num)/(:num)'] = 'employee/EmployeeCompany/companyDetails/$i/$i';
$route['employee/groupList'] = 'employee/EmployeeCompany/companyListForEmp';
$route['employee/journal'] = 'employee/EmployeeJournal/companyJournalCreate';

/*=====================Employee Panel End=======================*/

/*=====================Comapny Panel Start=======================*/
$route['company'] 		= 'company/CompanyAuth';
$route['company/dashboard'] 	= 'company/CompanyDashboard/dashboardPage';
$route['company/companyList'] 	= 'company/EmployeeCompany/companyListForEmp';
$route['company/groupList'] 	= 'company/EmployeeCompany/companyListForEmp';

/*=====================Comapny Panel End=======================*/

