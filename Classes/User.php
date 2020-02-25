<?php

require_once './type.php';

public class User
{
	var name;
	var email;
	var password;
	Type type;

	public __construct($name, $email, $pass, $type)	
	{
		$this->name = $name;
		$this->email = $email;
		$this->password = $pass;
		$this->type = $type;
	}
}