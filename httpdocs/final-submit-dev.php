<?php
error_reporting(E_ALL);
require('configure.php');

if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'Submit_val_6'){

function meterTomile($e){
$getTotal = $e*0.000621371;
return $getTotal;
}	
	
$from = $_POST['street_address'];
$to = $_POST['street_address_move_to'];
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

$sqlData = "SELECT * FROM ".TBL_SETTINGS." WHERE id=1";
$getData = $db->selectData($sqlData);
$adminData = $db->getRow($getData);

$sqlPUM = "SELECT * FROM ".TB_PACK_UNPACK_MOVERS." WHERE id=1";
$sqlPUMEXE = $db->selectData($sqlPUM);
$getPUM = $db->getRow($sqlPUMEXE);

$sqlTrailer = "SELECT * FROM ".TBL_TRAILER." WHERE id=1";
$getTriler = $db->selectData($sqlTrailer);
$getOne = $db->getRow($getTriler);


if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'Submit_val_6'){
$arry = array(
	"name" => $_REQUEST['name'],
	"email" => $_REQUEST['email'],
	"phone_no" => $_REQUEST['phone_no'],
	"c_catagory" => $_REQUEST['c_catagory'],
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
$concad = $_POST['pfname'].$_POST['plname'];
$_POST['p_name'] = $concad;
$_POST['street_address']=mysql_real_escape_string($_REQUEST['street_address']);
$_POST['street_address_move_to']=mysql_real_escape_string($_REQUEST['street_address_move_to']);
$_POST['distance']=$getDistance;
$_POST['apartment_cando'] = $_REQUEST['choice1'];
$_POST['gated_community'] = $_REQUEST['choice2'];
$_POST['apartment_cando_move_to'] = $_REQUEST['choice1_move_to'];
$_POST['gated_community_move_to'] = $_REQUEST['choice2_move_to'];
$db->updateArray(TBL_QUOTS,$_POST,"id='".$getInsertId."'");	

$sql_packages = "UPDATE ".TBL_QUOTS." SET status=1 WHERE id='".$getInsertId."'";
$rec_packages = $db->updateSql($sql_packages);

$get = $move->getQuotsData($getInsertId);

//getting the value
$email = $get['email'];
$nameData = $get['name'];
$phone_no = $get['phone_no'];
$to_zipcode = $get['to_zipcode'];
$date_to_move = $get['date_to_move'];
$from_zipcode = $get['from_zipcode'];
$street_address = $get['street_address'];
$bldg_suite_apt = $get['bldg_suite_apt'];
$gated_community = $get['gated_community'];
$apartment_cando = $get['apartment_cando'];
$nerest_intersection = $get['nerest_intersection'];
if($get['c_catagory']==0){
$cata = "Residential";	
}else{
$cata = "Business/Government";		
}

//MAIL-FUNCTION
$to = $adminData['site_email'];
$name = "New Order From Ufirstmoving";
$from = 'service@ufirstmoving.com';

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To:  <'.$to.'>' . "\r\n";
$headers .= 'From: '.$name.' <'.$from.'>'."\r\n" ;
$message="<html>
<head>
<title>New Quote From Customer ".ucfirst(stripslashes($nameData))."</title>
</head>
<body>
<br>
<table border='0' align='center' width='100%'>
<tr>
<td valign='top' style='color:Red'><strong>THE CONTACT DETILS</strong></td>
<td>------------------------------------------------------------</td>
</tr>
<tr>
<td width='20%'><strong>Name:</strong></td>
<td width='80%'>".strtoupper(stripslashes($nameData))."</td>
</tr>
<tr>
<td width='20%'><strong>Email:</strong></td>
<td width='80%'>".stripslashes($email)."</td>
</tr>
<tr>
<td width='20%'><strong>Phone No:</strong></td>
<td width='80%'>".stripslashes($phone_no)."</td>
</tr>
<tr>
<td width='20%'><strong>Catagory:</strong></td>
<td width='80%'>".stripslashes($cata)."</td>
</tr>
<tr>
<td valign='top' style='color:Red'><strong>The PRESENT LOCATION</strong></td>
<td>------------------------------------------------------------</td>
</tr>
<tr>
<td width='20%'><strong>Street Address:</strong></td>
<td width='80%'>".strtoupper(stripslashes($street_address))."</td>
</tr>
<tr>
<td width='20%'><strong>Bldg/Suite/Apt:</strong></td>
<td width='80%'>".strtoupper(stripslashes($bldg_suite_apt))."</td>
</tr>
<tr>
<td width='20%'><strong>State:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['state']))."</td>
</tr>
<tr>
<td width='20%'><strong>City:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['city']))."</td>
</tr>
<tr>
<td width='20%'><strong>Apartment or Condo:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['apartment_cando']))."</td>
</tr>
<tr>
<td width='20%'><strong>Gated Community:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['gated_community']))."</td>
</tr>
<tr>
<td valign='top' style='color:Red'><strong>The MOVE TO LOCATION</strong></td>
<td>------------------------------------------------------------</td>
</tr>
<tr>
<td width='20%'><strong>Street Address:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['street_address_move_to']))."</td>
</tr>
<tr>
<td width='20%'><strong>Bldg/Suite/Apt:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['bldg_suite_apt_move_to']))."</td>
</tr>
<tr>
<td width='20%'><strong>State:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['state_move_to']))."</td>
</tr>
<tr>
<td width='20%'><strong>City:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['city_move_to']))."</td>
</tr>
<tr>
<td width='20%'><strong>Apartment or Condo:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['apartment_cando_move_to']))."</td>
</tr>
<tr>
<td width='20%'><strong>Gated Community:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['gated_community_move_to']))."</td>
</tr>
<tr>
<td valign='top' style='color:Red'><strong>THE PRIMARY CONTACT</strong></td>
<td>------------------------------------------------------------</td>
</tr>
<tr>
<td valign='top'><strong>Primary Name</strong></td>
<td>".strtoupper(stripslashes($get['p_name']))."</td>
</tr>
<tr>
<td valign='top'><strong>Primary Email</strong></td>
<td>".stripslashes($get['p_email'])."</td>
</tr>
<tr>
<td valign='top'><strong>Primary Phone No</strong></td>
<td>".stripslashes($get['p_phone_no'])."</td>
</tr>

