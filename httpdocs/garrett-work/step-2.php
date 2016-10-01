<?php 
include('includes/top.php'); 
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
<script type="text/javascript">
function getTrailerDetailTwo(q,p,id1,id2,id,textid){
var total	
if(q==0){
total  = p;
document.getElementById(id).required = false;
document.getElementById(textid).style.color='Black';
}else{
total  = q*p;
document.getElementById(id).required = true;
document.getElementById(textid).style.color='Red';
}
var data = total.toString().split(".");
document.getElementById(id1).innerHTML=data[0];
document.getElementById(id2).innerHTML='.'+data[1];
}
function validateForm(){
	
if ($("input[type=checkbox]:checked").length === 0) {
  alert('Please select quantity at least for one trailer');
  return false;
}	

if(document.getElementById('chk_1').checked){
var se_1 = document.getElementById("select_1");
var se_EXE = se_1.options[se_1.selectedIndex].value;
if(se_EXE <=0){
document.getElementById("text1").style.color='Red';
alert("Please select qty for selected trailer");
return false;
}
}

if(document.getElementById('chk_2').checked){
var se_1 = document.getElementById("select_2");
var se_EXE = se_1.options[se_1.selectedIndex].value;
if(se_EXE <=0){
document.getElementById("text2").style.color='Red';
alert("Please select qty for selected trailer");
return false;
}
}

if(document.getElementById('chk_3').checked){
var se_1 = document.getElementById("select_3");
var se_EXE = se_1.options[se_1.selectedIndex].value;
if(se_EXE <=0){
document.getElementById("text3").style.color='Red';
alert("Please select qty for selected trailer");
return false;
}
}

}
</script>
<body>
<?php include('includes/header.php'); ?>
<div class="stepSec">
<?php include('includes/sub_menu.php'); ?>
<div class="topMain">
<div class="continueArea">
<form action="step-3.php" name="myForm" method="post" onSubmit="return validateForm()">
<div class="roundArea2">
<div class="fastbxtopTxt">
<div class="twentyFootLft"><?php echo $get['trailer_one'].'&nbsp;'.'foot'; ?><br /><p>Trailer</p></div>
<div class="toprightPnl"><?php echo stripslashes($get['dimention_one']); ?><br /><p>Typically holds <?php echo $get['holder_one']; ?> rooms</p>
</div>
</div>
<div class="quantitySec">
<div class="quntmain">
<div class="qunttxt"><h4 id="text1">Quantity:</h4></div>
<div class="quntbrdr">
<select id="select_1"  class="jmpsec" name="step_2_product_qty_one"  onChange="getTrailerDetailTwo(this.value,<?php echo $get['price_one']; ?>,'sec1-one','sec1-two','chk_1','text100')">
<?php 
for($i=0;$i<4;$i++){
?>
<option <?php if(isset($_SESSION['pageOneData_one']) && $_SESSION['pageOneData_one']['step_2_product_code_one']==1 && $_SESSION['pageOneData_one']['step_2_product_qty_one']==$i){?> selected  <?php }?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="pricePrt">
<?php 
if(isset($_SESSION['pageOneData_one']) && $_SESSION['pageOneData_one']['step_2_product_code_one']==1){
$getPriceArryTwo = explode('.',$_SESSION['pageOneData_one']['step_2_product_price_one']);
}else{
$getPriceArryTwo = explode('.',$get['price_one']);
}
?>
<h4><p class="dollersign">$</p><b id="sec1-one"><?php echo $getPriceArryTwo[0]; ?></b><p id="sec1-two">.<?php echo $getPriceArryTwo[1]; ?></p></h4>
<div class="dailyRntal"><p>Daily Rental</p></div>
</div>
<div class="surcharge">
<span style="margin:0 0 0 -69px">+Surcharge</span>
<p style="margin:15px 0 0 0;">(<?php echo $get['serchanges_one']; ?> per mile)</p>
</div>
</div>
<div class="continueBtn">
<b style="margin-right:91px; margin-top:8px; float:right;"><strong id="text100">I need a <?php echo $get['trailer_one'].'&nbsp;'.'foot'; ?> trailer</strong></b>
<?php 
if(!empty($_SESSION['pageOneData_one']['step_2_product_qty_one'])){
?>	
<input type="checkbox" value="Yes" name="chk_1" alt="chk_1" id="chk_1" checked  style="margin:10px 0 0 0; cursor:pointer">
<?php }else{
?>	
<input type="checkbox" value="Yes" name="chk_1" alt="chk_1" id="chk_1"  style="margin:10px 0 0 0; cursor:pointer">
<?php } ?>
<input type="hidden" name="step_2_product_code_one" value="1"  />
<input type="hidden" name="step_2_product_price_one" value="<?php echo $get['price_one']; ?>"  />
</div>
</div>
<div class="roundArea2">
<div class="fastbxtopTxt">
<div class="twentyFootLft"><?php echo $get['trailer_two'].'&nbsp;'.'foot'; ?><br /><p>Trailer</p></div>
<div class="toprightPnl"><?php echo stripslashes($get['dimention_two']); ?><br /><p>Typically holds <?php echo $get['holder_two']; ?> rooms</p>
</div>
</div>
<div class="quantitySec">
<div class="quntmain">
<div class="qunttxt"><h4 id="text2">Quantity:</h4></div>
<div class="quntbrdr">
<select id="select_2"  class="jmpsec" name="step_2_product_qty_two" onChange="getTrailerDetailTwo(this.value,<?php echo $get['price_two']; ?>,'sec2-one','sec2-two','chk_2','text200')">
<?php 
for($i=0;$i<4;$i++){
?>
<option <?php if(isset($_SESSION['pageOneData_one']) && $_SESSION['pageOneData_one']['step_2_product_code_two']==2 && $_SESSION['pageOneData_one']['step_2_product_qty_two']==$i){?> selected  <?php }?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="pricePrt">
<?php 
if(isset($_SESSION['pageOneData_one']) && $_SESSION['pageOneData_one']['step_2_product_code_two']==2){
$getPriceArryTwo = explode('.',$_SESSION['pageOneData_one']['step_2_product_price_two']);
}else{
$getPriceArryTwo = explode('.',$get['price_two']);
}
?>
<h4><p class="dollersign">$</p><b id="sec2-one"><?php echo $getPriceArryTwo[0]; ?></b><p id="sec2-two">.<?php echo $getPriceArryTwo[1]; ?></p></h4>
<div class="dailyRntal"><p>Daily Rental</p></div>
</div>
<div class="surcharge">
<span style="margin:0 0 0 -69px">+Surcharge</span>
<p style="margin:15px 0 0 0;">(<?php echo $get['serchanges_two']; ?> per mile )</p>
</div>
</div>
<div class="continueBtn">
<b style="margin-right:91px; margin-top:8px; float:right;"><strong id="text200">I need a <?php echo $get['trailer_two'].'&nbsp;'.'foot'; ?> trailer</strong></b>
<?php 
if(!empty($_SESSION['pageOneData_one']['step_2_product_qty_two'])){
?>	
<input type="checkbox" value="Yes" name="chk_2" alt="chk_2" id="chk_2" checked style="margin:10px 0 0 0; cursor:pointer">
<?php }else{
?>	
<input type="checkbox" value="Yes" name="chk_2" alt="chk_2" id="chk_2" style="margin:10px 0 0 0; cursor:pointer">
<?php } ?>
<input type="hidden" name="step_2_product_code_two" value="2"  />
<input type="hidden" name="step_2_product_price_two" value="<?php echo $get['price_two']; ?>"  />
</div>
</div>



<?php /*?><div class="roundArea2">
<div class="fastbxtopTxt">
<div class="twentyFootLft"><?php echo $get['trailer_three'].'&nbsp;'.'foot';; ?><br /><p>Trailer</p></div>
<div class="toprightPnl"><?php echo stripslashes($get['dimention_three']); ?><br /><p>Typically holds <?php echo $get['holder_three']; ?> rooms</p>
</div>
</div>
<div class="quantitySec">
<div class="quntmain">
<div class="qunttxt"><h4 id="text3">Quantity:</h4></div>
<div class="quntbrdr">
<select  id="select_3" class="jmpsec" name="step_2_product_qty_three" onChange="getTrailerDetailTwo(this.value,<?php echo $get['price_three']; ?>,'sec3-one','sec3-two','chk_3','text300')">
<?php 
for($i=0;$i<4;$i++){
?>
<option <?php if(isset($_SESSION['pageOneData_one']) && $_SESSION['pageOneData_one']['step_2_product_code_three']==3 && $_SESSION['pageOneData_one']['step_2_product_qty_three']==$i){?> selected  <?php }?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="pricePrt">
<?php 
if(isset($_SESSION['pageOneData_one']) && $_SESSION['pageOneData_one']['step_2_product_code_three']==3){
$getPriceArryThree = explode('.',$_SESSION['pageOneData_one']['step_2_product_price_three']);
}else{
$getPriceArryThree = explode('.',$get['price_three']);
}
?>
<h4><p class="dollersign">$</p><b id="sec3-one"><?php echo $getPriceArryThree[0]; ?></b><p id="sec3-two">.<?php echo $getPriceArryThree[1]; ?></p></h4>
<div class="dailyRntal"><p>Daily Rental</p></div>
</div>
<div class="surcharge">
<span>+Surcharge</span>
<p>(<?php echo $get['serchanges_three']; ?> per mile from delivery </p>
</div>
</div>
<div class="continueBtn">
<b style="margin-right:91px; margin-top:8px; float:right;"><strong id="text300">I need that <?php echo $get['trailer_three'].'&nbsp;'.'foot'; ?> trailer</strong></b>
<?php 
if(!empty($_SESSION['pageOneData_one']['step_2_product_qty_three'])){
?>
<input type="checkbox" value="Yes" name="chk_3" alt="chk_3" id="chk_3" checked  style="margin:10px 0 0 0; cursor:pointer">
<?php }else{
?>
<input type="checkbox" value="Yes" name="chk_3" alt="chk_3" id="chk_3"  style="margin:10px 0 0 0; cursor:pointer">
<?php } ?>
<input type="hidden" name="step_2_product_code_three" value="3" />
<input type="hidden" name="step_2_product_price_three" value="<?php echo $get['price_three']; ?>"  />
</div>
</div><?php */?>
<input type="hidden" name="c_catagory" value="<?php echo $_SESSION['pageOneData']['c_catagory']; ?>" />
<input type="hidden" name="date_to_move" value="<?php echo $_SESSION['pageOneData']['date_to_move']; ?>" />
<input type="hidden" name="name" value="<?php echo $_SESSION['pageOneData']['name']; ?>"  />
<input type="hidden" name="phone_no" value="<?php echo $_SESSION['pageOneData']['phone_no']; ?>"  />
<input type="hidden" name="email" value="<?php echo $_SESSION['pageOneData']['email']; ?>"  />
<input type="submit" value="Submit_val_2" name="submit" alt="Submit" class="submit" style="float:right;margin-top:118px;" >
</form>
<p style="margin-top:10px;"><strong><?php echo $adminData['slogan']; ?></strong></p>
</div>
</div>
</div>
<?php /*?><div class="continueBtn">
<input type="hidden" name="step_2_product_code" value="1"  />
<input type="hidden" name="step_2_product_price" value="<?php echo $get['price_one']; ?>"  />
<input type="hidden" name="c_catagory" value="<?php echo $_SESSION['pageOneData']['c_catagory']; ?>" />
<input type="hidden" name="date_to_move" value="<?php echo $_SESSION['pageOneData']['date_to_move']; ?>" />
<input type="hidden" name="name" value="<?php echo $_SESSION['pageOneData']['name']; ?>"  />
<input type="hidden" name="phone_no" value="<?php echo $_SESSION['pageOneData']['phone_no']; ?>"  />
<input type="hidden" name="email" value="<?php echo $_SESSION['pageOneData']['email']; ?>"  />
<input type="submit" value="Submit_val_2" name="submit" alt="Submit" class="submit">
</div><?php */?>
<?php /*?><div class="continueBtn">
<input type="hidden" name="step_2_product_code" value="2" id="qtyTwo" />
<input type="hidden" name="step_2_product_price" value="<?php echo $get['price_two']; ?>"  />
<input type="hidden" name="c_catagory" value="<?php echo $_SESSION['pageOneData']['c_catagory']; ?>" />
<input type="hidden" name="date_to_move" value="<?php echo $_SESSION['pageOneData']['date_to_move']; ?>" />
<input type="hidden" name="name" value="<?php echo $_SESSION['pageOneData']['name']; ?>"  />
<input type="hidden" name="phone_no" value="<?php echo $_SESSION['pageOneData']['phone_no']; ?>"  />
<input type="hidden" name="email" value="<?php echo $_SESSION['pageOneData']['email']; ?>"  />
<input type="submit" value="Submit_val_2" name="submit" alt="Submit" class="submit">
</div><?php */?>
<?php /*?><div class="continueBtn">
<input type="hidden" name="step_2_product_code" value="3" />
<input type="hidden" name="step_2_product_price" value="<?php echo $get['price_three']; ?>"  />
<input type="hidden" name="c_catagory" value="<?php echo $_SESSION['pageOneData']['c_catagory']; ?>" />
<input type="hidden" name="date_to_move" value="<?php echo $_SESSION['pageOneData']['date_to_move']; ?>" />
<input type="hidden" name="name" value="<?php echo $_SESSION['pageOneData']['name']; ?>"  />
<input type="hidden" name="phone_no" value="<?php echo $_SESSION['pageOneData']['phone_no']; ?>"  />
<input type="hidden" name="email" value="<?php echo $_SESSION['pageOneData']['email']; ?>"  />
</div><?php */?>
<?php include('includes/footer.php'); 
ob_end_flush();
?>