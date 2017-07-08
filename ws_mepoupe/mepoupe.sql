-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 04-Jun-2017 às 22:14
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mepoupe`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `goal`
--

CREATE TABLE `goal` (
  `id` int(11) NOT NULL,
  `name_goal` varchar(250) NOT NULL,
  `total_value` double NOT NULL,
  `value_economy` double NOT NULL,
  `id_user` varchar(250) NOT NULL,
  `date_insert` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `goal`
--

INSERT INTO `goal` (`id`, `name_goal`, `total_value`, `value_economy`, `id_user`, `date_insert`) VALUES
(12, 'roupas', 90, 90, '4', '2017-06-04 21:35:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `input`
--

CREATE TABLE `input` (
  `id` int(11) NOT NULL,
  `id_user` int(255) NOT NULL,
  `value` double NOT NULL,
  `date` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `input`
--

INSERT INTO `input` (`id`, `id_user`, `value`, `date`, `category`, `description`) VALUES
(3, 4, 1000, '2017/5/4', 'Salário', 'salario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `output`
--

CREATE TABLE `output` (
  `id` int(11) NOT NULL,
  `id_user` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `value` double NOT NULL,
  `date` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `id_goal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `output`
--

INSERT INTO `output` (`id`, `id_user`, `description`, `value`, `date`, `category`, `id_goal`) VALUES
(3, 4, 'roupas', 90, '2017/5/4', 'Contas', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  `date_update` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `age`, `email`, `pass`, `date`, `date_update`) VALUES
(4, 'Eduardo Petreca', 24, 'eduardopetreca@gmail.com', 'nick0606', '2017-06-04 06:32:14', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goal`
--
ALTER TABLE `goal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `input`
--
ALTER TABLE `input`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `output`
--
ALTER TABLE `output`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goal`
--
ALTER TABLE `goal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `input`
--
ALTER TABLE `input`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `output`
--
ALTER TABLE `output`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