<tr>
<td valign='top' style='color:Red'><strong>TRAILER RENTAL</strong></td>
<td>------------------------------------------------------------</td>
</tr>

<tr>
<td valign='top'><strong>".$getOne['trailer_one'].' Foot '.'Trailer '."</strong></td>
<td>Qty = ".$get['step_2_product_qty_one'].' Price = '.'$'.$get['step_2_product_price_one']."</td>
</tr>

<tr>
<td valign='top'><strong>".$getOne['trailer_two'].' Foot '.'Trailer '."</strong></td>
<td>Qty = ".$get['step_2_product_qty_two'].' Price = '.'$'.$get['step_2_product_price_two']."</td>
</tr>

<tr>
<td valign='top'><strong>".$getOne['trailer_three'].' Foot '.'Trailer '."</strong></td>
<td>Qty = ".$get['step_2_product_qty_three'].' Price = '.'$'.$get['step_2_product_price_three']."</td>
</tr>

<tr>
<td valign='top' style='color:Red'><strong>TRAILER DELIVARY</strong></td>
<td>------------------------------------------------------------</td>
</tr>

<tr>
<td valign='top'><strong>Trailer Placed</strong></td>
<td>".stripslashes($get['step_3_trailors_place'])."</td>
</tr>

<tr>
<td valign='top' style='color:Red'><strong>MOVING HELPER</strong></td>
<td>------------------------------------------------------------</td>
</tr>

<tr>
<td valign='top'><strong>Movers Need</strong></td>
<td>No of Movers: ".$get['step_4_no_of_movers_mh']."  Estimated Hours: ".$get['step_4_estimated_hrs_mh']." Price: ".$get['step_4_total_amount_mh']."</td>
</tr>

<tr>
<td valign='top'><strong>Packing and Unpacking</strong></td>
<td>No of Movers: ".$get['step_4_no_of_movers_puh']."  Estimated Hours: ".$get['step_4_estimated_hrs_puh']." Price: ".$get['step_4_total_amount_puh']."</td>
</tr>
<tr>
</table>
</body>
</html>";

