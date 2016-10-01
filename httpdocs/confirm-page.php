<?php include('includes/top.php');
if ($_SESSION['pageOneData']['c_catagory'] == 0) {
	$cata = "Residential";	
} else {
	$cata = "Business/Government";		
}
?>
<script type="text/javascript">
function submit_data(e){
	var x = document.getElementById("myForm");
	x.action = e;
	x.submit();
}
</script>
<body>
<?php include('includes/header.php'); ?>
<div class="stepSec">
<?php include('includes/sub_menu.php'); ?>
<div class="topMain">
<div class="step5Sec">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<style>
h4{color:red; margin-bottom:15px;}
.col-md-6{min-height:14px;}
.row{margin-bottom:15px;}
</style>
<div class="col-md-12" style="border: 1px solid #cbcbcb;">
<div class="col-md-6">
<div class="row">
<h4>THE CONTACT DETAILS</h4>
<div class="col-md-4"><strong>Name: </strong></div><div class="col-md-6"><?php echo $_SESSION['pageOneData']['name']; ?></div>
<div class="col-md-4"><strong>Email: </strong></div><div class="col-md-6"><?php echo $_SESSION['pageOneData']['email']; ?></div>
<div class="col-md-4"><strong>Phone No: </strong></div><div class="col-md-6"><?php echo $_SESSION['pageOneData']['phone_no']; ?></div>
<div class="col-md-4"><strong>Category: </strong></div><div class="col-md-6"><?php echo $cat; ?></div>
</div>
<div class="row">
<h4>THE PRESENT LOCATION</h4>
<div class="col-md-4"><strong>Street Address: </strong></div><div class="col-md-6"><?php echo mysql_real_escape_string($_REQUEST['street_address']); ?></div>
<div class="col-md-4"><strong>Bldg/Suite/Apt: </strong></div><div class="col-md-6"><?php echo $_REQUEST['bldg_suite_apt']; ?></div>
<div class="col-md-4"><strong>State: </strong></div><div class="col-md-6"><?php echo $_REQUEST['state']; ?></div>
<div class="col-md-4"><strong>City: </strong></div><div class="col-md-6"><?php echo $_REQUEST['city']; ?></div>
<div class="col-md-4"><strong>Zipcode: </strong></div><div class="col-md-6"><?php echo $_REQUEST['zipcode']; ?></div>
<div class="col-md-4"><strong>Nearest major intersection: </strong></div><div class="col-md-6"><?php echo $_REQUEST['nerest_intersection']; ?></div>
<div class="col-md-4"><strong>Apartment or Condo: </strong></div><div class="col-md-6"><?php echo $_REQUEST['choice1']; ?></div>
<div class="col-md-4"><strong>Gated Community: </strong></div><div class="col-md-6"><?php echo $_REQUEST['choice2'];  ?></div>
</div>
<div class="row">
<h4>THE MOVE TO LOCATION</h4>
<div class="col-md-4"><strong>Street Address: </strong></div><div class="col-md-6"><?php echo mysql_real_escape_string($_REQUEST['street_address_move_to']); ?></div>
<div class="col-md-4"><strong>Bldg/Suite/Apt: </strong></div><div class="col-md-6"><?php echo $_REQUEST['bldg_suite_apt_move_to']; ?></div>
<div class="col-md-4"><strong>State: </strong></div><div class="col-md-6"><?php echo $_REQUEST['state_move_to']; ?></div>
<div class="col-md-4"><strong>City: </strong></div><div class="col-md-6"><?php echo $_REQUEST['city_move_to']; ?></div>
<div class="col-md-4"><strong>Zipcode: </strong></div><div class="col-md-6"><?php echo $_REQUEST['zipcode_move_to']; ?></div>
<div class="col-md-4"><strong>Nearest major intersection: </strong></div><div class="col-md-6"><?php echo $_REQUEST['nerest_intersection_move_to']; ?></div>
<div class="col-md-4"><strong>Apartment or Condo: </strong></div><div class="col-md-6"><?php echo $_REQUEST['choice1_move_to']; ?></div>
<div class="col-md-4"><strong>Gated Community: </strong></div><div class="col-md-6"><?php echo $_REQUEST['choice2_move_to'];  ?></div>
</div>

