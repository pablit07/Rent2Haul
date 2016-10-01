<?php include('includes/top.php'); ?>
<?php $page = $gf->getPageContent(6);
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
<h2><?php echo $page_title['meta_page_title'];?></h2>
<?php echo $page['pages_content']; ?>
<br clear="all" />
</div>
</div>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
