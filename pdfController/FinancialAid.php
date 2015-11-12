<?php
class FinancialAid{
	private $role;
	private $view;

	function FinancialAid($role, $view){
		$this->role = $role;
		$this->view = $view;
	}	
	
	public function getRole(){
		return $this->role;
	}
	public function getView(){
		return $this->view;
	}
}

?>