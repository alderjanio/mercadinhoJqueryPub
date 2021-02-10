-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Fev-2021 às 04:41
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mercadinho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbluser`
--

CREATE TABLE `tbluser` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_cpf` varchar(20) NOT NULL,
  `user_password` varchar(70) NOT NULL,
  `user_fone` varchar(20) NOT NULL,
  `user_level` int(11) NOT NULL,
  `user_limit` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbluser`
--

INSERT INTO `tbluser` (`user_id`, `user_name`, `user_cpf`, `user_password`, `user_fone`, `user_level`, `user_limit`) VALUES
(1, 'Alderjanio', '86288954268', '123', '92 99120-0872', 0, '0.00'),
(4, 'Alderjanio Almeida', '77788899900', '92 991200872', '202cb962ac59075b964b', 2, '50.00'),
(5, 'Enisson Freitas', '11122233334', '92 991111111', '202cb962ac59075b964b', 2, '50.00'),
(10, 'Enisson Freitas', '11122233311', '92 991111111', '202cb962ac59075b964b', 2, '50.00'),
(11, 'Enisson Freitas', '11122233322', '92 991111111', '202cb962ac59075b964b', 2, '50.00'),
(33, 'Enisson Freitas', '11122233399', '92 991111111', '202cb962ac59075b964b', 2, '50.00'),
(57, 'Enisson Freitas', '11122233333', '92 991111111', '202cb962ac59075b964b', 2, '50.00'),
(60, 'Enisson Freitas', '11122233355', '92 991111156', '202cb962ac59075b964b', 2, '50.00'),
(61, 'Enisson Freitas', '11122233357', '92 991111156', '202cb962ac59075b964b', 2, '50.00'),
(64, 'Enisson Freitas', '111222333567', '92 991111156', '202cb962ac59075b964b', 2, '50.00'),
(65, 'Enisson Freitas', '111222333568', '92 991111156', '202cb962ac59075b964b', 2, '50.00'),
(68, 'Enisson Freitas', '111222333560', '92 991111156', '202cb962ac59075b964b', 2, '50.00'),
(70, 'Jessica Almeida', '11122233312', '9128383838', '202cb962ac59075b964b', 2, '50.00'),
(71, 'Jessica Almeida', '11211211212', '202cb962ac59075b964b07152d234b70', '9128383838', 2, '50.00'),
(72, 'Alberto', '12312312312', '202cb962ac59075b964b07152d234b70', '9128383838', 2, '50.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_compra`
--

