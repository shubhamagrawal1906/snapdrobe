<div id="setting">
<form action="" method="POST">
<ul>
<li>
First Name* :<br/>
<input type="text" name="firstname" value="<?php echo $user_data['firstname']; ?>">
</li>
<li>
Last Name :<br/>
<input type="text" name="lastname" value="<?php echo $user_data['lastname']; ?>">
</li>
<li>
<li>
City :<br/>
<input type="text" name="city" value="<?php echo $user_data['city']; ?>">
</li>
<li>
Mobile :<br/>
<input type="tel" name="mobile" value="<?php echo $user_data['mobile']; ?>" maxlength="12" id="mobile">
</li>
<li>
Email* :<br/>
<input type="email" name="email" id="email" value="<?php echo $user_data['email']; ?>">
</li>
<li>
<input type="checkbox" name="allow_email" <?php if($user_data['allow_email']==1) echo "checked"; ?>> Would you like to receive a message from us?
</li>
<li>
<input type="submit" value="Update">
</li>
</ul>
</form>
</div>
