-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 12:34 PM
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
-- Database: `bookproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ISBN` varchar(30) NOT NULL,
  `BookTitle` varchar(100) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Edition` int(100) NOT NULL,
  `Year` year(4) NOT NULL,
  `Category` int(3) UNSIGNED ZEROFILL NOT NULL,
  `Reserved` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `CategoryDescription` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

CREATE TABLE `reserved` (
  `ISBN` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `ReservedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `Surname` varchar(30) NOT NULL,
  `AddressLine1` varchar(50) NOT NULL,
  `AddressLine2` varchar(50) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Telephone` varchar(10) NOT NULL,
  `Mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ISBN`),
  ADD UNIQUE KEY `Category` (`Category`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD UNIQUE KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `reserved`
--
ALTER TABLE `reserved`
  ADD PRIMARY KEY (`ISBN`,`Username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



INSERT INTO users 
VALUES 
('alanjmckenna', 't1234s', 'Alan', 'McKenna', '38 Cranley Road', 'Fairview', 'Dublin', '9998377', '856625567'),
('joecrotty', 'kj7899', 'Joeseph', 'Crotty', 'Apt 5 Clyde Road', 'Donnybrook', 'Dublin', '8887889', '876654456'),
('tommy100', '123456', 'tom', 'behan', '14 hyde road', 'dalkey', 'dublin', '9983747', '876738782');

INSERT INTO books
VALUES
('093-403992', 'Computers in Business', 'Alicia Oneill', 3, 1997, 003, 'N'),
('23472-8729', 'Exploring Peru', 'Stephanie Birchim', 4, 2005, 005, 'N'),
('237-34823', 'Business Strategy', 'Joe Peppard', 2, 2002, 002, 'N'),
('23u8-923849', 'A guide to nutrition', 'John Thorpe', 2, 1997, 001, 'N'),
('2983-3494', 'Cooking for children', 'Anabelle Sharpe', 1, 2003, 007, 'N'),
('82n8-308', 'computers for idiots', 'Susan O''Neill', 5, 1998, 004, 'N'),
('9823-23984', 'My life in picture', 'Kevin Graham', 8, 2004, 001, 'N'),
('9823-2403-0', 'DaVinci Code', 'Dan Brown', 1, 2003, 008, 'N'),
('98234-029384', 'My ranch in Texas', 'George Bush', 1, 2005, 001, 'Y'),
('9823-98345', 'How to cook Italian food', 'Jamie Oliver', 2, 2005, 007, 'Y'),
('9823-98487', 'Optimising your business', 'Cleo Blair', 1, 2001, 002, 'N'),
('988745-234', 'Tara Road', 'Maeve Binchy', 4, 2002, 008, 'N'),
('993-004-00', 'My life in bits', 'John Smith', 1, 2001, 001, 'N'),
('9987-0039882', 'Shooting History', 'Jon Snow', 1, 2003, 001, 'N');

INSERT INTO Category (CategoryDescription)
VALUES
('Health'),
('Business'),
('Biography'),
('Technology'),
('Travel'),
('Self-Help'),
('Cookery'),
('Fiction');

INSERT INTO reserved
VALUES
('98234-029384', 'joecrotty', '2008-10-11'),
('9823-98345', 'tommy100', '2008-10-11');



