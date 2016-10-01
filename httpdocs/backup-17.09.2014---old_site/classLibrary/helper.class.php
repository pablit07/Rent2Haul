<?php 
 class Helper {
	
	public $dbObject;
	
	public function Helper($dbObject)
	{
		$this->dbObject = $dbObject;
	}
	
	public function LinkURL($page='')
	{
		echo SITE_URL.$page;
	}
	
	public function ReDirectURL($page='')
	{
		header("location:".SITE_URL.$page);
		exit;
	}
	
	public function GetBaseName()
	{
		echo str_replace('%20',' ',basename($_SERVER['REQUEST_URI']));
	}
	
	public function GetRequestURI()
	{
		return str_replace('%20',' ',basename($_SERVER['REQUEST_URI']));
	}
	
	public function GetBaseNameParams($val='')
	{
		if(strpos(basename($_SERVER['REQUEST_URI']),$val)===false)
			return false;
		else
			return true;
	}
	
	public function HtmlCss($page='')
	{
		echo '<link rel="stylesheet" type="text/css" href="'.SITE_URL.'styles/'.$page.'.css" media="screen" />';
	}

	public function HtmlScript($page='')
	{
		echo '<script type="text/javascript" src="'.SITE_URL.'scripts/'.$page.'.js"></script>';
	}
	
	public function HtmlImg($src='', $cls='', $id='', $width='', $height='', $alt='', $style='')
	{
		echo '<img src="'.SITE_URL.'images/'.$src.'"';
		if($cls!='')
			echo ' class="'.$cls.'"';
		if($id!='')
			echo ' id="'.$id.'"';
		if($width!='')
			echo ' width="'.$width.'"';
		if($height!='')
			echo ' height="'.$height.'"';
		if($alt!='')
			echo ' alt="'.$alt.'"';
		if($style!='')
			echo $style;
		echo ' />';
	}
	
	public function HtmlProductImg($src='', $cls='', $id='', $width='', $height='', $alt='', $style='')
	{
		echo '<img src="'.SITE_URL.PRO_DIR.$src.'"';
		if($cls!='')
			echo ' class="'.$cls.'"';
		if($id!='')
			echo ' id="'.$id.'"';
		if($width!='')
			echo ' width="'.$width.'"';
		if($height!='')
			echo ' height="'.$height.'"';
		if($alt!='')
			echo ' alt="'.$alt.'"';
		if($style!='')
			echo $style;
		echo ' />';
	}
	
	public function HtmlCategoryImg($src='', $cls='', $id='', $width='', $height='', $alt='', $style='')
	{
		echo '<img src="'.SITE_URL.CAT_DIR.$src.'"';
		if($cls!='')
			echo ' class="'.$cls.'"';
		if($id!='')
			echo ' id="'.$id.'"';
		if($width!='')
			echo ' width="'.$width.'"';
		if($height!='')
			echo ' height="'.$height.'"';
		if($alt!='')
			echo ' alt="'.$alt.'"';
		if($style!='')
			echo $style;
		echo ' />';
	}
	
	public function HtmlStoreCoverImg($src='')
	{
		echo '<img src="'.SITE_URL.STORE_DIR.$src.'" />';
	}
	
	public function HtmlGalleryImg($src='', $cls='', $id='', $width='', $height='', $alt='', $style='')
	{
		echo '<img src="'.SITE_URL.GAL_DIR.$src.'"';
		if($cls!='')
			echo ' class="'.$cls.'"';
		if($id!='')
			echo ' id="'.$id.'"';
		if($width!='')
			echo ' width="'.$width.'"';
		if($height!='')
			echo ' height="'.$height.'"';
		if($alt!='')
			echo ' alt="'.$alt.'"';
		if($style!='')
			echo $style;
		echo ' />';
	}
	
	public function HtmlCampaignImg($src='', $cls='', $id='', $width='', $height='', $alt='', $style='')
	{
		echo '<img src="'.SITE_URL.CAM_DIR.$src.'"';
		if($cls!='')
			echo ' class="'.$cls.'"';
		if($id!='')
			echo ' id="'.$id.'"';
		if($width!='')
			echo ' width="'.$width.'"';
		if($height!='')
			echo ' height="'.$height.'"';
		if($alt!='')
			echo ' alt="'.$alt.'"';
		if($style!='')
			echo $style;
		echo ' />';
	}
	
 }
?>
