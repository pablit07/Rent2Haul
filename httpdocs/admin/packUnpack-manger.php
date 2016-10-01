<?php 
ob_start();
include_once("../configure.php");
include_once("top.php");
/*-----------------------------------------------------*/
$sqlTrailer = "SELECT * FROM ".TB_PACK_UNPACK_MOVERS." WHERE id=1";
$getTriler = $db->selectData($sqlTrailer);
$get = $db->getRow($getTriler);
if(isset($_REQUEST['trai3']) && $_REQUEST['trai3'] == 'Save'){
$db->updateArray(TB_PACK_UNPACK_MOVERS,$_POST,"id='1'");
echo '<script type="text/javascript">window.location.href="packUnpack-manger.php"</script>';
}
?>
<div class="maincont" id="mainPan">
<div class="parentcontainer">
<?php include_once("header.php"); ?>
<div class="workpanel">
<?php include_once("left.php"); ?>
<div class="rightpanel">
<p class="greentxt2">Packing & Unpacking Manager</p>
<div class="mailRight">
<form action="" method="post" name="">
<div class="sectionData">
<table width="100%" border="0" class="hovertable">
<tr>
<th colspan="2">Packing Unpacking Setting</th>
</tr>
<tr>
<th>Price: </th>
<td>$ <input type="text" value="<?php echo $get['pack_unpack_rate']; ?>" name="pack_unpack_rate" style="width:53px;" /> For one hour one mover</td>
</tr>
</table>
</div>
<input name="trai3" type="submit" class="buttonNw" id="Submit" value="Save" style="margin:10px 10px 10px 0px; float:left; clear:both;"/>
</form>
</div>
</div>
</div>
</div>
<?php 
include_once("bottom.php"); 
ob_end_flush();
?>
