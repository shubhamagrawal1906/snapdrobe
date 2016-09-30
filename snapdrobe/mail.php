<?php
include 'core/init.php';
protect_page();
admin_protect();
include 'includes/overall/header.php'; 
?>
<h1>Email all users...</h1>
<?php
if(isset($_GET['success']) && empty($_GET['success'])){
	echo "Email has been sent.";
}else{
	if(!empty($_POST)){
		if(empty($_POST['subject'])){
			$error[]="Subject is required.";
		}
		if(empty($_POST['body'])){
			$error[]="Body is required.";
		}
		if(!empty($error)){
			echo output_error($error);
		}else{
			mail_users($_POST['subject'],$_POST['body']);
			header("Location:mail.php?success");
			exit();
		}
	}
	?>
	<form action="" method="POST">
	<ul>
	<li>
	Subject* :<br/>
	<input type="text" name="subject">
	</li>
	<li>
	Body* :<br/>
	<textarea name="body"></textarea>
	</li>
	<li>
	<input type="submit" value="Send">
	</li>
	</ul>
	</form>
	<?php
}
include 'includes/overall/footer.php';
?>