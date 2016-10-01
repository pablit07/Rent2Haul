<?php
$to = 'joydeep.dutta@sabmecto.net';
$sent_message = "";
$from_name = "TESTMAIL";
$from_email = 'service@ufirstmoving.com';
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$from_name.' <'.$from_email.'>'."\r\n" ;
$sent_message = 'The Test Email';
$subject = "New Article Has Been Posted";
mail($to, $subject, $sent_message, $headers);
?>