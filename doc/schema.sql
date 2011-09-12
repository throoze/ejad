SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `ejad` ;
CREATE SCHEMA IF NOT EXISTS `ejad` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ejad` ;

-- -----------------------------------------------------
-- Table `ejad`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ejad`.`User` ;

CREATE  TABLE IF NOT EXISTS `ejad`.`User` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(50) NOT NULL ,
  `name` VARCHAR(50) NOT NULL ,
  `lastname` VARCHAR(50) NULL ,
  `gender` VARCHAR(1) NOT NULL ,
  `email` VARCHAR(100) NOT NULL ,
  `passwd` VARCHAR(128) NULL ,
  `status` INT(2) NULL DEFAULT 0 ,
  `lastlogin` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `usrname_unique` (`username` ASC) ,
  INDEX `email_idx` (`email` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `ejad`.`Confirmation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ejad`.`Confirmation` ;

CREATE  TABLE IF NOT EXISTS `ejad`.`Confirmation` (
  `user_id` INT UNSIGNED NOT NULL ,
  `hash` VARCHAR(64) NOT NULL ,
  PRIMARY KEY (`user_id`) ,
  INDEX `fk_Confirmation_to_User` (`user_id` ASC) ,
  CONSTRAINT `fk_Confirmation_to_User`
    FOREIGN KEY (`user_id` )
    REFERENCES `ejad`.`User` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `ejad`.`BulletinType`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ejad`.`BulletinType` ;

CREATE  TABLE IF NOT EXISTS `ejad`.`BulletinType` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(30) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `ejad`.`Subscription`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ejad`.`Subscription` ;

CREATE  TABLE IF NOT EXISTS `ejad`.`Subscription` (
  `user_id` INT UNSIGNED NOT NULL ,
  `bulletin_type_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`user_id`, `bulletin_type_id`) ,
  INDEX `fk_Subscription_to_User` (`user_id` ASC) ,
  INDEX `fk_Subscription_to_BulletinType` (`bulletin_type_id` ASC) ,
  CONSTRAINT `fk_Subscription_to_User`
    FOREIGN KEY (`user_id` )
    REFERENCES `ejad`.`User` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Subscription_to_BulletinType`
    FOREIGN KEY (`bulletin_type_id` )
    REFERENCES `ejad`.`BulletinType` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
