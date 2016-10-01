<?php 
class GeneralFunction {
	public $dbObject;
	public $pagesCheckLogin;
	public $pagesAvoidCheckLogin;
	
	public function GeneralFunction($dbObject, $pagesCheckLogin=array(), $pagesAvoidCheckLogin=array())
	{
		$this->dbObject = $dbObject;
		$this->pagesCheckLogin = $pagesCheckLogin;
		$this->pagesAvoidCheckLogin = $pagesAvoidCheckLogin;
	}
	
	function pagewise($numrows,$LIMIT,$offset,$CSS,$lnkParam="",$lnkScr="")
	{
		if(empty($lnkScr))
			$lnkScr=$_SERVER['PHP_SELF'];
		if(($numrows>$LIMIT)&&($numrows>0)){
			$pages=intval($numrows/$LIMIT);
			if ($numrows % $LIMIT){ 
				$pages++;
			}
			print "<div align=center>";
			print "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">";
			$currenthit = $offset + 1;
			
			if (($numrows - $currenthit) >= $LIMIT ){
				$lasthit = $currenthit + ($LIMIT - 1); 
			}else{ 
				$lasthit=$numrows; 
			}
		
			if($LIMIT > 2) { 
				$quo = ($currenthit/$LIMIT) + 1; 
			}else { 
				$quo = $currenthit/$LIMIT; 
			}
			$selectedPg = sprintf("%.0f", $quo);
			print "<tr><td width=\"100%\" valign=\"top\" align=\"center\" class=\"".$CSS."\"><b>Page $selectedPg of $pages</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			if(($selectedPg-4)<1)
				$st_page=1;
			else
				$st_page=$selectedPg-4;
			
			if(($selectedPg+4)>$pages)
				$end_page=$pages;
			else
				$end_page=$selectedPg+4;
			if(!empty($lnkParam))
				print "<a class=\"".$CSS."\" href=\"".$lnkScr."?offset=0&limit=$LIMIT&".$lnkParam."\">First</a>&nbsp;|&nbsp;";
			else
				print "<a class=\"".$CSS."\" href=\"".$lnkScr."?offset=0&limit=$LIMIT\">First</a>&nbsp;|&nbsp;";
			
			if($selectedPg!=1){
				$newoffset = $LIMIT * ($selectedPg - 2);
				if(!empty($lnkParam))
					print "<a class=\"".$CSS."\" href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT&".$lnkParam."\">Prev</a>&nbsp;|&nbsp;";
				else
					print "<a class=\"".$CSS."\" href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT\">Prev</a>&nbsp;|&nbsp;";
			}
			
			for ($i=$st_page; $i<=$end_page; $i++){
				$newoffset = $LIMIT * ($i - 1);
				if($selectedPg == $i){
					print "<b><FONT color=red>$i</FONT></b>&nbsp;";
				}else{
					if(!empty($lnkParam))
						print "<a class=\"".$CSS."\" href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT&".$lnkParam."\">$i</a>&nbsp;";
					else
						print "<a class=\"".$CSS."\" href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT\">$i</a>&nbsp;";
				}
			}
			if($selectedPg!=$pages){
				$newoffset = $LIMIT * ($selectedPg);
				if(!empty($lnkParam))
					print "|&nbsp;<a class=\"".$CSS."\" href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT&".$lnkParam."\">Next</a>";
				else
					print "|&nbsp;<a class=\"".$CSS."\" href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT\">Next</a>";
			}
			$lastOffset = ($pages-1) * $LIMIT;
			if(!empty($lnkParam))
				print "&nbsp;|&nbsp;<a class=\"".$CSS."\" href=\"".$lnkScr."?offset=".$lastOffset."&limit=$LIMIT&".$lnkParam."\">Last</a>";
			else
				print "&nbsp;|&nbsp;<a class=\"".$CSS."\" href=\"".$lnkScr."?offset=".$lastOffset."&limit=$LIMIT\">Last</a>";
			
			print "</td></tr>";
			print "</table>";
			print "</div>";
		}
		
		if($numrows==0){
			print "<b>No Record Found.</b>";
		}
		return $pages;
	}


