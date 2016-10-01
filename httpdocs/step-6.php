<?php include('includes/top.php');?>
<?php
if (isset($_REQUEST['submitbtn']) && $_REQUEST['submitbtn'] == 'Submit_val_5') {
	$trailerRentatalTotal_one = $_SESSION['pageOneData_one']['step_2_product_price_one'];
	$trailerRentatalTotal_two = $_SESSION['pageOneData_one']['step_2_product_price_two'];
	$trailerRentatalTotal_three = $_SESSION['pageOneData_one']['step_2_product_price_three'];
	$truckRentalTotal = $_SESSION['pageOneData_one']['step_2_product_price_truck'];
	$expeditedTotal = $_SESSION['pageOneData_one']['expedited-service-price'];
	$movingHelperTotal = $_SESSION['pageOneData_three']['totalOfstep4'];
	if (!isset($_SESSION['pageOneData_four'])) {
		$arry = array(
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
			"lock_on_container" => $_REQUEST['lock_on_container']*2,
			"sTotal" => $_REQUEST['sTotal'],
			"grandToatal" => $grandToatal
		);
		$_SESSION['pageOneData_four'] = $arry;
	} else {
		$_SESSION['pageOneData_four']['acc_one_qty']=$_REQUEST['acc_one_qty']; 
		$_SESSION['pageOneData_four']['acc_two_qty']=$_REQUEST['acc_two_qty']; 
		$_SESSION['pageOneData_four']['acc_three_qty']=$_REQUEST['acc_three_qty']; 
		$_SESSION['pageOneData_four']['acc_four_qty']=$_REQUEST['acc_four_qty']; 
		$_SESSION['pageOneData_four']['acc_five_qty']=$_REQUEST['acc_five_qty']; 
		$_SESSION['pageOneData_four']['acc_six_qty']=$_REQUEST['acc_six_qty']; 
		$_SESSION['pageOneData_four']['acc_seven_qty']=$_REQUEST['acc_seven_qty']; 
		$_SESSION['pageOneData_four']['acc_eight_qty']=$_REQUEST['acc_eight_qty']; 
		$_SESSION['pageOneData_four']['acc_nine_qty']=$_REQUEST['acc_nine_qty']; 
		$_SESSION['pageOneData_four']['equ_one_qty']=$_REQUEST['equ_one_qty']; 
		$_SESSION['pageOneData_four']['equ_two_qty']=$_REQUEST['equ_two_qty']; 
		$_SESSION['pageOneData_four']['acc_one_total']=$_REQUEST['acc_one_total']; 
		$_SESSION['pageOneData_four']['acc_two_total']=$_REQUEST['acc_two_total']; 
		$_SESSION['pageOneData_four']['acc_three_total']=$_REQUEST['acc_three_total']; 
		$_SESSION['pageOneData_four']['acc_four_total']=$_REQUEST['acc_four_total']; 
		$_SESSION['pageOneData_four']['acc_five_total']=$_REQUEST['acc_five_total']; 
		$_SESSION['pageOneData_four']['acc_six_total']=$_REQUEST['acc_six_total']; 
		$_SESSION['pageOneData_four']['acc_seven_total']=$_REQUEST['acc_seven_total']; 
		$_SESSION['pageOneData_four']['acc_eight_total']=$_REQUEST['acc_eight_total']; 
		$_SESSION['pageOneData_four']['acc_nine_total']=$_REQUEST['acc_nine_total']; 
		$_SESSION['pageOneData_four']['equ_one_total']=$_REQUEST['equ_one_total']; 
		$_SESSION['pageOneData_four']['equ_two_total']=$_REQUEST['equ_two_total']; 
		$_SESSION['pageOneData_four']['lock_on_container']=$_REQUEST['lock_on_container']*2;
		$_SESSION['pageOneData_four']['grandToatal']=$grandToatal;
		$_SESSION['pageOneData_four']['sTotal']=$_REQUEST['sTotal'];
	}
	$accessaryTotal = $_SESSION['pageOneData_four']['acc_one_total']+$_SESSION['pageOneData_four']['acc_two_total']+$_SESSION['pageOneData_four']['acc_three_total']+$_SESSION['pageOneData_four']['acc_four_total']+$_SESSION['pageOneData_four']['acc_five_total']+$_SESSION['pageOneData_four']['acc_six_total']+$_SESSION['pageOneData_four']['acc_seven_total']+$_SESSION['pageOneData_four']['acc_eight_total']+$_SESSION['pageOneData_four']['acc_nine_total']+$_SESSION['pageOneData_four']['equ_one_total']+$_SESSION['pageOneData_four']['equ_two_total']+$_SESSION['pageOneData_four']['lock_on_container']; 
	$grandToatal = $accessaryTotal + $trailerRentatalTotal_one + $trailerRentatalTotal_two + $trailerRentatalTotal_three  + $movingHelperTotal + $truckRentalTotal + $expeditedTotal;
	$_SESSION['toatlSession'] = array("accessaryTotal"=> $accessaryTotal , "trailerRentatalTotal_one"=> $trailerRentatalTotal_one, "trailerRentatalTotal_two"=> $trailerRentatalTotal_two, "trailerRentatalTotal_three"=> $trailerRentatalTotal_three, "movingHelperTotal"=> $movingHelperTotal,"truckRentalTotal"=>$truckRentalTotal,"expeditedTotal"=>$expeditedTotal, "total"=> $grandToatal);
}
if (!isset($_REQUEST['submitbtn']) && $_REQUEST['submitbtn'] != 'Submit_val_5' && empty($_SESSION['pageOneData_four'])) {
?>
<script type="text/javascript">
document.location.href='step-5.php';
</script>
<?php
}
?>
<?php
if(isset($_REQUEST['street_address_move_to'])){
?>
<script type="text/javascript">
window.onload = function() {
	getAjaxCall_dis2();
}
</script>
<?php	
}
?>
<script type="text/javascript">

