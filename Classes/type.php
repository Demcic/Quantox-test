<?php 

//klasa za tipove
class Type {
	private $typeName;
	private $subType;

	function __construct() {
		$this->subType = array();
	}

	function setSubtype($subtype) {
		$this->subType = $subtype;
	}
} 

?>