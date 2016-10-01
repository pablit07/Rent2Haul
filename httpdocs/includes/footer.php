<div id="footerSec">
<div class="footerMain">
<div class="footerlinks">
<div class="impLinArea">
<h2>IMPORTANTS LINK</h2>
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="about-us.php">About Us</a></li>
<li><a href="service.php">Services</a></li>
<li><a href="faq.php">Moving FAQ'S</a></li>
<li><a href="ltl_frieght.php">LTL Freight</a></li>
<!--<li><a href="#">Moving Labor </a></li>
<li><a href="#">Packing / Un packing </a></li>
<li><a href="#">Moving Supplies </a></li>-->
<li class="hidden-xs"><a href="reviews.php">Customer Reviews</a></li>
<li><a href="contact-us.php">Contact Us</a></li>
</ul>
</div>
<div class="impLinArea">
<h2>FOLLOW US ON Twitter</h2>
<div class="feedBg">
<p>Thank you @RENT2HAUL! You responded to my tweet, and the man who helped me was friendly, information & really took time to listen.
<br />Thank you!
</p>
<span>Cris.Albarto</span>
</div>
<div class="feedBg">
<p>Thank you @RENT2HAUL! You responded to my tweet, and the man who helped me was friendly, information & really took time to listen.
<br />Thank you!
</p>
<span>Cris.Albarto</span>
</div>
</div>
<div class="impLinArea">
<h2>RECENT REVIEWS</h2>
<?php
$sqlReview = "SELECT * FROM ".TBL_REVIEW." WHERE status=0 ORDER BY RAND() DESC LIMIT 0,2";
$getExe = $db->selectData($sqlReview);
while($getRows = $db->getRow($getExe)){
?>
<div class="comments1Prt">
<h5><?php echo date('Y-M-d',strtotime($getRows['date'])); ?></h5>
<p><?php echo $getRows['comments']; ?></p>
</div>
<?php
}
?>
</div>
<div class="impLinArea">
<h2>CONNECT WITH US</h2>
<a href="<?php echo($adminData['facebook']); ?>" target="_blank"><img src="image/fBook.png" width="36" height="35" alt="Face Book" /> </a>
<a href="<?php echo($adminData['twitter']); ?>" target="_blank"><img src="image/twitter.png" width="36" height="35" alt="Face Book" /> </a>
<a href="<?php echo($adminData['linkedin']); ?>" target="_blank"><img src="image/in.png" width="36" height="35" alt="Face Book" /> </a>
<a href="<?php echo($adminData['rss']); ?>" target="_blank"><img src="image/rss.png" width="36" height="35" alt="Face Book" /> </a>
<div class="mapPrt">
<iframe width="300" scrolling="no" height="220" frameborder="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Denver,+CO&amp;aq=0&amp;oq=denver&amp;sll=38.997934,-105.550567&amp;sspn=5.190325,10.821533&amp;ie=UTF8&amp;hq=&amp;hnear=Denver,+Colorado&amp;t=m&amp;ll=39.737818,-104.985352&amp;spn=0.316809,0.411987&amp;z=10&amp;iwloc=A&amp;output=embed" marginwidth="0" marginheight="0"></iframe>
</div>
</div>
</div>
</div>
</div>
<div class="copyRightSec">
<div class="copyrightMain">
<?php echo stripcslashes($adminData['copyright']); ?>
</div>
</div>
<?php
if((isset($message) && $message!='') || (isset($_GET['message']) && $_GET['message']!=''))
{
	if(isset($_GET['message']) && $_GET['message']!='')
	{
		$msg = $_GET['message'];
	}
	if(isset($message) && $message!='')
	{
		$msg = $message;
	}
	$split_message = explode(':',$msg);
	if($split_message[0] == "Success")
	{
?>
<script type="text/javascript">
	$(function() {
	 $.notifyBar({ cls: "success", html: "<?php echo($split_message[1])?>", delay: 2000, animationSpeed: "slow" });
	});
</script>
<?php
	}
	if($split_message[0] == "Error")
	{
?>
<script type="text/javascript">
$(function() {
	 $.notifyBar({ cls: "error", html: "<?php echo($split_message[1])?>", delay: 2000, animationSpeed: "slow" });
	});
</script>
<?php
	}
}
?>
</body>
</html>