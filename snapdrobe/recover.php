<?php
include 'core/init.php';
redirect_loggedin();
include 'includes/overall/header_recover.php'; 
?>
<?php 
$mode_allowed=array('username','password');
if(isset($_GET['success']) && empty($_GET['success'])){
	echo "Thanks, we mailed you.";
}else{
	if(isset($_GET['mode']) && in_array($_GET['mode'],$mode_allowed)){
		if(isset($_POST['email']) && !empty($_POST['email'])){
			if(email_exists($_POST['email'])){
				recover($_GET['mode'],$_POST['email']);
				header("Location:recover.php?success");
				exit();
			}else{
				?>
				<p>Oops, this email does not registered.</p>
				<?php
			}
		}else if(isset($_POST['email']) && empty($_POST['email'])){
			?>
			<p>Field marked as asterisk(*) is required!</p>
			<?php
		}
	include 'includes/widgets/recover.php';	
	}else{
		header("Location:index.php");
		exit();
	}
}
include 'includes/overall/footer_recover.php';
?>