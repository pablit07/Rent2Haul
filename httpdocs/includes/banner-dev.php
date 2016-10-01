<div id="bannerSec">
<div class="topMain">
<div class="bannerMainSec">
<div class="leftPnlAds">
<img src="image/leftAds.jpg" width="176" height="399" alt="ads" style="margin-bottom:10px;" />
<div class="angiesList">
<table style="width: 250px; background-color: white; color: black;" cellpadding="0" cellspacing="0">
<tr>
<td><a href="http://www.angieslist.com/AngiesList/Review/8191285"><img src="http://www.angieslist.com/webbadge/PurlImage.ashx?bid=e816885753eab7c7b0b4852c2b5cd5be" alt="Read Unbiased Consumer Reviews Online at AngiesList.com" width="180" border="0" /></a></td>
</tr>
<!--<tr>
<td style="color: black; font-family: arial, sans-serif; font-size: 12px;"><a href="http://www.angieslist.com/AngiesList/Review/8191285" style="color: #006699;text-decoration: none;">angieslist.com/review/8191285</a></td>
</tr>-->
</table>
<div id="yelp-biz-badge-rrc-bAjeaMbvFJZef6r_EFWvtQ" style="margin-top:8px"><a href="http://www.yelp.com/biz/ufirst-moving-golden-2">Check out Ufirst Moving on Yelp</a></div><script type="text/javascript">(function(d, t) {var g = d.createElement(t);var s = d.getElementsByTagName(t)[0];g.id = "yelp-biz-badge-script-rrc-bAjeaMbvFJZef6r_EFWvtQ";g.src = "//dyn.yelpcdn.com/biz_badge_js/rrc/bAjeaMbvFJZef6r_EFWvtQ.js";s.parentNode.insertBefore(g, s);}(document, 'script'));</script>
</div>
</div>
<div class="bannerPnl">
<div id="slides">
<div class="slides_container">
<?php
$no=1;
$sqlBanner = "SELECT * FROM ".TBL_BANNER." WHERE status=1";
$getExe = $db->selectData($sqlBanner);
while($getRows = $db->getRow($getExe)){
?>
<div class="slide">
<a href="#url"><img src="image/banner/<?php echo $getRows['banner_pic_name']; ?>"  alt="Slide <?php echo $no; ?>" /></a>
<div class="caption" style="bottom:0">
<h3>1000's Movers Annually! 100's Of Reputable Employees!</h3>
<p>"Absolutely amazing company and concept! A company that does it all for the price | named!" Vicki B.Tulsa, OK</p>
</div>
</div>
<?php
$no++;
}
?>
<!--<div class="slide">
<a href="#url"><img src="image/banner.jpg" alt="Slide 1"></a>
<div class="caption" style="bottom:0">
<h3>1000's Movers Annually! 100's Of Reputable Employees!</h3>
<p>"Absolutely amazing company and concept!
<br />A company that does it all for the price | named!" Vicki B.Tulsa, OK
</p>
</div>
</div>

<div class="slide">
<a href="#url"><img src="image/u-first-banner2.jpg" alt="Slide 2"></a>
<div class="caption">
<h3>1000's Movers Annually! 100's Of Reputable Employees!</h3>
<p>"Absolutely amazing company and concept!
<br />A company that does it all for the price | named!" Vicki B.Tulsa, OK
</p>
</div>
</div>

<div class="slide">
<a href="#url"><img src="image/u-first-banner3.jpg" alt="Slide 2"></a>
<div class="caption">
<h3>1000's Movers Annually! 100's Of Reputable Employees!</h3>
<p>"Absolutely amazing company and concept!
<br />A company that does it all for the price | named!" Vicki B.Tulsa, OK
</p>
</div>
</div>

<div class="slide">
<a href="#url"><img src="image/u-first-banner4.jpg" alt="Slide 2"></a>
<div class="caption">
<h3>1000's Movers Annually! 100's Of Reputable Employees!</h3>
<p>"Absolutely amazing company and concept!
<br />A company that does it all for the price | named!" Vicki B.Tulsa, OK
</p>
</div>
</div>

