<div id="wrapper">
<?php
include 'core/init.php';
redirect_loggedin();
if(!empty($_POST)){
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	if(empty($username)||empty($password)){
		$error[]="You need to enter the username and password!";
	}else if(!user_exists($username)){
		$error[]="We can't find the username!<br>Have you registered?";
	}else if(!user_active($username)){
		$error[]="You haven't activated your account!";
	}else{
		if(strlen($password)>32){
			$error[]="Password length is too long.";
		}
		$login=login($username,$password);
		if($login==false){
			$error[]="Your password or username is incorrect!";
		}else{
			$_SESSION['user_id']=$login;
			header('Location:index.php');
			exit();
		}
	}
}else{
	$err="No data received";
}

include 'includes/overall/header.php';
if(empty($error)){
	?>
	<h2>We are try to connect but......</h2>
	<?php
	echo $err;
}	
else{
	echo output_error($error);
}	

include 'includes/overall/footer.php';
?>
<div id="wrapper">