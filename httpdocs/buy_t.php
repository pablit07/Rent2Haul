<?php
require('configure.php');

if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'Submit_val_6'){

$sqlData = "SELECT * FROM ".TBL_SETTINGS." WHERE id=1";
$getData = $db->selectData($sqlData);
$adminData = $db->getRow($getData);

$sqlPUM = "SELECT * FROM ".TB_PACK_UNPACK_MOVERS." WHERE id=1";
$sqlPUMEXE = $db->selectData($sqlPUM);
$getPUM = $db->getRow($sqlPUMEXE);

if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'Submit_val_6'){
$arry = array(
	"name" => $_REQUEST['name'],
	"email" => $_REQUEST['email'],
	"phone_no" => $_REQUEST['phone_no'],
	"c_catagory" => $_REQUEST['c_catagory'],
	"grandTotal"=> $_REQUEST['grandToatal'],
	"date_to_move" => $_REQUEST['date_to_move']
	);
$getInsertId = $db->insertDataArray(TBL_QUOTS,$arry);
if(!empty($getInsertId)){
$arryOne = array(
	"step_2_product_code_one" => $_REQUEST['step_2_product_code_one'],
	"step_2_product_qty_one" =>  $_REQUEST['step_2_product_qty_one'],
	"step_2_product_price_one" => $_REQUEST['step_2_product_price_one'],
	"step_2_product_code_two" => $_REQUEST['step_2_product_code_two'],
	"step_2_product_qty_two" =>  $_REQUEST['step_2_product_qty_two'],
	"step_2_product_price_two" => $_REQUEST['step_2_product_price_two'],
	"step_2_product_code_three" => $_REQUEST['step_2_product_code_three'],
	"step_2_product_qty_three" =>  $_REQUEST['step_2_product_qty_three'],
	"step_2_product_price_three" => $_REQUEST['step_2_product_price_three'],
	"step_3_trailors_place" => $_REQUEST['step_3_trailors_place'],
	"step_4_no_of_movers_mh" => $_REQUEST['step_4_no_of_movers_mh'],
	"step_4_estimated_hrs_mh" => $_REQUEST['step_4_estimated_hrs_mh'],
	"step_4_total_amount_mh" => $_REQUEST['step_4_no_of_movers_mh']*$_REQUEST['step_4_estimated_hrs_mh']*$getPUM['movers_rate'],
	"step_4_no_of_movers_puh" => $_REQUEST['step_4_no_of_movers_puh'],
	"step_4_estimated_hrs_puh" => $_REQUEST['step_4_estimated_hrs_puh'],
	"step_4_total_amount_puh" => $_REQUEST['step_4_no_of_movers_puh']*$_REQUEST['step_4_estimated_hrs_puh']*$getPUM['pack_unpack_rate']
	);
$getUpadteId = $db->updateArray(TBL_QUOTS,$arryOne,"id='".$getInsertId."'");
if(!empty($getUpadteId)){
$arryTwo = array(
	"quote_id" => $getInsertId,
	"acc_one_qty" => $_REQUEST['acc_one_qty'],
	"acc_two_qty" =>  $_REQUEST['acc_two_qty'],
	"acc_three_qty" => $_REQUEST['acc_three_qty'],
	"acc_four_qty" => $_REQUEST['acc_four_qty'],
	"acc_five_qty" => $_REQUEST['acc_five_qty'],
	"acc_six_qty" => $_REQUEST['acc_six_qty'],
	"acc_seven_qty" => $_REQUEST['acc_seven_qty'],
	"acc_eight_qty" => $_REQUEST['acc_eight_qty'],
	"acc_nine_qty" => $_REQUEST['acc_nine_qty'],
	"equ_one_qty" => $_REQUEST['equ_one_qty'],
	"equ_two_qty" => $_REQUEST['equ_two_qty'],
	"acc_one_total" => $_REQUEST['acc_one_total'],
	"acc_two_total" => $_REQUEST['acc_two_total'],
	"acc_three_total" => $_REQUEST['acc_three_total'],
	"acc_four_total" => $_REQUEST['acc_four_total'],
	"acc_five_total" => $_REQUEST['acc_five_total'],
	"acc_six_total" => $_REQUEST['acc_six_total'],
	"acc_seven_total" => $_REQUEST['acc_seven_total'],
	"acc_eight_total" => $_REQUEST['acc_eight_total'],
	"acc_nine_total" => $_REQUEST['acc_nine_total'],
	"equ_one_total" => $_REQUEST['equ_one_total'],
	"equ_two_total" => $_REQUEST['equ_two_total'],
	"lock_on_container" => $_REQUEST['lock_on_container'],
	);
$getInsId = $db->insertDataArray(TBL_QUOTS_ACC,$arryTwo);	
if(!empty($getInsId)){
$concad = $_POST['pfname'].$_POST['plname'];$_POST['p_name'] = $concad;
$db->updateArray(TBL_QUOTS,$_POST,"id='".$getInsertId."'");	

$sql_packages = "UPDATE ".TBL_QUOTS." SET status=1 WHERE id='".$getInsertId."'";

if($db->updateSql($sql_packages)){
unset($_SESSION['pageOneData']);	
unset($_SESSION['pageOneData_one']);
unset($_SESSION['pageOneData_two']);	
unset($_SESSION['pageOneData_three']);	
unset($_SESSION['pageOneData_four']);		
session_destroy();
?>
<script type="text/javascript">
window.location.href = 'index.php?message=Success:You have successfully contacted with ufirstmoving and our team will get back to you with in 8 hours';
</script>
<?php
}else{
?>
<script type="text/javascript">
window.location.href = 'index.php?message=Error:Sorry We Have A Temporary Problem !!';
</script>
<?php
}
}
}
}
}
}
?>