DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `first_name` blob NOT NULL,
  `last_name` blob NOT NULL,
  `email` blob NOT NULL,
  `password` blob NOT NULL,
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`user_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;
