<?php
ob_start();
session_start(); 
//header('Content-type: text/html; charset=utf-8');
ini_set('max_execution_time', 50000000);

//$url = 'https://krb-sjobs.brassring.com/TGWebHost/searchopenings.aspx?partnerid=30030&siteid=5798';
/*$url = 'https://www.practo.com/mumbai/doctors?page=1';
$ch = curl_init();
$timeout = 555;

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$data = curl_exec($ch);
curl_close($ch);

$returned_content = $data;
echo $returned_content;*/
/*$error = substr($returned_content, 2, 5);
echo $error;*/

$opts = array('http' =>
	array( 'header' => 'User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.1; es-CL; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3' . PHP_EOL )
);
$context = stream_context_create($opts);

$limit = 1;

for($i=1;$i<=$limit;$i++){
		
	$scrap_data = 'https://www.practo.com/mumbai/doctors?page='.$i;
	//$scrap_data = "https://krb-sjobs.brassring.com/TGWebHost/searchopenings.aspx?partnerid=30030&siteid=5798";
	//$html = curl($scrap_data);
	$html = file_get_contents($scrap_data,false,$context);
	//echo $html;exit;
	$dom = new DOMDocument;
	@$dom->loadHTML($html);
	$pokemon_xpath = new DOMXPath($dom);
	
	$pokemon_row = $pokemon_xpath->query('//a[@class="link doc-name smokeliftDoctorLink"]/@href');
	if($pokemon_row->length > 0){
	foreach($pokemon_row as $key=>$value){
	//$pageLink[$i][$key]= 'http://whatsappvideo.net'.trim($value->nodeValue);
	$pageLink[$i][$key]= trim($value->nodeValue);
	}
	}
	
	}

	/*echo "<pre>";
	print_r($pageLink);
	echo "</pre>";*/
	
	
	//Gettring All The link To One Array	
	for($z=1;$z<=count($pageLink);$z++){
		for($q=0;$q<=count($pageLink[$z])-1;$q++){
			$toatlLink[] = $pageLink[$z][$q];	
		}	
	}
	
	//Each Link
	for($d=0;$d<=count($toatlLink)-1;$d++){
		
	$scrap_url = $toatlLink[$d];
	$html = file_get_contents($scrap_url,false,$context);
	$dom = new DOMDocument;
	@$dom->loadHTML($html);
	$pokemon_xpath = new DOMXPath($dom);	
	
		
	$pokemon_row = $pokemon_xpath->query('//h1');
	if($pokemon_row->length > 0){
	foreach($pokemon_row as $key=>$value){
	$arr[$d][0] = trim($value->nodeValue);
	}
	}
	
	$pokemon_row2 = $pokemon_xpath->query('//p[@class="doctor-qualifications"]');
	if($pokemon_row2->length > 0){
	foreach($pokemon_row2 as $key=>$value){
	$arr[$d][1] = preg_replace("/\s+/", " ",trim($value->nodeValue));
	}
	}
	
	$pokemon_row3 = $pokemon_xpath->query('//h2[@class="doctor-specialties"]');
	if($pokemon_row3->length > 0){
	foreach($pokemon_row3 as $key=>$value){
	$arr[$d][2] = preg_replace("/\s+/", " ",trim($value->nodeValue));
	}
	}
	
	$pokemon_row4 = $pokemon_xpath->query('//div[@class="doctor-summary"]');
	if($pokemon_row4->length > 0){
	foreach($pokemon_row4 as $key=>$value){
	$arr[$d][3] = preg_replace("/\s+/", " ",trim($value->nodeValue));
	}
	}
	
	$pokemon_row5 = $pokemon_xpath->query('//div[@class="doc-info-section specialties-block"]/p');
	if($pokemon_row5->length > 0){
	foreach($pokemon_row5 as $key=>$value){
	$arr[$d][4][$key] = trim($value->nodeValue);
	}
	}
	
	$pokemon_row6 = $pokemon_xpath->query('//div[@class="doc-info-section qualifications-block"]/p');
	if($pokemon_row6->length > 0){
	foreach($pokemon_row6 as $key=>$value){
	$arr[$d][5][$key] = trim($value->nodeValue);
	}
	}
	
	$pokemon_row7 = $pokemon_xpath->query('//div[@class="doc-info-section awards-block"]/p');
	if($pokemon_row7->length > 0){
	foreach($pokemon_row7 as $key=>$value){
	$arr[$d][6][$key] = trim($value->nodeValue);
	}
	}
	
	$pokemon_row11 = $pokemon_xpath->query('//div[@class="services-block"]/div');
	if($pokemon_row11->length > 0){
	foreach($pokemon_row11 as $key=>$value){
	$arr[$d][7][$key] = preg_replace("/\s+/", " ",trim($value->nodeValue));
	}
	}
	
		
	$pokemon_row5 = $pokemon_xpath->query('//div[@class="clinic-block"]//div[@class="clinic-locality"]');
	if($pokemon_row5->length > 0){
	foreach($pokemon_row5 as $key=>$value){
	$arr[$d][8][$key] = preg_replace("/\s+/", " ",trim($value->nodeValue));
	}
	}
	
	$pokemon_row8 = $pokemon_xpath->query('//div[@class="clinic-block"]//div[@class="clinic-address"]');
	if($pokemon_row8->length > 0){
	foreach($pokemon_row8 as $key=>$value){
	$arr[$d][9][$key] = preg_replace("/\s+/", " ",trim($value->nodeValue));
	}
	}
	
	$pokemon_row9 = $pokemon_xpath->query('//div[@class="clinic-block"]//div[@class="clinic-timings-wrapper"]/p[@class="clinic-timings-day"]');
	if($pokemon_row9->length > 0){
	foreach($pokemon_row9 as $key=>$value){
	$arr[$d][10][$key] = preg_replace("/\s+/", " ",trim($value->nodeValue));
	}
	}
	
	
	$pokemon_row10 = $pokemon_xpath->query('//div[@class="doc-info-section memberships-block"]/p');
	if($pokemon_row10->length > 0){
	foreach($pokemon_row10 as $key=>$value){
	$arr[$d][11][$key] = preg_replace("/\s+/", " ",trim($value->nodeValue));
	}
	}
	
	$pokemon_row11 = $pokemon_xpath->query('//div[@class="clinic-block"]//div[@class="clinic-fees"]/p');
	if($pokemon_row11->length > 0){
	foreach($pokemon_row11 as $key=>$value){
	$arr[$d][12][$key] = preg_replace("/\s+/", " ",trim($value->nodeValue));
	}
	}
	
	$pokemon_row13 = $pokemon_xpath->query('//div[@class="clinic-block"]//div[@class="clinic-timings-wrapper"]/p[@class="clinic-timings-session"]');
	if($pokemon_row13->length > 0){
	foreach($pokemon_row13 as $key=>$value){
	$arr[$d][13][$key] = preg_replace("/\s+/", " ",trim($value->nodeValue));
	}
	}
	
	$pokemon_row14 = $pokemon_xpath->query('//div[@class="doc-info-section registrations-block"]//span');
	if($pokemon_row14->length > 0){
	foreach($pokemon_row14 as $key=>$value){
	$arr[$d][14][$key] = str_replace("Registrations","",preg_replace("/\s+/", " ",trim($value->nodeValue)));
	}
	}
	
	
	
	}
	/*echo "<pre>";
	print_r($arr);
	echo "</pre>";*/
