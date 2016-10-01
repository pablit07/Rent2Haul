<?php 
ob_start();
include_once("../configure.php");
$PK_FLD = "page_id";
$STATUS_FLD = "pages_status";
$ORDERBY_FLD = "page_id";
if(!empty($_POST['news_ordering_field'])) $_SESSION['news_ordering_field'] = $_POST['news_ordering_field'];
if(!empty($_POST['news_ordering_type'])) $_SESSION['news_ordering_type'] = $_POST['news_ordering_type'];
$ORDERBY_FLD = (!empty($_SESSION['news_ordering_field'])) ? $_SESSION['news_ordering_field'] : "news_id";
$ORDERBY_TYP = (!empty($_SESSION['news_ordering_type'])) ? $_SESSION['news_ordering_type'] : "DESC";
$limit=(isset($_REQUEST['limit'])) ? $_REQUEST['limit'] : ADMIN_PAGE_LIMIT;
$offset=(isset($_REQUEST['offset'])) ? $_REQUEST['offset'] : 0;
include_once("top.php");
$id=$_REQUEST['id'];
if($_REQUEST['action']=="Delete"){
$db->deleteData(TBL_USER_PAGES,"page_id=".$id);
$db->deleteData(TBL_PAGE_NAME,"page_id=".$id);
$db->deleteData(TBL_META_GENERAL,"page_id=".$id);
$msg = MSG_DELETE_SUCCESS;
header('location:manage-pages.php?msg=del');exit;
}
if($_POST){
$_POST['pages_content']=stripslashes($_POST['pages_content']);
$db->insertDataArray(TBL_PAGE_NAME,$_POST);
$_POST['page_id']=mysql_insert_id();
$db->insertDataArray(TBL_USER_PAGES,$_POST);
$db->insertDataArray(TBL_META_GENERAL,$_POST);
$msg = MSG_ADD_SUCCESS;
header('location:manage-pages.php?msg=add');exit;
}
?>
<script>
function loadEditLngForm(page_id){
window.location.href='manage-cms.php?id='+page_id;
}    
function deleteSinglePage(id){
alert('manage-pages.php?id='+id+'&action=Delete');
if(confirm("Are You Sure to Delete?")){
window.location.href='manage-pages.php?id='+id+'&action=Delete';
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
<p class="greentxt2">Page Manager</p>
<div class="buttonpanel111">
<?php if($_REQUEST['mode']!='edit' && $_REQUEST['mode']!='add'){ ?>
<input name="add" type="button" class="buttonNw" id="add" value="Add" onclick="javascript:location.href='manage-pages.php?mode=add';" />
&nbsp;
<?php }?>
</div>
<br class="clear" />
<p class="red" id="msgDivId">
<?php if(isset($_REQUEST['msg'])){if($_REQUEST['msg']=='update')print 'Updated successfully.';if($_REQUEST['msg']=='del')print 'Deleted successfully.';if($_REQUEST['msg']=='add')print 'Added successfully.';if($_REQUEST['msg']=='ex')print 'Projects Name Already exist.';}else{print $msg;}?>
</p>
<?php if($_REQUEST[mode] == 'edit' || $_REQUEST[mode] == 'add'){?>
<div class="formblkSection2">
<form method="post" name="frm" id="frm" action="<?php print $_SERVER['_SELF']?>" onsubmit="return CheckAddForm();" enctype="multipart/form-data">
<input type="hidden"  name="action"  id="action" value="edit" />
<input type="hidden"  name="activity_id"  id="activity_id" value="<?php print $activity_id?>" />
<div class="infosection2">
<dl>
<dt>Page Name:&nbsp <span class="red">*</span></dt>
<dd><input name="page_name" type="text" class="infoinpt3" id="page_name" value="<?php echo $data['page_name'] ; ?>" /></dd>
</dl>
<dl>
<dt>Page Heading:&nbsp <span class="red">*</span></dt>
<dd><input name="pages_heading" type="text" class="infoinpt3" id="pages_heading" value="<?php echo $data['page_heading'] ; ?>" /></dd>
</dl>
<dl>
<dt>Page Content:&nbsp<span class="red">*</span> </dt>
<dd>
<script type="text/javascript">
window.onload = function(){
var oFCKeditor = new FCKeditor( 'pages_content', '700', '500' ) ;
oFCKeditor.BasePath = "../fckeditor/" ;
oFCKeditor.ToolbarSet = "Default1" ;
oFCKeditor.ReplaceTextarea() ;
}
</script>
<textarea name="pages_content" id="pages_content" style="width:700px; height:700px; border:1px solid #999" ><?PHP print stripcslashes($data['pages_content'])?></textarea>
</dl>
<dl>
<dt>Meta Page Title:&nbsp <span class="red">*</span></dt>
<dd><input name="meta_page_title" type="text" class="infoinpt3" id="meta_page_title" value="<?php echo $data['meta_page_title'] ; ?>" /></dd>
</dl>
<dl>
<dt>Meta Tag:&nbsp <span class="red">*</span></dt>
<dd><textarea  id="meta_tag" name="meta_tag" style="width:450px; height:200px; border:1px solid #999" ><?php echo stripslashes($row1['meta_tag']) ; ?></textarea></dd>
</dl>
<dl>
<dt>Meta Keyword:&nbsp <span class="red">*</span></dt>
<dd><textarea  id="meta_keywords" name="meta_keywords" style="width:450px; height:200px; border:1px solid #999" ><?php echo stripslashes($row1['meta_keywords']) ; ?></textarea></dd>
</dl>
</div>
<div class="formblock3">
<dl>
<dt>&nbsp;</dt>
<dd>
<input name="Submit" type="submit" class="buttonNw" id="Submit" value="<?php if($_REQUEST['mode']=='add'){?> Add <?php }else{?> Save <?php }?>"/>
<input name="Cancel" type="button" class="buttonNw" id="Cancel" value="Cancel" onclick="javascript:window.location.href='manage-pages.php';"/>
</dd>
</dl>
</div>
<?php }?>
<br class="clear" /> 
<div class="detailblock" align="center">
<?php if($_REQUEST['mode']!='edit' && $_REQUEST['mode']!='add'){ ?>
<table width="100%" border="1" cellspacing="1" cellpadding="1">
<tr>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">&nbsp;&nbsp;<span style="cursor:pointer;" onclick="newsShorting('news_heading');" title="Sort">Id
</td>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">&nbsp;&nbsp;<span style="cursor:pointer;" onclick="newsShorting('news_heading');" title="Sort">Page Name
</td>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">&nbsp;&nbsp;<span style="cursor:pointer;" onclick="newsShorting('news_heading');" title="Sort">Page Heading
</td>
<td height="30" align="center" valign="middle" bgcolor="#cccccc" class="bold_text">Action</td>
</tr>
<?php
$i=1;
$record_sql = "SELECT * FROM ".TBL_USER_PAGES;
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
<td height="24" align="center" valign="middle" class="normal_text">&nbsp;&nbsp; <?php print $row_rec['pages_heading'];?> </td>
<td height="24" align="center" valign="middle" class="normal_text">&nbsp;&nbsp; <?php print $row_rec['pages_heading'];?> </td>
<td height="24" align="center" valign="middle" width="100"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="20%" align="center" valign="middle"><img src="images/edit_iconsmall_1.gif" alt="Edit" title="Edit" width="15" height="15" border="0" onclick="loadEditLngForm('<?php print $row_rec[$PK_FLD]?>');" style="cursor:pointer;" /></td>
<td width="20%" align="center" valign="middle"><img src="images/icon4.gif" alt="Delete" title="Delete" width="11" height="10" border="0" style="cursor:pointer;" onclick="deleteSinglePage('<?php print $row_rec[$PK_FLD]?>');" /></td>
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
