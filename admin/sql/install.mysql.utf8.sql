DROP TABLE IF EXISTS `#__profile`;
 
CREATE TABLE `#__profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(25) NOT NULL,
  `description` mediumtext NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
