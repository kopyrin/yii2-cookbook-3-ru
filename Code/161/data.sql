DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
   `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
   `name` varchar(255) NOT NULL,
   `type` varchar(100) NOT NULL,
   PRIMARY KEY (`id`)
);

INSERT INTO `car` (`name`, `type`)
VALUES ('Ford Focus', 'family'),
('Opel Astra', 'family'),
('Kia Ceed', 'family'),
('Porsche Boxster', 'sport'),
('Ferrari 550', 'sport');
