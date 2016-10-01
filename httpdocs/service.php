<?php include('includes/top.php'); ?>
<body>
<?php include('includes/header.php'); ?>
<?php $page = $gf->getPageContent(3); ?>
<div id="contentPnl">
<div class="topMain">
<!--service-->
<div class="serviceMainPnl">
<h4><?php echo $page['pages_heading'];?></h4>
<?php echo $page['pages_content'];?>
</div>
<!--end-->
</div>
</div>
<?php include('includes/footer.php'); ?>