<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Calculate Miles Using Google Api</title>
<?php
//Function convert the distance into miles
function meterTomile($e){
$getTotal = $e*0.000621371;
return $getTotal;
}
function getDistance($from,$to){
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
return $getToal  = $getDistance;
}
if(isset($_REQUEST['B1']) && $_REQUEST['B1'] == 'Submit'){
$distance = getDistance($_POST['zipCode'],$_POST['zipCode2']);
}
?>
</head>
<body>

<form method="POST" action="?flag=true">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr>
<td width="14%" height="34"><strong>Enter Address From</strong></td>
<td width="37%" height="34">
<input type="text" name="zipCode" size="20" value="<?php print $_POST['zipCode']; ?>"></td>
<td width="49%" height="34">&nbsp;</td>
</tr>
<tr>
<td width="14%" height="34"><strong>Enter Address To</strong></td>
<td width="37%" height="34">
<input type="text" name="zipCode2" size="20" value="<?php print $_POST['zipCode2']; ?>"></td>
<td height="34">&nbsp;</td>
</tr>
<?php /*?><tr>
<td width="14%" height="34"><strong>Unit</strong></td>
<td width="37%" height="34">
<input type="radio" value="K" name="unit" <?php if(isset($_POST['unit']) && $_POST['unit']== 'K'){?> checked="checked"  <?php }?>> KM 
<input type="radio" value="M" name="unit" <?php if(isset($_POST['unit']) && $_POST['unit']== 'M'){?> checked="checked"  <?php }?>> Miles</td>
<td height="34">&nbsp;</td>
</tr><?php */?>
<tr>
<td width="14%" height="34"><input type="submit" value="Submit" name="B1" class="submit_btn"></td>
<td width="37%" height="34">
<?php print '<h1>'.$distance."--Miles".'</h1>'; ?>
</td>
<td height="34">&nbsp;</td>
</tr>
</table>
</form>
<p>8965 W Geddes Pl, Littleton, CO 80128, USA</p>
<p>11510 Inspiration Rd, Golden, CO 80403, USA</p>
</body>
</html>