<?php include('includes/top.php'); ?>
<?php $page = $gf->getPageContent(4); ?>
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
<p>The date you've chosen for delivery of your trailer:
<br /><b>Trailer</b> #1: <b><?php echo $_REQUEST['date']; ?></b> &nbsp;</p>
<p><span>When you no longer need the moving trailer feel free to Schedule pick up by calling up</span></p>
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
<div class="radioselect1"><input name="step_3_trailors_place" type="radio" value="Private Driveway" checked="checked" /></div>
<p>Private Driveway</p>
</div>
<div class="radiofstprt">
<div class="radioselect1"><input name="step_3_trailors_place" type="radio" value="Yard/Vacant Lot/Jobsite" /></div>
<p>Yard/Vacant Lot/Jobsite</p>
</div>
<div class="radiofstprt">
<div class="radioselect1"><input name="step_3_trailors_place" type="radio" value="Parking Lot" /></div>
<p>Parking Lot</p>
</div>
<div class="radiofstprt">
<div class="radioselect1"><input name="step_3_trailors_place" type="radio" value="Street/Alley" /></div>
<p>Street/Alley</p>
</div>
</div>
<div class="recuiretmentArea">
<h5>Delivery Requirements &amp; Regulations</h5>
<p>Please carefully read and accept delivery requirements below:</p>
<div class="scrollarea">
<?php echo $page['pages_content'];?>
</div>
<div class="acceptSec">
<span>*</span>
<div class="selectboxsec">
<input type="hidden" name="totalAmount" value="<?php echo $_REQUEST['totalAmount']; ?>" id="totalAmount" />
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" />
<input name="iagree" type="checkbox" value="1" required style="cursor:pointer" />
</div>
<p>I have read and accept the above requirements</p>
</div>
</div>
<div class="continueBtn2">
<input type="hidden" name="step_2_product_code" value="<?php echo $_REQUEST['step_2_product_code']; ?>" />
<input type="hidden" name="step_2_product_qty" value="<?php echo $_REQUEST['step_2_product_qty']; ?>" />
<input type="hidden" name="step_2_product_price" value="<?php echo $_POST['step_2_product_price']*$_POST['step_2_product_qty']; ?>" />
<input type="hidden" name="date_to_move" value="<?php echo $_REQUEST['date_to_move']; ?>" />
<input type="hidden" name="name" value="<?php echo $_REQUEST['name']; ?>"  />
<input type="hidden" name="phone_no" value="<?php echo $_REQUEST['phone_no']; ?>"  />
<input type="hidden" name="email" value="<?php echo $_REQUEST['email']; ?>"  />
<input type="submit" value="Submit_val_3" name="submit" alt="Submit" class="submit">
</div>
</div>
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