	function pagewise2($numrows,$LIMIT,$offset,$lnkScr="",$lnkParam="")
	{
		if(empty($lnkScr))
			$lnkScr=$_SERVER['PHP_SELF'];
		if(($numrows>$LIMIT)&&($numrows>0)){
			$pages=intval($numrows/$LIMIT);
			if ($numrows % $LIMIT){ 
				$pages++;
			}
			print "<ul class=\"pagination2\">";
			$currenthit = $offset + 1;
			
			if (($numrows - $currenthit) >= $LIMIT ){
				$lasthit = $currenthit + ($LIMIT - 1); 
			}else{ 
				$lasthit=$numrows; 
			}
		
			if($LIMIT > 2) { 
				$quo = ($currenthit/$LIMIT) + 1; 
			}else { 
				$quo = $currenthit/$LIMIT; 
			}
			$selectedPg = sprintf("%.0f", $quo);
			if(($selectedPg-4)<1)
				$st_page=1;
			else
				$st_page=$selectedPg-4;
			
			if(($selectedPg+4)>$pages)
				$end_page=$pages;
			else
				$end_page=$selectedPg+4;
			if(!empty($lnkParam))
				print "<li><a class=\"".$CSS."\" href=\"".$lnkScr."?offset=0&limit=$LIMIT&".$lnkParam."\">First</a></li>";
			else
				print "<li><a class=\"".$CSS."\" href=\"".$lnkScr."?offset=0&limit=$LIMIT\">First</a></li>";
			
			if($selectedPg!=1){
				$newoffset = $LIMIT * ($selectedPg - 2);
				if(!empty($lnkParam))
					print "<li><a class=\"".$CSS."\" href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT&".$lnkParam."\">Prev</a></li>";
				else
					print "<li><a class=\"".$CSS."\" href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT\">Prev</a></li>";
			}
			
			for ($i=$st_page; $i<=$end_page; $i++){
				$newoffset = $LIMIT * ($i - 1);
				if($selectedPg == $i){
					print "<li><a href=\"#\" class=\"highlight\">$i</a></li>";
				}else{
					if(!empty($lnkParam))
						print "<li><a class=\"".$CSS."\" href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT&".$lnkParam."\">$i</a></li>";
					else
						print "<li><a class=\"".$CSS."\" href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT\">$i</a></li>";
				}
			}
			if($selectedPg!=$pages){
				$newoffset = $LIMIT * ($selectedPg);
				if(!empty($lnkParam))
					print "<li><a class=\"".$CSS."\" href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT&".$lnkParam."\">Next</a></li>";
				else
					print "<li><a class=\"".$CSS."\" href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT\">Next</a></li>";
			}
			$lastOffset = ($pages-1) * $LIMIT;
			if(!empty($lnkParam))
				print "<li><a class=\"".$CSS."\" href=\"".$lnkScr."?offset=".$lastOffset."&limit=$LIMIT&".$lnkParam."\">Last</a></li>";
			else
				print "<li><a class=\"".$CSS."\" href=\"".$lnkScr."?offset=".$lastOffset."&limit=$LIMIT\">Last</a></li>";
			
			print "</ul>";
		}
		
		if($numrows==0){
			print "<b>No Record Found.</b>";
		}
		return $pages;
	}
	public function reDirect($url)
	{
		header("Location: ".$url);
		exit;
	}

	/*public function goTo($url)
	{
		echo "<script>window.location.href='$url'</script>";
		exit;
	}*/

	public function getDropdown($SQL,$opValue,$dVal,$selected='')
	{
		if(!$count = $this->dbObject->countRows($SQL)) return false;
		else{
			$rs = $this->dbObject->selectData($SQL); $menu = "";
			while($row = $this->dbObject->getRow($rs)){
				$menu .= "<option value='".$row[$opValue]."'";
				if(is_array($selected) && in_array($row[$opValue],$selected))
					$menu .= " selected " ;
				elseif($row[$opValue] == $selected)
					$menu .= " selected " ;
				$menu .= ">".$row[$dVal];
				$menu.= "</option>";
			}
			return $menu;
		}
	}
	
	public function getCategoryDropdown($opValue,$dVal,$selected='')
	{
		$SQL = "SELECT * FROM ".TBL_CATEGORY." WHERE category_status='Active' ORDER BY category_name";
			$rs = $this->dbObject->selectData($SQL);
			while($row = $this->dbObject->getRow($rs)){
				$optionValue = $row[$dVal];
				$menu .= "<option value='".$row[$opValue]."'";
				if(is_array($selected) && in_array($row[$opValue],$selected))
					$menu .= " selected " ;
				elseif($row[$opValue] == $selected)
					$menu .= " selected " ;
				$menu .= ">".$optionValue;
				$menu.= "</option>";
				//$menu .= $this->getCategoryDropdown($opValue,$dVal,$selected);
			}
			return $menu;
	}
	
	public function getGroupDropdown($opValue,$dVal,$selected='')
	{
		$SQL = "SELECT * FROM ".TBL_GROUPS." WHERE group_status='Active' ORDER BY group_name";
			$rs = $this->dbObject->selectData($SQL);
			while($row = $this->dbObject->getRow($rs)){
				$optionValue = $row[$dVal];
				$menu .= "<option value='".$row[$opValue]."'";
				if(is_array($selected) && in_array($row[$opValue],$selected))
					$menu .= " selected " ;
				elseif($row[$opValue] == $selected)
					$menu .= " selected " ;
				$menu .= ">".$optionValue;
				$menu.= "</option>";
				//$menu .= $this->getCategoryDropdown($opValue,$dVal,$selected);
			}
			return $menu;
	}
	
