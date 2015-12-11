<?php

class Admissions{
	private $test;
	private $value;

	function Admissions($test, $value){
		$this->test = $test;
		$this->value = $value;
	}	
	
	public function getTest(){
		return $this->test;
	}
	public function getValue(){
		return $this->value;
	}
	
}
?>