<?php
include 'core/init.php';
redirect_not_loggedin();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Hover Effect Ideas | Set 1</title>
		<meta name="description" content="Hover Effect Ideas: Inspiration for subtle hover effects" />
		<meta name="keywords" content="hover effect, inspiration, grid, thumbnail, transition, subtle, web design" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,800,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/set1.css" />
		<script src="script/script.js" type="text/javascript"></script>
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
	
		<div class="container">
			
			<header class="codrops-header">
				<h1>PICTA FEST<span>AN ORGANIZED COLLECTION OF YOUR MEMORIES</span></h1>
				<a href="events.php?mode=timeline" style="color:white;">Back to Timeline</a>
			</header>
<?php
$file_path=array();
$file_ext=array();
$file_photoid=array();
$file_view=array();
$file_like=array();
$file_tags=array();
$option=array('festival','ceremony','fests','events','trip','sports','seminar','sessions','entertainment','random');
if($_GET['mode'] && in_array($_GET['mode'],$option)){
	$search=$_GET['mode'];
	$query="SELECT `user_id` FROM `follow".$user_data['user_id']."`";
	$query_run=mysql_query($query);
	while($row=mysql_fetch_array($query_run)){
		$array[]=$row['user_id'];
	}
	$array[]=$user_data['user_id'];
	$string="'".implode("','",$array)."'";
	$query="SELECT * FROM `photo` WHERE `tags` LIKE '%".$search."%' AND `user_id` IN (".$string.") ORDER BY `photo_id` DESC";
	$query_run=mysql_query($query);
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
}else{
?>		
			<div class="content">
		
				
				<div class="grid">
					<?php
					for($i=0;$i<count($option);$i++){
						?>
						<figure class="effect-oscar">
						<img src="<?php echo "images/".$option[$i].".jpg";?>" alt="<?php echo $option[$i];?>">
							<figcaption>
								<h2><span><?php echo $option[$i];?></span></h2>
								<b><p><a href="<?php echo 'pictafest.php?mode='.$option[$i]?>" style="color:white;border:1px solid white;padding:3px;">View 
								Folder</a></p></b>
							</figcaption>			
						</figure>
						<?php
					}
					?>                
                    
				</div>
				
			</div>
			
			
		</div><!-- /container -->
<?php
}
?>		
		<script>
			// For Demo purposes only (show hover effect on mobile devices)
			[].slice.call( document.querySelectorAll('a[href="#"') ).forEach( function(el) {
				el.addEventListener( 'click', function(ev) { ev.preventDefault(); } );
			} );
		</script>
	</body>
</html>