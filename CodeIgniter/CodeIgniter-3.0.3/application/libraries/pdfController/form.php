<?php
class Form {
   private $formId = 0;
   private $fullName = null;
   private $title  = null;
   private $department = null;
   private $pawprint = null;
   private $empId = null;
   private $address = null;
   private $phone = null;
   private $isNew = 0;// 
   private $isAdditional = 0;//     
   private $isStudentWorker = 0;//
   private $ferpaScore = 0;
   private $accessDescription = null;
   private $security = array();  // had to add DB table
   private $academicCareer = array();  // had to change DB
   private $studentRecordsAccess = array();
   private $studentFinancials = array();// had to add DB table
   private $studentFinancialAid = array();// had to add DB table
   private $reservedAccess = array();// had to add DB table
   private $admissionAccess = array();
   
   
   public function getFormId(){
   		return $this->formId;
   }
   
   public function setFormId($formId){
   		$this->formId = $formId;
   }
   
   public function getFullName(){
   		return $this->fullName;
   }
	
	public function setFullName($fullName){
		$this->fullName = $fullName;
	}
	
	public function getTitle(){
   		return $this->title;
   }
	
	public function setTitle($title){
		$this->title = $title;
	}
	
	public function getDepartment(){
   		return $this->department;
   }
	
	public function setDepartment($department){
		$this->department = $department;
	}
	
	public function getPawprint(){
   		return $this->pawprint;
   }
	
	public function setPawprint($pawprint){
		$this->pawprint = $pawprint;
	}
	
	public function getEmpId(){
   		return $this->empId;
   }
	
	public function setEmpId($empId){
		$this->empId = $empId;
	}
	
	public function getAddress(){
   		return $this->address;
   }
	
	public function setAddress($address){
		$this->address = $address;
	}
	
	public function getPhone(){
   		return $this->phone;
   }
	
	public function setPhone($phone){
		$this->phone = $phone;
	}
	
	public function getIsNew(){
   		return $this->isNew;
   }
	
	public function setIsNew($isNew){
		$this->isNew = $isNew;
	}
	
		public function getIsAdditional(){
   		return $this->isAdditional;
   }
	
	public function setIsAdditional($isAdditional){
		$this->isAdditional = $isAdditional;
	}
	
		public function getIsStudentWorker(){
   		return $this->isStudentWorker;
   }
	
	public function setIsStudentWorker($isStudentWorker){
		$this->isStudentWorker = $isStudentWorker;
	}
	
		public function getFerpaScore(){
   		return $this->ferpaScore;
   }
	
	public function setFerpaScore($ferpaScore){
		$this->ferpaScore = $ferpaScore;
	}
	
		public function getAccessDescription(){
   		return $this->accessDescription;
   }
	
	public function setAccessDescription($accessDescription){
		$this->accessDescription = $accessDescription;
	}
	
		public function getSecurity(){
   		return $this->security;
   }
	
	public function setSecurity($currentStaff, $formerStaff, $name, $position, $pawprint, $empId){
		array_push($this->security, new Security($currentStaff, $formerStaff, $name, $position, $pawprint, $empId));
	}
	
	public function getAcedemicCareer(){
   		return $this->academicCareer;
   }
	
	public function setAcedemicCareer($uGrad, $grad, $med, $vetMed, $law){
		array_push($this->academicCareer, new AcademicCareer($uGrad, $grad, $med, $vetMed, $law));
	}
	
		public function getStudentRecordsAccess(){
   		return $this->studentRecordsAccess;
   }
	
	public function setStudentRecordsAccess($role, $view, $update){
		array_push($this->studentRecordsAccess, new RequestAccess($role, $view, $update));
	}
	
		public function getStudentFinancials(){
   		return $this->studentFinancials;
   }
	
	public function setStudentFinancials($role, $view, $update){
		array_push($this->studentFinancials, new Financials($role, $view, $update));
	}
	
		public function getStudentFinancialAid(){
   		return $this->studentFinancialAid;
   }
	
	public function setStudentFinancialAid($role, $view){
		array_push($this->studentFinancialAid, new FinancialAid($role, $view));
	}
	
		public function getReservedAccess(){
   		return $this->reservedAccess;
   }
	
	public function setReservedAccess($role, $view, $update){
		array_push($this->reservedAccess, new Reserved($role, $view, $update));
	}
	
	public function getAdmissionAccess(){
   		return $this->admissionAccess;
   }
	
	public function setAdmissionAccess($test, $value){
		array_push($this->admissionAccess, new Admissions($test, $value));
	}
}

?>