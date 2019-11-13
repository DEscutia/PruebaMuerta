-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Funerales_I
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Funerales_I
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Funerales_I` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci ;
USE `Funerales_I` ;

-- -----------------------------------------------------
-- Table `Funerales_I`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funerales_I`.`Usuarios` (
  `idUsuarios` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `NombrUsuario` VARCHAR(45) NOT NULL,
  `Contraseña` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idUsuarios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funerales_I`.`Obituarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funerales_I`.`Obituarios` (
  `idObituarios` INT NOT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(45) NOT NULL,
  `Descripcion` VARCHAR(45) NOT NULL,
  `Imagen` VARCHAR(45) NOT NULL,
  `Usuarios_idUsuarios` INT NOT NULL,
  PRIMARY KEY (`idObituarios`, `Usuarios_idUsuarios`),
  INDEX `fk_Obituarios_Usuarios1_idx` (`Usuarios_idUsuarios` ASC) VISIBLE,
  CONSTRAINT `fk_Obituarios_Usuarios1`
    FOREIGN KEY (`Usuarios_idUsuarios`)
    REFERENCES `Funerales_I`.`Usuarios` (`idUsuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funerales_I`.`Ataudes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funerales_I`.`Ataudes` (
  `idAtaudes` INT NOT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(45) NOT NULL,
  `Descripcion` VARCHAR(45) NOT NULL,
  `Imagen` VARCHAR(45) NOT NULL,
  `Precio` VARCHAR(45) NOT NULL,
  `Usuarios_idUsuarios` INT NOT NULL,
  PRIMARY KEY (`idAtaudes`, `Usuarios_idUsuarios`),
  INDEX `fk_Ataudes_Usuarios_idx` (`Usuarios_idUsuarios` ASC) VISIBLE,
  CONSTRAINT `fk_Ataudes_Usuarios`
    FOREIGN KEY (`Usuarios_idUsuarios`)
    REFERENCES `Funerales_I`.`Usuarios` (`idUsuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funerales_I`.`Servicios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funerales_I`.`Servicios` (
  `idServicios` INT NOT NULL,
  `Titulo` VARCHAR(45) NOT NULL,
  `Descripcion` LONGTEXT NOT NULL,
  `Imagen` LONGTEXT NULL,
  `Usuarios_idUsuarios` INT NOT NULL,
  PRIMARY KEY (`idServicios`, `Usuarios_idUsuarios`),
  INDEX `fk_Servicios_Usuarios1_idx` (`Usuarios_idUsuarios` ASC) VISIBLE,
  CONSTRAINT `fk_Servicios_Usuarios1`
    FOREIGN KEY (`Usuarios_idUsuarios`)
    REFERENCES `Funerales_I`.`Usuarios` (`idUsuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
