<?php
require('configure.php');

//$to = 'service@ufirstmoving.com';
//$to = 'joydeep.dutta@sabmecto.net';


$sqlData = "SELECT * FROM ".TBL_SETTINGS." WHERE id=1";
$getData = $db->selectData($sqlData);
$adminData = $db->getRow($getData);

if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'Submit_val_6'){
$arry = array(
	"name" => $_REQUEST['name'],
	"email" => $_REQUEST['email'],
	"phone_no" => $_REQUEST['phone_no'],
	"cc_user_id" => $_REQUEST['cc_user_id'],
	"grandTotal"=> $_REQUEST['grandToatal'],
	"date_to_move" => $_REQUEST['msgdate_to_move']
	);
$getInsertId = $db->insertDataArray(TBL_QUOTS,$arry);
if(!empty($getInsertId)){
$arryOne = array(
	"step_2_product_code" => $_REQUEST['step_2_product_code'],
	"step_2_product_qty" =>  $_REQUEST['step_2_product_qty'],
	"step_2_product_price" => $_REQUEST['step_2_product_price'],
	"step_3_trailors_place" => $_REQUEST['step_3_trailors_place'],
	"step_4_no_of_movers_mh" => $_REQUEST['step_4_no_of_movers_mh'],
	"step_4_estimated_hrs_mh" => $_REQUEST['step_4_estimated_hrs_mh'],
	"step_4_estimated_hrs_puh" => $_REQUEST['step_4_estimated_hrs_puh'],
	"step_4_no_of_movers_puh" => $_REQUEST['step_4_no_of_movers_puh'],
	"step_4_no_of_movers_puh" => $_REQUEST['step_4_no_of_movers_puh']
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
	"equ_two_total" => $_REQUEST['equ_two_total']
	);
$getInsId = $db->insertDataArray(TBL_QUOTS_ACC,$arryTwo);	
if(!empty($getInsId)){
$concad = $_POST['pfname'].$_POST['plname'];$_POST['p_name'] = $concad;
$db->updateArray(TBL_QUOTS,$_POST,"id='".$getInsertId."'");	

$sql_packages = "UPDATE ".TBL_QUOTS." SET status=1 WHERE id='".$getInsertId."'";
$rec_packages = $db->updateSql($sql_packages);

$get = $move->getQuotsData($getInsertId);

$to = $adminData['site_email'];
$name = "New Quote From Customer -- AutoReply Mail";
$from = 'admin@ksoumysoreonline.com';

//getting the value
$nameData = $get['name'];
$email = $get['email'];
$phone_no = $get['phone_no'];
$street_address = $get['street_address'];
$bldg_suite_apt = $get['bldg_suite_apt'];
$nerest_intersection = $get['nerest_intersection'];
$apartment_cando = $get['apartment_cando'];
$gated_community = $get['gated_community'];
$from_zipcode = $get['from_zipcode'];
$to_zipcode = $get['to_zipcode'];
$date_to_move = $get['date_to_move'];
if($get['c_catagory']==0){
$cata = "Residential";	
}else{
$cata = "Business/Government";		
}


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
<td colspan='2'><strong>Enqiry Details From ".ucfirst(stripslashes($nameData))."</strong></td>
</tr>
<tr>
<td colspan='2'>&nbsp;</td>
</tr>
<tr>
<td width='20%'><strong>Name:</strong></td>
<td width='80%'>".ucfirst(stripslashes($nameData))."</td>
</tr>
<tr>
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
<td width='20%'><strong>Street Address:</strong></td>
<td width='80%'>".stripslashes($street_address)."</td>
</tr>
<tr>
<td width='20%'><strong>Bldg/Suite/Apt:</strong></td>
<td width='80%'>".stripslashes($bldg_suite_apt)."</td>
</tr>
<tr>
<td valign='top'><strong>Nearest Major Intersection:</strong></td>
<td>".stripslashes($nerest_intersection)."</td>
</tr>
<tr>
<td valign='top'><strong>Apartment or condo:</strong></td>
<td>".ucfirst(stripslashes($apartment_cando))."</td>
</tr>
<tr>
<td valign='top'><strong>Gated community:</strong></td>
<td>".ucfirst(stripslashes($gated_community))."</td>
</tr>
<tr>
<td valign='top'><strong>From Zipcode:</strong></td>
<td>".stripslashes($from_zipcode)."</td>
</tr>
<tr>
<td valign='top'><strong>To Zipcode:</strong></td>
<td>".stripslashes($to_zipcode)."</td>
</tr>
<tr>
<td valign='top'><strong>Date To Move:</strong></td>
<td>".stripslashes($date_to_move)."</td>
</tr>
<tr>
<td valign='top'><strong>The Primary Contact Section</strong></td>
<td>------------------------------------------------------------</td>
</tr>
<tr>
<td valign='top'><strong>Primary Name</strong></td>
<td>".stripslashes($get['p_name'])."</td>
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
</body>
</html>";

$subject = "Enqiry Details From '".ucfirst(stripslashes($nameData))."'";
if(mail($to, $subject, $message, $headers)){
	
$to = $get['email'];
$subject = "Confarmation Of The Order From UFirstMoving.com";

$message = "
<html>
<head>
<title>Confarmations Mail</title>
</head>
<body>
<p>Your Order Has Been Confirm And We Will COntact You Shortly</p>
<p>Thank You For Moving With Us.. Happy Journey</p>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <admin@ksoumysoreonline.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

if(mail($to,$subject,$message,$headers)){
?>
<script type="text/javascript">
window.location.href = 'index.php?message=Success:Your Have Successfully Contact Ufirstmoving.com';
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