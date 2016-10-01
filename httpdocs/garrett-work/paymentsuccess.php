<?php
include_once("configure.php");
$userId = $_SESSION['theMainid'];
unset($_SESSION['theMainid']);
$sql_packages = "UPDATE ".TBL_QUOTS." SET status=1 WHERE id='".$userId."'";
$rec_packages = $db->updateSql($sql_packages);

$get = $move->getQuotsData($userId);

//$to = $adminData['site_email'];
$to = 'service@ufirstmoving.com';
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

mail($to,$subject,$message,$headers);
	
}
?>
<?php include('includes/top.php'); ?>
<body>
<?php include('includes/header.php'); ?>
<div id="contentPnl">
<div class="topMain">
<div class="topmainSub">
<div id="aboutRight" style="width:100%;">
<h2 style="color: yellowgreen; text-align: center; background: none;">Your order has been placed successfully.</h2>
</div>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
