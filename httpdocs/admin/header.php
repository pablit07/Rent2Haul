<link href="responsiveslides.css" rel="stylesheet" type="text/css" />
<script src="js/responsiveslides.min.js" type="text/javascript"></script>
<script class="secret-source">
jQuery(document).ready(function($) {
// Slideshow 1
$("#slider1").responsiveSlides({
maxwidth: 631,
speed: 800
});

});
</script>
<div class="headerbg">
<div class="toppan">
<ul class="rslides" id="slider1">
<li><a href="<?php print SITE_URL?>"><img src="images/finpro_big-1.png" width="1090" height="140" alt="ADMIN PANEL" title="ADMIN PANEL" /></a></li>
</ul>
</div>
</div>
<div class="navbg">
<div class="commonholder">
<div class="navpan">
<p class="toptxt3"><?PHP print ADMIN_TITLE?></p>
<?php if(basename($_SERVER['PHP_SELF'])!="index.php"){?>
<ul class="rightLink">
<li><a href="../index.php" target="_blank">View Site</a> |</li>
<li><a href="settings.php">Settings</a> |</li>
<li><a href="changePassword.php">Change Password</a> |</li>
<li><a href="logout.php">Log out</a></li>
</ul>
<?php } ?>
</div>
</div>
</div>
