<div id="wrapper">
<?php
include 'core/init.php';
redirect_loggedin();
include 'includes/overall/header.php'; 
if(!empty($_POST)){
	$required_fields=array("username","password","confirm_password","firstname","email");
	foreach($_POST as $key => $value){
		if(empty($value) && in_array($key,$required_fields)){
			$error[]="Fields marked as asterisk(*) are required!";
			break ;
		}
	}
	if(empty($error)){
		if(user_exists($_POST['username'])){
			$error[]="Sorry, the username '".$_POST['username']."' is already exists.<br>Please try with another username.";
		}
		if(preg_match("/\\s/",$_POST['username'])){
			$error[]="Your username must not contain any spaces.";
		}
		if(strlen($_POST['password']) < 8){
			$error[]="Your password contain atleast 8 characters.";
		}
		if($_POST['password']!==$_POST['confirm_password']){
			$error[]="Your passwords do not match.";
		}
		if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
			$error[]="A valid email address is required.";
		}
		if(email_exists($_POST['email'])){
			$error[]="Sorry, the email '".$_POST['email']."' is already in use.<br>Please try with another email.";
		}
	}
}

?>
<?php
if(isset($_GET['success']) && empty($_GET['success'])){
	echo "You have registered successfully!<br>Please, check your email to activate your account.";
}else{
	if(!empty($_POST) && empty($error)){
		$register_data=array(
			'username' => $_POST['username'],
			'password' =>$_POST['password'],
			'firstname'=>$_POST['firstname'],
			'lastname'=>$_POST['lastname'],
			'email'=>$_POST['email'],
			'email_code'=>md5($_POST['username']+microtime()),
		);
		register_user($register_data);
		header('Location:register.php?success');
		exit();
	}else if(!empty($error)){
		echo output_error($error);
	}
}
include 'includes/overall/footer.php'; 
?>
</div>