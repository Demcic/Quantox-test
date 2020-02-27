<?php

require_once 'type.php';

//klasa za User-e
class User
{
	private $name;
	private $email;
	private $password;
	private $type;

	function __construct($name, $email, $pass, $type)	
	{
		$this->name = $name;
		$this->email = $email;
		$this->password = $pass;
		$this->type = $type;
	}

	//function __construct($name, $email, $pass)	
	//{
	//	$this->name = $name;
	//	$this->email = $email;
	//	$this->password = $pass;
	//	$this->type = array();
	//}

	//public function setType($type) {
	//	$types = explode('/', $type);
	//	$userType = new Type();
	//	for ($i=count($types)-1; $i <= 0 ; $i--) { 
	//		# code...
	//	}
	//}

	public function getName() {
		return $this->name;
	}
	public function getEmail() {
		return $this->email;
	}
	public function getPassword() {
		return $this->password;
	}
	public function getType() {
		return $this->type;
	}
}