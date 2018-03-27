DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
 `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
 `lang` VARCHAR(5) NOT NULL DEFAULT 'en',
 `title` VARCHAR(255) NOT NULL,
 `text` TEXT NOT NULL,
 PRIMARY KEY (`id`)
);
INSERT INTO `post`(`id`,`lang`,`title`,`text`)
VALUES (1,'en_us','Yii news','Text in English'),
(2,'de','Yii Nachrichten','Text in Deutsch');