<?php 
ob_start();
include_once("../configure.php");
include_once("top.php");
if(isset($_POST['upSubmit']) && $_POST['upSubmit']=='Submit'){
$db->updateArray(TBL_MOVING_QUOTE_DATA,$_POST,"acc_id=1");
header('location:supplyAndAccessories_Manager.php?msg=update');
}
$sql = "SELECT * FROM ".TBL_MOVING_QUOTE_DATA." WHERE acc_id=1";
$res = $db->selectData($sql);
$fet = $db->getRow($res); 
?>
<div class="maincont" id="mainPan">
<div class="parentcontainer">
<?php include_once("header.php"); ?>
<div class="workpanel">
<?php include_once("left.php"); ?>
<div class="rightpanel">
<p class="greentxt2">Supply And Accessories Manager</p>
<p class="red" id="msgDivId">
<?php if(isset($_REQUEST['msg'])){if($_REQUEST['msg']=='update')print 'Updated successfully.';if($_REQUEST['msg']=='del')print 'Deleted successfully.';if($_REQUEST['msg']=='added')print 'Added successfully.';}else{print $msg;} ?>
</p>
<div class="formblkSection">
<div class="infosection3">
<form name=""  method="post">
<div align="center">

<p class="greentxt3">SUPPLY AND ACCESSORIES Segment</p>

<dl style="width:600px;">
<dt>Item 1:&nbsp </dt>
<dd>
<input name="acc_one_name" type="text" class="infoinpt7" id="acc_one_name" value="<?php print $fet['acc_one_name']?>" /><b>$</b>
<input name="acc_one_price" type="text" class="infoinpt7" id="acc_one_price" value="<?php print $fet['acc_one_price']?>" style="width:50px; float:none;" />
</dd>
</dl>

<dl style="width:600px;">
<dt>Item 2:&nbsp </dt>
<dd>
<input name="acc_two_name" type="text" class="infoinpt7" id="acc_two_name" value="<?php print $fet['acc_two_name']?>" /><b>$</b>
<input name="acc_two_price" type="text" class="infoinpt7" id="acc_two_price" value="<?php print $fet['acc_two_price']?>" style="width:50px; float:none;" />
</dd>
</dl>

<dl style="width:600px;">
<dt>Item 3:&nbsp </dt>
<dd>
<input name="acc_three_name" type="text" class="infoinpt7" id="acc_three_name" value="<?php print $fet['acc_three_name']?>" /><b>$</b>
<input name="acc_three_price" type="text" class="infoinpt7" id="acc_three_price" value="<?php print $fet['acc_three_price']?>" style="width:50px; float:none;" />
</dd>
</dl>

<dl style="width:600px;">
<dt>Item 4:&nbsp </dt>
<dd>
<input name="acc_four_name" type="text" class="infoinpt7" id="acc_four_name" value="<?php print $fet['acc_four_name']?>" /><b>$</b>
<input name="acc_four_price" type="text" class="infoinpt7" id="acc_four_price" value="<?php print $fet['acc_four_price']?>" style="width:50px; float:none;" />
</dd>
</dl>

<dl style="width:600px;">
<dt>Item 5:&nbsp </dt>
<dd>
<input name="acc_five_name" type="text" class="infoinpt7" id="acc_five_name" value="<?php print $fet['acc_five_name']?>" /><b>$</b>
<input name="acc_five_price" type="text" class="infoinpt7" id="acc_five_price" value="<?php print $fet['acc_five_price']?>" style="width:50px; float:none;" />
</dd>
</dl>

<dl style="width:600px;">
<dt>Item 6:&nbsp </dt>
<dd>
<input name="acc_six_name" type="text" class="infoinpt7" id="acc_six_name" value="<?php print $fet['acc_six_name']?>" /><b>$</b>
<input name="acc_six_price" type="text" class="infoinpt7" id="acc_six_price" value="<?php print $fet['acc_six_price']?>" style="width:50px; float:none;" />
</dd>
</dl>

<dl style="width:600px;">
<dt>Item 7:&nbsp </dt>
<dd>
<input name="acc_seven_name" type="text" class="infoinpt7" id="acc_seven_name" value="<?php print $fet['acc_seven_name']?>" /><b>$</b>
<input name="acc_seven_price" type="text" class="infoinpt7" id="acc_seven_price" value="<?php print $fet['acc_seven_price']?>" style="width:50px; float:none;" />
</dd>
</dl>

<dl style="width:600px;">
<dt>Item 8:&nbsp </dt>
<dd>
<input name="acc_eight_name" type="text" class="infoinpt7" id="acc_eight_name" value="<?php print $fet['acc_eight_name']?>" /><b>$</b>
<input name="acc_eight_price" type="text" class="infoinpt7" id="acc_eight_price" value="<?php print $fet['acc_eight_price']?>" style="width:50px; float:none;" />
</dd>
</dl>

<dl style="width:600px;">
<dt>Item 9:&nbsp </dt>
<dd>
<input name="acc_nine_name" type="text" class="infoinpt7" id="acc_nine_name" value="<?php print $fet['acc_nine_name']?>" /><b>$</b>
<input name="acc_nine_price" type="text" class="infoinpt7" id="acc_nine_price" value="<?php print $fet['acc_nine_price']?>" style="width:50px; float:none;" />
</dd>
</dl>


<dl style="width:600px;">
<dt>Purchase Lock:&nbsp </dt>
<dd>
$ <input name="lock_on_container" type="text" class="infoinpt7" id="lock_on_container" value="<?php print $fet['lock_on_container']?>" style="width:50px; float:none;" />
</dd>
</dl>

<p class="greentxt3">EQUIPMENT RENTAL Segment</p>

<dl style="width:600px;">
<dt>Item 1:&nbsp </dt>
<dd>
<input name="equ_one_name" type="text" class="infoinpt7" id="equ_one_name" value="<?php print $fet['equ_one_name']?>" /><b>$</b>
<input name="equ_one_price" type="text" class="infoinpt7" id="equ_one_price" value="<?php print $fet['equ_one_price']?>" style="width:50px; float:none;" />
</dd>
</dl>

<dl style="width:600px;">
<dt>Item 2:&nbsp </dt>
<dd>
<input name="equ_two_name" type="text" class="infoinpt7" id="equ_two_name" value="<?php print $fet['equ_two_name']?>" /><b>$</b>
<input name="equ_two_price" type="text" class="infoinpt7" id="equ_two_price" value="<?php print $fet['equ_two_price']?>" style="width:50px; float:none;" />
</dd>
</dl>
	    

<dl>
<dt><span class="red"></span></dt>
<dd>
<input name="upSubmit" type="submit" class="buttonNw" id="Submit" value="Submit"/>
</dd>
</dl>


</div>
</form>
</div>
</div>
</div>
</div>
</div>
<?php 
include_once("bottom.php"); 
ob_end_flush();
?>
