<?php 
ob_start();
include_once("../configure.php");
include_once("top.php");

$pixel = '200px';

$sql = "SELECT * FROM ".TBL_QUOTS." WHERE id='".$_REQUEST['id']."'";
$res = $db->selectData($sql);
$fet = $db->getRow($res); 

$sqlTrailer = "SELECT * FROM ".TBL_TRAILER." WHERE id=1";
$getTriler = $db->selectData($sqlTrailer);
$get = $db->getRow($getTriler);

$sqlSA = "SELECT * FROM ".TBL_MOVING_QUOTE_DATA." WHERE acc_id=1";
$sqlSAEXE = $db->selectData($sqlSA);
$getSA = $db->getRow($sqlSAEXE);

$sqlAcc= "SELECT * FROM ".TBL_QUOTS_ACC." WHERE quote_id='".$_REQUEST['id']."'";
$sqlAccEXE = $db->selectData($sqlAcc);
$acc = $db->getRow($sqlAccEXE);
?>
<div class="maincont" id="mainPan">
<div class="parentcontainer">
<?php include_once("header.php"); ?>
<div class="workpanel">
<?php include_once("left.php"); ?>
<div class="rightpanel">
<input onclick="window.location.href='quick_quote.php'" name="trai" type="submit" class="buttonNw" id="Submit" value="Back" style="margin:10px; float:right"/>
<p class="greentxt2">The Quick Quote Details From <?php print $fet['name'];?></p>
<div class="formblkSection">
<div class="infosection3">
<div align="center">

<p class="greentxt3">The Contact Details (STEP - 1)</p>
<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong>Name</strong>:&nbsp 
<dd style="margin-top:2px"><?php print $fet['name'];?></dd>
</dt>
</dl>

<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong>Email</strong>:&nbsp 
<dd style="margin-top:2px"><?php print $fet['email'];?></dd>
</dt>
</dl>

<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong>Phone No</strong>:&nbsp 
<dd style="margin-top:2px">+91 <?php print $fet['phone_no'];?></dd>
</dt>
</dl>

<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong>Catgory</strong>:&nbsp 
<dd style="margin-top:2px"><?php if($fet['c_catagory']==1){echo "Business";}else{echo "Residential";};?></dd>
</dt>
</dl>

<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong>Data To Move</strong>:&nbsp 
<dd style="margin-top:2px"><?php print $fet['date_to_move'];?></dd>
</dt>
</dl>

<p class="greentxt3">Trailer Rental (STEP - 2)</p>


<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong>Trailer Rental</strong>:&nbsp 
<dd style="margin-top:2px">
<?php echo $get['trailer_one'].'&nbsp;'.'Foot'.'&nbsp;'.'Trailer '; ?>
<?php echo $fet['step_2_product_qty_one']; ?> qty = $<?php echo $fet['step_2_product_price_one']; ?>
</dd>
</dt>
</dl>

<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong>Trailer Rental</strong>:&nbsp 
<dd style="margin-top:2px">
<?php echo $get['trailer_two'].'&nbsp;'.'Foot'.'&nbsp;'.'Trailer'; ?>
<?php echo $fet['step_2_product_qty_two']; ?> qty = $<?php echo $fet['step_2_product_price_two']; ?>
</dd>
</dt>
</dl>

<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong>Trailer Rental</strong>:&nbsp 
<dd style="margin-top:2px">
<?php echo $get['trailer_three'].'&nbsp;'.'Foot'.'&nbsp;'.'Trailer'; ?>
<?php echo $fet['step_2_product_qty_three']; ?> qty = $<?php echo $fet['step_2_product_price_three']; ?>
</dd>
</dt>
</dl>


<p class="greentxt3">Trailer Delivary (STEP - 3)</p>

<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong>Trailer Placed</strong>:&nbsp 
<dd style="margin-top:2px">
<?php echo $fet['step_3_trailors_place']; ?>
<dd>
</dt>
</dl>

<p class="greentxt3">Moving Helper (STEP - 4)</p>

<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong>Movers Need</strong>:&nbsp 
<dd style="margin-top:2px">No of Movers: <?php echo $fet['step_4_no_of_movers_mh']; ?> &nbsp; Estimated Hours: <?php echo $fet['step_4_estimated_hrs_mh']; ?> &nbsp; Price: <?php echo $fet['step_4_total_amount_mh']; ?>
</dt>
</dl>
<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong>Packing &amp; Unpacking</strong>:&nbsp 
<dd style="margin-top:2px">No of Movers: <?php echo $fet['step_4_no_of_movers_puh']; ?> &nbsp; Estimated Hours: <?php echo $fet['step_4_estimated_hrs_puh']; ?> &nbsp; Price: <?php echo $fet['step_4_total_amount_puh']; ?>
<dd>
</dt>
</dl>


