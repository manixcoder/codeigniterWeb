-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 28, 2018 at 08:27 AM
-- Server version: 5.6.39
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounts_bookeeper`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountAdmin`
--

CREATE TABLE `accountAdmin` (
  `adminId` int(11) NOT NULL,
  `mangerId` int(11) NOT NULL,
  `adminFirstName` varchar(255) NOT NULL,
  `adminLastName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPassword` text NOT NULL,
  `adminProfileImage` text NOT NULL,
  `adminPhoneNumber` varchar(15) NOT NULL,
  `adminAlternatePhoneNumber` varchar(255) NOT NULL,
  `adminAadharNumber` varchar(255) NOT NULL,
  `adminAadharImage` text NOT NULL,
  `adminPanNumber` varchar(255) NOT NULL,
  `adminPanImage` text NOT NULL,
  `managerResume` text NOT NULL,
  `adminAddress` text NOT NULL,
  `adminSex` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1 For male,2 For Female,3 For Trans gender',
  `adminUserType` enum('2','3') NOT NULL DEFAULT '2',
  `adminDOB` date NOT NULL,
  `is_Block` enum('true','false') NOT NULL DEFAULT 'false',
  `loginStatus` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = logOut ,1 = login',
  `adminCreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adminUpdatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountAdmin`
--

INSERT INTO `accountAdmin` (`adminId`, `mangerId`, `adminFirstName`, `adminLastName`, `adminEmail`, `adminPassword`, `adminProfileImage`, `adminPhoneNumber`, `adminAlternatePhoneNumber`, `adminAadharNumber`, `adminAadharImage`, `adminPanNumber`, `adminPanImage`, `managerResume`, `adminAddress`, `adminSex`, `adminUserType`, `adminDOB`, `is_Block`, `loginStatus`, `adminCreatedAt`, `adminUpdatedAt`) VALUES
(3, 0, 'werwe', 'werwe', 'werwe@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'uploads/managerPanImage/1.jpg', '234234234', '234234234', '23432', 'uploads/managerAadharImage/21.jpg', '3rwe', 'uploads/managerPanImage/31.jpg', 'uploads/managerResume/Resume1.docx', '324324', '1', '2', '2018-08-13', 'false', '0', '2018-08-27 17:52:47', '2018-08-27 17:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `accountCompanies`
--

CREATE TABLE `accountCompanies` (
  `id` int(11) NOT NULL,
  `mangerId` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `companyName` text NOT NULL,
  `companyEmail` text NOT NULL,
  `companyPassword` varchar(255) NOT NULL,
  `companyPhoneNumber` varchar(255) NOT NULL,
  `companyMobileNumber` varchar(255) NOT NULL,
  `companyGSTImage` text NOT NULL,
  `companyOthers` text NOT NULL,
  `companyLogo` varchar(255) NOT NULL,
  `companyWebSite` text NOT NULL,
  `companyGSTRegistrationType` text NOT NULL,
  `companyGSTINNumber` text NOT NULL,
  `companyAddress` text NOT NULL,
  `companyNotes` text NOT NULL,
  `companyTaxInfo_taxRegNo` text NOT NULL,
  `companyTaxInfo_CSTRegNo` text NOT NULL,
  `companyTaxInfo_PANNo` text NOT NULL,
  `companyRegNoImage` text NOT NULL,
  `companyPanCardImage` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountCompanies`
--

INSERT INTO `accountCompanies` (`id`, `mangerId`, `employeeId`, `companyName`, `companyEmail`, `companyPassword`, `companyPhoneNumber`, `companyMobileNumber`, `companyGSTImage`, `companyOthers`, `companyLogo`, `companyWebSite`, `companyGSTRegistrationType`, `companyGSTINNumber`, `companyAddress`, `companyNotes`, `companyTaxInfo_taxRegNo`, `companyTaxInfo_CSTRegNo`, `companyTaxInfo_PANNo`, `companyRegNoImage`, `companyPanCardImage`, `createdAt`, `updatedAt`) VALUES
(1, 1, 6, 'ew', 'wer@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '2341234', '', 'uploads/companyGSTImage/51.jpg', '', 'uploads/customerImage/17.jpg', '23423', 'TANBased', '23423', '23423', '', '23423', '', '23423', 'uploads/companyGSTImage/24.jpg', 'uploads/main/noprifile.png', '2018-08-27 16:14:46', '2018-08-27 16:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `accountCustomers`
--

CREATE TABLE `accountCustomers` (
  `custId` int(11) NOT NULL,
  `companyId` int(11) NOT NULL,
  `empId` varchar(255) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `customerEmail` varchar(255) NOT NULL,
  `customerPhone` varchar(255) NOT NULL,
  `customerCountry` varchar(225) NOT NULL,
  `customerAddress` text NOT NULL,
  `customerType` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1=Customer,2=Vendor,3=Both',
  `customerContact` text NOT NULL,
  `customerNumber` text NOT NULL,
  `customerFax` text NOT NULL,
  `customerPaymentTerms` text NOT NULL,
  `customerCurrency` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountCustomers`
--

INSERT INTO `accountCustomers` (`custId`, `companyId`, `empId`, `customerName`, `customerEmail`, `customerPhone`, `customerCountry`, `customerAddress`, `customerType`, `customerContact`, `customerNumber`, `customerFax`, `customerPaymentTerms`, `customerCurrency`) VALUES
(2, 2, '9', 'Vikesh', 'vikesh@gmail.com', '345345', '34543', '34543', '3', '43543', '34543', '43543', '34543', 'indianRupee'),
(3, 4, '9', 'Vikesh', 'vik@gmail.com', '34543534543', '', 'Phase 3B-2, Sector 60, Sahibzada Ajit Singh Nagar, Punjab 160059', '2', 'Deepak', '45645345', '34534534543', '45653', 'indianRupee'),
(5, 2, '3', 'Sidharth', 'shidh@gmail.co', '34543543534', '', 'trytry', '3', 'Pardeep', '67876666665', '67876', '567', 'indianRupee');

-- --------------------------------------------------------

--
-- Table structure for table `accountGroups`
--

CREATE TABLE `accountGroups` (
  `gpId` int(11) NOT NULL,
  `groupName` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountGroups`
--

INSERT INTO `accountGroups` (`gpId`, `groupName`, `createdAt`, `updatedAt`) VALUES
(1, 'Revenue', '2018-08-17 20:02:03', '2018-08-17 20:02:03'),
(2, 'Cost of goods sold', '2018-08-17 20:02:22', '2018-08-17 20:02:22'),
(3, 'Other revenue', '2018-08-17 20:02:46', '2018-08-17 20:02:46'),
(4, 'Expenses', '2018-08-17 20:03:00', '2018-08-17 20:03:00'),
(5, 'Bank and liquid assets', '2018-08-17 20:03:31', '2018-08-17 20:03:31'),
(6, 'Fixed assets', '2018-08-17 20:03:44', '2018-08-17 20:03:44'),
(7, 'Current liabilities', '2018-08-17 20:04:19', '2018-08-17 20:04:19'),
(8, 'Credit cards', '2018-08-17 20:04:34', '2018-08-17 20:04:34'),
(9, 'VAT Payable', '2018-08-17 20:04:58', '2018-08-17 20:04:58'),
(10, 'Non-current liabilities', '2018-08-17 20:05:43', '2018-08-17 20:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `accountPayment`
--

CREATE TABLE `accountPayment` (
  `payId` int(11) NOT NULL,
  `mangerId` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `compId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accountSuperAdmin`
--

CREATE TABLE `accountSuperAdmin` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `superUserName` varchar(255) NOT NULL,
  `sAdminEmail` varchar(255) NOT NULL,
  `sPassword` varchar(255) NOT NULL,
  `adminProfile` text NOT NULL,
  `userType` varchar(15) NOT NULL COMMENT 'userType form accountUserType',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountSuperAdmin`
--

INSERT INTO `accountSuperAdmin` (`id`, `firstName`, `lastName`, `superUserName`, `sAdminEmail`, `sPassword`, `adminProfile`, `userType`, `createdAt`) VALUES
(1, 'Super', 'Admin', 'superAdmin', 'sadmin@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'uploads/main/administrator.png', '1', '2018-07-25 20:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `accountTypes`
--

CREATE TABLE `accountTypes` (
  `ids` int(11) NOT NULL,
  `accountName` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `groupId` int(11) NOT NULL,
  `VAT_rate` int(11) NOT NULL,
  `accountNumber` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountTypes`
--

INSERT INTO `accountTypes` (`ids`, `accountName`, `description`, `groupId`, `VAT_rate`, `accountNumber`, `createdAt`, `updatedAt`) VALUES
(1, 'Manish', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 3, 14, '34543543', '2018-08-22 18:42:58', '2018-08-22 18:42:58'),
(2, 'ioui', 'uio', 3, 0, 'iuo', '2018-08-22 20:30:02', '2018-08-22 20:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `accountUserRole`
--

CREATE TABLE `accountUserRole` (
  `id` int(11) NOT NULL,
  `accountRole` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountUserRole`
--

INSERT INTO `accountUserRole` (`id`, `accountRole`, `createdAt`, `updatedAt`) VALUES
(1, 'superAdmin', '2018-07-25 20:09:03', '2018-07-25 20:09:03'),
(2, 'adminManager', '2018-07-25 20:09:03', '2018-08-03 20:49:45'),
(3, 'employee', '2018-07-25 20:46:13', '2018-07-25 20:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `attribute_value_id` text,
  `brand_id` text NOT NULL,
  `category_id` text NOT NULL,
  `store_id` int(11) NOT NULL,
  `availability` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `price`, `qty`, `image`, `description`, `attribute_value_id`, `brand_id`, `category_id`, `store_id`, `availability`) VALUES
(2, 'coke', 'coke12', '4234', '229', 'assets/images/product_image/5b71b7acc5206.jpg', '<p>234</p>', '[\"14\",\"15\"]', '[\"4\"]', '[\"4\"]', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountAdmin`
--
ALTER TABLE `accountAdmin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `accountCompanies`
--
ALTER TABLE `accountCompanies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accountCustomers`
--
ALTER TABLE `accountCustomers`
  ADD PRIMARY KEY (`custId`);

--
-- Indexes for table `accountGroups`
--
ALTER TABLE `accountGroups`
  ADD PRIMARY KEY (`gpId`);

--
-- Indexes for table `accountPayment`
--
ALTER TABLE `accountPayment`
  ADD PRIMARY KEY (`payId`);

--
-- Indexes for table `accountSuperAdmin`
--
ALTER TABLE `accountSuperAdmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accountTypes`
--
ALTER TABLE `accountTypes`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `accountUserRole`
--
ALTER TABLE `accountUserRole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountAdmin`
--
ALTER TABLE `accountAdmin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `accountCompanies`
--
ALTER TABLE `accountCompanies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accountCustomers`
--
ALTER TABLE `accountCustomers`
  MODIFY `custId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `accountGroups`
--
ALTER TABLE `accountGroups`
  MODIFY `gpId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `accountPayment`
--
ALTER TABLE `accountPayment`
  MODIFY `payId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accountSuperAdmin`
--
ALTER TABLE `accountSuperAdmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accountTypes`
--
ALTER TABLE `accountTypes`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `accountUserRole`
--
ALTER TABLE `accountUserRole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
