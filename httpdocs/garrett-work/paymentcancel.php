<?php
include_once("configure.php");
unset($_SESSION['theMainid']);
header("refresh:5;url=" . SITE_URL . "index.php");
?>
<?php include('includes/top.php'); ?>
<body>
<?php include('includes/header.php'); ?>
<div id="contentPnl">
<div class="topMain">
<div class="topmainSub">
<div id="aboutRight" style="width:100%;">
<h2 style="color: indianred; text-align: center; background: none;">Sorry !! order could not be placed successfully.</h2>
</div>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>


