<?php 
ob_start();
include_once("../configure.php");
include_once("top.php");

$PK_FLD = "id";
$STATUS_FLD = "pages_status";
$ORDERBY_FLD = "id";

$id = $_REQUEST['id'];

if(!empty($_POST['news_ordering_field'])) $_SESSION['news_ordering_field'] = $_POST['news_ordering_field'];
if(!empty($_POST['news_ordering_type'])) $_SESSION['news_ordering_type'] = $_POST['news_ordering_type'];
$ORDERBY_FLD = (!empty($_SESSION['news_ordering_field'])) ? $_SESSION['news_ordering_field'] : "id";
$ORDERBY_TYP = (!empty($_SESSION['news_ordering_type'])) ? $_SESSION['news_ordering_type'] : "DESC";
$limit=(isset($_REQUEST['limit'])) ? $_REQUEST['limit'] : ADMIN_PAGE_LIMIT;
$offset=(isset($_REQUEST['offset'])) ? $_REQUEST['offset'] : 0;

if(!empty($_POST['id'])){
$db->updateArray(TBL_REVIEW,$_POST,"id=".$_POST['id']);
$msg = MSG_EDIT_SUCCESS;
header('location:review.php?msg=edit');
}
if($_REQUEST['action']=="Delete"){
$db->deleteData(TBL_REVIEW,"id=".$_REQUEST['id']);
$msg = MSG_DELETE_SUCCESS;
header('location:review.php?msg=del');
exit;
}
if(($_REQUEST[mode] == 'edit') && $id!=''){
$sql = "SELECT * FROM ".TBL_REVIEW." WHERE id='".$id."'";
$res = $db->selectData($sql);
$fet = $db->getRow($res);
}
?>
<script>
function deleteSinglePage(id){
if(confirm("Are You Sure to Delete?")){
window.location.href='review.php?id='+id+'&action=Delete';
}else{
return false;
}
}
function loadEditLngForm(id){
window.location.href='review.php?id='+id+'&mode=edit';
}
</script>
<div class="maincont" id="mainPan">
<div class="parentcontainer">
<?php include_once("header.php"); ?>
<div class="workpanel">
<?php include_once("left.php"); ?>
<div class="rightpanel"> <br class="clear" />
<form method="post" name="frm" id="frm" action="<?php print $_SERVER['PHP_SELF']?>">
<input type="hidden"  name="action"  id="action" value="edit" />
<input type="hidden"  name="id"  id="id" value="<?php echo $id;?>" />
<p class="greentxt2">Customer Review Manager</p>
<p class="red" id="msgDivId">
<?php if(isset($_REQUEST['msg'])){if($_REQUEST['msg']=='update')print 'Updated successfully.';if($_REQUEST['msg']=='del')print 'Deleted successfully.';if($_REQUEST['msg']=='added')print 'Added successfully.';}else{print $msg;} ?>
</p>
<?php if($_REQUEST['mode']=='edit'){?>
<div class="formblkSection2">
<div class="infosection2">
<div align="center">
<dl>
<dt>Name:&nbsp <span class="red">*</span></dt>
<dd><input name="name" type="text" class="infoinpt3" id="name" value="<?php print $fet['name']?>" />
</dd>
</dl>
<dl>
<dt>Email: </dt>
<dd><input name="email" type="text" class="infoinpt3" id="email" value="<?php print $fet['email']?>"/>
</dd>
</dl>
<dl>
<dt>City:&nbsp <span class="red">*</span></dt>
<dd><input type="text" name="city" id="city" class="infoinpt3" value="<?PHP print stripcslashes($fet['city'])?>"/>
</dd>
</dl>
<dl>
<dt>Rating:&nbsp <span class="red">*</span></dt>
<dd>
<select name="rating" style="margin:0 500px 0 0; width:190px; height:25px;">
<option value="">Select Rating</option>
<?php
for($i=1;$i<=5;$i++){
?>
<option value="<?php echo $i; ?>" <?php if($i==$fet['rating']){?> selected="selected"  <?php }?>><?php echo $i; ?></option>
<?php
}
?>
</select>
<?php /*?><input name="rating" type="text" class="infoinpt3" id="rating" value="<?php print $fet['rating']?>" />
<?php */?>
</dd>
</dl>
<dl>
<dt>Comments:&nbsp <span class="red">*</span></dt>
<dd><textarea name="comments" type="text" class="infoinpt3" id="comments" style="width:400px; height:100px; resize:none;" /><?php print $fet['comments']?></textarea>
</dd>
</dl>
<dl>
<dt>Status:&nbsp <span class="red">*</span></dt>
<dd>
<select name="status" style="margin:0 500px 0 0; width:190px; height:25px;">
<?php
if($fet['status'] == 0){
?>
<option value="0" selected="selected">Active</option>
<option value="1">Inactive</option>
<?php
}else{
?>	
<option value="0">Active</option>
<option value="1" selected="selected">Inactive</option>
<?php	
}
?>
</select>
</dd>
</dl>
</div>
</div>
<div class="formblock3">
<dl>
<dt></dt>
<dd>
<input name="Submit" type="submit" class="buttonNw" id="Submit" value="Save"/>
<input name="Button" type="button" class="buttonNw" id="Reset" value="Cancel" onclick="javascript:window.location.href='review.php';" />
</dd>
</dl>
</div>
</div>
<?php }?>
<div class="detailblock" align="center">
<br class="clear" /> 
<?php if($_REQUEST['mode']!='edit'){?>
<table width="100%" border="1" cellspacing="1" cellpadding="1">
<tr>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">Name</td>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">Email</td>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">City</td>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">Rating</td>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">Status</td>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">Action</td>
</tr>
<?php
$record_sql = "SELECT * FROM ".TBL_REVIEW." ORDER BY id DESC";
$rs_record = $db->selectData($record_sql);
$numrows = $db->countRows($record_sql);
if($numrows > 0) {
if(empty($limit))
$limit = ADMIN_PAGE_LIMIT;
if(empty($offset))
$offset = 0;
else {
$tmp_sql = $record_sql." LIMIT $offset,$limit";
$row_count = $db->countRows($tmp_sql);
if($row_count == 0)
$offset -= ADMIN_PAGE_LIMIT;
}	
$record_sql.=" limit $offset,$limit";
$rs_record = $db->selectData($record_sql);
}
if($numrows > 0){
$counter = 1;
while($row_rec = $db->getRow($rs_record)){
$bgColor = ($counter%2 == 0) ? "#F4F4F4" : "#ffffff";
?>
<tr bgcolor="<?php print $bgColor?>">
<td height="24" align="center" valign="middle" class="normal_text"><?php print $row_rec['name'];?> </td>
<td height="24" align="center" valign="middle" class="normal_text"><?php print $row_rec['email'];?> </td>
<td height="24" align="center" valign="middle" class="normal_text"><?php print $row_rec['city'];?> </td>
<td height="24" align="center" valign="middle" class="normal_text"><?php print $row_rec['rating'];?> </td>
<td height="24" align="center" valign="middle" class="normal_text"><?php print ($row_rec['status'] == 0) ? 'Active': 'Inactive';?> </td>
<td height="24" align="center" valign="middle" width="100">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td width="66%" align="center" valign="middle"><img src="images/icon4.gif" alt="Delete" title="Delete" width="11" height="10" border="0" style="cursor:pointer;" onclick="deleteSinglePage('<?php print $row_rec['id']?>');" /></td>
<td width="20%" align="center" valign="middle"><img src="images/edit_iconsmall_1.gif" alt="Edit" title="Edit" width="15" height="15" border="0" onclick="loadEditLngForm('<?php print $row_rec['id']?>');" style="cursor:pointer;" /></td>
<td width="20%" align="center" valign="top"></td>
</tr>
</table>
</td>
</tr>	
<?php
$counter++;
}
}
?>
</table>
<?php } ?>
</div>
</form>
<div class="detailblock" align="center">
<table width="80%" border="0" cellspacing="0" cellpadding="0">
<?php 
if($numrows > $limit) {
?>
<tr>
<td bgcolor="#cccccc" align="center" height="30" class="bold_text"><?php $x=$gf->pagewise($numrows,$limit,$offset,'link_admin',$lnkParam); ?></td>
</tr>
<?php 
} 
?>
<tr>
<td>&nbsp;</td>
</tr>
</table>
</div>
</div>
</div>
</div>
<?php 
include_once("bottom.php"); 
ob_end_flush();
?>
