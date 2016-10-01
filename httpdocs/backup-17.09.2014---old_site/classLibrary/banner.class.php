<?php
 class Banner {
	public $dbObject;
	
	public function Banner($dbObject)
	{
		$this->dbObject = $dbObject;
	}	
	
	function getBanner($banner_id){
		$sql = "SELECT * FROM ".TBL_BANNER." WHERE banner_id = '{$banner_id}'";
		$rs = $this->dbObject->selectData($sql);
		$row = $this->dbObject->getRow($rs);
		return $row;
	}
	
	function getRandomBanner(){
		$sql = "SELECT big_banner FROM ".TBL_BANNER." ORDER BY RAND() LIMIT 1";
		$rs = $this->dbObject->selectData($sql);
		$row = $this->dbObject->getRow($rs);
		
		return $row['big_banner'];
	}
	
	function getAllBanner(){
		$sql = "SELECT * FROM ".TBL_BANNER;
		$rs = $this->dbObject->selectData($sql);
		while($row = $this->dbObject->getRow($rs)){
			$result[] = $row;
		}
		return $result;
	}
	
	function getAllBannerImages(){
		$sql = "SELECT big_banner FROM ".TBL_BANNER;
		$rs = $this->dbObject->selectData($sql);
		while($row = $this->dbObject->getRow($rs)){
			$result[] = $row;
		}
		return $result;
	}
	
}	
?>