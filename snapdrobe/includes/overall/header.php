<!doctype html>
<html>
<head>
<script src="script/load.js"></script>
<meta charset="utf-8" />
<title></title>
<link rel="stylesheet" href="css/index.css">
</head>
<body>
<video id="video" autoplay muted loop>
<source src="video.mp4" type="video/mp4">
</video>
<header>
<marquee><h1 style="color:"black"><u>GET REGISTERED YOURSELF TODAY ON SNAPDROBE!!!!! </u></h1></marquee>
</header>
<div id="container">
<?php 
if(loggedin()){
	header("Location:events.php?mode=timeline");
	exit();
}else{
	include 'includes/widgets/login.php';
	include 'includes/widgets/register.php';
}
//include 'includes/widgets/countuser.php';
?>