$subject = "New Order Details From '".ucfirst(stripslashes($nameData))."'";
if(mail($to, $subject, $message, $headers)){
	
$to = $get['email'];
$subject = "Confarmation Of The Order From UFirstMoving.com";
$message ="
<html>
<head>
<title>Confarmation Mail</title>
</head>
<body>
<p>Dear customer,</p>
<p>Thanking you for placing the order with ufirstmvoing. Here are the details that you entered when you placed order</p>
<table border='0' align='center' width='100%'>
<tr>
<td valign='top' style='color:Red'><strong>THE CONTACT DETILS</strong></td>
<td>------------------------------------------------------------</td>
</tr>
<tr>
<td width='20%'><strong>Name:</strong></td>
<td width='80%'>".strtoupper(stripslashes($nameData))."</td>
</tr>
<tr>
<td width='20%'><strong>Email:</strong></td>
<td width='80%'>".stripslashes($email)."</td>
</tr>
<tr>
<td width='20%'><strong>Phone No:</strong></td>
<td width='80%'>".stripslashes($phone_no)."</td>
</tr>
<tr>
<td width='20%'><strong>Catagory:</strong></td>
<td width='80%'>".stripslashes($cata)."</td>
</tr>
<tr>
<td valign='top' style='color:Red'><strong>The PRESENT LOCATION</strong></td>
<td>------------------------------------------------------------</td>
</tr>
<tr>
<td width='20%'><strong>Street Address:</strong></td>
<td width='80%'>".strtoupper(stripslashes($street_address))."</td>
</tr>
<tr>
<td width='20%'><strong>Bldg/Suite/Apt:</strong></td>
<td width='80%'>".strtoupper(stripslashes($bldg_suite_apt))."</td>
</tr>
<tr>
<td width='20%'><strong>State:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['state']))."</td>
</tr>
<tr>
<td width='20%'><strong>City:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['city']))."</td>
</tr>
<tr>
<td width='20%'><strong>Apartment or Condo:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['apartment_cando']))."</td>
</tr>
<tr>
<td width='20%'><strong>Gated Community:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['gated_community']))."</td>
</tr>
<tr>
<td valign='top' style='color:Red'><strong>The MOVE TO LOCATION</strong></td>
<td>------------------------------------------------------------</td>
</tr>
<tr>
<td width='20%'><strong>Street Address:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['street_address_move_to']))."</td>
</tr>
<tr>
<td width='20%'><strong>Bldg/Suite/Apt:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['bldg_suite_apt_move_to']))."</td>
</tr>
<tr>
<td width='20%'><strong>State:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['state_move_to']))."</td>
</tr>
<tr>
<td width='20%'><strong>City:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['city_move_to']))."</td>
</tr>
<tr>
<td width='20%'><strong>Apartment or Condo:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['apartment_cando_move_to']))."</td>
</tr>
<tr>
<td width='20%'><strong>Gated Community:</strong></td>
<td width='80%'>".strtoupper(stripslashes($get['gated_community_move_to']))."</td>
</tr>
<tr>
<td valign='top' style='color:Red'><strong>THE PRIMARY CONTACT SECTION</strong></td>
<td>------------------------------------------------------------</td>
</tr>
<tr>
<td valign='top'><strong>Primary Name</strong></td>
<td>".strtoupper(stripslashes($get['p_name']))."</td>
</tr>
<tr>
<td valign='top'><strong>Primary Email</strong></td>
<td>".stripslashes($get['p_email'])."</td>
</tr>
<tr>
<td valign='top'><strong>Primary Phone No</strong></td>
<td>".stripslashes($get['p_phone_no'])."</td>
</tr>
</table>
<p>Thank You For Moving With Us.. Happy Journey</p>
<p>Thanks with best Regards,<br /> Ufirstmoving Team</p>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <service@ufirstmoving.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

if(mail($to,$subject,$message,$headers)){
$sql= "DELETE FROM ".TBL_AJAX_CALCULATION." WHERE `calculate_id` ='".$_SESSION['CAL_INSERT_ID']."'";
$exe = mysql_query($sql);	
unset($_SESSION['pageOneData']);	
unset($_SESSION['pageOneData_one']);
unset($_SESSION['pageOneData_two']);	
unset($_SESSION['pageOneData_three']);	
unset($_SESSION['pageOneData_four']);
unset($_SESSION['CAL_INSERT_ID']);			
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
}
?>