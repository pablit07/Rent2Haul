<?php
class General{
	private $SiteID;
	private $MetaText;
	private $PgTitle;
	private $LogoImg;
	private $HeadImg;
	private $HeadImgLink;
	private $HeadImg2;
	private $HeadImgLink2; 
	private $ContactID;
	private $CcID;
	private $ContactTitle;
	private $ContactIntro;
	private $ContactOpn;
	private $ContactPhone;
	private $CopyRight;
	private $SiteContactText;
	private $SiteContactID;
	private $GoogleAnalyticsCode;
	private $BannerMain;
	private $Banner1;
	private $Banner2;
	private $Banner3;
	private $BannerSpeed;

	
	function __construct()
	{
		$qry="SELECT * FROM general where SiteID='".SITE_ID."'";
		$result=mysql_query($qry) or die("Error :: ".$qry."--".mysql_error());
		if(mysql_num_rows($result)>0)
		{
	   		$row=mysql_fetch_object($result);			
			$this->setSiteID($row->SiteID);
			$this->setMetaText($row->MetaText);
			$this->setPgTitle($row->PgTitle);
			$this->setLogoImg($row->LogoImg);
			$this->setHeadImg($row->HeadImg);
			$this->setHeadImgLink($row->HeadImgLink);
			$this->setHeadImg2($row->HeadImg2);
			$this->setHeadImgLink2($row->HeadImgLink2);
			$this->setContactID($row->ContactID);
			$this->setCcID($row->CcID);
			$this->setContactTitle($row->ContactTitle);
			$this->setContactIntro($row->ContactIntro);
			$this->setContactOpn($row->ContactOpn);
			$this->setContactPhone($row->ContactPhone);
			$this->setCopyRight($row->CopyRight);
			$this->setSiteContactText($row->SiteContactText);
			$this->setSiteContactID($row->SiteContactID);
			$this->setGoogleAnalyticsCode($row->GoogleAnalyticsCode);				
			$this->setBannerMain($row->BannerMain);
			$this->setBanner1($row->Banner1);
			$this->setBanner2($row->Banner2);
			$this->setBanner3($row->Banner3);
			$this->setBannerSpeed($row->BannerSpeed);

	   }
	}
	