CREATE TABLE `tbl_compra` (
  `compra_id` int(11) NOT NULL,
  `id_nf` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_lote` int(11) NOT NULL,
  `compra_price` decimal(10,2) NOT NULL,
  `compra_quantity` int(11) NOT NULL,
  `compra_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_compra`
--

INSERT INTO `tbl_compra` (`compra_id`, `id_nf`, `id_user`, `id_lote`, `compra_price`, `compra_quantity`, `compra_status`) VALUES
(2, 47, 1, 1, '4.90', 0, 2),
(3, 47, 1, 4, '20.00', 0, 2),
(4, 47, 1, 1, '4.90', 0, 2),
(5, 47, 1, 2, '20.00', 0, 2),
(6, 47, 1, 1, '4.90', 0, 2),
(7, 47, 1, 1, '4.90', 0, 2),
(8, 47, 1, 1, '4.90', 0, 2),
(9, 47, 1, 4, '20.00', 0, 2),
(10, 47, 1, 6, '30.00', 0, 2),
(11, 47, 1, 6, '30.00', 0, 2),
(12, 1, 2, 1, '4.90', 0, 1),
(13, 1, 2, 4, '20.00', 0, 1),
(14, 1, 2, 6, '30.00', 0, 1),
(15, 47, 1, 6, '30.00', 0, 2),
(16, 58, 1, 1, '4.90', 0, 2),
(17, 58, 1, 4, '20.00', 0, 2),
(18, 48, 68, 1, '4.90', 0, 2),
(19, 48, 68, 4, '20.00', 0, 2),
(20, 48, 68, 6, '30.00', 0, 2),
(21, 49, 68, 1, '4.90', 0, 2),
(22, 49, 68, 4, '20.00', 0, 2),
(23, 49, 68, 4, '20.00', 0, 2),
(24, 49, 68, 4, '20.00', 0, 2),
(25, 50, 68, 6, '30.00', 0, 2),
(26, 50, 68, 4, '20.00', 0, 2),
(27, 51, 68, 1, '4.90', 0, 2),
(28, 51, 68, 6, '30.00', 0, 2),
(29, 52, 68, 6, '30.00', 0, 2),
(30, 52, 68, 4, '20.00', 0, 2),
(31, 53, 68, 1, '4.90', 0, 2),
(32, 54, 68, 1, '4.90', 0, 2),
(33, 0, 68, 4, '20.00', 0, 2),
(34, 0, 68, 2, '20.00', 0, 2),
(36, 59, 1, 4, '20.00', 0, 2),
(37, 59, 1, 4, '20.00', 0, 2),
(38, 59, 1, 1, '4.90', 0, 2),
(39, 60, 1, 1, '4.90', 0, 2),
(40, 60, 1, 1, '4.90', 0, 2),
(41, 60, 1, 6, '30.00', 0, 2),
(42, 60, 1, 4, '20.00', 0, 2),
(46, 61, 1, 1, '4.90', 0, 2),
(48, 62, 1, 1, '4.90', 0, 2),
(50, 63, 1, 2, '20.00', 0, 2),
(51, 64, 1, 6, '30.00', 0, 2),
(52, 64, 1, 4, '20.00', 0, 2),
(53, 64, 1, 2, '20.00', 0, 2),
(55, 65, 1, 11, '5.00', 0, 2),
(56, 66, 1, 17, '3.00', 0, 2),
(57, 66, 1, 16, '12.60', 0, 2),
(59, 67, 1, 11, '5.00', 0, 2),
(60, 67, 1, 16, '12.60', 0, 2),
(61, 67, 1, 8, '6.00', 0, 2),
(62, 67, 1, 11, '5.00', 0, 2),
(84, 68, 1, 8, '6.00', 4, 2),
(85, 68, 1, 11, '5.00', 4, 2),
(86, 68, 1, 16, '12.60', 3, 2),
(87, 69, 1, 8, '6.00', 2, 2),
(88, 69, 1, 13, '5.00', 3, 2),
(90, 70, 1, 11, '5.00', 5, 2),
(91, 70, 1, 11, '5.00', 3, 2),
(100, 71, 1, 13, '5.00', 5, 2),
(101, 71, 1, 8, '6.00', 5, 2),
(102, 72, 1, 8, '6.00', 5, 2),
(103, 72, 1, 13, '5.00', 3, 2),
(105, 73, 1, 13, '5.00', 2, 2),
(108, 1, 70, 8, '6.00', 3, 1),
(109, 1, 70, 13, '5.00', 3, 1),
(110, 74, 71, 13, '5.00', 4, 2),
(111, 74, 71, 8, '6.00', 4, 2),
(114, 1, 72, 8, '6.00', 2, 1),
(115, 1, 72, 8, '6.00', 4, 1),
(116, 1, 72, 19, '6.23', 4, 1),
(117, 1, 72, 18, '8.00', 6, 1),
(118, 1, 72, 20, '8.50', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_extrato`
--

CREATE TABLE `tbl_extrato` (
  `extrato_id` int(11) NOT NULL,
  `extrato_id_user` int(11) NOT NULL,
  `extrato_value` decimal(10,2) NOT NULL,
  `extrato_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_extrato`
--

INSERT INTO `tbl_extrato` (`extrato_id`, `extrato_id_user`, `extrato_value`, `extrato_data`) VALUES
(1, 1, '100.00', '2021-02-02 15:39:44'),
(2, 1, '-10.00', '2021-02-03 03:36:02'),
(3, 1, '-10.00', '2021-02-03 04:02:36'),
(4, 1, '-10.00', '2021-02-03 17:13:43'),
(5, 1, '-10.00', '2021-02-03 17:20:21'),
(6, 10, '200.00', '2021-02-05 02:53:02'),
(7, 11, '300.00', '2021-02-05 02:53:02'),
(8, 68, '124.23', '2021-02-06 18:36:46'),
(9, 68, '45.00', '2021-02-06 18:37:57'),
(10, 68, '34.00', '2021-02-06 18:39:28'),
(11, 68, '45.00', '2021-02-06 18:41:59'),
(12, 68, '23.00', '2021-02-06 18:43:52'),
(13, 68, '50.00', '2021-02-06 18:45:17'),
(14, 68, '10.00', '2021-02-06 18:50:08'),
(15, 68, '-4.90', '2021-02-06 19:27:44'),
(16, 68, '18.10', '2021-02-06 19:28:02'),
(17, 68, '-20.00', '2021-02-06 19:28:13'),
(18, 68, '3.00', '2021-02-06 19:28:27'),
(19, 1, '40.10', '2021-02-06 19:28:33'),
(20, 68, '-20.00', '2021-02-06 19:28:41'),
(21, 1, '-24.90', '2021-02-06 19:28:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_lote`
--

CREATE TABLE `tbl_lote` (
  `lote_id` int(11) NOT NULL,
  `lote_nome` varchar(30) NOT NULL,
  `lote_describle` varchar(40) NOT NULL,
  `lote_pricebuy` decimal(10,2) NOT NULL,
  `lote_price` decimal(10,2) NOT NULL,
  `lote_amount` int(11) NOT NULL,
  `lote_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_lote`
--

INSERT INTO `tbl_lote` (`lote_id`, `lote_nome`, `lote_describle`, `lote_pricebuy`, `lote_price`, `lote_amount`, `lote_data`) VALUES
(8, 'Arroz', 'Blue Ville 1 kg', '5.00', '6.00', 3, '2021-01-25 15:51:37'),
(11, 'CafÃ©', 'Santa Clara, 250 g', '4.00', '5.00', -2, '2021-01-25 16:12:03'),
(13, 'CafÃ©', 'Santa Clara, 250 g', '4.00', '5.00', 7, '2021-01-25 16:18:53'),
(14, '', '', '5.56', '5.56', 0, '2021-01-25 17:00:31'),
(15, '', '', '0.00', '0.00', 0, '2021-01-25 19:24:23'),
(16, 'Leite', 'duleite, 400 g', '10.50', '12.60', 5, '2021-01-25 19:39:15'),
(17, 'AÃ§ucar', 'Itamaraty, 1 kg', '2.50', '3.00', 29, '2021-01-25 19:39:48'),
(18, 'Ã“leo', 'soya, 900ml', '7.00', '8.00', 4, '2021-01-25 19:48:38'),
(19, 'Arroz', 'Blue Ville, Parborizado 1 kg', '5.19', '6.23', 26, '2021-02-03 18:15:00'),
(20, 'Ã“leo', 'soya, 900ml', '7.50', '8.50', 22, '2021-02-03 18:16:51');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_nf`
--

CREATE TABLE `tbl_nf` (
  `nf_id` int(11) NOT NULL,
  `nf_price` decimal(10,2) NOT NULL,
  `nf_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nf_status` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_nf`
--

INSERT INTO `tbl_nf` (`nf_id`, `nf_price`, `nf_data`, `nf_status`, `id_user`) VALUES
(48, '54.90', '2021-01-22 02:47:05', 2, 68),
(49, '64.90', '2021-01-22 02:47:54', 2, 68),
(50, '50.00', '2021-01-22 02:52:16', 2, 68),
(51, '34.90', '2021-01-22 02:56:01', 2, 68),
(52, '50.00', '2021-01-22 02:56:50', 2, 68),
(53, '4.90', '2021-01-22 02:57:18', 2, 68),
(54, '4.90', '2021-01-22 02:57:28', 2, 68),
(55, '20.00', '2021-01-22 03:00:44', 2, 68),
(56, '20.00', '2021-01-22 03:01:05', 2, 68),
(57, '20.00', '2021-01-22 03:02:11', 2, 68),
(58, '24.90', '2021-01-22 14:51:55', 2, 1),
(59, '44.90', '2021-01-23 02:14:14', 1, 1),
(60, '59.80', '2021-01-23 02:15:17', 1, 1),
(61, '4.90', '2021-01-23 23:44:35', 2, 1),
(62, '4.90', '2021-01-23 23:45:25', 1, 1),
(63, '20.00', '2021-01-24 00:22:02', 1, 1),
(64, '70.00', '2021-01-24 02:46:32', 1, 1),
(65, '5.00', '2021-01-25 19:35:24', 1, 1),
(66, '15.60', '2021-01-25 19:40:16', 1, 1),
(67, '28.60', '2021-01-25 20:06:47', 1, 1),
(68, '23.60', '2021-01-26 03:53:04', 1, 1),
(69, '27.00', '2021-01-26 03:56:54', 1, 1),
(70, '40.00', '2021-01-26 19:35:31', 1, 1),
(71, '55.00', '2021-01-26 21:32:31', 1, 1),
(72, '45.00', '2021-02-02 02:22:37', 1, 1),
(73, '10.00', '2021-02-03 00:32:06', 2, 1),
(74, '44.00', '2021-02-03 03:59:11', 1, 71),
(75, '200.00', '2021-02-05 02:54:02', 1, 10),
(76, '230.00', '2021-02-05 02:54:02', 1, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_cpf` (`user_cpf`);

--
-- Indexes for table `tbl_compra`
--
ALTER TABLE `tbl_compra`
  ADD PRIMARY KEY (`compra_id`);

--
-- Indexes for table `tbl_extrato`
--
ALTER TABLE `tbl_extrato`
  ADD PRIMARY KEY (`extrato_id`);

--
-- Indexes for table `tbl_lote`
--
ALTER TABLE `tbl_lote`
  ADD PRIMARY KEY (`lote_id`);

--
-- Indexes for table `tbl_nf`
--
ALTER TABLE `tbl_nf`
  ADD PRIMARY KEY (`nf_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_compra`
--
ALTER TABLE `tbl_compra`
  MODIFY `compra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `tbl_extrato`
--
ALTER TABLE `tbl_extrato`
  MODIFY `extrato_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_lote`
--
ALTER TABLE `tbl_lote`
  MODIFY `lote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_nf`
--
ALTER TABLE `tbl_nf`
  MODIFY `nf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
