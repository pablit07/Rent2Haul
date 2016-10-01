<?PHP
function pagewise_main($numrows,$LIMIT,$offset,$lnkParam="",$lnkScr="")
{
	if(empty($lnkScr))
		$lnkScr=$_SERVER['PHP_SELF'];
	if(($numrows>0)){
		$pages=intval($numrows/$LIMIT);
		if ($numrows % $LIMIT){ 
			$pages++;
		}
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
		
		/*if(!empty($lnkParam))
			print "<li><a href=\"".$lnkScr."?offset=0&limit=$LIMIT&".$lnkParam."\"> << </a></li>";
		else
			print "<li><a href=\"".$lnkScr."?offset=0&limit=$LIMIT\"><li><a href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT&".$lnkParam."\"> << </a></li>";*/
		
		if($selectedPg!=1){
			$newoffset = $LIMIT * ($selectedPg - 2);
			if(!empty($lnkParam))
				print "<li><a href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT&".$lnkParam."\"> < </a></li>";
			else
				print "<li><a href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT\"> < </a></li>";
		}
		for ($i=$st_page; $i<=$end_page; $i++){
			$newoffset = $LIMIT * ($i - 1);
			if($selectedPg == $i){
				print "<li><a href='#' class=\"selected\">$i</a></li>";
			}else{
				if(!empty($lnkParam))
					print "<li><a href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT&".$lnkParam."\">$i</a></li>";
				else
					print "<li><a href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT\">$i</a></li>";
			}
		}
		if($selectedPg!=$pages){
			$newoffset = $LIMIT * ($selectedPg);
			if(!empty($lnkParam))
				print "<li><a href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT&".$lnkParam."\"> > </a></li>";
			else
				print "<li><a href=\"".$lnkScr."?offset=$newoffset&limit=$LIMIT\"> > </a></li>";
		}
		/*$lastOffset = ($pages-1) * $LIMIT;
		if(!empty($lnkParam))
			print "</li><a href=\"".$lnkScr."?offset=".$lastOffset."&limit=$LIMIT&".$lnkParam."\"> >> </a></li>";
		else
			print "</li><a href=\"".$lnkScr."?offset=".$lastOffset."&limit=$LIMIT\"> >> </a></li>";*/
	}
	return $pages;
}
?>