<div class="slide">
<a href="#url"><img src="image/u-first-banner5.jpg" alt="Slide 2"></a>
<div class="caption">
<h3>1000's Movers Annually! 100's Of Reputable Employees!</h3>
<p>"Absolutely amazing company and concept!
<br />A company that does it all for the price | named!" Vicki B.Tulsa, OK
</p>
</div>
</div>-->

</div>
</div>
</div>
<div class="rightcontctPnl">
<h4>Get a Quote</h4>
<div class="mainFrmPrt">
<form action="step-2-dev.php?flag=true" method="post" name="quickQuots" id="quickQuots">
<div class="whtCatPrt">
<h3>What Category Fites You Best
<!--<img src="image/btn_question.png" width="15" height="15" alt="images" /> -->
</h3>
<div class="residential">
<div class="radio1"><inpid1ut name="c_catagory" type="radio" value="0" required <?php if($_SESSION['pageOneData']['c_catagory']==0){?> checked="checked"  <?php } ?> /></div>
<p>Residential</p>
</div>
<div class="busGovt">
<div class="radio1"><input name="c_catagory" type="radio" value="1" required <?php if($_SESSION['pageOneData']['c_catagory']==1){?> checked="checked"  <?php } ?> /></div>
<p>Business/Government</p>
</div>
</div>
</div>
<div class="mainFrmPrt">
<div class="whtCatPrt">
<h3>I need my trailer delivered</h3>
<div class="calenderPrt">
<div class="calOn"><p>On:</p></div>
<div class="calInptSec"><input name="date_to_move" type="text" id="blog9" <?php if(isset($_SESSION['pageOneData'])){?> value="<?php echo $_SESSION['pageOneData']['date_to_move'];?>" <?php }else{?> placeholder="<?php echo "Date To Move" ?>" <?php }?> /></div>
<!--<div class="calendrBrdr"><img src="image/calender.jpg" width="21" height="19" alt="calender" /></div>-->
</div>
<div class="fieldNmeSec"><input name="name" type="text"  <?php if(isset($_SESSION['pageOneData'])){?> value="<?php echo $_SESSION['pageOneData']['name'];?>" <?php }else{?> placeholder="<?php echo "Name" ?>" <?php }?>   required /></div>
<div class="fieldNmeSec"><input name="phone_no" type="text"  <?php if(isset($_SESSION['pageOneData'])){?> value="<?php echo $_SESSION['pageOneData']['phone_no'];?>" <?php }else{?> placeholder="<?php echo "phone No" ?>" <?php }?>  required/></div>
<div class="fieldNmeSec"><input name="email" type="email"  <?php if(isset($_SESSION['pageOneData'])){?> value="<?php echo $_SESSION['pageOneData']['email'];?>" <?php }else{?> placeholder="<?php echo "Email" ?>" <?php }?> required /></div>
<?php /*?><div class="fieldNmeSec" style="width:121px; float:none; clear:both;"><input name="from_zipcode" type="text" placeholder="From Zip Code" required /></div>
<?php */?>
<?php /*?><div class="fieldNmeSec" style="width:121px; float:none;"><input name="to_zipcode" type="text" placeholder="To Zip Code" required /></div>
<?php */?>
<?php /*?><h3>Moving to this address</h3>
<div class="fieldNmeSec"><input name="address1" id="autocomplete" type="text" placeholder="Address One"  /></div>
<div class="fieldNmeSec"><input name="address2" id="autocompleteTwo" placeholder="Address Two"  /></div>
</div><?php */?>
<div class="goArea"><input class="goBg" name="quots" type="submit" value="GO"/></div>
<?php 
unset($_SESSION['pageOneData']);
unset($_SESSION['pageOneData_one']);
unset($_SESSION['pageOneData_two']);	
unset($_SESSION['pageOneData_three']);	
unset($_SESSION['pageOneData_four']);
unset($_SESSION['CAL_INSERT_ID']);
session_destroy();	
?>
</form>
</div>
</div>
</div>
</div>
</div>id2id3