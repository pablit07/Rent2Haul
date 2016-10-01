<?php
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
	$register_date = date("Y-m-d");
	mysql_query("INSERT INTO ".TBL_FREIGHT." SET
						`name`   = '$name',
						`phone`   = '$phone',
						`email`   = '$email',
						`custom`   = '$custom',
						`physical_address`   = '$physical_address',
						`to_address`   = '$to_address',
						`date_of_move`   = '$date_of_move',
						`register_date`   = '$register_date'");
	
	//$db->insertDataArray(TBL_USER_REGISTER,$_POST);
	
	$to = 'service@ufirstmoving.com' ;
	$from_name = $name;
	$from_email = $email;
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'To:  <'.$to.'>' . "\r\n";
	$headers .= 'Cc: Soumyadeb <ajbracken@yahoo.com>' . "\r\n";
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
 			    <b>Date of Move:</b> ".$date_of_move."<br/>";
	
	//}

	
	
	$subject = "ufirstmoving.com - Quick Freight Quote";
	if(mail($to, $subject, $sent_message, $headers)){		
		$message = "Success:You have successfully contacted to the ufirstmoving.com";
	}		
/*}else{
		$message = "Error:Email address already exist";
	}*/
}
?>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" />
<link rel="stylesheet" href="css/notifyBar.css" />
<script src="js/jquery-1.5.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="js/jquery.notifyBar.js"></script>
<script type="text/javascript">	
$(document).ready(function() {
	$("#user_register").validationEngine({scroll:true})
});
</script>
<div class="rightContentArea">
      <div class="quoteArea">
      <h3>Quick Freight Quote</h3>
      <p>Fill out our online moving quote form so a representative can call you shortly or call 720-301-9819</p>
      <div class="fieldArea">
      <form action="" name="user_register" id="user_register" method="post">
        <div class="field1"><input name="name" id="name" value="" type="text" onBlur="if(this.value=='') this.value='Name....'" onFocus="if(this.value =='Name....' ) this.value=''" class="validate[required]" placeholder="Name...." /></div>
        <div class="field1"><input type="text" name="phone" id="phone" value="" onBlur="if(this.value=='') this.value='Phone Number....'" onFocus="if(this.value =='Phone Number....' ) this.value=''" class="validate[required]" placeholder="Phone Number...." /></div>
        <div class="field1"><input type="text" name="email" id="email" value="" onBlur="if(this.value=='') this.value='Email Address....'" onFocus="if(this.value =='Email Address....' ) this.value=''" class="validate[required],custom[email]" placeholder="Email Address...." /></div>
        <div class="fieldArea">
        <div class="customEst">
        <div class="radioArea"><input name="custom" type="radio" value="0" checked="checked" style="cursor:pointer;" /></div>
        <p>Custom Estimate</p>
        </div>
        
        <div class="customEst">
        <div class="radioArea"><input name="custom" type="radio" value="1" style="cursor:pointer;" /></div>
        <p>Name Your Price</p>
        </div>
        
        <div class="field1"><input type="text" name="physical_address" id="physical_address" value="" onBlur="if(this.value=='') this.value='Physical Address....'" onFocus="if(this.value =='Physical Address....' ) this.value=''" class="validate[required]" placeholder="Physical Address...." /></div>
        <div class="field1"><input type="text" name="to_address" id="to_address" value="" onBlur="if(this.value=='') this.value='To Address....'" onFocus="if(this.value =='To Address....' ) this.value=''" class="validate[required]" placeholder="To Address...." /></div>
        <div class="calenderArea">
          <div class="calenderField"><input type="text" name="date_of_move" id="date_of_move" readonly value="" onBlur="if(this.value=='') this.value='Date of Move....'" onFocus="if(this.value =='Date of Move....' ) this.value=''" class="validate[required]"  placeholder="Date of Move...." /></div>
          <div class="calIconarea"><a href="javascript:void(0)" onClick="gfPop.fStartPop(document.user_register.date_of_move,document.user_register.date_of_move);return false;" HIDEFOCUS ><img name="popcal" align="absmiddle" src="<?PHP echo(SITE_URL);?>images/clndr.png" width="35" height="31" alt="calender" /></a></div>
        </div>
        <!--<div class="field1"><input type="text" name="item_move" id="item_move" value="" onBlur="if(this.value=='') this.value='Mis. item move....'" onFocus="if(this.value =='Mis. item move....' ) this.value=''" class="validate[required]" placeholder="Mis. item move...." /></div>-->
        <!--<div class="calenderArea">
          <div class="bedroomfield"><input type="text" name="no_of_bedroom" id="no_of_bedroom" value="" onBlur="if(this.value=='') this.value='No. of bedrooms....'" onFocus="if(this.value =='No. of bedrooms....' ) this.value=''"  class="validate[required]" maxlength="2" placeholder="No. of bedrooms...." /></div>
          <div class="bedroomfield budget"><input type="text" name="budget_price" id="budget_price" value="" onBlur="if(this.value=='') this.value='Budget price....'" onFocus="if(this.value =='Budget price....' ) this.value=''" class="validate[required]" placeholder="Budget price...." /></div>
        </div>-->
        <div class="gobtnArea">
        <input class="gocolorbtn" name="submit" type="submit" value="GO" />
        </div>
        </div>
      </form>
      </div>
      
      
      
      
      </div>
      
      <!--<div class="quoteArea">
      <div class="searchNew">Search News &amp; Articles</div>
            <div class="fieldArea">
      <form action="news-articles.php" name="news_articles" method="post">
        <div class="field1"><input name="news" type="text" value="<?php //echo (isset($_REQUEST['news']) && $_REQUEST['news']!="" ? $_REQUEST['news'] : "")?>" /></div>
        <div class="searchBtn">
        <input class="searchcolor" name="search" type="submit" value="Search" />
        </div>
        
      </form>
      </div>
      
      
      
      
      </div>-->
      <?php 
	  /*$news_post_sql = mysql_query("SELECT * FROM ".TBL_NEWS_ARTICLES." WHERE status = '1' ORDER BY id DESC LIMIT 0,5");
	  $total_news_post = mysql_num_rows($news_post_sql);*/
	  ?>
      <!--<div class="recentPostArea">
      <h4>Recent Posts</h4>
      <ul>
      <?php 
	  /*if($total_news_post > 0){
	  while($row_news_post = mysql_fetch_array($news_post_sql)){*/?>
      <li><a href="news-articles-details.php?id=<?php //echo $row_news_post['id']?>"><?php //echo $row_news_post['title']?></a></li>
      <?php 
	  		/*}
	  	}*/
	  ?>
      </ul>
      </div>-->
      <?php 
	  /*$category_sql = mysql_query("SELECT * FROM ".TBL_CATEGORY." WHERE status = '1' ORDER BY id ASC");
	  $total_category = mysql_num_rows($category_sql);*/
	  ?>
      <!--<div class="recentPostArea">
      <h4>Categories</h4>
      <ul>
      <?php 
	  /*if($total_category > 0){
	  while($row_category = mysql_fetch_array($category_sql)){*/?>
      <li><a href="news-articles-category.php?id=<?php //echo $row_category['id']?>"><?php //echo $row_category['category_name']?></a></li>
      <?php 
	  		/*}
	  	}*/
	  ?>
      </ul>
      </div>-->
      
      
    </div>