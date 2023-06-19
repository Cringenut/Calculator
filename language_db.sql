-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 11:22 AM
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
-- Database: `language_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `field` varchar(255) NOT NULL,
  `polish` varchar(255) NOT NULL,
  `english` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`field`, `polish`, `english`) VALUES
('Title', 'Kalkulator finansowy', 'Financial calculator'),
('Calculator_loan', 'Kalkulator kredytowy', '\r\nLoan calculator'),
('Calculator_investment', 'Kalkulator lokat\r\n', 'Investment calculator'),
('Calculator_currency', 'Kalkulator walutowy\r\n', 'Exchange calculator'),
('Amount', 'Kwota', 'Amount'),
('Currency_from', 'Waluta z', 'Currency from'),
('Currency_to', 'Waluta na', 'Currency to'),
('Calculate', 'Oblicz', 'Calculate'),
('Loan_amount', 'Kwota kredytu', 'Loan amount'),
('Nominal_interest_rate\r\n', 'Oprocentowanie nominalne', 'Nominal interest rate\r\n'),
('Interest_rate', 'Oprocentowanie nominalne', 'Nominal interest rate'),
('Okres_kredytowania', 'Okres kredytowania (w latach)', 'Loan period (in years)'),
('Repayment_method', 'Sposób spłaty rat', 'Repayment method'),
('Equal_installments ', 'Równe raty', 'Equal installments '),
('Decreasing_installments', 'Malejące raty', 'Decreasing installments'),
('Investment_amount', 'Kwota inwestycji', 'Investment amount'),
('Interest_rate', 'Oprocentowanie nominalne', 'Interest rate'),
('Compounding_period', 'Okres kapitalizacji (w miesiącach)', 'Compounding period (in months)'),
('Investment_period', 'Okres inwestycji (w latach)', 'Investment period (in years)'),
('Monthly_payment', 'Miesięczna rata', 'Monthly payment'),
('Total_Interest', 'Całkowita kwota do spłaty', 'Total Interest'),
('Payment', 'Rata', 'Payment'),
('Future_value', 'Przyszła wartość inwestycji', 'Future value'),
('Converted_amount', 'Przeliczona kwota', 'Converted amount');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
