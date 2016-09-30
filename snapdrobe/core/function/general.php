<?php 
function email($to,$subject,$body){
	mail($to,$subject,$body,"From:shubham.agrawal");
}

function redirect_loggedin(){
	if(loggedin()){
		header('Location:index.php');
		exit();		
	}
}

function redirect_not_loggedin(){
	if(!loggedin()){
		header('Location:index.php');
		exit();
	}
}

function protect_page(){
	if(!loggedin()){
		header('Location:protected.php');
		exit();
	}
}

function admin_protect(){
	global $user_data;
	if(!has_access($user_data['user_id'],1)){
		header("Location:index.php");
		exit;
	}
}
function array_injection(&$item){
	$item=htmlentities(strip_tags(mysql_real_escape_string($item)));
}

function injection($data){
	return htmlentities(strip_tags(mysql_real_escape_string($data)));
}

function output_error($errors){
	$output=array();
	foreach($errors as $error){
		$output[]="<li>".$error."</li>";
	}
	return "<ul>".implode("",$output)."</ul>";
}
?>