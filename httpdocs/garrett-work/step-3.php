<?php include('includes/top.php'); ?>
<?php
if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'Submit_val_2'){
//unset($_SESSION['pageOneData_one']);	
if(!isset($_SESSION['pageOneData_one'])){
$arry = array(
	"step_2_product_code_one" => $_REQUEST['step_2_product_code_one'],
	"step_2_product_qty_one"  => $_REQUEST['step_2_product_qty_one'],
	"step_2_product_price_one" => $_REQUEST['step_2_product_price_one']*$_REQUEST['step_2_product_qty_one'],
	"step_2_product_code_two" => $_REQUEST['step_2_product_code_two'],
	"step_2_product_qty_two"  => $_REQUEST['step_2_product_qty_two'],
	"step_2_product_price_two" => $_REQUEST['step_2_product_price_two']*$_REQUEST['step_2_product_qty_two'],
	"step_2_product_code_three" => $_REQUEST['step_2_product_code_three'],
	"step_2_product_qty_three"  => $_REQUEST['step_2_product_qty_three'],
	"step_2_product_price_three" => $_REQUEST['step_2_product_price_three']*$_REQUEST['step_2_product_qty_three']
);
$_SESSION['pageOneData_one'] = $arry;
}else{
$_SESSION['pageOneData_one']['step_2_product_code_one'] = $_REQUEST['step_2_product_code_one'];
$_SESSION['pageOneData_one']['step_2_product_qty_one'] = $_REQUEST['step_2_product_qty_one'];
$_SESSION['pageOneData_one']['step_2_product_price_one'] = $_REQUEST['step_2_product_price_one']*$_REQUEST['step_2_product_qty_one'];	

$_SESSION['pageOneData_one']['step_2_product_code_two'] = $_REQUEST['step_2_product_code_two'];
$_SESSION['pageOneData_one']['step_2_product_qty_two'] = $_REQUEST['step_2_product_qty_two'];
$_SESSION['pageOneData_one']['step_2_product_price_two'] = $_REQUEST['step_2_product_price_two']*$_REQUEST['step_2_product_qty_two'];	

$_SESSION['pageOneData_one']['step_2_product_code_three'] = $_REQUEST['step_2_product_code_three'];
$_SESSION['pageOneData_one']['step_2_product_qty_three'] = $_REQUEST['step_2_product_qty_three'];
$_SESSION['pageOneData_one']['step_2_product_price_three'] = $_REQUEST['step_2_product_price_three']*$_REQUEST['step_2_product_qty_three'];	
}
}
?>
<?php
if(!isset($_REQUEST['submit']) && $_REQUEST['submit'] != 'Submit_val_2' && empty($_SESSION['pageOneData_one'])){
?>
<script type="text/javascript">
//alert("Please Submit The Form First"); 
document.location.href='step-2.php';
</script>
<?php
}
?>
<body>
<?php include('includes/header.php'); ?>
<div class="stepSec">
<?php include('includes/sub_menu.php'); ?>
<div class="topMain">
<div class="continueArea">
<div class="step3LftPrt">
<div class="reservationSec">
<h4>RESERVATION DELIVERY DETAILS</h4>
<p>We deliver right to your door, you lock your trailer and keep the only key.</p>
<div class="tailorsDEl">
<h5>TRAILER DELIVERY DATE</h5>
<p>The date you've chosen for delivery of your trailer: <b><?php echo date('m-d-Y',strtotime($_SESSION['pageOneData']['date_to_move'])); ?></b>
<br /><b>Trailer</b> #1:  &nbsp;</p>
<p><span>When you no longer need the moving trailer feel free to schedule pick up by calling us</span></p>
</div>
<div class="trailorsPay">
<h2>Trailer Placement At Your Location</h2>
<p>UFirst Moving is designed around your schedule, pack and more importantly unpack at your own pace.
<br /><b>Trailer</b> Placement
<br /><b>Trailer  #1:</b>
</p>
</div>
<form action="step-4.php" name="" method="post">
<div class="radioArea">
<h4>*Where would you like the trailer Placed?
<!--<img src="image/btn_question.png" width="15" height="15" />-->
</h4>
<div class="radioprt">
<div class="radiofstprt">
<div class="radioselect1"><input name="step_3_trailors_place" type="radio" value="Private Driveway" <?php if($_SESSION['pageOneData_two']['step_3_trailors_place']=='Private Driveway'){?> checked="checked"  <?php } ?> required /></div>
<p>Private Driveway</p>
</div>
<div class="radiofstprt">
<div class="radioselect1"><input name="step_3_trailors_place" type="radio" value="Yard/Vacant Lot/Jobsite" <?php if($_SESSION['pageOneData_two']['step_3_trailors_place']=='Yard/Vacant Lot/Jobsite'){?> checked="checked"  <?php } ?> required /></div>
<p>Yard/Vacant Lot/Jobsite</p>
</div>
<div class="radiofstprt">
<div class="radioselect1"><input name="step_3_trailors_place" type="radio" value="Parking Lot" <?php if($_SESSION['pageOneData_two']['step_3_trailors_place']=='Parking Lot'){?> checked="checked"  <?php } ?> required /></div>
<p>Parking Lot</p>
</div>
<div class="radiofstprt">
<div class="radioselect1"><input name="step_3_trailors_place" type="radio" value="Street/Alley" <?php if($_SESSION['pageOneData_two']['step_3_trailors_place']=='Street/Alley'){?> checked="checked"  <?php } ?> required /></div>
<p>Street/Alley</p>
</div>
</div>
<div class="recuiretmentArea">
<h5>Delivery Requirements &amp; Regulations</h5>
<p>Please carefully read and accept delivery requirements below:</p>
<div class="scrollarea">
<?php echo $adminData['d_rules_regularation'];?>
</div>
<div class="acceptSec">
<span>*</span>
<div class="selectboxsec">
<input name="iagree" type="checkbox" value="1" required <?php if($_SESSION['pageOneData_two']['iagree']==1){?> checked="checked"  <?php } ?> style="cursor:pointer" />
</div>
<p>I have read and accept the above requirements</p>
</div>
</div>
<div class="continueBtn2">
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
<input type="submit" value="Submit_val_3" name="submit" alt="Submit" class="submit">
</div>
</div>
<?php //unset($_SESSION['pageOneData_two']); ?>
</form>
</div>
</div>
<div class="step3RightPrt">
<img src="image/moving-banner.jpg" width="294" height="350" alt="banner" /> 
</div>
</div>
</div>
</div>
<?php include('includes/footer.php');
ob_end_flush();
?>