function getAjaxCall_dis1() {
	var hr = new XMLHttpRequest();
	var url = "ajax_distanceCalculator.php";
	var blocation = document.getElementById("bAddress").value;
	var plocation = document.getElementById("autocomplete").value;
	var vars = "address1="+plocation+"&address2="+blocation+"&counter="+1;
	hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
		if (hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			console.log(return_data);
			document.getElementById("distanceFirst").value= parseFloat(Math.round(return_data * 100) / 100).toFixed(2);
			calculate_totals_first(return_data);
		}
	}
	hr.send(vars); 
}

function getAjaxCall_dis2() {
	var hr = new XMLHttpRequest();
	var url = "ajax_distanceCalculator.php";
	var plocation = document.getElementById("autocomplete").value;
	var mlocation = document.getElementById("autocompleteTwo").value;
	var vars = "address1="+plocation+"&address2="+mlocation+"&counter=2";
	hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
		if(hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			//alert(return_data);
			document.getElementById("distanceSecond").value= parseFloat(Math.round(return_data * 100) / 100).toFixed(2);
			calculate_totals();
		}
	}
	hr.send(vars); 
}

function getAjaxCall_dis3(e) {
	calculate_totals();
}

function calculate_totals() {
	var dist = parseFloat(document.getElementById("distanceFirst").value) + parseFloat(document.getElementById("distanceSecond").value);
	var roundTrips = parseInt(document.getElementById("roundTrip").value);
	var trailer1Count = <?php echo $_SESSION['pageOneData_one']['step_2_product_qty_one'] ?>;
	var trailer2Count = <?php echo $_SESSION['pageOneData_one']['step_2_product_qty_two'] ?>;
	var truckCount = <?php echo $_SESSION['pageOneData_one']['step_2_product_qty_truck'] ?>;


	var surcharge = (dist*2.5*trailer1Count + dist*3.5*trailer2Count + dist*2.5*truckCount )*roundTrips;
	var total = surcharge + <?php echo $_SESSION['toatlSession']['total']; ?>
	// calculate surcharge
	document.getElementById("sResult").innerHTML = '$'+surcharge.toFixed(2);
	document.getElementById("totalCharge").innerHTML = '$'+total.toFixed(2);
	document.getElementById("estimatedCost").innerHTML = '$'+total.toFixed(2);
	document.getElementById("serchargeData").value = surcharge.toFixed(2);
	document.getElementById("gtotal").value = total;
}

function calculate_totals_first() {
	var dist = parseFloat(document.getElementById("distanceFirst").value) + parseFloat(document.getElementById("distanceSecond").value);
	var roundTrips = parseInt(document.getElementById("roundTrip").value);
	var trailer1Count = <?php echo $_SESSION['pageOneData_one']['step_2_product_qty_one'] ?>;
	var trailer2Count = <?php echo $_SESSION['pageOneData_one']['step_2_product_qty_two'] ?>;
	var truckCount = <?php echo $_SESSION['pageOneData_one']['step_2_product_qty_truck'] ?>;

	var surcharge = (dist*2.5*trailer1Count + dist*3.5*trailer2Count + dist*2.5*truckCount )*roundTrips;
	var total = surcharge + <?php echo $_SESSION['toatlSession']['total']; ?>
	// calculate surcharge
	//document.getElementById("sResult").innerHTML = '$'+surcharge.toFixed(2);
	//document.getElementById("totalCharge").innerHTML = '$'+total.toFixed(2);
	//document.getElementById("estimatedCost").innerHTML = '$'+total.toFixed(2);
	document.getElementById("serchargeData").value = surcharge.toFixed(2);
	document.getElementById("gtotal").value = total;
}
</script>
<body onLoad="initializeTwo(),initialize()">
<?php include('includes/header.php'); ?>
<div class="stepSec">
<?php include('includes/sub_menu.php'); ?>
<div class="topMain">
<div class="step5Sec">
<form action="confirm-page.php" method="post" onSubmit="checkAddress()">

