-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19/10/2024 às 16:08
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ferramentas`
--

DROP TABLE IF EXISTS `ferramentas`;
CREATE TABLE IF NOT EXISTS `ferramentas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ferramenta` varchar(100) COLLATE utf8mb3_bin NOT NULL,
  `obra` varchar(100) COLLATE utf8mb3_bin NOT NULL,
  `data_locacao` date NOT NULL,
  `loja` varchar(220) COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Despejando dados para a tabela `ferramentas`
--

INSERT INTO `ferramentas` (`id`, `ferramenta`, `obra`, `data_locacao`, `loja`) VALUES
(13, 'Betoneira 400L', 'Santa Cristina XIII', '2024-10-07', 'Casa do Construtor'),
(14, 'Martelete', 'Santa Cristina II', '2024-10-07', 'Alumak'),
(15, 'Andaime', 'Melitta', '2024-10-07', 'Casa do Construtor');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
