<?php include('includes/top.php'); ?>
<?php
//calculationSection 
$total = $_REQUEST['acc_one_total']+$_REQUEST['acc_two_total']+$_REQUEST['acc_three_total']+$_REQUEST['acc_four_total']+$_REQUEST['acc_five_total']+$_REQUEST['acc_six_total']+$_REQUEST['acc_seven_total']+$_REQUEST['acc_eight_total']+$_REQUEST['acc_nine_total']+$_REQUEST['equ_one_total']+$_REQUEST['equ_two_total']; 
$trailerRentatalTotal = $_POST['step_2_product_price']*$_POST['step_2_product_qty'];
$movingHelperTotal = $_REQUEST['totalOfstep4'];
$accessaryTotal = $total;
$grandToatal = $accessaryTotal + $trailerRentatalTotal + $movingHelperTotal;
?>
<body>
<?php include('includes/header.php'); ?>
<div class="stepSec">
<?php include('includes/sub_menu.php'); ?>
<div class="topMain">
<div class="step5Sec">
<form action="buy.php" method="post">
<div class="step5Right">
<img src="image/res-pic.jpg" width="248" height="205" alt="images" /> 
<div class="step5whiteArea">
<p>To get this guaranteed rate, complite your reservation today!</p>
</div>
<div class="reservationDetails">
<h2>RESERVATION DETAILS</h2>
<!--<p>Quote # 23128199
<br />Drop ff address: 33762
<br />(1)Drop off date:5/5/2014
<br />(1)Container placement When facing the front entrance of the building, this container will be placed on the left side of the building in the middle of the driveway.
<br />(1)Most containers will be delivered before 5:00PM local time</p>
-->
</div>
<div class="reservationDetails">
<h2>CHARGES UPON INITIAL DELIVERY</h2>
<div class="delRow1">
<h5>Trailer rental <br />Cost Total
<p class="contTop">$<?php echo $trailerRentatalTotal; ?></p>
</h5>
</div>
<div class="delRow1">
<h5>Moving Help <br />Cost Total
<p class="contTop">$<?php echo $movingHelperTotal; ?></p>
</h5>
</div>
<div class="delRow1">
<h5>Accessories & Protection <br />Cost Total
<p class="contTop">$<?php echo $accessaryTotal; ?></p>
</h5>
</div>

<!--<div class="delRow1">
<h5>Tax
<p>$10.00</p>
</h5>
</div>-->
<div class="totalCountingPnl">
<p>Total charges upon intial delevary 
<span>$<?php echo $grandToatal; ?></span>
</p>
</div>
</div>
</div>
<div class="step5Lft">
<div class="step5Bar">
<ul>
<li><a href="#">STEP 6<br /><p>Complete Reservation </p></a></li>
</ul>
<p>You're almost done! Just a few more details.</p>
</div>

<div class="deliveryLocPnl">
<h3>PRIMARY CONTACT INFORMATION</h3>
<p>Please provide the primary contact information for your UFIRST MOVING order</p>
<div class="primaryContactSec">
<div class="fnamEFrm"><input name="pfname" type="text" value="First Name" required /></div>
<div class="fnamEFrm"><input name="plname" type="text" value="Last Name"  required/></div>
<div class="fnamEFrm2"><input name="p_phone_no" type="text" value="Primary Phone" required /></div>
<div class="fnamEFrm3"><input name="p_email" type="text" value="Email Address" required /></div>
</div>
</div>

<div class="deliveryLocPnl">
<h3>PRESENT LOCATION</h3>
<p>Where will we be delivering your UFIRST MOVING container for you a load?</p>
<div class="streetAdsArea">

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>*Street Address</p>
<div class="streetFrmBorder">
<input name="street_address" type="text" required />
</div>
</div>

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>*City</p>
<div class="streetFrmBorder">
<input name="city" type="text" required />
</div>
</div>

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>*State</p>
<div class="streetFrmBorder">
<input name="state" type="text" required />
</div>
</div>

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>*Zipcode</p>
<div class="streetFrmBorder">
<input name="zipcode" type="text" required />
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
<p>*Please enter the nearest major intersection to the delivery address <span>(e.g.17th and Main St.)</span></p>
<div class="delAddressFrm">
<input name="nerest_intersection" type="text" />
</div>
</div>
<div class="addressApartArea">
<div class="radioarea1">
<p>Is this address an <span>apartment or condo?</span></p>
<div class="yesNoPrt">
<div class="radioYes">
<div class="radioslct"><input name="choice1" type="radio" value="apartment" required /></div>
<p>No</p>
</div>
<div class="radioYes">
<div class="radioslct"><input name="choice1" type="radio" value="cando" required /></div>
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
<input name="street_address_move_to" type="text" required />
</div>
</div>

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>*City</p>
<div class="streetFrmBorder">
<input name="city_move_to" type="text" required />
</div>
</div>

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>*State</p>
<div class="streetFrmBorder">
<input name="state_move_to" type="text" required />
</div>
</div>

