<?php 
include_once("../configure.php");
if(!empty($_SESSION['admin_id']))	
$gf->reDirect("home.php");
if(isset($_GET['logout'])) $msg = "You have successfully logged out!!";
include_once("top1.php");  
?>
<div id="mainPan">
<div class="maincont">
<div align="center">
<div style="width:800px; margin-top:55px; height:180px; border:5px solid #999999;">
<img src="images/finpro_sml.png" width="800" height="180" alt="" title="" />
</div>
</div>
<div class="adminLoginBorder">
<div class="adminBg">
<h1>Administrator Login</h1>
<div class="adminSec">
<div class="loginBg"><img src="images/login.png" /></div>
<div class="userIdPrt">
<form action="" method="post">
<div class="userIdSec">
<div class="idText"><p>User Id:</p></div>
<div class="fieldBg"> <input name="admin_login_id" class="input-info" id="admin_login_id" placeholder="Login ID" onFocus="this.value=(this.value!=' Login ID')?this.value:'';this.focus;" value="" /></div>
</div>
<div class="userIdSec">
<div class="idText"><p>Password:</p></div>
<div class="fieldBg"> <input name="admin_password" type="password" class="input-info" id="admin_password" placeholder="Password" onFocus="this.value=(this.value!=' Password')?this.value:'';this.focus;"  value="" /></div>
</div>
<div> <input name="redirect" type="hidden" id="redirect" value="<?PHP print substr($_SERVER['QUERY_STRING'], 9);?>"> </div>
<div class="userIdSec">
<div class="submitPnl"><input class="submitBtn" name="" type="button" value="Login" onClick="adminLoginValidation('msgDivId');" /></div>
</div>
<div class="greentxt" style="padding-left:87px;" id="msgDivId"><?php print $msg;?></div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<div align="center">
<div style="clear:both;"></div>
<div style="margin-top:15px; width:800px; height:50px; border:5px solid #999999; background:#666666;"><span style="float:left; margin-top:20px; margin-left:280px; color:#FFFFFF;"><?PHP print COPYRIGHT_TEXT?></span></div>
</div>
</div>
</body>
</html>