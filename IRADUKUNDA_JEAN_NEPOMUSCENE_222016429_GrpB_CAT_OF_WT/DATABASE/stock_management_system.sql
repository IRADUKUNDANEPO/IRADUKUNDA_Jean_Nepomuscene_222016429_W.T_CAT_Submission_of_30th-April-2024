-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 09:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_Number` varchar(10) NOT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_Id`, `Product_Id`, `Name`, `Email`, `Phone_Number`, `Gender`) VALUES
(1, 3, 'nepomuscene', 'nel@gmail.com', '0737200111', 'Male'),
(3, 9, 'fdfdsfd', 'nepoiradukunda69@gmail.com', '798899955', 'Male'),
(4, 15, 'Fidele Maniriho', 'manifizo@gmail.com', '783211220', 'Male'),
(5, 2, 'Angelique ', 'angel@gmail.com', '732221117', 'Female'),
(7, 6, 'Benithe Uwera', 'uwerben@gmail.com', '788844455', 'Female'),
(8, 14, 'Kagabo', 'kagab@gmail.com', '793211098', 'Male'),
(9, 8, 'Melandine', 'melnd@gmail.com', '732221111', 'Female'),
(10, 8, 'Fiona ANITHA', 'anithafio@gmail.com', '7985664332', 'Female'),
(11, 12, 'Munyaneza', 'munez@gmail.com', '7298887773', 'Male'),
(12, 9, 'fifi', 'iraharicher@gmail.com', '788888888', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_Id` int(11) NOT NULL,
  `Customer_Id` int(11) NOT NULL,
  `Order_Date` date NOT NULL,
  `Total_Amount` float NOT NULL,
  `Order_Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_Id`, `Customer_Id`, `Order_Date`, `Total_Amount`, `Order_Status`) VALUES
(10, 1, '2024-04-24', 5500, 'Completed'),
(12, 3, '2024-04-17', 120000, 'Pending'),
(13, 11, '2023-09-22', 50000, 'Processing'),
(14, 5, '2022-08-10', 150000, 'Delivered'),
(15, 9, '2023-03-10', 80000, 'Shipped'),
(16, 8, '2024-04-03', 200000, 'Delivered'),
(17, 11, '2023-09-20', 666000, 'Pendings'),
(18, 7, '2024-04-25', 1100000, 'Delivering'),
(19, 11, '2024-04-10', 444, 'wertg'),
(20, 1, '2023-02-01', 876, 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_Id` int(11) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Product_Desciption` varchar(257) NOT NULL,
  `Product_Price` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_Id`, `Product_Name`, `Product_Desciption`, `Product_Price`) VALUES
(1, 'Laptop', '15.6\" Full HD, Intel Core i7, 16GB RAM, 512GB SSD', '100000'),
(2, 'Printer', 'Equipment used to printing papers or documents', '500000.00'),
(3, 'Telephone', 'Used to call and send sms from one person to another.', '70,000'),
(4, 'Rice', 'Food which to eaten by many children and like it.', '12,000.00'),
(6, 'sweat potatoes', 'Food which to eaten by many children and like it.', '450000'),
(8, 'Camera', '24MP, 4K video recording, Wi-Fi connectivity', '1208000'),
(9, 'Smartphone', '6.5\" AMOLED Display, Snapdragon 888, 12GB RAM, 256GB Storage', '400000'),
(12, 'Matress', 'Used for sleeping well all night.', '90000'),
(14, 'Headphones', 'Noise-canceling, Bluetooth 5.0, 30-hour battery life', '15000.00'),
(15, 'Smartwatch', '24MP, 4K video recording, Wi-Fi connectivity', '80000.00'),
(25, 'tomato', 'is food', '600000'),
(27, 'computer', 'are device of electronics used to store data and display output.', '700000'),
(28, 'radio', 'device used to get news', '230000'),
(29, 'beans', 'is body building food', '2000'),
(30, 'tomato', 'is food', '600000'),
(31, 'papers', 'written in documentation', '250000'),
(32, 'Router', 'is electronic device to connect computers with wifi ', '51000000'),
(33, 'banana', 'it is food likjed by child', '60000'),
(44, 'note book', 'used to write document and store information', '3333333'),
(45, 'Microphone', 'device used to speak loaudly', '750000'),
(47, 'Mouse', ' AMOLED Display, Snapdragon 888, 12GB RAM, 256GB Storage', '335000');

