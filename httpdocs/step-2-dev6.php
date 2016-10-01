<?php 
include('includes/top-dev.php'); 
if(isset($_REQUEST['quots']) && $_REQUEST['quots'] == 'GO'){
if(!isset($_SESSION['pageOneData'])){
$arry = array(
"name" => $_REQUEST['name'],
"email" => $_REQUEST['email'],
"phone_no" => $_REQUEST['phone_no'],
"c_catagory" => $_REQUEST['c_catagory'],
"date_to_move" => $_REQUEST['date_to_move']
);
$_SESSION['pageOneData'] = $arry;
$calculationInsert = array("step_4_one" => 0.00);
$getInsertId = $db->insertDataArray(TBL_AJAX_CALCULATION,$calculationInsert);		
$_SESSION['CAL_INSERT_ID'] = $getInsertId;
}else{
$_SESSION['pageOneData']['name'] = $_REQUEST['name'];
$_SESSION['pageOneData']['email'] = $_REQUEST['email'];
$_SESSION['pageOneData']['phone_no'] = $_REQUEST['phone_no'];
$_SESSION['pageOneData']['c_catagory'] = $_REQUEST['c_catagory'];
$_SESSION['pageOneData']['date_to_move'] = $_REQUEST['date_to_move'];
}
}
?>
<?php
if(!isset($_REQUEST['quots']) && $_REQUEST['quots'] != 'GO' && empty($_SESSION['pageOneData'])){
echo '<script type="text/javascript">alert("Please Submit The Form First");</script>';
}
?>
<body onLoad="initializeTwo(),initialize()">
<?php include('includes/header-dev.php'); ?>
<div class="stepSec">
<?php include('includes/sub_menu.php'); ?>
<div class="topMain">
<div class="step5Sec">
<div class="step5Right">
<img src="image/res-pic.jpg" width="248" height="205" alt="images" /> 
<div class="step5whiteArea">
<p>To get the guaranteed rate, complete your reservation today!</p>
</div>
</div>
<form action="step-3-dev.php" method="post" onSubmit="checkAddress()">													
<div class="step5Lft">
<div class="step5Bar">
<ul>
<li><a href="#">STEP 6<br /><p>Complete Reservation </p></a></li>
</ul>
<p>You're almost done! Just a few more details.</p>
</div>

<div class="deliveryLocPnl">
<h3>PRIMARY CONTACT INFORMATION</h3>
<p>Please provide the primary contact information for your UFIRSTMOVING order</p>
<div class="primaryContactSec">
<div class="fnamEFrm"><input name="pfname" type="text"  placeholder="First Name" autocomplete='off'  required /></div>
<div class="fnamEFrm"><input name="plname" type="text"  placeholder="Last Name"  autocomplete='off'  required/></div>
<div class="fnamEFrm2"><input name="p_phone_no" type="text" placeholder="Primary Phone" autocomplete='off'  required /></div>
<div class="fnamEFrm3"><input name="p_email" type="text" placeholder="Email Address" autocomplete='off' required /></div>
</div>
</div>

<div class="deliveryLocPnl">
<h3>FIRST DROP LOCATION</h3>
<p>Where will we be delivering your UFIRSTMOVING trailer for you to load?</p>
<div class="streetAdsArea">

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>*First Address</p>
<div class="streetFrmBorder">
<input name="street_address" id="autocomplete" type="text"  onBlur="getAjaxCall_dis1()" onclick="getAjaxCall_dis1()" required />
</div>
<p>* Please enter the right location.</p>
</div>

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>City</p>
<div class="streetFrmBorder">
<input name="city" type="text" />
</div>
</div>

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>State</p>
<div class="streetFrmBorder">
<input name="state" type="text" />
</div>
</div>

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>Zipcode</p>
<div class="streetFrmBorder">
<input name="zipcode" type="text" />
</div>
</div>

<div class="bldgAtrea">
<p>Bldg/Suite/Apt #</p>
<div class="bldgBorder">
<input name="bldg_suite_apt" type="text" />
</div>
</div>
</div>
<div class="delAddressArea">
<p>Please enter the nearest major intersection to the delivery address <span>(e.g.17th and Main St.)</span></p>
<div class="delAddressFrm">
<input name="nerest_intersection" type="text" />
</div>
</div>
<div class="addressApartArea">
<div class="radioarea1">
<p>Is this address an <span>apartment or condo?</span></p>
<div class="yesNoPrt">
<div class="radioYes">
<div class="radioslct"><input name="choice1" type="radio" value="No" required /></div>
<p>No</p>
</div>
<div class="radioYes">
<div class="radioslct"><input name="choice1" type="radio" value="Yes" required /></div>
<p>Yes</p>
</div>
</div>
</div>
<div class="radioarea1">
<p>Is this is <span>gated community?</span></p>
<div class="yesNoPrt">
<div class="radioYes">
<div class="radioslct"><input name="choice2" type="radio" value="No" required /></div>
<p>No</p>
</div>
<div class="radioYes">
<div class="radioslct"><input name="choice2" type="radio" value="Yes" required /></div>
<p>Yes</p>
</div>
</div>
</div>
</div>
</div>

<div class="deliveryLocPnl">
<h3>MOVE TO  LOCATION</h3>
<div class="streetAdsArea">

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>*Street Address</p>
<div class="streetFrmBorder">
<input name="street_address_move_to" id="autocompleteTwo" type="text"  onBlur="getAjaxCall_dis2()" onclick="getAjaxCall_dis2()" required />
</div>
<p>* Plese enter the right location. Based on the address you will provie it would calculate surcharge</p>
</div>

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>City</p>
<div class="streetFrmBorder">
<input name="city_move_to" type="text" />
</div>
</div>

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>State</p>
<div class="streetFrmBorder">
<input name="state_move_to" type="text" />
</div>
</div>

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>Zipcode</p>
<div class="streetFrmBorder">
<input name="zipcode_move_to" type="text" />
</div>
</div>

<div class="bldgAtrea">
<p>Bldg/Suite/Apt #</p>
<div class="bldgBorder">
<input name="bldg_suite_apt_move_to" type="text" />
</div>
</div>
</div>
<div class="delAddressArea">
<p>Please enter the nearest major intersection to the delivery address <span>(e.g.17th and Main St.)</span></p>
<div class="delAddressFrm">
<input name="nerest_intersection_move_to" type="text" />
</div>
</div>
<div class="addressApartArea">
<div class="radioarea1">
<p>Is this address an <span>apartment or condo?</span></p>
<div class="yesNoPrt">
<div class="radioYes">
<div class="radioslct"><input name="choice1_move_to" type="radio" value="No" required /></div>
<p>No</p>
</div>
<div class="radioYes">
<div class="radioslct"><input name="choice1_move_to" type="radio" value="Yes" required /></div>
<p>Yes</p>
</div>
</div>
</div>
<div class="radioarea1">
<p>Is this is <span>gated community?</span></p>
<div class="yesNoPrt">
<div class="radioYes">
<div class="radioslct"><input name="choice2_move_to" type="radio" value="No" required /></div>
<p>No</p>
</div>
<div class="radioYes">
<div class="radioslct"><input name="choice2_move_to" type="radio" value="Yes" required /></div>
<p>Yes</p>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
<div style="float:left"><input type="submit" value="Submit_val_2" name="submit" alt="Submit" class="submit"></div>
</div>
</div>
</div>
</div>

<?php include('includes/footer-dev.php'); 
ob_end_flush();
?>