	public function getStateDropdown($opValue,$dVal,$selected='',$mode="")
	 {
	  $SQL = "SELECT * FROM ".TBL_ZIP." GROUP BY short_state ORDER BY state ASC";
	   $rs = $this->dbObject->selectData($SQL);
	   $menu .= "<option value=''> Select State </option>";
	   if($mode==1) $menu .= "<option value='ALL'> All State </option>";
	   
	   while($row = $this->dbObject->getRow($rs)){
		$optionValue = $row[$dVal];
		$menu .= "<option value='".$row[$opValue]."'";
		if(is_array($selected) && in_array($row[$opValue],$selected))
		 $menu .= " selected " ;
		elseif($row[$opValue] == $selected)
		 $menu .= " selected " ;
		$menu .= ">".$optionValue;
		$menu.= "</option>";
		//$menu .= $this->getCategoryDropdown($opValue,$dVal,$selected);
	   }
	   return $menu;
	 }
	 
	public function getPageDropdown($opValue,$dVal,$selected='')
	 {
	  $SQL = "SELECT * FROM ".MOVING_PAGE_NAME."";
	   $rs = $this->dbObject->selectData($SQL);
	   while($row = $this->dbObject->getRow($rs)){
		$optionValue = $row[$dVal];
		$menu .= "<option value='".$row[$opValue]."'";
		if(is_array($selected) && in_array($row[$opValue],$selected))
		 $menu .= " selected " ;
		elseif($row[$opValue] == $selected)
		 $menu .= " selected " ;
		$menu .= ">".$optionValue;
		$menu.= "</option>";
		//$menu .= $this->getCategoryDropdown($opValue,$dVal,$selected);
	   }
	   return $menu;
	 }

	public function pageContent($page_id=''){
	  $SQL = "SELECT * FROM ".TBL_PAGE." WHERE page_id = '".$page_id."' ";
	  $rs = $this->dbObject->selectData($SQL);
      $row = $this->dbObject->getRow($rs);
	  $page_cont[0] = $row['pages_heading'] ;
      $page_cont[1] = stripcslashes($row['pages_content']);
	   return $page_cont;
	 }
	 
	public function processContent($page_id=''){
	  $SQL = "SELECT * FROM ".TBL_PROCESS." WHERE id = '".$page_id."' ";
	  $rs = $this->dbObject->selectData($SQL);
      $row = $this->dbObject->getRow($rs);
	  $page_cont[0] = $row['title'] ;
      $page_cont[1] = stripcslashes($row['content']);
	   return $page_cont;
	 }
	 
	 
	 
 public function metaContent($page_id=""){
	 if($page_id == '' ) {$page_id = 0 ; } 
		 
	 if($page_id>0){
	   $SQL = "SELECT * FROM ".TBL_META_GENERAL." WHERE page_id = '".$page_id."' ";
	   $rs=$this->dbObject->selectData($SQL);
	   $row = $this->dbObject->getRow($rs);
	   $meta_cont[0] = $row['meta_page_title'] ;
	   $meta_cont[1] = stripcslashes($row['meta_tag']);
	   $meta_cont[2] = stripcslashes($row['meta_keywords']);		
	   
	   if($meta_cont[0]!='' || $meta_cont[1]!='' || $meta_cont[2]!='' ) { return $meta_cont; } else { $page_id=0; } 
	
	 }	
	 
	 
	 if($page_id==0) {	
		$SQL2 = "SELECT * FROM ".TBL_META_GENERAL." WHERE page_id = '".$page_id."' ";
		$rs=$this->dbObject->selectData($SQL2);
		$row = $this->dbObject->getRow($rs);
		 
		$meta_cont[0] = $row['meta_page_title'] ;
		$meta_cont[1] = stripcslashes($row['meta_tag']);
		$meta_cont[2] = stripcslashes($row['meta_keywords']);		
		return $meta_cont;
     }	
	
	 } //End function metaContent


	public function getCountryDropdown($opValue,$dVal,$selected='')
	{
		$SQL = "SELECT * FROM ".TBL_COUNTRY." ORDER BY country_name ASC";
			$rs = $this->dbObject->selectData($SQL);
			while($row = $this->dbObject->getRow($rs)){
				$optionValue = $row[$dVal];
				$menu .= "<option value='".$row[$opValue]."'";
				if(is_array($selected) && in_array($row[$opValue],$selected))
					$menu .= " selected " ;
				elseif($row[$opValue] == $selected)
					$menu .= " selected " ;
				$menu .= ">".$optionValue;
				$menu.= "</option>";
				//$menu .= $this->getCategoryDropdown($opValue,$dVal,$selected);
			}
			return $menu;
	}
	
