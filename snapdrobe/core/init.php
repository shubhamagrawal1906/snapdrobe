<?php 
session_start();
//error_reporting(0);
 
require 'database/connect_db.php';
require 'function/general.php';
require 'function/users.php';

$current_file = end(explode("/",$_SERVER['SCRIPT_NAME']));

if(loggedin()){
	$session=(int)$_SESSION['user_id'];
	$user_data=user_data($session,'user_id','username','password','firstname','lastname','gender','date','city','home','mobile','email','interest','relation','education','profession','bio','password_recover','type','allow_email','profile');
	if(!user_active($user_data['username'])){
		header('Location:/snapdrobe/logout.php');
	}
	if($current_file!=="events.php?mode=setting&&change_password" && $user_data['password_recover']=='1'){
		header("Location:events.php?mode=setting&&change_password&&force");
		exit();
	}
}
$error = array();
?>