<p class="greentxt3">Supply And Accessories (STEP - 5)</p>
<p style="float:left; clear:both; margin:10px 0;"><strong>SUPPLY AND ACCESSORIES</strong></p>
<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong><?php echo $getSA['acc_one_name']; ?></strong>:&nbsp 
<dd style="margin-top:2px">Price: <?php echo '$'.$getSA['acc_one_price']; ?> &nbsp; Qty: <?php echo $acc['acc_one_qty'] ; ?> &nbsp; Total: <?php echo $acc['acc_one_total'] ; ?>
</dt>
</dl>
<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong><?php echo $getSA['acc_two_name']; ?></strong>:&nbsp 
<dd style="margin-top:2px">Price: <?php echo '$'.$getSA['acc_two_price']; ?> &nbsp; Qty: <?php echo $acc['acc_two_qty'] ; ?> &nbsp; Total: <?php echo $acc['acc_two_total'] ; ?>
</dt>
</dl>
<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong><?php echo $getSA['acc_three_name']; ?></strong>:&nbsp 
<dd style="margin-top:2px">Price: <?php echo '$'.$getSA['acc_three_price']; ?> &nbsp; Qty: <?php echo $acc['acc_three_qty'] ; ?> &nbsp; Total: <?php echo $acc['acc_three_total'] ; ?>
</dt>
</dl>
<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong><?php echo $getSA['acc_four_name']; ?></strong>:&nbsp 
<dd style="margin-top:2px">Price: <?php echo '$'.$getSA['acc_four_price']; ?> &nbsp; Qty: <?php echo $acc['acc_four_qty'] ; ?> &nbsp; Total: <?php echo $acc['acc_four_total'] ; ?>
</dt>
</dl>

<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong><?php echo $getSA['acc_five_name']; ?></strong>:&nbsp 
<dd style="margin-top:2px">Price: <?php echo '$'.$getSA['acc_five_price']; ?> &nbsp; Qty: <?php echo $acc['acc_five_qty'] ; ?> &nbsp; Total: <?php echo $acc['acc_five_total'] ; ?>
</dt>
</dl>

<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong><?php echo $getSA['acc_six_name']; ?></strong>:&nbsp 
<dd style="margin-top:2px">Price: <?php echo '$'.$getSA['acc_six_price']; ?> &nbsp; Qty: <?php echo $acc['acc_six_qty'] ; ?> &nbsp; Total: <?php echo $acc['acc_six_total'] ; ?>
</dt>
</dl>

<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong><?php echo $getSA['acc_seven_name']; ?></strong>:&nbsp 
<dd style="margin-top:2px">Price: <?php echo '$'.$getSA['acc_seven_price']; ?> &nbsp; Qty: <?php echo $acc['acc_seven_qty'] ; ?> &nbsp; Total: <?php echo $acc['acc_seven_total'] ; ?>
</dt>
</dl>

<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong><?php echo $getSA['acc_eight_name']; ?></strong>:&nbsp 
<dd style="margin-top:2px">Price: <?php echo '$'.$getSA['acc_eight_price']; ?> &nbsp; Qty: <?php echo $acc['acc_eight_qty'] ; ?> &nbsp; Total: <?php echo $acc['acc_eight_total'] ; ?>
</dt>
</dl>

<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong><?php echo $getSA['acc_nine_name']; ?></strong>:&nbsp 
<dd style="margin-top:2px">Price: <?php echo '$'.$getSA['acc_nine_price']; ?> &nbsp; Qty: <?php echo $acc['acc_nine_qty'] ; ?> &nbsp; Total: <?php echo $acc['acc_nine_total'] ; ?>
</dt>
</dl>

<p style="float:left; clear:both; margin:10px 0;"><strong>EQUIPMENT RENTAL</strong></p>

<dl style="float:left; clear:both;">
<dt style="width:<?php echo $pixel; ?>;"><strong><?php echo $getSA['equ_one_name']; ?></strong>:&nbsp 
<dd style="margin-top:2px">Price: <?php echo '$'.$getSA['equ_one_price']; ?> &nbsp; Qty: <?php echo $acc['equ_one_qty'] ; ?> &nbsp; Total: <?php echo $acc['equ_one_total'] ; ?>
</dt>
</dl>

<dl style="float:left; clear:both;">
<dt style="width:<?php echo $pixel; ?>;"><strong><?php echo $getSA['equ_two_name']; ?></strong>:&nbsp 
<dd style="margin-top:2px">Price: <?php echo '$'.$getSA['equ_two_price']; ?> &nbsp; Qty: <?php echo $acc['equ_two_qty'] ; ?> &nbsp; Total: <?php echo $acc['equ_two_total'] ; ?>
</dt>
</dl>

<p class="greentxt3">Complite Reservation (STEP - 6)</p>
<p style="float:left; clear:both; margin:10px 0;"><strong>PRIMARY CONTACT INFORMATION</strong></p>

<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong>Name</strong>:&nbsp 
<dd style="margin-top:2px"><?php echo $fet['p_name']; ?>
<dd>
</dt>
</dl>

<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong>Email</strong>:&nbsp 
<dd style="margin-top:2px"><?php echo $fet['p_email']; ?>
<dd>
</dt>
</dl>

