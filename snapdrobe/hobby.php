<?php
include 'core/init.php';
protect_page();
include 'includes/overall/header.php'; 
?>
<h1><?php echo $user_data['firstname']; ?>'s Hobbies</h1>
<form action="" method="POST">
<h3>Activity :</h3>
<input type="checkbox" name="book" value="book" id="book" onchange="update('book','input');"> Book/Novel Reading <input type="number" placeholder="0 (By default)"
id="input"><br><br>
<input type="checkbox" name="gym" value="gym"> Gymnastic <input type="number" placeholder="0 (By default)"><br><br>
<input type="checkbox" name="mus" value="mus"> Music <input type="number" placeholder="0 (By default)"><br><br>
<input type="checkbox" name="tv" value="tv"> TV Addicted <input type="number" placeholder="0 (By default)"><br><br>
<input type="checkbox" name="sw" value="sw"> Social Welfare <input type="number" placeholder="0 (By default)"><br><br>
<h3>Programming Language :</h3>
<!--<select id="pl" name="pl" multiple="multiple">
<option value="c"> C</option>
<option value="cpp"> C++</option>
<option value="java"> Java</option>
<option value="py"> Python</option>
<option value="php"> Php</option>
</select> <input type="number" placeholder="0 (By default)"><br>-->
<input type="checkbox" name="c" value="c"> C <input type="number" placeholder="0 (By default)"><br><br>
<input type="checkbox" name="cpp" value="cpp"> C++ <input type="number" placeholder="0 (By default)"><br><br>
<input type="checkbox" name="java" value="java"> Java <input type="number" placeholder="0 (By default)"><br><br>
<input type="checkbox" name="php" value="php"> PHP <input type="number" placeholder="0 (By default)"><br><br>
<input type="checkbox" name="python" value="python"> Python <input type="number" placeholder="0 (By default)"><br><br>
<h3>Sport :</h3>
<select id="sport" name="sport">
<option value="bad">Badminton</option>
<option value="bas">Basketball</option>
<option value="cric">Cricket</option>
<option value="foot">Football</option>
<option value="ten">Tennis</option>
</select> <input type="number" placeholder="0 (By default)"><br><br><br>
<input type="submit" value="Submit">
</form>
<?php
include 'includes/overall/footer.php';
?>