	public function getSiteID()
	{
		return $this->SiteID;
	}
	public function setSiteID($SiteID)
	{
		$this->SiteID=$SiteID;
	}
	//------------------------------------------------------------------------------------------
	public function getMetaText()
	{
		return html_entity_decode($this->MetaText);
	}
	public function setMetaText($MetaText="")
	{
		$this->MetaText=htmlentities($MetaText,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getPgTitle()
	{
		return html_entity_decode($this->PgTitle);
	}
	public function setPgTitle($PgTitle="")
	{
		$this->PgTitle=htmlentities($PgTitle,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getLogoImg()
	{
		return html_entity_decode($this->LogoImg);
	}
	public function setLogoImg($LogoImg="")
	{
		$this->LogoImg=htmlentities($LogoImg,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getHeadImg()
	{
		return html_entity_decode($this->HeadImg);
	}
	public function setHeadImg($HeadImg="")
	{
		$this->HeadImg=htmlentities($HeadImg,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getHeadImgLink()
	{
		return html_entity_decode($this->HeadImgLink);
	}
	public function setHeadImgLink($HeadImgLink="")
	{
		$this->HeadImgLink=htmlentities($HeadImgLink,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getHeadImg2()
	{
		return html_entity_decode($this->HeadImg2);
	}
	public function setHeadImg2($HeadImg2="")
	{
		$this->HeadImg2=htmlentities($HeadImg2,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getHeadImgLink2()
	{
		return html_entity_decode($this->HeadImgLink2);
	}
	public function setHeadImgLink2($HeadImgLink2="")
	{
		$this->HeadImgLink2=htmlentities($HeadImgLink2,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getContactID()
	{
		return html_entity_decode($this->ContactID);
	}
	public function setContactID($ContactID="")
	{
		$this->ContactID=htmlentities($ContactID,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getCcID()
	{
		return html_entity_decode($this->CcID);
	}
	public function setCcID($CcID="")
	{
		$this->CcID=htmlentities($CcID,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getContactTitle()
	{
		return html_entity_decode($this->ContactTitle);
	}
	public function setContactTitle($ContactTitle="")
	{
		$this->ContactTitle=htmlentities($ContactTitle,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getContactIntro()
	{
		return html_entity_decode($this->ContactIntro);
	}
	public function setContactIntro($ContactIntro="")
	{
		$this->ContactIntro=htmlentities($ContactIntro,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getContactOpn()
	{
		return html_entity_decode($this->ContactOpn);
	}
	public function setContactOpn($ContactOpn="")
	{
		$this->ContactOpn=htmlentities($ContactOpn,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getContactPhone()
	{
		return html_entity_decode($this->ContactPhone);
	}
	public function setContactPhone($ContactPhone="")
	{
		$this->ContactPhone=htmlentities($ContactPhone,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getCopyRight()
	{
		return html_entity_decode($this->CopyRight);
	}
	public function setCopyRight($CopyRight="")
	{
		$this->CopyRight=htmlentities($CopyRight,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getSiteContactText()
	{
		return html_entity_decode($this->SiteContactText);
	}
	public function setSiteContactText($SiteContactText="")
	{
		$this->SiteContactText=htmlentities($SiteContactText,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getSiteContactID()
	{
		return html_entity_decode($this->SiteContactID);
	}
	public function setSiteContactID($SiteContactID="")
	{
		$this->SiteContactID=htmlentities($SiteContactID,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getGoogleAnalyticsCode()
	{
		return stripslashes($this->GoogleAnalyticsCode);
	}
	public function setGoogleAnalyticsCode($GoogleAnalyticsCode="")
	{
		$this->GoogleAnalyticsCode=mysql_real_escape_string($GoogleAnalyticsCode);
	}
	//------------------------------------------------------------------------------------------
	public function getBannerMain()
	{
		return html_entity_decode($this->BannerMain);
	}
	public function setBannerMain($BannerMain="")
	{
		$this->BannerMain=htmlentities($BannerMain,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getBanner1()
	{
		return html_entity_decode($this->Banner1);
	}
	public function setBanner1($Banner1="")
	{
		$this->Banner1=htmlentities($Banner1,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getBanner2()
	{
		return html_entity_decode($this->Banner2);
	}
	public function setBanner2($Banner2="")
	{
		$this->Banner2=htmlentities($Banner2,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getBanner3()
	{
		return html_entity_decode($this->Banner3);
	}
	public function setBanner3($Banner3="")
	{
		$this->Banner3=htmlentities($Banner3,ENT_QUOTES);
	}
	//------------------------------------------------------------------------------------------
	public function getBannerSpeed()
	{
		return $this->BannerSpeed;
	}
	public function setBannerSpeed($BannerSpeed=5000)
	{
		$this->BannerSpeed=$BannerSpeed;
	}
	//------------------------------------------------------------------------------------------
	
		 
	 public function updateGeneral()
	 {
		$UpdtQry="UPDATE general SET ";
			$UpdtQry=$UpdtQry."MetaText='".$this->getMetaText()."', ";
			$UpdtQry=$UpdtQry."PgTitle='".$this->getPgTitle()."', ";
			$UpdtQry=$UpdtQry."LogoImg='".$this->getLogoImg()."', ";
			$UpdtQry=$UpdtQry."HeadImg='".$this->getHeadImg()."', ";
			$UpdtQry=$UpdtQry."HeadImgLink='".$this->getHeadImgLink()."', ";
			$UpdtQry=$UpdtQry."HeadImg2='".$this->getHeadImg2()."', ";
			$UpdtQry=$UpdtQry."HeadImgLink2='".$this->getHeadImgLink2()."', ";
			$UpdtQry=$UpdtQry."ContactID='".$this->getContactID()."', ";
			$UpdtQry=$UpdtQry."CcID='".$this->getCcID()."', ";
			$UpdtQry=$UpdtQry."ContactTitle='".$this->getContactTitle()."', ";
			$UpdtQry=$UpdtQry."ContactIntro='".$this->getContactIntro()."', ";
			$UpdtQry=$UpdtQry."ContactOpn='".$this->getContactOpn()."', ";
			$UpdtQry=$UpdtQry."ContactPhone='".$this->getContactPhone()."', ";
			$UpdtQry=$UpdtQry."CopyRight='".$this->getCopyRight()."', ";
			$UpdtQry=$UpdtQry."SiteContactText='".$this->getSiteContactText()."', ";
			$UpdtQry=$UpdtQry."SiteContactID='".$this->getSiteContactID()."', ";
			$UpdtQry=$UpdtQry."GoogleAnalyticsCode='".$this->getGoogleAnalyticsCode()."', ";
			$UpdtQry=$UpdtQry."BannerMain='".$this->getBannerMain()."', ";
			$UpdtQry=$UpdtQry."Banner1='".$this->getBanner1()."', ";
			$UpdtQry=$UpdtQry."Banner2='".$this->getBanner2()."', ";
			$UpdtQry=$UpdtQry."Banner3='".$this->getBanner3()."', ";
			$UpdtQry=$UpdtQry."BannerSpeed='".$this->getBannerSpeed()."', ";
		$checkstr=new CheckString($UpdtQry);
		$UpdtQry=$checkstr->GetAlteredString();
		$UpdtQry.=" WHERE SiteID='".SITE_ID."'";
		if(mysql_query($UpdtQry))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function selectGeneral(){
		$qry="SELECT * FROM general";
		$result=mysql_query($qry) or die("Error :: ".$qry."--".mysql_error());
		$TempArr=array();
		if(mysql_num_rows($result)>0)
		{
	   		while($row=mysql_fetch_object($result))
			{
				$general = new General();
				$general->setMetaText($row->MetaText);
				$general->setPgTitle($row->PgTitle);
				$general->setLogoImg($row->LogoImg);
				$general->setHeadImg($row->HeadImg);
				$general->setHeadImgLink($row->HeadImgLink);
				$general->setHeadImg2($row->HeadImg2);
				$general->setHeadImgLink2($row->HeadImgLink2);
				$general->setContactID($row->ContactID);
				$general->setCcID($row->CcID);
				$general->setContactTitle($row->ContactTitle);
				$general->setContactIntro($row->ContactIntro);
				$general->setContactOpn($row->ContactOpn);
				$general->setContactPhone($row->ContactPhone);
				$general->setCopyRight($row->CopyRight);				
				$general->setSiteContactText($row->SiteContactText);
				$general->setSiteContactID($row->SiteContactID);				
				$general->setGoogleAnalyticsCode($row->GoogleAnalyticsCode);
				$general->setBannerMain($row->BannerMain);
				$general->setBanner1($row->Banner1);
				$general->setBanner2($row->Banner2);
				$general->setBanner3($row->Banner3);
				$general->setBannerSpeed($row->BannerSpeed);
				
				$TempArr[] = $general;
			}			
	   }
	   return ($TempArr);
	 }
	
	 public function uploadLogo($files)
	 {
		if(count($files) > 0)
		{
			$uploaddir = "../images/";
			$arrfile = pos($files);
			$Fname=$arrfile["name"];
			if(strlen(trim($Fname))>0)
			{
				$ExtArr=explode('.',$Fname);
				$Extnsn=$ExtArr[count($ExtArr)-1];
				if(strtoupper($Extnsn)=="JPG" || strtoupper($Extnsn)=="GIF" || strtoupper($Extnsn)=="PNG")
				{
					$uploadfile = $uploaddir."logo_".time().".".$Extnsn;
					$uploadfile = strtolower($uploadfile);
					if (move_uploaded_file($arrfile['tmp_name'], $uploadfile))
					{
						chmod("$uploadfile",0777);
					}
					$this->setLogoImg(substr($uploadfile,strrpos($uploadfile, "/")+1));
				}else
				{
					//Photo upload failed due to unsupported file format nothing to do!
				}
			}
		}
	 }
	 
	 public function uploadHeadImg($files)
	 {
		if(count($files) > 0)
		{
			$uploaddir = "../images/";		
			$arrfile = next($files);
			$Fname=$arrfile["name"];
			if(strlen(trim($Fname))>0)
			{
				$ExtArr=explode('.',$Fname);
				
				$uploadfile = $uploaddir."head_".time().".".$ExtArr[count($ExtArr)-1];
					
				if (move_uploaded_file($arrfile['tmp_name'], $uploadfile))
				{
					chmod("$uploadfile",0777);
				}
				$this->setHeadImg(substr($uploadfile,strrpos($uploadfile, "/")+1));
			}
			
			$uploaddir = "../images/";	
			$arrfile = next($files);
			$Fname=$arrfile["name"];
			if(strlen(trim($Fname))>0)
			{
				$ExtArr=explode('.',$Fname);
				
				$uploadfile = $uploaddir."head2_".time().".".$ExtArr[count($ExtArr)-1];
					
				if (move_uploaded_file($arrfile['tmp_name'], $uploadfile))
				{
					chmod("$uploadfile",0777);
				}
				$this->setHeadImg2(substr($uploadfile,strrpos($uploadfile, "/")+1));
			}
		}
	 }
	 
}// end of Class General
?>