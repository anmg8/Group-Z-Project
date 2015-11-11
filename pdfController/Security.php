<?php
class Security{
	private $currentStaff;
	private $formerStaff;
	private $name;
	private $position;
	private $pawprint;
	private $empId;
	
	function Security($currentStaff, $formerStaff, $name, $position, $pawprint, $empId){
		$this->currentStaff = $currentStaff;
		$this->formerStaff = $formerStaff;
		$this->name = $name;
		$this->position = $position;
		$this->pawprint = $pawprint;
		$this->empId = $empId;
	}
	
	public function getCurrentStaff(){
		return $this->currentStaff;
	}
	
	public function getFormerStaff(){
		return $this->formerStaff;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getPosition(){
		return $this->position;
	}
	
	public function getPawprint(){
		return $this->pawprint;
	}
	
	public function getEmpId(){
		return $this->empId;
	}
}
?>