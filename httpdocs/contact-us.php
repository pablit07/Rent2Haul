<?php include('includes/top.php'); ?>
<body>
<?php include('includes/header.php'); ?>
<div id="contentPnl">
<div class="topMain">
<div class="topmainSub">
<!--contact-->
<div id="contactLft">
<div class="contactLftMain">
<h2>CONTACT <span>INFO</span></h2>
<div class="contactMapSec">
<iframe width="423" scrolling="no" height="241" frameborder="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Denver,+CO&amp;aq=0&amp;oq=denver&amp;sll=38.997934,-105.550567&amp;sspn=5.190325,10.821533&amp;ie=UTF8&amp;hq=&amp;hnear=Denver,+Colorado&amp;t=m&amp;ll=39.737818,-104.985352&amp;spn=0.316809,0.411987&amp;z=10&amp;iwloc=A&amp;output=embed" marginwidth="0" marginheight="0"></iframe>
</div>
<div class="callusBg"><p>Call to schedule an free estimate. <?php echo $adminData['phone']; ?></p></div>
</div>
</div>
<div id="contactFrmArea">
<h2>CONTACT <span>FORM</span></h2>
<div class="rightContactPnl">
<form action="" method="post">
<div class="nameArea"><input name="name" type="text" value="Name:" required/></div>
<div class="emailPrt"><input name="email" type="text" value="E-mail:" required/></div>
<div class="phonePrt"><input name="phone" type="text" value="Phone:" required/></div>
<div class="messagePrt"><textarea name="message" cols="" rows="">Message:</textarea></div>
<div class="submitBGPrt"><input class="submitColorBtn" name="contactUs" type="submit" value="Submit" /></div>
</form>
</div>
</div>
<!--end-->
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
