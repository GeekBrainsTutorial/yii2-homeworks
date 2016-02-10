SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`clndr_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`clndr_user` ;

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(128) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `surname` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `salt` VARCHAR(255) NOT NULL,
  `access_token` VARCHAR(255) NULL DEFAULT NULL,
  `create_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `access_token_UNIQUE` (`access_token` ASC))
ENGINE = InnoDB CHARACTER SET UTF8;


-- -----------------------------------------------------
-- Table `mydb`.`clndr_calendar`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `clndr_calendar` ;

CREATE TABLE IF NOT EXISTS `tbl_calendar` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `text` TEXT NOT NULL,
  `creator` INT NOT NULL,
  `date_event` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_note_1_idx` (`creator` ASC))
ENGINE = InnoDB CHARACTER SET UTF8;


-- -----------------------------------------------------
-- Table `mydb`.`clndr_access`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`clndr_access` ;

CREATE TABLE IF NOT EXISTS `tbl_access` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_owner` INT NOT NULL,
  `user_gest` INT NOT NULL,
  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_access_2_idx` (`user_gest` ASC),
  INDEX `fk_tbl_access_1_idx` (`user_owner` ASC))
ENGINE = InnoDB CHARACTER SET UTF8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
