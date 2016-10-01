<?php include('includes/top-dev.php'); ?>
<?php 
$move->deleteOddEntry(); 
$page = $gf->getPageContent(88);
?>
<body>
<?php include('includes/header-dev.php'); ?>
<?php include('includes/banner-dev.php'); ?>
<div id="contentPnl">
<div class="topMain">
<div class="topmainSub">
<div class="customersquotLft">
<h2>CUSTOMER'S<span> REVIEW </span></h2>
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
<div class="welcomeArea">
<h3>WELCOME <span>TO UFIRST MOVING-</span> CALL US FOR A <br />FREE QUOTE <?php echo $adminData['phone']; ?></h3>
<?php echo $page['pages_content'];?>
</div>
</div>
</div>
</div>
<script src="videos/control.js"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<div id="video" style="position:fixed;bottom:0px;right:0px;z-index:10000000">
<object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="280" height="370">
<param name="movie" value="videos/2.swf" />
<param name="quality" value="high" />
<param name="wmode" value="transparent" />
<param name="swfversion" value="8.0.35.0" />
<!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don't want users to see the prompt. -->
<param name="expressinstall" value="Scripts/expressInstall.swf" />
<!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
<!--[if !IE]>-->
<object type="application/x-shockwave-flash" data="videos/2.swf" width="280" height="370">
<!--<![endif]-->
<param name="quality" value="high" />
<param name="wmode" value="transparent" />
<param name="swfversion" value="8.0.35.0" />
<param name="expressinstall" value="Scripts/expressInstall.swf" />
<!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
<div>
<h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
<p><a href="http://www.adobe.com/go/getflashplayer">
<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" />
</a></p>
</div>
<!--[if !IE]>-->
</object>
<!--<![endif]-->
</object>
</div>
<?php include('includes/footer-dev.php'); ?>
