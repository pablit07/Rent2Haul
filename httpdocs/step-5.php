<?php include('includes/top.php');?>
<?php
if (isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'Submit_val_4') {
//unset($_SESSION['pageOneData_four']);	
	if (!isset($_SESSION['pageOneData_three'])) {
		$arry = array(
			"step_4_no_of_movers_mh" => $_REQUEST['step_4_no_of_movers_mh'],
			"step_4_estimated_hrs_mh" => $_REQUEST['step_4_estimated_hrs_mh'],
			"step_4_estimated_hrs_puh" => $_REQUEST['step_4_estimated_hrs_puh'],
			"step_4_no_of_movers_puh" => $_REQUEST['step_4_no_of_movers_puh'],
			"toatlOfMovers" => $_REQUEST['step_4_no_of_movers_mh']*$_REQUEST['step_4_estimated_hrs_mh']*$_REQUEST['hwOne'],
			"toatlOfPAndU" => $_REQUEST['step_4_no_of_movers_puh']*$_REQUEST['step_4_estimated_hrs_puh']*$_REQUEST['hwTwo'],
			"totalOfstep4" => $_REQUEST['totalOfstep4']
		);

		$_SESSION['pageOneData_three'] = $arry;
	} else {
		$_SESSION['pageOneData_three']['step_4_no_of_movers_mh'] = $_REQUEST['step_4_no_of_movers_mh'];
		$_SESSION['pageOneData_three']['step_4_estimated_hrs_mh'] = $_REQUEST['step_4_estimated_hrs_mh'];
		$_SESSION['pageOneData_three']['step_4_estimated_hrs_puh'] = $_REQUEST['step_4_estimated_hrs_puh'];	
		$_SESSION['pageOneData_three']['step_4_no_of_movers_puh'] = $_REQUEST['step_4_no_of_movers_puh'];	
		$_SESSION['pageOneData_three']['toatlOfMovers'] = $_REQUEST['step_4_no_of_movers_mh']*$_REQUEST['step_4_estimated_hrs_mh']*$_REQUEST['hwOne'];
		$_SESSION['pageOneData_three']['toatlOfPAndU'] = $_REQUEST['step_4_no_of_movers_puh']*$_REQUEST['step_4_estimated_hrs_puh']*$_REQUEST['hwTwo'];
		$_SESSION['pageOneData_three']['totalOfstep4'] = $_REQUEST['totalOfstep4'];
	}
} else {
	if (isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'noThank_you') {
		$arry = array(
			"step_4_no_of_movers_mh" => 0,
			"step_4_estimated_hrs_mh" => 0,
			"step_4_estimated_hrs_puh" => 0,
			"step_4_no_of_movers_puh" => 0,
			"toatlOfMovers" => 0,
			"toatlOfPAndU" => 0,
			"totalOfstep4" => 0
		);
		$_SESSION['pageOneData_three'] = $arry;
	}
}
?>
<?php
if (!isset($_REQUEST['submit']) && $_REQUEST['submit'] != 'Submit_val_4' && empty($_SESSION['pageOneData_three'])) {
?>
<script type="text/javascript">
//alert("Please Submit The Form First"); 
document.location.href='step-4.php';
</script>
<?php
}
?>
<script type="text/javascript">
function calculate(qty_id,cost,ans_id){
//var subTotal_one;	
	var getQty = document.getElementById(qty_id).value;
	var totalPrice = getQty*cost;
//AJAX
	var hr = new XMLHttpRequest();
	var url = "ajax_sum_step5.php";
	var totalPriceData = totalPrice;
	var fildName = ans_id;
	var vars = "totalPriceData="+totalPriceData+"&fildName="+fildName;
	hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
		if(hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			document.getElementById("to").innerHTML='$'+return_data;
			document.getElementById("sTotal").value=return_data;
		}
	}
	hr.send(vars); 
	document.getElementById(ans_id).value=totalPrice;
}

