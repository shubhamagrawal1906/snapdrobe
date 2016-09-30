 <?php
function notification($user_id){
	$query="SELECT COUNT(`notify_id`) FROM `notification".$user_id."` WHERE `seen` = 0";
	$query_run=mysql_query($query);
	$notify =mysql_result($query_run,0);
	if($notify==0){
		$note="";
	}else{
		if($notify>0 && $notify<10){
			$note="&nbsp;&nbsp;".$notify;
		}else if($notify>=10 && $notify<100){
			$note="&nbsp;".$notify;
		}else{
			$note="99+";
		}
	}
	return $note;
} 
 
function redirect_following_mode($following_mode,$user_following_id){
	if($following_mode!="search"){
		header("Location:events.php?mode=following&&".$following_mode);
	}
	else{
		$query="SELECT `username` FROM `user` WHERE `user_id`='$user_following_id'";
		$query_run=mysql_query($query);
		echo $username=injection(mysql_result($query_run,0,'username'));
		header("Location:events.php?mode=following&&".$following_mode."=".$username);
	}
}
 
function change_profile_image($user_id,$file_temp,$file_ext){
	$user_id=(int)$user_id;
	$file_path="images/profile/".substr(md5(time()),0,10).".".$file_ext;
	move_uploaded_file($file_temp,$file_path);
	$query="UPDATE `user` SET `profile`= '".mysql_real_escape_string($file_path)."' WHERE `user_id`='$user_id'";
	$query_run=mysql_query($query);
}
 
function mail_users($subject,$body){
	$query="SELECT `email`,`firstname` FROM `user` WHERE `allow_email`='1'";
	$query_run=mysql_query($query);
	while($row=mysql_fetch_assoc($query_run)){
		email($row['email'],$subject,"Hello ".$row['firstname'].",\n\n".$body);
	}
}

function has_access($user_id,$type){
	$user_id=(int)$user_id;
	$type=(int)$type;
	$query="SELECT COUNT(`user_id`) FROM `user` WHERE `user_id`='$user_id' AND `type`='1'";
	$query_run=mysql_query($query);
	return mysql_result($query_run,0)==1?true:false;	
}
 
function recover($mode,$email){
	$mode=injection($mode);
	$email=injection($email);
	$user_data=user_data(user_id_from_email($email),"user_id","firstname","username");
	
	if($mode=="username"){
		email($email,"Your username","Hello ".$user_data['firstname'].",\n\nYour username is : ".$user_data['username']."\n\n-phplover");
	}else if($maode="password"){
		echo $password=substr(md5(rand(999,999999)),0,8);
		change_password($user_data['user_id'],$password);
		update_user($user_data['user_id'],array('password_recover'=>'1'));
		email($email,"Your password recovery","Hello ".$user_data['firstname'].",\n\nYour username is : ".$password."\n\n-phplover");
	}
}
 
function activate($email,$email_code){
	$email=injection($email);
	$email_code=injection($email_code);

	$query="SELECT COUNT(`user_id`) FROM `user` WHERE `email`='$email' AND `email_code`='$email_code' AND `active`='0'";
	$query_run=mysql_query($query);
	if(mysql_result($query_run,0)==1){
		$query="UPDATE `user` SET `active`='1' WHERE `email`='$email'";
		$query_run=mysql_query($query);
		return true;
	}else{
		return false;
	}
}

function update_user($user_id,$update_data){
	$update=array();
	array_walk($update_data,'array_injection');
	foreach($update_data as $field=>$data){
		$update[]="`$field`='$data'";
	}
	$query="UPDATE `user` SET ".implode(",",$update)." WHERE `user_id`='$user_id'";
	$query_run=mysql_query($query);
}
 
