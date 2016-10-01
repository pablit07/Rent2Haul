<?php 
include('includes/top.php'); 
if (isset($_REQUEST['quots']) && $_REQUEST['quots'] == 'GO') {
	if (!isset($_SESSION['pageOneData'])) {
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
	} else {
		$_SESSION['pageOneData']['name'] = $_REQUEST['name'];
		$_SESSION['pageOneData']['email'] = $_REQUEST['email'];
		$_SESSION['pageOneData']['phone_no'] = $_REQUEST['phone_no'];
		$_SESSION['pageOneData']['c_catagory'] = $_REQUEST['c_catagory'];
		$_SESSION['pageOneData']['date_to_move'] = $_REQUEST['date_to_move'];
	}
}
?>
<?php
if (!isset($_REQUEST['quots']) && $_REQUEST['quots'] != 'GO' && empty($_SESSION['pageOneData'])) {
	echo '<script type="text/javascript">alert("Please Submit The Form First");</script>';
}
?>
<script type="text/javascript">

function AddTrailerTotal(price_1, price_2)
{
	var sel_1_truck = document.getElementById("select_1_truck");
	var qty1_truck = sel_1_truck.options[sel_1_truck.selectedIndex].value;	
	
	var sel_1 = document.getElementById("select_1");
	var qty1 = sel_1.options[sel_1.selectedIndex].value;

	var sel_2 = document.getElementById("select_2");
	var qty2 = sel_2.options[sel_2.selectedIndex].value;
	
	var sel_1_expedite = document.getElementById("expedited-service");
	var qty1_expedite = sel_1_expedite.options[sel_1_expedite.selectedIndex].value;	
						
	var total = (price_1*qty1) + (price_2*qty2) + (price_1*qty1_truck) + (price_1*qty1_expedite);
	document.getElementById('trailertotal').innerHTML='$'+total;
}

function getTrailerDetailTwo(q,p,id1,id2,id,textid) {
	var total;
	if (q==0) {
		total  = p;
	} else {
		total  = q*p;
	}
	var data = total.toString().split(".");
	document.getElementById(id1).innerHTML=data[0];
	document.getElementById(id2).innerHTML='.'+data[1];
}

function getTrailerDetailTwoTruck(q,p,id1,id2,id,textid) {
	var total;
	if (q==0) {
		total  = p;
	} else {
		total  = q*p;
	}
	var data = total.toString().split(".");
	document.getElementById(id1).innerHTML=data[0];
	document.getElementById(id2).innerHTML='.'+data[1];
}


function validateForm() {
	var se_1 = document.getElementById("select_1");
	var se_2 = document.getElementById("select_2");
	var se_1_truck = document.getElementById("select_1_truck");
	var se1_EXE = se_1.options[se_1.selectedIndex].value;
	var se2_EXE = se_2.options[se_2.selectedIndex].value;
	var se1_truck_EXE = se_1.options[se_1_truck.selectedIndex].value;

	if (se1_EXE <=0 && se2_EXE <= 0 && se1_truck_EXE <=0) {
		alert("Please select qty for at least one trailer");
		return false;
	}

	return true;
}

</script>
<body onLoad="AddTrailerTotal(<?php echo $get['price_one']; ?>,<?php echo $get['price_two']; ?>);">
<?php include('includes/header.php'); ?>
<div class="stepSec">
<?php include('includes/sub_menu.php'); ?>
<div class="topMain">
<div class="continueArea row">
<form action="step-3.php" name="myForm" method="post" onSubmit="return validateForm()">

