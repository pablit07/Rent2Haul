<?php 
ob_start();
include_once("../configure.php");
include_once("top.php");

$PK_FLD = "page_id";$STATUS_FLD = "pages_status";$ORDERBY_FLD = "page_id";

if(!empty($_POST['news_ordering_field'])) $_SESSION['news_ordering_field'] = $_POST['news_ordering_field'];
if(!empty($_POST['news_ordering_type'])) $_SESSION['news_ordering_type'] = $_POST['news_ordering_type'];
$ORDERBY_FLD = (!empty($_SESSION['news_ordering_field'])) ? $_SESSION['news_ordering_field'] : "news_id";
$ORDERBY_TYP = (!empty($_SESSION['news_ordering_type'])) ? $_SESSION['news_ordering_type'] : "DESC";
$limit=(isset($_REQUEST['limit'])) ? $_REQUEST['limit'] : ADMIN_PAGE_LIMIT;
$offset=(isset($_REQUEST['offset'])) ? $_REQUEST['offset'] : 0;

if($_REQUEST['action']=="Delete"){
$db->deleteData(TBL_QUOTS,"id=".$_REQUEST['id']);
$db->deleteData(TBL_QUOTS_ACC,"quote_id=".$_REQUEST['id']);
$msg = MSG_DELETE_SUCCESS;
header('location:quick_quote.php?msg=del');
exit;
}
?>
<script>
function deleteSinglePage(id){
if(confirm("Are You Sure to Delete?")){
window.location.href='quick_quote.php?id='+id+'&action=Delete';
}else{
return false;
}
}
function detailsSinglePage(id){
window.location.href='quick_quote_details.php?id='+id;
}
</script>
<div class="maincont" id="mainPan">
<div class="parentcontainer">
<?php include_once("header.php"); ?>
<div class="workpanel">
<?php include_once("left.php"); ?>
<div class="rightpanel"> <br class="clear" />
<p class="greentxt2">Customer Quote Manager</p>
<div class="detailblock" align="center">
<table width="100%" border="1" cellspacing="1" cellpadding="1">
<tr>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">Name</td>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">Phone No</td>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">Email</td>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">Date</td>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">Catagory</td>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">Action</td>
</tr>
<?php
$record_sql = "SELECT * FROM ".TBL_QUOTS;
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
<td height="24" align="center" valign="middle" class="normal_text"><?php print $row_rec['phone_no'];?> </td>
<td height="24" align="center" valign="middle" class="normal_text"><?php print $row_rec['email'];?> </td>
<td height="24" align="center" valign="middle" class="normal_text"><?php print $row_rec['date_to_move'];?> </td>
<td height="24" align="center" valign="middle" class="normal_text"><?php if($row_rec['c_catagory']==1){echo "Business";}else{echo "Residential";};?> </td>
<td height="24" align="center" valign="middle" width="100">
<table width="100%" height="21" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="51%" align="center" valign="middle"><img src="images/details.gif" alt="Details" title="Details" width="12" height="12" border="0" style="cursor:pointer;" onclick="detailsSinglePage('<?php print $row_rec['id']?>');" /></td>
<td width="27%" align="center" valign="middle"><img src="images/icon4.gif" alt="Delete" title="Delete" width="12" height="12" border="0" style="cursor:pointer;" onclick="deleteSinglePage('<?php print $row_rec['id']?>');" /></td>
<td width="22%" align="center" valign="middle"></td>
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
</div>
<br class="clear" />
<div class="detailblock" align="center">
<table width="80%" border="0" cellspacing="0" cellpadding="0">
<?php 
if($numrows > $limit){
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
</form>
</div>
</div>
</div>
<?php 
include_once("bottom.php"); 
ob_end_flush();
?>