<div class="row">
<h4>THE PRIMARY CONTACT DETAILS</h4>
<div class="col-md-4"><strong>Primary Name: </strong></div><div class="col-md-6"><?php echo $_REQUEST['pfname'].''.$_REQUEST['plname']; ?></div>
<div class="col-md-4"><strong>Primary Email: </strong></div><div class="col-md-6"><?php echo $_REQUEST['p_email']; ?></div>
<div class="col-md-4"><strong>Primary Phone No: </strong></div><div class="col-md-6"><?php echo $_REQUEST['p_phone_no']; ?></div>
</div>
</div>

<div class="col-md-5">
<h4>SUMMARY OF CHARGES</h4>
<?php if($_REQUEST['step_2_product_qty_one']>0){?>
<div class="row">
<div class="col-md-4"><strong><?php echo($_REQUEST['step_2_product_qty_one']." ".$get['trailer_one']." foot trailers");?></strong></div><div class="col-md-6"><?php echo $_REQUEST['step_2_product_price_one']; ?></div>
</div>
<?php } ?>
<?php if($_REQUEST['step_2_product_qty_two']>0){?>
<div class="row">
<div class="col-md-4"><strong><?php echo($_REQUEST['step_2_product_qty_two']." ".$get['trailer_two']." foot trailers");?></strong></div><div class="col-md-6"><?php echo $_REQUEST['step_2_product_price_two']; ?></div>
</div>
<?php } ?>
<?php if($_REQUEST['step_2_product_qty_truck']>0){?>
<div class="row">
<div class="col-md-4"><strong><?php echo($_REQUEST['step_2_product_qty_truck']." Pickup");?></strong></div><div class="col-md-6"><?php echo $_REQUEST['step_2_product_price_truck']; ?></div>
</div>
<?php } ?>

<?php if($_REQUEST['step_2_product_qty_expedited']>0){?>
<div class="row">
<div class="col-md-4"><strong><?php echo($_REQUEST['step_2_product_qty_expedited']." Expedited Hours");?></strong></div><div class="col-md-6"><?php echo $_REQUEST['step_2_product_price_expedited']; ?></div>
</div>
<?php } ?>


<div class="row">
<div class="col-md-4"><strong>Mileage Surcharge:</strong> </div><div class="col-md-6"><?php echo($_REQUEST['surchargeData']);?></div>
</div>
<div class="row">
<div class="col-md-4"><strong>Total:</strong> </div><div class="col-md-6"><strong>$<?php echo($_SESSION['toatlSession']['total']+$_REQUEST['surchargeData']);?></strong></div>
</div>
</div>