-- --------------------------------------------------------

--
-- Table structure for table `stock_in`
--

CREATE TABLE `stock_in` (
  `StockIn_Id` int(11) NOT NULL,
  `Stock_Transaction_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Transaction_date` date NOT NULL,
  `Quantity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_in`
--

INSERT INTO `stock_in` (`StockIn_Id`, `Stock_Transaction_Id`, `Product_Id`, `Transaction_date`, `Quantity`) VALUES
(2, 24, 9, '2024-05-08', 50),
(3, 11, 2, '2023-10-24', 550),
(4, 22, 15, '2023-06-07', 450),
(5, 8, 6, '2024-04-09', 3447),
(6, 7, 14, '2024-04-12', 890),
(7, 23, 2, '2022-02-16', 3221),
(8, 11, 12, '2021-03-11', 875),
(10, 2, 6, '2022-01-07', 9085),
(11, 8, 3, '2019-06-05', 557),
(12, 23, 9, '2024-05-08', 2345);

-- --------------------------------------------------------

--
-- Table structure for table `stock_out`
--

CREATE TABLE `stock_out` (
  `StockOut_Id` int(11) NOT NULL,
  `Stock_Transaction_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Customer_Id` int(11) NOT NULL,
  `Transaction_date` date NOT NULL,
  `Quantity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_out`
--

INSERT INTO `stock_out` (`StockOut_Id`, `Stock_Transaction_Id`, `Product_Id`, `Customer_Id`, `Transaction_date`, `Quantity`) VALUES
(2, 2, 14, 1, '2024-04-25', 500),
(3, 5, 4, 8, '2023-01-04', 7899),
(4, 22, 2, 4, '2024-04-22', 4556),
(5, 7, 9, 11, '2022-08-18', 4556),
(6, 11, 12, 9, '2021-09-30', 15900),
(7, 23, 15, 7, '2022-05-22', 33444),
(8, 7, 8, 4, '2020-07-31', 111000),
(10, 23, 4, 11, '2021-10-23', 8743);

-- --------------------------------------------------------

--
-- Table structure for table `stock_transaction`
--

CREATE TABLE `stock_transaction` (
  `Stock_Transaction_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Transaction_Type` varchar(60) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Transaction_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_transaction`
--

INSERT INTO `stock_transaction` (`Stock_Transaction_Id`, `Product_Id`, `Transaction_Type`, `Quantity`, `Transaction_Date`) VALUES
(2, 15, 'Delivering to Customers', 50008, '2024-04-04'),
(5, 15, 'Shippings', 54, '2024-01-02'),
(7, 6, 'Customer Shipments', 10000, '2024-04-29'),
(8, 9, 'Goods Receipt', 75, '2024-04-18'),
(11, 14, 'purchase', 3333333, '2024-04-03'),
(22, 3, 'Adjustment', 7000, '2023-11-30'),
(23, 2, 'Stock Transfers', 50000, '2024-03-15'),
(24, 6, 'Inventory Revaluation', 800, '2023-03-29'),
(25, 2, 'rrrrrr', 555, '2024-05-08'),
(26, 9, 'Sale products', 77, '2023-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Supplier_Name` varchar(50) NOT NULL,
  `Supplier_Address` varchar(235) NOT NULL,
  `Supplier_Contact` varchar(25) NOT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_Id`, `Product_Id`, `Supplier_Name`, `Supplier_Address`, `Supplier_Contact`, `Gender`) VALUES
(1, 2, 'Gad', 'Kigali', '0788888888', 'Male'),
(3, 12, 'John', 'Nyaruguru', '0783211220', 'Male'),
(4, 12, 'Rutayisire', 'Nyabugogo', '0723338888', 'Male'),
(6, 14, 'Emerithe', 'Rwaza', '07854443333', 'Female'),
(7, 3, 'Valantine Uwayezu', 'Gatsibo', '0793211098', 'Female'),
(8, 9, 'Claude', 'Rubavu', '0798899955', 'Male'),
(9, 6, 'Betty Uwase', 'Nyagatare', '079554444333', 'Female'),
(10, 6, 'Gad', 'Rubavu', '0793211098', 'Male'),
(11, 6, 'birimo', 'Kigali', '0788888888', 'Male'),
(12, 15, 'jjj', 'jjkj', '0998789', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Firstname` varchar(50) DEFAULT NULL,
  `Lastname` varchar(50) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Activation_code` varchar(50) DEFAULT NULL,
  `Is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Firstname`, `Lastname`, `Username`, `Gender`, `Email`, `Telephone`, `Password`, `Creationdate`, `Activation_code`, `Is_activated`) VALUES
(3, 'Iraguha', 'Jean Paul', 'IRAGUHAJ', 'male', 'iraguhajnpaul@gmail.com', '0788899922', '$2y$10$l3xRVQAxi8YSsHF2P6RQtON9wiGzKLpFLae0r7V/yZuqpCtyEfXBi', '2024-04-08 06:50:31', '55566', 0),
(4, 'IRADUKUNDA', 'Jean Nepo', 'IRADUKUNDANEPO69', 'male', 'nepoiradukunda69@gmail.com', '0729198022', '$2y$10$4UxRijzYMWL13IOfiCPwaeL.mS2x5KOrROtlXYgOctEmbZmyQQdqu', '2024-04-08 07:35:21', '774433', 0),
(5, 'Nepo', 'Iradu', 'nepo69', 'male', 'iradukundajeannepomuscene5@gmail.com', '0784533222', '$2y$10$LDw0JPQ49bcr05vyRq9SCurZULwCo52GV9kSMBsa6Lq4nqnaZbuT6', '2024-04-08 07:58:31', '999000', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_Id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_Id`),
  ADD KEY `Customer_Id` (`Customer_Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_Id`);

--
-- Indexes for table `stock_in`
--
ALTER TABLE `stock_in`
  ADD PRIMARY KEY (`StockIn_Id`),
  ADD KEY `Stock_Transaction_Id` (`Stock_Transaction_Id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `stock_out`
--
ALTER TABLE `stock_out`
  ADD PRIMARY KEY (`StockOut_Id`),
  ADD KEY `Stock_Transaction_Id` (`Stock_Transaction_Id`),
  ADD KEY `Product_Id` (`Product_Id`),
  ADD KEY `Customer_Id` (`Customer_Id`);

--
-- Indexes for table `stock_transaction`
--
ALTER TABLE `stock_transaction`
  ADD PRIMARY KEY (`Stock_Transaction_Id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier_Id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `stock_in`
--
ALTER TABLE `stock_in`
  MODIFY `StockIn_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stock_out`
--
ALTER TABLE `stock_out`
  MODIFY `StockOut_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stock_transaction`
--
ALTER TABLE `stock_transaction`
  MODIFY `Stock_Transaction_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Supplier_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Customer_Id`) REFERENCES `customer` (`Customer_Id`);

--
-- Constraints for table `stock_in`
--
ALTER TABLE `stock_in`
  ADD CONSTRAINT `stock_in_ibfk_1` FOREIGN KEY (`Stock_Transaction_Id`) REFERENCES `stock_transaction` (`Stock_Transaction_Id`),
  ADD CONSTRAINT `stock_in_ibfk_2` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`);

--
-- Constraints for table `stock_out`
--
ALTER TABLE `stock_out`
  ADD CONSTRAINT `stock_out_ibfk_1` FOREIGN KEY (`Stock_Transaction_Id`) REFERENCES `stock_transaction` (`Stock_Transaction_Id`),
  ADD CONSTRAINT `stock_out_ibfk_2` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`),
  ADD CONSTRAINT `stock_out_ibfk_3` FOREIGN KEY (`Customer_Id`) REFERENCES `customer` (`Customer_Id`);

--
-- Constraints for table `stock_transaction`
--
ALTER TABLE `stock_transaction`
  ADD CONSTRAINT `stock_transaction_ibfk_1` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
