<div id="reg-div">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<p>User Type/Suptype</p>
		<select id="type" name="typeSelect">
			<option value="front-end">Front End Developer</option>
			<option value="front-end/angular">Angular</option>
			<option value="front-end/angular/angularjs">AngularJs</option>
			<option value="front-end/angular/angular2">Angular 2</option>
			<option value="front-end/react">React</option>
			<option value="front-end/react/react-native">React Native</option>
			<option value="front-end/vue">Vue</option>
			<option value="back-end">Back End Developer</option>
			<option value="back-end/php">PHP</option>
			<option value="back-end/php/symphony">Symphony</option>
			<option value="back-end/php/symphony/silex">Silex</option>
			<option value="back-end/php/laravel">Laravel</option>
			<option value="back-end/php/laravel/lumen">Lumen</option>
			<option value="back-end/nodejs">NodeJs</option>
			<option value="back-end/nodejs/express">Express</option>
			<option value="back-end/nodejs/nestjs">NestJS</option>
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