	public function getBookTypeDropdown($opValue,$dVal,$selected='')
	{
		$SQL = "SELECT * FROM ".TBL_BOOK_TYPE." WHERE book_status='Active'";
			$rs = $this->dbObject->selectData($SQL);
			while($row = $this->dbObject->getRow($rs)){
				$optionValue = $row[$dVal];
				$menu .= "<option value='".$row[$opValue]."'";
				if(is_array($selected) && in_array($row[$opValue],$selected))
					$menu .= " selected " ;
				elseif($row[$opValue] == $selected)
					$menu .= " selected " ;
				$menu .= ">".$optionValue;
				$menu.= "</option>";
				//$menu .= $this->getCategoryDropdown($opValue,$dVal,$selected);
			}
			return $menu;
	}
	
	public function getCountryName($country_id)
	{
		$sql = "SELECT country_name FROM `".TBL_COUNTRY."` WHERE `country_id`='{$country_id}'";
		$rs = $this->dbObject->selectData($sql);
		$row = $this->dbObject->getRow($rs);
		$country_name = stripslashes($row['country_name']);
		return $country_name;
	}
	
	public function getStateName($short_state)
	{
		$sql = "SELECT state FROM `".TBL_ZIP."` WHERE `short_state`='{$short_state}'";
		$rs = $this->dbObject->selectData($sql);
		$row = $this->dbObject->getRow($rs);
		$state_name = stripslashes($row['state']);
		return $state_name;
	}
	
	public function getBookTypeName($book_type_id)
	{
		$sql = "SELECT book_type FROM `".TBL_BOOK_TYPE."` WHERE `book_type_id`='{$book_type_id}'";
		$rs = $this->dbObject->selectData($sql);
		$row = $this->dbObject->getRow($rs);
		$book_type = stripslashes($row['book_type']);
		return $book_type;
	}
	
	public function getCityName($city_id)
	{
		$sql = "SELECT city_name FROM `".TBL_CITY."` WHERE `city_id`='{$city_id}'";
		$rs = $this->dbObject->selectData($sql);
		$row = $this->dbObject->getRow($rs);
		$city_name = stripslashes($row['city_name']);
		return $city_name;
	}
	
	public function getParentCategoryDropdown($parentId,$opValue,$dVal,$selected='',$x='>')
	{
		$SQL = "SELECT * FROM ".TBL_PRODUCT_CATEGORY." WHERE category_parent_id='$parentId' and category_status='Active' ORDER BY category_name";
		if(!$count = $this->dbObject->countRows($SQL)) return $x;
		else{
			$prefix .= (!empty($parentId)) ? $x : "";
			$x .= (!empty($parentId)) ? $x : "";
			$rs = $this->dbObject->selectData($SQL);// $menu = "";
			while($row = $this->dbObject->getRow($rs)){
				$optionValue = $prefix.$row[$dVal];
				$menu .= "<option value='".$row[$opValue]."'";
				if(is_array($selected) && in_array($row[$opValue],$selected))
					$menu .= " selected " ;
				elseif($row[$opValue] == $selected)
					$menu .= " selected " ;
				$menu .= ">".$optionValue;
				$menu.= "</option>";
				$menu .= $this->getParentCategoryDropdown($row['category_id'],$opValue,$dVal,$selected,$x);
			}
			return $menu;
		}
	}
	
	public function getFullCategory($catId)
	{
		$SQL = "SELECT * FROM ".TBL_PRODUCT_CATEGORY." WHERE category_id='$catId'";
		$rs = $this->dbObject->selectData($SQL);
		while($row = $this->dbObject->getRow($rs)){
			$parentCategory .= stripslashes($row['category_name']);
			if(!empty($row['category_parent_id']))
				return $this->getFullCategory($row['category_parent_id'])." > ".$parentCategory;
			else
				return $parentCategory;
		}
	}
	
	public function getSubCategory($catId)
	{
		$SQL = "SELECT * FROM ".TBL_PRODUCT_CATEGORY." WHERE category_parent_id='$catId' and category_parent_id<>0";
		$rs = $this->dbObject->selectData($SQL);
		while($row = $this->dbObject->getRow($rs)){
			$Category .= stripslashes($row['category_name']);
			if(!empty($row['category_id']))
				return $this->getFullCategory($row['category_id']).",".$Category;
			else
				return $Category;
		}
	}
	
	public function subCategories_Comma($catId, &$category="")
	{ 
		$sql="SELECT * FROM ".TBL_PRODUCT_CATEGORY." WHERE category_parent_id='$catId'";
		$rs = $this->dbObject->selectData($sql);
		while($row = $this->dbObject->getRow($rs)) {
			if($category!="") {
				$category .= ",";
			}
			$category .= $row["category_name"];
			$this->subCategories_Comma($row["category_id"], &$category);
		}
		return $category;
	}

	public function subCategories_CommaKeyword($catId, &$category="")
	{ 
		echo $sql="SELECT * FROM ".TBL_PRODUCT_CATEGORY." WHERE category_id='$catId'";
		$rs = $this->dbObject->selectData($sql);
		while($row = $this->dbObject->getRow($rs)) {
			if($category!="") {
				$category .= ",";
			}
			$category .= "<span onclick=location.href='category.php?cat_id=".$catId."&category_id=".$row["category_id"]."#cat'; style=cursor:pointer>".$row["category_name"]."</span>";
		}
		return $category;
	}

