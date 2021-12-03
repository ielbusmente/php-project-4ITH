create database sleepydb;



CREATE TABLE `sleepydb`.`inquiry` ( 
    `id` INT NOT NULL AUTO_INCREMENT, 
    `email` VARCHAR(255) NOT NULL ,  
    `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,  
    `name` VARCHAR(255) NOT NULL , 
    `message` VARCHAR(5000) NOT NULL , 
    `readBool` BOOLEAN NOT NULL DEFAULT FALSE , 
    `readDate` TIMESTAMP NULL DEFAULT NULL , 
    PRIMARY KEY (`id`) UNIQUE (`id`,`email`)); 
-- ALTER TABLE `adminuser` ADD UNIQUE(`email`);

CREATE TABLE `sleepydb`.`adminuser` ( 
    `id` INT NOT NULL AUTO_INCREMENT, 
    `firstName` VARCHAR(255) NOT NULL ,  
   `lastName` VARCHAR(255) NOT NULL , 
   `email` VARCHAR(255) NOT NULL , 
   `password` VARCHAR(255) NOT NULL ,  
    PRIMARY KEY (`id`) UNIQUE (`id`); 

CREATE TABLE `sleepydb`.`product` ( 
    `id` INT NOT NULL AUTO_INCREMENT, 
    `name` VARCHAR(255) NOT NULL ,  
   `description` VARCHAR(255) NOT NULL , 
   `price` INT NOT NULL,  
   `category` INT NOT NULL,  
   `size` INT ,  
    PRIMARY KEY (`id`) UNIQUE (`id`); 
-- INSERT INTO `inquiry` (`id`, `message`, `date`, `readBool`, `readDate`) VALUES (NULL, 'ASDF', '2021-11-22 10:16:17.000000', '0', '2021-11-22 10:16:17.000000')


-- DROP TABLE ` inquiry `