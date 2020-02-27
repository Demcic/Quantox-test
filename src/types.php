<?php 

//lista svih tipova i podtipova
class TypeNames {
	static $typeNames = array('front-end' => "Front End Developer",
							'front-end/angular' => "Angular",
							'front-end/angular/angularjs' => "AngularJs",
							'front-end/angular/angular2' => "Angular 2",
							'front-end/react' => "React",
							'front-end/react/react-native' => "React Native",
							'front-end/vue' => "Vue",
							'back-end' => "Back End Developer",
							'fornt-end/php' => "PHP",
							'fornt-end/php/symphony' => "Symphony",
							'back-end/php/symphony/silex' => "Silex",
							'back-end/php/laravel' => "Laravel",
							'back-end/php/laravel/lumen' => "Lumen",
							'back-end/nodejs' => "NodeJs",
							'back-end/nodejs/express' => "Express",
							'back-end/nodejs/nestjs' => "NestJS");

	function __construct() {

	}

	public static function getAllTypes() {
		return self::$typeNames;
	}

	public static function getTypeName($type) {
		$keys = array_keys(self::$typeNames);
		$name = "";
		foreach ($keys as $key) {
			$splitkeys = explode("/", $key);
			$lowestSubtype = end($splitkeys);
			if($lowestSubtype == $type){
				$name = self::$typeNames[$key];
			}	
		}
		return $name;
	}
}