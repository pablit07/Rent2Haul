<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php print ADMIN_TITLE?>
</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
<link href="../fckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../fckeditor/fckeditor.js"></script>
<script language="javascript" type="text/javascript" src="./js/validator.js"></script>
<script language="javascript" type="text/javascript" src="./js/slow_expand/jquery-1.2.2.pack.js"></script>
<script language="javascript" type="text/javascript" src="./js/slow_expand/ddaccordion.js"></script>
<script language="javascript" src="./js/animatedcollapse.js"></script>
<link type="text/css" rel="stylesheet" href="../calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen">
</LINK>
<script type="text/javascript" src="../calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>
<style type="text/css">
.mypets{}
.openpet{}
</style>
<script language="javascript" type="text/javascript">
//Initialize first demo:
ddaccordion.init({
	headerclass: "mypets", //Shared CSS class name of headers group
	contentclass: "thepet", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click" or "mouseover"
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content.
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "openpet"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["none", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "slow", //speed of animation: "fast", "normal", or "slow"
	oninit:function(expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
<script type="text/javascript" src="js/ajax_function.js"></script>
</head>
<body>