<div id="w">
	<?php
	$profile_path=mysql_result(mysql_query("SELECT `profile` FROM `user` WHERE `user_id`='".$user_data['user_id']."'"),0);
	?>
    <div id="content" class="clearfix">
      <div id="userphoto"><img src="<?php echo $profile_path; ?>" height="150px" width="150px" alt="profile image">
	  <form enctype="multipart/form-data" action="events.php?mode=setting&&profile" method="POST">
	  <input type="file" name="profile_file"><br>
	  <input type="submit" value="Submit">
	  </form>
	  </div>

      <h3>SETTINGS</h3>
      <nav id="profiletabs">
        <ul class="clearfix">
          <li><a href="events.php?mode=setting&&bio" class="<?php if(isset($_GET['bio'])){echo "sel";} ?>">Bio</a></li>
          <li><a href="events.php?mode=setting&&update" class="<?php if(isset($_GET['update'])){echo "sel";} ?>">Update profile</a></li>
          <li><a href="events.php?mode=setting&&change_password" class="<?php if(isset($_GET['change_password'])){echo "sel";} ?>">Change password</a></li>
        </ul>
      </nav>
<?php
if(isset($_GET['bio'])&&empty($_GET['bio'])){
	?>
	<section>
	<form action="events.php?mode=setting&&biochange" method="POST">
	<textarea placeholder="Describe yourself here..." cols="60" rows="10" name="bio" value="<?php if(isset($user_data['bio'])){echo $user_data['bio'];} ?>"></textarea>
	<center>
	<br><input type="submit" class="clickbutton" value="Update">
	</center>
	</form>
	</section>
	
	<?php
}else if(isset($_GET['update'])&&empty($_GET['update'])){
	?>
      <section>
	  <form action="events.php?mode=setting&&updatechange" method="POST">
        <p>Edit your user settings:</p>
        
        <p class="setting"><span>First Name *</span><input type="text" name="firstname" value="<?php if(isset($user_data['firstname'])){echo $user_data['firstname'];} ?>"></p>
        
        <p class="setting"><span> Last Name </span><input type="text" name="lastname" value="<?php if(isset($user_data['lastname'])){echo $user_data['lastname'];} ?>"></p>

		<p class="setting"><span>Gender</span>
        <input type="radio" name="gender" value="male" <?php if($user_data['gender']==="male"&&isset($user_data['gender'])){echo "checked";}?>>Male
		<input type="radio" name="gender" value="female" <?php if($user_data['gender']==="female"&&isset($user_data['gender'])){echo "checked";}?>>Female</p>
        <p class="setting"><span>Date Of Birth</span><input type="date" name="date" value="<?php if(isset($user_data['date'])){echo $user_data['date'];} ?>"></p>
        
        <p class="setting"><span>E-mail *</span><input type="text" name="email" value="<?php if(isset($user_data['email'])){echo $user_data['email'];} ?>"></p>

     
        
        <p class="setting"><span>Mobile Number </span><input type="number" name="mobile" size="4" value="<?php if(isset($user_data['mobile'])){echo $user_data['mobile'];} ?>"></p>
        
        <p class="setting"><span>Address </span><input type="text" name="city" value="<?php if(isset($user_data['city'])){echo $user_data['city'];} ?>"></p>
        
        <p class="setting"><span>Lives in </span> <input type="text" name="home" value="<?php if(isset($user_data['home'])){echo $user_data['home'];} ?>"></p>
                
        <p class="setting"><span>Interests and Hobbies</span><input type="text" name="interest" value="<?php if(isset($user_data['interest'])){echo $user_data['interest'];} ?>"></p>
		
         <p class="setting"><span>Relationship Status</span> 
		 <input type="radio" name="relation" value="single" <?php if($user_data['relation']==="single"&&isset($user_data['relation'])){echo "checked";}?>>Single
		 <input type="radio" name="relation" value="committed" <?php if($user_data['relation']==="committed"&&isset($user_data['relation'])){echo "checked";}?>>Committed
		 <input type="radio" name="relation" value="married" <?php if($user_data['relation']==="married"&&isset($user_data['relation'])){echo "checked";}?>>Married</p>
		 
        <p class="setting"><span>Work And Education</span>
		<input type="radio" name="education" value="undergraduate" <?php if($user_data['education']==="undergraduate"&&isset($user_data['education'])){echo "checked";}?>>Undergraduate
		<input type="radio" name="education" value="postgraduate" <?php if($user_data['education']==="postgraduate"&&isset($user_data['education'])){echo "checked";}?>>Postgraduate
		<input type="radio" name="education" value="schooling" <?php if($user_data['education']==="schooling"&&isset($user_data['education'])){echo "checked";}?>>Schooling
		<input type="radio" name="education" value="job" <?php if($user_data['education']==="job"&&isset($user_data['education'])){echo "checked";}?>>Job
		<input type="radio" name="education" value="other" <?php if($user_data['education']==="other"&&isset($user_data['education'])){echo "checked";}?>>Other
		</p>
        
        <p class="setting"><span>Profession</span>
        <input type="radio" name="profession" value="student" <?php if($user_data['profession']==="student"&&isset($user_data['profession'])){echo "checked";}?>>Student
		<input type="radio" name="profession" value="working" <?php if($user_data['profession']==="working"&&isset($user_data['profession'])){echo "checked";}?>>Woking
        </p>
        <center>
        <input type="submit" class="clickbutton" value="Update">
        </center>
		</form>
	<?php
}else if(isset($_GET['change_password'])&&empty($_GET['change_password'])){
	?>
	
		<section>
		<p>Change your password:</p>
		<form action="events.php?mode=setting&&change_passwordchange" method="POST">
		<p class="setting"><span>Current Password *</span><input type="password" name="current_password"></p>

		<p class="setting"><span>New Password *</span><input type="password" name="password"></p>

		<p class="setting"><span>Confirm Password *</span><input type="password" name="confirm_password"></p>

		<center>
		<input type="submit" class="clickbutton" value="Update">
		</center>	
		</form>
	<?php
}
?>
      
      
      </section>
      
    </div><!-- @end #content -->
  </div><!-- @end #w -->
