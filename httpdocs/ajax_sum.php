<?php 
require('configure.php'); 
$id = $_SESSION['CAL_INSERT_ID'];
if($_REQUEST['paraOne']==1){
	$arry = array(
		"step_4_one" => $_REQUEST['value'],
	);	
		$getUpadteId = $db->updateArray(TBL_AJAX_CALCULATION,$arry,"calculate_id='".$id."'");	
		$sqlData = "SELECT step_4_one,step_4_two FROM ".TBL_AJAX_CALCULATION." WHERE calculate_id='".$id."'";
		$getData = $db->selectData($sqlData);
		$adminData = $db->getRow($getData);
	    $sumToatal = $adminData['step_4_one']+$adminData['step_4_two'];
}else{
	$arry = array(
		"step_4_two" => $_REQUEST['value'],
	);	
		$getUpadteId = $db->updateArray(TBL_AJAX_CALCULATION,$arry,"calculate_id='".$id."'");	
		$sqlData = "SELECT step_4_one,step_4_two FROM ".TBL_AJAX_CALCULATION." WHERE calculate_id='".$id."'";
		$getData = $db->selectData($sqlData);
		$adminData = $db->getRow($getData);
	    $sumToatal = $adminData['step_4_one']+$adminData['step_4_two'];
}
echo $sumToatal;
?>