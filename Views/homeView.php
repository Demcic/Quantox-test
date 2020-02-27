<h1>Quantox BE Test</h1>
<?php if (!isset($_SESSION['username'])): ?>
	</br><a href=http://localhost/Quantox-test/index.php/login>Log in</a>
	</br><a href=http://localhost/Quantox-test/index.php/register>Register</a>
<?php else: ?>
	<p>Welcome <?php echo " " . $_SESSION['username']; ?></p>
	<div id="logoutDiv">
		<form method="post" action="index.php/login">
			<input type="submit" name="logoutBtn" value="Log out">
		</form>
	</div>
<?php endif ?>
</br>
<div>
	<p>Search for users</p>
	<?php if (strpos($_SERVER['REQUEST_URI'], "index.php")): ?>
		<form method="post"	action="search">
	<?php else: ?>
		<form method="post"	action="index.php/search">
	<?php endif ?>
		<input type="text" name="searchTxt" value="">
		<select name="typeSelect">
			<option value="front-end">Front End Developer</option>
			<option value="back-end">Back End Developer</option>
		</select>
		<input type="submit" name="submit" value="Search">
	</form>
</div>