/*$str = file_get_contents('https://www.practo.com/mumbai/doctors?page=1',false,$context);	
echo $str;*/	
	


?>
<table width="100%" border="1">
  <tr>
    <td>Name</td>
    <td>About</td>
    <td>Address</td>
    <td>Working Days</td>
    <td>Working Time</td>
    <td>Fees</td>
    <td>Services</td>
    <td>Education</td>
    <td>Awards and Recognitions</td>
    <td>Memberships</td>
    <td>Registrations</td>
  </tr>
<?php
for($l=0;$l<=9;$l++){
?>  
   <tr>
    <td><?php echo $arr[$l][0]; ?></td>
    <td><?php echo $arr[$l][3]; ?></td>
    <td><?php if(!empty($arr[$l][9])){foreach($arr[$l][9] as $data1){ echo $data1.'<br />'.'---------------------------------------'.'<br />'; }}else{ 'No Data Found'; }?></td>
    <td><?php if(!empty($arr[$l][10])){foreach($arr[$l][10] as $data10){ echo $data10.'<br />'.'---------------------------------------'.'<br />'; }}else{ 'No Data Found'; }?></td>
    <td><?php if(!empty($arr[$l][13])){foreach($arr[$l][13] as $data13){ echo $data13.'<br />'.'---------------------------------------'.'<br />'; }}else{ 'No Data Found'; }?></td>
    <td><?php if(!empty($arr[$l][12])){foreach($arr[$l][12] as $data4){ echo $data4.'<br />'.'---------------------------------------'.'<br />'; }}else{ 'No Data Found'; }?></td>
    <td><?php if(!empty($arr[$l][7])){foreach($arr[$l][7] as $data2){ echo $data2.'<br />'.'---------------------------------------'.'<br />'; }}else{ 'No Data Found'; }?></td>
    <td><?php if(!empty($arr[$l][5])){foreach($arr[$l][5] as $data3){ echo $data3.'<br />'.'---------------------------------------'.'<br />'; }}else{ 'No Data Found'; }?></td>
    <td><?php if(!empty($arr[$l][6])){foreach($arr[$l][6] as $data5){ echo $data5.'<br />'.'---------------------------------------'.'<br />'; }}else{ 'No Data Found'; }?></td>
    <td><?php if(!empty($arr[$l][11])){foreach($arr[$l][11] as $data6){ echo $data6.'<br />'.'---------------------------------------'.'<br />'; }}else{ 'No Data Found'; }?></td>
    <td><?php if(!empty($arr[$l][14])){foreach($arr[$l][14] as $data14){ echo $data14.'<br />'.'---------------------------------------'.'<br />'; }}else{ 'No Data Found'; }?></td>
  </tr>
<?php
}
?>  
</table>
