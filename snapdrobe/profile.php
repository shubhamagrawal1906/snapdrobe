<div class="sideprofile">
   <div class="sidelist">
      <ul><?php
	  if(isset($user_data['firstname']) || isset($user_data['lastname']))
		  echo "<li id='first'>".$user_data['firstname']." ".$user_data['lastname']."</li>";
	  if(isset($user_data['date']))
		  echo "<li id='first'>First Cry On: ".$user_data['date']."</li>";
	  if(isset($user_data['date']))
		  echo "<li id='first'>Lives in : ".$user_data['city']."</li>";
	  if(isset($user_data['profession']))
		  echo "<li id='first'>".$user_data['profession']."</li>";
	  if(isset($user_data['relation']))
		  echo "<li id='first'>".$user_data['relation']."</li>";
	  ?>
      </ul>
      </div>
 
   </div>
<aside style="float:right;margin-top:20px;margin-bottom:20px;">
<?php
$file_path=array();
$file_ext=array();
$file_photoid=array();
$file_view=array();
$file_like=array();
$file_tags=array();
$query="SELECT * FROM `photo` WHERE `user_id`='".$user_data['user_id']."' ORDER BY `photo_id` DESC";
$query_run=mysql_query($query);
		while($row=mysql_fetch_array($query_run,MYSQL_ASSOC)){
		$file_path[]= $row['path'];
		$file_ext[]= $row['ext'];
		$file_photoid[]= $row['photo_id'];
		$file_view[]= $row['view'];
		$file_like[]= $row['likes'];
		$file_tags[]= rtrim($row['tags'],'#');
	}
for($i=0;$i<count($file_path);$i++){
	?>
	<li>
		<div class="view view-sixth">
			<img src="<?php echo $file_path[$i]; ?>" alt="<?php echo $file_tags[$i];?>" height="250px" width="375px" onclick="load('<?php echo 'events.php?mode=timeline&&photo_id='.$file_photoid[$i]; ?>','adiv'); ">
			<div class="mask">
				<h2><?php echo $file_tags[$i];?></h2>
				<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
				<a href="#" class="info" onclick="load('<?php echo 'events.php?mode=timeline&&photo_id='.$file_photoid[$i]; ?>','adiv'); ">View Image</a>
				<p>View
<?php
echo $file_view[$i];
$photo_id=$file_photoid[$i];
$count=$file_like[$i];
echo " ";
include 'like.php';
?>
</p>
		</div>
		</div></li>
		<?php
}
if(isset($_FILES["file"])){
	$file_result="";
	$tag=injection($_POST['#tag']);
	$tags=injection($_POST['#tags']);
	$pos=strpos($tags,'#');
	echo $tags=$tag."".$tags;
	if($_FILES["file"]["error"]>0){
		$file_result.="No File Uploaded or Invalid File<br>";
		$file_result.="Error Code:".$_FILES["file"]["error"];
	}else if(empty($_POST['#tag'])){
		$file_result.="Atleast 1 one # tag is necessary!";
	}else{
		$array=array("\t","\n","\r","\0","\x0B");
		for($i=0;$i<5;$i++)
			$tags=trim($tags,$array[$i]);
		$tags=preg_replace('/\s+/', '', $tags);
		$tags=injection($tags."#");
		$file_size=injection($_FILES["file"]["size"]/(1024*1024));
		$file_ext=strtolower(end(explode(".",$_FILES["file"]["name"])));
		$file_temp=$_FILES["file"]["tmp_name"];
		$file_path=injection("images/".substr(md5(time()),0,20)."_".$_FILES["file"]["name"]);
		move_uploaded_file($file_temp,$file_path);
		$query="INSERT INTO `photo`(`user_id`,`tags`,`path`,`size`,`ext`) VALUES('".$user_data['user_id']."','".$tags."','".$file_path."','".$file_size."','".$file_ext."')";
		$query_run = mysql_query($query);
	}
	if(empty($file_result)){
		header('Location:events.php?mode=profile');
	}else{
		echo $file_result;
	}
}
$option=array('Ceremony','Events','Entertainment','Fests','Festival','Seminar','Sessions','Sports','Trip','Random');
?>
<form enctype="multipart/form-data" action="events.php?mode=profile" method="POST">
<input type="file" name="file"><br>
<select name="#tag">
<option value="" selected disabled>Select atleast 1 #tag</option>
<?php
for($i=0;$i<count($option);$i++){
	echo "<option value=#".$option[$i].">".'#'.$option[$i]."</option>";
}
?>
</select>
<input type="text" name="#tags" placeholder="Start with #"><br>
<input type="submit" value="Upload Snap" name="upload">
</form>
</div>
</aside>