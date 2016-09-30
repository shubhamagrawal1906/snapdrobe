<?php
include 'core/init.php';
redirect_loggedin();
include 'includes/overall/header.php';
if(isset($_GET['success']) && empty($_GET['success'])){
	?>
	<h1>Thanks, we have activated your account....</h1>
	<p>You are free to log in !</p>
	<?php
}else if(isset($_GET['email'],$_GET['email_code'])){
	
	$email=trim($_GET['email']);
	$email_code=trim($_GET['email_code']);
	
	if(!email_exists($email)){
		$error[]="Oops, something went wrong, and we couldn't find that email address!";
	}else if(!activate($email,$email_code)){
		$error[]="We had problems while activating your account!";
	}
	
	if(!empty($error)){
		?>
		<h1>Opps....</h1>
		<?php
		echo output_error($error);
	}else{
		header("Location:activate.php?success");
		exit();
	}
}else{
	header("Location:index.php");
	exit();
}
?>

<?php include 'includes/overall/footer.php'; ?>