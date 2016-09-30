<?php
$row=mysql_fetch_array($query_run,MYSQL_ASSOC);
?>
<div style="background-color:#0fddaf;color:white;padding:20px;margin:5px;"><img src="<?php echo $row['profile']; ?>" alt="profile.jpg" style="weight:50px;height:50px;display:inline-block;padding:0 10px 0 10px;" align="center"><b><?php echo  $row['firstname']." ".$row['lastname'];?></b><br><br>

<?php
if($id_follow_user!=$user_id){
	$query="SELECT COUNT(`following_id`) FROM `".$following."` WHERE `user_id`= '".$id_follow_user."'";
	$query_run=mysql_query($query);
	$exist=mysql_result($query_run,0)==1?true:false;			
	if($exist){
		$query="SELECT `received`,`confirm` FROM `".$following."` WHERE `user_id`= '".$id_follow_user."'";
		$query_run=mysql_query($query);
		$row1=mysql_fetch_array($query_run,MYSQL_ASSOC);
		if($row1['received']==$row1['confirm']){
			
			?>
			<input type="submit" value="Unfollowing" class="clickbutton" onclick="following('<?php echo $following_mode; ?>','<?php echo $id_follow_user; ?>','reject');" style="float:left;background-color:white;padding:0px 5px 0px 5px;">
			<?php
		}else{
			?>
			<input type="submit" value="Accept" class="clickbutton" onclick="following('<?php echo $following_mode; ?>','<?php echo $id_follow_user; ?>','accept');" style="float:left;background-color:white;padding:0px 5px 0px 5px;margin-right:10px;">
			<input type="submit" value="Reject" class="clickbutton" onclick="following('<?php echo $following_mode; ?>','<?php echo $id_follow_user; ?>','reject');" style="float:left;background-color:white;padding:0px 5px 0px 5px;">
			<?php
		}
	}
	$query="SELECT COUNT(`follow_id`) FROM `".$follow."` WHERE `user_id`= '".$id_follow_user."'";
	$query_run=mysql_query($query);
	$exist=mysql_result($query_run,0)==1?true:false;
	if($exist){
		$query="SELECT `sent`,`confirm` FROM `".$follow."` WHERE `user_id`= '".$id_follow_user."'";
		$query_run=mysql_query($query);
		$row1=mysql_fetch_array($query_run,MYSQL_ASSOC);
		if($row1['sent']==$row1['confirm']){
			?>
			<input type="submit" value="Unfollow" class="clickbutton" onclick="following('<?php echo $following_mode; ?>','<?php echo $id_follow_user; ?>','cancel');" style="float:right;background-color:white;padding:0px 5px 0px 5px;">
			<?php
		}else{
			?>
			<input type="submit" value="Cancel" class="clickbutton" onclick="following('<?php echo $following_mode; ?>','<?php echo $id_follow_user; ?>','cancel');" style="float:right;background-color:white;padding:0px 5px 0px 5px;">
			<input type="submit" value="&#10004;Request Sent" class="clickbutton removeclickbutton" style="float:right;background-color:white;padding:0px 5px 0px 5px;margin-right:10px;" disabled>
			<?php
		}
	}else{
		?>
	<input type="submit" value="Follow" class="clickbutton" onclick="following('<?php echo $following_mode; ?>','<?php echo $id_follow_user; ?>','follow');" style="float:right;background-color:white;padding:0px 5px 0px 5px;">
	<?php
	}
}
?><br><br>
username : <?php echo $row['username']?><br>
email : <?php echo $row['email']?>
</div>
