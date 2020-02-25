<?php

/** Autoloading The required Classes **/

class IndexController {
	private $model;

	function __construct($tile)
	{
		/** Loading the corresponding Model class **/

		$this->model = new $tile;
	}

	public function index()
	{
		require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/homeView.php';
		var_dump($_SERVER);
	}

	public function login()
	{

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$email = $_POST['emailText'];
			$pass = $_POST['passText'];
			$validation = "OK";
			if ($validation === "OK") {
				
			}
		}
		else {
			require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/loginView.php';
		}
	}

	public function register()
	{
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			$type = $_POST['typeSelect'];
			$email = $_POST['emailText'];
			$name = $_POST['nameText'];
			$pass = $_POST['passText'];
			$passConfirm = $_POST['confirmPassText'];

			var_dump($type, $email, $name, $pass, $passConfirm);
			$validation = $this->validate($email, $name, $pass, $passConfirm);
			if ($validation === "OK") {
				require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/loginView.php';
				echo "<script type='text/javascript'>alert('Regitration succesfull. Please login.');</script>";
			}
			else {
				require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/registerView.php';
				echo "<script type='text/javascript'>alert('$validation');</script>";
			}
		}
		else {
			require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/registerView.php';
		}
	}

	public function search()
	{
		//var_dump($_POST);

		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$search = $_POST['searchTxt'];
			$result_data_left = array('back-end' => array("Back End Developer", 5),
								'php' => array("PHP", 3),
								'nodejs' => array("NodeJS", 2));
			$result_data_right = array("user1", "user2", "user3", "user4");
			require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/resultView.php';
		}
	}

	public function validate($email, $name, $pass, $passConfirm) {
		if($email == "" || strpos($email, "@") === FALSE) {
			return "bad email or field is empty";
		}
		if($name == "") {
			return "name field is empty";
		}
		if($pass == "" || $passConfirm == "") {
			return "password field is empty";
		}
		else if ($pass !== $passConfirm) {
			return "password doesnt match";
		}

		return "OK";
	}
}