	public function subCategoryKeyowrd_Comma($catId, &$keyword="")
	{ 
		$sql="SELECT * FROM ".TBL_KEYWORD." WHERE cat_id='$catId'";
		$rs = $this->dbObject->selectData($sql);
		while($row = $this->dbObject->getRow($rs)) {
			$keyword .= $row["keyword"];
		}
		return $keyword;
	}

	public function subCategoryKeyowrd_Comma1($catId, &$keyword="")
	{ 
		$sql="SELECT k.keyword FROM ".TBL_KEYWORD." AS k 
			  LEFT JOIN ".TBL_PRODUCT_CATEGORY." AS c1 ON c1.category_id = k.cat_id
			  LEFT JOIN ".TBL_PRODUCT_CATEGORY." AS c ON c.category_id = c1.category_parent_id
			  WHERE c.category_id='$catId'";
		$rs = $this->dbObject->selectData($sql);
		while($row = $this->dbObject->getRow($rs)) {
			$sql2="SELECT * FROM ".TBL_KEYWORD_RANKING." WHERE keyword_id='".$row['keyword_id']."'";
			$rs2 = $this->dbObject->selectData($sql2);
			if($this->dbObject->countRows($sql2) > 0){
				$dataKey = str_replace(" ","%20",$row["keyword"]);
				if($keyword!="") {
					$keyword .= ",";
				}
				$keyword .= $row["keyword"];
			}
		}
		return $keyword;
	}

	public function subCatByComma($catId, &$category="")
	{ 
		$sql="SELECT * FROM ".TBL_PRODUCT_CATEGORY." WHERE category_parent_id='$catId'";
		$rs = $this->dbObject->selectData($sql);
		while($row = $this->dbObject->getRow($rs)) {
			if($category!="") {
				$category .= ",";
			}
			$category .= $row["category_name"];
		}
		return $category;
	}

	public function subCategories_BreadCumb($catId, $parcatId, &$category="")
	{ 
		$sql="SELECT * FROM ".TBL_PRODUCT_CATEGORY." WHERE category_parent_id='$catId'";
		$rs = $this->dbObject->selectData($sql);
		while($row = $this->dbObject->getRow($rs)){
			if($category!="") {
				$category .= " > ";
			}
			$category .= "<span onclick=location.href='category.php?cat_id=".$parcatId."&category_id=".$row["category_id"]."#cat'; style=cursor:pointer>".$row["category_name"]."</span>";
			$this->subCategories_BreadCumb($row["category_id"], $parcatId, &$category);
		}
		return $category;
	}

	public function subCategories($catId, &$category="")
	{ 
		$sql="SELECT * FROM ".TBL_PRODUCT_CATEGORY." WHERE category_parent_id='$catId'";
		$rs = $this->dbObject->selectData($sql);
		while($row = $this->dbObject->getRow($rs)){
			$category = $row["category_name"];
		}
		return $category;
	}

	public function pre($data)
	{
		echo '<pre>';print_r($data);
	}

	public function checkDBInfo($SQL)
	{
		if(!$count = $this->dbObject->countRows($SQL)) return false;
		else return true;
	}

	public function getReqString($data,$removed_arr)
	{
		foreach( $data as $key => $value ) {
			if(in_array($key,$removed_arr))
				unset($data[$key]);
		}
		foreach($data as $new_key => $new_value) {
			$strn .= "&".$new_key."=".$new_value;
		}
		return $strn;
	}

	public function checkURL($parameter)
	{
		preg_match("/^(http:\/\/)?([^\/]+)/i",$parameter, $matches);
		$host = $matches[1];
		return (($host == "http://") || ($host == "https://")) ? true : false;
	}

	public function get_page_name($path='')
	{
		$page_path = ($path != "") ? $path : $_SERVER['HTTP_REFERER']; 
		$url_parts = parse_url($page_path);
		$tmp_path = explode("/",$url_parts['path']); //pre($tmp_path);
		$page_name = array_pop($tmp_path);
		$page_name = !empty($page_name) ? $page_name : "index.php";
		$page_name .= ($url_parts['query'] != "") ? "?".$url_parts['query'] : "";
		$page_name .= ($url_parts['fragment'] != "") ? "#".$url_parts['fragment'] : "";
		return $page_name;
	}

	public function countWord($input)
	{
		$word = trim($input);
		$count = substr_count($word, " ");
		return $count;
	}

	public function get_DB_record($SQL,$req_val)
	{
		if(!$this->dbObject->countRows($SQL))
			return false;
		else {
			$rs = $this->dbObject->selectData($SQL);
			$row = $this->dbObject->getRow($rs);
			return $row[$req_val];
		}
	}
	
