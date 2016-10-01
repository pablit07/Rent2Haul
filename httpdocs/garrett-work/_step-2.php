<?php include('includes/top.php'); ?>
<script type="text/javascript">
function getTrailerDetailTwo(q,p,id1,id2){
var total  = q*p;
var data = total.toString().split(".");
document.getElementById(id1).innerHTML=data[0];
document.getElementById(id2).innerHTML='.'+data[1];
}
function validateForm(){
var x=document.forms["myForm"]["step_2_product_qty"].value;
if (x==null || x=="")
  {
  alert("Please Select Atlest One Quantity");
  return false;
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
<div class="qunttxt"><h4>Quantity:</h4></div>
<div class="quntbrdr">
<select  class="jmpsec" name="step_2_product_qty" onChange="getTrailerDetailTwo(this.value,<?php echo $get['price_one']; ?>,'sec1-one','sec1-two')">
<?php 
for($i=1;$i<4;$i++){
?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="pricePrt">
<?php $getPriceArryTwo = explode('.',$get['price_one']);//print_r($getPriceArryTwo);?>
<h4><p class="dollersign">$</p><b id="sec1-one"><?php echo $getPriceArryTwo[0]; ?></b><p id="sec1-two">.<?php echo $getPriceArryTwo[1]; ?></p></h4>
<div class="dailyRntal"><p>Daily Rental</p></div>
</div>
<div class="surcharge">
<span>+Surcharge</span>
<p>(<?php echo $get['serchanges_one']; ?> per mile from delivery </p>
</div>
</div>
<div class="continueBtn">
<input type="hidden" name="step_2_product_code" value="1" />
<input type="hidden" name="step_2_product_price" value="<?php echo $get['price_one']; ?>"  />
<input type="hidden" name="date_to_move" value="<?php echo $_REQUEST['date_to_move']; ?>" />
<input type="hidden" name="name" value="<?php echo $_REQUEST['name']; ?>"  />
<input type="hidden" name="phone_no" value="<?php echo $_REQUEST['phone_no']; ?>"  />
<input type="hidden" name="email" value="<?php echo $_REQUEST['email']; ?>"  />
<input type="submit" value="Submit_val_2" name="submit" alt="Submit" class="submit">
</div>
</div>
</form>
<form action="step-3.php" name="myForm" method="post" onSubmit="return validateForm()">
<div class="roundArea2">
<div class="fastbxtopTxt">
<div class="twentyFootLft"><?php echo $get['trailer_two'].'&nbsp;'.'foot'; ?><br /><p>Trailer</p></div>
<div class="toprightPnl"><?php echo stripslashes($get['dimention_two']); ?><br /><p>Typically holds <?php echo $get['holder_two']; ?> rooms</p>
</div>
</div>
<div class="quantitySec">
<div class="quntmain">
<div class="qunttxt"><h4>Quantity:</h4></div>
<div class="quntbrdr">
<select  class="jmpsec" name="step_2_product_qty" onChange="getTrailerDetailTwo(this.value,<?php echo $get['price_two']; ?>,'sec2-one','sec2-two')">
<?php 
for($i=1;$i<4;$i++){
?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="pricePrt">
<?php $getPriceArryTwo = explode('.',$get['price_two']);//print_r($getPriceArryTwo);?>
<h4><p class="dollersign">$</p><b id="sec2-one"><?php echo $getPriceArryTwo[0]; ?></b><p id="sec2-two">.<?php echo $getPriceArryTwo[1]; ?></p></h4>
<div class="dailyRntal"><p>Daily Rental</p></div>
</div>
<div class="surcharge">
<span>+Surcharge</span>
<p>(<?php echo $get['serchanges_two']; ?> per mile from delivery </p>
</div>
</div>
<div class="continueBtn">
<input type="hidden" name="step_2_product_code" value="2" />
<input type="hidden" name="step_2_product_price" value="<?php echo $get['price_two']; ?>"  />
<input type="hidden" name="date_to_move" value="<?php echo $_REQUEST['date_to_move']; ?>" />
<input type="hidden" name="name" value="<?php echo $_REQUEST['name']; ?>"  />
<input type="hidden" name="phone_no" value="<?php echo $_REQUEST['phone_no']; ?>"  />
<input type="hidden" name="email" value="<?php echo $_REQUEST['email']; ?>"  />
<input type="submit" value="Submit_val_2" name="submit" alt="Submit" class="submit">
</div>
</div>
</form>
<form action="step-3.php" name="myForm" method="post" onSubmit="return validateForm()">
<div class="roundArea2">
<div class="fastbxtopTxt">
<div class="twentyFootLft"><?php echo $get['trailer_three'].'&nbsp;'.'foot';; ?><br /><p>Trailer</p></div>
<div class="toprightPnl"><?php echo stripslashes($get['dimention_three']); ?><br /><p>Typically holds <?php echo $get['holder_three']; ?> rooms</p>
</div>
</div>
<div class="quantitySec">
<div class="quntmain">
<div class="qunttxt"><h4>Quantity:</h4></div>
<div class="quntbrdr">
<select  class="jmpsec" name="step_2_product_qty" onChange="getTrailerDetailTwo(this.value,<?php echo $get['price_three']; ?>,'sec3-one','sec3-two')">
<?php 
for($i=1;$i<4;$i++){
?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="pricePrt">
<?php $getPriceArryThree = explode('.',$get['price_three']); ?>
<h4><p class="dollersign">$</p><b id="sec3-one"><?php echo $getPriceArryThree[0]; ?></b><p id="sec3-two">.<?php echo $getPriceArryThree[1]; ?></p></h4>
<div class="dailyRntal"><p>Daily Rental</p></div>
</div>
<div class="surcharge">
<span>+Surcharge</span>
<p>(<?php echo $get['serchanges_three']; ?> per mile from delivery </p>
</div>
</div>
<div class="continueBtn">
<input type="hidden" name="step_2_product_code" value="3" />
<input type="hidden" name="step_2_product_price" value="<?php echo $get['price_three']; ?>"  />
<input type="hidden" name="date_to_move" value="<?php echo $_REQUEST['date_to_move']; ?>" />
<input type="hidden" name="name" value="<?php echo $_REQUEST['name']; ?>"  />
<input type="hidden" name="phone_no" value="<?php echo $_REQUEST['phone_no']; ?>"  />
<input type="hidden" name="email" value="<?php echo $_REQUEST['email']; ?>"  />
<input type="submit" value="Submit_val_2" name="submit" alt="Submit" class="submit">
</div>
</div>
</form>
<p><strong><?php echo $adminData['slogan']; ?></strong></p>
</div>
</div>
</div>
<?php include('includes/footer.php'); 
ob_end_flush();
?>