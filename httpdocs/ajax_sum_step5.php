<?php 
require('configure.php'); 
$id = $_SESSION['CAL_INSERT_ID'];
$fName = $_REQUEST['fildName'];
$amount = $_REQUEST['totalPriceData'];

if($fName == 'acc_one_t'){
$arry = array(
	'acc_one_total' => $amount,
	);
}if($fName == 'acc_two_t'){
$arry = array(
	'acc_two_total' => $amount,
	);
}if($fName == 'acc_three_t'){
$arry = array(
	'acc_three_total' => $amount,
	);
}if($fName == 'acc_four_t'){
$arry = array(
	'acc_four_total' => $amount,
	);
}if($fName == 'acc_five_t'){
$arry = array(
	'acc_five_total' => $amount,
	);
}if($fName == 'acc_six_t'){
$arry = array(
	'acc_six_total' => $amount,
	);
}if($fName == 'acc_seven_t'){
$arry = array(
	'acc_seven_total' => $amount,
	);
}if($fName == 'acc_eight_t'){
$arry = array(
	'acc_eight_total' => $amount,
	);
}if($fName == 'acc_nine_t'){
$arry = array(
	'acc_nine_total' => $amount,
	);
}if($fName == 'equ_one_t'){
$arry = array(
	'equ_one_total' => $amount,
	);
}if($fName == 'equ_two_t'){
$arry = array(
	'equ_two_total' => $amount,
	);
}if($fName == 'lock_on_container'){
$arry = array(
	'lock' => $amount,
	);
}
if($fName == 'lock_on_container'){
$total = ($amount*2);	
$sql = "UPDATE ".TBL_AJAX_CALCULATION." SET  `lock` =  '".$total."' WHERE `calculate_id` ='".$id."'";
$dataExe = mysql_query($sql);	
}else{
$getUpadteId = $db->updateArray(TBL_AJAX_CALCULATION,$arry,"calculate_id='".$id."'");	
}
$sqlData = "SELECT * FROM ".TBL_AJAX_CALCULATION." WHERE calculate_id='".$id."'";
$getData = $db->selectData($sqlData);
$get = $db->getRow($getData);
$sumTotal = $get['acc_one_total']+$get['acc_two_total']+$get['acc_three_total']+$get['acc_four_total']+$get['acc_five_total']+$get['acc_six_total']+$get['acc_seven_total']+$get['acc_eight_total']+$get['acc_nine_total']+$get['equ_one_total']+$get['equ_two_total']+$get['lock'];                                                                                                   
echo $sumTotal;
?>