<!-- begin truck area -->
<div class="col-md-1 hidden-xs" style="min-height:200px;"></div>
<div class="roundArea2truck col-md-3 pull-left">
<div class="fastbxtopTxt">
<div class="twentyFootLft">Pickup<br /><p><small>For Immediate Simple Deliveries </small></p></div>
<div class="toprightPnl">
</div>
</div>
<div class="quantitySec">
<div class="quntmain">
<div class="qunttxt"><h4 id="text1">Quantity:</h4></div>
<div class="quntbrdr">
<select id="select_1_truck" class="jmpsec" name="step_2_product_qty_truck"  onChange="getTrailerDetailTwoTruck(this.value,<?php echo $get['price_one']; ?>,'sec1-one-truck','sec1-two-truck','chk_1','text100'); AddTrailerTotal(<?php echo $get['price_one']; ?>,<?php echo $get['price_two']; ?>);">
<?php 
for($i=0;$i<2;$i++){
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
<h4><p class="dollersign">$</p><b id="sec1-one-truck"><?php echo $getPriceArryTwo[0]; ?></b><p id="sec1-two-truck">.<?php echo $getPriceArryTwo[1]; ?></p></h4>
<div class="dailyRntal"><p>Daily Rental</p></div>
</div>
<div class="surcharge">
<span style="margin:0 0 0 -69px">+Surcharge</span>
<p style="margin:15px 0 0 0;">($<?php echo $get['serchanges_one']; ?> per mile)</p>
</div>
</div>
<div class="continueBtn">
<!-- <b style="margin-right:91px; margin-top:8px; float:right;"><strong id="text100">I need a <?php echo $get['trailer_one'].'&nbsp;'.'foot'; ?> trailer</strong></b> -->
<?php 
if (!empty($_SESSION['pageOneData_one']['step_2_product_qty_one'])) {
?>	
<!-- <input type="checkbox" value="Yes" name="chk_1" alt="chk_1" id="chk_1" checked  style="margin:10px 0 0 0; cursor:pointer"> -->
<?php } else {
?>	
<!-- <input type="checkbox" value="Yes" name="chk_1" alt="chk_1" id="chk_1"  style="margin:10px 0 0 0; cursor:pointer"> -->
<?php } ?>
<input type="hidden" name="step_2_product_code_one" value="1"  />
<input type="hidden" name="step_2_product_price_one" value="<?php echo $get['price_one']; ?>"  />
</div>
</div>

<!-- end truck area -->


<div class="roundArea2 col-md-3 pull-left">
<div class="fastbxtopTxt">
<div class="twentyFootLft"><?php echo $get['trailer_one'].'&nbsp;'.'foot'; ?><br /><p>Trailer<small> -24 hour rental</small></p></div>
<div class="toprightPnl"><?php echo stripslashes($get['dimention_one']); ?><br /><p>Typically holds <?php echo $get['holder_one']; ?> rooms</p>
</div>
</div>
<div class="quantitySec">
<div class="quntmain">
<div class="qunttxt"><h4 id="text1">Quantity:</h4></div>
<div class="quntbrdr">
<select id="select_1" class="jmpsec" name="step_2_product_qty_one"  onChange="getTrailerDetailTwo(this.value,<?php echo $get['price_one']; ?>,'sec1-one','sec1-two','chk_1','text100'); AddTrailerTotal(<?php echo $get['price_one']; ?>,<?php echo $get['price_two']; ?>);">
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
<p style="margin:15px 0 0 0;">($<?php echo $get['serchanges_one']; ?> per mile)</p>
</div>
</div>
<div class="continueBtn">
<!-- <b style="margin-right:91px; margin-top:8px; float:right;"><strong id="text100">I need a <?php echo $get['trailer_one'].'&nbsp;'.'foot'; ?> trailer</strong></b> -->
<?php 
if (!empty($_SESSION['pageOneData_one']['step_2_product_qty_one'])) {
?>	
<!-- <input type="checkbox" value="Yes" name="chk_1" alt="chk_1" id="chk_1" checked  style="margin:10px 0 0 0; cursor:pointer"> -->
<?php } else {
?>	
<!-- <input type="checkbox" value="Yes" name="chk_1" alt="chk_1" id="chk_1"  style="margin:10px 0 0 0; cursor:pointer"> -->
<?php } ?>
<input type="hidden" name="step_2_product_code_one" value="1"  />
<input type="hidden" name="step_2_product_price_one" value="<?php echo $get['price_one']; ?>"  />
</div>
</div>
<div class="roundArea2 col-md-3 pull-left">
<div class="fastbxtopTxt">
<div class="twentyFootLft"><?php echo $get['trailer_two'].'&nbsp;'.'foot'; ?><br /><p>Trailer<small> -24 hour rental</small></p></div>
<div class="toprightPnl"><?php echo stripslashes($get['dimention_two']); ?><br /><p>Typically holds <?php echo $get['holder_two']; ?> rooms</p>
</div>
</div>
<div class="quantitySec">
<div class="quntmain">
<div class="qunttxt"><h4 id="text2">Quantity:</h4></div>
<div class="quntbrdr">
<select id="select_2"  class="jmpsec" name="step_2_product_qty_two" onChange="getTrailerDetailTwo(this.value,<?php echo $get['price_two']; ?>,'sec2-one','sec2-two','chk_2','text200'); AddTrailerTotal(<?php echo $get['price_one']; ?>,<?php echo $get['price_two']; ?>);">
<?php 
for($i=0;$i<4;$i++) {
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
<p style="margin:15px 0 0 0;">($<?php echo $get['serchanges_two']; ?> per mile )</p>
</div>
</div>
<div class="continueBtn">
<!-- <b style="margin-right:91px; margin-top:8px; float:right;"><strong id="text200">I need a <?php echo $get['trailer_two'].'&nbsp;'.'foot'; ?> trailer</strong></b> -->
<?php 
if(!empty($_SESSION['pageOneData_one']['step_2_product_qty_two'])){
?>	
<!-- <input type="checkbox" value="Yes" name="chk_2" alt="chk_2" id="chk_2" checked style="margin:10px 0 0 0; cursor:pointer"> -->
<?php }else{
?>	
<!-- <input type="checkbox" value="Yes" name="chk_2" alt="chk_2" id="chk_2" style="margin:10px 0 0 0; cursor:pointer"> -->
<?php } ?>
<input type="hidden" name="step_2_product_code_two" value="2"  />
<input type="hidden" name="step_2_product_price_two" value="<?php echo $get['price_two']; ?>"  />
</div>
</div>
<div style="float:left;margin-left:20px;width:98%;" class="reservationDetails">
<h2>EXPEDITED SERVICE OPTION</h2>
</div>
<div class="col-md-12">
<div class="col-md-8" style="margin-top:5px;margin-bottom:15px;"><strong style="font-size:1.2em;">Need expedited service with a trailer?  We'll deliver a trailer immediately and have the driver wait while you load and unload.</strong></div>
<div class="col-md-4" style="margin-top:5px;margin-bottom:15px;"><strong style="font-size:1.2em;">$24.99 Per Hour </strong><select name="expedited-service" id="expedited-service" onChange="AddTrailerTotal(<?php echo $get['price_one']; ?>,<?php echo $get['price_two']; ?>);">
<?php for($i=0;$i<5;$i++){?>
<option value="<?php echo($i); ?>"><?php echo($i); ?> hours</option>
<?php } ?>
</select></div>
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
<select  id="select_3" class="jmpsec" name="step_2_product_qty_three" onChange="getTrailerDetailTwo(this.value,<?php echo $get['prisec3-one','sec3-two','chk_3','text300')">
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


<div style="float:right;margin-left:20px;" class="reservationDetails">
<h2>CHARGES UPON INITIAL DELIVERY</h2>
<div class="delRow1">
<h5>Trailer rental <br />Cost Total
<p class="contTop" id="trailertotal">$0.00</p>
</h5>
</div>										

<input type="submit" value="Submit_val_2" name="submit" alt="Submit" class="submit" style="float:right;" >

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