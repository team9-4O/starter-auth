# create a simple users table for authentication
CREATE TABLE IF NOT EXISTS `users` (
`id` varchar(10) NOT NULL,
`name` varchar(20) NOT NULL,
`password` varchar(64) NOT NULL,
`role` varchar(20) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
