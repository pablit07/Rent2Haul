<?php
require('configure.php');
$amount = 0.00;
$upid = $_SESSION['CAL_INSERT_ID'];

//Function convert the distance into miles
function meterTomile($e){
$getTotal = $e*0.000621371;
return $getTotal;
}

if($_REQUEST['counter'] == 1){
if(!empty($_POST['address1'])){	
/*$arry = array(
	'address_1_distance' => $amount,
	'address_2_distance' => $amount
);
$db->updateArray(TBL_AJAX_CALCULATION,$arry,"calculate_id='".$upid."'");*/
$to = $_POST['address2'];
$from = $_POST['address1'];
$to = urlencode($to);
$from = urlencode($from);
$data = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=en-EN&sensor=false");
$data = json_decode($data);
$time = 0;
$distance = 0;
foreach($data->rows[0]->elements as $road) {
    $time += $road->duration->value;
    $distance += $road->distance->value;
}
$getDistance = meterTomile($distance);
$getDistance = round($getDistance,2);
mysql_query("UPDATE  ".TBL_AJAX_CALCULATION." SET  `address_1_distance` =  '$getDistance' WHERE  `calculate_id` ='".$upid."'") or die(mysql_error());
/*$arryOne = array("address_1_distance" => round($getDistance,2));
$db->updateArray(TBL_AJAX_CALCULATION,$arryOne,"calculate_id='".$upid."'");*/
}
}else{
if(!empty($_POST['address2'])){	
$to = $_POST['address2'];
$from = $_POST['address1'];
$to = urlencode($to);
$from = urlencode($from);
$data = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=en-EN&sensor=false");
$data = json_decode($data);
$time = 0;
$distance = 0;
foreach($data->rows[0]->elements as $road) {
    $time += $road->duration->value;
    $distance += $road->distance->value;
}
$getDistance = meterTomile($distance);
$getDistance = round($getDistance,2);
mysql_query("UPDATE  ".TBL_AJAX_CALCULATION." SET  `address_2_distance` =  '$getDistance' WHERE  `calculate_id` ='".$upid."'") or die(mysql_error());
/*$arryOne = array("address_2_distance" => round($getDistance,2));
$db->updateArray(TBL_AJAX_CALCULATION,$arryOne,"calculate_id='".$upid."'");*/

$sqlSA = "SELECT * FROM ".TBL_AJAX_CALCULATION." WHERE calculate_id='".$upid."'";
$sqlSAEXE = $db->selectData($sqlSA);
$getCA = $db->getRow($sqlSAEXE);

$sqlTrailer = "SELECT * FROM ".TB_PACK_UNPACK_MOVERS." WHERE id=1";
$getTriler = $db->selectData($sqlTrailer);
$getD = $db->getRow($getTriler);

$total = $getCA['address_1_distance']+$getCA['address_2_distance'];
$surcharge = $total*$getD['upto50_sercharges'];

echo '$'.$surcharge;

}
}
?>
