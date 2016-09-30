<div id="adiv">
<?php
include 'core/init.php';
redirect_not_loggedin();
?>
<!doctype html>
<meta charset="utf-8">
<title>Share ur memories here!!</title>
<head>
<meta charset='utf-8'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/setting.css" type="text/css" />
<link rel="stylesheet" href="css/newtimeline.css" type="text/css" />
<link rel="stylesheet" href="css/sidebar.css" type="text/css" />
<link rel="stylesheet" href="css/set.css" type="text/css" />
<script src="script/jquery-1.11.3.js" type="text/javascript"></script>
<script src="script/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="script/script2.js" type="text/javascript"></script>
<script src="script/script.js" type="text/javascript"></script>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>
<body>
<div class="profile">
<div id="mine">
<?php
$mode=injection($_GET['mode']);
if($mode==="profile"){	
	$profile_path=mysql_result(mysql_query("SELECT `profile` FROM `user` WHERE `user_id`='".$user_data['user_id']."'"),0);
?>
<!--<h1 align="center" style="font-family:Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', serif; color:#FFF;">PROFILE</h1>-->
<div id="profile-detail" style="padding-top:80px;">
<div id="image">
<img src="<?php echo $profile_path; ?>" alt="pp.jpg" height="130px" width="130px" align="center">
<h1><?php echo $user_data['firstname']." ".$user_data['lastname']?></h1>
</div>
<!-- yahan name aana hai kisi bhi tarah se so just solve it out-->
</div>
<?php
}?>
</div>
<?php
$mode=injection($_GET['mode']);
$placeholder="Search By Username";
if($mode!=="following"){
	$mode="timeline";
	$placeholder="Search By #Tags";
}
$notify=notification($user_data['user_id']);;

if(isset($_POST['search'])&&!empty($_POST['search'])){
	echo $search=$_POST['search'];
	header("Location:events.php?mode=".$mode."&&search=".urlencode($search));
	}
?>
<nav id='cssmenu'>
<ul>
<li ><a href='events.php?mode=timeline' class='<?php if($_GET['mode']==="timeline"){echo "sel";}?>'>TIMELINE</a></li>
<li><a href='events.php?mode=profile'>PROFILE</a></li>
<li><a href='pictafest.php?mode'>PICTA-FEST</a></li>
<li><a href="events.php?mode=following&&followers">FOLLOWING</a></li> 
<li><a href='events.php?mode=setting&&bio'>SETTINGS</a></li>
<li><p><div class="tfheader">
	<form id="tfnewsearch" method="POST" action="<?php echo "events.php?mode=".$mode;?>" name="tfnewsearch">
		<input type="text" class="tftextinput" name="search" size="30" maxlength="120" placeholder="<?php echo $placeholder;?>" onkeyup="search();" ><input type="submit" value="SEARCH" class="tfbutton">
	</form>	<div class="tfclear"></div>
</div></p></li>
<li id="bahar"><a href='events.php?mode=notification'>NOTIFICATIONS</a></li>
<li id="bahar"><a href="logout.php">LOGOUT</a></li>
</ul>
</nav><br>
</div>
<div id="container">
<?php
$mode_allowed=array("timeline","profile","pictafest","following","setting","logout","notification");
if(($_GET['mode'] && in_array($_GET['mode'],$mode_allowed)) || ($_GET['mode'] && in_array($_GET['mode'],$mode_allowed) && (isset($_GET['search']) && !empty($_GET['search'])) || (isset($_GET['follow']) && !empty($_GET['follow']) && $mode=="following"))){
	$following_mode;
	$notification_mode;
	$mode=injection($_GET['mode']);
	include $mode.'.php';
?>
</div>
</body>
<?php
}else{
	header("Location:protected.php");
}
?>
</div>