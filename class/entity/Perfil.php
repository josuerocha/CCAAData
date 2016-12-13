<?php
class Perfil{

	private $code;
	private $descricao;
	//Permissions of access follow below
	private $registation;
	private $complexRegistration;
	private $report;
	private $complexReport;
	private $study;
	private $teach;


	function __construct(){
	    $this->setCode(0);
	    $this->setDescricao('');
	}

	function getCode(){
	    return $this->code;
	}

	function setCode($code){
	    $this->code = $code;
	}

	function getDescricao(){
	    return $this->descricao;
	}

	function setDescricao($descricao){
	    $this->descricao = $descricao;
	}

	function getRegistration(){
	    return $this->registration;
	}

	function setRegistration($registration){
	    $this->registration = $registration;
	}

	function getComplexRegistration(){
	    return $this->complexRegistration;
	}

	function setComplexRegistration($complexRegistration){
	    $this->complexRegistration = $complexRegistration;
	}

	function getReport(){
	    return $this->report;
	}

	function setReport($report){
	    $this->report = $report;
	}

	function getComplexReport(){
	    return $this->complexReport;
	}

	function setComplexReport($complexReport){
	    $this->complexReport = $complexReport;
	}

	function getStudy(){
	    return $this->study;
	}

	function setStudy($study){
	    $this->study = $study;
	}

	function getTeach(){
	    return $this->teach;
	}

	function setTeach($teach){
	    $this->teach = $teach;
	}

	function DisplayPermissionsTabular(){
		$tabularData = '';
		$tabularData = $tabularData . $this->DisplayPermission($this->getRegistration());
		$tabularData = $tabularData . $this->DisplayPermission($this->getComplexRegistration());
		$tabularData = $tabularData . $this->DisplayPermission($this->getReport());
		$tabularData = $tabularData . $this->DisplayPermission($this->getComplexReport());
		$tabularData = $tabularData . $this->DisplayPermission($this->getTeach());
		$tabularData = $tabularData . $this->DisplayPermission($this->getStudy());

		return $tabularData;
	}

	function DisplayPermission($permission){
		
		if($permission){
		  	return "<td align=\"center\"><img src=\"assets/images/checkmark.png\" alt=\"Presente\" ></td>";

	  	}

	    else{
	  	 	return "<td align=\"center\"><img src=\"assets/images/xmark.png\" alt=\"Ausente\" ></td>";
	  	}
	}

	function toArray(){
		 return array(
	        'code' => $this->getCode(),
	        'descricao' => $this->getDescricao(),
	        'registration' => $this->getRegistration(),
	        'complexRegistration' => $this->getComplexRegistration(),
	        'report' => $this->getReport(),
	        'complexReport' => $this->getComplexReport(),
	        'teach' => $this->getTeach(),
	        'study' => $this->getStudy()
    	);
	}

}
?>