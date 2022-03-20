USE mysql;

CREATE DATABASE admin_webd;

CREATE TABLE `admin_webd`.`websid` ( `id` INT NOT NULL AUTO_INCREMENT , `stitle` TEXT NOT NULL , `slink` VARCHAR(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , `skey` TEXT NOT NULL , `sdesc` TEXT NOT NULL , `simg` VARCHAR(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , `styp` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;