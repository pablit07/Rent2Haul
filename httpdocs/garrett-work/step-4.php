<?php include('includes/top.php'); ?>
<?php
if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'Submit_val_3'){
//unset($_SESSION['pageOneData_three']);	
if(!isset($_SESSION['pageOneData_two'])){
$arry = array(
	"step_3_trailors_place" => $_REQUEST['step_3_trailors_place'],
	"iagree" => $_REQUEST['iagree'],
);
$_SESSION['pageOneData_two'] = $arry;
}else{
$_SESSION['pageOneData_two']['step_3_trailors_place'] = $_REQUEST['step_3_trailors_place'];
$_SESSION['pageOneData_two']['iagree'] = $_REQUEST['iagree'];
}
}
?>
<?php
if(!isset($_REQUEST['submit']) && $_REQUEST['submit'] != 'Submit_val_3' && empty($_SESSION['pageOneData_two'])){
?>
<script type="text/javascript">
//alert("Please Submit The Form First"); 
document.location.href='step-3.php';
</script>
<?php
}
?>
<script type="text/javascript">
function calculateData(e){
var amount = document.getElementById('h1').value;
var jamp1Val = document.getElementById("jmp1");
var jmpval = jamp1Val.options[jamp1Val.selectedIndex].value;
var total  = e*jmpval*amount;
document.getElementById('h3').value=total;
total = Math.round(total* 100)/ 100;
document.getElementById('t1').innerHTML='$'+total;	
//grandToatl(total,0);

//AJAX
var hr = new XMLHttpRequest();
var url = "ajax_sum.php";
var valOne = document.getElementById("h3").value;
var paraOne = 1;
var vars = "value="+valOne+"&paraOne="+paraOne;
hr.open("POST", url, true);
hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
hr.onreadystatechange = function() {
if(hr.readyState == 4 && hr.status == 200) {
var return_data = hr.responseText;
document.getElementById("gt").innerHTML = return_data;
document.getElementById('tottal').value= return_data;	
}
}
hr.send(vars); 
}
/*---------------------------------------------------------------------------------------*/
function calculateDataTwo(e){
var amount = document.getElementById('h2').value;
var jamp1Val = document.getElementById("jmp2");
var jmpval = jamp1Val.options[jamp1Val.selectedIndex].value;
var total  = e*jmpval*amount;
document.getElementById('h4').value=total;
total = Math.round(total* 100)/ 100;
document.getElementById('t2').innerHTML='$'+total;	
//grandToatl(total,0);

//AJAX
var hr = new XMLHttpRequest();
var url = "ajax_sum.php";
var valOne = document.getElementById("h4").value;
var paraOne = 2;
var vars = "value="+valOne+"&paraOne="+paraOne;
hr.open("POST", url, true);
hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
hr.onreadystatechange = function() {
if(hr.readyState == 4 && hr.status == 200) {
var return_data = hr.responseText;
document.getElementById("gt").innerHTML = return_data;
document.getElementById('tottal').value= return_data;	
}
}
hr.send(vars); 
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
document.getElementById('t1').innerHTML='$'+0;
document.getElementById('gt').innerHTML=0;
document.getElementById('h3').value=0;
$("#dd1 option:first").attr("selected", true);
}	
}
function visableTwo(e){
if(e > 0){
$(".visableTwo").show();
}else{
$(".visableTwo").hide();
document.getElementById('t2').innerHTML='$'+0;
document.getElementById('gt').innerHTML=0;
document.getElementById('h4').value=0;
$("#dd2 option:first").attr("selected", true);
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
<option value="<?php echo $i; ?>" <?php if(isset($_SESSION['pageOneData_three']['step_4_no_of_movers_mh']) && $_SESSION['pageOneData_three']['step_4_no_of_movers_mh']==$i){?> selected  <?php }?> ><?php echo $i; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="noOfMovers">
<div class="moverstxt1"><p>Estimated Hrs.</p></div>
<div class="moversdrop">
<select class="moversjmp" name="step_4_estimated_hrs_mh" onChange="calculateData(this.value)" id="dd1">
<option value="">0</option>
<?php 
for($i=1;$i<13;$i++){
?>
<option class="visableOne" style="display:none" <?php if(isset($_SESSION['pageOneData_three']['step_4_estimated_hrs_mh']) && $_SESSION['pageOneData_three']['step_4_estimated_hrs_mh']==$i){?> selected  <?php }?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="totalAmount">
<p>$<?php echo $getPUM['movers_rate']; ?> An hour per Movers</p>
<?php
if(isset($_SESSION['pageOneData_three']['toatlOfMovers'])){
?>
<h5>Total <b id="t1">$<?php echo $_SESSION['pageOneData_three']['toatlOfMovers']; ?> </b></h5>
<?php
}else{
?>
<h5>Total <b id="t1">$0</b></h5>
<?php
}
?>
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
<option value="<?php echo $i; ?>" <?php if(isset($_SESSION['pageOneData_three']['step_4_no_of_movers_puh']) && $_SESSION['pageOneData_three']['step_4_no_of_movers_puh']==$i){?> selected  <?php }?>><?php echo $i; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="noOfMovers">
<div class="moverstxt1"><p>Estimated Hrs.</p></div>
<div class="moversdrop">
<select class="moversjmp" name="step_4_estimated_hrs_puh" onChange="calculateDataTwo(this.value)" id="dd2">
<?php 
for($i=0;$i<13;$i++){
?>
<option class="visableTwo" style="display:none" <?php if(isset($_SESSION['pageOneData_three']['step_4_estimated_hrs_puh']) && $_SESSION['pageOneData_three']['step_4_estimated_hrs_puh']==$i){?> selected  <?php }?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="totalAmount">
<p>$<?php echo $getPUM['pack_unpack_rate']; ?> An hour per Movers</p>
<?php
if(isset($_SESSION['pageOneData_three']['toatlOfPAndU'])){
?>
<h5>Total <b id="t2">$<?php echo $_SESSION['pageOneData_three']['toatlOfPAndU']; ?></b></h5>
<?php
}else{
?>
<h5>Total <b id="t2">$0</b></h5>
<?php
}
?>

</div>
</div>
<!--<p style="margin-top:30px;"><input name="helpAgreeTwo" type="checkbox" value="puh" style="cursor:pointer" id="two"/> I need help of packing and unpacking.</p>-->
</div>
<div class="continueBtn2" style="margin: 104px 0 0 50px">
<?php if(isset($_SESSION['pageOneData_three']['totalOfstep4'])){ ?>
<strong style="margin-top:-38px; float:left; text-align:center; font:bold 18px/30px Verdana, Geneva, sans-serif;">Grand Total: $<b id="gt"><?php echo $_SESSION['pageOneData_three']['totalOfstep4']; ?></b></strong>
<?php 
}else{
?>
<strong style="margin-top:-38px; float:left; text-align:center; font:bold 18px/30px Verdana, Geneva, sans-serif;">Grand Total: $<b id="gt"></b></strong>
<?php
}
?>

<input type="hidden" value="" name="" id="h3" />
<input type="hidden" value="" name="" id="h4" />
<input type="hidden" value="<?php echo $getPUM['movers_rate']; ?>" name="hwOne" id="h1" />
<input type="hidden" value="<?php echo $getPUM['pack_unpack_rate']; ?>" name="hwTwo" id="h2" />

<?php if(isset($_SESSION['pageOneData_three']['totalOfstep4'])){ ?>
<input type="hidden" value="<?php echo $_SESSION['pageOneData_three']['totalOfstep4']; ?>" name="totalOfstep4" id="tottal" />
<?php 
}else{
?>
<input type="hidden" value="" name="totalOfstep4" id="tottal" />
<?php
}
?>



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

