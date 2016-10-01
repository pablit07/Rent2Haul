<?php 
 class Photogallery {
	public $dbObject;
	
	public function Photogallery($dbObject)
	{
		$this->dbObject = $dbObject;
	}	
	
  	//function checkProjects($projects_name=""){
//		$sql = "SELECT * FROM ".TBL_PROJECT." WHERE projects_name = '{$projects_name}'";
//		if($this->dbObject->countRows($sql)==0)
//			return true;
//		else
//			return false;	
//	}
	
	function getPhoto($images_id=''){
		$sql = "SELECT * FROM ".TBL_PHOTO_GALLERY." WHERE images_id = '$images_id'";
		$rs = $this->dbObject->selectData($sql);
		$row = $this->dbObject->getRow($rs);
		return $row;

	}
	
	function getAllPhoto($offset,$limit){
		$sql = "SELECT * FROM ".TBL_PHOTO_GALLERY." 
				WHERE photogallery_status='Active'  ORDER BY images_id DESC LIMIT $offset,$limit";
		$rs = $this->dbObject->selectData($sql);
		while($row = $this->dbObject->getRow($rs)){
			$ptgArr[] = $row;
		}
		return $ptgArr;
	}
	
	function totalPhoto(){
		$sql = "SELECT COUNT(images_id) AS counter FROM ".TBL_PHOTO_GALLERY." WHERE  photogallery_status='Active'";
		$rs = $this->dbObject->selectData($sql);
		$row = $this->dbObject->getRow($rs);
		return $row[counter];		
	}
	
	
	
	function getPhotoGallery($images_id=''){
		$sql = "SELECT * FROM ".TBL_PHOTO_GALLERY." WHERE images_id = '$images_id'";
		$rs = $this->dbObject->selectData($sql);
		while($row = $this->dbObject->getRow($rs)){
			$arr[] = $row;
		}
		return $arr;

	}
	
	function getImage($images_id=''){
		$sql = "SELECT * FROM ".TBL_PHOTO_GALLERY." WHERE images_id = '$images_id'";
		$rs = $this->dbObject->selectData($sql);
		$row = $this->dbObject->getRow($rs);
		return $row;

	}
}	
?>
