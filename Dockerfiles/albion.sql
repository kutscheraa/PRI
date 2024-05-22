SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
SET NAMES utf8mb4;
-- tabulka registrovaných uživatelů (kteří moho nahrávat recepty)
DROP TABLE IF EXISTS `uzivatele`;
CREATE TABLE `uzivatele` (
    `id` int NOT NULL AUTO_INCREMENT,
    `jmeno` varchar(100) NOT NULL,
    `heslo` varchar(100) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `jmeno` (`jmeno`)
);
-- data seeder
INSERT INTO `uzivatele` (`id`, `jmeno`, `heslo`)
VALUES (1, 'martin', 'martin'),
    (2, 'test', 'test'),
    (3, 'petr', '12345');
-- tabulka návodů – počet zobrazení    
DROP TABLE IF EXISTS `guides`;
CREATE TABLE `guides` (
    `title` varchar(100) NOT NULL,
    `precteno` int unsigned NOT NULL,
    PRIMARY KEY (`title`)
);