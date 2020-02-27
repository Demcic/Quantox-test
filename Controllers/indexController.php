<?php

/** Autoloading The required Classes **/
require_once $_SERVER['DOCUMENT_ROOT'] .'/Quantox-test/src/types.php';

class IndexController {
	private $model;

	function __construct($tile)
	{
		/** Loading the corresponding Model class **/

		$this->model = new $tile;
		session_start();
	}

	public function index()
	{
		//load header
		require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/header.php';
		//load load hope page
		require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/homeView.php';
		//load footer
		require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/footer.php';
	}

	public function login()
	{
		require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/header.php';

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			//provera da li su polja postavljena
			if(isset($_POST['emailText']) && isset($_POST['passText'])) {
				$email = $_POST['emailText'];
				$pass = $_POST['passText'];
				$validation = $this->model->validateLoginForm($email, $pass);
				//provera da li su polja za login OK
				if ($validation === "OK") {
					$result = $this->model->login($email, $pass);
					//ako je pronadjen korisnik i pass je u redu
					if ($result) {
						$logged_user = $result[0]['username'];
						$_SESSION['username'] = $logged_user;
						
						//slucaj ako postoji search-query, redirect ka stranici za rezultate
						if ($_COOKIE['search-query']) {
							$url = "http://". $_SERVER['SERVER_NAME'] . "/Quantox-test/index.php/search";
							header("Location: " . $url);
						}
						//ako ne postoji search-query redirect ka pocetnoj strani
						else {
							$url = "http://". $_SERVER['SERVER_NAME'] . "/Quantox-test";
							header("Location: " . $url);
						}
					}
					//poruka korisniku da user ili password nije OK
					else {
						require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/loginView.php';
						echo "<script type='text/javascript'>alert('email or password doesnt match');</script>";
					}
				}
				//ako validacija forme nije OK posalji poruku korisniku
				else {
					require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/loginView.php';
				echo "<script type='text/javascript'>alert('$validation');</script>";
				}
			}
			//slucaj za Logout
			else {
				session_unset();
				session_destroy();
				require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/loginView.php';
			}
		}
		//prikaz login strane ako nije POST
		else {
			require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/loginView.php';
		}


		require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/footer.php';
	}

	public function register()
	{
		$allTypes = TypeNames::getAllTypes();

		require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/header.php';

		//obrada register
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			$type = $_POST['typeSelect'];
			$email = $_POST['emailText'];
			$name = $_POST['nameText'];
			$pass = $_POST['passText'];
			$passConfirm = $_POST['confirmPassText'];

			$allTypes = 
			$validation = $this->model->validateRegisterForm($email, $name, $pass, $passConfirm);
			//provera polja za registraciju
			if ($validation === "OK") {
				$result = $this->model->register($name, $email, $pass, $type);
				//ako je rezultat registracej dobar obavesti korisnika i redirect ka login strani
				if($result){
					$url = "http://". $_SERVER['SERVER_NAME'] . "/Quantox-test/index.php/login";
					header("Location: " . $url);
					echo "<script type='text/javascript'>alert('Regitration succesfull. Please login.');</script>";
				}
				else echo "error";
			}
			//obavestenje da validacija nije prosla
			else {
				require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/registerView.php';
				echo "<script type='text/javascript'>alert('$validation');</script>";
			}
		}
		//prikaz strane za registraciju
		else {
			require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/registerView.php';
		}


		require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/footer.php';
	}

	public function search()
	{
		require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/header.php';

		//obrada search 
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$search = $_POST['searchTxt'];
			$type = $_POST['typeSelect'];
			$validation = $this->model->ValidateSearchForm($search);
			//validacija polja search
			if ($validation == "OK") {
				//provera da li je user logovan
				if(isset($_SESSION['username'])) {
					$users = $this->model->getUsers($type, $search);
					$result_data_left = "no users found";
					$result_data_right = "no users found";
					if (count($users) > 0) {
						$result_data_left = $this->model->getLeftSideData($users);
						$result_data_right = $this->model->getRightSideData($users);
					}
					require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/resultView.php';
				}
				//ako user nije logovan, sacuvaj kolacice i redirektuj ka login
				else {
					setcookie("search-query", json_encode(array($search, $type)));
					$url = "http://". $_SERVER['SERVER_NAME'] . "/Quantox-test/index.php/login";
					header("Location: " . $url);
				}
			}
			//obavestenje da search polje nije OK
			else {
				$url = "http://". $_SERVER['SERVER_NAME'] . "/Quantox-test";
				header("Location: " . $url);
			}
		}
		//ako postoji kolacic a search query obradi 
		else if($_COOKIE['search-query']) {
			$data = json_decode($_COOKIE['search-query']);
			$search = $data[0];
			$type = $data[1];
			setcookie("search-query", "", time() - 3600);
			unset($_COOKIE['search-query']);
			if(isset($_SESSION['username'])) {
				$users = $this->model->getUsers($type, $search);
				if (count($users) > 0) {
					$result_data_left = $this->model->getLeftSideData($users);
					$result_data_right = $this->model->getRightSideData($users);
				}
				require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/resultView.php';
			}
		}

		
		require_once $_SERVER['DOCUMENT_ROOT'].'/Quantox-test'.'/Views/header.php';
	}
}

