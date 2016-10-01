<?php include('includes/top.php'); ?>
<?php $page = $gf->getPageContent(6);
$page_title = $gf->getMetaContent(6);
function getLnt($zip)
{
	$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&sensor=false";
	$result_string = file_get_contents($url);
	$result = json_decode($result_string, true);
	$result1[]=$result['results'][0];
	$result2[]=$result1[0]['geometry'];
	$result3[]=$result2[0]['location'];
	return $result3[0];
}
function getDistance($zip1, $zip2)
{
	$first_lat = getLnt($zip1);
	$next_lat = getLnt($zip2);
	$lat1 = $first_lat['lat'];
	$lon1 = $first_lat['lng'];
	$lat2 = $next_lat['lat'];
	$lon2 = $next_lat['lng']; 
	$theta=$lon1-$lon2;
	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +
	cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
	cos(deg2rad($theta));
	$dist = acos($dist);
	$dist = rad2deg($dist);
	$miles = $dist * 60 * 1.1515;
	return $miles;
}
if(isset($_POST['trailer_contact']) && $_POST['trailer_contact']== 'Submit'){
	
$nameGet= addslashes(trim($_POST['name']));
$phone= addslashes(trim($_POST['phone']));
$address= addslashes(trim($_POST['address']));
$to_country= addslashes(trim($_POST['to_country']));
$from_country= addslashes(trim($_POST['from_country']));

$distance = getDistance($to_country,$from_country);
$getRoundDistance = round($distance,2);

if($from_country == '32024'){
$foName = 'Lake City, Florida location';
$totalDistance = $getRoundDistance * 1.35;
}else{
$foName = 'Elkhart, Indian location';
$totalDistance = $getRoundDistance * 1.60;	
}

$name = "UFIRSTMOVING";
$from = 'ghosh.soumyadeb@sabmecto.net';
$email_send = 'service@ufirstmoving.com,ghoshsoumyadeb@gmail.com,joydeep.dutta@sabmecto.net';
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To:  <'.$email_send.'>' . "\r\n";
$headers .= 'From: '.$name.' <'.$from.'>'."\r\n" ;
$message="<html>
<head>
<title>Trailer Delivery From UFIRSTMOVING</title>
</head>
<body>
<br>
<table border='0' align='center' width='100%'>
<tr>
<td colspan='2'></td>
</tr>
<tr>
<td width='20%'><strong>Name:</strong></td>
<td width='80%'>".ucfirst(stripslashes($nameGet))."</td>
</tr>
<tr>
<td width='20%'><strong>Phone No:</strong></td>
<td width='80%'>".stripslashes($phone)."</td>
</tr>
<tr>
<tr>
<td width='20%'><strong>Address:</strong></td>
<td width='80%'>".stripslashes($address)."</td>
</tr>
<tr>
<tr>
<td width='20%'><strong>From:</strong></td>
<td width='80%'>".stripslashes($foName)."</td>
</tr>
<tr>
<tr>
<td width='20%'><strong>To:</strong></td>
<td width='80%'>".stripslashes($to_country)."</td>
</tr>
<tr>
<td width='20%'><strong>Distance:</strong></td>
<td width='80%'>".stripslashes($totalDistance)."</td>
</tr>
</table>
</body>
</html>";
$to = $email_send;
$subject = "Trailer Delivery From UFIRSTMOVING";
if(mail($to, $subject, $message, $headers)){
$message = 'Thank you for contacting us. A representative will call you shortly to collect payment.';
}else{
$message="Error:Sorry, the query can't be sent at this moment.";
}
}
?>
<?php include('includes/header.php'); ?>
<div id="contentPnl">
<div class="topMain">
<div class="topmainSub">
<p style="color:red; font-family:Arial, Helvetica, sans-serif;font-size:23px; text-align: center;"><?php echo $message; ?></p>
<br clear="all" />
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
