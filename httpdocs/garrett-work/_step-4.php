<?php include('includes/top.php'); ?>
<script type="text/javascript">
function calculateData(e){
var amount = document.getElementById('h1').value;
var jamp1Val = document.getElementById("jmp1");
var jmpval = jamp1Val.options[jamp1Val.selectedIndex].value;
var total  = e*jmpval*amount;
document.getElementById('h3').value=total;
total = Math.round(total* 100)/ 100;
document.getElementById('t1').innerHTML='$'+total;	
grandToatl()
}
function calculateDataTwo(e){
var amount = document.getElementById('h2').value;
var jamp1Val = document.getElementById("jmp2");
var jmpval = jamp1Val.options[jamp1Val.selectedIndex].value;
var total  = e*jmpval*amount;
document.getElementById('h4').value=total;
total = Math.round(total* 100)/ 100;
document.getElementById('t2').innerHTML='$'+total;	
grandToatl()
}
function grandToatl(){
var t1 = document.getElementById('h3').value;
var t2 = document.getElementById('h4').value;
var subTotal;
if(t1 !=""){
var tt1 = parseInt(t1);	
subTotal = tt1;
}if(t2 !=""){
var tt2 = parseInt(t2);
subTotal = tt2;
}if(t1 !="" && t2 !=""){
var tt1 = parseInt(t1);
var tt2 = parseInt(t2);
subTotal= tt1+tt2;
}
var total = Math.round(subTotal* 100)/ 100;
document.getElementById('gt').innerHTML=total+'.00';
document.getElementById('tottal').value=total;	
}
function check(){
var checkBoxVal_1 = document.getElementById("one").checked ; 
var checkBoxVal_2 = document.getElementById("two").checked ; 
if(checkBoxVal_1 == false && checkBoxVal_2 == false){
alert("Please Check At Least One Item To Continue");	
return false;
}
}
function visableOne(e){
if(e > 0){
$(".visableOne").show();
}else{
$(".visableOne").hide();
}	
}
function visableTwo(e){
if(e > 0){
$(".visableTwo").show();
}else{
$(".visableTwo").hide();
}	
}
</script>
<body>
<?php include('includes/header.php'); ?>
<div class="stepSec">
<?php include('includes/sub_menu.php'); ?>
<div class="topMain">
<div class="continueArea">
<form action="step-5.php" method="post" >
<div class="step4Bg1">
<div class="estimateArea">
<div class="noOfMovers">
<div class="moverstxt1"><p>No. of Movers</p></div>
<div class="moversdrop">
<select class="moversjmp" name="step_4_no_of_movers_mh" id="jmp1" onChange="visableOne(this.value)" >
<option value="">0</option>
<?php 
for($i=1;$i<11;$i++){
?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="noOfMovers">
<div class="moverstxt1"><p>Estimated Hrs.</p></div>
<div class="moversdrop">
<select class="moversjmp" name="step_4_estimated_hrs_mh" onChange="calculateData(this.value)">
<option value="">0</option>
<?php 
for($i=1;$i<13;$i++){
?>
<option class="visableOne" style="display:none" value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="totalAmount">
<p>$<?php echo $getPUM['movers_rate']; ?> An hour per Movers</p>
<h5>Total <b id="t1">$0</b></h5>
</div>
</div>
<!--<p style="margin-top:30px;"><input name="helpAgreeOne" type="checkbox" value="mh" style="cursor:pointer" id="one" /> I Need moving helper assitance</p>-->
</div>
<div class="step4Bg2">
<div class="estimateArea">
<div class="noOfMovers">
<div class="moverstxt1"><p>No. of Movers</p></div>
<div class="moversdrop">
<select class="moversjmp" name="step_4_no_of_movers_puh" id="jmp2" onChange="visableTwo(this.value)">
<option value="">0</option>
<?php 
for($i=1;$i<11;$i++){
?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="noOfMovers">
<div class="moverstxt1"><p>Estimated Hrs.</p></div>
<div class="moversdrop">
<select class="moversjmp" name="step_4_estimated_hrs_puh" onChange="calculateDataTwo(this.value)">
<?php 
for($i=0;$i<13;$i++){
?>
<option class="visableTwo" style="display:none" value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="totalAmount">
<p>$<?php echo $getPUM['pack_unpack_rate']; ?> An hour per Movers</p>
<h5>Total <b id="t2">$0</b></h5>
</div>
</div>
<!--<p style="margin-top:30px;"><input name="helpAgreeTwo" type="checkbox" value="puh" style="cursor:pointer" id="two"/> I need help of packing and unpacking.</p>-->
</div>
<div class="continueBtn2" style="margin: 104px 0 0 50px">
<strong style="margin-top:-38px; float:left; text-align:center; font:bold 18px/30px Verdana, Geneva, sans-serif;">Grand Total: $ <b id="gt"></b></strong>

<input type="hidden" value="" name="totalOfstep4" id="tottal" />
<input type="hidden" value="" name="" id="h3" />
<input type="hidden" value="" name="" id="h4" />
<input type="hidden" value="<?php echo $getPUM['movers_rate']; ?>" name="hwOne" id="h1" />
<input type="hidden" value="<?php echo $getPUM['pack_unpack_rate']; ?>" name="hwTwo" id="h2" />

<input type="hidden" name="step_3_trailors_place" value="<?php echo $_REQUEST['step_3_trailors_place']; ?>" />
<input type="hidden" name="step_2_product_code" value="<?php echo $_REQUEST['step_2_product_code']; ?>" />
<input type="hidden" name="step_2_product_qty" value="<?php echo $_REQUEST['step_2_product_qty']; ?>" />
<input type="hidden" name="step_2_product_price" value="<?php echo $_POST['step_2_product_price']*$_POST['step_2_product_qty']; ?>" />
<input type="hidden" name="date_to_move" value="<?php echo $_REQUEST['date_to_move']; ?>" />
<input type="hidden" name="name" value="<?php echo $_REQUEST['name']; ?>"  />
<input type="hidden" name="phone_no" value="<?php echo $_REQUEST['phone_no']; ?>"  />
<input type="hidden" name="email" value="<?php echo $_REQUEST['email']; ?>"  />
<input type="submit" value="Submit_val_4" name="submit" alt="Submit" class="submit">
<br>
<br>
<input type="submit" value="noThank_you" name="submit" alt="Submit" class="submit2">
</div>
</form>
</div>
</div>
</div>
<?php include('includes/footer.php'); 
ob_end_flush();
?>

