CREATE DATABASE `devprox`;

USE `devprox`;

CREATE TABLE `devprox`.`csv_import` (
`id` INT(11) NOT NULL AUTO_INCREMENT , 
`name` VARCHAR(100) NOT NULL , 
`surname` VARCHAR(100) NOT NULL , 
`initials` CHAR(2) NOT NULL , 
`age` INT NOT NULL , 
-- `date_of_birth` DATE NOT NULL , 
 `date_of_birth` VARCHAR(100) NOT NULL , 
PRIMARY KEY (`id`));