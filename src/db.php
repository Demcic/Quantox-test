<?php 

//Vrednosti za pristup bazi

define("db_host", "localhost");
define("db_user", "root");
define("db_pass", "danijel96");
define("db_database", "quantox_db");

//pristup bazi bez koriscena MySqlDb biblioteke
//class DB {
//	private static $host = "localhost";
//	private static $user = "root";
//	private static $pass = "";
//	private static $database = "quantox_db";
//
//	private static $instance = null;
//	private $error;
//
//	function __construct() {
//		self::$instance = mysqli_connect(self::$host, self::$user, self::$pass, self::$database);
		// Check connection
//		if (mysqli_connect_errno()) {
//			$error = mysqli_connect_errno();
//		}
//	}
//
//	public static function getInstance() {
//		if (self::$instance == null) {
//			self::$instance = new DB();
//		}
//
//		return self::$instance;
//	}
//
//	public function Connect() {
//		self::$instance = mysqli_connect($host, $user, $pass, $database);
///		// Check connection
//		if (mysqli_connect_errno()) {
//			return false;
//		}
//		else
//			return true;
//	}
//
//	public function doRegistration($username, $email, $password, $type) {
//		$trn_date = date("Y-m-d H:i:s");
//		$query = "INSERT into `uers` (username, email, password, trn_date, type)
//				VALUES ('$username', '$email', '" . md5($password) ."', '$trn_date', '$type')";
//		$result = mysqli_query(self::$instance, $query);
//		if ($result) {
//			return true;
//		}
//		else return false;
//	}
//
//	public function doLogin($email, $password) {
//
//	}
//}