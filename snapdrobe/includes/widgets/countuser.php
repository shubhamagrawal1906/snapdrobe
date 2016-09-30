<div class="widget">
<h2>Users</h2>
<div class="inner">
<?php 
$usercount=count_user();
$suffix = ($usercount>1)?"s":"";
?>
	We have currently <?php echo $usercount; ?> user<?php echo $suffix; ?> registered.
</div>
</div>