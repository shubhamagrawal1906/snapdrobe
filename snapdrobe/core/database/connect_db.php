<?php
$host="localhost";
$user="root";
$password="";
$db="snapdrobe";
$error="Server has some connection issues!";
$connect=mysql_connect($host,$user,$password);
if(!$connect || !mysql_select_db($db,$connect)){
	die($error);
}
?>