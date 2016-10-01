<?php 
ob_start();
include_once("../configure.php");

if(!empty($_POST['news_ordering_field'])) $_SESSION['news_ordering_field'] = $_POST['news_ordering_field'];
if(!empty($_POST['news_ordering_type'])) $_SESSION['news_ordering_type'] = $_POST['news_ordering_type'];
$ORDERBY_FLD = (!empty($_SESSION['news_ordering_field'])) ? $_SESSION['news_ordering_field'] : "news_id";
$ORDERBY_TYP = (!empty($_SESSION['news_ordering_type'])) ? $_SESSION['news_ordering_type'] : "DESC";
$limit=(isset($_REQUEST['limit'])) ? $_REQUEST['limit'] : ADMIN_PAGE_LIMIT;
$offset=(isset($_REQUEST['offset'])) ? $_REQUEST['offset'] : 0;
include_once("top.php");

$id=$_REQUEST['id'];
if($_REQUEST['action']=="Delete"){
$db->deleteData(TBL_BANNER,"banner_id=".$id);
$msg = MSG_DELETE_SUCCESS;
header('location:list-banner-manager.php?msg=del');
exit;
}
?>
<script type="text/javascript">
function deleteSinglePage(id){
if(confirm("Are You Sure to Delete?")){
window.location.href='list-banner-manager.php?id='+id+'&action=Delete';
}else{
return false;
}
}
</script>
<div class="maincont" id="mainPan">
<div class="parentcontainer">
<?php include_once("header.php"); ?>
<div class="workpanel">
<?php include_once("left.php"); ?>
<div class="rightpanel"> <br class="clear" />
<p class="greentxt2">List Banner</p>
<div class="buttonpanel111">
<?php if($_REQUEST['mode']!='edit' && $_REQUEST['mode']!='add'){ ?>
<input name="add" type="button" class="buttonNw" id="add" value="Add" onclick="javascript:location.href='banner-manager.php';" />
&nbsp;
<?php }?>
</div>
<br class="clear" />
<p class="red" id="msgDivId">
<?php if(isset($_REQUEST['msg'])){if($_REQUEST['msg']=='update')print 'Updated successfully.';if($_REQUEST['msg']=='del')print 'Deleted successfully.';if($_REQUEST['msg']=='add')print 'Added successfully.';if($_REQUEST['msg']=='ex')print 'Projects Name Already exist.';}else{print $msg;}?>
</p>
<br class="clear" /> 
<div class="detailblock" align="center">
<?php if($_REQUEST['mode']!='edit' && $_REQUEST['mode']!='add'){ ?>
<table width="100%" border="1" cellspacing="1" cellpadding="1">
<tr>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">
<span style="cursor:pointer;" onclick="newsShorting('news_heading');" title="Sort">Id</span>
</td>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">
<span style="cursor:pointer;" onclick="newsShorting('news_heading');" title="Sort">Picture</span>
</td>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">
<span style="cursor:pointer;" onclick="newsShorting('news_heading');" title="Sort">Status</span>
</td>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">Action</td>
</tr>
<?php
$i=1;
$record_sql = "SELECT * FROM ".TBL_BANNER;
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
<td height="24" align="center" valign="middle" class="normal_text">&nbsp;&nbsp; <?php print $i;?> </td>
<td height="24" align="center" valign="middle" class="normal_text">&nbsp;&nbsp; 
<img src="../image/banner/<?php print $row_rec['banner_pic_name'];?>" width="70" height="70"  />
</td>
<td height="24" align="center" valign="middle" class="normal_text">&nbsp;&nbsp; 
<?php if($row_rec['status'] == 1){ echo  '<strong style="color:green">Publish</strong>'; }else{ echo '<strong style="color:red">Unpublish</strong>'; } ?>
</td>
<td height="24" align="center" valign="middle" width="100"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="20%" align="center" valign="middle">
<a href="edit-banner-manager.php?id=<?php print $row_rec['banner_id']?>"><img src="images/edit.gif" alt="Delete" title="Delete" width="11" height="10" border="0" style="cursor:pointer;" /></a></td>
<td width="20%" align="center" valign="middle">
<img src="images/icon4.gif" alt="Delete" title="Delete" width="11" height="10" border="0" style="cursor:pointer;" onclick="deleteSinglePage('<?php print $row_rec['banner_id']?>');" /></td>
<td width="20%" align="center" valign="top"></td>
</tr>
</table></td>
</tr>
<?php
$i++;
$counter++;
}
}
?>
</table>
<?php }?>
</div>
<br class="clear" />
<div class="detailblock" align="center">
<table width="80%" border="0" cellspacing="0" cellpadding="0">
<?php   if($numrows > $limit) {
?>
<tr>
<td bgcolor="#cccccc" align="center" height="30" class="bold_text"><?php $x=$gf->pagewise($numrows,$limit,$offset,'link_admin',$lnkParam); ?></td>
</tr>
<?php }   ?>
<tr>
<td>&nbsp;</td>
</tr>
</table>
</div>
</form>
<form action="" method="post" name="frmShorting" id="frmShorting">
<input type="hidden" name="news_ordering_field" id="news_ordering_field" value="" />
<input type="hidden" name="news_ordering_type" id="news_ordering_type" value="<?php print ($ORDERBY_TYP=='DESC') ? 'ASC' : 'DESC' ?>" />
</form>
</div>
</div>
</div>
<?php include_once("bottom.php"); ob_end_flush();?>
