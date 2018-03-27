
DROP TABLE IF EXISTS `blog_post`;
CREATE TABLE IF NOT EXISTS `blog_post` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255) NOT NULL,
	`text` TEXT NOT NULL,
	`created_date` INTEGER,
	`modified_date`INTEGER,
	PRIMARY KEY  (`id`)
);

