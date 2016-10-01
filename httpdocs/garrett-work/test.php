<?php
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
<!DOCTYPE html>
<html>
<head>
<title>Place Autocomplete Address Form</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<style>
html, body, #map-canvas {
height: 100%;
margin: 0px;
padding: 0px
}
</style>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<script type="text/javascript">
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete,autocompleteTwo;

function initialize() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      (document.getElementById('autocomplete')),
      { types: ['geocode'] });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}

function initializeTwo() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocompleteTwo = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('autocompleteTwo')),
      { types: ['geocode'] });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocompleteTwo, 'place_changed', function() {
    fillInAddress();
  });
}


// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,
          geolocation));
    });
  }
}
function geolocateTwo() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      autocompleteTwo.setBounds(new google.maps.LatLngBounds(geolocation,
          geolocation));
    });
  }
}
// [END region_geolocation]

</script>

<style type="text/css">
input[type='text']{ width:99%;}

.field {width: 99%;}
.slimField {width: 80px;}
.wideField {width: 200px;}
.label {text-align: right;font-weight: bold;width: 100px;color: #303030;}


#address td {font-size: 10pt;}
#autocomplete {position: absolute;top: 0px;left: 0px;}
#locationFieldTwo {position: absolute;top: 25px;left: 0px;}
#locationField,#locationFieldTwo {height: 20px;margin-bottom: 2px;}
#locationField,#locationFieldTwo, #controls {position: relative;width: 480px;}
#address {border: 1px solid #000090;background-color: #f0f0ff;width: 480px;padding-right: 2px;}
</style>
</head>

<body onload="initializeTwo(),initialize()">
<form action="#" method="post" name="Fform">
<div id="locationField">
<input name="address1" id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text"></input>
</div>
<div id="locationFieldTwo">
<input name="address2" id="autocompleteTwo" placeholder="Enter your address" onFocus="geolocateTwo()" type="text"></input>
</div>
<input type="submit" name="find" value="Search" style="float:left; clear:both; margin-top:40px;">
</form>
<?php
if(isset($get)){
?>
<p id="results" style="margin-top:100px;">
<?php echo "<strong>Distance:</strong> ".round($get,2)."<strong> In Mile</strong>"; ?>
</p>
<?php
}
?>
</body>
</html>