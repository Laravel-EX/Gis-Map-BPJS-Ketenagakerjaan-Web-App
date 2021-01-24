<?php error_reporting(0); ?><?php 

$hostname="localhost";
$dbuser="root";
$dbpass="";
$dbname="gis_map";

$db=mysql_connect($hostname,$dbuser,$dbpass) or die (mysql_error());

mysql_select_db($dbname,$db) or die (mysql_error());

?>
