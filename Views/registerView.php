<div id="reg-div">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<p>User Type/Suptype</p>
		<select id="type" name="typeSelect">
			<?php foreach (array_keys($allTypes) as $key): ?>
				<option value="<?php echo $key; ?>"><?php echo $allTypes[$key]; ?></option>
			<?php endforeach ?>
		</select>
		<p>Email</p>
		<input type="text" name="emailText">
		<p>Name</p>
		<input type="text" name="nameText">
		<p>Password</p>
		<input type="text" name="passText">
		<p>Confirm password</p>
		<input type="text" name="confirmPassText">
		<p></p>
		<input type="submit" name="submit" value="Register" onclick="">
	</form>
</div>