<div class="step5Lft col-md-7">
<div class="step5Bar">
<!--<ul>
<li><a href="#">STEP 6<br /><p>Complete Reservation </p></a></li>
</ul>-->
<p style="margin-left:10px;">You're almost done! Just a few more details.</p>
</div>

<div class="deliveryLocPnl">
<h3>PRIMARY CONTACT INFORMATION</h3>
<p>Please provide the primary contact information for your Rent2Haul order</p>
<div class="primaryContactSec">
<div class="fnamEFrm col-md-5"><input name="pfname" type="text"  placeholder="First Name" autocomplete='off' value="<?php echo $_REQUEST['pfname']; ?>"  required /></div>
<div class="fnamEFrm col-md-5"><input name="plname" type="text"  placeholder="Last Name"  autocomplete='off' value="<?php echo $_REQUEST['plname']; ?>" required/></div>
<div class="fnamEFrm2 col-md-5"><input name="p_phone_no" type="text" placeholder="Primary Phone" autocomplete='off'  value="<?php echo $_REQUEST['p_phone_no']; ?>" required /></div>
<div class="fnamEFrm3 col-md-5"><input name="p_email" type="text" placeholder="Email Address" autocomplete='off' value="<?php echo $_REQUEST['p_email']; ?>" required /></div>
</div>
</div>

<div class="deliveryLocPnl">
<h3>FIRST LOCATION</h3>
<p>Where will we be delivering your Rent2Haul trailer or truck for you?</p>
<div class="streetAdsArea">

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>*First Address</p>
<div class="streetFrmBorder">
<input name="street_address" id="autocomplete" type="text" onClick="getAjaxCall_dis1()" value="<?php echo $_REQUEST['street_address']; ?>" required />
<input name="Distance1" id="distanceFirst" type="hidden" value="0" />
</div>
<p>* Please enter the right location.</p>
</div>

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>City</p>
<div class="streetFrmBorder">
<input id="city_1" name="city" type="text" autocomplete='off' value="<?php echo $_REQUEST['city']; ?>" />
</div>
</div>

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>State</p>
<div class="streetFrmBorder">
<input id="state_1" name="state" type="text" autocomplete='off' value="<?php echo $_REQUEST['state']; ?>" />
</div>
</div>

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>Zipcode</p>
<div class="streetFrmBorder">
<input id="zip_code_1" name="zipcode" type="text" autocomplete='off' value="<?php echo $_REQUEST['zipcode']; ?>" />
</div>
</div>

