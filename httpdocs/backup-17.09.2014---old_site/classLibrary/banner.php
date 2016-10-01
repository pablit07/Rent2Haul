
<?php if($_POST['submit1']){
		
	$your_name    = $_REQUEST['your_name'] ;
	$your_email   = $_REQUEST['your_email'] ;
        $your_time    = $_REQUEST['your_time'] ;
	$your_phone   = $_REQUEST['your_phone'] ;
    
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	$your_email_from = 'pankaj.sharma@sabmecto.net';
	//$your_email_from = 'from_info@dksinfocon.net' ;
	$to = 'pankajinfo.sharma@gmail.com';
	//$to = 'amir@movers201.com';
	//$to              =   'info@dksinfocon.net,ghoshsoumyadeb@gmail.com' ;
	// Additional headers
	$headers .= 'To: <'.$to.'>' . "\r\n";
	$headers .= 'From: '.$your_name.' <'.$your_email_from.'>' . "\r\n";
	$headers .= 'X-Mailer: PHP/' . phpversion();
	
	
		$message="<html>
				<head>
				<title>Get Quick Response - MOVERS201</title>
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
					<td width='80%'>".stripslashes($your_name)."</td>
				  </tr>
				  <tr>
					<td><strong>Email:</strong></td>
					<td>".stripslashes($your_email)."</td>
				  </tr>
				  <tr>
					<td><strong>Call me Now:</strong><br/>
					(need to be when<br/> to call)
					</td>
					<td>".stripslashes($your_time)."</td>
				  </tr>
				  <tr>
					<td valign='top'><strong>Phone:</strong></td>
					<td>".stripslashes($your_phone)."</td>
				  </tr>
				</table>
				</body>
				</html>";
	
	
	
	$subject  = 'MOVERS201' ;
	
	if(mail($to, $subject, $message, $headers)){
		$msgb = '<p class="alerttext">Thank you. Your information has been submitted.!</p> ';
	}

    }
?>

<!--banner-->
            	<div class="banner"><img src="images/bannertop.png" width="1002" height="12" alt="" title="" class="floatLeft" />
                <div class="bannerbg">                
                <img src="images/banner-1.jpg" width="713" height="321" alt="" title="" class="floatLeft" />
				
				<form action="" name="form1" id="form1" method="post" >
                <div class="yellowpannel">
                	<h3>Get Quick Response </h3> 
					<?php if(isset($msgb)) { ?> 
					<?php echo $msgb  ?>
                                       
					<?php } ?>
					
                    <dl>
                    	<dt>Full Name</dt>
                        <dd><input type="text" class="inputblock"  name="your_name" id="your_name" /></dd>
                    </dl>
                    
                    <dl>
                    	<dt>Email</dt>
                        <dd><input type="text" class="inputblock" name="your_email" id="your_email" /></dd>
                    </dl>
                    
                    <dl>
                    	<dt>When to Contact You?</dt>
                        <dd class="inputblockbg"><select class="inputblock2" name="your_time" id="your_time" >
						    <option value="">Call me Now</option>
                        	<option value="8-10am">8-10am</option>
                            <option value="10-12am">10-12am</option>
                            <option value="12-2pm">12-2pm</option>
							<option value="2-4pm">2-4pm</option>
							<option value="4-6pm">4-6pm</option>
							<option value="4-6pm">6-8pm</option>
							<option value="8-10pm">8-10pm</option>
							<option value="E-mail only">E-mail only</option>
                        </select></dd>
                    </dl>
                    
                    <dl>
                    	<dt>Best Phone Number</dt>
                        <dd><input type="text" class="inputblock" name="your_phone" id="your_phone" /></dd>
                    </dl>
                    
                    <input type="submit" name="submit1" class="blackbutton" value="Submit" />
                       
                </div>
                    
                </div>
                <img src="images/bannerBottom.png" width="1002" height="29" alt="" title="" class="floatLeft" /></div>
            <!--banner end-->