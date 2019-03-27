-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema test-movies
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema test-movies
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `test-movies` DEFAULT CHARACTER SET utf8 ;
USE `test-movies` ;

-- -----------------------------------------------------
-- Table `test-movies`.`movie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `test-movies`.`movie` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(32) NOT NULL,
  `created` INT(13) NOT NULL,
  `updated` INT(13) NOT NULL,
  `release` INT(13) NULL,
  `deleted` INT(13) NULL,
  `boxoffice` VARCHAR(32) NULL,
  `trailer1` VARCHAR(12) NULL,
  `trailer2` VARCHAR(12) NULL,
  `trailer3` VARCHAR(12) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `test-movies`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `test-movies`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(20) NOT NULL,
  `gender` INT(1) NOT NULL DEFAULT 0 COMMENT '0=male, 1=female',
  `email` VARCHAR(32) NOT NULL,
  `created` INT(13) NOT NULL,
  `updated` INT(13) NOT NULL,
  `deleted` INT(13) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `test-movies`.`rating`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `test-movies`.`rating` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `movie` INT NOT NULL,
  `user` INT NOT NULL,
  `rate` DECIMAL(3) NOT NULL,
  `date` INT(13) NOT NULL,
  PRIMARY KEY (`id`, `movie`, `user`),
  UNIQUE INDEX `idrating_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `test-movies`.`anticipation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `test-movies`.`anticipation` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `movie` INT NOT NULL,
  `user` INT NOT NULL,
  `date` INT(13) NOT NULL,
  `want` INT(1) NOT NULL DEFAULT 0 COMMENT '0=no, 1=yes',
  PRIMARY KEY (`id`, `movie`, `user`),
  UNIQUE INDEX `idanticipation_UNIQUE` (`id` ASC))
ENGINE = InnoDB;

CREATE USER 'ttMovies' IDENTIFIED BY 'Fran9150,';

GRANT ALL ON `test-movies`.* TO 'ttMovies';

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