	public function getDB_record($table_name,$db_uniq_field,$value,$req_field,$db_select_field='',$sql_para='')
	{
		$db_select_field = !empty($db_select_field) ? $db_select_field : "*";
		$SQL = "select ".$db_select_field." from ".$table_name." where ".$db_uniq_field." = '".$value."'";
		$SQL .= !empty($sql_para) ? $sql_para : " ";
		if(!$count = $this->dbObject->countRows($SQL)) $return_value = false;
		else {
			$rs = $this->dbObject->selectData($SQL);
			$row = $this->dbObject->getRow($rs);
			$return_value = stripslashes($row[$req_field]);
		}
		return $return_value;
	}

	public function dateDiff($dformat, $endDate, $beginDate)
	{
		$date_parts1=explode($dformat, $beginDate);
		$date_parts2=explode($dformat, $endDate);
		$start_date=gregoriantojd($date_parts1[1], $date_parts1[2], $date_parts1[0]);
		$end_date=gregoriantojd($date_parts2[1], $date_parts2[2], $date_parts2[0]);
		return $end_date - $start_date;
	}

	public function fileWrite($content,$filename)
	{
		$text=stripcslashes($content);
		if(empty($text))
		{
			$text='  ';
		}
		if (file_exists($filename)) 
		{
			unlink($filename);
		}
		if (!$handle = fopen($filename, 'w+')) { 
				//print "Cannot open file ($filename)"; 
				return "Cannot open file:".$filename;
		   } 
		if (is_writable($filename)) { 
		   // In our example we're opening $filename in append mode. 
		   // The file pointer is at the bottom of the file hence 
		   // that's where $somecontent will go when we fwrite() it. 
		   // Write $somecontent to our opened file.
		   if (!fwrite($handle, $text)) { 
			   //print "Cannot write to file ($filename)"; 
			  return "Cannot open file:".$filename;
		   } 
		   else { 
			   return "Successfully updated."; 
		   } 
		   fclose($handle); 
							
		} else { 
			return "File:".$filename." Not Writeable."; 
		} 
	}

	public function generatePass()
	{
		$rand=rand();
		$rand1=md5($rand);
		$pass = substr($rand1, 0, 8);
		return $pass;
	}
	
	public function getGenericPageTextByPageID($page_id)
	{
		$sql = "SELECT * FROM `".TBL_GENERICPAGE."` WHERE `genericpage_id`='$page_id' and `genericpage_status`='Active'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$content = stripslashes($row['genericpage_content']);
		return $content;
	}
	
	public function getGenericPageTitleByPageID($page_id)
	{
		$sql = "SELECT * FROM `".TBL_GENERICPAGE."` WHERE `genericpage_id`='$page_id' and `genericpage_status`='Active'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$title = stripslashes($row['genericpage_title']);
		return $title;
	}
	
	function getMemberNameByEmail($member_email)
	{
		$sql = "SELECT CONCAT_WS(' ', member_firstname, member_lastname) as member_name FROM `".TBL_MEMBER."` WHERE `member_email`='$member_email' and `member_status`='Active'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$member_name = stripslashes($row['member_name']);
		return $member_name;
	}
	
	public function checkLogin()
	{
		$path_parts = pathinfo($_SERVER['PHP_SELF']);
		$dir_parts = explode("/", $path_parts['dirname']);
		if(!in_array($path_parts['basename'], $this->pagesAvoidCheckLogin) && (array_pop($dir_parts) == "admin"))
		{
			if(empty($_SESSION['admin_id'])) 
			{
				$redUrl = $this->get_page_name($_SERVER['REQUEST_URI']);
				$this->reDirect("index.php?redirect=".$redUrl);
			}

		}
		else
		{
			if(in_array($path_parts['basename'],$this->pagesCheckLogin))
			{
				if(empty($_SESSION['member_id'])) {
					$redUrl = $this->get_page_name($_SERVER['REQUEST_URI']);
					$this->reDirect("login.php?redirect=".$redUrl);
				}
			}
		}
	}
	
	public function generateCoupon($length=10)
	{
		$_rand_src = array(
			array(48,57) //digits
			, array(97,122) //lowercase chars
			, array(65,90) //uppercase chars
		);
		srand ((double) microtime() * 1000000);
		$random_string = "";
		for($i=0;$i<$length;$i++){
			$i1=rand(0,sizeof($_rand_src)-1);
			$random_string .= chr(rand($_rand_src[$i1][0],$_rand_src[$i1][1]));
		}
		return $random_string;
		//echo "$random_string<input name=\"coupon_code\" type=\"hidden\" class=\"field\" id=\"coupon_code\" value=\"$random_string\">";
	}
  
	// m/d/yy -> y-m-d
	function dateFormatChange($date1="") {
		if($date1!='') {
			$date_arr = explode('/',$date1) ;
			if(is_array($date_arr)) return $date_arr[2].'-'.$date_arr[1].'-'.$date_arr[0] ;
		}else{
			return false ;
		}
	} //End Function
	
	
	
