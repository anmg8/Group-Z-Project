<?php
class AcademicCareer{
	private $uGrad;
	private $grad;
	private $med;
	private $vetMed;
	private $law;
	
	function AcademicCareer($uGrad, $grad, $med, $vetMed, $law){
		$this->uGrad = $uGrad;
		$this->grad = $grad;
		$this->med = $med;
		$this->vetMed = $vetMed;
		$this->law = $law;
	}
	
	public function getUGrad(){
		return $this->uGrad;
	}
	
	public function getGrad(){
		return $this->grad;
	}
	
	public function getMed(){
		return $this->med;
	}
	
	public function getVetMed(){
		return $this->vetMed;
	}
	
	public function getLaw(){
		return $this->law;
	}

}
?>