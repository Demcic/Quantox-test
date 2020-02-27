<?php
/** Autoloading The required Classes **/
require_once $_SERVER['DOCUMENT_ROOT'] .'/Quantox-test/src/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/Quantox-test/src/types.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/Quantox-test/Classes/user.php';

class IndexModel
{
	private $db;

	function __construct()
	{
		$this->db = new MysqliDb (db_host, db_user, db_pass, db_database);
	}

	//funkcija koja vrsi registraciju
	public function register($username, $email, $password, $type) {

		$trn_date = date("Y-m-d H:i:s");
		$data = Array("username" => $username,
					  "email" => $email,
					  "password" => md5($password),
					  "trn_date" => $trn_date,
					  "type" => $type);

		$id = $this->db->insert('users', $data);

		return $id;
	}

	//funkcija koja vrsi login
	public function login($email, $password) {

		$this->db->where('email', $email);
		$this->db->where('password', md5($password));

		$result = $this->db->get('users');

		return $result;
	}

	//funkcija za search
	public function search($type, $text) {

		$this->db->where("type", "%".$type."%", 'like');
		$this->db->where("email", "%".$text."%", 'like');
		$this->db->orWhere("username", "%".$text."%", 'like');

		$results = $this->db->get('users');

		return $results;
	}

	public function getUsers($type, $text) {
		$queryResults = $this->search($type, $text);
		$users = array();
		foreach ($queryResults as $result) {
			$user = new User($result['username'], $result['email'], $result['password'], $result['type']);
			$users[] = $user;
		}
		return $users;
	}

	//pripremanje podataka za levi deo Result strane
	public function getLeftSideData($users) {
		//kratak primer izgleda ovih podataka
		//$result_data_left = array('back-end' => array("Back End Developer", 5),
		//						'php' => array("PHP", 3),
		//						'nodejs' => array("NodeJS", 2));
		$results = array();

		foreach ($users as $user) {
			$allTypes = explode("/", $user->getType());
			foreach ($allTypes as $type) {
				if (!isset($results[$type])) {
					$results[$type] = array(TypeNames::getTypeName($type), 1);
				}
				else
					$results[$type][1]++;
			}
		}

		return $results;
	}

	//pripremanje podataka za desni deo Result strane
	public function getRightSideData($users) {
		//kratak primer izgleda ovih podataka
		//$result_data_right = array("user1", "user2", "user3", "user4");

		$results = array();

		foreach ($users as $user) {
			$results[] = $user->getName();
		}

		return $results;

	}
	
	public function validateRegisterForm($email, $name, $pass, $passConfirm) {
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

	public function validateLoginForm($email, $pass) {
		if($email == "" || strpos($email, "@") === FALSE) {
			return "bad email or field is empty";
		}
		if($pass == "") {
			return "password field is empty";
		}

		return "OK";
	}

	public function validateSearchForm($search) {
		if($search == "") {
			return "search field is empty";
		}

		return "OK";
	}
}