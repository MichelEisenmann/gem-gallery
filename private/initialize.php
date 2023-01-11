<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);    

// Assign path shortcuts to PHP constants
// __FILE__ returns the current path to this file
// dirname() returns the path to the parent directory

define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');

// echo PRIVATE_PATH ."<br>"

?>