</div>
<!--
<table border='0' align='center' width='100%' class="pure-table">
<tr>
<td valign='top' style='color:Red'><strong>THE CONTACT DETAILS</strong></td>
<td>------------------------------------------------------------</td>
</tr>
<tr>
<td width='20%'><strong>Name:</strong></td>
<td width='80%'><?php echo $_SESSION['pageOneData']['name']; ?></td>
</tr>
<tr>
<td width='20%'><strong>Email:</strong></td>
<td width='80%'><?php echo $_SESSION['pageOneData']['email']; ?></td>
</tr>
<tr>
<td width='20%'><strong>Phone No:</strong></td>
<td width='80%'><?php echo $_SESSION['pageOneData']['phone_no']; ?></td>
</tr>
<tr>
<td width='20%'><strong>Catagory:</strong></td>
<td width='80%'><?php echo $cata; ?></td>
</tr>
<tr>
<td valign='top' style='color:Red'><strong>The PRESENT LOCATION</strong></td>
<td>------------------------------------------------------------</td>
</tr>
<tr>
<td width='20%'><strong>Street Address:</strong></td>
<td width='80%'><?php echo mysql_real_escape_string($_REQUEST['street_address']); ?></td>
</tr>
<tr>
<td width='20%'><strong>Bldg/Suite/Apt:</strong></td>
<td width='80%'><?php echo $_REQUEST['bldg_suite_apt']; ?></td>
</tr>
<tr>
<td width='20%'><strong>State:</strong></td>
<td width='80%'><?php echo $_REQUEST['state']; ?></td>
</tr>
<tr>
<td width='20%'><strong>City:</strong></td>
<td width='80%'><?php echo $_REQUEST['city']; ?></td>
</tr>
<tr>
<td width='20%'><strong>Zipcode:</strong></td>
<td width='80%'><?php echo $_REQUEST['zipcode']; ?></td>
</tr>
<tr>
<td width='20%'><strong>Nearest major intersection:</strong></td>
<td width='80%'><?php echo $_REQUEST['nerest_intersection']; ?></td>
</tr>
<tr>
<td width='20%'><strong>Apartment or Condo:</strong></td>
<td width='80%'><?php echo $_REQUEST['choice1']; ?></td>
</tr>
<tr>
<td width='20%'><strong>Gated Community:</strong></td>
<td width='80%'><?php echo $_REQUEST['choice2']; ?></td>
</tr>
<tr>
<td valign='top' style='color:Red'><strong>The MOVE TO LOCATION</strong></td>
<td>------------------------------------------------------------</td>
</tr>
<tr>
<td width='20%'><strong>Street Address:</strong></td>
<td width='80%'><?php echo mysql_real_escape_string($_REQUEST['street_address_move_to']); ?></td>
</tr>
<tr>
<td width='20%'><strong>Bldg/Suite/Apt:</strong></td>
<td width='80%'><?php echo $_REQUEST['bldg_suite_apt_move_to']; ?></td>
</tr>
<tr>
<td width='20%'><strong>State:</strong></td>
<td width='80%'><?php echo $_REQUEST['state_move_to']; ?></td>
</tr>
<tr>
<td width='20%'><strong>City:</strong></td>
<td width='80%'><?php echo $_REQUEST['city_move_to']; ?></td>
</tr>
<tr>
<td width='20%'><strong>Zipcode:</strong></td>
<td width='80%'><?php echo $_REQUEST['zipcode_move_to']; ?></td>
</tr>
<tr>
<td width='20%'><strong>Nearest major intersection:</strong></td>
<td width='80%'><?php echo $_REQUEST['nerest_intersection_move_to']; ?></td>
</tr>
<tr>
<tr>
<td width='20%'><strong>Apartment or Condo:</strong></td>
<td width='80%'><?php echo $_REQUEST['choice1_move_to']; ?></td>
</tr>
<tr>
<td width='20%'><strong>Gated Community:</strong></td>
<td width='80%'><?php echo $_REQUEST['choice2_move_to']; ?></td>
</tr>
<tr>
<td valign='top' style='color:Red'><strong>THE PRIMARY CONTACT</strong></td>
<td>------------------------------------------------------------</td>
</tr>
<tr>
<td valign='top'><strong>Primary Name</strong></td>
<td><?php echo $_REQUEST['pfname'].''.$_REQUEST['plname']; ?></td>
</tr>
<tr>
<td valign='top'><strong>Primary Email</strong></td>
<td><?php echo $_REQUEST['p_email']; ?></td>
</tr>
<tr>
<td valign='top'><strong>Primary Phone No</strong></td>
<td><?php echo $_REQUEST['p_phone_no']; ?></td>
</tr>
<tr>
<td valign='top' style='color:Red'><strong>TRAILER RENTAL</strong></td>
<td>------------------------------------------------------------</td>
</tr>
<tr>
<td valign='top'><strong><?php echo $get['trailer_one'].'&nbsp;'.'foot'; ?></strong></td>
<td>Qty = <?php echo $_REQUEST['step_2_product_qty_one']; ?> Price = <?php echo $_REQUEST['step_2_product_price_one']; ?></td>
</tr>
<tr>
<td valign='top'><strong><?php echo $get['trailer_two'].'&nbsp;'.'foot'; ?></strong></td>
<td>Qty = <?php echo $_REQUEST['step_2_product_qty_two']; ?> Price = <?php echo $_REQUEST['step_2_product_price_two']; ?></td>
</tr>
<tr>
<td valign='top' style='color:Red'><strong>TRAILER DELIVERY</strong></td>
<td>------------------------------------------------------------</td>
</tr>
<tr>
<td valign='top'><strong>Trailer Placed</strong></td>
<td><?php echo $_SESSION['pageOneData_two']['step_3_trailors_place']; ?></td>
</tr>
<tr>
</table> -->