<div class="bldgAtrea">
<p>Bldg/Suite/Apt #</p>
<div class="bldgBorder">
<input name="bldg_suite_apt" type="text" autocomplete='off' value="<?php echo $_REQUEST['bldg_suite_apt']; ?>" />
</div>
</div>
</div>
<div class="delAddressArea">
<p>Please enter the nearest major intersection to the delivery address <span>(e.g.17th and Main St.)</span></p>
<div class="delAddressFrm">
<input name="nerest_intersection" type="text" autocomplete='off' value="<?php echo $_REQUEST['nerest_intersection']; ?>" />
</div>
</div>
<div class="addressApartArea">
<div class="radioarea1">
<p>Is this address an <span>apartment or condo?</span></p>
<div class="yesNoPrt">
<div class="radioYes">
<div class="radioslct"><input name="choice1" type="radio" value="No" required <?php if($_REQUEST['choice1'] == 'No'){?> checked="checked"  <?php } ?> /></div>
<p>No</p>
</div>
<div class="radioYes">
<div class="radioslct"><input name="choice1" type="radio" value="Yes" required <?php if($_REQUEST['choice1'] == 'Yes'){?> checked="checked"  <?php } ?> /></div>
<p>Yes</p>
</div>
</div>
</div>
<div class="radioarea1">
<p>Is this is <span>gated community?</span></p>
<div class="yesNoPrt">
<div class="radioYes">
<div class="radioslct"><input name="choice2" type="radio" value="No" required <?php if($_REQUEST['choice1'] == 'No'){?> checked="checked"  <?php } ?> /></div>
<p>No</p>
</div>
<div class="radioYes">
<div class="radioslct"><input name="choice2" type="radio" value="Yes" required <?php if($_REQUEST['choice1'] == 'Yes'){?> checked="checked"  <?php } ?> /></div>
<p>Yes</p>
</div>
</div>
</div>
</div>
</div>
<div class="deliveryLocPnl">
<h3>MOVE TO LOCATION</h3>
<div class="streetAdsArea">
<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>*Street Address</p>
<div class="streetFrmBorder">
<input name="street_address_move_to" id="autocompleteTwo" type="text" required value="<?php echo $_REQUEST['street_address_move_to']; ?>"  />
<input name="Distance2" id="distanceSecond" type="hidden" value="0" />
</div>
<p>* Please enter the right location. Based on the address you provie it will calculate surcharge</p>
</div>
<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>City</p>
<div class="streetFrmBorder">
<input id="city_2" name="city_move_to" type="text" autocomplete='off' value="<?php echo $_REQUEST['city_move_to']; ?>" />
</div>
</div>
<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>State</p>
<div class="streetFrmBorder">
<input id="state_2" name="state_move_to" type="text" autocomplete='off' value="<?php echo $_REQUEST['state_move_to']; ?>" />
</div>
</div>
<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>Zipcode</p>
<div class="streetFrmBorder">
<input id="zip_code_2" name="zipcode_move_to" type="text" autocomplete='off' value="<?php echo $_REQUEST['zipcode_move_to']; ?>" />
</div>
</div>
<div class="bldgAtrea">
<p>Bldg/Suite/Apt #</p>
<div class="bldgBorder">
<input name="bldg_suite_apt_move_to" type="text" autocomplete='off' value="<?php echo $_REQUEST['bldg_suite_apt_move_to']; ?>" />
</div>
</div>
</div>
<div class="delAddressArea">
<p>Please enter the nearest major intersection to the delivery address <span>(e.g.17th and Main St.)</span></p>
<div class="delAddressFrm">
<input name="nerest_intersection_move_to" type="text" autocomplete='off' value="<?php echo $_REQUEST['nerest_intersection_move_to']; ?>" />
</div>
</div>
<div class="addressApartArea">
<div class="radioarea1">
<p>Is this address an <span>apartment or condo?</span></p>
<div class="yesNoPrt">
<div class="radioYes">
<div class="radioslct"><input name="choice1_move_to" type="radio" value="No" required <?php if($_REQUEST['choice1_move_to'] == 'No'){?> checked="checked"  <?php } ?> /></div>
<p>No</p>
</div>
<div class="radioYes">
<div class="radioslct"><input name="choice1_move_to" type="radio" value="Yes" required <?php if($_REQUEST['choice1_move_to'] == 'Yes'){?> checked="checked"  <?php } ?> /></div>
<p>Yes</p>
</div>
</div>
</div>
<div class="radioarea1">
<p>Is this is <span>gated community?</span></p>
<div class="yesNoPrt">
<div class="radioYes">
<div class="radioslct"><input name="choice2_move_to" type="radio" value="No" required <?php if($_REQUEST['choice2_move_to'] == 'No'){?> checked="checked"  <?php } ?> /></div>
<p>No</p>
</div>
<div class="radioYes">
<div class="radioslct"><input name="choice2_move_to" type="radio" value="Yes" required <?php if($_REQUEST['choice2_move_to'] == 'Yes'){?> checked="checked"  <?php } ?> /></div>
<p>Yes</p>
</div>
</div>
</div>
<div class="radioarea1">
<p>How many round trips will you need for the trailer or truck?</span></p>
<div class="yesNoPrt">
<div class="radioYes">
<select name="roundTripCount" required id="roundTrip" onChange="getAjaxCall_dis3(this.value)">
<option value="1" selected>1</option>
<option value="2">2</option>
<option value="3">3</option>
</select> 
</div>
</div>
</div>
</div>
</div>
</div>

<div class="step5Right col-md-4">
<center><img src="image/res-pic.jpg" class="hidden-xs" width="248" height="205" alt="images" /> </centeR>
<div class="step5whiteArea col-md-12">
<p>To get this guaranteed rate, complete your reservation today!</p>
</div>
<div class="reservationDetails col-md-12">
<h2>RESERVATION DETAILS</h2>
<!--
<p>Quote # 23128199
<br />Drop ff address: 33762
<br />(1)Drop off date:5/5/2014
<br />(1)Container placement When facing the front entrance of the building, this container will be placed on the left side of the building in the middle of the driveway.
<br />(1)Most containers will be delivered before 5:00PM local time</p>
-->
</div>
<div class="reservationDetails col-md-12">
<h2>CHARGES UPON INITIAL DELIVERY</h2>
<!--STEP 2 CALCULATION-->
<?php

if(!empty($_SESSION['toatlSession']['truckRentalTotal'])){
?>
<div class="delRow1">
<h5>Pickup Truck<br /><strong>1</strong> qty 
<p class="contTop">$<?php echo $_SESSION['toatlSession']['truckRentalTotal']; ?></p>
</h5>
</div>
<?php
}
?>

<?php

if(!empty($_SESSION['toatlSession']['expeditedTotal'])){
?>
<div class="delRow1">
<h5>Expedited Service<br /><strong><?php echo($_SESSION['pageOneData_one']['expedited-service']); ?></strong> hours
<p class="contTop">$<?php echo($_SESSION['toatlSession']['expeditedTotal']); ?></p>
</h5>
</div>
<?php
}
?>


