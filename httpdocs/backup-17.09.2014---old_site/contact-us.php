<?php 
include_once("configure.php");
$page_title = "Contact Ufirst Moiving Company";
if(isset($_POST['email']) && $_POST['email']!=""){
$name           = addslashes(trim($_POST['name']));
$email           = addslashes(trim($_POST['email']));
$phone         = addslashes(trim($_POST['phone']));
$message         = addslashes(trim($_POST['message']));
mysql_query("INSERT INTO ".TBL_USER_CONTACT." SET
						`name`   = '$name',
						`email`   = '$email',
						`phone`   = '$phone',
						`message`  = '$message'");

	$to = 'service@ufirstmoving.com' ;
	$from_name = $name;
	$from_email = $email;
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'To:  <'.$to.'>' . "\r\n";
	$headers .= 'Cc: Soumyadeb <ghoshsoumyadeb@gmail.com>' . "\r\n";
	$headers .= 'From: '.$from_name.' <'.$from_email.'>'."\r\n" ;
	
	$send_message="<html>
				<head>
				<title>Contact Us - Team72</title>
				</head>
				<body>
				<br>
				<table border='0' align='center' width='100%'>
				  <tr>
					<td colspan='2'><strong>Contact Information Details</strong></td>
				  </tr>
				  <tr>
					<td colspan='2'>&nbsp;</td>
				  </tr>
				  <tr>
					<td width='20%'><strong>Name:</strong></td>
					<td width='80%'>".ucfirst(stripslashes($name))."</td>
				  </tr>
				  <tr>
					<td width='20%'><strong>Email:</strong></td>
					<td width='80%'>".stripslashes($email)."</td>
				  </tr>
				  <tr>
					<td width='20%'><strong>Phone:</strong></td>
					<td width='80%'>".stripslashes($phone)."</td>
				  </tr>
				  <tr>
					<td valign='top'><strong>Messages:</strong></td>
					<td>".ucfirst(nl2br(stripslashes($message)))."</td>
				  </tr>
				</table>
				</body>
				</html>";
	$subject = "Contact Us - ufirstmoving.com";
	if(mail($to, $subject, $send_message, $headers)){		
		$message = 'Success:Thank you for your query, we will get back to you shortly!';
	}else{
		$message="Error:Sorry, the query can't be sent at this moment.<br>";
	}
}
include_once("includes/header.php");
?>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" />
<link rel="stylesheet" href="css/notifyBar.css" />
<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="js/jquery.notifyBar.js"></script>
<script>	
	$(document).ready(function() {
		$("#contact-form").validationEngine({scroll:true})
		
		$('#sbmt').click(function(){
		flag=true;
		
			if(flag){
			 $('#contact-form').submit();
			}
		});
	});
	function reset_btn()
	{
		document.contact-form.name.value = "";
		document.contact-form.email.value = "";
		document.contact-form.phone.value = "";
		document.contact-form.message.value = "";
	}
</script>
<body id="page6">
<div class="bg-1">
<!--==============================header=================================-->
<header>
   	<?php include_once("includes/menu.php");?>  
</header>
<!--==============================content================================-->
    <section id="content">
        <div class="container_24">
            <div class="main">
                <div class="padding1">
                    <div class="wrapper">
                        <article class="grid_8 alpha">
                           <h2 class="indent-bot">contact <span class="small-1">info</span></h2>
						   <div class="map indent-bot">
								<iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Denver,+CO&amp;aq=0&amp;oq=denver&amp;sll=38.997934,-105.550567&amp;sspn=5.190325,10.821533&amp;ie=UTF8&amp;hq=&amp;hnear=Denver,+Colorado&amp;t=m&amp;ll=39.737818,-104.985352&amp;spn=0.316809,0.411987&amp;z=10&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Denver,+CO&amp;aq=0&amp;oq=denver&amp;sll=38.997934,-105.550567&amp;sspn=5.190325,10.821533&amp;ie=UTF8&amp;hq=&amp;hnear=Denver,+Colorado&amp;t=m&amp;ll=39.737818,-104.985352&amp;spn=0.316809,0.411987&amp;z=10&amp;iwloc=A" style="color:#0000FF;text-align:left">View Larger Map</a></small>
						   </div>
						   <h6>Call to schedule an free estimate. <strong>720-301-9819</h6></strong></h6>
						   		
                        </article>
                        <article class="grid_15 prefix_1 omega">
                           <h2 class="indent-bot">contact <span class="small-1">form</span></h2>
                           <div id="contact_form">
								<form action="" method="post" name="contact-form" id="contact-form">
									<fieldset>
										<div class="field">
											<input name="name" id="name" type="text" placeholder="Name:" value="" class="text-input validate[required]" onFocus="if(this.value=='Name:'){this.value=''}" onBlur="if(this.value==''){this.value='Name:'}" />
											<label class="error" for="name" id="name_error">*This field is required.</label>
											<label class="error" for="name" id="name_error2">*This is not a valid name.</label>
										</div>
										<div class="field">
											<input name="email" id="email" type="text" placeholder="E-mail:" value="" class="text-input validate[required,custom[email]]" onFocus="if(this.value=='E-mail:'){this.value=''}" onBlur="if(this.value==''){this.value='E-mail:'}" />
											<label class="error" for="email" id="email_error">*This field is required.</label>
											<label class="error" for="email" id="email_error2">*This is not a valid email address.</label>
										</div>
										<div class="field">
											<input name="phone" id="phone" type="text" placeholder="Phone:" value="" class="text-input validate[required]" onFocus="if(this.value=='Phone:'){this.value=''}" onBlur="if(this.value==''){this.value='Phone:'}"/>
											<label class="error" for="phone" id="phone_error">*This field is required.</label>
											<label class="error" for="phone" id="phone_error2">*This is not a valid phone number.</label>
										</div>                        
										<div class="area">
											<textarea name="message" id="message" placeholder="Message:" class="text-input validate[required]" onFocus="if(this.value=='Message:'){this.value=''}" onBlur="if(this.value==''){this.value='Message:'}"></textarea>
											<label class="error" for="message" id="message_error">*This field is required.</label>
											<label class="error" for="message" id="message_error2">*The message is too short.</label>
											<div class="clear"></div>
											<div class="buttons-wrapper"><a href="" id="clear" onClick="return reset_btn()" class="button">Clear</a> <a href="javascript:void(0)" id="sbmt" class="button">Submit</a></div>
										</div>
									</fieldset>
								</form>
							</div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
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