<?php
// DECLARING THE CURL FUNCTION 
function curl($url) {
	$ch = curl_init();	// Initialising cURL
	curl_setopt($ch, CURLOPT_URL, $url);	// Setting cURL's URL option with the $url variable passed into the function
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);	// Setting cURL's option to return the webpage data
	$data = curl_exec($ch);	// Executing the cURL request and assigning the returned data to the $data variable
	curl_close($ch);	// Closing cURL
	return $data;	// Returning the data from the function
}

//GETING THE LAN AND LON
$lat = $_REQUEST['lat'];
$lon = $_REQUEST['lon'];
$ind = $_REQUEST['ind'];


//GET THE NEWS FROM THE WEBSITE 
$getFullUrl = 'http://www.heatmapnews.com/news/articles/?index='.$ind.'&date=now&lat='.$lat.'&lng='.$lon.'';
$jsonArray[] = json_decode(curl($getFullUrl),TRUE);
$componetArray = $jsonArray[0][0]['fields'];
if(count($componetArray) > 0){
if(!empty($componetArray['image_url'])){ $imagePath = $componetArray['image_url'] ; }else{ $imagePath = 'images/no.jpg'; }		
?>
<img src="images/cross.png" width="128" height="128" id="cross" onclick="hide('window')">
<h2><a href="<?php echo $componetArray['article_url']; ?>" target="_blank"><?php echo $componetArray['title']; ?></a></h2>
<div id="article">
<img id="article-image" src="<?php echo $imagePath; ?>">
<p id="article-summary"><?php echo $componetArray['summary']; ?></p>
</div>
<div id="prev-article" class="button" onclick="prev('<?php echo $lat; ?>','<?php echo $lon; ?>',<?php echo $ind; ?>)">Previous</div>
<a id="cluster-link" class="button" href="<?php echo $componetArray['cluster_url']; ?>" target="_blank">All related articles</a>
<div id="next-article" class="button" onclick="next('<?php echo $lat; ?>','<?php echo $lon; ?>',<?php echo $ind; ?>)">Next</div>
<?php
}else{
echo 1;	
}
?>