<div class="streetAdsFrm" style="margin-bottom:10px;">
<p>*Zipcode</p>
<div class="streetFrmBorder">
<input name="zipcode_move_to" type="text" required />
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
<p>*Please enter the nearest major intersection to the delivery address <span>(e.g.17th and Main St.)</span></p>
<div class="delAddressFrm">
<input name="nerest_intersection_move_to" type="text" />
</div>
</div>
<div class="addressApartArea">
<div class="radioarea1">
<p>Is this address an <span>apartment or condo?</span></p>
<div class="yesNoPrt">
<div class="radioYes">
<div class="radioslct"><input name="choice1_move_to" type="radio" value="apartment" required /></div>
<p>No</p>
</div>
<div class="radioYes">
<div class="radioslct"><input name="choice1_move_to" type="radio" value="cando" required /></div>
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
<div class="ReservationPnl">
<div class="reservedLft">
<h4>Estimated Cost</h4>
<p><?php echo '$'.$grandToatal; ?></p>
<p>UFirstMoving reprehensive will call you shortly to confirm order</p>
<div class="reservationTopBg">
<br />
<br />
<input type="hidden" name="acc_one_qty" value="<?php echo $_REQUEST['acc_one_qty']; ?>" />
<input type="hidden" name="acc_two_qty" value="<?php echo $_REQUEST['acc_two_qty']; ?>" />
<input type="hidden" name="acc_three_qty" value="<?php echo $_REQUEST['acc_three_qty']; ?>" />
<input type="hidden" name="acc_four_qty" value="<?php echo $_REQUEST['acc_four_qty']; ?>" />
<input type="hidden" name="acc_five_qty" value="<?php echo $_REQUEST['acc_five_qty']; ?>" />
<input type="hidden" name="acc_six_qty" value="<?php echo $_REQUEST['acc_six_qty']; ?>" />
<input type="hidden" name="acc_seven_qty" value="<?php echo $_REQUEST['acc_seven_qty']; ?>" />
<input type="hidden" name="acc_eight_qty" value="<?php echo $_REQUEST['acc_eight_qty']; ?>" />
<input type="hidden" name="acc_nine_qty" value="<?php echo $_REQUEST['acc_nine_qty']; ?>" />
<input type="hidden" name="equ_one_qty" value="<?php echo $_REQUEST['equ_one_qty']; ?>" />
<input type="hidden" name="equ_two_qty" value="<?php echo $_REQUEST['equ_two_qty']; ?>" />
<input type="hidden" name="acc_one_total" value="<?php echo $_REQUEST['acc_one_total']; ?>" />
<input type="hidden" name="acc_two_total" value="<?php echo $_REQUEST['acc_two_total']; ?>" />
<input type="hidden" name="acc_three_total" value="<?php echo $_REQUEST['acc_three_total']; ?>" />
<input type="hidden" name="acc_four_total" value="<?php echo $_REQUEST['acc_four_total']; ?>" />
<input type="hidden" name="acc_five_total" value="<?php echo $_REQUEST['acc_five_total']; ?>" />
<input type="hidden" name="acc_six_total" value="<?php echo $_REQUEST['acc_six_total']; ?>" />
<input type="hidden" name="acc_seven_total" value="<?php echo $_REQUEST['acc_seven_total']; ?>" />
<input type="hidden" name="acc_eight_total" value="<?php echo $_REQUEST['acc_eight_total']; ?>" />
<input type="hidden" name="acc_nine_total" value="<?php echo $_REQUEST['acc_nine_total']; ?>" />
<input type="hidden" name="equ_one_total" value="<?php echo $_REQUEST['equ_one_total']; ?>" />
<input type="hidden" name="equ_two_total" value="<?php echo $_REQUEST['equ_two_total']; ?>" />


<input type="hidden" name="step_4_no_of_movers_puh" value="<?php echo $_REQUEST['step_4_no_of_movers_puh']; ?>" />
<input type="hidden" name="step_4_estimated_hrs_puh" value="<?php echo $_REQUEST['step_4_estimated_hrs_puh']; ?>" />
<input type="hidden" name="step_4_estimated_hrs_mh" value="<?php echo $_REQUEST['step_4_estimated_hrs_mh']; ?>" />
<input type="hidden" name="step_4_no_of_movers_mh" value="<?php echo $_REQUEST['step_4_no_of_movers_mh']; ?>" />

<input type="hidden" name="step_3_trailors_place" value="<?php echo $_REQUEST['step_3_trailors_place']; ?>" />

<input type="hidden" name="step_2_product_code" value="<?php echo $_REQUEST['step_2_product_code']; ?>" />
<input type="hidden" name="step_2_product_qty" value="<?php echo $_REQUEST['step_2_product_qty']; ?>" />
<input type="hidden" name="step_2_product_price" value="<?php echo $_POST['step_2_product_price']*$_POST['step_2_product_qty']; ?>" />

<input type="hidden" name="date_to_move" value="<?php echo $_REQUEST['date_to_move']; ?>" />
<input type="hidden" name="name" value="<?php echo $_REQUEST['name']; ?>"  />
<input type="hidden" name="phone_no" value="<?php echo $_REQUEST['phone_no']; ?>"  />
<input type="hidden" name="email" value="<?php echo $_REQUEST['email']; ?>"  />
<input type="hidden" name="gtotal" value="<?php echo $grandToatal; ?>"  />
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