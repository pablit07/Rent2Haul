<?php include('includes/top.php'); ?>
<?php $page = $gf->getPageContent(22);
$page_title = $gf->getMetaContent(22);
 ?>
<?php include('includes/header.php'); ?>
<script src="js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.lightbox-0.5.pack.js"></script>
	<link rel="stylesheet" href="css/jquery.lightbox-0.5.css" />
<script>	
	$(function() {
		$('.gallery a').lightBox({
			fixedNavigation:true,
			imageLoading: 'http://wmtt.com/images/lightbox-ico-loading.gif',
			imageBtnClose: 'http://wmtt.com/images/lightbox-btn-close.gif',
			imageBtnPrev: 'http://wmtt.com/images/lightbox-btn-prev.gif',
			imageBtnNext: 'http://wmtt.com/images/lightbox-btn-next.gif'
			});
	});

</script>
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
<div class="invMain">
<h2>  <a class="sublNk" href="<?php echo SITE_URL ;?>">Welcome to Freedom Trailers!</a> / <a class="sublNk" href="inventory.php">Inventory</a> / <a class="sublNk" href="enclosed-car-trailers.php">Enclose Car Trailers</a> / <?php echo stripslashes($page_title['meta_page_title']);?>  </h2>
<?php echo $page['pages_content']; ?>
<br clear="all" />
</div>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
