<?php include('includes/top.php'); ?>
<?php 
$page = $gf->getPageContent(6);
$page_title = $gf->getMetaContent(6);
?>
<?php include('includes/header.php'); ?>
<div id="contentPnl">
<div class="topMain">
<div class="topmainSub">
<div class="customersquotLft">
<h2>CUSTOMERS'<span>REVIEW</span></h2>
<ul id="ticker_02">
<?php
$sqlReview = "SELECT * FROM ".TBL_REVIEW." WHERE status=0";
$getExe = $db->selectData($sqlReview);
while($getRows = $db->getRow($getExe)){
?>
<li>
<div class="customersFeedSec">
<p><?php echo $getRows['comments']; ?></p>
<span>By <?php echo $getRows['name']; ?> from <?php echo $getRows['city']; ?> On <?php echo date('d-M-Y',strtotime($getRows['date'])); ?></span>
</div>
</li>
<?php
}
?>
</ul>
</div>
<div id="aboutRight">
<div class="invMain">
<div class="frmRgt">
<h2>Trailer Delivery</h2>
<div class="yordetmain">
<h4>Your Details</h4>
<div class="frmMain">
<form action="conform.php" method="post">
<div class="namePrtfrm">
<div class="namecont"><p>Name:</p></div>
<div class="nmefrm"><input name="name" type="text" required/></div>
</div>
<div class="namePrtfrm">
<div class="namecont"><p>Adress:</p></div>
<div class="nmefrm"><input name="address" type="text" required/></div>
</div>
<div class="namePrtfrm">
<div class="namecont"><p>Phone No:</p></div>
<div class="nmefrm"><input name="phone" type="text" required/></div>
</div>
<div class="namePrtfrm">
<div class="namecont"><p>From:</p></div>
<div class="nmefrm3">
<select class="selectdegn" name="from_country" required>
<option value="">Select Location</option> 
<option value="32024">Lake City, Florida location</option>
<option value="46514">Elkhart, Indian location</option>
</select>
</div>
</div>
<div class="namePrtfrm">
<div class="namecont"><p>To (zip):</p></div>
<div class="nmefrm2"><input name="to_country" id="to_country" type="text" required /></div>
</div>
<div class="sbmtFrm"><input class="sbmtBg" name="trailer_contact" type="submit" value="Submit" /></div>
</form>
</div>
</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