	function dateFormatChange1($date1="") {
		if($date1!='') {
			$date_arr = explode('-',$date1) ;
			if(is_array($date_arr)) return $date_arr[2].'-'.$date_arr[0].'-'.$date_arr[1] ;
		}else{
			return false ;
		}
	}
	
	function dateCompare ($date1 = '' , $date2 = '') { //
		$date1 = strtotime($date1);
		$date2 = strtotime($date2);
		# echo ($date2 .'>'. $date1) ; 
		if ($date2 > $date1) return true ;
	} //End function 
	
	function monthDifference ($date = '') { 
		$d1=mktime(0,0,0,date('m'),date('d'),date('Y')); 
		$date_arr = explode('-',$date) ;
		$d2=mktime(0,0,0,$date_arr[1],$date_arr[0],$date_arr[2]);
		$months = (floor(($d1-$d2)/2628000)+1); 
		return $months ;
	} //End function 
	
	function monthsDif($start, $end)
	{
		// Assume YYYY-mm-dd - as is common MYSQL format
		$splitStart = explode('-', $start);
		$splitEnd = explode('-', $end);
		
		if (is_array($splitStart) && is_array($splitEnd)) {
			$startYear = $splitStart[0];
			$startMonth = $splitStart[1];
			$endYear = $splitEnd[0];
			$endMonth = $splitEnd[1];
			
			$difYears = $endYear - $startYear;
			$difMonth = $endMonth - $startMonth;
			
			if (0 == $difYears && 0 == $difMonth) {#print 1; // month and year are same
				return 0;
			}
			else if (0 == $difYears && $difMonth > 0) {#print 2; // same year, dif months
				if ($difMonth == 1)
					return 0;
				else
					return $difMonth;
			}
			else if (1 == $difYears) {#print 3;
				$startToEnd = 12 - $startMonth; // months remaining in start year(13 to include final month
				return ($startToEnd + $endMonth) - 1; // above + end month date
			}
			else if ($difYears > 1) {#print 4;
				$startToEnd = 12 - $startMonth; // months remaining in start year 
				$yearsRemaing = $difYears - 1;  // minus the years of the start and the end year
				$remainingMonths = 12 * $yearsRemaing; // tally up remaining months
				$totalMonths = $startToEnd + $remainingMonths + $endMonth; // Monthsleft + full years in between + months of last year
				return $totalMonths - 1;
			}
		}else {
			return false;
		}
	}
	
	function no_to_words($no = '')
	{   
		$words = array('0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five','6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten','11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen','16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty','30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy','80' => 'eighty','90' => 'ninty','100' => 'hundred','1000' => 'thousand','100000' => 'lakh','10000000' => 'crore');
		$main_no = str_replace(',','',$no);#print $main_no;
		if($main_no == 0)
			return ' ';
		else {
			$novalue='';
			$highno=$main_no;
			$remainno=0;
			$value=100;
			$value1=1000;       
			while($main_no>=100)    {
				if(($value <= $main_no) &&($main_no  < $value1))    {
					$novalue=$words["$value"];
					$highno = (int)($main_no/$value);
					$remainno = $main_no % $value;
					break;
				}
				$value= $value1;
				$value1 = $value * 100;
			}       
			if(array_key_exists("$highno",$words))
				return ucwords($words["$highno"]." ".$novalue." ".$this->no_to_words($remainno));
			else {
				$unit=$highno%10;
				$ten =(int)($highno/10)*10;            
				return ucwords($words["$ten"]." ".$words["$unit"]." ".$novalue." ".$this->no_to_words($remainno));
			}
		}
	}


	function mail_attachment($mailto, $from_mail, $from_name, $replyto, $subject, $message) {
		$header = "From: ".$from_name." <".$from_mail.">\r\n";
		$header .= "Reply-To: ".$replyto."\r\n";
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-Type: text/html; charset=iso-8859-1\"\r\n\r\n";
		$header .= $message."\r\n\r\n";
		mail($mailto, $subject, "", $header);
	}
	
	function generatePassword($length="")
	{
		$_rand_src = array(
			array(48,57) //digits
			, array(97,122) //lowercase chars
		);
		srand ((double) microtime() * 1000000);
		$random_string = "";
		for($i=0;$i<$length;$i++){
			$i1=rand(0,sizeof($_rand_src)-1);
			$random_string .= chr(rand($_rand_src[$i1][0],$_rand_src[$i1][1]));
		}
		return $random_string;
	}
	
	function generateCode($length="")
	{
		$_rand_src = array(
			array(48,57) //digits
			, array(97,122) //lowercase chars
			, array(65,90) //uppercase chars
		);
		srand ((double) microtime() * 1000000);
		$random_string = "";
		for($i=0;$i<$length;$i++){
			$i1=rand(0,sizeof($_rand_src)-1);
			$random_string .= chr(rand($_rand_src[$i1][0],$_rand_src[$i1][1]));
		}
		return $random_string;
	}
	
