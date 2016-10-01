<?php
include_once("../configure.php");
$PAGE_HEADING = "Banner Manager";
include_once("top.php");
$id = $_REQUEST['id'];

if(isset($_REQUEST['banner-upload-edit']) && $_REQUEST['banner-upload-edit']=='Upload'){
if(isset($_FILES["user_image"]["name"]) && $_FILES["user_image"]["name"]!=''){
$image_name = "big".$getInsertId.$_FILES["user_image"]["name"];
$image_name1  = $_FILES["user_image"]["tmp_name"];
$filetype = $_FILES["user_image"]["type"];
$file_name = basename($image_name);
$file_name_arr = explode(".",$file_name);
$file_ext = $file_name_arr[count($file_name_arr)-1];
$new_file_name_b = "big".'-'.".".$file_ext;
$new_file_name = str_replace('big','thumb',$image_name);
copy($image_name1, "../image/banner/".$new_file_name);
list($width,$height,$type,$attr) = getimagesize("../image/banner/".$new_file_name);
$image->load("../image/banner/".$new_file_name);
$mw=635;
$mh=495;
$image->resize($mw,$mh);
$image->save("../image/banner/".$new_file_name);
}
if(isset($new_file_name) && !empty($new_file_name)){
$sql = "UPDATE ufirst_banner SET status='".$_REQUEST['status']."',banner_pic_name='".$new_file_name."' WHERE  banner_id='".$_REQUEST['hid']."'";
}else{
$sql = "UPDATE ufirst_banner SET status='".$_REQUEST['status']."' WHERE  banner_id='".$_REQUEST['hid']."'";	
}
$MYSQL = mysql_query($sql) or die();
header('Location:list-banner-manager.php');
}
$record_sql = "SELECT * FROM ".TBL_BANNER." WHERE banner_id='".$_REQUEST['id']."'";
$rs_record = $db->selectData($record_sql);
$row_rec = $db->getRow($rs_record);
?>
<div class="maincont" id="mainPan">
<div class="parentcontainer">
<?php include_once("header.php"); ?>
<div class="workpanel">
<?php include_once("left.php"); ?>
<div class="rightpanel">
<form method="post" name="frm" id="frm" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
<p class="greentxt2">Banner Manager</p>
<p class="red" id="msgDivId"><?php print $msg?></p>
<div class="formblkSection">
<div class="infosection">
<img src="../image/banner/<?php print $row_rec['banner_pic_name'];?>"  width="100" height="100"/>
<dl>
<dt>Upload Banner:</dt>
<dd> <input name="user_image" type="file" class="input" id="user_image" value="" style="border:1px solid #000;" /></dd>
</dl>
<!--<dl>
<dt>Short Description:</dt>
<dd><textarea name="banner_description" class="input" id="banner_description" style="border:1px solid #000; width:446px; height:143px;"></textarea></dd>
</dl>-->
<dl>
<dt>Status:</dt>
<dd>
<select name="status">
<?php
if($row_rec['status'] == 1){
?>
<option value="1" selected="selected">Publish</option>
<option value="0">Unpublish</option>
<?php
}else{
?>
<option value="1">Publish</option>
<option value="0" selected="selected">Unpublish</option>
<?php	
}
?>
</select>
</dd>
</dl>
</div>
<div class="formblock3">
<dl>
<dt><span class="red"></span></dt>
<dd>
<input type="hidden" value="<?php echo $_REQUEST['id']; ?>" name="hid"  />
<input name="banner-upload-edit" type="submit" class="buttonNw" id="Submit" value="Upload" />
</dd>
</dl>
</div>
</div>
</form>
</div>
</div>
</div>
<?php include_once("bottom.php"); ?>
