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

<table width="100%" border="0" cellpadding="5" cellspacing="5">
<tr>
<td width="33%"><strong style="color:#F00; font-size:16px;">The Contact Details</strong></td>
<td width="67%">&nbsp;</td>
</tr>
<tr>
<td width="33%"><strong>Name:</strong></td>
<td width="67%"><?php print strtoupper($fet['name']);?></td>
</tr>
<tr>
<td><strong>Email:</strong></td>
<td><?php print $fet['email'];?></td>
</tr>
<tr>
<td><strong>Phone No:</strong></td>
<td><?php print strtoupper($fet['phone_no']);?></td>
</tr>
<tr>
<td><strong>Catgory:</strong></td>
<td><?php if($fet['c_catagory']==1){echo "BUSINESS";}else{echo "RESIDENTIAL";};?></td>
</tr>
<tr>
<td><strong>Data To Move:</strong></td>
<td><?php print $fet['date_to_move'];?></td>
</tr>
<tr>
<td colspan="2">---------------------------------------------------------------------------------------------------------------------------------</td>
</tr>
<td><strong style="color:#F00;font-size:16px;">Trailer Rental</strong></td>
<td>&nbsp;</td>
</tr>
<tr>
<td><strong>Trailer Rental 1:</strong></td>
<td><?php echo $get['trailer_one'].'&nbsp;'.'Foot'.'&nbsp;'.'Trailer '; ?><?php echo $fet['step_2_product_qty_one']; ?> qty = $<?php echo $fet['step_2_product_price_one']; ?></td>
</tr>
<tr>
<td><strong>Trailer Rental 2:</strong></td>
<td><?php echo $get['trailer_two'].'&nbsp;'.'Foot'.'&nbsp;'.'Trailer'; ?><?php echo $fet['step_2_product_qty_two']; ?> qty = $<?php echo $fet['step_2_product_price_two']; ?></td>
</tr>
<tr>
<td><strong>Trailer Rental 3:</strong></td>
<td><?php echo $get['trailer_three'].'&nbsp;'.'Foot'.'&nbsp;'.'Trailer'; ?><?php echo $fet['step_2_product_qty_three']; ?> qty = $<?php echo $fet['step_2_product_price_three']; ?></td>
</tr>
<tr>
<td colspan="2">---------------------------------------------------------------------------------------------------------------------------------</td>
</tr>
<tr>
<td><strong>Trailer Delivary:</strong></td>
<td><?php echo strtoupper($fet['step_3_trailors_place']); ?></td>
</tr>
<tr>
<td colspan="2">---------------------------------------------------------------------------------------------------------------------------------</td>
</tr>
<tr>
<td><strong style="color:#F00;font-size:16px;">Moving Helper</strong></td>
<td>&nbsp;</td>
</tr>
<tr>
<td><strong>Movers Need:</strong></td>
<td>No of Movers: <?php echo $fet['step_4_no_of_movers_mh']; ?> &nbsp; Estimated Hours: <?php echo $fet['step_4_estimated_hrs_mh']; ?> &nbsp; Price: <?php echo $fet['step_4_total_amount_mh']; ?></td>
</tr>
<tr>
<td><strong>Packing &amp; Unpacking:</strong></td>
<td>No of Movers: <?php echo $fet['step_4_no_of_movers_puh']; ?> &nbsp; Estimated Hours: <?php echo $fet['step_4_estimated_hrs_puh']; ?> &nbsp; Price: <?php echo $fet['step_4_total_amount_puh']; ?></td>
</tr>

<tr>
<td colspan="2">---------------------------------------------------------------------------------------------------------------------------------</td>
</tr>

<tr>
<td><strong style="color:#F00;font-size:16px;">SUPPLY AND ACCESSORIES</strong></td>
<td>&nbsp;</td>
</tr>
<tr>
<td><strong><?php echo $getSA['acc_one_name']; ?>:</strong></td>
<td>Price: <?php echo '$'.$getSA['acc_one_price']; ?> &nbsp; Qty: <?php echo $acc['acc_one_qty'] ; ?> &nbsp; Total: <?php echo $acc['acc_one_total'] ; ?></td>
</tr>

<tr>
<td><strong><?php echo $getSA['acc_two_name']; ?>:</strong></td>
<td>Price: <?php echo '$'.$getSA['acc_two_price']; ?> &nbsp; Qty: <?php echo $acc['acc_two_qty'] ; ?> &nbsp; Total: <?php echo $acc['acc_two_total'] ; ?></td>
</tr>

<tr>
<td><strong><?php echo $getSA['acc_three_name']; ?>:</strong></td>
<td>Price: <?php echo '$'.$getSA['acc_three_price']; ?> &nbsp; Qty: <?php echo $acc['acc_three_qty'] ; ?> &nbsp; Total: <?php echo $acc['acc_three_total'] ; ?></td>
</tr>

<tr>
<td><strong><?php echo $getSA['acc_four_name']; ?>:</strong></td>
<td>Price: <?php echo '$'.$getSA['acc_four_price']; ?> &nbsp; Qty: <?php echo $acc['acc_four_qty'] ; ?> &nbsp; Total: <?php echo $acc['acc_four_total'] ; ?></td>
</tr>
<tr>
<td><strong><?php echo $getSA['acc_five_name']; ?>:</strong></td>
<td>Price: <?php echo '$'.$getSA['acc_five_price']; ?> &nbsp; Qty: <?php echo $acc['acc_five_qty'] ; ?> &nbsp; Total: <?php echo $acc['acc_five_total'] ; ?></td>
</tr>

<tr>
<td><strong><?php echo $getSA['acc_six_name']; ?>:</strong></td>
<td>Price: <?php echo '$'.$getSA['acc_six_price']; ?> &nbsp; Qty: <?php echo $acc['acc_six_qty'] ; ?> &nbsp; Total: <?php echo $acc['acc_six_total'] ; ?></td>
</tr>

