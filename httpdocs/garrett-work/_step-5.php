<?php include('includes/top.php'); ?>
<script type="text/javascript">
function calculate(qty_id,cost,ans_id){
var singlePrice = cost;
var getQty = document.getElementById(qty_id).value;
var totalPrice = getQty*cost;
document.getElementById(ans_id).value=totalPrice;
calculateToatal() 	
}
function calculateToatal(){
var one = parseInt(document.getElementById('acc_one_t').value);
var two = parseInt(document.getElementById('acc_two_t').value);
var three = parseInt(document.getElementById('acc_three_t').value);
var four = parseInt(document.getElementById('acc_four_t').value);
var five = parseInt(document.getElementById('acc_five_t').value);
var six = parseInt(document.getElementById('acc_six_t').value);
var seven = parseInt(document.getElementById('acc_seven_t').value);
var eight = parseInt(document.getElementById('acc_eight_t').value);
var nine = parseInt(document.getElementById('acc_nine_t').value);
var ten = parseInt(document.getElementById('equ_one_t').value);
var eleven = parseInt(document.getElementById('equ_two_t').value);
var subTotal_one = one+two+three+four+five+six+seven+eight+nine+ten+eleven;
document.getElementById('to').value=subTotal_one;	
}
</script>
<body>
<?php include('includes/header.php'); ?>
<div class="stepSec">
<?php include('includes/sub_menu.php'); ?>
<div class="topMain">
<div class="choosendProtectionSec">
<h4>CHOOSE YOUR ACCESSORIES AND PROTECTION OPTIONS</h4>
<p>We've got you covered with everything you need to help protect your stuff.</p>
<form action="step-6.php" method="POST">
<div class="suppliseArea">
<h3>SUPPLY AND ACCESSORIES</h3>
<div class="itemSec">
<div class="itemTxtArea">Item </div>
<div class="priceArea">Price</div>
<div class="quantitySec2">Qty</div>
</div>
<div class="itemcolorPrt">
<div class="countingArea">
<div class="itemTxtArea"><p>1.5 CU SMALL BOX </p></div>
<div class="priceArea"><p>$1.70</p></div>
<div class="quantitySec2"><div class="quanBodr">
<input name="acc_one_qty" type="text" id="acc_one_q" onKeyDown="calculate('acc_one_q',1.70,'acc_one_t')"  onkeypress="calculate('acc_one_q',1.70,'acc_one_t')" onKeyUp="calculate('acc_one_q',1.70,'acc_one_t')" on  />
<input name="acc_one_total" type="hidden" id="acc_one_t" value="" />
</div>
</div>
</div>
</div>
<div class="itemcolorPrt">
<div class="itemcolorPrt">
<div class="itemTxtArea"><p>3.0 MEDIUM BOX</p></div>
<div class="priceArea"><p>$3.15</p></div>
<div class="quantitySec2"><div class="quanBodr">
<input name="acc_two_qty" type="text" id="acc_two_q" onKeyDown="calculate('acc_two_q',3.15,'acc_two_t')"  onkeypress="calculate('acc_two_q',3.15,'acc_two_t')" onKeyUp="calculate('acc_two_q',3.15,'acc_two_t')" on  />
<input name="acc_two_total" type="hidden" id="acc_two_t" value="" />
</div>
</div>
</div>
</div>
<div class="itemcolorPrt">
<div class="countingArea">
<div class="itemTxtArea"><p>5.2 LARGE BOX</p></div>
<div class="priceArea"><p>$5.45</p></div>
<div class="quantitySec2"><div class="quanBodr">
<input name="acc_three_qty" type="text" id="acc_three_q" onKeyDown="calculate('acc_three_q',5.45,'acc_three_t')"  onkeypress="calculate('acc_three_q',5.45,'acc_three_t')" onKeyUp="calculate('acc_three_q',5.45,'acc_three_t')" on  />
<input name="acc_three_total" type="hidden" id="acc_three_t" value="" />
</div>
</div>
</div>
</div>
<div class="itemcolorPrt">
<div class="countingArea">
<div class="itemTxtArea"><p>BUBBLE WRAP/BAG 12"x60" 3/16</p></div>
<div class="priceArea"><p>$14.95</p></div>
<div class="quantitySec2"><div class="quanBodr">
<input name="acc_four_qty" type="text" id="acc_four_q" onKeyDown="calculate('acc_four_q',14.95,'acc_four_t')"  onkeypress="calculate('acc_four_q',14.95,'acc_four_t')" onKeyUp="calculate('acc_four_q',14.95,'acc_four_t')" on  />
<input name="acc_four_total" type="hidden" id="acc_four_t" value="" />
</div>
</div>
</div>
</div>
<div class="itemcolorPrt">
<div class="itemTxtArea"><p>CLEAR TAPE</p></div>
<div class="priceArea"><p>$2.25</p></div>
<div class="quantitySec2">
<div class="quanBodr">
<input name="acc_five_qty" type="text" id="acc_five_q" onKeyDown="calculate('acc_five_q',2.25,'acc_five_t')"  onkeypress="calculate('acc_five_q',2.25,'acc_five_t')" onKeyUp="calculate('acc_five_q',2.25,'acc_five_t')" on  />
<input name="acc_five_total" type="hidden" id="acc_five_t" value="" />
</div>
</div>
</div>
<div class="itemcolorPrt">
<div class="itemTxtArea"><p>KING SIZE MATTRESS BAG</p></div>
<div class="priceArea"><p>$5.59</p></div>
<div class="quantitySec2">
<div class="quanBodr">
<input name="acc_six_qty" type="text" id="acc_six_q" onKeyDown="calculate('acc_six_q',5.95,'acc_six_t')"  onkeypress="calculate('acc_six_q',5.95,'acc_six_t')" onKeyUp="calculate('acc_six_q',5.95,'acc_six_t')" on  />
<input name="acc_six_total" type="hidden" id="acc_six_t" value="" />
</div>
</div>
</div>
<div class="itemcolorPrt">
<div class="itemTxtArea"><p>ROPE</p></div>
<div class="priceArea"><p>$4.99</p></div>
<div class="quantitySec2">
<div class="quanBodr">
<input name="acc_seven_qty" type="text" id="acc_seven_q" onKeyDown="calculate('acc_seven_q',4.99,'acc_seven_t')"  onkeypress="calculate('acc_seven_q',4.99,'acc_seven_t')" onKeyUp="calculate('acc_seven_q',4.99,'acc_seven_t')" on  />
<input name="acc_seven_total" type="hidden" id="acc_seven_t" value="" />
</div>
</div>
</div>
<div class="itemcolorPrt">
<div class="countingArea">
<div class="itemTxtArea"><p>STRETCH WRAP 5"</p></div>
<div class="priceArea"><p>$8.95</p></div>
<div class="quantitySec2">
<div class="quanBodr">
<input name="acc_eight_qty" type="text" id="acc_eight_q" onKeyDown="calculate('acc_eight_q',8.95,'acc_eight_t')"  onkeypress="calculate('acc_eight_q',8.95,'acc_eight_t')" onKeyUp="calculate('acc_eight_q',8.95,'acc_eight_t')" on  />
<input name="acc_eight_total" type="hidden" id="acc_eight_t" value="" />
</div>
</div>
</div>
</div>
<div class="itemcolorPrt">
<div class="countingArea">
<div class="itemTxtArea"><p>TWIN MATTRESS BAG</p></div>
<div class="priceArea"><p>$3.75</p></div>
<div class="quantitySec2">
<div class="quanBodr">
<input name="acc_nine_qty" type="text" id="acc_nine_q" onKeyDown="calculate('acc_nine_q',3.75,'acc_nine_t')"  onkeypress="calculate('acc_nine_q',3.75,'acc_nine_t')" onKeyUp="calculate('acc_nine_q',3.75,'acc_nine_t')" on  />
<input name="acc_nine_total" type="hidden" id="acc_nine_t" value="" />
</div>
</div>
</div>
</div>
<!--<div class="itemcolorPrt">
<div class="itemTxtArea"><p>1.5 CU SMALL BOX </p></div>
<div class="priceArea"><p>$1.70</p></div>
<div class="quantitySec2"><div class="quanBodr"><input name="" type="text" /></div></div>
</div>-->
</div>
<div class="suppliseArea2">
<p>Supplies will be delivered with your trailer.<br /><b>Price do not include tax.</b></p>
<h4>A lock must be placed on each trailer
<!--<img src="image/btn_question.png" width="15" height="15" alt="question" />-->
</h4>
<div class="lockArea">
<div class="lockingpic"><img src="image/1398880861_security_lock.png" width="64" height="64" alt="lock" /></div>
<div class="radio2SEc">
<div class="purchaseRadio">
<input name="lock_on_container" type="radio" value="12.9" />
</div>
<p>Purchase 2 from UFirst Moving for $6.45/ea</p>
</div>
<div class="radio2SEc">
<div class="purchaseRadio">
<input name="lock_on_container" type="radio" value="0" />
</div>
<p>I will provide</p>
</div>
</div>
</div> 
<div class="suppliseArea">
<h3>EQUIPMENT RENTAL</h3>
<div class="itemSec">
<div class="itemTxtArea">Item </div>
<div class="priceArea">Price</div>
<div class="quantitySec2">Qty</div>
</div>
<div class="countingArea">
<div class="itemTxtArea"><p>HAND TRUCK -(RENTAL)</p></div>
<div class="priceArea"><p>$9.95</p></div>
<div class="quantitySec2">
<div class="quanBodr">
<input name="equ_one_qty" type="text" id="equ_one_q" onKeyDown="calculate('equ_one_q',9.95,'equ_one_t')"  onkeypress="calculate('equ_one_q',9.95,'equ_one_t')" onKeyUp="calculate('equ_one_q',9.95,'equ_one_t')" on  />
<input name="equ_one_total" type="hidden" id="equ_one_t" value="" />
</div>
</div>
</div>
<div class="itemcolorPrt">
<div class="itemTxtArea"><p>MOVING BLANKET -(RENTAL)</p></div>
<div class="priceArea"><p>$2.45</p></div>
<div class="quantitySec2"><div class="quanBodr">
<input name="equ_two_qty" type="text" id="equ_two_q" onKeyDown="calculate('equ_two_q',2.45,'equ_two_t')"  onkeypress="calculate('equ_two_q',2.45,'equ_two_t')" onKeyUp="calculate('equ_two_q',2.45,'equ_two_t')" on  />
<input name="equ_two_total" type="hidden" id="equ_two_t" value="" />
</div></div>
</div>
</div> 
<div class="countingArea">
<div class="itemTxtArea">&nbsp;</div>
<div class="priceArea"><p>Total:</p></div>
<div class="quantitySec2">
<div class="quanBodr">
<input name="" type="text" id="to" value=""  readonly="readonly" />
</div>
</div>
</div>
<div class="continueBtnArea">
<input type="hidden" value="<?php echo $_REQUEST['totalOfstep4']; ?>" name="totalOfstep4" />
<?php
if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'noThank_you'){
?>
<input type="hidden" name="step_4_no_of_movers_puh" value="0" />
<input type="hidden" name="step_4_estimated_hrs_puh" value="0" />
<input type="hidden" name="step_4_estimated_hrs_mh" value="0" />
<input type="hidden" name="step_4_no_of_movers_mh" value="0" />
<?php
}else{
?>
<input type="hidden" name="step_4_no_of_movers_puh" value="<?php echo $_REQUEST['step_4_no_of_movers_puh']; ?>" />
<input type="hidden" name="step_4_estimated_hrs_puh" value="<?php echo $_REQUEST['step_4_estimated_hrs_puh']; ?>" />
<input type="hidden" name="step_4_estimated_hrs_mh" value="<?php echo $_REQUEST['step_4_estimated_hrs_mh']; ?>" />
<input type="hidden" name="step_4_no_of_movers_mh" value="<?php echo $_REQUEST['step_4_no_of_movers_mh']; ?>" />
<?php
}
?>
<input type="hidden" name="step_3_trailors_place" value="<?php echo $_REQUEST['step_3_trailors_place']; ?>" />
<input type="hidden" name="step_2_product_code" value="<?php echo $_REQUEST['step_2_product_code']; ?>" />
<input type="hidden" name="step_2_product_qty" value="<?php echo $_REQUEST['step_2_product_qty']; ?>" />
<input type="hidden" name="step_2_product_price" value="<?php echo $_POST['step_2_product_price']*$_POST['step_2_product_qty']; ?>" />
<input type="hidden" name="date_to_move" value="<?php echo $_REQUEST['date_to_move']; ?>" />
<input type="hidden" name="name" value="<?php echo $_REQUEST['name']; ?>"  />
<input type="hidden" name="phone_no" value="<?php echo $_REQUEST['phone_no']; ?>"  />
<input type="hidden" name="email" value="<?php echo $_REQUEST['email']; ?>"  />
<input type="submit" value="Submit_val_5" name="submit" alt="Submit" class="submit">
</div>
</form>  
</div>
</div>
</div>
<?php include('includes/footer.php');
ob_end_flush();
?>