function change_password($user_id,$password){
	$user_id=(int)$user_id;
	$password=md5($password);
	$query="UPDATE `user` SET `password`='$password',`password_recover`='0' WHERE `user_id`='$user_id'";
	$query_run=mysql_query($query);
}	
 
 function register_user($register_data){
	$register_data['password']=md5($register_data['password']);
	array_walk($register_data,'array_injection');
	$field="`".implode("`,`",array_keys($register_data))."`";
	$data="'".implode("','",$register_data)."'";
	$query="INSERT INTO `user`($field) VALUES ($data)";
	$query_run=mysql_query($query);
	email($register_data['email'],"Activate your account","Hello ".$register['firstname']." , \n\nYou need to activate your account , so the link below : \n\n http://127.0.0.1/snapdrobe/activate.php?email=".$register_data['email']."&email_code=".$register_data['email_code']."\n\n-phplover");
	$query="SELECT `user_id` FROM `user` WHERE `username`='".$register_data['username']."'";
	$query_run=mysql_query($query);	
	$user_id=mysql_result($query_run,0);
	$query="CREATE TABLE `follow".injection($user_id)."` (`follow_id` INT(11) AUTO_INCREMENT PRIMARY KEY,`user_id` INT(11) NOT NULL,`sent` INT(1) NOT NULL DEFAULT 1,`confirm` INT(1) NOT NULL DEFAULT 0)";
	$query_run=mysql_query($query);
	$query="CREATE TABLE `following".injection($user_id)."` (`following_id` INT(11) AUTO_INCREMENT PRIMARY KEY,`user_id` INT(11) NOT NULL,`received` INT(1) NOT NULL DEFAULT 1,`confirm` INT(1) NOT NULL DEFAULT 0)";
	$query_run=mysql_query($query);
	$query="CREATE TABLE `notification".injection($user_id)."` (`notify_id` INT(11) AUTO_INCREMENT PRIMARY KEY,`message` VARCHAR(1024) NOT NULL,`seen` INT(1) NOT NULL DEFAULT 0)";
	$query_run=mysql_query($query);
}
 
function count_user(){
	$query="SELECT COUNT(`user_id`) FROM `user` WHERE `active`='1'";
	$query_run=mysql_query($query);
	return mysql_result($query_run,0);
}

function user_data($user_id){
	$data= array();
	$user_id=(int)$user_id;
	$func_num_args=func_num_args();
	$func_get_args=func_get_args();
	if($func_num_args>1){
		unset($func_get_args[0]);
	}
	$field="`".implode("`,`",$func_get_args)."`";
	$query="SELECT $field FROM `user` WHERE `user_id`='$user_id'";
	$query_run=mysql_query($query);
	$data=mysql_fetch_assoc($query_run);
	return $data;
}

function loggedin(){
	return isset($_SESSION['user_id'])?true:false;
}

function user_exists($username){ 
	$username = injection($username);
	$query="SELECT COUNT(`user_id`) FROM `user` WHERE `username`='$username'";
	$query_run=mysql_query($query);
	return mysql_result($query_run,0)==1?true:false;
}

function email_exists($email){ 
	$email = injection($email);
	$query="SELECT COUNT(`user_id`) FROM `user` WHERE `email`='$email'";
	$query_run=mysql_query($query);
	return mysql_result($query_run,0)==1?true:false;
}

function user_active($username){ 
	$username = injection($username);
	$query="SELECT COUNT(`user_id`) FROM `user` WHERE `username`='$username' AND `active`='1'";
	$query_run=mysql_query($query);
	return mysql_result($query_run,0)==1?true:false;
}

function user_id_from_email($email){
	$email = injection($email);
	$query="SELECT `user_id` FROM `user` WHERE `email`='$email'";
	$query_run=mysql_query($query);
	return mysql_result($query_run,0,'user_id');
}

function user_id_from_username($username){
	$username = injection($username);
	$query="SELECT `user_id` FROM `user` WHERE `username`='$username'";
	$query_run=mysql_query($query);
	return mysql_result($query_run,0,'user_id');
}

function login($username,$password){
	$user_id = user_id_from_username($username);
	$username = injection($username);
	$password = md5(injection($password));
	$query="SELECT COUNT(`user_id`) FROM `user` WHERE `username`='$username' AND `password`='$password'";
	$query_run=mysql_query($query);
	return (mysql_result($query_run,0)==1)? $user_id:false;
}