<tr>
<td><strong><?php echo $getSA['acc_seven_name']; ?>:</strong></td>
<td>Price: <?php echo '$'.$getSA['acc_seven_price']; ?> &nbsp; Qty: <?php echo $acc['acc_seven_qty'] ; ?> &nbsp; Total: <?php echo $acc['acc_seven_total'] ; ?></td>
</tr>
<tr>
<td><strong><?php echo $getSA['acc_eight_name']; ?>:</strong></td>
<td>Price: <?php echo '$'.$getSA['acc_eight_price']; ?> &nbsp; Qty: <?php echo $acc['acc_eight_qty'] ; ?> &nbsp; Total: <?php echo $acc['acc_eight_total'] ; ?></td>
</tr>
<tr>
<td><strong><?php echo $getSA['acc_nine_name']; ?>:</strong></td>
<td>Price: <?php echo '$'.$getSA['acc_nine_price']; ?> &nbsp; Qty: <?php echo $acc['acc_nine_qty'] ; ?> &nbsp; Total: <?php echo $acc['acc_nine_total'] ; ?></td>
</tr>
<tr>
<td><strong style="color:#F00;font-size:16px;">EQUIPMENT RENTAL:</strong></td>
<td>&nbsp;</td>
</tr>
<tr>
<td><strong><?php echo $getSA['equ_one_name']; ?>:</strong></td>
<td>Price: <?php echo '$'.$getSA['equ_one_price']; ?> &nbsp; Qty: <?php echo $acc['equ_one_qty'] ; ?> &nbsp; Total: <?php echo $acc['equ_one_total'] ; ?></td>
</tr>
<tr>
<td><strong><?php echo $getSA['equ_two_name']; ?>:</strong></td>
<td>Price: <?php echo '$'.$getSA['equ_two_price']; ?> &nbsp; Qty: <?php echo $acc['equ_two_qty'] ; ?> &nbsp; Total: <?php echo $acc['equ_two_total'] ; ?></td>
</tr>

<tr>
<td colspan="2">---------------------------------------------------------------------------------------------------------------------------------</td>
</tr>

</table>

<table width="100%" border="0" cellpadding="5" cellspacing="5">
<!--<tr>
<td><strong>Complite Reservation (STEP - 6)</strong></td>
<td>&nbsp;</td>
</tr>-->
<tr>
<td width="33%"><strong style="color:#F00;font-size:16px;">PRIMARY CONTACT</strong></td>
<td width="67%">&nbsp;</td>
</tr>
<tr>
<td><strong>Name:</strong></td>
<td><?php echo strtoupper($fet['p_name']); ?></td>
</tr>
<tr>
<td><strong>Email:</strong></td>
<td><?php echo $fet['p_email']; ?></td>
</tr>
<tr>
<td><strong>Phone No:</strong></td>
<td>+91 <?php echo strtoupper($fet['p_phone_no']); ?></td>
</tr>
<tr>
<td><strong style="color:#F00;font-size:16px;">PRESENT LOCATION</strong></td>
<td>&nbsp;</td>
</tr>
<tr>
<td><strong>Street Address:</strong></td>
<td><?php echo strtoupper($fet['street_address']); ?></td>
</tr>
<tr>
<td><strong>City:</strong></td>
<td><?php echo strtoupper($fet['city']); ?></td>
</tr>
<tr>
<td><strong>State:</strong></td>
<td><?php echo strtoupper($fet['state']); ?></td>
</tr>
<tr>
<td><strong>Zipcode:</strong></td>
<td><?php echo strtoupper($fet['zipcode']); ?></td>
</tr>
<tr>
<td><strong>Bldg/Suite/Apt:</strong></td>
<td><?php echo strtoupper($fet['bldg_suite_apt']); ?></td>
</tr>
<tr>
<td><strong>Intersection:</strong></td>
<td><?php echo strtoupper($fet['nerest_intersection']); ?></td>
</tr>
<tr>
<td><strong>Apartment or Condo</strong></td>
<td><?php echo strtoupper($fet['apartment_cando']); ?></td>
</tr>
<tr>
<td><strong>Gated community:</strong></td>
<td><?php echo strtoupper($fet['gated_community']); ?></td>
</tr>
<tr>
<td><strong style="color:#F00;font-size:16px;">MOVE TO LOCATION</strong></td>
<td>&nbsp;</td>
</tr>
<tr>
<td><strong>Street Address:</strong></td>
<td><?php echo strtoupper($fet['street_address_move_to']); ?></td>
</tr>
<tr>
<td><strong>City:</strong></td>
<td><?php echo strtoupper($fet['city_move_to']); ?></td>
</tr>
<tr>
<td><strong>State:</strong></td>
<td><?php echo strtoupper($fet['state_move_to']); ?></td>
</tr>
<tr>
<td><strong>Zipcode:</strong></td>
<td><?php echo strtoupper($fet['zipcode_move_to']); ?></td>
</tr>
<tr>
<td><strong>Bldg/Suite/Apt:</strong></td>
<td><?php echo strtoupper($fet['bldg_suite_apt_move_to']); ?></td>
</tr>
<tr>
<td><strong>Intersection:</strong></td>
<td><?php echo strtoupper($fet['nerest_intersection_move_to']); ?></td>
</tr>
<tr>
<td><strong>Apartment or Condo:</strong></td>
<td><?php echo strtoupper($fet['apartment_cando_move_to']); ?></td>
</tr>
<tr>
<td><strong>Gated community:</strong></td>
<td><?php echo strtoupper($fet['gated_community_move_to']); ?></td>
</tr>
</table>






















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
