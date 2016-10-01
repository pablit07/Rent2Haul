<?php
class CheckString{
	var $str;
	function CheckString($str){
		$this->str=$str;
	}
	function GetAlteredString(){
		$stringToChange=$this->str;
		$length=strlen($stringToChange);
		if(substr($stringToChange, $length-2, 1)==","){
			$changedString=substr($stringToChange, 0, $length-2);
			return $changedString;
		}else{
			$changedString=$stringToChange;
			return $changedString;
		}			
	}
	function GetAlteredQuery(){
		$stringToChange=$this->str;
		$length=strlen($stringToChange);
		//echo substr($stringToChange, $length-2, 2);
		if(trim(substr($stringToChange, $length-6, 6))=="WHERE"){
			$changedString=substr($stringToChange, 0, $length-6);
			return $changedString;
		}elseif(trim(substr($stringToChange, $length-2, 2))=="OR"){
			$changedString=substr($stringToChange, 0, $length-2);
			return $changedString;
		}elseif(trim(substr($stringToChange, $length-3, 2))=="OR"){
			$changedString=substr($stringToChange, 0, $length-3);
			return $changedString;
		}else{
			$changedString=$stringToChange;
			return $changedString;
		}			
	}
	
	function GetAlteredAnd(){
		$stringToChange=$this->str;
		$length=strlen($stringToChange);
		//echo substr($stringToChange, $length-2, 2);
		if(trim(substr($stringToChange, $length-4, 4))=="AND"){
			$changedString=substr($stringToChange, 0, $length-4);
			return $changedString;
		}elseif(trim(substr($stringToChange, $length-3, 3))=="AND"){
			$changedString=substr($stringToChange, 0, $length-3);
			return $changedString;
		}else{
			$changedString=$stringToChange;
			return $changedString;
		}			
	}
}
?>