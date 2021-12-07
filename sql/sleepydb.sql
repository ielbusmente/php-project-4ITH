-- create database sleepydb;



CREATE TABLE `inquiry` ( 
    `id` INT NOT NULL AUTO_INCREMENT, 
    `email` VARCHAR(255) NOT NULL ,  
    `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,  
    `name` VARCHAR(255) NOT NULL , 
    `message` VARCHAR(5000) NOT NULL , 
    `readBool` BOOLEAN NOT NULL DEFAULT FALSE , 
    `readDate` TIMESTAMP NULL DEFAULT NULL , 
    PRIMARY KEY (`id`), UNIQUE (`email`)); 
-- ALTER TABLE `adminuser` ADD UNIQUE(`email`);

CREATE TABLE `adminuser` ( 
    `id` INT NOT NULL AUTO_INCREMENT, 
    `firstName` VARCHAR(255) NOT NULL ,  
   `lastName` VARCHAR(255) NOT NULL , 
   `email` VARCHAR(255) NOT NULL , 
   `password` VARCHAR(255) NOT NULL ,  
    PRIMARY KEY (`id`)); 

CREATE TABLE `product` ( 
    `id` INT NOT NULL AUTO_INCREMENT, 
    `name` VARCHAR(255) NOT NULL ,  
   `description` VARCHAR(5000), 
   `price` INT NOT NULL,  
   `category` INT NOT NULL,  
   `size` INT ,  
   `img` VARCHAR(8000) NOT NULL,
    PRIMARY KEY (`id`)); 
-- INSERT INTO `inquiry` (`id`, `message`, `date`, `readBool`, `readDate`) VALUES (NULL, 'ASDF', '2021-11-22 10:16:17.000000', '0', '2021-11-22 10:16:17.000000')


-- DROP TABLE ` inquiry `

-- INSERT INTO `product` (`id`, `name`, `description`, `price`, `category`, `size`) VALUES (NULL, 'Awesome Eye Mask', 'This is a description nyenye', '123', '1', NULL), (NULL, 'Dope Shorts', 'tada klees here \r\nlife is not dadada', '1000', '3', '0')

-- INSERT INTO `product` (`id`, `name`, `description`, `price`, `category`, `size`, `img`) VALUES (NULL, 'AAhhhhhh', 'kaljsdfklj asfd \r\nasdfasdf\r\n\r\n\r\nasdfadfsfasdf asdf as d fsa dfas d', '2222', '5', '4', 'assets/img/blushluxe.jpg')

-- INSERT INTO `product` (`id`, `name`, `description`, `price`, `category`, `size`, `img`) VALUES 
-- (NULL, 'Product Name', 'descrip', '20', '1', '2', 'assets/img/'), 
-- (NULL, 'Prod2', 'adf', '12', '3', '4', 'assets/img/')
-- (NULL, 'Prod2', 'adf', '12', '3', '4', 'assets/img/')
-- (NULL, 'Prod2', 'adf', '12', '3', '4', 'assets/img/')
-- (NULL, 'Prod2', 'adf', '12', '3', '4', 'assets/img/')
-- (NULL, 'Prod2', 'adf', '12', '3', '4', 'assets/img/')