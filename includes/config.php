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
$dbName = 'blackfeather';
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
#               #
#################
$MySQLi = mysqli_connect(SQLHOST, SQLUSER, SQLPASS, DBNAME);

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
