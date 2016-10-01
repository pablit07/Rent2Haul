<?php
include_once("../configure.php");
$PAGE_HEADING = "Logo Manager";
include_once("top.php");
if(!empty($_POST['Submit'])){
	if($_FILES['logo']['name']!=''){
		
		$arr=getimagesize($_FILES['logo']['tmp_name']);
		$userfile_extn = explode(".", strtolower($_FILES['logo']['name']));
		
		//$arr_type=getimagesize($_FILES['logo']['tmp_name']);
		
	/*	if($arr[0]==107 && $arr[1]==108 && ($userfile_extn[1]=="jpeg"||$userfile_extn[1]=="jpg" || $userfile_extn[1]=="png" || $userfile_extn[1]=="gif")){*/
           		
		$tmp_name = $_FILES['logo']['tmp_name'];
	    $name = time()."_".$_FILES['logo']['name'];
		
		move_uploaded_file($tmp_name, "../image/logo/".$name);
		$record_sql = "SELECT * FROM ".TBL_LOGO;
		$rs_record = $db->selectData($record_sql);
		$row = $db->getRow($rs_record);
		if($row['logo']!=''){
			$file_path = "../image/logo/".$row['logo'];
			if(file_exists($file_path)){
				unlink($file_path);
			}
		}
	 /*}*/
	/* else{
	         $msg="Logo size must be 107x108 and check extension .jpeg/.jpg/.png/.gif";
	         
	 }*/
	 	
		
	}else{
		     $name = $_REQUEST['old_logo'];
	}
	
	if($name!=""){
	   
	    $record_sql = "SELECT * FROM ".TBL_LOGO;
		$rs_record = $db->selectData($record_sql);
		$row = $db->getRow($rs_record);
		if($row['logo']=='')
		  $sql="Insert ".TBL_LOGO." set logo='{$name}'";  
	    else  
	      $sql = "UPDATE ".TBL_LOGO." SET logo='{$name}'";
	   mysql_query($sql);
	   $msg = 'Logo Upload successfull.';
   }

}
$sql_ex = "SELECT * FROM ".TBL_LOGO;
$rs_ex = $db->selectData($sql_ex);
$row_ex = $db->getRow($rs_ex);
?>
<script>
function formValidation(){
if(document.getElementById('old_logo').value==''){
if(document.getElementById('logo').value==''){
alert("Please choose logo");
logo.focus();
return false;
}
}
return true;
}
</script>
<div class="maincont" id="mainPan">
<div class="parentcontainer">
<?php include_once("header.php"); ?>
<div class="workpanel">
<?php include_once("left.php"); ?>
<div class="rightpanel">
<form method="post" name="frm" id="frm" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data" onsubmit="return formValidation();">
<p class="greentxt2">Logo Manager</p>
<p class="red" id="msgDivId"><?php print $msg?></p>
<div class="formblkSection">
<div class="infosection">
<dl>
<dt>&nbsp;</dt>
<dd> <img src="../image/logo/<?PHP print $row_ex['logo']?>"  alt="" title="" class="floatLeft" /></dd>
</dl>
<dl>
<dt>Upload Logo:</dt>
<dd> <input name="logo" type="file" class="input" id="logo" value="" style="border:1px solid #000;" />
<input name="old_logo" type="hidden" id="old_logo" value="<?PHP print $row_ex['logo']?>" /> </dd>
</dl>
</div>
<div class="formblock3">
<dl>
<dt><span class="red"></span></dt>
<dd>
<input name="Submit" type="submit" class="buttonNw" id="Submit" value="Upload" />
</dd>
</dl>
</div>
</div>
</form>
</div>
</div>
</div>
<?php include_once("bottom.php"); ?>
