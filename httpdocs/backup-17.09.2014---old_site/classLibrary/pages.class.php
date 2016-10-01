<?php 
 class Pages {
	public $dbObject;
	
	public function Pages($dbObject)
	{
		$this->dbObject = $dbObject;
	}	
	
  	function checkPages($page_name=""){
		$sql = "SELECT * FROM ".MOVING_PAGE_NAME." WHERE page_name = '{$page_name}'";
		if($this->dbObject->countRows($sql)==0)
			return true;
		else
			return false;	
	}
	
	function getPage($page_id=''){
		$sql = "SELECT PN.*, P.*
				FROM ".MOVING_PAGE_NAME." AS PN
				LEFT JOIN ".TBL_PAGES." AS P ON P.ref_page_id = PN.page_id
				WHERE PN.page_id = '$page_id'";
		$rs = $this->dbObject->selectData($sql);
		$row = $this->dbObject->getRow($rs);
		return $row;

	}
}	
?>
