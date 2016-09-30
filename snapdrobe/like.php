<span id="<?php echo 'likes'.$photo_id;?>"><?php
if(isset($_GET['like']) && !empty($_GET['like'])){
	include 'core/init.php';
	redirect_not_loggedin();
	$photo_id=injection($_GET['like']);
	$query="SELECT COUNT(`like_id`) FROM `photo_likes` WHERE `photo_id`='$photo_id' AND `user_id`='".injection($user_data['user_id'])."'";
	$query_run=mysql_query($query);
	if(mysql_result($query_run,0)==0){
		$query="INSERT INTO `photo_likes`(`photo_id`,`user_id`) VALUES ('$photo_id','".injection($user_data['user_id'])."')";
		$query_run=mysql_query($query);
	}else if(mysql_result($query_run,0)==1){
		$query="DELETE FROM `photo_likes` WHERE `photo_id`='$photo_id' AND `user_id`='".injection($user_data['user_id'])."'";
		$query_run=mysql_query($query);
	}
	$query="SELECT COUNT(`photo_id`) FROM `photo_likes` WHERE `photo_id`='$photo_id'";
	$query_run=mysql_query($query);
	$count=mysql_result($query_run,0);
	$query="UPDATE `photo` SET `likes`='".injection($count)."' WHERE `photo_id`='$photo_id'";
	$query_run=mysql_query($query);
}
$query="SELECT COUNT(`like_id`) FROM `photo_likes` WHERE `photo_id`='$photo_id' AND `user_id`='".injection($user_data['user_id'])."'";
$query_run=mysql_query($query);
if(mysql_result($query_run,0)==0)
	$c="Like";
else
	$c="Unlike";
?>&nbsp;&nbsp;<span class="clickbutton" onclick="load('<?php echo 'like.php?like='.$photo_id;?>','<?php echo 'likes'.$photo_id;?>');"><?php echo $c;?> </span>
<?php echo $count;?></span>