<dl>
<dt style="width:<?php echo $pixel; ?>;"><strong>Phone No</strong>:&nbsp 
<dd style="margin-top:2px">+91 <?php echo $fet['p_phone_no']; ?>
<dd>
</dt>
</dl>

<p style="float:left; clear:both; margin:10px 0;"><strong>PRESENT LOCATION</strong></p>

<dl style="float:left; clear:both;">
<dt style="width:<?php echo $pixel; ?>;"><strong>Street Address</strong>:&nbsp 
<dd style="margin-top:2px"><?php echo $fet['street_address']; ?>
<dd>
</dt>
</dl>

<dl style="float:left; clear:both;">
<dt style="width:<?php echo $pixel; ?>;"><strong>City</strong>:&nbsp 
<dd style="margin-top:2px"><?php echo $fet['city']; ?>
<dd>
</dt>
</dl>

<dl style="float:left; clear:both;">
<dt style="width:<?php echo $pixel; ?>;"><strong>State</strong>:&nbsp 
<dd style="margin-top:2px"><?php echo $fet['state']; ?>
<dd>
</dt>
</dl>

<dl style="float:left; clear:both;">
<dt style="width:<?php echo $pixel; ?>;"><strong>Zipcode</strong>:&nbsp 
<dd style="margin-top:2px"><?php echo $fet['zipcode']; ?>
<dd>
</dt>
</dl>

<dl style="float:left; clear:both;">
<dt style="width:<?php echo $pixel; ?>;"><strong>Bldg/Suite/Apt</strong>:&nbsp 
<dd style="margin-top:2px"><?php echo $fet['bldg_suite_apt']; ?>
<dd>
</dt>
</dl>



<dl style="float:left; clear:both;">
<dt style="width:<?php echo $pixel; ?>;"><strong>Intersection</strong>:&nbsp 
<dd style="margin-top:2px"><?php echo $fet['nerest_intersection']; ?>
<dd>
</dt>
</dl>

<dl style="float:left; clear:both;">
<dt style="width:<?php echo $pixel; ?>;"><strong>Apartment or Condo</strong>:&nbsp 
<dd style="margin-top:2px"><?php echo $fet['apartment_cando']; ?>
<dd>
</dt>
</dl>

<dl style="float:left; clear:both;">
<dt style="width:<?php echo $pixel; ?>;"><strong>Gated community</strong>:&nbsp 
<dd style="margin-top:2px"><?php echo $fet['gated_community']; ?>
<dd>
</dt>
</dl>

<p style="float:left; clear:both; margin:10px 0;"><strong>MOVE TO LOCATION</strong></p>

<dl style="float:left; clear:both;">
<dt style="width:<?php echo $pixel; ?>;"><strong>Street Address</strong>:&nbsp 
<dd style="margin-top:2px"><?php echo $fet['street_address_move_to']; ?>
<dd>
</dt>
</dl>

<dl style="float:left; clear:both;">
<dt style="width:<?php echo $pixel; ?>;"><strong>City</strong>:&nbsp 
<dd style="margin-top:2px"><?php echo $fet['city_move_to']; ?>
<dd>
</dt>
</dl>

<dl style="float:left; clear:both;">
<dt style="width:<?php echo $pixel; ?>;"><strong>State</strong>:&nbsp 
<dd style="margin-top:2px"><?php echo $fet['state_move_to']; ?>
<dd>
</dt>
</dl>

<dl style="float:left; clear:both;">
<dt style="width:<?php echo $pixel; ?>;"><strong>Zipcode</strong>:&nbsp 
<dd style="margin-top:2px"><?php echo $fet['zipcode_move_to']; ?>
<dd>
</dt>
</dl>

<dl style="float:left; clear:both;">
<dt style="width:<?php echo $pixel; ?>;"><strong>Bldg/Suite/Apt</strong>:&nbsp 
<dd style="margin-top:2px"><?php echo $fet['bldg_suite_apt_move_to']; ?>
<dd>
</dt>
</dl>

<dl style="float:left; clear:both;">
<dt style="width:<?php echo $pixel; ?>;"><strong>Intersection</strong>:&nbsp 
<dd style="margin-top:2px"><?php echo $fet['nerest_intersection_move_to']; ?>
<dd>
</dt>
</dl>

<dl style="float:left; clear:both;">
<dt style="width:<?php echo $pixel; ?>;"><strong>Apartment or Condo</strong>:&nbsp 
<dd style="margin-top:2px"><?php echo $fet['apartment_cando_move_to']; ?>
<dd>
</dt>
</dl>

<dl style="float:left; clear:both;">
<dt style="width:<?php echo $pixel; ?>;"><strong>Gated community</strong>:&nbsp 
<dd style="margin-top:2px"><?php echo $fet['gated_community_move_to']; ?>
<dd>
</dt>
</dl>

<input onclick="window.location.href='quick_quote.php'" name="trai" type="submit" class="buttonNw" id="Submit" value="Back" style="margin:20px 150px 20px 300px; float:left"/>

</div>
</div>
</div>
</div>
</div>
</div>
<?php 
include_once("bottom.php"); 
ob_end_flush();
?>