function getTheSeleted(fildnameData,e){
	var hr = new XMLHttpRequest();
	var url = "ajax_sum_step5.php";
	var vars = "totalPriceData="+e+"&fildName="+fildnameData;
	hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
		if (hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			document.getElementById("to").innerHTML='$'+return_data;
			document.getElementById("sTotal").value=return_data;
		}
	}
	hr.send(vars);
}
</script>
<body>
<?php include('includes/header.php'); ?>
<div class="stepSec">
<?php include('includes/sub_menu.php'); ?>
<div class="topMain">
<div class="choosendProtectionSec container">
<h4>CHOOSE YOUR ACCESSORIES AND PROTECTION OPTIONS</h4>
<p>We've got you covered with everything you need to help protect your stuff.</p>
<form id="to-step6" action="step-6.php" method="POST">
<?php /*?><div class="suppliseArea">
<h3>SUPPLY AND ACCESSORIES</h3>
<div class="itemSec">
<div class="itemTxtArea">Item</div>
<div class="priceArea">Price</div>
<div class="quantitySec2">Qty</div>
</div>
<div class="itemcolorPrt">
<div class="countingArea">
<div class="itemTxtArea"><p><?php echo $getSA['acc_one_name']; ?></p></div>
<div class="priceArea"><p>$<?php echo $getSA['acc_one_price']; ?></p></div>
<div class="quantitySec2"><div class="quanBodr">
<input name="acc_one_qty" type="text" id="acc_one_q" value="<?php echo  $_SESSION['pageOneData_four']['acc_one_qty']; ?>" onChange="calculate('acc_one_q',<?php echo $getSA['acc_one_price']; ?>,'acc_one_t')" onBlur="calculate('acc_one_q',<?php echo $getSA['acc_one_price']; ?>,'acc_one_t')" onClick="calculate('acc_one_q',<?php echo $getSA['acc_one_price']; ?>,'acc_one_t')" onKeyDown="calculate('acc_one_q',<?php echo $getSA['acc_one_price']; ?>,'acc_one_t')"  onkeypress="calculate('acc_one_q',<?php echo $getSA['acc_one_price']; ?>,'acc_one_t')" onKeyUp="calculate('acc_one_q',<?php echo $getSA['acc_one_price']; ?>,'acc_one_t')" />
<input name="acc_one_total" type="hidden" id="acc_one_t" value="<?php echo  $_SESSION['pageOneData_four']['acc_one_total']; ?>" />
</div>
</div>
</div>
</div>
<div class="itemcolorPrt">
<div class="itemcolorPrt">
<div class="itemTxtArea"><p><?php echo $getSA['acc_two_name']; ?></p></div>
<div class="priceArea"><p>$<?php echo $getSA['acc_two_price']; ?></p></div>
<div class="quantitySec2"><div class="quanBodr">
<input name="acc_two_qty" type="text" id="acc_two_q" value="<?php echo  $_SESSION['pageOneData_four']['acc_two_qty']; ?>" onChange="calculate('acc_two_q',<?php echo $getSA['acc_two_price']; ?>,'acc_two_t')"  onblur="calculate('acc_two_q',<?php echo $getSA['acc_two_price']; ?>,'acc_two_t')" onKeyDown="calculate('acc_two_q',<?php echo $getSA['acc_two_price']; ?>,'acc_two_t')"  onkeypress="calculate('acc_two_q',<?php echo $getSA['acc_two_price']; ?>,'acc_two_t')" onKeyUp="calculate('acc_two_q',<?php echo $getSA['acc_two_price']; ?>,'acc_two_t')" />
<input name="acc_two_total" type="hidden" id="acc_two_t" value="<?php echo  $_SESSION['pageOneData_four']['acc_two_total']; ?>" />
</div>
</div>
</div>
</div>
<div class="itemcolorPrt">
<div class="countingArea">
<div class="itemTxtArea"><p><?php echo $getSA['acc_three_name']; ?></p></div>
<div class="priceArea"><p>$<?php echo $getSA['acc_three_price']; ?></p></div>
<div class="quantitySec2"><div class="quanBodr">
<input name="acc_three_qty" type="text" id="acc_three_q" value="<?php echo  $_SESSION['pageOneData_four']['acc_three_qty']; ?>" onChange="calculate('acc_three_q',<?php echo $getSA['acc_three_price']; ?>,'acc_three_t')" onBlur="calculate('acc_three_q',<?php echo $getSA['acc_three_price']; ?>,'acc_three_t')" onKeyDown="calculate('acc_three_q',<?php echo $getSA['acc_three_price']; ?>,'acc_three_t')"  onkeypress="calculate('acc_three_q',<?php echo $getSA['acc_three_price']; ?>,'acc_three_t')" onKeyUp="calculate('acc_three_q',<?php echo $getSA['acc_three_price']; ?>,'acc_three_t')" />
<input name="acc_three_total" type="hidden" id="acc_three_t" value="<?php echo  $_SESSION['pageOneData_four']['acc_three_total']; ?>" />
</div>
</div>
</div>
</div>
<div class="itemcolorPrt">
<div class="countingArea">
<div class="itemTxtArea"><p><?php echo $getSA['acc_four_name']; ?></p></div>
<div class="priceArea"><p>$<?php echo $getSA['acc_four_price']; ?></p></div>
<div class="quantitySec2"><div class="quanBodr">
<input name="acc_four_qty" type="text" id="acc_four_q" value="<?php echo  $_SESSION['pageOneData_four']['acc_four_qty']; ?>" onBlur="calculate('acc_four_q',<?php echo $getSA['acc_four_price']; ?>,'acc_four_t')" onChange="calculate('acc_four_q',<?php echo $getSA['acc_four_price']; ?>,'acc_four_t')" onClick="calculate('acc_four_q',<?php echo $getSA['acc_four_price']; ?>,'acc_four_t')" onKeyDown="calculate('acc_four_q',<?php echo $getSA['acc_four_price']; ?>,'acc_four_t')"  onkeypress="calculate('acc_four_q',<?php echo $getSA['acc_four_price']; ?>,'acc_four_t')" onKeyUp="calculate('acc_four_q',<?php echo $getSA['acc_four_price']; ?>,'acc_four_t')" />
<input name="acc_four_total" type="hidden" id="acc_four_t" value="<?php echo  $_SESSION['pageOneData_four']['acc_four_total']; ?>" />
</div>
</div>
</div>
</div>
<div class="itemcolorPrt">
<div class="itemTxtArea"><p><?php echo $getSA['acc_five_name']; ?></p></div>
<div class="priceArea"><p>$<?php echo $getSA['acc_five_price']; ?></p></div>
<div class="quantitySec2">
<div class="quanBodr">
<input name="acc_five_qty" type="text" id="acc_five_q" value="<?php echo  $_SESSION['pageOneData_four']['acc_five_qty']; ?>" onChange="calculate('acc_five_q',<?php echo $getSA['acc_five_price']; ?>,'acc_five_t')" onBlur="calculate('acc_five_q',<?php echo $getSA['acc_five_price']; ?>,'acc_five_t')" onClick="calculate('acc_five_q',<?php echo $getSA['acc_five_price']; ?>,'acc_five_t')" onKeyDown="calculate('acc_five_q',<?php echo $getSA['acc_five_price']; ?>,'acc_five_t')"  onkeypress="calculate('acc_five_q',<?php echo $getSA['acc_five_price']; ?>,'acc_five_t')" onKeyUp="calculate('acc_five_q',<?php echo $getSA['acc_five_price']; ?>,'acc_five_t')"  />
<input name="acc_five_total" type="hidden" id="acc_five_t" value="<?php echo  $_SESSION['pageOneData_four']['acc_five_total']; ?>" />
</div>
</div>
</div>
<div class="itemcolorPrt">
<div class="itemTxtArea"><p><?php echo $getSA['acc_six_name']; ?></p></div>
<div class="priceArea"><p>$<?php echo $getSA['acc_six_price']; ?></p></div>
<div class="quantitySec2">
<div class="quanBodr">
<input name="acc_six_qty" type="text" id="acc_six_q" value="<?php echo  $_SESSION['pageOneData_four']['acc_six_qty']; ?>" onChange="calculate('acc_six_q',<?php echo $getSA['acc_six_price']; ?>,'acc_six_t')" onClick="calculate('acc_six_q',<?php echo $getSA['acc_six_price']; ?>,'acc_six_t')" onBlur="calculate('acc_six_q',<?php echo $getSA['acc_six_price']; ?>,'acc_six_t')" onKeyDown="calculate('acc_six_q',<?php echo $getSA['acc_six_price']; ?>,'acc_six_t')"  onkeypress="calculate('acc_six_q',<?php echo $getSA['acc_six_price']; ?>,'acc_six_t')" onKeyUp="calculate('acc_six_q',<?php echo $getSA['acc_six_price']; ?>,'acc_six_t')" />
<input name="acc_six_total" type="hidden" id="acc_six_t" value="<?php echo  $_SESSION['pageOneData_four']['acc_six_total']; ?>" />
</div>
</div>
</div>
<div class="itemcolorPrt">
<div class="itemTxtArea"><p><?php echo $getSA['acc_seven_name']; ?></p></div>
<div class="priceArea"><p>$<?php echo $getSA['acc_six_price']; ?></p></div>
<div class="quantitySec2">
<div class="quanBodr">
<input name="acc_seven_qty" type="text" id="acc_seven_q" value="<?php echo  $_SESSION['pageOneData_four']['acc_seven_qty']; ?>" onChange="calculate('acc_seven_q',<?php echo $getSA['acc_six_price']; ?>,'acc_seven_t')" onBlur="calculate('acc_seven_q',<?php echo $getSA['acc_six_price']; ?>,'acc_seven_t')" onClick="calculate('acc_seven_q',<?php echo $getSA['acc_six_price']; ?>,'acc_seven_t')" onKeyDown="calculate('acc_seven_q',<?php echo $getSA['acc_six_price']; ?>,'acc_seven_t')"  onkeypress="calculate('acc_seven_q',<?php echo $getSA['acc_six_price']; ?>,'acc_seven_t')" onKeyUp="calculate('acc_seven_q',<?php echo $getSA['acc_six_price']; ?>,'acc_seven_t')" />
<input name="acc_seven_total" type="hidden" id="acc_seven_t" value="<?php echo  $_SESSION['pageOneData_four']['acc_seven_total']; ?>" />
</div>
</div>
</div>
<div class="itemcolorPrt">
<div class="countingArea">
<div class="itemTxtArea"><p><?php echo $getSA['acc_eight_name']; ?></p></div>
<div class="priceArea"><p>$<?php echo $getSA['acc_eight_price']; ?></p></div>
<div class="quantitySec2">
<div class="quanBodr">
<input name="acc_eight_qty" type="text" id="acc_eight_q" value="<?php echo  $_SESSION['pageOneData_four']['acc_eight_qty']; ?>" onChange="calculate('acc_eight_q',<?php echo $getSA['acc_eight_price']; ?>,'acc_eight_t')" onClick="calculate('acc_eight_q',<?php echo $getSA['acc_eight_price']; ?>,'acc_eight_t')" onBlur="calculate('acc_eight_q',<?php echo $getSA['acc_eight_price']; ?>,'acc_eight_t')" onKeyDown="calculate('acc_eight_q',<?php echo $getSA['acc_eight_price']; ?>,'acc_eight_t')"  onkeypress="calculate('acc_eight_q',<?php echo $getSA['acc_eight_price']; ?>,'acc_eight_t')" onKeyUp="calculate('acc_eight_q',<?php echo $getSA['acc_eight_price']; ?>,'acc_eight_t')"  />
<input name="acc_eight_total" type="hidden" id="acc_eight_t" value="<?php echo  $_SESSION['pageOneData_four']['acc_eight_total']; ?>" />
</div>
</div>
</div>
</div>
<div class="itemcolorPrt">
<div class="countingArea">
<div class="itemTxtArea"><p><?php echo $getSA['acc_nine_name']; ?></p></div>
<div class="priceArea"><p>$<?php echo $getSA['acc_nine_price']; ?></p></div>
<div class="quantitySec2">
<div class="quanBodr">
<input name="acc_nine_qty" type="text" id="acc_nine_q"  value="<?php echo  $_SESSION['pageOneData_four']['acc_nine_qty']; ?>" onChange="calculate('acc_nine_q',<?php echo $getSA['acc_nine_price']; ?>,'acc_nine_t')" onBlur="calculate('acc_nine_q',<?php echo $getSA['acc_nine_price']; ?>,'acc_nine_t')" onClick="calculate('acc_nine_q',<?php echo $getSA['acc_nine_price']; ?>,'acc_nine_t')" onKeyDown="calculate('acc_nine_q',<?php echo $getSA['acc_nine_price']; ?>,'acc_nine_t')"  onkeypress="calculate('acc_nine_q',<?php echo $getSA['acc_nine_price']; ?>,'acc_nine_t')" onKeyUp="calculate('acc_nine_q',<?php echo $getSA['acc_nine_price']; ?>,'acc_nine_t')"  />
<input name="acc_nine_total" type="hidden" id="acc_nine_t" value="<?php echo  $_SESSION['pageOneData_four']['acc_nine_total']; ?>" />
</div>
</div>
</div>
</div>
<!--
<div class="itemcolorPrt">
<div class="itemTxtArea"><p>1.5 CU SMALL BOX </p></div>
<div class="priceArea"><p>$1.70</p></div>
<div class="quantitySec2"><div class="quanBodr"><input name="" type="text" /></div></div>
</div>
-->
</div><?php */?>
<div class="suppliseArea2">
<p>Supplies will be delivered with your trailer.<br /><b>Price do not include tax.</b></p>
<h4>A lock must be placed on each trailer
<!--<img src="image/btn_question.png" width="15" height="15" alt="question" />-->
</h4>
<div class="lockArea col-md-12">
<div class="lockingpic col-md-3"><img src="image/1398880861_security_lock.png" width="64" height="64" alt="lock" /></div>
<div class="col-md-7" style="overflow:auto;">
<div class="radio2SEc col-md-10">
<div class="purchaseRadio">
<input name="lock_on_container" type="radio" onClick="getTheSeleted('lock_on_container',<?php echo $getSA['lock_on_container']; ?>)" value="<?php echo $getSA['lock_on_container']; ?>" <?php if(isset($_SESSION['pageOneData_four']['lock_on_container']) && $_SESSION['pageOneData_four']['lock_on_container']==$getSA['lock_on_container']*2){?> checked="checked" <?php }?> required />
</div>
<p>Purchase 2 from Rent2Haul for $<?php echo $getSA['lock_on_container']; ?>/ea</p>
</div>
<div class="radio2SEc col-md-10">
<div class="purchaseRadio">
<input name="lock_on_container" <?php if($_SESSION['pageOneData_one']['step_2_product_qty_one']<1 && $_SESSION['pageOneData_one']['step_2_product_qty_two']<1) {echo("checked");} ?> type="radio" onClick="getTheSeleted('lock_on_container',0)" value="0" <?php if(isset($_SESSION['pageOneData_four']['lock_on_container']) && $_SESSION['pageOneData_four']['lock_on_container']==0){?> checked="checked" <?php }?> required />
</div>
<p>I will provide</p>
</div>
</div>
</div>
</div> 
<div class="suppliseArea col-md-12">
<h3>EQUIPMENT RENTAL</h3>
<div class="col-md-12" style="border-bottom: 1px solid #d7d7d7;overflow:auto;margin-bottom:10px;">
<div class="itemTxtArea col-md-3 hidden-xs">Item </div>
<div class="priceArea col-md-3">Price</div>
<div class="quantitySec2 col-md-3 hidden-xs">Qty</div>
<div class="visible-xs col-md-3 col-xs-5" style="float:right;">Qty</div>
</div>
<div class="countingArea col-md-12">
<div class="itemTxtArea col-md-3"><p><?php echo $getSA['equ_one_name']; ?></p><p class="visible-xs">&nbsp;</p></div>
<div class="priceArea col-md-3"><p>$<?php echo $getSA['equ_one_price']; ?></p></div>
<div class="quantitySec2 col-md-3">
<div class="quanBodr">
<input name="equ_one_qty" type="text" id="equ_one_q" value="<?php echo  $_SESSION['pageOneData_four']['equ_one_qty']; ?>" onClick="calculate('equ_one_q',<?php echo $getSA['equ_one_price']; ?>,'equ_one_t')" onBlur="calculate('equ_one_q',<?php echo $getSA['equ_one_price']; ?>,'equ_one_t')" onChange="calculate('equ_one_q',<?php echo $getSA['equ_one_price']; ?>,'equ_one_t')" onKeyDown="calculate('equ_one_q',<?php echo $getSA['equ_one_price']; ?>,'equ_one_t')"  onkeypress="calculate('equ_one_q',<?php echo $getSA['equ_one_price']; ?>,'equ_one_t')" onKeyUp="calculate('equ_one_q',<?php echo $getSA['equ_one_price']; ?>,'equ_one_t')"  />
<input name="equ_one_total" type="hidden" id="equ_one_t" value="<?php echo  $_SESSION['pageOneData_four']['equ_one_total']; ?>" />
</div>
</div>
</div>
<div class="itemcolorPrt col-md-12">
<div class="itemTxtArea col-md-3"><p><?php echo $getSA['equ_two_name']; ?></p><p class="visible-xs">&nbsp;</p></div>
<div class="priceArea col-md-3"><p>$<?php echo $getSA['equ_two_price']; ?></p></div>
<div class="quantitySec2 col-md-3"><div class="quanBodr">
<input name="equ_two_qty" type="text" id="equ_two_q" value="<?php echo  $_SESSION['pageOneData_four']['equ_two_qty']; ?>" onClick="calculate('equ_two_q',<?php echo $getSA['equ_two_price']; ?>,'equ_two_t')" onBlur="calculate('equ_two_q',<?php echo $getSA['equ_two_price']; ?>,'equ_two_t')" onChange="calculate('equ_two_q',<?php echo $getSA['equ_two_price']; ?>,'equ_two_t')" onKeyDown="calculate('equ_two_q',<?php echo $getSA['equ_two_price']; ?>,'equ_two_t')"  onkeypress="calculate('equ_two_q',<?php echo $getSA['equ_two_price']; ?>,'equ_two_t')" onKeyUp="calculate('equ_two_q',<?php echo $getSA['equ_two_price']; ?>,'equ_two_t')" />
<input name="equ_two_total" type="hidden" id="equ_two_t" value="<?php echo  $_SESSION['pageOneData_four']['equ_two_total']; ?>" />
</div></div>
</div>
</div> 
<div class="countingArea col-md-12" style="min-midth:90%;">
<!--<div class="itemTxtArea col-md-3">&nbsp;</div>-->
<div class="priceArea col-md-3"><p>Total:</p></div>
<div class="quantitySec2 col-md-3">
<div class="" style="boder:none;">
<p id="to" style="font:bold 18px/20px Verdana, Geneva, sans-serif; color:#000;"><?php if(isset($_SESSION['pageOneData_four'])){ echo '$'.$_SESSION['pageOneData_four']['sTotal'];}?></p>
</div>
</div>
</div>
<div class="continueBtnArea">

