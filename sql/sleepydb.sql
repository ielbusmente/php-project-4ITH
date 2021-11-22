create database sleepydb;



CREATE TABLE `sleepydb`.`inquiry` ( 
    `id` INT NOT NULL AUTO_INCREMENT, 
    `email` VARCHAR(255) NOT NULL ,  
    `date` DATETIME NOT NULL ,  
    `name` VARCHAR(255) NOT NULL , 
    `message` VARCHAR(255) NOT NULL , 
    `readBool` BOOLEAN NOT NULL DEFAULT FALSE , 
    `readDate` DATETIME NULL DEFAULT NULL , 
    PRIMARY KEY (`id`)); 
-- INSERT INTO `inquiry` (`id`, `message`, `date`, `readBool`, `readDate`) VALUES (NULL, 'ASDF', '2021-11-22 10:16:17.000000', '0', '2021-11-22 10:16:17.000000')


-- DROP TABLE ` inquiry `