<div style="min-height:600px;">
<?php
$user_id=$user_data['user_id'];
$query="UPDATE `notification".$user_id."` SET `seen` = 1 WHERE `seen`=0";
$query_run=mysql_query($query);
if(isset($_GET['seen']) && !empty($_GET['seen'])){
	$notify_id=injection($_GET['seen']);
	$query="UPDATE `notification".$user_id."` SET `seen` = 2 WHERE `notify_id`=".$notify_id;
	$query_run=mysql_query($query);
	header("Location:events.php?mode=notification");
}else if(isset($_GET['remove']) && !empty($_GET['remove'])){
	$notify_id=injection($_GET['remove']);
	$query="DELETE FROM `notification".$user_id."` WHERE `notify_id`=".$notify_id;
	$query_run=mysql_query($query);
	header("Location:events.php?mode=notification");
}else if(isset($_GET['message']) && !empty($_GET['message'])){
	$notify_id=injection($_GET['message']);
	$query="SELECT * FROM `notification".$user_id."` WHERE `notify_id`=".$notify_id;
	$query_run=mysql_query($query);
	$row=mysql_fetch_array($query_run,MYSQL_ASSOC);
	$message=$row['message'];
	$seen=(int)$row['seen'];
	$query="UPDATE `notification".$user_id."` SET `seen` = 2 WHERE `notify_id`=".$notify_id;
	$query_run=mysql_query($query);
	?>
	<div>
		<a href="<?php echo "events.php?mode=notification&&remove=".$notify_array[$i];?>"><div style="float:left;background-color:white;padding:0px 5px 0px 5px;margin-right:10px;">Remove</div></a><br>
		<p><?php echo $message;?></p>
	</div>
	<?php
}else{
	$query="SELECT * FROM `notification".$user_id."` ORDER BY `notify_id` DESC";
	$query_run=mysql_query($query);
	$notify_array=array();
	$message_array=array();
	$seen_array=array();
	while($row=mysql_fetch_array($query_run,MYSQL_ASSOC)){
		$notify_array[]=$row['notify_id'];
		$message_array[]=$row['message'];
		$seen_array[]=(int)$row['seen'];
	}
	for($i=0;$i<count($notify_array);$i++){
		?>
		<div style="background-color:black;padding:20px;margin:5px;"><br><br>
			<?php echo $message_array[$i];
			if($seen_array[$i]!=2){
			?>
				<a href="<?php echo "events.php?mode=notification&&seen=".$notify_array[$i];?>"><div style="float:left;background-color:white;padding:0px 5px 0px 5px;margin-right:10px;">Marked As Seen</div></a><br><br>
			<?php
			}else{
				?>
				<div style="float:left;background-color:white;padding:0px 5px 0px 5px;margin-right:10px;">Seen</div><br><br>
				<?php
			}
			?>
			<a href="<?php echo "events.php?mode=notification&&remove=".$notify_array[$i];?>"><div style="float:left;background-color:white;padding:0px 5px 0px 5px;margin-right:10px;">Remove</div></a><br><br>
		</div>
		<?php
	}
}
?>
</div>