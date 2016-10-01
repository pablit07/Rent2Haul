<?php include('config.php'); ?>
<script type="text/javascript">
$(function(){	

// Adding 500 Data Points
var map, pointarray, heatmap, data;
var n = ["rgba(107, 255, 255, 0)", "rgba(107, 255, 255, 1)", "rgba(107, 255, 154, 1)", "rgba(255, 233, 107, 1)", "rgba(255, 106, 106, 1)"];
var x = document.getElementById('map-canvas');
 
var taxiData = [
<?php
$checkSql = "SELECT * FROM google_news_cordinate ORDER BY RAND() DESC";
$getEXE = mysql_query($checkSql);
while($getCot = mysql_fetch_assoc($getEXE)){
?>
new google.maps.LatLng(<?php echo $getCot['lat'] ?>, <?php echo $getCot['lng'] ?>),
<?php
}
?>  
];
	
var mapOptions ={
	zoom: 3,
	minZoom: 3,
    maxZoom: 4,
	center: new google.maps.LatLng(23.630128, -8.9829976),
	panControl:false,
	streetViewControl:false,
    mapTypeControl:true,
	mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
        position: google.maps.ControlPosition.BOTTOM_CENTER
    },
	zoomControl:true,
    zoomControlOptions: {
      style:google.maps.ZoomControlStyle.SMALL,
	  position: google.maps.ControlPosition.RIGHT_CENTER
    },
	mapTypeId: google.maps.MapTypeId.ROADMAP
};

map = new google.maps.Map(x,mapOptions);

heatmap = new google.maps.visualization.HeatmapLayer;
pointArray = new google.maps.MVCArray(taxiData);
heatmap.set('data',pointArray);
heatmap.set("opacity", .7);
heatmap.set("radius", 65);
heatmap.set("gradient", n);

google.maps.event.addListener(map, 'click', function (event) {
	var hr = new XMLHttpRequest();
	var url = "getNews.php";
	var vars = "lat="+event.latLng.lat()+"&lon="+event.latLng.lng()+"&ind="+0;
	hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
	if(hr.readyState == 4 && hr.status == 200) {
	var return_data = hr.responseText;	
	if(return_data != '1'){
	document.getElementById('window').style.display= 'block';
	document.getElementById('window').innerHTML = '';
	document.getElementById('window').innerHTML = return_data;
	}else{
	document.getElementById('window').style.display= 'none';
	}
	}
	}
	hr.send(vars);	
	$('.MapLat').val(event.latLng.lat());
	$('.MapLon').val(event.latLng.lng());
	alert(event.latLng.place.name);
});
setStyle(map);
heatmap.setMap(map);

});

//PREVIOUS FUNCTION
function prev(lat,lon,ind){
	if(ind != 0){ ind = ind -1 }else{ int = 0}
	var hr = new XMLHttpRequest();
	var url = "getNews.php";
	var vars = "lat="+lat+"&lon="+lon+"&ind="+ind;
	hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
	if(hr.readyState == 4 && hr.status == 200) {
	var return_data = hr.responseText;	
	if(return_data != '1'){
	document.getElementById('window').style.display= 'block';
	document.getElementById('window').innerHTML = '';
	document.getElementById('window').innerHTML = return_data;
	}else{
	document.getElementById('window').style.display= 'none';
	}
	}
	}
	hr.send(vars);		
}
//NEXT FUNCTION
function next(lat,lon,ind){
	ind = ind +1
	var hr = new XMLHttpRequest();
	var url = "getNews.php";
	var vars = "lat="+lat+"&lon="+lon+"&ind="+ind;
	hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
	if(hr.readyState == 4 && hr.status == 200) {
	var return_data = hr.responseText;	
	if(return_data != '1'){
	document.getElementById('window').style.display= 'block';
	document.getElementById('window').innerHTML = '';
	document.getElementById('window').innerHTML = return_data;
	}else{
	document.getElementById('window').style.display= 'none';
	}
	}
	}
	hr.send(vars);		
}
//MAP STYLE FUNCTION
function setStyle(e) {
	var t = [{
	featureType: "water",
	stylers: [{
	color: "#00360d"
	}, {
	lightness: 52
	}, {
	saturation: -70
	}, {
	gamma: .25
	}]
	}, {
	stylers: [{
	saturation: 0
	}, {
	gamma: .25
	}]
	}, {
	elementType: "labels",
	stylers: [{
	visibility: "on"
	}]
	}, {
	featureType: "administrative",
	elementType: "geometry",
	stylers: [{
	visibility: "on"
	}]
	}, {
	featureType: "administrative.province",
	elementType: "all",
	stylers: [{
	visibility: "off"
	}]
	}];
	e.setOptions({
	styles: t
	});
	
}
//HIDE FUNCTION
function hide(e){
	document.getElementById(e).style.display='none';	
}

</script>