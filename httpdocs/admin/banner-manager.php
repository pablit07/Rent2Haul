<?php
include_once("../configure.php");
$PAGE_HEADING = "Banner Manager";
include_once("top.php");
if(isset($_REQUEST['banner-upload']) && $_REQUEST['banner-upload']=='Upload'){
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
$_POST['banner_pic_name'] = $new_file_name;
$_POST['banner_description'] = stripcslashes(mysql_real_escape_string($_REQUEST['banner_description']));
$getInsertId = $db->insertDataArray(TBL_BANNER,$_POST);
if(!empty($getInsertId)){
$msg = 'The banner has been uploaded';
}else{
$msg = 'Sorry!! Some thing went wrong';	
}
}
}
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
<dl>
<dt>Upload Banner:</dt>
<dd> <input name="user_image" type="file" class="input" id="user_image" value="" style="border:1px solid #000;" /></dd>
</dl>
<!--<dl>
<dt>Short Description:</dt>
<dd><textarea name="banner_description" class="input" id="banner_description" style="border:1px solid #000; width:446px; height:143px;"></textarea></dd>
</dl>-->
<!--<dl>
<dt>Status:</dt>
<dd>
<select name="status">
<option value="1">Active</option>
<option value="0">Inactive</option>
</select>
</dd>
</dl>-->
</div>
<div class="formblock3">
<dl>
<dt><span class="red"></span></dt>
<dd>
<input name="banner-upload" type="submit" class="buttonNw" id="Submit" value="Upload" />
</dd>
</dl>
</div>
</div>
</form>
</div>
</div>
</div>
<?php include_once("bottom.php"); ?>
