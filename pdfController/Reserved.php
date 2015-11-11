<?php
class Reserved{
	private $role;
	private $view;
	private $update;

	function Reserved($role, $view, $update){
		$this->role = $role;
		$this->view = $view;
		$this->update = $update;
	}	
	
	public function getRole(){
		return $this->role;
	}
	public function getView(){
		return $this->view;
	}
	public function getUpdate(){
		return $this->update;
	}
}
?>