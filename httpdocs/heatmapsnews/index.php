<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Heatmaps</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&libraries=visualization"></script>
<?php include('code/main.php'); ?>
<style type="text/css">
#map-canvas {
	height: 100%;
	margin: 0px;
	padding: 0px;
	background:#000;
}
</style>
</head>
<body>
<div id="panel">
  <div id="banner">
    <h1 id="title"><img src="images/logo.png" ></h1>
    <ul id="nav">
      <li id="refresh"><strong><a href="index.php">Refresh</a></strong></li>
    </ul>
  </div>
</div>
<div id="window"></div>
<div id="map-canvas"></div>
</body>
</html>