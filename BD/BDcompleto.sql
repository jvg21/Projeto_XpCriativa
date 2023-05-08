-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para hotelzin
CREATE DATABASE IF NOT EXISTS `hotelzin` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `hotelzin`;

-- Copiando estrutura para tabela hotelzin.adm
CREATE TABLE IF NOT EXISTS `adm` (
  `idadm` int(11) NOT NULL AUTO_INCREMENT,
  `fk_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idadm`),
  KEY `fk_adm_usuario1_idx` (`fk_idusuario`),
  CONSTRAINT `fk_adm_usuario1` FOREIGN KEY (`fk_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotelzin.adm: ~3 rows (aproximadamente)
INSERT INTO `adm` (`idadm`, `fk_idusuario`) VALUES
	(12, 1),
	(13, 2),
	(11, 36);

-- Copiando estrutura para tabela hotelzin.quarto
CREATE TABLE IF NOT EXISTS `quarto` (
  `idquarto` int(11) NOT NULL AUTO_INCREMENT,
  `num_quarto` int(11) NOT NULL,
  `fk_tipo_quarto` int(11) NOT NULL,
  PRIMARY KEY (`idquarto`),
  UNIQUE KEY `num_quarto_UNIQUE` (`num_quarto`),
  KEY `Quarto_TipoQuarto` (`fk_tipo_quarto`) USING BTREE,
  CONSTRAINT `Quarto_TipoQuarto` FOREIGN KEY (`fk_tipo_quarto`) REFERENCES `tipo_quarto` (`idtipo_quarto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotelzin.quarto: ~13 rows (aproximadamente)
INSERT INTO `quarto` (`idquarto`, `num_quarto`, `fk_tipo_quarto`) VALUES
	(25, 1, 1),
	(26, 2, 1),
	(27, 3, 1),
	(28, 4, 1),
	(29, 5, 1),
	(30, 6, 2),
	(31, 7, 2),
	(32, 8, 2),
	(33, 9, 3),
	(34, 10, 3),
	(35, 11, 3),
	(36, 12, 4),
	(37, 13, 4);

-- Copiando estrutura para tabela hotelzin.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `idreserva` int(11) NOT NULL AUTO_INCREMENT,
  `fk_idquarto` int(11) NOT NULL,
  `fk_idusuario` int(11) NOT NULL,
  `data_checkin` date DEFAULT NULL,
  `data_checkout` date DEFAULT NULL,
  `hora_checkin` time DEFAULT NULL,
  `hora_checkout` time DEFAULT NULL,
  PRIMARY KEY (`idreserva`),
  KEY `Fk_IdQuarto` (`fk_idquarto`),
  KEY `fk_reserva_usuario1_idx` (`fk_idusuario`),
  CONSTRAINT `Fk_IdQuarto` FOREIGN KEY (`fk_idquarto`) REFERENCES `quarto` (`idquarto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reserva_usuario1` FOREIGN KEY (`fk_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotelzin.reserva: ~4 rows (aproximadamente)
INSERT INTO `reserva` (`idreserva`, `fk_idquarto`, `fk_idusuario`, `data_checkin`, `data_checkout`, `hora_checkin`, `hora_checkout`) VALUES
	(22, 25, 1, '2023-05-20', '2023-05-26', '07:30:00', '18:00:00'),
	(23, 26, 36, '2023-06-01', '2023-06-09', '07:30:00', '18:00:00'),
	(24, 27, 37, '2023-12-23', '2024-01-02', '07:30:00', '18:00:00'),
	(25, 28, 38, '2023-10-08', '2023-10-13', '07:30:00', '18:00:00');

-- Copiando estrutura para tabela hotelzin.tipo_quarto
CREATE TABLE IF NOT EXISTS `tipo_quarto` (
  `idtipo_quarto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) NOT NULL,
  `preco` float NOT NULL,
  `descricao` text DEFAULT NULL,
  PRIMARY KEY (`idtipo_quarto`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotelzin.tipo_quarto: ~4 rows (aproximadamente)
INSERT INTO `tipo_quarto` (`idtipo_quarto`, `nome`, `preco`, `descricao`) VALUES
	(1, 'single', 150, 'quarto simples para uma pessoa, com um banheiro e uma cama de solteiro'),
	(2, 'dual', 280, 'quarto maior para um conforto de até duas pessoas, com um banheiro e uma cama de casal'),
	(3, 'medium', 400, 'quarto mais refinado que conforta uma familia de tres pessoas, com dois banheiros, uma cama de casal e uma de solteiro'),
	(4, 'premium', 650, 'quarto grande com capacidade para 6 pessoas, com dois banheiros e três camas de casal');

-- Copiando estrutura para tabela hotelzin.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `data_nasc` date NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` mediumblob DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotelzin.usuario: ~5 rows (aproximadamente)
INSERT INTO `usuario` (`idusuario`, `nome`, `cpf`, `email`, `telefone`, `data_nasc`, `sexo`, `senha`, `foto`) VALUES
	(1, 'Giovanni', '111.111.111-11', 'gio@gmail.com', '41999999999', '2004-03-25', 'Masculino', '33f753983920fc9b4fa1be1b8f00798d', NULL),
	(2, 'Joao', '222.222.222-22', 'joao@gmail.com', '41988888888', '2004-06-28', 'Masculino', '33f753983920fc9b4fa1be1b8f00798d', NULL),
	(36, 'Bruno', '333.333.333-33', 'Bruno@gmail.com', '41977777777', '2004-01-05', 'Masculino', '33f753983920fc9b4fa1be1b8f00798d', NULL),
	(37, 'Guilherme', '444.444.444-..', 'gui@gmail.com', '41966666666', '2004-02-11', 'Masculino', '33f753983920fc9b4fa1be1b8f00798d', NULL),
	(38, 'Gabriel', '555.555.555-55', 'gabriel@gmail.com', '41955555555', '2000-08-21', 'Masculino', '33f753983920fc9b4fa1be1b8f00798d', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
