<?php include('twitteroauth.php'); ?>
<?php
function getTweets($twitteruser) { 
    $notweets = 5;
   $consumerkey = "tLaJaEYd5bDAKmpvGXwJ60Inn";
   $consumersecret = "02YjjimrPA7TL9WbC9Efv9TRBiQaczYfFFguPIO3FirBciBgGw";
   $accesstoken = "129848570-fRbprZZL7wwjathGt56Vx7SX1ImPpIoVrkNbmC8q";
   $accesstokensecret = "I632GO7CHTpS3nJVF0y21mQ1i0ZB2GgrnzakT6WjG8Ytc";
      
    function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
      $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
      return $connection;
    }
       
    $connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
    $tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
     
    return ($tweets);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php 
$tweets = getTweets($twitteruser);
foreach ($tweets as $line){
    $status = $line->text;
    $tweetTime =  $line->created_at;
    $tweetId = $line->id_str;
    $outputTweet = '<li>'.$status.'</span> <a style="font-size:85%" href="http://twitter.com/'.$twitteruser.'/statuses/'.$tweetId.'">'. $tweetTime .'</a></li>';
    echo $outputTweet;    
}
?>
</body>
</html>