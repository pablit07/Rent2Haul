<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Heatmaps</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jquery-1.10.1.min.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&libraries=visualization"></script>
<?php include('main.php'); ?>
<style type="text/css">
#map-canvas{ height: 100%; margin: 0px; padding: 0px; background:#000; }
#cross{
	cursor: pointer;
    display: block;
    float: right;
    height: 20px;
    margin: 0;
    width: 20px;
}
</style>
</head>
<body>
<div id="panel">
<div id="banner">
<h1 id="title"><a href="index.php"><span id="thick">MA</span><span id="thin">P</span></a></h1>
<ul id="nav">
<!--
<li id="refresh"><div class="content"><span>Date:</span> <input type="text" id="date-input" value="dd/mm/yyyy" onfocus="this.value=''"><div class="button" id="go">Go</div></div></li>
-->
<li id="refresh"><strong><a href="index.php">Refresh</a></strong></li>
</ul>
</div>
<!--
<input name="latitude" class="MapLat" value="" type="text" placeholder="Latitude" style="width: 161px;" disabled>
<input name="longitude" class="MapLon" value="" type="text" placeholder="Longitude" style="width: 161px;" disabled>
-->
</div>
<div id="window"></div>
<div id="map-canvas"></div>
</body>
</html>