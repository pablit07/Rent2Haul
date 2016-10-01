<?php 
ob_start();
include_once("../configure.php");
include_once("top.php");
/*-----------------------------------------------------*/
$sqlTrailer = "SELECT * FROM ".TBL_TRAILER." WHERE id=1";
$getTriler = $db->selectData($sqlTrailer);
$get = $db->getRow($getTriler);
if(isset($_REQUEST['trai']) && $_REQUEST['trai'] == 'Save'){
$db->updateArray(TBL_TRAILER,$_POST,"id='1'");
echo '<script type="text/javascript">window.location.href="trailler_manger.php"</script>';
}
?>
<div class="maincont" id="mainPan">
<div class="parentcontainer">
<?php include_once("header.php"); ?>
<div class="workpanel">
<?php include_once("left.php"); ?>
<div class="rightpanel">
<p class="greentxt2">Trailer Manager</p>
<div class="mailRight">
<form action="" method="post" name="">
<div class="sectionData">
<table width="100%" border="0" class="hovertable">
<tr>
<th colspan="2">Trailer Section One</th>
</tr>
<tr>
<th width="19%">Trailer Size:</th>
<td width="81%"><input type="text" value="<?php echo $get['trailer_one']; ?>" name="trailer_one" style="width:100px;" /> Foot</td>
</tr>
<tr>
<th>Dimension:</th>
<td><input type="text" value="<?php echo  stripslashes($get['dimention_one']); ?>" name="dimention_one" style="width:100px;" /> Room</td>
</tr>
<tr>
<th>Typically holds:</th>
<td><input type="text" value="<?php echo $get['holder_one']; ?>" name="holder_one" style="width:100px;" /> Bedrooms</td>
</tr>
<tr>
<th>Price: </th>
<td>$ <input type="text" value="<?php echo $get['price_one']; ?>" name="price_one" style="width:100px;" /> / Trailer</td>
</tr>
<tr>
<th>Surcharge</th>
<td><input type="text" value="<?php echo $get['serchanges_one']; ?>" name="serchanges_one" /></td>
</tr>
</table>
</div>
<div class="sectionData">
<table width="100%" border="0" class="hovertable">
<tr>
<th colspan="2">Trailer Section Two</th>
</tr>
<tr>
<th width="19%">Trailer Size:</th>
<td width="81%"><input type="text" value="<?php echo $get['trailer_two']; ?>" name="trailer_two" style="width:100px;" /> Foot</td>
</tr>
<tr>
<th>Dimension:</th>
<td><input type="text" value="<?php echo stripslashes($get['dimention_two']); ?>" name="dimention_two" style="width:100px;" /> Room</td>
</tr>
<tr>
<th>Typically holds:</th>
<td><input type="text" value="<?php echo $get['holder_two']; ?>" name="holder_two" style="width:100px;" /> Bedrooms</td>
</tr>
<tr>
<th>Price:</th>
<td>$ <input type="text" value="<?php echo $get['price_two']; ?>" name="price_two" style="width:100px;" /> / Trailer</td>
</tr>
<tr>
<th>Surcharge</th>
<td><input type="text" value="<?php echo $get['serchanges_two']; ?>" name="serchanges_two" /></td>
</tr>
</table>
</div>
<?php /*?><div class="sectionData">
<table width="100%" border="0" class="hovertable">
<tr>
<th colspan="2">Trailer Section Three</th>
</tr>
<tr>
<th width="19%">Trailer Size:</th>
<td width="81%"><input type="text" value="<?php echo $get['trailer_three']; ?>" name="trailer_three" style="width:100px;" /> Foot</td>
</tr>
<tr>
<th>Dimension:</th>
<td><input type="text" value="<?php echo stripslashes($get['dimention_three']); ?>" name="dimention_three" style="width:100px;" /> Room</td>
</tr>
<tr>
<th>Typically holds:</th>
<td><input type="text" value="<?php echo $get['holder_three']; ?>" name="holder_three" style="width:100px;"/> Bedrooms</td>
</tr>
<tr>
<th>Price:</th>
<td>$ <input type="text" value="<?php echo $get['price_three']; ?>" name="price_three" style="width:100px;" /> / Trailer</td>
</tr>
<tr>
<th>Searchage</th>
<td><input type="text" value="<?php echo $get['serchanges_three']; ?>" name="serchanges_three" /></td>
</tr>
</table>
</div><?php */?>
<input name="trai" type="submit" class="buttonNw" id="Submit" value="Save" style="margin:10px 10px 10px 0px; clear:both; float:left;"/>
</form>
</div>
</div>
</div>
</div>
<?php 
include_once("bottom.php"); 
ob_end_flush();
?>
