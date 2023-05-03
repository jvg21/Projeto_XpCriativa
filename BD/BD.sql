-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.27-MariaDB - mariadb.org binary distribution
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
  `idadm` int(11) NOT NULL,
  `login` varchar(45) DEFAULT NULL,
  `foto` mediumblob NULL,
  PRIMARY KEY (`idadm`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotelzin.adm: ~1 rows (aproximadamente)
INSERT INTO `adm` (`idadm`, `login`) VALUES
	(0, 'giuchoa', 1);

-- Copiando estrutura para tabela hotelzin.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `data_nasc` date NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `foto` mediumblob NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotelzin.cliente: ~0 rows (aproximadamente)
INSERT INTO `cliente` (`idcliente`, `nome`, `cpf`, `email`, `telefone`, `data_nasc`, `sexo`, `senha`) VALUES
	(28, 'Bruno Guttervill', '333.333.333-33', 'bruno@gmail.com', '(41)77777-7777', '2004-01-05', 'Masculino', 'Flamengo123');

-- Copiando dados para a tabela hotelzin.quarto: ~10 rows (aproximadamente)
INSERT INTO `quarto` (`idquarto`, `num_quarto`, `fk_tipo_quarto`) VALUES
	(2, 1, 1),
	(3, 2, 1),
	(4, 3, 1),
	(5, 4, 1),
	(6, 5, 1),
	(7, 6, 2),
	(8, 7, 2),
	(9, 8, 3),
	(10, 9, 3),
	(11, 10, 3);

-- Copiando estrutura para tabela hotelzin.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `idreserva` int(11) NOT NULL AUTO_INCREMENT,
  `fk_idcliente` int(11) NOT NULL,
  `fk_idquarto` int(11) NOT NULL,
  `data_checkin` date DEFAULT NULL,
  `data_checkout` date DEFAULT NULL,
  `hora_checkin` time DEFAULT NULL,
  `hora_checkout` time DEFAULT NULL,
  PRIMARY KEY (`idreserva`),
  KEY `Fk_IdCliente` (`fk_idcliente`),
  KEY `Fk_IdQuarto` (`fk_idquarto`),
  CONSTRAINT `Fk_IdCliente` FOREIGN KEY (`fk_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Fk_IdQuarto` FOREIGN KEY (`fk_idquarto`) REFERENCES `quarto` (`idquarto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotelzin.reserva: ~1 rows (aproximadamente)
INSERT INTO `reserva` (`idreserva`, `fk_idcliente`,`fk_idquarto`, `data_checkin`, `data_checkout`, `hora_checkin`, `hora_checkout`) VALUES
	(5, 28, 10, '2023-05-03', '2023-05-03', '03:49:50', '13:49:50');

-- Copiando estrutura para tabela hotelzin.tipo_quarto
CREATE TABLE IF NOT EXISTS `tipo_quarto` (
  `idtipo_quarto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) NOT NULL,
  `preco` float NOT NULL,
  PRIMARY KEY (`idtipo_quarto`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotelzin.tipo_quarto: ~3 rows (aproximadamente)
INSERT INTO `tipo_quarto` (`idtipo_quarto`, `nome`, `preco`) VALUES
	(1, 'Simples', 200),
	(2, 'Couple', 350),
	(3, 'Premium', 600);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