<input type="hidden" value="" name="sTotal" id="sTotal" />

<input type="hidden" name="step_4_no_of_movers_puh" value="<?php echo $_SESSION['pageOneData_three']['step_4_no_of_movers_puh']; ?>" />
<input type="hidden" name="step_4_estimated_hrs_puh" value="<?php echo $_SESSION['pageOneData_three']['step_4_estimated_hrs_puh']; ?>" />
<input type="hidden" name="step_4_estimated_hrs_mh" value="<?php echo $_SESSION['pageOneData_three']['step_4_estimated_hrs_mh']; ?>" />
<input type="hidden" name="step_4_no_of_movers_mh" value="<?php echo $_SESSION['pageOneData_three']['step_4_no_of_movers_mh']; ?>" />
<input type="hidden" value="<?php echo $_SESSION['pageOneData_three']['totalOfstep4']; ?>" name="totalOfstep4" />

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

<input type="submit" value="Submit_val_5" name="submitbtn" alt="Submit" id="submit-button" class="submit">
</div>
</form>  
</div>
</div>
</div>
<?php if($_SESSION['pageOneData_one']['step_2_product_qty_one']<1 && $_SESSION['pageOneData_one']['step_2_product_qty_two']<1) { ?>
<script type="text/javascript">
//document.getElementById("to-step6").submit();
$("#submit-button").click();
</script>
<?php } ?>
<?php include('includes/footer.php');
ob_end_flush();
?>