<?php
if(!empty($_SESSION['toatlSession']['trailerRentatalTotal_one'])){
?>
<div class="delRow1">
<h5><?php echo $get['trailer_one'].'&nbsp;'.'foot'.'&nbsp;'.'Trailer'; ?><br /><strong><?php echo $_SESSION['pageOneData_one']['step_2_product_qty_one']; ?></strong> qty 
<p class="contTop">$<?php echo $_SESSION['toatlSession']['trailerRentatalTotal_one']; ?></p>
</h5>
</div>
<?php
}
?>
<?php
if(!empty($_SESSION['toatlSession']['trailerRentatalTotal_two'])){
?>
<div class="delRow1">
<h5><?php echo $get['trailer_two'].'&nbsp;'.'foot'.'&nbsp;'.'Trailer'; ?><br /><strong><?php echo $_SESSION['pageOneData_one']['step_2_product_qty_two']; ?></strong> qty 
<p class="contTop">$<?php echo $_SESSION['toatlSession']['trailerRentatalTotal_two']; ?></p>
</h5>
</div>
<?php
}
?>
<?php
if(!empty($_SESSION['toatlSession']['trailerRentatalTotal_three'])){
?>
<div class="delRow1">
<h5><?php echo $get['trailer_three'].'&nbsp;'.'foot'.'&nbsp;'.'Trailer'; ?><br /><strong><?php echo $_SESSION['pageOneData_one']['step_2_product_qty_three']; ?></strong> qty 
<p class="contTop">$<?php echo $_SESSION['toatlSession']['trailerRentatalTotal_three']; ?></p>
</h5>
</div>
<?php
}
?>
<!--STEP 2 CALCULATION-->
<!--STEP 4 CALCULATION-->
<?php
if(isset($_SESSION['pageOneData_three']) && empty($_SESSION['pageOneData_three']['step_4_no_of_movers_puh']) && empty($_SESSION['pageOneData_three']['step_4_estimated_hrs_puh'])){
?>
<div class="delRow1">
<h5 style="font-weight:bold;">Movers Need</h5>
</div>
<div class="delRow1">
<h5>No of Movers: <?php echo $_SESSION['pageOneData_three']['step_4_no_of_movers_mh']; ?> <br /> Estimated Hours: <?php $_SESSION['pageOneData_three']['step_4_estimated_hrs_mh']; ?><br /> 
<p class="contTop">$<?php echo $_SESSION['pageOneData_three']['toatlOfMovers']; ?></p>
</h5>
</div>
<?php
}if(isset($_SESSION['pageOneData_three']) && empty($_SESSION['pageOneData_three']['step_4_no_of_movers_mh']) && empty($_SESSION['pageOneData_three']['step_4_estimated_hrs_mh'])){
?>
<div class="delRow1">
<h5 style="font-weight:bold;">Packing and Unpacking</h5>
</div>
<div class="delRow1">
<h5>No of Movers: <?php echo $_SESSION['pageOneData_three']['step_4_no_of_movers_puh']; ?>  <br />Estimated Hours: <?php echo $_SESSION['pageOneData_three']['step_4_estimated_hrs_puh']; ?><br /> 
<p class="contTop">$<?php echo $_SESSION['pageOneData_three']['toatlOfPAndU']; ?></p>
</h5>
</div>
<?php
}if(!empty($_SESSION['pageOneData_three']['step_4_no_of_movers_mh']) && !empty($_SESSION['pageOneData_three']['step_4_estimated_hrs_mh']) && !empty($_SESSION['pageOneData_three']['step_4_no_of_movers_puh']) && !empty($_SESSION['pageOneData_three']['step_4_estimated_hrs_puh'])){
?>
<div class="delRow1">
<h5 style="font-weight:bold;">Movers Need</h5>
</div>
<div class="delRow1">
<h5>No of Movers: <?php echo $_SESSION['pageOneData_three']['step_4_no_of_movers_mh']; ?> <br /> Estimated Hours: <?php echo $_SESSION['pageOneData_three']['step_4_estimated_hrs_mh']; ?><br /> 
<p class="contTop">$<?php echo $_SESSION['pageOneData_three']['toatlOfMovers']; ?></p>
</h5>
</div>
<div class="delRow1">
<h5 style="font-weight:bold;">Packing and Unpacking</h5>
</div>
<div class="delRow1">
<h5>No of Movers: <?php echo $_SESSION['pageOneData_three']['step_4_no_of_movers_puh']; ?> <br /> Estimated Hours: <?php echo $_SESSION['pageOneData_three']['step_4_estimated_hrs_puh']; ?><br /> 
<p class="contTop">$<?php echo $_SESSION['pageOneData_three']['toatlOfPAndU']; ?></p>
</h5>
</div>
<?php
}
?>
<!--STEP 4 CALCULATION-->
<!--STEP 5 CALCULATION-->
<?php 
if(!empty($_SESSION['pageOneData_four']['lock_on_container']) || !empty($_SESSION['pageOneData_four']['acc_one_qty']) ||  !empty($_SESSION['pageOneData_four']['acc_two_qty']) ||  !empty($_SESSION['pageOneData_four']['acc_three_qty']) ||  !empty($_SESSION['pageOneData_four']['acc_four_qty']) ||  !empty($_SESSION['pageOneData_four']['acc_five_qty']) ||  !empty($_SESSION['pageOneData_four']['acc_six_qty']) ||  !empty($_SESSION['pageOneData_four']['acc_seven_qty']) ||  !empty($_SESSION['pageOneData_four']['acc_eight_qty']) ||  !empty($_SESSION['pageOneData_four']['acc_nine_qty']) ||  !empty($_SESSION['pageOneData_four']['equ_one_qty'])||  !empty($_SESSION['pageOneData_four']['equ_two_qty'])){
?>	
<div class="delRow1">
<h5 style="font-weight:bold;">Supply And Accessories</h5>
</div>
<?php
}
?>
<div class="delRow1">
<?php
if(!empty($_SESSION['pageOneData_four']['acc_one_qty'])){
?>
<h5>1.5 CU SMALL BOX  (<strong><?php echo $_SESSION['pageOneData_four']['acc_one_qty']; ?></strong>)<br />
<p class="contTop"><?php echo !empty($_SESSION['pageOneData_four']['acc_one_total'])? '$'.$_SESSION['pageOneData_four']['acc_one_total'] : "" ; ?></p>
</h5>
<?php
}
?>
<?php
if(!empty($_SESSION['pageOneData_four']['acc_two_qty'])){
?>
<h5>3.0 MEDIUM BOX  (<strong><?php echo $_SESSION['pageOneData_four']['acc_two_qty']; ?></strong>)<br />
<p class="contTop"><?php echo !empty($_SESSION['pageOneData_four']['acc_two_total'])? '$'.$_SESSION['pageOneData_four']['acc_two_total'] : ""; ?></p>
</h5>
<?php
}
?>
<?php
if(!empty($_SESSION['pageOneData_four']['acc_three_qty'])){
?>
<h5>5.2 LARGE BOX  (<strong><?php echo $_SESSION['pageOneData_four']['acc_three_qty']; ?></strong>)<br />
<p class="contTop"><?php echo !empty($_SESSION['pageOneData_four']['acc_three_total'])? '$'.$_SESSION['pageOneData_four']['acc_three_total']: ""; ?></p>
</h5>
<?php
}
?>
<?php
if(!empty($_SESSION['pageOneData_four']['acc_four_qty'])){
?>
<h5>BUBBLE WRAP/BAG 12"x60" 3/16  (<strong><?php echo $_SESSION['pageOneData_four']['acc_four_qty']; ?></strong>)<br />
<p class="contTop"><?php echo !empty($_SESSION['pageOneData_four']['acc_four_total'])? '$'.$_SESSION['pageOneData_four']['acc_four_total']: "" ; ?></p>
</h5>
<?php
}
?>
<?php
if(!empty($_SESSION['pageOneData_four']['acc_five_qty'])){
?>
<h5>CLEAR TAPE  (<strong><?php echo $_SESSION['pageOneData_four']['acc_five_qty']; ?></strong>)<br />
<p class="contTop"><?php echo !empty($_SESSION['pageOneData_four']['acc_five_total'])? '$'.$_SESSION['pageOneData_four']['acc_five_total']: ""; ?></p>
</h5>
<?php
}
?>
<?php
if(!empty($_SESSION['pageOneData_four']['acc_six_qty'])){
?>
<h5>KING SIZE MATTRESS BAG  (<strong><?php echo $_SESSION['pageOneData_four']['acc_six_qty']; ?></strong>)<br />
<p class="contTop"><?php echo !empty($_SESSION['pageOneData_four']['acc_six_total'])? '$'.$_SESSION['pageOneData_four']['acc_six_total']: ""; ?></p>
</h5>
<?php
}
?>
<?php
if(!empty($_SESSION['pageOneData_four']['acc_seven_qty'])){
?>
<h5>ROPE  (<strong><?php echo $_SESSION['pageOneData_four']['acc_seven_qty']; ?></strong>)<br />
<p class="contTop"><?php echo !empty($_SESSION['pageOneData_four']['acc_seven_total'])? '$'.$_SESSION['pageOneData_four']['acc_seven_total']: ""; ?></p>
</h5>
<?php
}
?>
<?php
if(!empty($_SESSION['pageOneData_four']['acc_eight_qty'])){
?>
<h5>STRETCH WRAP 5"  (<strong><?php echo $_SESSION['pageOneData_four']['acc_eight_qty']; ?></strong>)<br />
<p class="contTop"><?php echo !empty($_SESSION['pageOneData_four']['acc_eight_total'])? '$'.$_SESSION['pageOneData_four']['acc_eight_total']: ""; ?></p>
</h5>
<?php
}
?>
<?php
if(!empty($_SESSION['pageOneData_four']['acc_nine_qty'])){
?>
<h5>TWIN MATTRESS BAG  (<strong><?php echo $_SESSION['pageOneData_four']['acc_nine_qty']; ?></strong>)<br />
<p class="contTop"><?php echo !empty($_SESSION['pageOneData_four']['acc_nine_total'])? '$'.$_SESSION['pageOneData_four']['acc_nine_total']: ""; ?></p>
</h5>
<?php
}
?>
<?php
if(!empty($_SESSION['pageOneData_four']['equ_one_qty'])){
?>
<h5>HAND TRUCK -(RENTAL) (<strong><?php echo $_SESSION['pageOneData_four']['equ_one_qty']; ?></strong>)<br />
<p class="contTop"><?php echo !empty($_SESSION['pageOneData_four']['equ_one_total'])? '$'.round($_SESSION['pageOneData_four']['equ_one_total'],2): ""; ?></p>
</h5>
<?php
}
?>
<?php
if(!empty($_SESSION['pageOneData_four']['equ_two_qty'])){
?>
<h5>MOVING BLANKET -(RENTAL)  (<strong><?php echo $_SESSION['pageOneData_four']['equ_two_qty']; ?></strong>)<br />
<p class="contTop"><?php echo !empty($_SESSION['pageOneData_four']['equ_two_total'])? '$'.round($_SESSION['pageOneData_four']['equ_two_total'],2): ""; ?></p>
</h5>
<?php
}
?>
<?php
if(!empty($_SESSION['pageOneData_four']['lock_on_container'])){
?>
<h5>LOCK  (<strong>2</strong>)<br />
<p class="contTop"><?php echo !empty($_SESSION['pageOneData_four']['lock_on_container'])? '$'.$_SESSION['pageOneData_four']['lock_on_container']: ""; ?></p>
</h5>
<?php
}
?>
</div>
<!--STEP 5 CALCULATION-->
<?php /*?><div class="delRow1">
<h5>Trailer rental <br />Cost Total
<p class="contTop">$<?php echo $_SESSION['toatlSession']['trailerRentatalTotal']; ?></p>
</h5>
</div>
<div class="delRow1">
<h5>Moving Help <br />Cost Total
<p class="contTop">$<?php echo $_SESSION['toatlSession']['movingHelperTotal']; ?></p>
</h5>
</div>
<div class="delRow1">
<h5>Accessories &amp; Protection <br />Cost Total
<p class="contTop">$<?php echo $_SESSION['toatlSession']['accessaryTotal']; ?></p>
</h5>
</div>
<?php */?>
<!--<div class="delRow1">
<h5>Tax
<p>$10.00</p>
</h5>
</div>-->
<div class="totalCountingPnl">
<p>Total surcharge:
<span><strong id="sResult"></strong></span>
<input name="surchargeData" type="hidden" value="" id="serchargeData" />
</p>
</div>
<div class="totalCountingPnl">
<p>Total charges upon initial delivery: 
<strong><span id="totalCharge"><?php echo '$'.$_SESSION['toatlSession']['total']; ?></span></strong>
<input type="hidden" value="<?php echo '$'.$_SESSION['toatlSession']['total']; ?>" id="totalRent" />
</p>
</div>
</div>
</div>
<div class="ReservationPnl col-md-12">
<div class="reservedLft">
<h4>Estimated Cost --- <strong><span id="estimatedCost"><?php echo '$'.$_SESSION['toatlSession']['total']; ?></span></strong></h4>
<p>Rent2Haul representative will call you shortly to confirm order</p>
<div class="reservationTopBg">
<br />
<br />
<input type="hidden" name="acc_one_qty" value="<?php echo  $_SESSION['pageOneData_four']['acc_one_qty']; ?>" />
<input type="hidden" name="acc_two_qty" value="<?php echo $_SESSION['pageOneData_four']['acc_two_qty']; ?>" />
<input type="hidden" name="acc_three_qty" value="<?php echo $_SESSION['pageOneData_four']['acc_three_qty']; ?>" />
<input type="hidden" name="acc_four_qty" value="<?php echo $_SESSION['pageOneData_four']['acc_four_qty']; ?>" />
<input type="hidden" name="acc_five_qty" value="<?php echo $_SESSION['pageOneData_four']['acc_five_qty']; ?>" />
<input type="hidden" name="acc_six_qty" value="<?php echo $_SESSION['pageOneData_four']['acc_six_qty']; ?>" />
<input type="hidden" name="acc_seven_qty" value="<?php echo $_SESSION['pageOneData_four']['acc_seven_qty']; ?>" />
<input type="hidden" name="acc_eight_qty" value="<?php echo $_SESSION['pageOneData_four']['acc_eight_qty']; ?>" />
<input type="hidden" name="acc_nine_qty" value="<?php echo $_SESSION['pageOneData_four']['acc_nine_qty']; ?>" />
<input type="hidden" name="equ_one_qty" value="<?php echo $_SESSION['pageOneData_four']['equ_one_qty']; ?>" />
<input type="hidden" name="equ_two_qty" value="<?php echo $_SESSION['pageOneData_four']['equ_two_qty']; ?>" />
<input type="hidden" name="acc_one_total" value="<?php echo $_SESSION['pageOneData_four']['acc_one_total']; ?>" />
<input type="hidden" name="acc_two_total" value="<?php echo $_SESSION['pageOneData_four']['acc_two_total']; ?>" />
<input type="hidden" name="acc_three_total" value="<?php echo $_SESSION['pageOneData_four']['acc_three_total']; ?>" />
<input type="hidden" name="acc_four_total" value="<?php echo $_SESSION['pageOneData_four']['acc_four_total']; ?>" />
<input type="hidden" name="acc_five_total" value="<?php echo $_SESSION['pageOneData_four']['acc_five_total']; ?>" />
<input type="hidden" name="acc_six_total" value="<?php echo $_SESSION['pageOneData_four']['acc_six_total']; ?>" />
<input type="hidden" name="acc_seven_total" value="<?php echo $_SESSION['pageOneData_four']['acc_seven_total']; ?>" />
<input type="hidden" name="acc_eight_total" value="<?php echo $_SESSION['pageOneData_four']['acc_eight_total']; ?>" />
<input type="hidden" name="acc_nine_total" value="<?php echo $_SESSION['pageOneData_four']['acc_nine_total']; ?>" />
<input type="hidden" name="equ_one_total" value="<?php echo $_SESSION['pageOneData_four']['equ_one_total']; ?>" />
<input type="hidden" name="equ_two_total" value="<?php echo $_SESSION['pageOneData_four']['equ_two_total']; ?>" />
<input type="hidden" name="lock_on_container" value="<?php echo $_SESSION['pageOneData_four']['lock_on_container']; ?>" />

