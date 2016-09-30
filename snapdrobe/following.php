<div style="min-height:600px;width:97%;">
<?php
$user_id=$user_data['user_id'];
$follow="follow".$user_id;
$following="following".$user_id;
$user_id_follow=array();
$user_id_follow1=array();
?>
<div style="width:100%;height:35px; padding-right:20px;">
<span style="float:right;padding:10px;">
<a href="events.php?mode=following&&follows"><div style="" class="pic1"><div class="text" >Followings</div></div></a>
<a href="events.php?mode=following&&followers"><div style="" class="pic2"><div class="text" >Followers</div></div></a>
</span>
</div>
<?php
if(isset($_GET['reject']) && !empty($_GET['reject']) && isset($_GET['following_mode']) && !empty($_GET['following_mode'])){
	$following_mode=$_GET['following_mode'];
	$user_id_reject=$_GET['reject'];
	$query="DELETE FROM `".$following."` WHERE `user_id`='".$user_id_reject."'";
	$query_run=mysql_query($query);
	$query="DELETE FROM `follow".$user_id_reject."` WHERE `user_id`='".$user_id."'";
	$query_run=mysql_query($query);
	redirect_following_mode($following_mode,$user_id_reject);
}else if(isset($_GET['accept']) && !empty($_GET['accept']) && isset($_GET['following_mode']) && !empty($_GET['following_mode'])){
	$following_mode=$_GET['following_mode'];
	$user_id_accept=$_GET['accept'];
	$query="UPDATE `".$following."` SET `confirm`= 1 WHERE `user_id`='".$user_id_accept."'";
	$query_run=mysql_query($query);
	$query="UPDATE `follow".$user_id_accept."` SET `confirm`= 1 WHERE `user_id`='".$user_id."'";
	$query_run=mysql_query($query);
	redirect_following_mode($following_mode,$user_id_accept);
}else if(isset($_GET['cancel']) && !empty($_GET['cancel']) && isset($_GET['following_mode']) && !empty($_GET['following_mode'])){
	$following_mode=$_GET['following_mode'];
	$user_id_cancel=$_GET['cancel'];
	$query="DELETE FROM `".$follow."` WHERE `user_id`='".$user_id_cancel."'";
	$query_run=mysql_query($query);
	$query="DELETE FROM `following".$user_id_cancel."` WHERE `user_id`='".$user_id."'";
	$query_run=mysql_query($query);
	redirect_following_mode($following_mode,$user_id_cancel);
}else if(isset($_GET['follow']) && !empty($_GET['follow']) && isset($_GET['following_mode']) && !empty($_GET['following_mode'])){
	$following_mode=$_GET['following_mode'];
	$user_id_follow=$_GET['follow'];
	$query="INSERT INTO `".$follow."`(`user_id`) VALUES('$user_id_follow')";
	$query_run=mysql_query($query);
	$query="INSERT INTO `following".$user_id_follow."`(`user_id`) VALUES('$user_id')";
	$query_run=mysql_query($query);
	redirect_following_mode($following_mode,$user_id_follow);
}else if(isset($_GET['search']) && !empty($_GET['search'])){
	$following_mode="search";
	$username=injection($_GET['search']);
	$query="SELECT DISTINCT `user_id` FROM `user` WHERE concat(`firstname`,' ',`lastname`) = '".$username."' OR `firstname` = '".$username."' OR `username` = '".$username."'";
	$query_run=mysql_query($query);
	if(!$query_run)
		echo mysql_error();		
	while($row2=mysql_fetch_array($query_run,MYSQL_ASSOC)){
		$user_id_follow[]=$row2['user_id'];
	}
	for($i=0;$i<count($user_id_follow);$i++){
		$query="SELECT * FROM `user` WHERE `user_id`=".$user_id_follow[$i];
		$query_run=mysql_query($query);
		$id_follow_user=$user_id_follow[$i];
		include 'includes/widgets/following.php';
	}
	if(count($user_id_follow)==0){
		echo 'No user is present with this name.';
	}
}else if(isset($_GET['send_request']) && empty($_GET['send_request'])){
	?>
	<h2>Send Request</h2>
	<?php
	$following_mode="send_request";
	$query="SELECT * FROM `".$follow."` WHERE `sent` !=`confirm`";
	$query_run=mysql_query($query);
	while($row2=mysql_fetch_array($query_run,MYSQL_ASSOC)){
		$user_id_follow[]=$row2['user_id'];
	}	
	for($i=0;$i<count($user_id_follow);$i++){
		$query="SELECT * FROM `user` WHERE `user_id`=".$user_id_follow[$i];
		$query_run=mysql_query($query);
		$id_follow_user=$user_id_follow[$i];
		include 'includes/widgets/following.php';
	}
}else if(isset($_GET['received_request']) && empty($_GET['received_request'])){
	?>
	<h2>Received Request</h2>
	<?php
	$following_mode="received_request";
	$query="SELECT * FROM `".$following."` WHERE `received`!=`confirm`";
	$query_run=mysql_query($query);
	while($row2=mysql_fetch_array($query_run,MYSQL_ASSOC)){
		$user_id_follow[]=$row2['user_id'];
	}	
	for($i=0;$i<count($user_id_follow);$i++){
		$query="SELECT * FROM `user` WHERE `user_id`=".$user_id_follow[$i];
		$query_run=mysql_query($query);
		$id_follow_user=$user_id_follow[$i];
		include 'includes/widgets/following.php';
	}
		
}else if(isset($_GET['follows']) && empty($_GET['follows'])){
	?>
	<div style="float:left;width:450px;padding:15px;margin:20px;">
	<h2>Followings</h2>
	<?php
	$following_mode="follows";
	$query="SELECT * FROM `".$follow."` WHERE `sent` =`confirm`";
	$query_run=mysql_query($query);
	while($row2=mysql_fetch_array($query_run,MYSQL_ASSOC)){
		$user_id_follow[]=$row2['user_id'];
	}
	for($i=0;$i<count($user_id_follow);$i++){
		$query="SELECT * FROM `user` WHERE `user_id`=".$user_id_follow[$i];
		$query_run=mysql_query($query);
		$id_follow_user=$user_id_follow[$i];
		include 'includes/widgets/following.php';
	}	
	?>
	</div>
	<aside style="width:350px;float:right;/*border-left:1px dashed #aaa;*/padding:15px;margin:20px">
	<a href="events.php?mode=following&&send_request"><h3>Send Request</h3></a>
	<?php
	$query="SELECT * FROM `".$follow."` WHERE `sent` !=`confirm`";
	$query_run=mysql_query($query);
	while($row2=mysql_fetch_array($query_run,MYSQL_ASSOC)){
		$user_id_follow1[]=$row2['user_id'];
	}	
	for($i=0;$i<count($user_id_follow1);$i++){
		$query="SELECT * FROM `user` WHERE `user_id`=".$user_id_follow1[$i];
		$query_run=mysql_query($query);
		$id_follow_user=$user_id_follow1[$i];
		include 'includes/widgets/following.php';
	}
	?>
	</aside>
	<?php
}else if(isset($_GET['followers']) && empty($_GET['followers'])){
	?>
	<div style="float:left;width:450px;padding:15px;margin:20px;">
	<h2>Followers</h2>
	<?php
	$following_mode="followers";
	$query="SELECT * FROM `".$following."` WHERE `received`=`confirm`";
	$query_run=mysql_query($query);
	while($row2=mysql_fetch_array($query_run,MYSQL_ASSOC)){
		$user_id_follow[]=$row2['user_id'];
	}	
	for($i=0;$i<count($user_id_follow);$i++){
		$query="SELECT * FROM `user` WHERE `user_id`=".$user_id_follow[$i];
		$query_run=mysql_query($query);
		$id_follow_user=$user_id_follow[$i];
		include 'includes/widgets/following.php';
	}
	?>
	</div>
	<aside style="width:350px;float:right;/*border-left:1px dashed #aaa*/;padding:15px;margin:20px">
	<a href="events.php?mode=following&&received_request"><h3>Received Request</h3></a>
	<?php
	$query="SELECT * FROM `".$following."` WHERE `received` !=`confirm`";
	$query_run=mysql_query($query);
	while($row2=mysql_fetch_array($query_run,MYSQL_ASSOC)){
		$user_id_follow1[]=$row2['user_id'];
	}	
	for($i=0;$i<count($user_id_follow1);$i++){
		$query="SELECT * FROM `user` WHERE `user_id`=".$user_id_follow1[$i];
		$query_run=mysql_query($query);
		$id_follow_user=$user_id_follow1[$i];
		include 'includes/widgets/following.php';
	}
	?>
	</aside>
	<?php
}
?>
</div>