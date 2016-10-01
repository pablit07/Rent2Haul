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
<div class="stepBg">
<div class="topMain">
<div class="topmainSub">
<div class="quotemenu">
<a href="index.php"><img src="image/tickMrk.png" width="25" height="22" alt="tick" /><br />Start Quote</a>
</div>
<div class="stepMenuArea">
<ul>
<li><a href="step-2.php" <?php if($getpagename == 'step-2.php'){?> class="current" <?php }?>>STEP 2<br /><p>Trailer Rental</p></a></li>
<li><a <?php echo $linkOne; ?> <?php if($getpagename == 'step-3.php'){?> class="current" <?php }?>>STEP 3<br /><p>Trailer Delevery </p></a></li>
<li><a <?php echo $linkTwo; ?> <?php if($getpagename == 'step-4.php'){?> class="current" <?php }?>>STEP 4<br /><p>Moving Help</p></a></li>
<li><a <?php echo $linkThree; ?> <?php if($getpagename == 'step-5.php'){?> class="current" <?php }?>>STEP 5<br /><p>Accessories &amp; Protection</p></a></li>
<li><a <?php echo $linkFour; ?> <?php if($getpagename == 'step-6.php'){?> class="current" <?php }?>>STEP 6<br /><p>Complete Reservation</p></a></li>
</ul>
</div>
</div>
</div>
</div>