<input type="hidden" name="step_4_no_of_movers_puh" value="<?php echo $_SESSION['pageOneData_three']['step_4_no_of_movers_puh']; ?>" />
<input type="hidden" name="step_4_estimated_hrs_puh" value="<?php echo $_SESSION['pageOneData_three']['step_4_estimated_hrs_puh']; ?>" />
<input type="hidden" name="step_4_estimated_hrs_mh" value="<?php echo $_SESSION['pageOneData_three']['step_4_estimated_hrs_mh']; ?>" />
<input type="hidden" name="step_4_no_of_movers_mh" value="<?php echo $_SESSION['pageOneData_three']['step_4_no_of_movers_mh']; ?>" />

<input type="hidden" name="step_3_trailors_place" value="<?php echo $_SESSION['pageOneData_two']['step_3_trailors_place']; ?>" />

<input type="hidden" name="step_2_product_code_one" value="<?php echo $_SESSION['pageOneData_one']['step_2_product_code_one']; ?>" />
<input type="hidden" name="step_2_product_qty_one" value="<?php echo $_SESSION['pageOneData_one']['step_2_product_qty_one']; ?>" />
<input type="hidden" name="step_2_product_price_one" value="<?php echo $_SESSION['pageOneData_one']['step_2_product_price_one']; ?>" />

