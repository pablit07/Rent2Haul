<?php
$to = 'ghoshsoumyadeb@gmail.com,joydeep.dutta@sabmecto.net';
$subject = 'This is the test mail';
$message = 'Hello from the Rent2haul. Your php mail is working';
$headers = 'From: service@rent2haul.com' . "\r\n" .
    'Reply-To: service@rent2haul.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message, $headers);
?>