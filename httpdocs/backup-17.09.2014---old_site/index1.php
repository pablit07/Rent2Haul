<?php 
include_once("configure.php");
$page_title = "Home";
if(isset($_POST['submit']) && $_POST['submit']!=""){
/*$exist_email = " SELECT * FROM ".TBL_USER_REGISTER." WHERE 1 AND email = '".$_POST['email']."'";
$exist_email_rs = $db->selectData($exist_email);
$exist_email_row = $db->getRow($exist_email_rs);*/
//if($exist_email_row==0){
	
	$name   = addslashes(trim($_POST['name']));
	$phone  = addslashes(trim($_POST['phone']));
	$email  = addslashes(trim($_POST['email']));
	$custom  = addslashes(trim($_POST['custom']));
	$physical_address  = addslashes(trim($_POST['physical_address']));
	$to_address  = addslashes(trim($_POST['to_address']));
	$date_move = $_POST['date_of_move'];
	$expl_date_of_move = explode("/",$date_move);
	$date_of_move = $expl_date_of_move[2]."/".$expl_date_of_move[0]."/".$expl_date_of_move[1];
	$no_of_bedroom  = addslashes(trim($_POST['no_of_bedroom']));
	$item_move      = addslashes(trim($_POST['item_move']));
	$budget_price   = addslashes(trim($_POST['budget_price']));
	$register_date = date("Y-m-d");
	mysql_query("INSERT INTO ".TBL_USER_REGISTER." SET
						`name`   = '$name',
						`phone`   = '$phone',
						`email`   = '$email',
						`custom`   = '$custom',
						`physical_address`   = '$physical_address',
						`to_address`   = '$to_address',
						`date_of_move`   = '$date_of_move',
						`no_of_bedroom`   = '$no_of_bedroom',
						`item_move`   = '$item_move',
						`budget_price`   = '$budget_price',
						`register_date`   = '$register_date'");
	
	//$db->insertDataArray(TBL_USER_REGISTER,$_POST);
	
	$to = 'service@ufirstmoving.com' ;
	$from_name = $name;
	$from_email = $email;
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'To:  <'.$to.'>' . "\r\n";
	$headers .= 'Cc: Soumyadeb <ghoshsoumyadeb@gmail.com>' . "\r\n";
	$headers .= 'From: '.$from_name.' <'.$from_email.'>'."\r\n" ;

	
//	$sent_message = "Dear ".ucfirst(stripslashes($_POST['name'])).",<br/> "
 
   if($_REQUEST['custom']==0) {$estimate_type = 'Custom Estimate' ; }else if($_REQUEST['custom']==1){$estimate_type = 'Name Your Price' ; }
	
  $sent_message = "<br/>One Quick Freight Quote has been submitted. The following describes the details:
				<br/><br/>
				<b>Name:</b> ".ucfirst($name)."<br/>
				<b>Email Address:</b> ".$email."<br/>
				<b>Phone No:</b> ".$phone."<br/><br/>";
	if($_REQUEST['custom']==0){
	$sent_message .="<b>Custom Estimate:</b> ".$estimate_type."<br/>";
	}
	if($_REQUEST['custom']==1){
	$sent_message .="<b>Name Your Price:</b> ".$estimate_type."<br/>";
	}
	
	//if($_REQUEST['custom']==1){
    $sent_message .= "<br/>
				<b>Physical Address:</b> ".ucfirst($physical_address)."<br/>
				<b>To Address:</b> ".ucfirst($to_address)."<br/>
 			    <b>Date of Move:</b> ".$date_of_move."<br/>
 			    <b>No of bedrooms:</b> ".$no_of_bedroom."<br/>
 			    <b>Mis. item move:</b> ".$item_move."<br/>
				<b>Your budget price :</b> ".$budget_price."<br/><br/>";
	
	//}

	
	
	$subject = "ufirstmoving.com - Quick Freight Quote";
	if(mail($to, $subject, $sent_message, $headers)){		
		$message = "Success:You have successfully contacted to the ufirstmoving.com";
	}		
/*}else{
		$message = "Error:Email address already exist";
	}*/
}
include_once("includes/header.php");


?>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" />
<link rel="stylesheet" href="css/notifyBar.css" />
<link rel="stylesheet" type="text/css" href="css/slider.css" />
<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="js/jquery.notifyBar.js"></script>
<script type="text/javascript"  src="js/slider.js"></script>
<script>	
$(document).ready(function() {
	$("#user_register").validationEngine({scroll:true})
});
/*function checkupload_type(val){
	if(val==0){
		document.getElementById('showHTML').style.display = 'none';
	}else{
		document.getElementById('showHTML').style.display = '';
	}
}*/
/*checkupload_type(0) ;*/
</script>
<body id="page1">
<div class="bg">
<!--==============================header=================================-->
<header class="header">
   	<?php include_once("includes/menu.php");?>  
    
    
    <div class="row-2">
    	<div class="flash">
        <div class="box-3">
        
           		<!--<div class="padding">
                	<h5>Quick Freight Quote</h5>
                    <p class="p1">
                    	Fill out our online freight quote form so we can respond with our shipping options and rates.
                    </p>
                    <div class="p1">
                    
                    
                        <form id="form-top" action="" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-top">					
                                    <div class="col-3">
                                        <span><input name="name" value="Name...." onBlur="if(this.value=='') this.value='Name....'" onFocus="if(this.value =='Name....' ) this.value=''" /></span>
                                        <span><input name="name" value="Phone Number...." onBlur="if(this.value=='') this.value='Phone Number....'" onFocus="if(this.value =='Phone Number....' ) this.value=''" />
 </span>
                                         <span><input name="name" value="Email Address...." onBlur="if(this.value=='') this.value='Email Address....'" onFocus="if(this.value =='Email Address....' ) this.value=''" />
 </span>
 
 
                                        
                                      
                                        
                                        
                                        
                                        
                                  </div>
                                  
	

<div class="radioArea">

<div class="customRdio">
  <div class="radioSelection"><input name="1" type="radio" value=""></div>
  <p>Custom Estimate</p>
</div>

<div class="customRdio nomargn">
  <div class="radioSelection"><input name="1" type="radio" value=""></div>
  <p>Name Your Price</p>
</div>

</div>

<div class="col-3">
                                        <span><input name="name" value="Physical address...." onBlur="if(this.value=='') this.value='Physical address....'" onFocus="if(this.value =='Physical address....' ) this.value=''" /></span>
                                        <span><input name="name" value="To address...." onBlur="if(this.value=='') this.value='To address....'" onFocus="if(this.value =='To address....' ) this.value=''" />
 </span>

<span><input class="calenderArea" name="name" value="Date of move...." onBlur="if(this.value=='') this.value='Date of move....'" onFocus="if(this.value =='Date of move....' ) this.value=''" />
<img class="calIcon" src="images/1385063179_Calendar.png" width="32" height="32" alt="calender">
 </span>
 
                                         <span><input name="name" value="Email Address...." onBlur="if(this.value=='') this.value='Email Address....'" onFocus="if(this.value =='Email Address....' ) this.value=''" />
 </span>                                     
                                         <span><input name="name" value="Email Address...." onBlur="if(this.value=='') this.value='Email Address....'" onFocus="if(this.value =='Email Address....' ) this.value=''" />
 </span>                                       
                                        
                                          <span><input name="name" value="Your budget price...." onBlur="if(this.value=='') this.value='Your budget price....'" onFocus="if(this.value =='Your budget price....' ) this.value=''" />
 </span>                                      
                                        
  <div class="col-4">
<a href="#" onClick="document.getElementById('form-top').submit()">GO!</a>
</div>                                      
                                  </div>

                                    							
                                </div>
                                
                                
                                
                            </fieldset>
                        </form>
                        
                        
                        
                    </div>
                  <div class="wrapper">
                        <figure class="img-indent5"><img src="images/icon-1.png" alt=""></figure>
                        <div class="extra-box">
                        	<h6 class="margin-top1 p00">Live Logistics Help at</h6>
                            <div class="phone">+ 1 234 567 890</div>
                        </div>
                    </div> validate[required,custom[onlyNumber]]
                </div>-->
                
               <div class="freeQujoteArea">
              <h1>QUICK FREIGHT QUOTE</h1>
              <p>Fill out our online freight quote form so we can respond with our shipping options and rates.</p>
              <div class="freequoteField">
              <form action="" name="user_register" id="user_register" method="post">
                <div class="usernmeFld"><input name="name" id="name" value="" onBlur="if(this.value=='') this.value='Name....'" onFocus="if(this.value =='Name....' ) this.value=''" class="validate[required]" placeholder="Name...." /></div>
                                <div class="usernmeFld"><input name="phone" id="phone" value="" onBlur="if(this.value=='') this.value='Phone Number....'" onFocus="if(this.value =='Phone Number....' ) this.value=''" class="validate[required]" placeholder="Phone Number...." /></div>
     
                                 <div class="usernmeFld"><input name="email" id="email" value="" onBlur="if(this.value=='') this.value='Email Address....'" onFocus="if(this.value =='Email Address....' ) this.value=''" class="validate[required],custom[email]" placeholder="Email Address...." /></div>  
                                 
                    <div class="usernmeFld">
                    
                      <div class="radioSec">
                        <div class="radioSelectArea"><input name="custom" type="radio" value="0" checked="checked" style="cursor:pointer;"></div>
                        <p>Custom Estimate</p>
                      </div>
                      
                      <div class="radioSec">
                        <div class="radioSelectArea"><input name="custom" type="radio" value="1" style="cursor:pointer;"></div>
                        <p>Name Your Price</p>
                      </div>
                      
                      
                    </div>
					
										 
                     <!--<div id="showHTML" style="display:none;">-->                                         
                                
                                  <div class="usernmeFld"><input name="physical_address" id="physical_address" value="" onBlur="if(this.value=='') this.value='Physical Address....'" onFocus="if(this.value =='Physical Address....' ) this.value=''" class="validate[required]" placeholder="Physical Address...." /></div> 
                                  
                                    
      <div class="usernmeFld"><input name="to_address" id="to_address" value="" onBlur="if(this.value=='') this.value='To Address....'" onFocus="if(this.value =='To Address....' ) this.value=''" class="validate[required]" placeholder="To Address...." /></div>
  
       <div class="usernmeFld">
       <div class="dateofMve"><input name="date_of_move" id="date_of_move" readonly="readonly" value="" onBlur="if(this.value=='') this.value='Date of Move....'" onFocus="if(this.value =='Date of Move....' ) this.value=''" class="validate[required]"  placeholder="Date of Move...."/></div>
       <div class="calenderIcn"><!--<img src="images/1385063179_Calendar.png" width="32" height="32" alt="der">-->
	   <a href="javascript:void(0)" onClick="gfPop.fStartPop(document.user_register.date_of_move,document.user_register.date_of_move);return false;" HIDEFOCUS >
	       <img name="popcal" align="absmiddle" src="<?PHP echo(SITE_URL);?>calender/1385063179_Calendar.png" width="32" height="32" border="0" alt=""/>
	   </a></div>
       </div>
       <div class="usernmeFld">
         <div class="nofBdRm">
           <div class="usernmeFld">
             <div class="nofBdRm">
               <input name="no_of_bedroom" id="no_of_bedroom" value="" onBlur="if(this.value=='') this.value='No. of bedrooms....'" onFocus="if(this.value =='No. of bedrooms....' ) this.value=''"  class="validate[required]" maxlength="3" placeholder="No. of bedrooms...." />
             </div>
             <div class="nofBdRm">
               <input name="item_move" id="item_move" value="" onBlur="if(this.value=='') this.value='Mis. item move....'" onFocus="if(this.value =='Mis. item move....' ) this.value=''" class="validate[required]" maxlength="4" placeholder="Mis. item move...." />
             </div>
           </div>
         </div>
       </div>
	   
	   
	   
  <div class="nofBdRm"><input name="budget_price" id="budget_price" value="" onBlur="if(this.value=='') this.value='Your budget price....'" onFocus="if(this.value =='Your budget price....' ) this.value=''" class="validate[required]" placeholder="Your budget price...." /></div>
  
  
 <!--</div>--> 

  
<div class="goBtnArea">
  <input class="gosubmitBtn" name="submit" type="submit" value="GO">
  </div>                                
              </form>
              </div>
               </div> 
                
                
                
                
           </div>
        
   
           <div class="banner">
                <div class="text-2">Trucking &amp; Freight Hauling Services</div>
                <div class="text-3">from Transportation</div>
                <div class="text-4">
                	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br>veniam, quis nostrud exercitation.
                </div>
           </div>
           
           <div class="flashBannerRight">
		   <div id="slideshow">
           <img src="images/new-banner.png" width="623" height="330" alt="banner" class="active">
		   <img src="images/slide-2.png" width="623" height="330" alt="banner">
		   </div>
		   <div class="rightbannerAds"><img src="images/Middle-Home-Page-Banner.png" width="623" height="72" alt="midbanner"></div> 
           </div>
		   

      </div>
        <div class="container_24">
            <div class="main">
                <div class="wrapper">
                    <article class="grid_8 alpha"></article>
                    <article class="grid_8"></article>
                    <article class="grid_8 omega"></article>
                </div>
            </div>
        </div>
    </div>
	<div class="leftBannerUfirst"><img src="images/ufirstmoving-4.gif" width="185" height="414" alt="leftBanner"></div>
	<div class="rightBannerUfirst"><img src="images/upper-right-banner.png" width="144" height="360" alt="rightBanner"></div>
</header>

<!--==============================content================================-->
    <section id="content">
        <div class="container_24">
            <div class="main">
                <div class="padding">
                    <div class="wrapper">
                        <article class="grid_7 alpha">
                           <div class="wrapper p4">
                               <figure class="img-indent1"><img src="images/page1-img4.png" alt=""></figure>
                               <div class="extra-box">
                                	<h2>Cost<span class="small">of order</span></h2>
                                    <a class="button-2" href="#">calculate now</a>
                               </div>
                           </div>
						   <div class="wrapper p4">
                               <figure class="img-indent1"><img src="images/page1-img5.png" alt=""></figure>
                               <div class="extra-box">
                                	<h2>track<span class="small">cargo</span></h2>
                                    <a class="button-2" href="#">Click here</a>
                               </div>
                           </div>
						   <div class="extra-box">
								<dl class="contact">
									<dt>Demolink.org  8901 Marmora Road, Glasgow,<br>D04 89GR.</dt>
									<dd><span>Telephone:</span> +1 959 552 5963</dd>
									<dd><span>FAX:</span> +1 959 552 5963</dd>
									<dd>E-mail: <a class="link" href="mailto:mail@companyname.com">mail@demolink.org</a></dd>
								</dl>
							</div>
                        </article>
                        <article class="grid_16 prefix_1 omega">
                           <h2 class="p2">Welcome <span class="small-1">to our company</span></h2>
                           <p class="text-1">
                           	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco labori.
                           </p>
                           <div class="wrapper">
						   		<article class="grid_7 alpha">
									<h6>Lorem ipsum dolor sit amet</h6>
									<p class="indent-bot">
										Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing eli im.
									</p>
									<a class="button-3" href="#">Read more</a>
								</article>
								<article class="grid_7 prefix_1">
									<h6>Set dolor  ipsum dolor sit amet</h6>
									<p class="indent-bot">
										Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing eli im.
									</p>
									<a class="button-3" href="#">Read more</a>
								</article>
						   </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<iframe width="174" height="189" name="gToday:normal1:agenda1.js" id="gToday:normal1:agenda1.js" src="<?PHP echo(SITE_URL);?>calender/ipopeng.htm" scrolling="no" frameborder="0" style="LEFT: -500px; POSITION: absolute; TOP: 0px; VISIBILITY: visible; Z-INDEX: 999">
</iframe>
<!--==============================footer=================================-->
<?php include_once("includes/footer.php");?>
<?php
if((isset($message) && $message!='') || (isset($_GET['message']) && $_GET['message']!=''))
{
	if(isset($_GET['message']) && $_GET['message']!='')
	{
		$msg = base64_decode($_GET['message']);
		//$msg = $_GET['message'];
	}
	if(isset($message) && $message!='')
	{
		$msg = $message;
	}
	$split_message = explode(':',$msg);
	if($split_message[0] == "Success")
	{
?>
<script type="text/javascript">
	$(function() {
	 $.notifyBar({ cls: "success", html: "<?php echo($split_message[1])?>", delay: 2000, animationSpeed: "slow" });
	});
</script>
<?php
	}
	if($split_message[0] == "Error")
	{
?>
<script type="text/javascript">
	$(function() {
	 $.notifyBar({ cls: "error", html: "<?php echo($split_message[1])?>", delay: 2000, animationSpeed: "slow" });
	});
</script>
<?php
	}
}
?>