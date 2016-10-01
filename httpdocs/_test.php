<?php
/*$URL = "log_report.txt";
$domain = file_get_contents($URL);
print_r($domain);*/

//Function convert the distance into miles
function meterTomile($e){
$getTotal = $e*0.000621371;
return $getTotal;
}

if($_POST){
$from = $_POST['address1'];
$to = $_POST['address2'];
$from = urlencode($from);
$to = urlencode($to);
$data = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=en-EN&sensor=false");
$data = json_decode($data);
$time = 0;
$distance = 0;
foreach($data->rows[0]->elements as $road) {
    $time += $road->duration->value;
    $distance += $road->distance->value;
}
$get = meterTomile($distance);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Google Maps API Example: Extraction of Geocoding Data</title>
</head>
<body>
<form action="#" method="post" name="Fform">
<p>
From: <input type="text" name="address1" value="263, Raja Rammohan Roy Road, Sukanta Nagar, Sarada Pally, Kolkata, West Bengal 700008, India" class="address_input" size="40" />
To: <input type="text" name="address2" value="263, Basanta Lal Saha Road, Tollygunge Golf Club, Kolkata, West Bengal, India" class="address_input" size="40" />
<input type="submit" name="find" value="Search" />
</p>
</form>
<p id="results">
<?php
echo "<strong>To:</strong> ".$data->destination_addresses[0];
echo "<br/>";
echo "<strong>From:</strong> ".$data->origin_addresses[0];
echo "<br/>";
echo "<strong>Time:</strong> ".$time." seconds";
echo "<br/>";
echo "<strong>Distance:</strong> ".$get." miles";
?>
</p>
</body>
</html>