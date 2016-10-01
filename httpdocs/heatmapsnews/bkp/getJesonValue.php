<?php
echo "<pre>";
// DECLARING THE CURL FUNCTION 
include('config.php');

function curl($url) {
	$ch = curl_init();	// Initialising cURL
	curl_setopt($ch, CURLOPT_URL, $url);	// Setting cURL's URL option with the $url variable passed into the function
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);	// Setting cURL's option to return the webpage data
	$data = curl_exec($ch);	// Executing the cURL request and assigning the returned data to the $data variable
	curl_close($ch);	// Closing cURL
	return $data;	// Returning the data from the function
}

$sql = "TRUNCATE TABLE  `google_news_cordinate`";
$getTRINCATE = mysql_query($sql);

if($getTRINCATE){

//GET THE NEWS FROM THE WEBSITE 
$getFullUrl = 'http://www.heatmapnews.com/news/locations/?date=now';
$jsonArray[] = json_decode(curl($getFullUrl),TRUE);
for($i=0;$i<=1993;$i++){
		if((!empty($jsonArray[0][$i]['fields']['location'][1])) && (!empty($jsonArray[0][$i]['fields']['location'][2]))){
		$sqlINSERT = "INSERT INTO  google_news_cordinate SET country='".$jsonArray[0][$i]['fields']['location'][0]."',lat='".$jsonArray[0][$i]['fields']['location'][1]."',lng='".$jsonArray[0][$i]['fields']['location'][2]."'";	
		$getEXEINSERT = mysql_query($sqlINSERT);
		}
	}
}
?>
