<?php 
require('configure.php');
$getpagename = basename($_SERVER['PHP_SELF']);
/*-----------------------------------------------------*/
$sqlData = "SELECT * FROM ".TBL_SETTINGS." WHERE id=1";
$getData = $db->selectData($sqlData);
$adminData = $db->getRow($getData);
/*-----------------------------------------------------*/
$sqlLogo = "SELECT * FROM ".TBL_LOGO." WHERE id=2";
$getLogo = $db->selectData($sqlLogo);
$companyLogo = $db->getRow($getLogo);
/*-----------------------------------------------------*/
$sqlTrailer = "SELECT * FROM ".TBL_TRAILER." WHERE id=1";
$getTriler = $db->selectData($sqlTrailer);
$get = $db->getRow($getTriler);
/*-----------------------------------------------------*/
$sqlPUM = "SELECT * FROM ".TB_PACK_UNPACK_MOVERS." WHERE id=1";
$sqlPUMEXE = $db->selectData($sqlPUM);
$getPUM = $db->getRow($sqlPUMEXE);
/*-----------------------------------------------------*/
$sqlSA = "SELECT * FROM ".TBL_MOVING_QUOTE_DATA." WHERE acc_id=1";
$sqlSAEXE = $db->selectData($sqlSA);
$getSA = $db->getRow($sqlSAEXE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php print SITE_NAME; ?></title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/responsive.css" rel="stylesheet" type="text/css" />
<link href="css/normalize.css" rel="stylesheet" type="text/css" />
<!-- DATEPICKER SECTION -->
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.9.1.js"></script>
<script src="js/slides.min.jquery.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="videos/control.js"></script>
<script type="text/javascript">
$(function(){
	$('#slides').slides({
		preload: true,
		preloadImage: 'images/loading.gif',
		play:5000,
		pause:2500,
		hoverPause: true,
		animationStart: function(current){
			$('.caption').animate({
				bottom:-35
			},100);
			if (window.console && console.log) {
				// example return of current slide number
				console.log('animationStart on slide: ', current);
			};
		},
		animationComplete: function(current){
			$('.caption').animate({
				bottom:0
			},200);
			if (window.console && console.log) {
				// example return of current slide number
				console.log('animationComplete on slide: ', current);
			};
		},
		slidesLoaded: function() {
			$('.caption').animate({
				bottom:0
			},200);
		}
	});
});
</script>
<script type="text/javascript">
$(function(){
var dateToday = new Date();	
$("#blog9").datepicker({dateFormat:'yy-mm-dd',yearRange: '2013:2050',changeMonth: true,changeYear: true,numberOfMonths: 1, showButtonPanel: true, minDate: dateToday });
});
</script>
<script type="text/javascript">
$(document).ready(function(){ 
function tick2(){
$('#ticker_02 li:first').slideUp( function () { $(this).appendTo($('#ticker_02')).slideDown(); });
}
setInterval(function(){ tick2 () }, 5000);
});
</script>
<script type="text/javascript" language="javascript">   
function disableBackButton(){
//window.history.forward()
}  
disableBackButton();  
window.onload=disableBackButton();  
window.onpageshow=function(evt) { if(evt.persisted) disableBackButton() }  
window.onunload=function() { void(0) }  
</script>
<script type="text/javascript" language="javascript">   
function getSelectVal(val,id){
document.getElementById(id).value=val;
}  
</script>
<script type="text/javascript">
$(function() {
var pull 		= $('#pull');
	menu 		= $('nav ul');

$(pull).on('click', function(e) {
	e.preventDefault();
	menu.slideToggle();
});
$(window).resize(function(){
	var w = $(this).width();

	if(w > 767 && menu.is(':hidden')) {
		menu.removeAttr('style');
	}
});
$('li').on('click', function(e) {				
	var w = $(window).width();
	if(w < 767 ) {
		menu.slideToggle();
	}
});
$('.panel').height($(window).height());
});
</script>
<!-- MASSAGE SECTION -->
<link rel="stylesheet" href="css/notifyBar.css" />
<script type="text/javascript" src="js/jquery.notifyBar.js"></script>
<!--API FOR GOOGLE-->
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
function getAjaxCall_dis1(){
var hr = new XMLHttpRequest();
var url = "ajax_distanceCalculator.php";
var blocation = document.getElementById("bAddress").value;
var plocation = document.getElementById("autocomplete").value;
var vars = "address1="+plocation+"&address2="+blocation+"&counter="+1;
hr.open("POST", url, true);
hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
hr.onreadystatechange = function() {
if(hr.readyState == 4 && hr.status == 200) {
var return_data = hr.responseText;
console.log(return_data);
}
}
hr.send(vars); 
}

function getAjaxCall_dis2(){
var hr = new XMLHttpRequest();
var url = "ajax_distanceCalculator.php";
var plocation = document.getElementById("autocomplete").value;
var mlocation = document.getElementById("autocompleteTwo").value;
var vars = "address1="+plocation+"&address2="+mlocation+"&counter="+2;
hr.open("POST", url, true);
hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
hr.onreadystatechange = function() {
if(hr.readyState == 4 && hr.status == 200) {
var return_data = hr.responseText;
document.getElementById("sResult").innerHTML = return_data;
}
}
hr.send(vars); 
}
</script>
</head>
<?php
/*if(isset($_REQUEST['quots']) && $_REQUEST['quots'] == 'GO'){
$getReturn  = $move->getExsitingQuots($_POST['phone_no'],$_POST['email']);
if($getReturn){
$getInsertId = $db->insertDataArray(TBL_QUOTS,$_POST);
if($getInsertId){
$to = $adminData['site_email'];
$name = "New Quote From Customer -- AutoReply Mail";
$from = 'admin@sabmecto.net';
$email= addslashes(trim($_POST['email']));
$nameData= addslashes(trim($_POST['name']));
$phone= addslashes(trim($_POST['phone_no']));
$address= addslashes(trim($_POST['address']));
$catagory= addslashes(trim($_POST['c_catagory']));
$noofb= addslashes(trim($_POST['no_of_bedroom']));
$budgetprice= addslashes(trim($_POST['budget_price']));
if($catagory==0){
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
<td width='80%'>".stripslashes($phone)."</td>
</tr>
<tr>
<td width='20%'><strong>Address:</strong></td>
<td width='80%'>".stripslashes($address)."</td>
</tr>
<tr>
<td width='20%'><strong>Catagory:</strong></td>
<td width='80%'>".stripslashes($cata)."</td>
</tr>
<tr>
<td width='20%'><strong>No Of Bedroom:</strong></td>
<td width='80%'>".stripslashes($noofb)."</td>
</tr>
<tr>
<td valign='top'><strong>Budget Price:</strong></td>
<td>".stripslashes($budgetprice)."</td>
</tr>
</table>
</body>
</html>";
$subject = "Enqiry Details From '".ucfirst(stripslashes($nameData))."'";
if(mail($to, $subject, $message, $headers)){
$message ="Success:Your Have Succefully Contact Ufirstmoving.com";	
}else{
$message ="Success:Your Have Partly Contact Ufirstmoving.com";	
}
}else{
$message ="Error:Sorry We Have A Temporary Problem !!";	
}	
}else{
$message ="Error:You Have Already Sumited Your Data";	
}
}*/
/*--------------------------------------------------INSERT CUSTOMERS QUOTS--------------------------------------------------------*/
//------------------------------------------------------------------------------------------------------------------------------------------//
/*--------------------------------------------------INSERT REVIEW----------------------------------------------------------------*/
if(isset($_REQUEST['sub-review']) && $_REQUEST['sub-review'] == 'Submit'){
$getReturn  = $move->getExsitingRewiew($_POST['email']);
if($getReturn){
$_POST['date']=date('Y-m-d');	
$getInsertId = $db->insertDataArray(TBL_REVIEW,$_POST);	
if(!empty($getInsertId)){
$message ="Success:Thank You !! For Submitting You Review";
}else{
$message ="Error:Sorry We Have A Temporary Problem !!";		
}
}else{
$message ="Error:You Have Already Submited A Review !!";		
}
}
/*--------------------------------------------------INSERT REVIEW--------------------------------------------------------------*/
//------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------//
/*--------------------------------------------------COMTACT US CODE----------------------------------------------------------------*/
if(isset($_REQUEST['contactUs']) && $_REQUEST['contactUs'] == 'Submit'){
/*-----------------------------------------------------*/	
$to = $adminData['site_email'];
$name = "Contact Us Auto Mail";
$from = 'admin@sabmecto.net';
/*-----------------------------------------------------*/
$email= addslashes(trim($_POST['email']));
$nameData= addslashes(trim($_POST['name']));
$phone= addslashes(trim($_POST['phone']));
$msg= addslashes(trim($_POST['message']));
/*-----------------------------------------------------*/
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To:  <'.$to.'>' . "\r\n";
$headers .= 'From: '.$name.' <'.$from.'>'."\r\n" ;
/*-----------------------------------------------------*/
$message="<html>
<head>
<title>Contact Us Enquiery From :-- ".ucfirst(stripslashes($nameData))."</title>
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
<td width='80%'>".stripslashes($phone)."</td>
</tr>
<tr>
<td valign='top'><strong>Message:</strong></td>
<td>".stripslashes($msg)."</td>
</tr>
</table>
</body>
</html>";
$subject = "Enqiry Details From '".ucfirst(stripslashes($nameData))."'";
if(mail($to, $subject, $message, $headers)){
$message ="Success:Thank You !! For Giving You FeedBack";	
}else{
$message ="Success:Your Have Partly Contact Ufirstmoving.com";	
}
}
/*--------------------------------------------------COMTACT US CODE--------------------------------------------------------------*/
//------------------------------------------------------------------------------------------------------------------------------------------//
?>

