<?php
include 'core/database/connect_db.php';
if(isset($_GET['key'])){
	$search=$_GET['key'];
	if(!empty($search)){
		$query="SELECT * FROM `user` WHERE concat(`firstname`,' ',`lastname`) LIKE '".mysql_real_escape_string($search)."%'";
		$query_run=mysql_query($query);
		while($row=mysql_fetch_assoc($query_run)){
			$name = $row['firstname']." ".$row['lastname']."<br>";
			echo "<a href=''>".$name."</a>";
		}
	}
}
?>