<input type="hidden" name="step_2_product_code_two" value="<?php echo $_SESSION['pageOneData_one']['step_2_product_code_two']; ?>" />
<input type="hidden" name="step_2_product_qty_two" value="<?php echo $_SESSION['pageOneData_one']['step_2_product_qty_two']; ?>" />
<input type="hidden" name="step_2_product_price_two" value="<?php echo $_SESSION['pageOneData_one']['step_2_product_price_two']; ?>" />


<input type="hidden" name="step_2_product_qty_truck" value="<?php echo $_SESSION['pageOneData_one']['step_2_product_qty_truck']; ?>" />
<input type="hidden" name="step_2_product_price_truck" value="<?php echo $_SESSION['pageOneData_one']['step_2_product_price_truck']; ?>" />

<input type="hidden" name="step_2_product_qty_expedited" value="<?php echo $_SESSION['pageOneData_one']['expedited-service']; ?>" />
<input type="hidden" name="step_2_product_price_expedited" value="<?php echo $_SESSION['pageOneData_one']['expedited-service-price']; ?>" />

<input type="hidden" name="step_2_product_code_three" value="<?php echo $_SESSION['pageOneData_one']['step_2_product_code_three']; ?>" />
<input type="hidden" name="step_2_product_qty_three" value="<?php echo $_SESSION['pageOneData_one']['step_2_product_qty_three']; ?>" />
<input type="hidden" name="step_2_product_price_three" value="<?php echo $_SESSION['pageOneData_one']['step_2_product_price_three']; ?>" />


<input type="hidden" name="c_catagory" value="<?php echo $_SESSION['pageOneData']['c_catagory']; ?>" />
<input type="hidden" name="date_to_move" value="<?php echo $_SESSION['pageOneData']['date_to_move']; ?>" />
<input type="hidden" name="name" value="<?php echo $_SESSION['pageOneData']['name']; ?>"  />
<input type="hidden" name="phone_no" value="<?php echo $_SESSION['pageOneData']['phone_no']; ?>"  />
<input type="hidden" name="email" value="<?php echo $_SESSION['pageOneData']['email']; ?>"  />

<input type="hidden" name="gtotal" id="gtotal" value="<?php echo $_SESSION['toatlSession']['total']; ?>"  />
<input type="hidden" name="businessAddress" id="bAddress" value="8129 S. Yukon Street, Littleton, Colorado 80128, United States"  />
<input type="submit" value="Submit_val_6" name="submit" alt="Submit" class="submit">
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
<?php 
include('includes/footer.php');
ob_end_flush();
?>