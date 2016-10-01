<?php 
if(!empty($_SESSION['pageOneData_one'])){
$linkOne =  'href="step-3.php"';
}
if(!empty($_SESSION['pageOneData_two'])){
$linkTwo =  'href="step-4.php"';
}
if(!empty($_SESSION['pageOneData_three'])){
$linkThree =  'href="step-5.php"';
}
if(!empty($_SESSION['pageOneData_four'])){
$linkFour =  'href="step-6.php"';
}
?>
<div class="stepBg hidden-xs hidden-sm">
<div class="topMain">
<div class="topmainSub">
<div class="quotemenu">
<a href="index.php"><img src="image/tickMrk.png" width="25" height="22" alt="tick" /><br />Start Quote</a>
</div>
<div class="stepMenuArea">
<ul>
<li><a href="step-2.php" <?php if($getpagename == 'step-2.php'){?> class="current" <?php }?>>STEP 2<br /><p>Trailer Rental</p></a></li>
<li><a <?php echo $linkOne; ?> <?php if($getpagename == 'step-3.php'){?> class="current" <?php }?>>STEP 3<br /><p>Trailer Delivery </p></a></li>
<?php /*?><li><a <?php echo $linkTwo; ?> <?php if($getpagename == 'step-4.php'){?> class="current" <?php }?>>STEP 4<br /><p>Moving Help</p></a></li><?php */?>
<li><a <?php echo $linkThree; ?> <?php if($getpagename == 'step-5.php'){?> class="current" <?php }?>>STEP 4<br /><p>Accessories &amp; Protection</p></a></li>
<li><a <?php echo $linkFour; ?> <?php if($getpagename == 'step-6.php'){?> class="current" <?php }?>>STEP 5<br /><p>Complete Reservation</p></a></li>
<li><a <?php if($getpagename == 'confirm-page.php'){?> class="current" <?php }?>>STEP 6<br /><p>Confirmation</p></a></li>
</ul>
</div>
</div>
</div>
</div>

<div class="col-md-12 visible-xs visible-sm" style="text-align:center;">
<h2>
<?php 
if($getpagename == 'step-2.php'){echo("Step 2 of 6 - Trailer Rental");}
if($getpagename == 'step-3.php'){echo("Step 3 of 6 - Trailer Delivery");}
if($getpagename == 'step-5.php'){echo("Step 4 of 6 - Accessories and Protection");}
if($getpagename == 'step-6.php'){echo("Step 5 of 6 - Complete Reservation");}
if($getpagename == 'confirm-page.php'){echo("Step 6 of 6 - Confirmation");}

?>
</h2>
</div>

</div>

