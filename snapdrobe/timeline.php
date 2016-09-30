<h1 align="center">GALLARY</h1>
<hr noshade size="3">
<div id="thediv">
<?php
if(isset($_GET['photo_id'])&&!empty($_GET['photo_id'])){
	$photo_id=injection($_GET['photo_id']);
	$query="SELECT COUNT(`view_id`) FROM `photo_view` WHERE `photo_id`='$photo_id' AND `user_id`='".injection($user_data['user_id'])."'";
	$query_run=mysql_query($query);
	if(mysql_result($query_run,0)==0){
		$query="INSERT INTO `photo_view`(`photo_id`,`user_id`) VALUES ('$photo_id','".injection($user_data['user_id'])."')";
		$query_run=mysql_query($query);
		$query="SELECT COUNT(`photo_id`) FROM `photo_view` WHERE `photo_id`='$photo_id'";
		$query_run=mysql_query($query);
		$count=mysql_result($query_run,0);
		$query="UPDATE `photo` SET `view`='".injection($count)."' WHERE `photo_id`='$photo_id'";
		$query_run=mysql_query($query);
	}
	$query="SELECT `path`,`ext`,`view`,`tags`,`likes` FROM `photo` WHERE `photo_id`='$photo_id'";
	$query_run=mysql_query($query);
	$row=mysql_fetch_array($query_run,MYSQL_ASSOC);
	$file_path=injection($row['path']);
	$file_ext=injection($row['ext']);
	$file_view=injection($row['view']);
	$file_tags=injection($row['tags']);
	$file_like= injection($row['likes']);
	$file_tags=rtrim($file_tags,'#');
	$query="SELECT `user_id` FROM `photo` WHERE `photo_id`='$photo_id'";
	$query_run=mysql_query($query);
	$check_user_id=mysql_result($query_run,0);
	
	$query="SELECT `photo_id` FROM `photo`ORDER BY `view` DESC,`tags`";
	$query_run=mysql_query($query);
	
	while($row=mysql_fetch_array($query_run,MYSQL_ASSOC)){
		$file_photoid[]= $row['photo_id'];
		}
	$key=array_search($photo_id,$file_photoid);
	?>
	<b style="background-color:grey;color:white;float:right;cursor:hand;" onclick="load('events.php?mode=timeline','adiv');">&nbsp;X&nbsp;</b>
	<h1><?php echo $file_tags;?></h1>
	<img src="<?php echo $file_path; ?>" alt="<?php echo $file_tags;?>" style="margin:50px;"><br>
	View <?php echo $file_view;?>&nbsp;&nbsp;&nbsp;
	<?php
	$count=$file_like;
	echo " ";
	include 'like.php';
	?>
	<?php
	if($check_user_id===$user_data['user_id']){
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<span class="clickbutton" onclick="load('<?php echo 'events.php?mode=timeline&&delete='.$photo_id;?>','adiv');">Delete</span>
<?php
	}
	$pre=$key-1;
	$next=$key+1;
	?>
	<br><br><br><br>
	<?php
	if($pre>=0){
	?>
	<b onclick="load('<?php echo 'events.php?mode=timeline&&photo_id='.$file_photoid[$pre];?>,'adiv');"><p style="font-size:20px;float:left;">&lArr; Previous</p></b>
	<?php
	}
	if($next<count($file_photoid)){
	?>
	<b onclick="load('<?php echo 'events.php?mode=timeline&&photo_id='.$file_photoid[$next];?>,'adiv');"><p style="font-size:20px;float:right;">Next &rArr;</p></b>
	<?php
	}
}else if(isset($_GET['delete'])&&!empty($_GET['delete'])){
	$photo_id=injection($_GET['delete']);
	$query="SELECT `path` FROM `photo` WHERE `photo_id`='$photo_id'";
	$query_run=mysql_query($query);
	$file_delete=mysql_result($query_run,0);
	unlink($file_delete);
	$query="DELETE FROM `photo` WHERE `photo_id`='$photo_id'";
	$query_run=mysql_query($query);
	$query="DELETE FROM `photo_view` WHERE `photo_id`='$photo_id'";
	$query_run=mysql_query($query);
	$query="DELETE FROM `photo_likes` WHERE `photo_id`='$photo_id'";
	$query_run=mysql_query($query);
	header('Location:events.php?mode=timeline');
}else{
?>
<div class="content">
	<?php
$file_path=array();
$file_ext=array();
$file_photoid=array();
$file_view=array();
$file_like=array();
$file_tags=array();
if(isset($_GET['search'])&&!empty($_GET['search'])){
	$search=trim($_GET['search'],'#');
	$array_search=array();
	$first_search="#".$search."#";
	$array_search=explode("#",$search);
	$search="#".implode("#|#",$array_search)."#";
	$query="SELECT `path`,`ext`,`photo_id`,`view`,`tags`,`likes` FROM `photo` WHERE `tags` REGEXP '$first_search' ORDER BY `view` DESC,`tags`";
	$query_run=mysql_query($query);
		while($row=mysql_fetch_array($query_run,MYSQL_ASSOC)){
		$file_path[]= $row['path'];
		$file_ext[]= $row['ext'];
		$file_photoid[]= $row['photo_id'];
		$file_view[]= $row['view'];
		$file_like[]= $row['likes'];
		$file_tags[]= rtrim($row['tags'],'#');
	}
	$query="SELECT `path`,`ext`,`photo_id`,`view`,`tags`,`likes` FROM `photo` WHERE `tags` REGEXP '$search&(^$first_search)' ORDER BY `view` DESC,`tags`";
	$query_run=mysql_query($query);
}else{
	$query="SELECT `path`,`ext`,`photo_id`,`view`,`tags`,`likes` FROM `photo`ORDER BY `view` DESC,`tags`";
	$query_run=mysql_query($query);
}
while($row=mysql_fetch_array($query_run,MYSQL_ASSOC)){
	$file_path[]= $row['path'];
	$file_ext[]= $row['ext'];
	$file_photoid[]= $row['photo_id'];
	$file_view[]= $row['view'];
	$file_like[]= $row['likes'];
	$file_tags[]= rtrim($row['tags'],'#');
}?>

<div class="images" align="center">
     <ul><?php
for($i=0;$i<count($file_path);$i++){
	?>
	<li>
		<div class="viewport">
			<h2><?php echo $file_tags[$i];?></h2>
			<img src="<?php echo $file_path[$i]; ?>" alt="<?php echo $file_tags[$i];?>" height="250px" width="375px" onclick="load('<?php echo 'events.php?mode=timeline&&photo_id='.$file_photoid[$i]; ?>','adiv'); ">
			<a href="#" class="info" onclick="load('<?php echo 'events.php?mode=timeline&&photo_id='.$file_photoid[$i]; ?>','adiv'); "><br>View Image</a>
				<p>View
<?php
echo $file_view[$i];
$photo_id=$file_photoid[$i];
$count=$file_like[$i];
echo " ";
include 'like.php';
?>
</p>
		</div></li>
		<?php
}
?>
</ul>
</div>
  <hr noshade>
     <center>
    <div class="ftimages">
	
     <ul>
      	<li>
		<?php
		$array=array();
		$query="SELECT `user_id` FROM `follow".$user_data['user_id']."`";
		$query_run=mysql_query($query);
		while($row=mysql_fetch_array($query_run)){
			$array[]=$row['user_id'];
		}
		$array[]=$user_data['user_id'];
		$string="'".implode("','",$array)."'";
		
		$query="SELECT `photo_id`,`path`,`ext`,`view`,`likes`,`tags` FROM `photo` WHERE `user_id` IN (".$string.") AND `view`=(SELECT MAX(`view`) FROM `photo` WHERE `user_id` IN (".$string.")) ORDER BY `photo_id` DESC LIMIT 1";
		$query_run=mysql_query($query);
		$row=mysql_fetch_array($query_run,MYSQL_ASSOC);
		$file_path= $row['path'];
		$file_ext= $row['ext'];
		$file_photoid= $row['photo_id'];
		$file_view= $row['view'];
		$file_like= $row['likes'];
		$file_tags= rtrim($row['tags'],'#');
		
		?>
		<div class="view view-sixth newview" >
			<img src="<?php echo $file_path; ?>" alt="<?php echo $file_tags;?>" height="335px" width="525px" onclick="load('<?php echo 'events.php?mode=timeline&&photo_id='.$file_photoid; ?>','adiv'); ">
			<div class="mask newmask">
				<h2><?php echo $file_tags;?></h2>
				<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.<br>MOST VIEWED</p>
				<a href="#" class="info" onclick="load('<?php echo 'events.php?mode=timeline&&photo_id='.$file_photoid; ?>','adiv'); ">View Image</a>
				<br><br><br><br><br><br><br><p>View
<?php
echo $file_view;
$photo_id=$file_photoid;
$count=$file_like;
echo " ";
include 'like.php';
?>
</p>
		</div>
		</div></li>
		
		<li>
		<?php
		$query="SELECT `photo_id`,`path`,`ext`,`view`,`likes`,`tags` FROM `photo` WHERE `user_id` IN (".$string.") AND `likes`=(SELECT MAX(`likes`) FROM `photo` WHERE `user_id` IN (".$string.")) ORDER BY `photo_id` DESC LIMIT 1";
		$query_run=mysql_query($query);
		$row=mysql_fetch_array($query_run);
		$file_path= $row['path'];
		$file_ext= $row['ext'];
		$file_photoid= $row['photo_id'];
		$file_view= $row['view'];
		$file_like= $row['likes'];
		$file_tags= rtrim($row['tags'],'#');
		
		?>
		<div class="view view-sixth newview" >
			<img src="<?php echo $file_path; ?>" alt="<?php echo $file_tags;?>" height="335px" width="525px" onclick="load('<?php echo 'events.php?mode=timeline&&photo_id='.$file_photoid; ?>','adiv'); ">
			<div class="mask newmask">
				<h2><?php echo $file_tags;?></h2>
				<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.<br>MOST LIKED</p>
				<a href="#" class="info" onclick="load('<?php echo 'events.php?mode=timeline&&photo_id='.$file_photoid; ?>','adiv'); ">View Image</a>
				<br><br><br><br><br><br><br><p>View
<?php
echo $file_view;
$photo_id=$file_photoid;
$count=$file_like;
echo " ";
include 'like.php';
?>
</p>
		</div>
		</div></li>

     </ul>
   </div>
   </center>         
<?php
}
?>
</div>