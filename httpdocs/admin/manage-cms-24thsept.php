<?php 
include_once("../configure.php");
include_once("top.php");
$id=$_REQUEST['id'];
if(isset($_REQUEST['action'])){
$_REQUEST['pages_content']=stripslashes($_POST['pages_content']);
$db->updateArray(TBL_USER_PAGES,$_REQUEST,"pages_id=$id");
$db->updateArray(TBL_META_GENERAL,$_REQUEST,"page_id=$id");
$msg = MSG_EDIT_SUCCESS;?>
<script>window.location.href="manage-pages.php"</script>
<?php 
}
$sql = "SELECT * FROM ".TBL_USER_PAGES." WHERE pages_id='$id'";
$rs = $db->selectData($sql);
$row = $db->getRow($rs);

$sql = "SELECT * FROM ".TBL_META_GENERAL." WHERE page_id='$id'";
$rs1 = $db->selectData($sql);
$row1 = $db->getRow($rs1);
?>
<script>
function CheckAddForm()
{
var oEditor = FCKeditorAPI.GetInstance('pages_content');
var contents = oEditor.GetXHTML(true);
if(contents == '')
{
alert('Invalid Details!');
oEditor.Focus();
return false;
}
}
</script>
<div class="maincont" id="mainPan">
<div class="parentcontainer">
<!-- Header Section Starts Here -->
<?php include_once("header.php"); ?>
<!-- Header Section Ends Here -->   
<div class="workpanel">
<!-- Left panel Starts -->
<?php include_once("left.php"); ?>
<!-- Left Panel Ends -->
<div class="rightpanel">
<form method="post" name="frm" id="frm" action="<?php print $_SERVER['_SELF']?>" onsubmit="return CheckAddForm();">
<input type="hidden"  name="action"  id="action" value="edit" />
<p class="greentxt2">Home Manager</p>
<p class="red" id="msgDivId"><?php print $msg?></p>
<div class="formblkSection">
<div class="infosection21">
<dl>
<dt>Page Name:</dt>
<dd> <b><?php print $row['pages_heading']?></b> </dd>
</dl>
<dl>
<dt>Page Title:&nbsp <span class="red">*</span></dt>
<dd><input name="meta_page_title" type="text" class="infoinpt8" id="meta_page_title" value="<?php echo $row1['meta_page_title'] ; ?>" /></dd>
</dl>
<dl>
<dt>Meta Tag:&nbsp <span class="red">*</span></dt>
<dd><textarea  id="meta_tag" name="meta_tag" style="width:450px; height:200px; border:1px solid #999" ><?php echo stripslashes($row1['meta_tag']) ; ?></textarea></dd>
</dl>
<dl>
<dt>Meta Keyword:&nbsp <span class="red">*</span></dt>
<dd><textarea  id="meta_keywords" name="meta_keywords" style="width:450px; height:200px; border:1px solid #999" ><?php echo stripslashes($row1['meta_keywords']) ; ?></textarea></dd>
</dl>
<dl>
<dt>Content:&nbsp <span class="red">*</span></dt>
<dd>
<script type="text/javascript">
window.onload = function(){
var oFCKeditor = new FCKeditor( 'pages_content', '700', '500' ) ;
oFCKeditor.BasePath = "../fckeditor/" ;
oFCKeditor.ToolbarSet = "Default1" ;
oFCKeditor.ReplaceTextarea() ;
}
</script>
<textarea name="pages_content" id="pages_content" style="width:700px; height:700px; border:1px solid #999" ><?PHP print stripcslashes($row['pages_content'])?></textarea>
</dd>
</dl>
</div>
<div class="formblock3">
<dl>
<dt></dt>
<dd>
<input name="Submit" type="submit" class="buttonNw" id="Submit" value="Save" />
</dd>
</dl>
</div>
</div>
</form>
</div>
</div>
</div>
<?php include_once("bottom.php"); ?>