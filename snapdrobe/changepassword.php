<?php
if(!empty($_POST)){
	$required_field=array("current_password","password","confirm_password");
	foreach($_POST as $key => $value){
		if(empty($value) && in_array($key,$required_field)){
			$error[]="Fields marked as asterisk(*) are required!";
			break;
		}
	}
	if(md5($_POST['current_password'])===$user_data['password']){
		if(trim($_POST['password'])!==trim($_POST['confirm_password'])){
			$error[]="Your new passwords do not match.";
		}else if(strlen($_POST['password']) < 8){
			$error[]="Your password contain atleast 8 characters.";
		}
	}else{
		$error[]="Your current password is incorrect.";
	}
}
?>
<h1>Change Password</h1>
<?php
if(isset($_GET['success']) && empty($_GET['success'])){
	echo "You have been changed password successfully!";	
}else{
	if(isset($_GET['force']) && empty($_GET['force'])){
		echo "You must change your now that you have requested.";
	}
	if(!empty($_POST) && empty($error)){
		change_password($session,$_POST['password']);
		header('Location:events.php?mode=changepassword&&success');
		exit();
	}else if(!empty($error)){
		echo output_error($error);	
	}
	include 'includes/widgets/changepassword.php';
}
?>