	function curPageName() {
		//echo substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
		return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
	}
	
	function time_since($since) {
		$chunks = array(
			array(60 * 60 * 24 * 365 , 'year'),
			array(60 * 60 * 24 * 30 , 'month'),
			array(60 * 60 * 24 * 7, 'week'),
			array(60 * 60 * 24 , 'day'),
			array(60 * 60 , 'hour'),
			array(60 , 'minute'),
			array(1 , 'second')
		);
	
		for ($i = 0, $j = count($chunks); $i < $j; $i++) {
			$seconds = $chunks[$i][0];
			$name = $chunks[$i][1];
			if (($count = floor($since / $seconds)) != 0) {
				break;
			}
		}
	
		$print = ($count == 1) ? '1 '.$name : "$count {$name}s";
		return $print;
	}

	function _ago($tm,$rcs = 0) {
	
		$cur_tm = time(); 
		
		$dif = $cur_tm-$tm;
		
		$pds = array('second','minute','hour','day','week','month','year','decade');
		
		$lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
		
		for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);
		
		$no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
		if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
		return $x;
	
	}

    function getAllTestimonial($offset,$limit){
		$sql = "SELECT * FROM ".TBL_TESTY." WHERE testimonial_status='Active' ORDER BY id DESC LIMIT $offset,$limit";
		$rs = $this->dbObject->selectData($sql);
		while($row = $this->dbObject->getRow($rs)){
			$newsArr[] = $row;
		}
		return $newsArr;
	}
	
	 function totalTestimonial(){
		$sql = "SELECT COUNT(id) AS counter FROM ".TBL_TESTY." WHERE testimonial_status='Active'";
		$rs = $this->dbObject->selectData($sql);
		$row = $this->dbObject->getRow($rs);
		return $row[counter];		
	}
	
  function getAlltestimonialRec(){
		$sql = "SELECT * FROM ".TBL_TESTY." WHERE testimonial_status='Active' ";
		$rs = $this->dbObject->selectData($sql);
		while($row = $this->dbObject->getRow($rs)){
			$newsArr[] = $row;
		}
		return $newsArr;
	}
	function fetchtestimonial($id=""){
		$sql = "SELECT * FROM ".TBL_TESTY." WHERE id = '{$id}'";
		$rs = $this->dbObject->selectData($sql);
		$row = $this->dbObject->getRow($rs);
		return $row;
	}
	
	function getAllmovingtipsl($offset,$limit){
		$sql = "SELECT * FROM ".TBL_TIPS." WHERE moving_tips_status	='Active' ORDER BY id DESC LIMIT $offset,$limit";
		$rs = $this->dbObject->selectData($sql);
		while($row = $this->dbObject->getRow($rs)){
			$newsArr[] = $row;
		}
		return $newsArr;
	}
	
	 function totalmovingtipsl(){
		$sql = "SELECT COUNT(id) AS counter FROM ".TBL_TIPS." WHERE moving_tips_status	='Active'";
		$rs = $this->dbObject->selectData($sql);
		$row = $this->dbObject->getRow($rs);
		return $row[counter];		
	}
	
	function getmovingtipsRec(){
		$sql = "SELECT * FROM ".TBL_TIPS." WHERE moving_tips_status	='Active' ";
		$rs = $this->dbObject->selectData($sql);
		while($row = $this->dbObject->getRow($rs)){
			$newsArr[] = $row;
		}
		return $newsArr;
	}
	function fetchmovingtips($id=""){
		$sql = "SELECT * FROM ".TBL_TIPS." WHERE id = '{$id}'";
		$rs = $this->dbObject->selectData($sql);
		$row = $this->dbObject->getRow($rs);
		return $row;
	}
	
	function getNews(){
		$sql = "SELECT * FROM ".TBL_NEWS;
		$rs = $this->dbObject->selectData($sql);
		$row = $this->dbObject->getRow($rs);
		
		return $row;

	}
	
	function getPdf($pdf_id=''){
        
		$sql = "SELECT * FROM ".TBL_PDF." WHERE pdf_id = '$pdf_id'";
		$rs = $this->dbObject->selectData($sql);
		$row = $this->dbObject->getRow($rs);
		return $row;
        
	}
	
	function getPdfGallery($pdf_id=''){
		$sql = "SELECT * FROM ".TBL_PDF." WHERE pdf_id = '$pdf_id'";
		$rs = $this->dbObject->selectData($sql);
		while($row = $this->dbObject->getRow($rs)){
			$arr[] = $row;
		}
		return $arr;

	}
	
	function getPdfFilename($pdf_id=''){
		$sql = "SELECT * FROM ".TBL_PDF." WHERE pdf_id = '$pdf_id'";
		$rs = $this->dbObject->selectData($sql);
		$row = $this->dbObject->getRow($rs);
		return $row;

	}
	
	
}
?>
