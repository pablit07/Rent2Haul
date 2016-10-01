<?php 
include_once("configure.php");
$page_title = "Moving Reviews";
if(isset($_POST['email']) && $_POST['email']!=""){
$first_name      = addslashes(trim($_POST['first_name']));
$city       = addslashes(trim($_POST['city']));
$email           = addslashes(trim($_POST['email']));
$rating          = addslashes(trim($_POST['rating']));
$comment         = addslashes(trim($_POST['comment']));
$date			 = date("Y-m-d");
mysql_query("INSERT INTO ".TBL_USER_REVIEW." SET
			`first_name`   = '$first_name',
			`city`   = '$city',
			`email`   = '$email',
			`rating`   = '$rating',
			`comment`   = '$comment',
			`review_date`  = '$date'");
$message = "Success:You have successfully inserted rating to the ufirstmoving.com";
}
include_once("includes/header.php");
?>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" />
<link rel="stylesheet" href="css/notifyBar.css" />
<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="js/jquery.notifyBar.js"></script>
<script type="text/javascript">
$(document).ready(function() {
		$("#contact-form").validationEngine({scroll:true})
		
		$('#sbmt').click(function(){
		flag=true;
		
			if(flag){
			 $('#contact-form').submit();
			}
		});
	});
</script>
<body id="page2">
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
                        <article class="grid_16 prefix_1 omega">
                           <h2 class="indent-bot">Moving <span class="small-1">Reviews</span></h2>
                           <h6>Read unedited moving reviews from real ufirstmoving.com customers from all around the United States. No matter where you're moving, you can trust the professionals at your local ufirstmoving.com.</h6>
						   <div class="wrapper p6">
							   <p class="indent-bot">
									Like what you read? Request a Free Moving Quote or use the form to the right to get started. We'd love to make you just as happy.
							   </p>
							   <!--<a class="button-3" href="#" style="width:600px; height:150px;"></a>-->
						   </div>
						   <div id="contact_form" class="margin-top-minus50">
								<form action="" method="post" name="contact-form" id="contact-form">
									<fieldset>
										<div class="field">
											<input name="first_name" id="first_name" type="text" placeholder="First Name" value="" class="text-input validate[required]" onFocus="if(this.value=='First Name'){this.value=''}" onBlur="if(this.value==''){this.value='First Name'}" />
											<label class="error" for="name" id="name_error">*This field is required.</label>
											<label class="error" for="name" id="name_error2">*This is not a valid name.</label>
										</div>
										<div class="field">
											<input name="city" id="city" type="text" placeholder="City" value="" class="text-input validate[required]" onFocus="if(this.value=='City'){this.value=''}" onBlur="if(this.value==''){this.value='City'}" />
											<label class="error" for="name" id="name_error">*This field is required.</label>
											<label class="error" for="name" id="name_error2">*This is not a valid name.</label>
										</div>
										<div class="field">
											<input name="email" id="email" type="text" placeholder="E-mail:" value="" class="text-input validate[required,custom[email]]" onFocus="if(this.value=='E-mail:'){this.value=''}" onBlur="if(this.value==''){this.value='E-mail:'}" />
											<label class="error" for="email" id="email_error">*This field is required.</label>
											<label class="error" for="email" id="email_error2">*This is not a valid email address.</label>
										</div>
										<div class="field">
											<select name="rating" id="rating" class="contact-select validate[required]">
												<option value="">Select Rating</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
										
											</select>
										</div>                        
										<div class="area">
											<textarea name="comment" id="comment" placeholder="Comments" class="text-input validate[required]" onFocus="if(this.value=='Comments'){this.value=''}" onBlur="if(this.value==''){this.value='Comments'}"></textarea>
											<label class="error" for="message" id="message_error">*This field is required.</label>
											<label class="error" for="message" id="message_error2">*The message is too short.</label>
											<div class="clear"></div>
											<div class="buttons-wrapper float-left" style="margin-left:-15px;"><a href="javascript:void(0)" id="sbmt" class="button">Submit</a></div>
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