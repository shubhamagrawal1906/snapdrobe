<?php
if(!empty($_POST)&&isset($_GET['updatechange'])){
	$required_field=array("firstname","email");
	foreach($_POST as $key=>$value){
		if(empty($value) && in_array($key,$required_field)){
			$error[]="Fields marked as asterisk(*) are required!";
			break;
		}
	}
	if(empty($error)){
		if(!is_numeric($_POST['mobile'])||strlen($_POST['mobile'])<10){
			$error[]="It seems to be you do not enter right mobile number.";
		}
		if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
			$error[]="A valid email address is required.";
		}else if(email_exists($_POST['email']) && $_POST['email']!==$user_data['email']){
			$error[]="Sorry, the email '".$_POST['email']."' is already in use.<br>Please try with another email.";
		}
	}
}else if(!empty($_POST)&&isset($_GET['change_passwordchange'])){
	$required_field=array("current_password","password","confirm_password");
	foreach($_POST as $key => $value){
		if(empty($value) && in_array($key,$required_field)){
			$error[]="Fields marked as asterisk(*) are required!";
			break;
		}
	}
	if(empty($error)){
		if(md5($_POST['current_password'])===$user_data['password']){
			if(trim($_POST['password'])!==trim($_POST['confirm_password'])){
				$error[]="Your new passwords do not match.";
			}else if(strlen($_POST['password']) < 8){
				$error[]="Your password contain atleast 8 characters.";
			}
		}		
	}else{
		$error[]="Your current password is incorrect.";
	}	
}else if(isset($_GET['profile']) && empty($_GET['profile'])){
	if($_FILES["profile_file"]["error"]>0){
		$error[]="No File Uploaded or Invalid File<br>";
		$error[]="Error Code:".$_FILES["profile_file"]["error"];
	}
}
?>
<?php
if(isset($_GET['success']) && empty($_GET['success'])){
	echo "You have been updated your setting successfully !";
} else{
	if((!empty($_POST) || !empty($_FILES)) && empty($error)){
		if(isset($_GET['biochange']) && empty($_GET['biochange'])){
			$update_data=array(
			'bio'=>$_POST['bio'],
			);
			update_user($session,$update_data);
			header("Location:events.php?mode=setting&&success");
			exit();
		}else if(isset($_GET['updatechange']) && empty($_GET['updatechange'])){
			$update_data=array(
			'firstname'=>$_POST['firstname'],
			'lastname'=>$_POST['lastname'],
			'date'=>$_POST['date'],
			'gender'=>$_POST['gender'],
			'city'=>$_POST['city'],
			'mobile'=>$_POST['mobile'],
			'home'=>$_POST['home'],
			'email'=>$_POST['email'],
			'interest'=>$_POST['interest'],
			'relation'=>$_POST['relation'],
			'education'=>$_POST['education'],
			'profession'=>$_POST['profession'],
			'allow_email'=>$_POST['allow_email']=="on"?1:0,
			);
			update_user($session,$update_data);
			header("Location:events.php?mode=setting&&success");
			exit();
		}else if(isset($_GET['change_passwordchange']) && empty($_GET['change_passwordchange'])){
			if(isset($_GET['force']) && empty($_GET['force'])){
				echo "You must change your now that you have requested.";
			}
			if(!empty($_POST) && empty($error)){
			change_password($session,$_POST['password']);
			header('Location:events.php?mode=setting&&success');
			exit();
			}
		}else if(isset($_GET['profile']) && empty($_GET['profile'])){
			if(isset($_FILES['profile_file']) && !empty($_FILES['profile_file'])){
				$tags="#Profile#".$user_data['firstname']."#".$user_data['username'];
				$tags=injection($tags."#");
				$file_size=injection($_FILES["profile_file"]["size"]/(1024*1024));
				$file_ext=strtolower(end(explode(".",$_FILES["profile_file"]["name"])));
				$file_temp=$_FILES["profile_file"]["tmp_name"];
				$file_path=injection("images/".substr(md5(time()),0,20)."_".$_FILES["profile_file"]["name"]);
				move_uploaded_file($file_temp,$file_path);
				$query="INSERT INTO `photo`(`user_id`,`tags`,`path`,`size`,`ext`) VALUES('".$user_data['user_id']."','".$tags."','".$file_path."','".$file_size."','".$file_ext."')";
				$query_run = mysql_query($query);
				if($query_run){
					$update_data=array(
					'profile'=>$file_path,
					);
					update_user($session,$update_data);
					header("Location:events.php?mode=setting&&success");
					exit();					
				}
				echo "Server has some connection issue!";
			}
		}
	}else if(!empty($error)){
		echo output_error($error);
	}
	include 'includes/widgets/setting.php';
}
?>