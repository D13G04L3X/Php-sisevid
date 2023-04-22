<?php
  class RepresentVisual_Indicador{
  	var $fkidfuente;
  	var $fkidindicador;
  	function __construct($fkidfuente,$fkidindicador){
  		$this->fkidfuente=$fkidfuente;
  		$this->fkidindicador=$fkidindicador;
  	}
  	function setFkidfuente($fkidfuente){
  		$this->fkidfuente=$fkidfuente;
  	}
  	function getFkidfuente(){
  		return $this->fkidfuente;
  	} 
  	function setFkidindicador($fkidindicador){
		$this->fkidindicador=$fkidindicador;
	}
	function getFkidindicador(){
		return $this->fkidindicador;   		
  }
?>