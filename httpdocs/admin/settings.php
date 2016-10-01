<?php 
ob_start();
include_once("../configure.php");
include_once("top.php");
if($_POST['Submit']){
if(empty($_POST['id'])){
$db->insertDataArray(TBL_SETTINGS,$_POST);
header('location:settings.php?msg=update');
}else{		
$db->updateArray(TBL_SETTINGS,$_POST,"id=1");
header('location:settings.php?msg=update');
}
}
$sql = "SELECT * FROM ".TBL_SETTINGS." WHERE id=1";
$res = $db->selectData($sql);
$fet = $db->getRow($res); 
?>
<script>
function trim(str){
return str.replace(/^\s+|\s+$/g, "");
}
function newsValidation(){
var emailregex=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
if(!emailregex.test(trim(document.getElementById("paypal_mail").value))){
	alert("Enter Paypal mail properly");
	document.frm.paypal_mail.focus();
	document.frm.paypal_mail.value=document.getElementById("paypal_mail").value;
	return false;
}
var emailregex=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
if(!emailregex.test(trim(document.getElementById("wholesale_email").value))){
	alert("Enter Wholesale email properly");
	document.frm.wholesale_email.focus();
	document.frm.wholesale_email.value=document.getElementById("wholesale_email").value;
	return false;
}
var emailregex=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
if(!emailregex.test(trim(document.getElementById("site_email").value))){
	alert("Enter Site email properly");
	document.frm.site_email.focus();
	document.frm.site_email.value=document.getElementById("site_email").value;
	return false;
}	
}
</script>
<div class="maincont" id="mainPan">
<div class="parentcontainer">
<?php include_once("header.php"); ?>
<div class="workpanel">
<?php include_once("left.php"); ?>
<div class="rightpanel">
<form method="post" name="frm" id="frm" action="<?php print $_SERVER['PHP_SELF']?>" onsubmit="return newsValidation();">
<input type="hidden"  name="id"  id="id" value="<?php print $fet['id']?>" />
<p class="greentxt2">Settings</p>
<p class="red" id="msgDivId">
<?php if(isset($_REQUEST['msg'])){if($_REQUEST['msg']=='update')print 'Updated successfully.';if($_REQUEST['msg']=='del')print 'Deleted successfully.';if($_REQUEST['msg']=='added')print 'Added successfully.';}else{print $msg;} ?>
</p>
<div class="formblkSection">
<div class="infosection3">
<div align="center">
<dl>
<dt>Paypal email:&nbsp </dt>
<dd>
<input name="paypal_mail" type="text" class="infoinpt7" id="paypal_mail" value="<?php print $fet['paypal_mail']?>" />
</dd>
</dl>
<dl>
<dt>Twitter:&nbsp </dt>
<dd>
<input name="twitter" type="text" class="infoinpt7" id="twitter" value="<?php print $fet['twitter']?>" />
</dd>
</dl>
<dl>
<dt>Facebook:&nbsp </dt>
<dd>
<input name="facebook" type="text" class="infoinpt7" id="facebook" value="<?php print $fet['facebook']?>" />
</dd>
</dl>
<dl>
<dt>Linked In:&nbsp </dt>
<dd>
<input name="linkedin" type="text" class="infoinpt7" id="linkedin" value="<?php print $fet['linkedin']?>" />
</dd>
</dl>
<!--<dl>
<dt>Rss:&nbsp </dt>
<dd>
<input name="rss" type="text" class="infoinpt7" id="rss" value="<?php //print $fet['rss']?>" />
</dd>
</dl>
<dl>
<dt>Youtube:&nbsp </dt>
<dd>
<input name="youtube" type="text" class="infoinpt7" id="youtube" value="<?php //print $fet['youtube']?>" />
</dd>
</dl>-->
<dl>
<dt>Default Sender's Email:&nbsp </dt>
<dd>
<input name="site_email" type="text" class="infoinpt7" id="site_email" value="<?php print $fet['site_email']?>" />
</dd>
</dl>
<dl>
<dt>Address:&nbsp </dt>
<dd>
<input name="address" type="text" class="infoinpt7" id="address" value="<?php print $fet['address']?>" />
</dd>
</dl>
<dl>
<dt>Phone:&nbsp </dt>
<dd>
<input name="phone" type="text" class="infoinpt7" id="phone" value="<?php print $fet['phone']?>" />
</dd>
</dl>
<dl>
<dt>Fax:&nbsp </dt>
<dd>
<input name="fax" type="text" class="infoinpt7" id="fax" value="<?php print $fet['fax']?>" />
</dd>
</dl>
<dl>
<dt>City:&nbsp </dt>
<dd>
<input name="city" type="text" class="infoinpt7" id="city" value="<?php print $fet['city']?>" />
</dd>
</dl>
<dl>
<dt>State:&nbsp </dt>
<dd>
<input name="state" type="text" class="infoinpt7" id="state" value="<?php print $fet['state']?>" />
</dd>
</dl>
<dl>
<dt>ZIP/Postal code:&nbsp </dt>
<dd>
<input name="postcode" type="text" class="infoinpt7" id="postcode" value="<?php print $fet['postcode']?>" />
</dd>
</dl>
<dl>
<dt>Copyright:&nbsp </dt>
<dd>
<textarea name="copyright" type="text" class="infoinpt7" style="height:100px;" id="copyright" ><?php print stripslashes($fet['copyright'])?></textarea> 
</dd>
</dl>
<dl>
<dt>Trailer Note:&nbsp </dt>
<dd>
<textarea name="slogan" type="text" class="infoinpt7" style="height:100px;" id="slogan" ><?php print $fet['slogan']?></textarea> 
</dd>
</dl>

<dl>
<dt>Delivery Rules And Regularation &nbsp </dt>
<br />
<br />
<dd>
<script type="text/javascript">
window.onload = function(){
var oFCKeditor = new FCKeditor( 'd_rules_regularation', '700', '500' ) ;
oFCKeditor.BasePath = "../fckeditor/" ;
oFCKeditor.ToolbarSet = "Default1" ;
oFCKeditor.ReplaceTextarea() ;
}
</script>
<textarea name="d_rules_regularation" id="d_rules_regularation" style="width:700px; height:700px; border:1px solid #999" ><?php print $fet['d_rules_regularation']?></textarea>
</dd>
</dl>
			    

<dl>
<dt><span class="red"></span></dt>
<dd>
<input name="Submit" type="submit" class="buttonNw" id="Submit" value="<?PHP if($_REQUEST['mode']=='add'){?> Add <?PHP }else{?> Save <?php }?>"/>
</dd>
</dl>


</div>
</div>
</div>
</div>
</div>
</div>
<?php 
include_once("bottom.php"); 
ob_end_flush();
?>
