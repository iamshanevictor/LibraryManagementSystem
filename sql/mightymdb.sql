-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 09:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mightymdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` int(11) NOT NULL,
  `Product_Name` varchar(100) DEFAULT NULL,
  `PRODUCT_IMG` blob NOT NULL COMMENT 'IMAGE OF THE PRODUCT',
  `Product_Description` varchar(500) DEFAULT NULL,
  `Price` float(10,2) DEFAULT NULL,
  `Manufacturer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `PRODUCT_IMG`, `Product_Description`, `Price`, `Manufacturer`) VALUES
(3, 'Ferrari', 0x666572726172692e6a706567, 'Black Car', 10000.00, 'Mighty Mite'),
(18, 'ATV 300', 0x415456203330302e6a7067, 'All Terain Vehicle', 125.00, 'Mighty Mite'),
(19, 'Jeep', 0x3420776865656c20647269766520637275697365722e6a7067, '4 wheel drive cruiser', 245.00, 'Mighty Mite'),
(20, 'Roadster', 0x436c617373696320526f6164737465722e6a7067, 'Classic Roadster', 190.00, 'Mighty Mite');

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE `repair` (
  `Repair_ID` int(11) NOT NULL,
  `Product_ID` int(11) DEFAULT NULL,
  `Repair_Date` date DEFAULT NULL,
  `Repair_Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `EMPID` int(11) NOT NULL,
  `EMPNAME` varchar(60) NOT NULL,
  `EMPPOSITION` varchar(30) DEFAULT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PHONE_NUMBER` text NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `PASSWRD` text NOT NULL,
  `ACCSTATUS` varchar(5) NOT NULL DEFAULT 'NO',
  `EMPSEX` varchar(10) CHARACTER SET macce COLLATE macce_bin NOT NULL DEFAULT 'MALE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`EMPID`, `EMPNAME`, `EMPPOSITION`, `USERNAME`, `PHONE_NUMBER`, `ADDRESS`, `PASSWRD`, `ACCSTATUS`, `EMPSEX`) VALUES
(1, 'M L C', 'Administrator', 'marl@yahoo.com', '09088184442', 'Davao City, Calinan PRK 26', '356a192b7913b04c54574d18c28d46e6395428ab', 'YES', 'MALE'),
(14, 'joen degillo', 'Normal user', 'jo@yahoo.com', '0', 'Cebu', '5c2dd944dde9e08881bef0894fe7b22a5c9c4b06', 'YES', 'MALE'),
(27, 'kerby works', 'Normal user', 'eiuol06@gmail.com', '09874578462', 'Datu Abeng St.', 'fe5dbbcea5ce7e2988b8c69bcfdfde8904aabc1f', 'YES', 'MALE'),
(33, 'malun', 'Normal user', 'malun@gmail.com', '09874578462', 'Toril', '601f1889667efaebb33b8c12572835da3f027f78', 'YES', 'Male'),
(38, 'Sr. San Vicente', 'Normal user', 'tesoro@yahoo.com', '09874578462', 'Digos City', '1c6637a8f2e1f75e06ff9984894d6bd16a3a36a9', 'YES', 'Male'),
(41, 'Lorna Calimutan', 'Sales Staff', 'aparecelorna28@gmail.com', '09267567128', 'Datu Abeng St.', '32f84b95f0962c5807386fd0a8ec98d374b8983d', 'YES', 'FEMALE');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepts`
--

CREATE TABLE `tbldepts` (
  `DEPTID` int(11) NOT NULL,
  `DEPTNAME` text NOT NULL,
  `DEPTSHORTNAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbldepts`
--

INSERT INTO `tbldepts` (`DEPTID`, `DEPTNAME`, `DEPTSHORTNAME`) VALUES
(1, 'IT DEPARTMENTS', 'IT'),
(2, 'HR DEPARTMENT', 'HR'),
(3, 'TECHNICAL DEPARTMENT', 'TD'),
(4, 'FINANCE DEPARTMENT', 'FD'),
(5, 'SALES & MARKETING DEPARTMENT', 'SMD');

-- --------------------------------------------------------

--
-- Table structure for table `tblinventory`
--

CREATE TABLE `tblinventory` (
  `Inventory_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Unit_ID` int(11) NOT NULL,
  `Production_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblinventory`
--

INSERT INTO `tblinventory` (`Inventory_ID`, `Product_ID`, `Unit_ID`, `Production_Date`) VALUES
(1, 1231, 621497, '0000-00-00'),
(5, 100, 588116, '0000-00-00'),
(6, 123, 678165, '0000-00-00'),
(7, 0, 861986, '2023-05-06'),
(8, 666, 453150, '2023-05-07'),
(9, 42, 815256, '2023-05-07'),
(10, 12, 442725, '2023-05-08'),
(11, 12, 969423, '2023-05-08'),
(12, 2, 780986, '2023-05-08'),
(13, 3, 799980, '2023-05-22'),
(14, 10, 679137, '2023-05-22'),
(15, 3, 334467, '2023-05-23'),
(16, 3, 557299, '2023-05-23'),
(17, 3, 904629, '2023-05-23'),
(18, 3, 989720, '2023-05-23'),
(19, 4, 843999, '2023-05-23'),
(20, 3, 986203, '2023-05-26'),
(21, 3, 912868, '2023-05-28'),
(22, 20, 819280, '2023-05-28'),
(23, 3, 706497, '2023-05-28'),
(24, 3, 838021, '2023-05-28'),
(25, 3, 333450, '2023-05-28'),
(26, 3, 422033, '2023-05-28'),
(27, 3, 173903, '2023-05-28'),
(28, 20, 679474, '2023-05-28'),
(29, 18, 361469, '2023-05-28'),
(30, 19, 526993, '2023-05-28'),
(31, 3, 746821, '2023-05-28'),
(32, 3, 728305, '2023-05-28'),
(33, 3, 506185, '2023-05-28'),
(34, 18, 544831, '2023-05-28'),
(35, 3, 308074, '2023-05-28'),
(36, 3, 787521, '2023-05-28'),
(37, 3, 365683, '2023-05-28'),
(38, 3, 748194, '2023-05-28'),
(39, 3, 479725, '2023-05-28'),
(40, 3, 153550, '2023-05-28'),
(41, 3, 585714, '2023-05-28'),
(42, 3, 333129, '2023-05-28'),
(43, 3, 221193, '2023-05-28'),
(44, 3, 628168, '2023-05-28'),
(45, 3, 759429, '2023-05-28'),
(46, 3, 735361, '2023-05-28'),
(47, 18, 377959, '2023-05-28'),
(48, 20, 486951, '2023-05-28'),
(49, 3, 958272, '2023-05-28'),
(50, 3, 564148, '2023-05-28'),
(51, 3, 130332, '2023-05-28'),
(52, 3, 625550, '2023-05-28'),
(53, 3, 246277, '2023-05-28'),
(54, 3, 243723, '2023-05-28'),
(55, 3, 479562, '2023-05-28'),
(56, 3, 255606, '2023-05-28'),
(57, 3, 604931, '2023-05-28'),
(58, 19, 491741, '2023-05-28'),
(59, 3, 558662, '2023-05-28'),
(60, 3, 394829, '2023-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `Order_ID` int(11) NOT NULL,
  `Customer_ID` int(11) DEFAULT NULL,
  `SalStaff_ID` int(11) DEFAULT NULL,
  `Product_ID` int(11) NOT NULL,
  `Unit_ID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Order_Date` date DEFAULT NULL,
  `Order_Status` varchar(20) DEFAULT NULL,
  `Total_Amount` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`Order_ID`, `Customer_ID`, `SalStaff_ID`, `Product_ID`, `Unit_ID`, `Quantity`, `Order_Date`, `Order_Status`, `Total_Amount`) VALUES
(1, 33, 41, 12, 0, 0, '0000-00-00', 'APPROVED', 0.00),
(5, 123123123, 1, 12312, 0, 0, '0000-00-00', 'PENDING', 0.00),
(15, 123, 1, 123, 0, 0, '0000-00-00', 'PENDING', 0.00),
(17, 9999, 1, 666, 453150, 0, '2023-05-07', 'REJECTED', 0.00),
(18, 444, 1, 42, 0, 0, '0000-00-00', 'APPROVED', 0.00),
(19, 1, 1, 12, 442725, 0, '2023-05-08', 'PENDING', 0.00),
(20, 123, 1, 12, 969423, 0, '2023-05-08', 'PENDING', 0.00),
(21, 696969, 41, 2, 780986, 0, '2023-05-08', 'PENDING', 0.00),
(22, 38, 38, 3, 799980, 0, '2023-05-22', 'PENDING', 0.00),
(23, 38, 38, 10, 679137, 0, '2023-05-22', 'PENDING', 0.00),
(24, 111, 38, 3, 334467, 0, '2023-05-23', 'PENDING', 0.00),
(25, 123, 38, 3, 557299, 0, '2023-05-23', 'PENDING', 0.00),
(26, 123, 38, 3, 904629, 0, '2023-05-23', 'PENDING', 0.00),
(27, 99, 38, 3, 989720, 0, '2023-05-23', 'PENDING', 10000.00),
(28, 1, 38, 4, 843999, 0, '2023-05-23', 'PENDING', 2.00),
(29, 12, 41, 3, 986203, 0, '2023-05-26', 'PENDING', 10000.00),
(30, 38, 0, 3, 912868, 0, '2023-05-28', 'PENDING', 10000.00),
(31, 38, 0, 20, 819280, 0, '2023-05-28', 'PENDING', 190.00),
(32, 38, 0, 3, 706497, 0, '2023-05-28', 'PENDING', 10000.00),
(33, 38, 0, 3, 838021, 0, '2023-05-28', 'PENDING', 10000.00),
(34, 38, 0, 3, 333450, 0, '2023-05-28', 'PENDING', 10000.00),
(35, 38, 0, 3, 422033, 0, '2023-05-28', 'PENDING', 10000.00),
(36, 38, 0, 3, 173903, 0, '2023-05-28', 'PENDING', 10000.00),
(37, 38, 0, 20, 679474, 0, '2023-05-28', 'PENDING', 190.00),
(38, 38, 0, 18, 361469, 0, '2023-05-28', 'PENDING', 125.00),
(39, 38, 0, 19, 526993, 0, '2023-05-28', 'PENDING', 245.00),
(40, 38, 0, 3, 746821, 0, '2023-05-28', 'PENDING', 10000.00),
(41, 38, 0, 3, 728305, 0, '2023-05-28', 'PENDING', 10000.00),
(42, 38, 0, 3, 506185, 0, '2023-05-28', 'PENDING', 10000.00),
(43, 38, 0, 18, 544831, 0, '2023-05-28', 'PENDING', 125.00),
(44, 38, 0, 3, 308074, 0, '2023-05-28', 'PENDING', 10000.00),
(45, 38, 0, 3, 787521, 0, '2023-05-28', 'PENDING', 10000.00),
(46, 38, 0, 3, 365683, 0, '2023-05-28', 'PENDING', 10000.00),
(47, 38, 0, 3, 748194, 0, '2023-05-28', 'PENDING', 10000.00),
(48, 38, 0, 3, 479725, 0, '2023-05-28', 'PENDING', 10000.00),
(49, 38, 0, 3, 153550, 0, '2023-05-28', 'PENDING', 10000.00),
(50, 38, 0, 3, 585714, 0, '2023-05-28', 'PENDING', 10000.00),
(51, 38, 0, 3, 333129, 0, '2023-05-28', 'PENDING', 10000.00),
(52, 38, 0, 3, 221193, 0, '2023-05-28', 'PENDING', 10000.00),
(53, 38, 0, 3, 628168, 0, '2023-05-28', 'PENDING', 10000.00),
(54, 38, 0, 3, 759429, 0, '2023-05-28', 'PENDING', 10000.00),
(55, 38, 0, 3, 735361, 0, '2023-05-28', 'PENDING', 10000.00),
(56, 38, 0, 18, 377959, 0, '2023-05-28', 'PENDING', 125.00),
(57, 38, 0, 20, 486951, 0, '2023-05-28', 'PENDING', 190.00),
(58, 38, 0, 3, 958272, 0, '2023-05-28', 'PENDING', 10000.00),
(59, 38, 0, 3, 564148, 0, '2023-05-28', 'PENDING', 10000.00),
(60, 38, 0, 3, 130332, 0, '2023-05-28', 'PENDING', 10000.00),
(61, 38, 0, 3, 625550, 0, '2023-05-28', 'PENDING', 10000.00),
(62, 38, 0, 3, 246277, 0, '2023-05-28', 'PENDING', 10000.00),
(63, 38, 0, 3, 243723, 0, '2023-05-28', 'PENDING', 10000.00),
(64, 38, 0, 3, 479562, 0, '2023-05-28', 'PENDING', 0.00),
(65, 38, 0, 3, 255606, 0, '2023-05-28', 'PENDING', 30000.00),
(66, 38, 0, 3, 604931, 0, '2023-05-28', 'PENDING', 30000.00),
(67, 38, 0, 19, 491741, 10, '2023-05-28', 'PENDING', 2450.00),
(68, 21, 41, 3, 558662, 1, '2023-05-28', 'PENDING', 10000.00),
(69, 123, 41, 3, 394829, 5, '2023-05-28', 'PENDING', 50000.00);

-- --------------------------------------------------------

--
-- Table structure for table `tblproblem`
--

CREATE TABLE `tblproblem` (
  `Problem_ID` int(11) NOT NULL,
  `Label` varchar(11) NOT NULL,
  `Count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblproblem`
--

INSERT INTO `tblproblem` (`Problem_ID`, `Label`, `Count`) VALUES
(1, 'Engine', 0),
(4, 'Tire', 0),
(5, 'Frame', 0),
(6, 'Seat', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblrawmaterials`
--

CREATE TABLE `tblrawmaterials` (
  `Material_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  `Quantity` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblrawmaterials`
--

INSERT INTO `tblrawmaterials` (`Material_ID`, `Name`, `Supplier_ID`, `Quantity`) VALUES
(2, 'Frame', 4, 200),
(3, 'Tire', 7, 100),
(4, 'Seat', 5, 300);

-- --------------------------------------------------------

--
-- Table structure for table `tblreport`
--

CREATE TABLE `tblreport` (
  `LEAVEID` int(11) NOT NULL,
  `EMPID` varchar(30) NOT NULL,
  `DATESTART` date NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `PROBLEM` text NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `LEAVESTATUS` varchar(30) NOT NULL,
  `ADMINREMARKS` text NOT NULL,
  `DATEPOSTED` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblreport`
--

INSERT INTO `tblreport` (`LEAVEID`, `EMPID`, `DATESTART`, `PRODUCT_ID`, `PROBLEM`, `DESCRIPTION`, `LEAVESTATUS`, `ADMINREMARKS`, `DATEPOSTED`) VALUES
(29, '38', '2023-05-25', 1, 'Tire', 'Flat', 'APPROVED', 'Noted, For tire replacement ASAP.', '2023-05-26'),
(30, '38', '2023-05-26', 0, 'Engine', 'Failure sheez', 'REJECTED', 'Trash bwahaha', '2023-05-28'),
(31, '38', '2023-04-30', 10, 'Seat', 'Has a hole huhu', 'REJECTED', 'N/A', '2023-05-26'),
(32, '38', '2023-05-30', 10, 'Seat', 'Color mismatch', 'PENDING', 'N/A', '2023-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `tblsupplier`
--

CREATE TABLE `tblsupplier` (
  `Supplier_ID` int(11) NOT NULL,
  `Supplier_Name` varchar(255) NOT NULL,
  `Supplier_Address` varchar(255) NOT NULL,
  `Supplier_PhoneNumber` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsupplier`
--

INSERT INTO `tblsupplier` (`Supplier_ID`, `Supplier_Name`, `Supplier_Address`, `Supplier_PhoneNumber`) VALUES
(5, 'Motoscoot', 'Japan', 661122),
(6, 'Mazda', 'Europe', 909090909),
(7, 'JRP', 'Thailand', 221133),
(8, 'Pirelli', 'Italy', 2147483647),
(9, 'SpaceX', 'America', 66772);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`Repair_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`EMPID`);

--
-- Indexes for table `tbldepts`
--
ALTER TABLE `tbldepts`
  ADD PRIMARY KEY (`DEPTID`);

--
-- Indexes for table `tblinventory`
--
ALTER TABLE `tblinventory`
  ADD PRIMARY KEY (`Inventory_ID`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `tblproblem`
--
ALTER TABLE `tblproblem`
  ADD PRIMARY KEY (`Problem_ID`);

--
-- Indexes for table `tblrawmaterials`
--
ALTER TABLE `tblrawmaterials`
  ADD PRIMARY KEY (`Material_ID`);

--
-- Indexes for table `tblreport`
--
ALTER TABLE `tblreport`
  ADD PRIMARY KEY (`LEAVEID`);

--
-- Indexes for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  ADD PRIMARY KEY (`Supplier_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `repair`
--
ALTER TABLE `repair`
  MODIFY `Repair_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `EMPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbldepts`
--
ALTER TABLE `tbldepts`
  MODIFY `DEPTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblinventory`
--
ALTER TABLE `tblinventory`
  MODIFY `Inventory_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tblproblem`
--
ALTER TABLE `tblproblem`
  MODIFY `Problem_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblrawmaterials`
--
ALTER TABLE `tblrawmaterials`
  MODIFY `Material_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblreport`
--
ALTER TABLE `tblreport`
  MODIFY `LEAVEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  MODIFY `Supplier_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
