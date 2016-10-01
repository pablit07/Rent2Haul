<?php 
include('includes/top.php'); 
$page = $gf->getPageContent(2);
?>
<body>
<?php include('includes/header.php'); ?>
<div id="contentPnl">
<div class="topMain">
<div class="topmainSub">
<div id="aboutRight" class="col-md-6" style="float:left !important;">
<h2>Moving FAQ</h2>
<b><?php echo $page['pages_heading'];?></b>
<?php echo $page['pages_content'];?>
</div>
<div class="customersquotLft col-md-4">
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
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>