<?php
	
$host='localhost';
$user='pgm2';
$password='pgm2';
$dbname='pgm2';

$conn = @mysql_connect($host,$user,$password) or die ('Connection Failed.<br>');
$database = @mysql_select_db($dbname) or die ('DB selection failed.');

define('HTML','html/');
define('IMAGES','images/');
define('CLASSES','classes/');
define('CSS','css/');
define('JS','js/');
?>