<?php 
include_once("../configure.php");
include_once("top1.php");
?>
<div class="maincont" id="mainPan">
<div class="parentcontainer">
<!-- Header Section Starts Here -->
<?php include_once("header.php"); ?>
<!-- Header Section Ends Here -->
<div class="workpanel">
<!-- Left panel Starts --->
<?php include_once("left.php"); ?>
<!--- Left Panel Ends --->
<div class="rightpanel">
<form method="post" name="frm" id="frm" action="<?php print $_SERVER['_SELF']?>">
<p class="greentxt2">Change Password</p>
<p class="red" id="msgDivId"><?php print $msg?></p>
<!--middle block-->
<div class="formblkSection">
<!--top-->
<div class="totalholder">
<!--infosection starts-->
<div class="infosectionSingle" align="center">
<dl>
<dt>Enter Old Password:&nbsp <span class="red">*</span> </dt>
<dd>
<input name="admin_password_old" type="password" class="inputN2" id="admin_password_old" /></dd>
</dl>
<dl>
<dt>Enter New Password:&nbsp <span class="red">*</span> </dt>
<dd>
<input name="admin_password_new" type="password" class="inputN2" id="admin_password_new" /></dd>
</dl>
<dl>
<dt>Retype New Password:&nbsp <span class="red">*</span> </dt>
<dd>
<input name="admin_password_retype" type="password" class="inputN2" id="admin_password_retype" /></dd>
</dl>
</div>
<!--infosection ends-->
</div>
<div class="formblock4">
<dl>
<dt><span class="red">&nbsp;</span></dt>
<dd>
<input name="Submit" type="submit" class="buttonNw" id="Submit" value="Submit" onClick="return changePasswordValidation('msgDivId');" /><input name="Button" type="button" class="buttonNw" id="Reset" value="Cancel" onClick="location.href='home.php';" />
</dd>
</dl>
</div>
</div>
<!--detail block-->
<!--middle block-->
</form>
</div>
</div>
</div>
<?php include_once("bottom.php"); ?>
