<?php
class Moving{

public $dbObject;
public function Moving($dbObject){
	$this->dbObject = $dbObject;
	//$this->deleteOddEntry();
}
//------------------------------------------------------------------------------------------------------------------------------------------//
//Get Exsiting Quots
public function getExsitingQuots($phone='',$email=''){
	$sql = "SELECT * FROM ".TBL_QUOTS." WHERE phone_no='".$phone."' OR email='".$email."'";
	if($this->dbObject->countRows($sql) == 0)
		return true ;	  
	else
		return false ; 
}
//------------------------------------------------------------------------------------------------------------------------------------------//

//------------------------------------------------------------------------------------------------------------------------------------------//
//Delete odd Entry
public function deleteOddEntry(){
	$sql = "SELECT * FROM ".TBL_QUOTS." WHERE status=0";
	$record_sql1 = $this->dbObject->selectData($sql);
	while($row = $this->dbObject->getRow($record_sql1)){
	$sql = "DELETE FROM ".TBL_QUOTS." WHERE id='".$row['id']."'";
	$this->dbObject->selectData($sql);
	$sql = "DELETE FROM ".TBL_QUOTS_ACC." WHERE quote_id='".$row['id']."'";
	$this->dbObject->selectData($sql);
	$this->deleteOddEntryTwo();
	}
	
}
//------------------------------------------------------------------------------------------------------------------------------------------//

//Delete odd Entry
public function deleteOddEntryTwo(){
	$sql = "DELETE FROM ".TBL_QUOTS_ACC." WHERE quote_id=0";
	$this->dbObject->selectData($sql);
	
}
//------------------------------------------------------------------------------------------------------------------------------------------//

//Get Exsiting Review
public function getExsitingRewiew($email=''){
	$sql = "SELECT * FROM ".TBL_REVIEW." WHERE email='".$email."'";
	if($this->dbObject->countRows($sql) == 0)
		return true ;	  
	else
		return false ; 
}

//Get infodata
public function getQuotsData($intid=''){
	$sql = "SELECT * FROM ".TBL_QUOTS." WHERE id='".$intid."'";
	$record_sql1 = $this->dbObject->selectData($sql);
	return $row = $this->dbObject->getRow($record_sql1);
	

}

//Calculation Of the distance
public function getLnt($zip){
	$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&sensor=false";
	$result_string = file_get_contents($url);
	$result = json_decode($result_string, true);
	$result1[]=$result['results'][0];
	$result2[]=$result1[0]['geometry'];
	$result3[]=$result2[0]['location'];
	return $result3[0];
}

public function getDistance($zip1, $zip2){
	$first_lat = $this->getLnt($zip1);
	$next_lat = $this->getLnt($zip2);
	$lat1 = $first_lat['lat'];
	$lon1 = $first_lat['lng'];
	$lat2 = $next_lat['lat'];
	$lon2 = $next_lat['lng']; 
	$theta=$lon1-$lon2;
	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	$dist = acos($dist);
	$dist = rad2deg($dist);
	$miles = $dist * 60 * 1.1515;
	$km = ($miles * 1.609344);
	$dis = ($km * 0.621371);
	return round($dis);
}

public function calc_distance($point1, $point2){
	$distance = (3958 * 3.1415926 * sqrt(
	($point1['lat'] - $point2['lat'])
	* ($point1['lat'] - $point2['lat'])
	+ cos($point1['lat'] / 57.29578)
	* cos($point2['lat'] / 57.29578)
	* ($point1['long'] - $point2['long'])
	* ($point1['long'] - $point2['long'])
	) / 180);
	if($distance == 0){
	return $distance = round(rand(200,6000));
	}else{
	return $distance;
	}
}


}
?>