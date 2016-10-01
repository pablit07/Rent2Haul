<?php
ob_start();
session_start(); 
ini_set('max_execution_time', 50000000);
include_once("../configure.php");

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

$filename = 'exportgen-csv.csv';
$out = '';
// fiels to export
$out .='Name,About,Address,Working Days,Working Time,Fees,Services,Education,Awards and Recognitions,Memberships,Registrations';
$out .="\n";

$limit = 40;
$m= 0 ;
for($i=850;$i<=850;$i++){
		
	 $scrap_data = 'https://www.practo.com/mumbai/doctors?page='.$i;
	//$scrap_data = "https://krb-sjobs.brassring.com/TGWebHost/searchopenings.aspx?partnerid=30030&siteid=5798";
	//$html = curl($scrap_data);
	$html2 = file_get_contents($scrap_data,false,$context);
    #$html = file_get_contents('doctor.html');
	#die($html);
	//echo $html2;
    //echo $html;exit;
	$dom = new DOMDocument;
	@$dom->loadHTML($html2);
	$pokemon_xpath = new DOMXPath($dom);
	
	$pokemon_row = $pokemon_xpath->query('//a[@class="link doc-name smokeliftDoctorLink"]/@href');
	if($pokemon_row->length > 0){
	foreach($pokemon_row as $key=>$value){
		//echo ($value->nodeValue);
	//$pageLink[$i][$key]= 'http://whatsappvideo.net'.trim($value->nodeValue);
	//echo 'hello' ;
	$pageLink[$m]= trim($value->nodeValue);
	$m++ ;
	}
	}
	
	}
//  print_r($pageLink);
  //die ;
	/*echo "<pre>";
	print_r($pageLink);
	echo "</pre>";
	
	echo count($pageLink);*/
	//Gettring All The link To One Array	
	/*for($z=1;$z<=count($pageLink);$z++){
		for($q=0;$q<=count($pageLink[$z])-1;$q++){
			$toatlLink[] = $pageLink[$z][$q];	
		}	
	}
	
	echo "<pre>";
	print_r($toatlLink);
	echo "</pre>";
	*/
	//Each Link
	//print_r($pageLink);
	//die;
	for($d=0;$d<=count($pageLink)-1;$d++){
	//$d= 0 ;	
	//$scrap_url = 'doctor-details.html' ; //$toatlLink[$d];
	
	 $scrap_url = $pageLink[$d];
	 //echo $scrap_url;
	$html = file_get_contents($scrap_url,false,$context);
	
	//die($html);
	
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
for($l=0;$l<=count($arr)-1;$l++){
	
?>  
   <tr>
    <td><?php echo $name = $arr[$l][0]; ?></td>
    <td><?php $about = $arr[$l][3]; ?></td>
    <td><?php if(!empty($arr[$l][9])){foreach($arr[$l][9] as $data1){ $address .= $data1.';#'; }}else{ 'No Data Found'; }?></td>
    <td><?php if(!empty($arr[$l][10])){foreach($arr[$l][10] as $data10){ $working_days .=  $data10.';'; }}else{ 'No Data Found'; }?></td>
    <td><?php if(!empty($arr[$l][13])){foreach($arr[$l][13] as $data13){ $working_time .=  $data13.';'; }}else{ 'No Data Found'; }?></td>
    <td><?php if(!empty($arr[$l][12])){foreach($arr[$l][12] as $data4){ $fees  .= $data4.';'; }}else{ 'No Data Found'; }?></td>
    <td><?php if(!empty($arr[$l][7])){foreach($arr[$l][7] as $data2){ $services  .= $data2.';'; }}else{ 'No Data Found'; }?></td>
    <td><?php if(!empty($arr[$l][5])){foreach($arr[$l][5] as $data3){ $education  .= $data3.';'; }}else{ 'No Data Found'; }?></td>
    <td><?php if(!empty($arr[$l][6])){foreach($arr[$l][6] as $data5){ $awards  .= $data5.';'; }}else{ 'No Data Found'; }?></td>
    <td><?php if(!empty($arr[$l][11])){foreach($arr[$l][11] as $data6){ $membership  .= $data6.';'; }}else{ 'No Data Found'; }?></td>
    <td><?php if(!empty($arr[$l][14])){foreach($arr[$l][14] as $data14){ $registration  .= $data14.';'; }}else{ 'No Data Found'; }?></td>
  </tr>
<?php
print "name: ". $name  ."<br>";
print "about: ". str_replace("more.. [shrink]","",$about)  ."<br>";
print "address: ". str_replace("View map","",$address)  ."<br>";
print "working_days: ". $working_days  ."<br>";
print "working_time: ". $working_time  ."<br>";
print "fees: ". $fees  ."<br>";
print "services: ". $services  ."<br>";
print "education: ". $education  ."<br>";
print "awards: ". $awards  ."<br>";
print "membership: ". $membership  ."<br>";
print "registration: ". $registration  ."<br>";

$_POST['name'] = $name;
$_POST['about'] = str_replace("more.. [shrink]","",$about);
$_POST['address'] = str_replace("View map","",$address);
$_POST['working_days'] = $working_days;
$_POST['working_time'] = $working_time;
$_POST['fees'] = $fees;
$_POST['services'] = $services;
$_POST['education'] = $education;
$_POST['awards_and_recognitions'] = $awards;
$_POST['memberships'] = $membership;
$_POST['registrations'] = $registration;
$id = $db->insertDataArray(TBL_DOCTOR,$_POST);
 
//$about = '' ; $address = '' ; $working_days = ""; $fees = "" ; $working_time = "" ; $services= "" ; $education = "" ; $awards = "" ; $membership = "" ; $registration = "" ;
 
$name = ''; 
$about = '' ; $address = '' ; $working_days = ""; $fees = "" ; $working_time = "" ; $services= "" ; $education = "" ; $awards = "" ; $membership = "" ; $registration = "" ;
}
?>  
</table>
