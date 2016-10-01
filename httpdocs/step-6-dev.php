<?php include('includes/top-dev.php');?>
<?php
if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'Submit_val_5'){
$trailerRentatalTotal_one = $_SESSION['pageOneData_one']['step_2_product_price_one'];
$trailerRentatalTotal_two = $_SESSION['pageOneData_one']['step_2_product_price_two'];
$trailerRentatalTotal_three = $_SESSION['pageOneData_one']['step_2_product_price_three'];
$movingHelperTotal = $_SESSION['pageOneData_three']['totalOfstep4'];
if(!isset($_SESSION['pageOneData_four'])){
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
}else{
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
$grandToatal = $accessaryTotal + $trailerRentatalTotal_one + $trailerRentatalTotal_two + $trailerRentatalTotal_three  + $movingHelperTotal;
$_SESSION['toatlSession'] = array("accessaryTotal"=> $accessaryTotal , "trailerRentatalTotal_one"=> $trailerRentatalTotal_one, "trailerRentatalTotal_two"=> $trailerRentatalTotal_two, "trailerRentatalTotal_three"=> $trailerRentatalTotal_three, "movingHelperTotal"=> $movingHelperTotal, "total"=> $grandToatal);
}
if(!isset($_REQUEST['submit']) && $_REQUEST['submit'] != 'Submit_val_5' && empty($_SESSION['pageOneData_four'])){
?>
<script type="text/javascript">
document.location.href='step-5.php';
</script>
<?php
}
?>
<body onLoad="initializeTwo(),initialize()">
<?php include('includes/header-dev.php'); ?>
<div class="stepSec">
<?php include('includes/sub_menu.php'); ?>
<div class="topMain">
<div class="step5Sec">
<form action="final-submit.php" method="post" onSubmit="checkAddress()">
<div class="step5Right">
<img src="image/res-pic.jpg" width="248" height="205" alt="images" /> 
<div class="step5whiteArea">
<p>To get this guaranteed rate, complete your reservation today!</p>
</div>
<div class="reservationDetails">
<h2>RESERVATION DETAILS</h2>
<!--
<p>Quote # 23128199
<br />Drop ff address: 33762
<br />(1)Drop off date:5/5/2014
<br />(1)Container placement When facing the front entrance of the building, this container will be placed on the left side of the building in the middle of the driveway.
<br />(1)Most containers will be delivered before 5:00PM local time</p>
-->
</div>
<div class="reservationDetails">
<h2>CHARGES UPON INITIAL DELIVERY</h2>
<!--STEP 2 CALCULATION-->
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
<p class="contTop"><?php echo !empty($_SESSION['pageOneData_four']['equ_one_total'])? '$'.$_SESSION['pageOneData_four']['equ_one_total']: ""; ?></p>
</h5>
<?php
}
?>
<?php
if(!empty($_SESSION['pageOneData_four']['equ_two_qty'])){
?>
<h5>MOVING BLANKET -(RENTAL)  (<strong><?php echo $_SESSION['pageOneData_four']['equ_two_qty']; ?></strong>)<br />
<p class="contTop"><?php echo !empty($_SESSION['pageOneData_four']['equ_two_total'])? '$'.$_SESSION['pageOneData_four']['equ_two_total']: ""; ?></p>
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
<p>Total charges upon initial delivery: 
<span><strong><?php echo '$'.$_SESSION['toatlSession']['total']; ?></strong></span>
</p>
</div>
<div class="totalCountingPnl">
<p>Total surcharge:
<span><strong id="sResult"></strong></span>
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
<div class="ReservationPnl">
<div class="reservedLft">
<h4>Estimated Cost --- <strong><?php echo '$'.$_SESSION['toatlSession']['total']; ?></strong></h4>
<p>UFirstMoving reprehensive will call you shortly to confirm order</p>
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

<input type="hidden" name="step_2_product_code_three" value="<?php echo $_SESSION['pageOneData_one']['step_2_product_code_three']; ?>" />
<input type="hidden" name="step_2_product_qty_three" value="<?php echo $_SESSION['pageOneData_one']['step_2_product_qty_three']; ?>" />
<input type="hidden" name="step_2_product_price_three" value="<?php echo $_SESSION['pageOneData_one']['step_2_product_price_three']; ?>" />


<input type="hidden" name="c_catagory" value="<?php echo $_SESSION['pageOneData']['c_catagory']; ?>" />
<input type="hidden" name="date_to_move" value="<?php echo $_SESSION['pageOneData']['date_to_move']; ?>" />
<input type="hidden" name="name" value="<?php echo $_SESSION['pageOneData']['name']; ?>"  />
<input type="hidden" name="phone_no" value="<?php echo $_SESSION['pageOneData']['phone_no']; ?>"  />
<input type="hidden" name="email" value="<?php echo $_SESSION['pageOneData']['email']; ?>"  />

<input type="hidden" name="gtotal" value="<?php echo $_SESSION['toatlSession']['total']; ?>"  />
<input type="hidden" name="businessAddress" id="bAddress" value="8129 S Yukon St, Littleton, CO 80128, United States"  />
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
include('includes/footer-dev.php');
ob_end_flush();
?>
