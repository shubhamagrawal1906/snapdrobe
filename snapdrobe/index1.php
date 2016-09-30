<?php
include 'core/init.php';?>
<!doctype html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="css/index_style.css">
</head>
<body bgcolor="#FFCC66">
<body>
<header>
<marquee><h1 style="color:#FFF"><u>GET REGISTERED YOURSELF TODAY ON SNAPDROBE!!!!! </u></h1></marquee>
<nav>
<ul>
<li>Home</li>
<li>Downloads</li>
<li>Forum</li>
<li>Contact Us</li>
<ul>
</nav>
</header>
<div id="container">
<aside>
<?php 
if(loggedin()){
include 'widgets/loggedin.php';	
}else{
	include 'includes/widgets/login.php';
	include 'includes/widgets/register.php';
}
//include 'includes/widgets/countuser.php';
?>
</aside>
<?php
if(loggedin()){
	echo "Loggedin";
}
?>
</div>
<footer>
&copy;www.snapdrobe.com 2016. All right reserved.
</footer>
</body>
</html>