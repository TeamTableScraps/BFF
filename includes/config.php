<?php

#################
#   SETTINGS    #
#################
//MySQL Hostname
$sqlHost = 'localhost';
//MySQL Username
$sqlUser = 'root';
//MySQL Password
$sqlPass = '';
//MySQL Database
$dbName = 'blackfeatherfestival';
//Encryption key
$aesKey = 'BFF';

#################
#   Defines     #
#################
define('SQLHOST',$sqlHost);
define('SQLUSER',$sqlUser);
define('SQLPASS',$sqlPass);
define('DBNAME',$dbName);
define('AESKEY',$aesKey);

#################
#   CONNECTION  #
#################
$MySQLi = new mysqli(SQLHOST, SQLUSER, SQLPASS, DBNAME);