<form id="myForm" method="post" action="final-submit.php" style="margin-top:15px;">
<input name="pfname" type="hidden"   value="<?php echo $_REQUEST['pfname']; ?>" />
<input name="plname" type="hidden"   value="<?php echo $_REQUEST['plname']; ?>" />
<input name="p_phone_no" type="hidden"   value="<?php echo $_REQUEST['p_phone_no']; ?>" />
<input name="p_email" type="hidden"   value="<?php echo $_REQUEST['p_email']; ?>" />
<input name="street_address" type="hidden"   value="<?php echo $_REQUEST['street_address']; ?>" />
<input name="city" type="hidden"   value="<?php echo $_REQUEST['city']; ?>" />
<input name="state" type="hidden"   value="<?php echo $_REQUEST['state']; ?>" />
<input name="zipcode" type="hidden"   value="<?php echo $_REQUEST['zipcode']; ?>" />
<input name="bldg_suite_apt" type="hidden"   value="<?php echo $_REQUEST['bldg_suite_apt']; ?>" />
<input name="nerest_intersection" type="hidden"   value="<?php echo $_REQUEST['nerest_intersection']; ?>" />
<input name="choice1" type="hidden"   value="<?php echo $_REQUEST['choice1']; ?>" />
<input name="choice2" type="hidden"   value="<?php echo $_REQUEST['choice2']; ?>" />
<input name="street_address_move_to" type="hidden"   value="<?php echo $_REQUEST['street_address_move_to']; ?>" />
<input name="city_move_to" type="hidden"   value="<?php echo $_REQUEST['city_move_to']; ?>" />
<input name="state_move_to" type="hidden"   value="<?php echo $_REQUEST['state_move_to']; ?>" />
<input name="zipcode_move_to" type="hidden"   value="<?php echo $_REQUEST['zipcode_move_to']; ?>" />
<input name="bldg_suite_apt_move_to" type="hidden"   value="<?php echo $_REQUEST['bldg_suite_apt_move_to']; ?>" />
<input name="nerest_intersection_move_to" type="hidden"   value="<?php echo $_REQUEST['nerest_intersection_move_to']; ?>" />
<input name="choice1_move_to" type="hidden"   value="<?php echo $_REQUEST['choice1_move_to']; ?>" />
<input name="choice2_move_to" type="hidden"   value="<?php echo $_REQUEST['choice2_move_to']; ?>" />

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
<?php 
$_SESSION['surcharge_charge'] = $_REQUEST['surchargeData'];
?>
<input type="hidden" name="gtotal" value="<?php echo $_SESSION['toatlSession']['total']+$_REQUEST['surchargeData']; ?>"  />
<input type="hidden" name="businessAddress" id="bAddress" value="8129 S Yukon St, Littleton, CO 80128, United States"  />

<input type="submit" class="submit_confirm" value="Confirm" name="Submit_val_6" alt="Submit" style=" margin:0 10px;" >
<!--<input type="button" value="Back" name="" alt="" style="width:105px; height:35px; margin:0 0 0 0; float:right;" onClick="submit_data('step-6.php')">-->
</form>
</div>
</div>
</div>
<?php 
include('includes/footer.php');
ob_end_flush();
?>