<?php

/**
 * This script connects to MySQL using the PDO object.
 */

/*//Our MySQL user account.
define('MYSQL_USER', 'cbtugarsoft_cbt');
//Our MySQL password.
define('MYSQL_PASSWORD', ']#&+mk{I3e$w');
//The server that MySQL is located on.
define('MYSQL_HOST', 'localhost');
//The name of our database.
define('MYSQL_DATABASE', 'cbtugarsoft_cbt');
*/


define('MYSQL_USER', 'root');
//Our MySQL password.
define('MYSQL_PASSWORD', '');
//The server that MySQL is located on.
define('MYSQL_HOST', 'localhost');
//The name of our database.
define('MYSQL_DATABASE', 'cbt');

$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => true// we set to true: read documentation before public
);

 try {
$pdo = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, //DSN
    MYSQL_USER, //Username
    MYSQL_PASSWORD, //Password
    $pdoOptions //Options
 );} catch (Exception $e) {
	 // design this well to make sense
  die(ServeError( ConnectionError .
  // conmment out in launch
  $e->getMessage()


  ));
}


