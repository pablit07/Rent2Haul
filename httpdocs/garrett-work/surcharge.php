<?php 
ob_start();
include_once("../configure.php");
include_once("top.php");
/*-----------------------------------------------------*/
$sqlTrailer = "SELECT * FROM ".TB_PACK_UNPACK_MOVERS." WHERE id=1";
$getTriler = $db->selectData($sqlTrailer);
$get = $db->getRow($getTriler);
if(isset($_REQUEST['trai4']) && $_REQUEST['trai4'] == 'Save'){
$db->updateArray(TB_PACK_UNPACK_MOVERS,$_POST,"id='1'");
?>
<script type="text/javascript">
location.reload();
</script>
<?php
}
?>
<div class="maincont" id="mainPan">
<div class="parentcontainer">
<?php include_once("header.php"); ?>
<div class="workpanel">
<?php include_once("left.php"); ?>
<div class="rightpanel">
<p class="greentxt2">Surcharge Calculation</p>
<div class="mailRight">
<form action="" method="post" name="">
<div class="sectionData">
<table width="100%" border="0" class="hovertable">
<tr>
<th colspan="2">Surcharge Calculation</th>
</tr>
<tr>
<th>Upto 50 Miles: </th>
<td>$ <input type="text" value="<?php echo $get['upto50_sercharges']; ?>" name="upto50_sercharges" style="width:53px;" /> USD</td>
</tr>
<tr>
<th>Above 50 Miles: </th>
<td>$ <input type="text" value="<?php echo $get['above50_sercharges']; ?>" name="above50_sercharges" style="width:53px;" /> USD</td>
</tr>
</table>
</div>
<input name="trai4" type="submit" class="buttonNw" id="Submit" value="Save" style="margin:10px 10px 10px 0px; float:left; clear:both;"/>
</form>
</div>
</div>
</div>
</div>
<?php 
include_once("bottom.php"); 
ob_end_flush();
?>
