CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mode` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `date_row` date NOT NULL,
  `header` varchar(255) NOT NULL,
  `short_text` text NOT NULL,
  `full_text` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;