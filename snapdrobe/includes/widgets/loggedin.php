<div class="widget">
<h2>Hello, <?php echo $user_data['firstname']; ?> ! </h2>
<div class="inner">
<div class="profile">

<?php
if(isset($_FILES['profile'])){
	if(empty($_FILES['profile']['name'])){
		echo 'Please, choose a file!';
	}else{ 
		$allowed=array("jpg","jpeg","png","gif");
		
		$file_name=$_FILES['profile']['name'];
		$file_ext=strtolower(end(explode(".",$file_name)));
		$file_temp=$_FILES['profile']['tmp_name'];
		if(in_array($file_ext,$allowed)){
			change_profile_image($session,$file_temp,$file_ext);
			header("Location:index.php");
			exit();
		}else{
			echo "Incorrect file type.Allowed : ";
			echo implode(", ",$allowed);
		}
	}
}
if(!empty($user_data['profile'])){
	echo '<img src="', $user_data['profile'], '" alt="', $user_data['firstname'], '\'s Profile Image">';
}
?>
<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="profile" ><br/><br/><input type="submit">
</form>
</div>
<ul>
<li><a href='logout.php'> Log out</a></li>
<li><a href='<?php echo "/log/".$user_data['username']; ?>'> Profile</a></li>
<li><a href='changepassword.php'> Change password</a></li>
<li><a href='setting.php'> Settings</a></li>
</ul>
</div>
</div>