-- MySQL Script generated by MySQL Workbench
-- Wed Apr 19 21:55:05 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `adm`
-- -----------------------------------------------------

DROP TABLE IF EXISTS `adm` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `adm` (
  `idadm` INT NOT NULL,
  `login` VARCHAR(45) NULL,
  `idfunc` INT NOT NULL,
  PRIMARY KEY (`idadm`))
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `idfunc_UNIQUE` ON `adm` (`idfunc` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cliente` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` INT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(14) NOT NULL,
  `nome` VARCHAR(60) NOT NULL,
  `email` VARCHAR(30) NOT NULL,
  `telefone` VARCHAR(20) NOT NULL,
  `data_nasc` DATE NOT NULL,
  `sexo` VARCHAR(10) NOT NULL,
  `senha` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`idcliente`))
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `idcliente_UNIQUE` ON `cliente` (`idcliente` ASC);

SHOW WARNINGS;
CREATE UNIQUE INDEX `cpf_UNIQUE` ON `cliente` (`cpf` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `funcionario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `funcionario` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `idfuncionario` INT NOT NULL AUTO_INCREMENT,
  `matricula` INT NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `nome` VARCHAR(60) NOT NULL,
  `email` VARCHAR(30) NOT NULL,
  `telefone` VARCHAR(20) NOT NULL,
  `data_nasc` DATE NOT NULL,
  `sexo` VARCHAR(10) NOT NULL,
  `senha` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`idfuncionario`))
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `idcliente_UNIQUE` ON `funcionario` (`idfuncionario` ASC);

SHOW WARNINGS;
CREATE UNIQUE INDEX `cpf_UNIQUE` ON `funcionario` (`cpf` ASC);

SHOW WARNINGS;
CREATE UNIQUE INDEX `matricula_UNIQUE` ON `funcionario` (`matricula` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `quarto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `quarto` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `quarto` (
  `idquarto` INT NOT NULL AUTO_INCREMENT,
  `num_quarto` INT NOT NULL,
  `tipo_quarto` INT NOT NULL,
  PRIMARY KEY (`idquarto`))
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `num_quarto_UNIQUE` ON `quarto` (`num_quarto` ASC);

SHOW WARNINGS;
CREATE UNIQUE INDEX `idquarto_UNIQUE` ON `quarto` (`idquarto` ASC);

SHOW WARNINGS;
CREATE UNIQUE INDEX `tipo_quarto_UNIQUE` ON `quarto` (`tipo_quarto` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `reserva`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reserva` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `reserva` (
  `idreserva` INT NOT NULL AUTO_INCREMENT,
  `fk_idcliente` INT NOT NULL,
  `fk_idfuncionario` INT NULL,
  `fk_idquarto` INT NOT NULL,
  `data_checkin` DATE NOT NULL,
  `data_checkout` DATE NOT NULL,
  `hora_checkin` TIME NOT NULL,
  `hora_checkout` TIME NOT NULL,
  PRIMARY KEY (`idreserva`))
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `idreserva_UNIQUE` ON `reserva` (`idreserva` ASC);

SHOW WARNINGS;
CREATE UNIQUE INDEX `idcliente_UNIQUE` ON `reserva` (`fk_idcliente` ASC);

SHOW WARNINGS;
CREATE UNIQUE INDEX `idquarto_UNIQUE` ON `reserva` (`fk_idquarto` ASC);

SHOW WARNINGS;
CREATE UNIQUE INDEX `idfuncionario_UNIQUE` ON `reserva` (`fk_idfuncionario` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tipo_quarto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tipo_quarto` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `tipo_quarto` (
  `idtipo_quarto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(25) NOT NULL,
  `preco` FLOAT NOT NULL,
  PRIMARY KEY (`idtipo_quarto`))
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `idtipo_quarto_UNIQUE` ON `tipo_quarto` (`idtipo_quarto` ASC);

SHOW WARNINGS;
CREATE UNIQUE INDEX `nome_UNIQUE` ON `tipo_quarto` (`nome` ASC);

SHOW WARNINGS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;